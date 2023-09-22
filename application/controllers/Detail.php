<?php
class Detail extends CI_Controller
{
    public function index()
    {
        if (isset($_SESSION['username'])) {
            $data['detail'] = $this->m_detail->tampil_data()->result();
            // var_dump($data['barang']);
            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('detail/index', $data);
            $this->load->view('layout/footer');
        } else {
            $this->load->view('login');
        }
    }

    public function tambah()
    {
        $data['stokBarang'] = $this->db->query("SELECT *FROM stok_barang
        JOIN barang ON stok_barang.kd_barang=barang.kd_barang")->result();
        $data['kondisi'] = $this->db->query("SELECT *FROM kondisi")->result();
        //  var_dump($data['detail']);
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('detail/tambah', $data);
        $this->load->view('layout/footer');
    }
    public function tambahData()
    {
        $kd_barang = $this->input->post('kd_barang');
        $kd_kondisi = $this->input->post('kd_kondisi');
        $jumlah_barang = $this->input->post('jumlah_barang');
        $tgl = date('Y-m-d');

        $last_id = $this->db->query("SELECT MAX(kd_detail) AS kd  FROM detail");
        $last_id2 = $last_id->row_array();
        $kode = $last_id2["kd"];
        $urutan = (int)substr($kode, 1, 4);
        $urutan++;
        $prefix = 'D';
        $kodeAuto = $prefix . sprintf("%04s", $urutan);

        $data = array(
            'kd_detail' => $kodeAuto,
            'kd_barang' => $kd_barang,
            'kd_kondisi' => $kd_kondisi,
            'jumlah_barang' => $jumlah_barang,
            'tanggal_pemeriksaan' => $tgl
        );

        $this->m_detail->inputData($data, 'detail');
        $this->session->set_flashdata('success', 'Detail Barang Berhasil Ditambah!');
        redirect('detail/index');
    }

    public function hapus($kd_detail)
    {
        $where = array('kd_detail' => $kd_detail);
        $this->m_detail->hapusData($where, 'detail');
        redirect('detail/index');
    }
}
