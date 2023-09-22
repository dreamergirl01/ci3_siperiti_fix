<?php 
class M_kondisi extends CI_Model{
    public function tampil_data(){
        return $this->db->get('kondisi');
    }

    public function tambahData(){
        return $this->db->get('kondisi');
    }

    public function edit_data($where){
        return $this->db->get_where('kondisi',$where);
    }

    public function hapusData($where){
        $this->db->where($where);
        $this->db->delete('kondisi');
        $this->session->set_flashdata('success', 'Kondisi Barang Berhasil Dihapus!');
    }
}

?>