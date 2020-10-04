<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sistem_m');
        security();
    }

    // -------------------------------------------------------------------
    // --- CONTROLLER DASHBOARD ---
    public function index()
    {
        $data['title'] = 'Dashboard';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/foot');
    }
    // --- AKHIR CONTROLLER DASHBOARD ---
    // -------------------------------------------------------------------


    // -------------------------------------------------------------------
    // --- CONTROLLER USER ---
    // --- Data User ---
    public function user()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->Sistem_m->getUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/data', $data);
        $this->load->view('templates/foot');
    }
    // --- Akhir Data User ---

    // --- Tambah User ---
    public function tambahUser()
    {
        $this->form_validation->set_rules('id_level', 'level', 'required|trim');
        $this->form_validation->set_rules('nama_user', 'nama', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[tabel_user.username]');
        $this->form_validation->set_rules('aktif', 'aktif', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[tabel_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'User Management';
            $data['level'] = $this->Sistem_m->getLevel();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/tambah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Sistem_m->insertUser();
            $this->session->set_flashdata('flash', 'Data Berhasil Ditambahkan');
            redirect('admin/user');
        }
    }
    // --- Akhir Tambah User ---

    // --- Ubah User ---
    public function ubahUser($id_user)
    {
        $this->form_validation->set_rules('nama_user', 'nama lengkap', 'required|trim');
        $this->form_validation->set_rules('id_level', 'id_level', 'required');
        $this->form_validation->set_rules('aktif', 'aktif', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'User Management';
            $data['level'] = $this->Sistem_m->getLevel($id_user);
            $data['user'] = $this->Sistem_m->getWhereUser($id_user);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Sistem_m->updateUser();
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('admin/user');
        }
    }
    // --- Akhir Ubah User ---

    // --- Hapus User ---
    public function hapusUser($id_user)
    {
        $user = $this->Sistem_m->getWhereUser($id_user);
        unlink('./assets/img/profile/' . $user->image);
        $this->Sistem_m->deleteUser($id_user);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
            redirect('admin/user');
        }
    }
    // --- Akhir Hapus User ---

    // --- Detail User ---
    function getAjaxUser($id_user)
    {
        $data['user'] = $this->Sistem_m->getWhereUser($id_user);
        $this->load->view('user/detail', $data);
    }
    // --- Akhir Detail User ---
    // --- AKHIR CONTROLLER USER ---
    // -------------------------------------------------------------------


    // -------------------------------------------------------------------
    // --- CONTROLLER LEVEL ---
    // --- Data Level ---
    public function level()
    {
        $data['title'] = 'Level Management';
        $data['level'] = $this->Sistem_m->getLevel();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('level/index', $data);
        $this->load->view('templates/foot');
    }
    // --- Akhir Data Level ---

    // --- Tambah Level ---
    public function tambahLevel()
    {
        $this->form_validation->set_rules('level', 'level', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Level Management';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('level/tambah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Sistem_m->insertLevel();
            $this->session->set_flashdata('flash', 'Data Berhasil Ditambahkan');
            redirect('admin/level');
        }
    }
    // --- Akhir Tambah Level ---

    // --- Ubah Level ---
    public function ubahLevel($id_level)
    {
        $this->form_validation->set_rules('level', 'level', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Level Management';
            $data['level'] = $this->Sistem_m->getWhereLevel($id_level);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('level/ubah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Sistem_m->updateLevel();
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('admin/level');
        }
    }
    // --- Akhir Ubah Level ---

    // --- Hapus Level ---
    public function hapusLevel($id_level)
    {
        $this->Sistem_m->deleteLevel($id_level);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
            redirect('admin/level');
        }
    }
    // --- Akhir Hapus Level ---

    // --- Data Akses Level ---
    public function levelAccess($id_level)
    {
        $data['title'] = 'Level Management';

        $this->db->where('id_menu !=', 1); // untuk menghilangkan id_menu "1" pada tabel_menu
        $data['menu'] = $this->Sistem_m->getMenu();
        $data['level'] = $this->Sistem_m->getWhereLevel($id_level);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('level/level-akses', $data);
        $this->load->view('templates/foot');
    }
    // --- Akhir Data Akses Level ---

    // --- Ganti Akses ---
    public function changeAccess()
    {
        $id_menu = $this->input->post('id_menu');
        $id_level = $this->input->post('id_level');

        $data = [
            'id_level' => $id_level,
            'id_menu' => $id_menu
        ];

        $result = $this->db->get_where('tabel_akses', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('tabel_akses', $data);
        } else {
            $this->db->delete('tabel_akses', $data);
        }

        $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
    }
    // --- Akhir Ganti Akses ---
    // --- AKHIR CONTROLLER LEVEL ---
    // -------------------------------------------------------------------
}
