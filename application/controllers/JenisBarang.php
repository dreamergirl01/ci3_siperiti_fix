<?php
class JenisBarang extends CI_Controller
{
    public function index()
    {
        if (isset($_SESSION['username'])) {
            $data['jenisBarang'] = $this->m_jenisBarang->tampil_data()->result();
            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('jenisBarang/index', $data);
            $this->load->view('layout/footer');
        } else {
            $this->load->view('login');
        }
    }

    public function tambah()
    {
        $data['jenisBarang'] = $this->m_jenisBarang->tambahData()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('jenisBarang/tambah', $data);
        $this->load->view('layout/footer');
    }
    public function tambah_data()
    {
        $nama_jenis = $this->input->post('nama_jenis');

        $last_id = $this->db->query("SELECT MAX(kd_jenis) AS kj  FROM jenis_barang");
        $last_id2 = $last_id->row_array(); 
        $kode = $last_id2["kj"];
        $urutan = (int)substr($kode,3);
        $urutan++;
        $prefix = 'KS';
        $kd_jenis = $prefix.sprintf("%03s",$urutan);

        $data = array(
            'kd_jenis' => $kd_jenis,
            'nama_jenis' => $nama_jenis,
        );

        $this->db->insert('jenis_barang',$data);
        $this->session->set_flashdata('success', 'Jenis Barang Berhasil Ditambah!');
        redirect('jenisBarang/index');
    }

    public function edit($kd_jenis)
    {
        $where = array('kd_jenis' => $kd_jenis);
        $data['jenisBarang'] = $this->m_jenisBarang->edit_data($where, 'jenis_barang')->row();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('jenisBarang/edit', $data);
        $this->load->view('layout/footer');
    }
    public function editData()
    {
        $jb = $this->input->post('kd_jenis');

        $data = array(
            'nama_jenis' => $this->input->post('nama_jenis'),
        );

        $this->db->update('jenis_barang', $data, ['kd_jenis' => $jb]);
        $this->session->set_flashdata('success', 'Jenis Barang Berhasil Diupdate!');
        redirect('jenisBarang/index');
    }


    public function hapus($kd_jenis)
    {
        $where = array('kd_jenis' => $kd_jenis);
        $this->m_jenisBarang->hapusData($where, 'jenis_barang');
        redirect('JenisBarang/index');
    }
}
