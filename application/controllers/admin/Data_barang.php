<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class Data_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        // Validasi form input
        $this->form_validation->set_rules('nama_brg', 'Nama Barang', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');

        // Cek apakah form input valid
        if ($this->form_validation->run() == FALSE) {
            // Jika tidak valid, tampilkan form tambah dengan alert Bootstrap
            $this->session->set_flashdata('message', 'Harap isi semua form.');
            $this->load->view('tambah_barang');
        } else {
            // Jika valid, simpan data ke database
            $nama_brg = $this->input->post('nama_brg');
            $keterangan = $this->input->post('keterangan');
            $kategori = $this->input->post('kategori');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');

            // Upload gambar
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['file_name'] = $_FILES['gambar_brg']['name'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar_brg')) {
                // Jika file gambar tidak valid, tampilkan pesan error dengan Bootstrap Alert
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File gambar harus berformat .jpg atau .png.</div>');
                redirect('admin/data_barang');
            } else {
                // Jika file gambar valid, simpan data ke database
                $gambar_brg = $this->upload->data('file_name');

                $data = array(
                    'nama_brg' => $nama_brg,
                    'keterangan' => $keterangan,
                    'kategori' => $kategori,
                    'harga' => $harga,
                    'stok' => $stok,
                    'gambar_brg' => $gambar_brg
                );

                $this->model_barang->tambah_barang($data, 'tb_barang');

                // Tampilkan pesan sukses dengan Bootstrap Alert
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang berhasil ditambahkan.</div>');
                redirect('admin/data_barang');
            }
        }
    }

    public function edit($id)
    {
        $where = array('id_brg' => $id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_brg');
        $nama_brg = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $gambar_brg = $_FILES['gambar_brg']['name'];

        if ($gambar_brg == '') {
            // Mengambil gambar lama dari database
            $barang = $this->model_barang->get_data_barang_by_id($id)->row();
            $gambar_brg = $barang->gambar_brg;
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            // Pengecekan jenis file gambar
            $file_type = $_FILES['gambar_brg']['type'];
            if ($file_type != 'image/jpeg' && $file_type != 'image/png') {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jenis file gambar tidak valid. Harus berupa JPG atau PNG.</div>');
                redirect('admin/data_barang/edit/' . $id);
            }

            if (!$this->upload->do_upload('gambar_brg')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar gagal diupload: ' . $error['error'] . '</div>');
                redirect('admin/data_barang/edit/' . $id);
            } else {
                $gambar_brg = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok,
            'gambar_brg' => $gambar_brg,
        );
        $where = array(
            'id_brg' => $id
        );
        $this->model_barang->update_data($where, $data, 'tb_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang berhasil diupdate!</div>');
        redirect('admin/data_barang/index');
    }


    public function hapus($id)
    {
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function print()
    {
        $data['barang'] = $this->model_barang->tampil_data("tb_barang")->result();
        $this->load->view('admin/print', $data);
    }

    public function pdf()
    {
        require_once 'vendor/autoload.php';
        // Load model mahasiswa
        $this->load->model('model_barang');

        // Get data mahasiswa from database
        $data['barang'] = $this->model_barang->tampil_data()->result();

        // Load view mahasiswa_pdf
        $html = $this->load->view('admin/pdf', $data, true);

        // Convert HTML to PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("list_data_barang.pdf", array("Attachment" => false));
    }

    public function excel()
    {
        require_once 'vendor/autoload.php';

        // Get data from model
        $data['barang'] = $this->model_barang->tampil_data()->result_array();

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Create new worksheet
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'Nama Barang');
        $sheet->setCellValue('C1', 'Keterangan');
        $sheet->setCellValue('D1', 'Kategori');
        $sheet->setCellValue('E1', 'Harga');
        $sheet->setCellValue('F1', 'Stok');
        $sheet->setCellValue('G1', 'Gambar Barang');

        // Set data
        $row = 2;
        foreach ($data['barang'] as $data) {
            $sheet->setCellValue('A' . $row, $data['id_brg']);
            $sheet->setCellValue('B' . $row, $data['nama_brg']);
            $sheet->setCellValue('C' . $row, $data['keterangan']);
            $sheet->setCellValue('D' . $row, $data['kategori']);
            $sheet->setCellValue('E' . $row, $data['harga']);
            $sheet->setCellValue('F' . $row, $data['stok']);
            $sheet->setCellValue('G' . $row, $data['gambar_brg']);
            $row++;
        }

        // Set filename and save file
        $filename = 'Data Barang.xlsx';
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
