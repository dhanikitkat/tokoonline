<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class Invoice extends CI_Controller
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
    public function index(){
        $data['invoice']= $this->model_invoice->tampil_data();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice',$data);
        $this->load->view('templates_admin/footer');
    }

    public function detail($id_invoice){
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates_admin/footer');
    }

    public function print()
    {
        $data['invoice'] = $this->model_invoice->get_data("tb_invoice")->result();
        $this->load->view('admin/print_invoice', $data);
    }
    public function pdf()
    {
        require_once 'vendor/autoload.php';
        // Load model mahasiswa
        $this->load->model('model_invoice');

        // Get data mahasiswa from database
        $data['invoice'] = $this->model_invoice->get_data()->result();

        $html = $this->load->view('admin/pdf_invoice', $data, true);

        // Convert HTML to PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("list_data_invoice.pdf", array("Attachment" => false));
    }
    public function excel()
    {
        require_once 'vendor/autoload.php';
        // Load model
        $this->load->model('model_invoice');

        // Get data from model
        $data['invoice'] = $this->model_invoice->get_data()->result_array();

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Create new worksheet
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'Nama Pemesan');
        $sheet->setCellValue('C1', 'Alamat');
        $sheet->setCellValue('D1', 'No Telepon');
        $sheet->setCellValue('E1', 'Kurir');
        $sheet->setCellValue('F1', 'Metode Pembayaran');
        $sheet->setCellValue('G1', 'Tanggal Pemesanan');
        $sheet->setCellValue('H1', 'Batas Pembayaran');

        // Set data
        $row = 2;
        foreach ($data['invoice'] as $data) {
            $sheet->setCellValue('A' . $row, $data['id']);
            $sheet->setCellValue('B' . $row, $data['nama']);
            $sheet->setCellValue('C' . $row, $data['alamat']);
            $sheet->setCellValue('D' . $row, $data['no_telp']);
            $sheet->setCellValue('E' . $row, $data['kurir']);
            $sheet->setCellValue('F' . $row, $data['metode_pembayaran']);
            $sheet->setCellValue('G' . $row, $data['tgl_pesan']);
            $sheet->setCellValue('H' . $row, $data['batas_bayar']);
            $row++;
        }

        // Set filename and save file
        $filename = 'Data Invoice.xlsx';
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}