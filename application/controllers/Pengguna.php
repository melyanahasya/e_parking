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

        // kondisi untuk login sesuai role
        // if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'karyawan') {
        //     redirect(base_url() . 'auth');
        // }
    }

    // menu izin
    public function index()
    {
        $this->load->view('pengguna/home');
    }

  // Fungsi untuk membuat kode acak
    private function generateRandomCode($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomCode = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomCode .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $randomCode;
    }
    
    public function aksi_masuk_parkir()
    {
        // Menggunakan fungsi generateRandomCode() untuk membuat kode acak
        $kode = $this->generateRandomCode();
        $plat_nomor = $this->input->post('plat_nomor');
        $merk = $this->input->post('merk');
        $jenis = $this->input->post('jenis');
    
        $currenttime = date('H:i:s');

        $data = [
            'kode' => $kode, // Menambahkan kode acak
            'plat_nomor' => $plat_nomor,
            'merk' => $merk,
            'jenis' => $jenis,
            'jam_masuk' => $currenttime,
            'status' => 'sedang parkir'
        ];
        $this->m_model->tambah_data('tb_daftar_parkir', $data);
        redirect(base_url('pengguna'));
    }
    
  
    public function daftar_kendaraan()
    {
        $data['daftar'] = $this->m_model->get_data('tb_daftar_parkir')->result();
        $this->load->view('pengguna/daftar_kendaraan', $data);
    }

}