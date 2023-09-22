<?php
class Login extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('username')) {
            $this->session->set_flashdata('success', 'Selamat Datang di Dashboard Admin!');
            // $this->session->set_flashdata('success', '<div class="alert alert-primary" role="alert">
            // 			  Selamat Datang di Dashboard Admin!!!
            // 			</div>');
            redirect(base_url('dashboard'), 'refresh');
        }

        $this->load->view('login');
    }

    public function proses_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username, 'password' => $password]);

        // var_dump($user);
        // die();

        if ($user->num_rows() > 0) {
            $datauser = $user->row();

            $data = [
                'username' => $datauser->username,
                'nama' => $datauser->nama,
                'password' => $datauser->password,
                'gambar_profil' => $datauser->gambar_profil,
                'level' => $datauser->level
            ];

            $this->session->set_userdata($data);
            if ($datauser->level == 'super admin') {
                $this->session->set_flashdata('success', 'Selamat Datang di Dashboard super admin!');
                redirect(base_url(('dashboard')));
            } elseif ($datauser->level == 'admin') {
                $this->session->set_flashdata('success', 'Selamat Datang di Dashboard admin!');
                redirect(base_url('dashboard'), 'refresh');
            } else {
                $this->session->set_flashdata('success', 'Selamat Datang di Dashboard client!');
                redirect(base_url('dashboard'), 'refresh');
            }
        } else {

            $this->session->set_flashdata('error', 'Username atau Password Salah!');
            redirect(base_url('login'), 'refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'), 'refresh');
    }
}
