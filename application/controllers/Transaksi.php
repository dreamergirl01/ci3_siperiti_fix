<?php
class Transaksi extends CI_Controller
{
    public function index()
    {
        // var_dump($_SESSION);
        if (isset($_SESSION['username'])) {
            if (!isset($_POST['filter']) && $_SESSION['level'] != 'client') {
                $data['transaksi'] = $this->db->query("SELECT *FROM transaksi
                JOIN barang ON barang.kd_barang=transaksi.kd_barang
                JOIN user ON user.username=transaksi.username")->result();
            } elseif (isset($_POST['filter']) && $_SESSION['level'] != 'client') {
                $data['transaksi'] = $this->db->query("SELECT *FROM transaksi
                JOIN barang ON barang.kd_barang=transaksi.kd_barang
                JOIN user ON user.username=transaksi.username
                WHERE tanggal_pinjam BETWEEN '$_POST[dari]' AND '$_POST[sampai]'
                ORDER BY kd_transaksi DESC")->result();
            } else {
                $data['transaksi'] = $this->db->query("SELECT *FROM transaksi
            JOIN barang ON barang.kd_barang=transaksi.kd_barang
            JOIN user ON user.username=transaksi.username
            WHERE user.username='$_SESSION[username]'
            ORDER BY kd_transaksi DESC")->result();
            }


            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('transaksi/index', $data);
            $this->load->view('layout/footer');
        } else {
            $this->load->view('login');
        }
    }

    public function tambah()
    {
        $data['stokBarang'] = $this->db->query("SELECT *FROM stok_barang
        JOIN barang ON barang.kd_barang=stok_barang.kd_barang")->result();
        $data['user'] = $this->db->query("SELECT *FROM user WHERE level='client' ")->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('transaksi/tambah', $data);
        $this->load->view('layout/footer');
    }

    public function tambahData()
    {
        $kd_barang = $this->input->post('kd_barang');
        $username = $this->input->post('username');
        $jumlah_pinjam = $this->input->post('jumlah_pinjam');
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');

        $last_id = $this->db->query("SELECT MAX(kd_transaksi) AS ktr  FROM transaksi");
        $last_id2 = $last_id->row_array();
        $kode = $last_id2["ktr"];
        $urutan = (int)substr($kode, 8, 4);
        $urutan++;
        $prefix = 'TR' . date('ymd');
        $kodeAuto = $prefix . sprintf("%04s", $urutan);

        //ambil stok
        $stok = $this->db->query("SELECT *FROM stok_barang WHERE kd_barang='$kd_barang'")->row();

        //kurangi stok
        $totalStok = $stok->stok - $jumlah_pinjam;

        if ($stok >= $jumlah_pinjam) {
            $data = array(
                'kd_transaksi' => $kodeAuto,
                'kd_barang' => $kd_barang,
                'username' => $username,
                'jumlah_pinjam' => $jumlah_pinjam,
                'status' => 'Dipinjam',
                'tanggal_pinjam' => $tanggal_pinjam
            );
            $this->db->insert('transaksi', $data);

            //Ambil Data Transaksi Terakhir
            // $trans = $this->db->query("SELECT * FROM transaksi 
            // ORDER BY kd_transaksi DESC")->row();

            // $data2 = array(
            //     'kd_barang' => $trans->kd_barang,
            //     'kd_transaksi' => $trans->kd_transaksi,
            //     'status_keluar' => 'Dipinjam'
            // );

            // $this->db->insert('barang_keluar', $data2);
            $this->db->query("UPDATE stok_barang SET stok='$totalStok' WHERE kd_barang='$kd_barang' ");
            $this->session->set_flashdata('success', 'Barang Berhasil Ditambah!');
            redirect('transaksi/index');
        } else if ($stok < $jumlah_pinjam) {
            $this->session->set_flashdata('error', 'Stok Barang Tidak Mencukupi');
            // redirect('transaksi/tambah');
        }
    }

    public function edit($id)
    {
        //Ambil Data Stok
        $stok = $this->db->query("SELECT * FROM transaksi 
        JOIN stok_barang ON transaksi.kd_barang=stok_barang.kd_barang
        WHERE kd_transaksi='$id'")->row();
        $tambah_stok = $stok->jumlah_pinjam + $stok->stok;
        $tgl = date('Y-m-d');

        $data = array(
            'status' => 'Kembali',
            'tanggal_kembali' => $tgl,
        );

        $update = $this->db->update('transaksi', $data, array('kd_transaksi' => $id));
        // $this->db->delete('barang_keluar', ['kd_transaksi' => $id]);

        $this->db->query("UPDATE stok_barang SET stok='$tambah_stok' WHERE kd_barang='$stok->kd_barang'");

        if ($update == TRUE) {
            $this->session->set_flashdata('success', 'Barang Berhasil Dikembalikan!');
        } elseif ($update == FALSE) {
            $this->session->set_flashdata('error', 'Barang Gagal Dikembalikan!');
        }

        redirect('transaksi/index');
    }

    public function hapus($kd_transaksi)
    {
        $this->db->delete('transaksi', ['kd_transaksi' => $kd_transaksi]);
        $this->session->set_flashdata('success', 'Barang Berhasil Dihapus!');
        redirect('transaksi/index');
    }

    public function print()
    {
        if ($_POST['dari'] == '' && $_POST['sampai'] == '') {
            $this->session->set_flashdata('error', 'Silahkan Isi Tanggal Terlebih Dahulu!');
            redirect('transaksi/index');
        } else {
            $data['transaksi'] = $this->db->query("SELECT *FROM transaksi 
            JOIN user ON transaksi.username=user.username
            JOIN barang ON barang.kd_barang=transaksi.kd_barang
            WHERE tanggal_pinjam BETWEEN '$_POST[dari]' AND '$_POST[sampai]'")->result();
            $this->load->view('transaksi/print', $data);
        }
    }
}
