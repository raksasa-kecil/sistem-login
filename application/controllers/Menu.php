<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sistem_m');
        security();
    }

    // -------------------------------------------------------------------
    // --- CONTROLLER MENU ---
    // --- Data Menu ---
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['menu'] = $this->Sistem_m->getMenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/foot');
    }
    // --- Akhir Data Menu ---

    // --- Tambah Menu ---
    public function tambahMenu()
    {
        $this->form_validation->set_rules('menu', 'menu', 'required');
        $this->form_validation->set_rules('urutan', 'urutan', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Menu Management';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/tambah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Sistem_m->insertMenu();
            $this->session->set_flashdata('flash', 'Data Berhasil Ditambahkan');
            redirect('menu');
        }
    }
    // --- Akhir Tambah Menu ---

    // --- Ubah Menu ---
    public function ubahMenu($id_menu)
    {
        $this->form_validation->set_rules('menu', 'menu', 'required');
        $this->form_validation->set_rules('urutan', 'urutan', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Ubah User';
            $data['menu'] = $this->Sistem_m->getWhereMenu($id_menu);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/ubah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Sistem_m->updateMenu();
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('menu');
        }
    }
    // --- Akhir Ubah Menu ---

    // --- Hapus Menu ---
    public function hapusMenu($id_menu)
    {
        $this->Sistem_m->deleteMenu($id_menu);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
            redirect('menu');
        }
    }
    // --- Akhir Hapus Menu ---
    // --- AKHIR CONTROLLER MENU ---
    // -------------------------------------------------------------------


    // -------------------------------------------------------------------
    // --- CONTROLLER SUBMENU ---
    // --- Data Submenu ---
    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['submenu'] = $this->Sistem_m->getSubmenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('submenu/index', $data);
        $this->load->view('templates/foot');
    }
    // --- Akhir Data Submenu ---

    // --- Tambah Submenu ---
    public function tambahSubmenu()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('id_menu', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        $this->form_validation->set_rules('urutan_submenu', 'urutan', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Submenu Management';
            $data['menu'] = $this->Sistem_m->getMenu();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('submenu/tambah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Sistem_m->insertSubmenu();
            $this->session->set_flashdata('flash', 'Data Berhasil Ditambahkan');
            redirect('menu/submenu');
        }
    }
    // --- Akhir Tambah Submenu ---

    // --- Ubah Submenu ---
    public function ubahSubmenu($id_submenu)
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('id_menu', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        $this->form_validation->set_rules('urutan_submenu', 'urutan', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Submenu Management';
            $data['menu'] = $this->Sistem_m->getMenu();
            $data['submenu'] = $this->Sistem_m->getWhereSubmenu($id_submenu);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('submenu/ubah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Sistem_m->updateSubmenu();
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('menu/submenu');
        }
    }
    // --- Akhir Ubah Submenu ---

    // --- Hapus Submenu ---
    public function hapusSubmenu($id_submenu)
    {
        $this->Sistem_m->deleteSubmenu($id_submenu);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
            redirect('menu/submenu');
        }
    }
    // --- Akhir Hapus Submenu ---
    // --- AKHIR CONTROLLER SUBMENU ---
    // -------------------------------------------------------------------
}
