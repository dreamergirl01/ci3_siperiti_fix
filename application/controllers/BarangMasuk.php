<?php
class barangMasuk extends CI_Controller
{
    public function index()
    {
        if (isset($_SESSION['username'])) {
            $data['barangMasuk'] = $this->m_barangMasuk->tampilData()->result();
            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('barangMasuk/index', $data);
            $this->load->view('layout/footer');
        } else {
            $this->load->view('login');
        }
    }

    public function tambah()
    {
        $data['barang'] = $this->db->query("SELECT *FROM barang")->result();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('barangMasuk/tambah', $data);
        $this->load->view('layout/footer');
    }
    public function tambahData()
    {
        $kd_barang = $this->input->post('kd_barang');
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $jumlah = $this->input->post('jumlah_masuk');


        // $stok = $this->db->query("SELECT *FROM kd_masuk");
        // $totalStok = $stok->jumlah + $jumlah;

        $last_id = $this->db->query("SELECT MAX(kd_masuk) AS km  FROM barang_masuk");
        $last_id2 = $last_id->row_array();
        $kode = $last_id2["km"];
        $urutan = (int)substr($kode, 8, 4);
        $urutan++;
        $prefix = 'BM' . date('ymd');
        $kodeAuto = $prefix . sprintf("%04s", $urutan);

        $data = array(
            'kd_masuk' => $kodeAuto,
            'kd_barang' => $kd_barang,
            'tanggal_masuk' => $tanggal_masuk,
            'jumlah_masuk' => $jumlah,
        );

        //Barang Masuk
        $this->m_barangMasuk->inputData($data, 'barang_masuk');

        //Ambil Data Yang Ditambahkan terakhir di barang masuk
        // $masuk = $this->db->query("SELECT * FROM barang_masuk ORDER BY kd_masuk DESC ")->row();
        $total = $this->db->query("SELECT *FROM stok_barang WHERE kd_barang='$kd_barang'")->row();

        if ($total->kd_barang != $kd_barang) {
            $data2 = array(
                'kd_barang' => $kd_barang,
                'stok' => $jumlah
            );
            //Stok Barang
            $this->db->insert('stok_barang', $data2);
            $this->session->set_flashdata('success', 'Barang Berhasil Ditambahkan!');
            redirect('barangMasuk/index');
        } else {
            $totalStok = $jumlah + $total->stok;
            $this->db->query("UPDATE stok_barang SET stok='$totalStok' WHERE kd_barang='$kd_barang' ");
            $this->session->set_flashdata('success', 'Barang Berhasil Ditambahkan!');
            redirect('barangMasuk/index');
        }

        // $this->session->set_flashdata('success', 'Barang Berhasil Ditambahkan!');
        // redirect('barangMasuk/index');
    }

    public function edit($kd_masuk)
    {
        $where = array('kd_masuk' => $kd_masuk);
        $data['barangMasuk'] = $this->m_barangMasuk->editData($where, 'barang_masuk')->row();
        $data['barang'] = $this->db->query("SELECT *FROM barang")->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('barangMasuk/edit', $data);
        $this->load->view('layout/footer');
    }
    public function editData()
    {
        $bm = $this->input->post('kd_masuk');
        $kd_barang = $this->input->post('kd_barang');

        $data = array(
            'kd_masuk' => $this->input->post('kd_masuk'),
            'kd_barang' => $this->input->post('kd_barang'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'jumlah_masuk' => $this->input->post('jumlah_masuk'),
        );


        $this->db->update('barang_masuk', $data, ['kd_masuk' => $bm]);

        $bm2 = $this->db->query("SELECT SUM(jumlah_masuk) AS jm FROM barang_masuk WHERE kd_barang='$kd_barang'")->row();

        $this->db->query("UPDATE stok_barang SET stok='$bm2->jm' WHERE kd_barang='$kd_barang'");

        $this->session->set_flashdata('success', 'Barang Berhasil Diupdate!');
        redirect('barangMasuk/index');
    }

    public function hapus($kd_masuk)
    {
        $where = array('kd_masuk' => $kd_masuk);
        $this->m_barangMasuk->hapusData($where, 'barang_masuk');
        redirect('barangMasuk/index');
    }
}
