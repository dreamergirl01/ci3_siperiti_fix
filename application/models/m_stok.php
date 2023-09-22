<?php 
class M_stok extends CI_Model{
    public function tampilData(){
        return $this->db->query("SELECT *FROM stok_barang
        JOIN barang ON stok_barang.kd_barang=barang.kd_barang");
    }

    public function inputData($data){
        $this->db->insert('stok_barang',$data);
    }

    public function hapusData($where){
        $this->db->where($where);
        $this->db->delete('stok_barang');
        $this->session->set_flashdata('success', 'Kondisi Barang Berhasil Dihapus!');
    }
}

?>