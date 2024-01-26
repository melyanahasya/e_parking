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
        $this->load->library('pdf');
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
    public function pembayaran()
    {
        $this->load->view('pengguna/pembayaran');
    }

    // Membuat kode acak
    private function generateRandomCode($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomCode = '';

        for ($i = 0; $i < $length; $i++) {
            $randomCode .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomCode;
    }

    // Function masuk parkir
    public function aksi_masuk_parkir()
    {
        $plat_nomor = $this->input->post('plat_nomor');

        $isAlreadyParked = $this->m_model->cek_kendaraan_parkir($plat_nomor);

        // Menyimpan status apakah kendaraan sudah terparkir atau belum ke dalam variabel data
        $data['isAlreadyParked'] = $isAlreadyParked;

        // Jika belum parkir, akan melanjutkan proses
        if (!$isAlreadyParked) {
            $kode = $this->generateRandomCode();
            $merk = $this->input->post('merk');
            $jenis = $this->input->post('jenis');

            date_default_timezone_set('Asia/Jakarta');
            $jam_masuk = date('H:i:s');

            $nominal_masuk = 2000;

            $data = [
                'id_pengguna' => $this->session->userdata('id'),
                'kode' => $kode,
                'plat_nomor' => $plat_nomor,
                'merk' => $merk,
                'jenis' => $jenis,
                'jam_masuk' => $jam_masuk,
                'status' => 'sedang parkir',
                'nominal_bayar' => $nominal_masuk
            ];

            $this->m_model->tambah_data('tb_daftar_parkir', $data);
            redirect(base_url('pengguna/data_kendaraan'));
        } else {
            // Jika kendaraan sudah terparkir, tampilkan pesan kesalahan
            $error_message = "Anda Sudah Parkir, Silahkan keluar parkir terlebih dahulu";
            $redirect_url = base_url('pengguna/');

            $this->load->view('pengguna/home', compact('error_message', 'redirect_url'));
        }
    }

    public function data_kendaraan()
    {
        // Mendapatkan ID pengguna yang login
        $idPengguna = $this->session->userdata('id');

        // Mengambil id data pengguna dari m_model
        $data_pengguna = $this->m_model->getByIdPengguna($idPengguna);

        $data['daftar'] = $data_pengguna;
        $this->load->view('pengguna/data_kendaraan', $data);
    }

    // public function aksi_keluar()
    // {
    //     $this->form_validation->set_rules('nominal_bayar', 'Nominal', 'required');
        
    //     if ($this->form_validation->run() == FALSE) {
    //         // Jika validasi gagal, kembali ke halaman sebelumnya
    //         redirect(base_url('pengguna/'));
    //     } else {
    //         // Jika validasi berhasil, lanjut dengan proses keluar
    //         $nominal_bayar = $this->input->post('nominal_bayar');
        
    //         $this->load->model('m_model');
        
    //         $data_kendaraan = $this->m_model->getDataKendaraan($nominal_bayar);
        
    //         // Check if the nominal_bayar is sufficient for payment
    //         if ($nominal_bayar >= $data_kendaraan['nominal_bayar']) {
    //             $this->m_model->keluarParkir($nominal_bayar);
        
    //             date_default_timezone_set('Asia/Jakarta');
        
    //             // Simpan data ke session atau database history
    //             $history_data = array(
    //                 'nominal_bayar' => $nominal_bayar,
    //                 'id_pengguna' => $this->session->userdata('id'),
    //                 'jam_masuk' => $data_kendaraan['jam_masuk'],
    //                 'kode' => $data_kendaraan['kode'],
    //                 'plat_nomor' => $data_kendaraan['plat_nomor'],
    //                 'merk' => $data_kendaraan['merk'],
    //                 'jenis' => $data_kendaraan['jenis'],
    //                 'status' => "selesai",
    //                 'jam_keluar' => date('Y-m-d H:i:s'),
    //             );
        
    //             $this->m_model->simpanHistoryParkir($history_data);
        
    //             redirect(base_url('pengguna/data_kendaraan'));
    //         } else {
    //             redirect(base_url('pengguna/pembayaran'));
    //         }
    //     }
    // }

    public function aksi_keluar()
    {
        $this->form_validation->set_rules('nominal_bayar', 'Nominal', 'required|numeric|greater_than[0]');
        
        $nominal_bayar = $this->input->post('nominal_bayar');
        
        if ($nominal_bayar <= 0) {
            $error_message = "Nominal bayar tidak valid. Pastikan jumlah pembayaran lebih dari 0.";
            $redirect_url = base_url('pengguna/pembayaran');
            $this->load->view('pengguna/home', compact('error_message', 'redirect_url'));
            return;
        }
        
        if ($this->form_validation->run() == FALSE) {
            redirect(base_url('pengguna/'));
        } else {
            $this->load->model('m_model');
            $data_kendaraan = $this->m_model->getDataKendaraan($nominal_bayar);
        
            if ($data_kendaraan === null) {
                $error_message = "Masukkan nominal pas untuk melakukan pembayaran.";
                $redirect_url = base_url('pengguna/pembayaran');
                $this->load->view('pengguna/home', compact('error_message', 'redirect_url'));
                return;
            }
            if ($data_kendaraan === $nominal_bayar) {
                $success_message = "Berhasil Melakukan Pembayaran.";
                $redirect_url = base_url('pengguna/data_kendaraan');
                $this->load->view('pengguna/data_kendaraan', compact('success_message', 'redirect_url'));
                return;
            }
        
            if ($nominal_bayar >= $data_kendaraan['nominal_bayar']) {
                $this->db->trans_start();
        
                date_default_timezone_set('Asia/Jakarta');
        
                $history_data = array(
                    'nominal_bayar' => $nominal_bayar,
                    'id_pengguna' => $this->session->userdata('id'),
                    'jam_masuk' => $data_kendaraan['jam_masuk'],
                    'kode' => $data_kendaraan['kode'],
                    'plat_nomor' => $data_kendaraan['plat_nomor'],
                    'merk' => $data_kendaraan['merk'],
                    'jenis' => $data_kendaraan['jenis'],
                    'status' => "selesai",
                    'jam_keluar' => date('Y-m-d H:i:s'),
                );
        
                $this->m_model->keluarParkir($nominal_bayar);
                $this->m_model->simpanHistoryParkir($history_data);
        
                $this->db->trans_complete();
        
            
            } else {
                $error_message = "Nominal bayar tidak mencukupi. Silakan cek kembali jumlah pembayaran.";
                $redirect_url = base_url('pengguna/pembayaran');
                $this->load->view('pengguna/home', compact('error_message', 'redirect_url'));
            }
        }
    }

//     public function aksi_keluar()
// {
//     $this->form_validation->set_rules('nominal_bayar', 'Nominal', 'required|numeric|greater_than[0]');
    
//     $nominal_bayar = $this->input->post('nominal_bayar');
    
//     if ($nominal_bayar <= 0) {
//         $error_message = "Nominal bayar tidak valid. Pastikan jumlah pembayaran lebih dari 0.";
//         $redirect_url = base_url('pengguna/pembayaran');
//         $this->load->view('pengguna/home', compact('error_message', 'redirect_url'));
//         return;
//     }
    
//     if ($this->form_validation->run() == FALSE) {
//         redirect(base_url('pengguna/'));
//     } else {
//         $this->load->model('m_model');
//         $data_kendaraan = $this->m_model->getDataKendaraan($nominal_bayar);
    
//         if ($data_kendaraan === null) {
//             $error_message = "Masukkan nominal pas untuk melakukan pembayaran.";
//             $redirect_url = base_url('pengguna/pembayaran');
//             $this->load->view('pengguna/home', compact('error_message', 'redirect_url'));
//             return;
//         }

//         // Validasi waktu
//         date_default_timezone_set('Asia/Jakarta');
//         $jam_keluar = strtotime(date('H:i:s'));
//         $jam_masuk = strtotime($data_kendaraan['jam_masuk']);
//         $selisih_waktu = ($jam_keluar - $jam_masuk) / (60 * 60); // Selisih waktu dalam jam

//         // Jika waktu parkir lebih dari 12 jam, tambahkan 2000 untuk setiap kelipatan 12 jam
//         $tambahan_nominal = 0;
//         if ($selisih_waktu > 12) {
//             $tambahan_nominal = ceil($selisih_waktu / 12) * 2000;
//         }

//         // Total nominal bayar setelah ditambahkan tambahan
//         $total_nominal_bayar = $nominal_bayar + $tambahan_nominal;

//         if ($total_nominal_bayar >= $data_kendaraan['nominal_bayar']) {
//             $this->db->trans_start();

//             $history_data = array(
//                 'nominal_bayar' => $total_nominal_bayar,
//                 'id_pengguna' => $this->session->userdata('id'),
//                 'jam_masuk' => $data_kendaraan['jam_masuk'],
//                 'kode' => $data_kendaraan['kode'],
//                 'plat_nomor' => $data_kendaraan['plat_nomor'],
//                 'merk' => $data_kendaraan['merk'],
//                 'jenis' => $data_kendaraan['jenis'],
//                 'status' => "selesai",
//                 'jam_keluar' => date('Y-m-d H:i:s'),
//             );

//             $this->m_model->keluarParkir($total_nominal_bayar);
//             $this->m_model->simpanHistoryParkir($history_data);

//             $this->db->trans_complete();
//         } else {
//             $error_message = "Nominal bayar tidak mencukupi. Silakan cek kembali jumlah pembayaran.";
//             $redirect_url = base_url('pengguna/pembayaran');
//             $this->load->view('pengguna/home', compact('error_message', 'redirect_url'));
//         }
//     }
// }

    

    // Function Invoice
    public function struk_pembayaran()
    {
        // Mendapatkan ID pengguna yang sedang login
        $id_pengguna_login = $this->session->userdata('id');

        // Memeriksa apakah pengguna memiliki parkir yang sedang berlangsung
        $this->db->where('id_pengguna', $id_pengguna_login);
        $this->db->where('status', 'sedang parkir');
        $hasActiveParking = $this->db->count_all_results('tb_daftar_parkir') > 0;

        if (!$hasActiveParking) {
            redirect(base_url('pengguna/'));
        }

        $this->db->select('tb_daftar_parkir.*, tb_login.username');
        $this->db->from('tb_daftar_parkir');
        $this->db->join('tb_login', 'tb_daftar_parkir.id_pengguna = tb_login.id', 'left');
        $this->db->where('tb_daftar_parkir.id_pengguna', $id_pengguna_login);
        $data['data_pembayaran'] = $this->db->get()->result_array();

        date_default_timezone_set('Asia/Jakarta');
        // Mendapatkan waktu saat ini
        $current_time = date('d M Y');

        foreach ($data['data_pembayaran'] as &$row) {
            $row['jam_masuk_minus_12_hours'] = date(' H:i:s', strtotime($row['jam_masuk'] . ' -12 hours'));
        }

        $data['current_time'] = $current_time;

        $this->load->view('pengguna/struk_pembayaran', $data);
    }

  // export Invoice by pdf
//   public function export_invoice()
//   {
//       // untuk mengambil seluruh data di tabel pembayaran
//       $data['datas'] = $this->m_model->get_data('tb_daftar_parkir')->result();
//     //   $data['nama'] = 'tb_daftar_parkir';

//       // berfungsi untuk mengecek / mengambil url ke 3
//       //  arti kondisi :  jika uri segment ketiga nya pdf maka akan menjalankan codingan di bawahnya
//       if ($this->uri->segment(3) == "pdf") {
//           $this->load->library('pdf');
//           $this->pdf->load_view('pengguna/struk_pdf', $data);
//           $this->pdf->render();
//           $this->pdf->stream("struk.pdf", array("Attachment" => true));
//       } else {
//           $this->load->view('pengguna/struk_pembayaran', $data);
//       }
//   }

// public function struk_pembayaran()
// {
//     // Load library FPDF
//     $this->load->library('fpdf');

//     // Mendapatkan ID pengguna yang sedang login
//     $id_pengguna_login = $this->session->userdata('id');

//     // Memeriksa apakah pengguna memiliki parkir yang sedang berlangsung
//     $this->db->where('id_pengguna', $id_pengguna_login);
//     $this->db->where('status', 'sedang parkir');
//     $hasActiveParking = $this->db->count_all_results('tb_daftar_parkir') > 0;

//     if (!$hasActiveParking) {
//         redirect(base_url('pengguna/'));
//     }

//     $this->db->select('tb_daftar_parkir.*, tb_login.username');
//     $this->db->from('tb_daftar_parkir');
//     $this->db->join('tb_login', 'tb_daftar_parkir.id_pengguna = tb_login.id', 'left');
//     $this->db->where('tb_daftar_parkir.id_pengguna', $id_pengguna_login);
//     $data['data_pembayaran'] = $this->db->get()->result_array();

//     date_default_timezone_set('Asia/Jakarta');
//     // Mendapatkan waktu saat ini
//     $current_time = date('d M Y');

//     foreach ($data['data_pembayaran'] as &$row) {
//         $row['jam_masuk_minus_12_hours'] = date(' H:i:s', strtotime($row['jam_masuk'] . ' -12 hours'));
//     }

//     $data['current_time'] = $current_time;

//     // Load view pdf_template.php
//     $this->load->view('pengguna/pdf_template', $data);
// }


}