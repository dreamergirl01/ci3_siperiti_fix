<?php
class M_barangKeluar extends CI_Model
{
    public function tampilData()
    {
        $query =  $this->db->query("SELECT *FROM barang_keluar
        JOIN barang ON barang_keluar.kd_barang=barang.kd_barang");
        return $query;
    }

    public function inputData($data){
        $this->db->insert('barang_keluar',$data);
    }

    public function hapusData($where)
    {
        $this->db->where($where);
        $this->db->delete('barang_keluar');
        $this->session->set_flashdata('success', 'Barang Berhasil Dihapus!');
    }
}
