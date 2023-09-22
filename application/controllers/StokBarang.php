<?php
class StokBarang extends CI_Controller
{
    public function index()
    {
        if (isset($_SESSION['username'])) {
        //     $data['stokBarang'] = $this->db->query("SELECT SUM(jumlah_stok) AS total, stok_barang.*, barang_masuk.*, jenis_barang.* 
        // FROM stok_barang
        // JOIN barang_masuk ON stok_barang.kd_masuk=barang_masuk.kd_masuk
        // JOIN jenis_barang ON jenis_barang.kd_jenis=barang_masuk.kd_jenis
        // GROUP BY barang_masuk.kd_jenis")->result();
        $data['stokBarang'] = $this->m_stok->tampilData()->result();
            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('stokBarang/index', $data);
            $this->load->view('layout/footer');
        } else {
            $this->load->view('login');
        }
    }

    public function hapus($kd_barang)
    {
        $where = array('kd_barang' => $kd_barang);
        $this->m_stok->hapusData($where, 'kd_barang');
        redirect('stokBarang/index');
    }
}
