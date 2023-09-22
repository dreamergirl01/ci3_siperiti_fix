<?php 
class M_jenisBarang extends CI_Model{
    public function tampil_data(){
        return $this->db->get('jenis_barang');
    }

    public function tambahData(){
        return $this->db->get('jenis_barang');
    }

    public function edit_data($where){
        return $this->db->get_where('jenis_barang',$where);
    }

    public function hapusData($where){
        $this->db->where($where);
        $this->db->delete('jenis_barang');
        $this->session->set_flashdata('success', 'Jenis Barang Berhasil Dihapus!');
    }
}

?>