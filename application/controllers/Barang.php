<?php 
class Barang extends CI_Controller{
    public function index(){
       $data['barang'] = $this->db->query("SELECT *FROM barang
       JOIN jenis_barang ON barang.kd_jenis=jenis_barang.kd_jenis")->result();
       $this->load->view('layout/header');
       $this->load->view('layout/sidebar');
       $this->load->view('barang/index', $data);
       $this->load->view('layout/footer');
    }

    public function tambah(){
        $data['jenis_barang'] = $this->db->query("SELECT *FROM jenis_barang")->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('barang/tambah', $data);
        $this->load->view('layout/footer');
    }
    public function tambahData(){
        $kd_jenis = $this->input->post('kd_jenis');
        $nama_barang = $this->input->post('nama_barang');
        $satuan = $this->input->post('satuan');
        $gambar = $_FILES['gambar'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|png|gif|webp|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Upload Gagal";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $last_id = $this->db->query("SELECT MAX(kd_barang) AS kd  FROM barang"); 
        $last_id2 = $last_id->row_array(); 
        $kode = $last_id2["kd"];
        $urutan = (int)substr($kode,4);
        $urutan++;
        $prefix = 'BR';
        $kodeAuto = $prefix.sprintf("%04s", $urutan);

        $data = array (
            'kd_barang' => $kodeAuto,
            'kd_jenis' => $kd_jenis,
            'nama_barang' => $nama_barang,
            'satuan' => $satuan,
            'gambar' => $gambar
        );

        $this->db->insert('barang',$data);
        $this->session->set_flashdata('success', 'Barang Berhasil Ditambahkan!');
        redirect('barang/index');
    }

    public function edit($kd_barang){
        $data['barang'] = $this->db->query("SELECT *FROM barang WHERE kd_barang='$kd_barang'") ->row();
        $data['jenis_barang'] = $this->db->query("SELECT *FROM jenis_barang")->result();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('barang/edit', $data);
        $this->load->view('layout/footer');
    }

    public function editData()
    {
        $kd_barang = $this->input->post('kd_barang');
        $gambar = $_FILES['gambar']['name'];

        if ($gambar == '') {
            $gambar = $this->input->post('gambarLama');
        } else {
            $config['upload_path'] = 'assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|tiff|webp';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'kd_barang' => $this->input->post('kd_barang'),
            'kd_jenis' => $this->input->post('kd_jenis'),
            'nama_barang' => $this->input->post('nama_barang'),
            'gambar' => $gambar,
            'satuan' => $this->input->post('satuan'),
        );

        $this->session->set_flashdata('success', 'Barang Berhasil Diupdate!');
        $this->db->update('barang', $data, ['kd_barang' => $kd_barang]);
        redirect('barang/index');
    }

    public function hapus($kd_barang){
        $this->db->delete('barang', ['kd_barang' => $kd_barang]);
        $this->session->set_flashdata('success', 'Barang Berhasil Dihapus!');
        redirect('barang/index');
    }
}

?>