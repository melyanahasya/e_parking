<?php

class M_model extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }

    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    public function index()
    {
        $this->load->view('login');
    }

    // functin register admin
    public function register_admin($email, $username, $role, $password)
    {
        $data = array(
            'email' => $email,
            'username' => $username,
            'role' => $role,
            'password' => $password
        );

        $this->db->insert('tb_login', $data);
    }

    // function register user
    public function register_user($email, $username, $role, $password)
    {
        $data = array(
            'email' => $email,
            'username' => $username,
            'role' => $role,
            'password' => $password
        );

        $this->db->insert('tb_login', $data);
    }
}