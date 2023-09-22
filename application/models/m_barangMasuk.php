<?php 
class M_barangMasuk extends CI_Model{
    public function tampilData(){
        // $this->db->query('SELECT *FROM barang_masuk
        // JOIN jenis_barang ON barang_masuk.kd_jenis=jenis_barang.kd_jenis');
        $this->db->SELECT('*');
        $this->db->FROM('barang_masuk');
        $this->db->JOIN('barang', 'barang_masuk.kd_barang=barang.kd_barang');
        return $this->db->get();
    }

    public function inputData($data){
        $this->db->insert('barang_masuk',$data);
    }

    public function editData($where){
        return $this->db->get_where('barang_masuk',$where);
    }

    public function hapusData($where){
        $this->db->where($where);
        $this->db->delete('barang_masuk');
        $this->session->set_flashdata('success', 'Barang Berhasil Dihapus!');
    }
}

?>