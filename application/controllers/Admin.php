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
        // if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'admin') {
        //     redirect(base_url() . 'auth');
        // }
    }

    public function history_kendaraan()
    {
        $data['result'] = $this->m_model->get_data('history_parkir')->result();
        $this->load->view('admin/history', $data);
    }
 

}