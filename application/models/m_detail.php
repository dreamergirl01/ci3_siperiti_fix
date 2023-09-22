<?php 
class M_detail extends CI_Model{
    public function tampil_data()
    {
        //  return $this->db->get('detail');
        //  return $this->db->query("SELECT *FROM detail
        //  JOIN barang ON detail.kd_barang=barang.kd_barang
        //  JOIN kondisi ON detail.kd_kondisi=kondisi.kd_kondisi");
        
        $this->db->SELECT('*');
        $this->db->FROM('detail');
        $this->db->JOIN('kondisi','detail.kd_kondisi=kondisi.kd_kondisi');
        $this->db->JOIN('barang','detail.kd_barang=barang.kd_barang');
        return $this->db->get();
    }

    public function inputData($data){
        $this->db->insert('detail',$data);
    }

    public function edit_data($where){
        return $this->db->get_where('detail',$where);
    }

    public function hapusData($where){
        $this->db->where($where);
        $this->db->delete('detail');
        $this->session->set_flashdata('success', 'Detail Barang Berhasil Dihapus!');
    }
}

?>