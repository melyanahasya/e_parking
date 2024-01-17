<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('upload');
        $this->load->library('form_validation');

        // validasi untuk menampilkan page sesuai role
        if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'pengguna') {
            redirect(base_url() . 'auth');
        }
    }

    public function index()
    {
        $this->load->view('pengguna/home');
    }

    // untuk membuat kode acak
    private function generateRandomCode($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomCode = '';

        for ($i = 0; $i < $length; $i++) {
            $randomCode .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomCode;
    }

    // public function aksi_masuk_parkir()
    // {
    //     $plat_nomor = $this->input->post('plat_nomor');

    //     // Memeriksa apakah kendaraan dengan plat nomor tersebut sudah parkir
    //     $isAlreadyParked = $this->m_model->cek_kendaraan_parkir($plat_nomor);

    //     $data['isAlreadyParked'] = $isAlreadyParked;

    //     if (!$isAlreadyParked) {
    //         $kode = $this->generateRandomCode();
    //         $merk = $this->input->post('merk');
    //         $jenis = $this->input->post('jenis');
    //         // $plat_nomor = $this->input->post('$plat_nomor');

    //         date_default_timezone_set('Asia/Jakarta');
    //         $currenttime = date('H:i:s');

    //         $data = [
    //             'id_pengguna' => $this->session->userdata('id'),
    //             'kode' => $kode,
    //             'plat_nomor' => $plat_nomor,
    //             'merk' => $merk,
    //             'jenis' => $jenis,
    //             'jam_masuk' => $currenttime,
    //             'status' => 'sedang parkir'
    //         ];

    //         $this->m_model->tambah_data('tb_daftar_parkir', $data);
    //         redirect(base_url('pengguna/'));
    //     } else {
    //         // Jika sudah parkir, berikan pesan kesalahan atau lakukan tindakan yang sesuai
    //         $error_message = "Silahkan keluar parkir terlebih dahulu";
    //         $redirect_url = base_url('pengguna/data_kendaraan');

    //         $this->load->view('pengguna/home', compact('error_message', 'redirect_url'));
    //     }
    // }

    // Pengguna.php
    public function aksi_masuk_parkir()
    {
        $plat_nomor = $this->input->post('plat_nomor');
    
        // Memeriksa apakah kendaraan dengan plat nomor tersebut sudah parkir
        $isAlreadyParked = $this->m_model->cek_kendaraan_parkir($plat_nomor);
    
        if (!$isAlreadyParked) {
            $kode = $this->generateRandomCode();
            $merk = $this->input->post('merk');
            $jenis = $this->input->post('jenis');
            $plat_nomor = $this->input->post('plat_nomor'); // Perbaikan di sini
    
            date_default_timezone_set('Asia/Jakarta');
            $currenttime = date('H:i:s');
    
            $data = [
                'id_pengguna' => $this->session->userdata('id'),
                'kode' => $kode,
                'plat_nomor' => $plat_nomor,
                'merk' => $merk,
                'jenis' => $jenis,
                'jam_masuk' => $currenttime,
                'status' => 'sedang parkir'
            ];
    
            $this->m_model->tambah_data('tb_daftar_parkir', $data);
            redirect(base_url('pengguna/'));
        } else {
            // Jika sudah parkir, berikan pesan kesalahan atau lakukan tindakan yang sesuai
            $error_message = "Silahkan keluar parkir terlebih dahulu";
            $redirect_url = base_url('pengguna/data_kendaraan');
    
            $this->load->view('pengguna/home', compact('error_message', 'redirect_url'));
        }
    }
    
    public function data_kendaraan()
    {
        $idPengguna = $this->session->userdata('id');
        $data_pengguna = $this->m_model->getByIdPengguna($idPengguna);
        $data['daftar'] = $data_pengguna;
        $this->load->view('pengguna/data_kendaraan', $data);
    }

    public function aksi_keluar()
    {
        // Validasi form
        $this->form_validation->set_rules('kode', 'Kode', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman sebelumnya
            redirect(base_url('pengguna/'));
        } else {
            // Jika validasi berhasil, lanjut dengan proses keluar
            $kode = $this->input->post('kode');

            $this->load->model('m_model');

            $data_kendaraan = $this->m_model->getDataKendaraan($kode);

            // memanggil model untuk keluar parkir dan hapus data parkir
            $this->m_model->keluarParkir($kode);

            date_default_timezone_set('Asia/Jakarta');

            // Simpan data ke session atau database history
            $history_data = array(
                'kode' => $kode,
                'jam_masuk' => $data_kendaraan['jam_masuk'],
                'plat_nomor' => $data_kendaraan['plat_nomor'],
                'merk' => $data_kendaraan['merk'],
                'jenis' => $data_kendaraan['jenis'],
                'jam_keluar' => date('Y-m-d H:i:s'),
            );

            // menyimpan data ke history parkir
            $this->m_model->simpanHistoryParkir($history_data);

            redirect(base_url('pengguna/data_kendaraan'));
        }
    }


}