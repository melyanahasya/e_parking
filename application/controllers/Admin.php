<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('upload');

        // kondisi untuk login sesuai role
        if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'admin') {
            redirect(base_url() . 'auth');
        }
    }

    public function index()
    {
        // Mendapatkan jumlah kendaraan dari model
        $data['jumlah_motor'] = $this->m_model->getJumlahKendaraan('motor');
        $data['jumlah_mobil'] = $this->m_model->getJumlahKendaraan('mobil');
        $data['jumlah_truk_bus_lainnya'] = $this->m_model->getJumlahKendaraan('truk');


        $data['daftar'] = $this->m_model->get_data('tb_daftar_parkir')->result();
        $this->load->view('admin/daftar_kendaraan', $data);
    }

    public function history_kendaraan()
    {
        $data['result'] = $this->m_model->get_data('history_parkir')->result();
        $this->load->view('admin/history', $data);
    }



}