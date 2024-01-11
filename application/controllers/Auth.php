<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('auth/login');
    }
    public function register_user()
    {

        $this->load->view('auth/register_user');
    }
    public function register_admin()
    {

        $this->load->view('auth/register_admin');
    }


    // public function aksi_login()
    // {
    //     $email = $this->input->post('email', true);
    //     $password = $this->input->post('password', true);
    //     $data = ['email' => $email,];
    //     $query = $this->m_model->getwhere('user', $data);
    //     $result = $query->row_array();


    //     if (!empty($result) && md5($password) === $result['password']) {
    //         $data = [
    //             'logged_in' => TRUE,
    //             'email' => $result['email'],
    //             'username' => $result['username'],
    //             'role' => $result['role'],
    //             'id' => $result['id'],
    //         ];
    //         $this->session->set_userdata($data);
    //         if ($this->session->userdata('role') == 'admin') {
    //             redirect(base_url() . "admin/");
    //         } elseif ($this->session->userdata('role') == 'user') {
    //             redirect(base_url() . "pengguna/");
    //         } else {
    //             redirect(base_url() . "admin/");
    //         }
    //     } else {
    //         redirect(base_url() . "auth");
    //     }
    // }

       //function aksi login
       public function aksi_login()
       {
           $email = $this->input->post('email', true);
           $password = $this->input->post('password', true);
       
           // Validasi jika data tidak terisi
           if (empty($email) || empty($password)) {
               $this->session->set_flashdata('error', 'Data harus di isi lengkap');
               redirect(base_url());
           }
       
           $data = ['email' => $email];
           $query = $this->m_model->getwhere('tb_login', $data);
           $result = $query->row_array();
       
           if (!empty($result)) {
               if (md5($password) === $result['password']) {
                   $data = [
                       'logged_in' => true,
                       'email' => $result['email'],
                    //    'username' => $result['username'],
                       'role' => $result['role'],
                       'id' => $result['id'],
                   ];
                   $this->session->set_userdata($data);
       
                   if ($result['role'] == 'supervisor') {
                       $this->session->set_flashdata('login_supervisor', 'Anda berhasil login');
                       redirect(base_url() . "supervisor");
                   } elseif ($result['role'] == 'operator') {
                       $this->session->set_flashdata('login_operator', 'Anda berhasil login');
                       redirect(base_url() . 'operator');
                   }
               } else {
                   // Password salah
                   $this->session->set_flashdata('error', 'Password salah');
                   redirect(base_url());
               }
           } else {
               // Email salah
               $this->session->set_flashdata('error', 'Email salah');
               redirect(base_url());
           }
       }

 public function aksi_register_admin()
    {
        // Validasi form
        $this->form_validation->set_rules('email', 'Email', 'trim|required|regex_match[/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/]');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,}$/]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke halaman registrasi
            $this->load->view('auth/register_admin');
        } else {
            // Jika validasi berhasil, simpan data ke database
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $role = $this->input->post('role');
            $password = md5($this->input->post('password'));

            // Panggil model untuk menyimpan data ke database
            $this->m_model->register_admin($email, $username, $role, $password);

            redirect('auth');
        }
    }

    public function aksi_register()
    {
        // Validasi form
        $this->form_validation->set_rules('email', 'Email', 'trim|required|regex_match[/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/]');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,}$/]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke halaman registrasi
            $this->load->view('auth/register_user');
        } else {
            // Jika validasi berhasil, simpan data ke database
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $role = $this->input->post('role');
            $password = md5($this->input->post('password'));

            // Panggil model untuk menyimpan data ke database
            $this->m_model->register_user($email, $username, $role, $password);

            redirect('auth');
        }
    }

   

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('tentangKami'));
    }

    //   public function logout()
    //   {
    //       $role = $this->session->userdata('role');
          
    //       if ($role === 'operator') {
    //           $this->session->set_flashdata('success_logout', 'Anda Berhasil Keluar');
    //       } elseif ($role === 'supervisor') {
    //           $this->session->set_flashdata('success_logout', 'Anda Berhasil Keluar');
    //       }
          
    //       $this->session->sess_destroy();
    //       redirect(base_url('auth'));
    //   }
      
}