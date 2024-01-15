<?php

class M_model extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_by_id($tabel, $id_column, $id)
    {
        $data = $this->db->where($id_column, $id)->get($tabel);
        return $data;
    }

    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    public function tambah_data($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id($table);
    }

    public function generateRandomCode($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomCode = '';

        for ($i = 0; $i < $length; $i++) {
            $randomCode .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomCode;
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

    public function getByIdPengguna($idPengguna)
    {
        $this->db->select('tb_daftar_parkir.*, tb_login.username');
        $this->db->where('tb_daftar_parkir.id_pengguna', $idPengguna);
        $this->db->join('tb_login', 'tb_login.id = tb_daftar_parkir.id_pengguna', 'left');
        $query = $this->db->get('tb_daftar_parkir');
        return $query->result();
    }

 
    public function cek_kendaraan_parkir($plat_nomor)
    {
        $this->db->where('plat_nomor', $plat_nomor);
        $this->db->where('status', 'sedang parkir');
        $query = $this->db->get('tb_daftar_parkir');

        return $query->num_rows() > 0;
    }

    public function getJumlahKendaraan($jenis)
    {
        if ($jenis === 'lainnya') {
            $this->db->where_not_in('jenis', ['motor', 'mobil']);
        } else {
            $this->db->where('jenis', $jenis);
        }

        return $this->db->count_all_results('tb_daftar_parkir');
    }
}