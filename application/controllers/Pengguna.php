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
        if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'pengguna') {
            redirect(base_url() . 'auth');
        }
    }

    // menu izin
    public function index()
    {
        $this->load->view('pengguna/home');
    }

    // Fungsi untuk membuat kode acak
    private function generateRandomCode($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomCode = '';

        for ($i = 0; $i < $length; $i++) {
            $randomCode .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomCode;
    }

    public function aksi_masuk_parkir()
    {

        // echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        $plat_nomor = $this->input->post('plat_nomor');

        // Memeriksa apakah kendaraan dengan plat nomor tersebut sudah parkir
        $isAlreadyParked = $this->m_model->cek_kendaraan_parkir($plat_nomor);

        if (!$isAlreadyParked) {
            // Jika belum parkir, lanjutkan proses parkir
            $kode = $this->generateRandomCode();
            $merk = $this->input->post('merk');
            $jenis = $this->input->post('jenis');

            date_default_timezone_set('Asia/Jakarta');
            $currenttime = date('H:i:s');

            $data = [
                'id_pengguna' => $this->session->userdata('id'),
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
        // else {
            // Jika sudah parkir, berikan pesan kesalahan atau lakukan tindakan yang sesuai
    //         echo "<script>
    //     document.addEventListener('DOMContentLoaded', function() {
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Kendaraan sudah parkir',
    //             text: 'Kendaraan dengan plat nomor $plat_nomor sudah parkir.',
    //             showConfirmButton: false
    //         });
    //         setTimeout(function(){
    //         window.location.href = '" . base_url('pengguna') . "';
    //         }, 3000);
    //     });
    //   </script>";
        // }
    }



    public function data_kendaraan()
    {
        $idPengguna = $this->session->userdata('id');
        $data_pengguna = $this->m_model->getByIdPengguna($idPengguna);
        $data['daftar'] = $data_pengguna;
        $this->load->view('pengguna/data_kendaraan', $data);
    }

}