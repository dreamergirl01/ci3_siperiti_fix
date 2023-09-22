<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        //  var_dump($_SESSION);die();
        if (isset($_SESSION['username'])) {
            if ($_SESSION['level'] == 'client') {
                $data['barang'] = $this->db->query("SELECT COUNT(kd_barang) AS totalBarang FROM barang")->row();
                $data['stokBarang'] = $this->db->query("SELECT COUNT(stok) AS stokBarang FROM stok_barang")->row();
                $data['transaksi2'] = $this->db->query("SELECT COUNT(kd_transaksi) AS totalTransaksi FROM transaksi")->row();
                $data['bulan'] = ["JAN", "FEB", "MAR", "APR", "MEI", "JUN", "JUL", "AGU", "SEP", "OKT", "NOV", "DES"];
                $tahun = date('Y');

                foreach ($data['bulan'] as $b => $bb) {
                    $bulan = $b + 1;
                    $total[] = $this->db->query("SELECT COUNT(kd_transaksi) AS jumlah FROM transaksi
                WHERE MONTH(tanggal_pinjam)='$bulan' AND YEAR(tanggal_pinjam)='$tahun'")->row()->jumlah;
                }
                $data['transaksi'] = $total;
                $data['thn'] = $tahun;

                $this->load->view('layout/header');
                $this->load->view('layout/sidebar');
                $this->load->view('dashboard', $data);
                $this->load->view('layout/footer');
            } elseif ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'super admin') {
                $data['barangMasuk'] = $this->db->query("SELECT COUNT(kd_masuk) AS totalBarangMasuk FROM barang_masuk")->row();
                $data['barangKeluar'] = $this->db->query("SELECT COUNT(kd_keluar) AS totalBarangKeluar FROM barang_keluar")->row();
                $data['transaksi'] = $this->db->query("SELECT COUNT(kd_transaksi) AS totalTransaksi FROM transaksi")->row();
                $data['user'] = $this->db->query("SELECT COUNT(username) AS totalUser FROM user")->row();

                $data['bulan'] = ["JAN", "FEB", "MAR", "APR", "MEI", "JUN", "JUL", "AGU", "SEP", "OKT", "NOV", "DES"];
                $tahun = date('Y');

                foreach ($data['bulan'] as $b => $bb) {
                    $bulan = $b + 1;
                    $total[] = $this->db->query("SELECT COUNT(kd_masuk) as jml FROM barang_masuk
                WHERE MONTH(tanggal_masuk)='$bulan' AND YEAR(tanggal_masuk)='$tahun'")->row()->jml;
                }
                $data['barang_masuk'] = $total;
                $data['thn'] = $tahun;

                $this->load->view('layout/header');
                $this->load->view('layout/sidebar');
                $this->load->view('dashboard', $data);
                $this->load->view('layout/footer');
            }
        } else {
            $this->load->view('login');
        }
    }
}
