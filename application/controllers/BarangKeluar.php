<?php 
class BarangKeluar extends CI_Controller{
    public function index(){
        if (isset($_SESSION['username'])) {
           $data['barangKeluar'] = $this->m_barangKeluar->tampilData()->result();
            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('barangKeluar/index',$data);
            $this->load->view('layout/footer');
        } else {
            $this->load->view('login');
        }
    }

    public function tambah(){
        $data['barangKeluar'] = $this->db->query("SELECT *FROM barang_keluar")->result();
        $data['barang'] = $this->db->query("SELECT *FROM barang")->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('barangKeluar/tambah',$data);
        $this->load->view('layout/footer');
    }
    public function tambahData(){
        $kd_barang = $this->input->post('kd_barang');
        $keterangan = $this->input->post('keterangan');
        $tanggal_keluar = $this->input->post('tanggal_keluar');
        $jumlah_keluar = $this->input->post('jumlah_keluar');

        $last_id = $this->db->query("SELECT MAX(kd_keluar) AS kl  FROM barang_keluar");
        $last_id2 = $last_id->row_array();
        $kode = $last_id2["kl"];
        $urutan = (int)substr($kode, 8, 4);
        $urutan++;
        $prefix = 'KL' . date('ymd');
        $kodeAuto = $prefix . sprintf("%04s", $urutan);

        $data = array(
            'kd_keluar' => $kodeAuto,
            'kd_barang' => $kd_barang,
            'keterangan' => $keterangan,
            'tanggal_keluar' => $tanggal_keluar,
            'jumlah_keluar' => $jumlah_keluar
        );

        //input barang keluar
        $this->m_barangKeluar->inputData($data,'barang_keluar');

        //ambil stok barang
        $dataStok = $this->db->query("SELECT *FROM stok_barang WHERE kd_barang='$kd_barang'")->row();
        $totalKeluar = $dataStok->stok - $jumlah_keluar;

        $this->db->query("UPDATE stok_barang SET stok='$totalKeluar' WHERE kd_barang = '$dataStok->kd_barang' ");

        $this->session->set_flashdata('success', 'Barang Keluar Berhasil Ditambah!');
        redirect('barangKeluar/index');
    }

    public function hapus($kd_keluar)
    {
        $where = array('kd_keluar' => $kd_keluar);
        $this->m_barangKeluar->hapusData($where, 'barang_keluar');
        redirect('barangKeluar/index');
    }
}

?>