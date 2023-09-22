<?php
class Kondisi extends CI_Controller
{
    public function index()
    {
        if (isset($_SESSION['username'])) {
            $data['kondisi'] = $this->m_kondisi->tampil_data()->result();
            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('kondisi/index', $data);
            $this->load->view('layout/footer');
        } else {
            $this->load->view('login');
        }
    }

    public function tambah()
    {
        $data['kondisi'] = $this->m_kondisi->tambahData()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('kondisi/tambah', $data);
        $this->load->view('layout/footer');
    }
    public function tambah_data()
    {
        // $kd_kondisi = $this->input->post('kd_kondisi');
        $kondisi = $this->input->post('kondisi');

        $last_id = $this->db->query("SELECT MAX(kd_kondisi) AS kk  FROM kondisi");
        $last_id2 = $last_id->row_array(); 
        $kode = $last_id2["kk"];
        $urutan = (int)substr($kode,2);
        $urutan++;
        $prefix = "KD";
        $kodeAuto =$prefix . sprintf("%02s",$urutan);

        $data = array(
            'kd_kondisi' => $kodeAuto,
            'kondisi' => $kondisi,
        );

        $this->db->insert('kondisi',$data);
        $this->session->set_flashdata('success', 'Kondisi Barang Berhasil Ditambah!');
        redirect('kondisi/index');
    }

    public function edit($kd_kondisi)
    {
        $where = array('kd_kondisi' => $kd_kondisi);
        $data['kondisi'] = $this->m_kondisi->edit_data($where, 'kondisi')->row();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('kondisi/edit', $data);
        $this->load->view('layout/footer');
    }
    public function editData()
    {
        $ks = $this->input->post('kd_kondisi');

        $data = array(
            'kondisi' => $this->input->post('kondisi'),
        );

        $this->db->update('kondisi', $data, ['kd_kondisi' => $ks]);
        $this->session->set_flashdata('success', 'Kondisi Barang Berhasil Diupdate!');
        redirect('kondisi/index');
    }


    public function hapus($kd_kondisi)
    {
        $where = array('kd_kondisi' => $kd_kondisi);
        $this->m_kondisi->hapusData($where, 'kondisi');
        redirect('kondisi/index');
    }
}
