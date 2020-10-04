<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }

        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Halaman Login';
            $this->load->view('login/index', $data);
        } else {
            // jika validasi berhasil
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tabel_user', ['username' => $username])->row();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user->aktif == 'Yes') {
                // cek password
                if (password_verify($password, $user->password)) {
                    $data = [
                        'username' => $user->username,
                        'id_level' => $user->id_level
                    ];
                    $this->session->set_userdata($data);
                    if ($user->id_level == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('login');
        }
    }


    public function registrasi()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }

        $this->form_validation->set_rules('nama_user', 'nama', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[tabel_user.username]');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[tabel_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Form Registrasi';
            $this->load->view('login/registrasi', $data);
        } else {
            $data = [
                'id_level' => 2,
                'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'imguser' => 'noprofile.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'aktif' => 'Yes',
                'date_created' => time()
            ];
            $this->db->insert('tabel_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_level');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout Berhasil!</div>');
        redirect('Login');
    }

    public function error()
    {
        $data['title'] = 'No Access';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('login/error', $data);
        $this->load->view('templates/foot');
    }
}
