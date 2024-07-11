<?php 

class Model_kategori extends CI_Model 
{
    public function data_elektronik(){
        return $this->db->get_where("tb_barang",array('kategori'=>'elektronik'));
    }
    public function data_pakaian_pria()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 'pakaian_pria'));
    }
    public function data_pakaian_wanita()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 'pakaian_wanita'));
    }
    public function data_pakaian_anak()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 'pakaian_anak'));
    }
    public function data_peralatan_olahraga()
    {
        return $this->db->get_where("tb_barang", array('kategori' => 'peralatan_olahraga'));
    }
}
