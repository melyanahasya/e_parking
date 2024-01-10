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

    public function history_kendaraan()
    {
        $data['result'] = $this->m_model->get_data('history_parkir')->result();
        $this->load->view('pengguna/history', $data);
    }

    public function daftar_kendaraan()
    {
        $data['daftar'] = $this->m_model->get_data('tb_daftar_parkir')->result();
        $this->load->view('pengguna/daftar_kendaraan', $data);
    }

}