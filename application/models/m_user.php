<?php
class M_user extends CI_Model
{
    public function tampil_data()
    {
        if ($_SESSION['level'] == 'super admin') {
            return $this->db->query("SELECT *FROM user WHERE level='admin' ");
        } else {
            return $this->db->query("SELECT *FROM user WHERE level='client' ");
        }
    }

    public function tambahData()
    {
        return $this->db->get('user');
    }

    public function inputData($data)
    {
        $this->db->insert('user', $data);
    }

    public function edit_data($where)
    {
        return $this->db->get_where('user', $where);
    }

    public function hapusData($where)
    {
        $this->db->where($where);
        $this->db->delete('user');
        $this->session->set_flashdata('success', 'Data Transaksi Berhasil Dihapus!');
    }
}
