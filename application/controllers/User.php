<?php 
class User extends CI_Controller{
    public function index(){
        if (isset($_SESSION['username'])) {
        $data['user'] = $this->m_user->tampil_data()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('user/index',$data);
        $this->load->view('layout/footer');
    } else {
        $this->load->view('login');
    }
    }

    public function tambah(){
        $data['user'] = $this->m_user->tambahData()->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('user/tambah',$data);
        $this->load->view('layout/footer');
    }
    public function tambah_data(){
        // $kd_kondisi = $this->input->post('kd_kondisi');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $level = $this->input->post('level');
        $gambar_profil = $_FILES['gambar_profil'];
        if ($gambar_profil = '') {
        } else {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_profil')) {
                echo "Upload Gagal";
            } else {
                $gambar_profil = $this->upload->data('file_name');
            }
        }

        $data = array(
            // 'kd_kondisi' => $kd_kondisi,
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'no_hp' => $no_hp,
            'gambar_profil' => $gambar_profil,
            'level' => $level,
        );

        $this->m_user->inputData($data, 'username');
        $this->session->set_flashdata('success', 'Data User Berhasil Ditambah!');
        redirect('user/index');
    }

    public function edit($username)
    {
        $where = array('username' => $username);
        $data['user'] = $this->m_user->edit_data($where, 'user')->row();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('user/edit', $data);
        $this->load->view('layout/footer');
    }
    public function editData()
    {
        $us = $this->input->post('username');
        $gambar_profil = $_FILES['gambar_profil']['name'];

        if ($gambar_profil == '') {
            $gambar_profil = $this->input->post('gambar_lama');
        } else {
            $config['upload_path'] = 'assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|tiff';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_profil')) {
                echo "Gambar Gagal Diupload";
            } else {
                $gambar_profil = $this->upload->data('file_name');
            }
        }
        
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'gambar_profil' => $gambar_profil,
            'level' => $this->input->post('level'),
        );

        $this->db->update('user', $data, ['username' => $us]);
        $this->session->set_flashdata('success', 'Data User Berhasil Diupdate!');
        redirect('user/index');
    }


    public function hapus($username)
    {
        $where = array('username' => $username);
        $this->m_user->hapusData($where, 'user');
        redirect('user/index');
    }
}

?>