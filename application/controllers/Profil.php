<?php
class Profil extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->query("SELECT *FROM user WHERE username='$_SESSION[username]'")->row();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('profil/index', $data);
        $this->load->view('layout/footer');
    }

    public function update()
    {
        $us = $this->input->post('username');
        $gambar_profil = $_FILES['gambar_profil']['name'];

        if ($gambar_profil == '') {
            $gambar_profil = $this->input->post('gambarLama');
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
            'password' => $this->input->post('password'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'gambar_profil' => $gambar_profil
        );

        $this->db->update('user', $data, ['username' => $us]);
        redirect('profil/index');
    }
}
