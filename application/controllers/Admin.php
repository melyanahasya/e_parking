<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('pagination');
        $this->load->library('upload');

        // kondisi untuk menampilkan page sesuai role
        if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'admin') {
            redirect(base_url() . 'auth');
        }
    }

    public function index()
    {
        $data['jumlah_motor'] = $this->m_model->getJumlahKendaraan('motor');
        $data['jumlah_mobil'] = $this->m_model->getJumlahKendaraan('mobil');
        $data['jumlah_truk_bus_lainnya'] = $this->m_model->getJumlahKendaraan('lainnya');

        $config['base_url'] = base_url('admin/');
        $config['total_rows'] = $this->db->count_all('tb_daftar_parkir');
        $config['per_page'] = 5; 

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->db->select('tb_daftar_parkir.*, tb_login.username');
        $this->db->from('tb_daftar_parkir');
        $this->db->join('tb_login', 'tb_daftar_parkir.id_pengguna = tb_login.id', 'left');
        $this->db->limit($config['per_page'], $page);

        $data['daftar'] = $this->db->get()->result();
        $this->load->view('admin/daftar_kendaraan', $data);
    }

    // public function history_kendaraan()
    // {
    //     $this->db->select('history_parkir.*, tb_login.username');
    //     $this->db->from('history_parkir');
    //     $this->db->join('tb_login', 'history_parkir.id_pengguna = tb_login.id', 'left');
    //     $data['result'] = $this->db->get()->result();

    //     $this->load->view('admin/history', $data);
    // }

    public function history_kendaraan()
    {
        $config['base_url'] = base_url('admin/history_kendaraan');
        $config['total_rows'] = $this->db->count_all('history_parkir'); // Jumlah total baris data
        $config['per_page'] = 5; // Jumlah data per halaman

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->db->select('history_parkir.*, tb_login.username');
        $this->db->from('history_parkir');
        $this->db->join('tb_login', 'history_parkir.id_pengguna = tb_login.id', 'left');
        $this->db->limit($config['per_page'], $page);

        $data['result'] = $this->db->get()->result();
        $this->load->view('admin/history', $data);
    }


    public function delete_data($id)
    {
        $this->m_model->delete_relasi($id);
        $this->m_model->delete('tb_daftar_parkir', 'id', $id);
        redirect(base_url('admin/'));
    }

}