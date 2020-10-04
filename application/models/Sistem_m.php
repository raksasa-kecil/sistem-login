<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sistem_m extends CI_Model
{
    // -------------------------------------------------------------------
    // --- MODEL LEVEL ---
    public function getLevel()
    {
        $this->db->order_by('id_level', 'DESC');
        return $this->db->get('tabel_level')->result();
    }

    public function insertLevel()
    {
        $data = [
            'level' => $this->input->post('level')
        ];

        $this->db->insert('tabel_level', $data);
    }

    public function getWhereLevel($id_level)
    {
        $where = ['id_level' => $id_level];
        return $this->db->get_where('tabel_level', $where)->row();
    }

    public function updateLevel()
    {
        $data = [
            'level' => $this->input->post('level')
        ];

        $id_level = $this->input->post('id_level');
        $this->db->where('id_level', $id_level);
        $this->db->update('tabel_level', $data);
    }

    public function deleteLevel($id_level)
    {
        $this->db->where('id_level', $id_level);
        $this->db->delete('tabel_level');
    }
    // --- AKHIR MODEL LEVEL ---
    // -------------------------------------------------------------------


    // -------------------------------------------------------------------
    // --- MODEL USER ---
    public function getUser()
    {
        $this->db->join('tabel_level', 'tabel_level.id_level = tabel_user.id_level');
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get('tabel_user')->result();
    }

    public function insertUser()
    {
        $data = [
            'id_level' => $this->input->post('id_level'),
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'aktif' => $this->input->post('aktif'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'image' => 'no-profile.png',
            'date_created' => time()
        ];

        $this->db->insert('tabel_user', $data);
    }

    public function uploadUser($url)
    {
        $config['upload_path']          = './assets/img/profile/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 11024;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect($url);
        } else {
            $data = $this->upload->data();
            return $data['file_name'];
        }
    }

    public function getWhereUser($id_user)
    {
        $this->db->join('tabel_level', 'tabel_level.id_level = tabel_user.id_level');
        $where = ['id_user' => $id_user];
        return $this->db->get_where('tabel_user', $where)->row();
    }

    public function updateUser()
    {
        $id_user = $this->input->post('id_user');
        $url = 'admin/ubahuser/' . $id_user;
        $data = [
            'nama_user' => $this->input->post('nama_user'),
            'id_level' => $this->input->post('id_level'),
            'aktif' => $this->input->post('aktif'),
            'image' => !empty($_FILES['image']['name']) ? $this->uploadUser($url) : $this->input->post('imageOld')
        ];

        $id_user = $this->input->post('id_user');
        $this->db->where('id_user', $id_user);
        $this->db->update('tabel_user', $data);
    }

    public function deleteUser($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tabel_user');
    }
    // --- AKHIR MODEL USER ---
    // -------------------------------------------------------------------


    // -------------------------------------------------------------------
    // --- MODEL MENU ---
    public function getMenu()
    {
        $this->db->order_by('id_menu', 'DESC');
        return $this->db->get('tabel_menu')->result();
    }

    public function insertMenu()
    {
        $data = [
            'menu' => $this->input->post('menu'),
            'urutan' => $this->input->post('urutan')
        ];

        $this->db->insert('tabel_menu', $data);
    }

    public function getWhereMenu($id_menu)
    {
        $where = ['id_menu' => $id_menu];
        return $this->db->get_where('tabel_menu', $where)->row();
    }

    public function updateMenu()
    {
        $data = [
            'menu' => $this->input->post('menu'),
            'urutan' => $this->input->post('urutan')
        ];

        $id_menu = $this->input->post('id_menu');
        $this->db->where('id_menu', $id_menu);
        $this->db->update('tabel_menu', $data);
    }

    public function deleteMenu($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->delete('tabel_menu');
    }
    // --- AKHIR MODEL MENU ---
    // -------------------------------------------------------------------


    // -------------------------------------------------------------------
    // --- MODEL SUBMENU ---
    public function getSubmenu()
    {
        $this->db->join('tabel_menu', 'tabel_menu.id_menu = tabel_submenu.id_menu');
        $this->db->order_by('id_submenu', 'DESC');
        return $this->db->get('tabel_submenu')->result();
    }

    public function insertSubmenu()
    {
        $data = [
            'title' => $this->input->post('title'),
            'id_menu' => $this->input->post('id_menu'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'aktif' => $this->input->post('aktif'),
            'urutan_submenu' => $this->input->post('urutan_submenu')
        ];

        $this->db->insert('tabel_submenu', $data);
    }

    public function getWhereSubmenu($id_submenu)
    {
        $this->db->join('tabel_menu', 'tabel_menu.id_menu = tabel_submenu.id_menu');
        $where = ['id_submenu' => $id_submenu];
        return $this->db->get_where('tabel_submenu', $where)->row();
    }

    public function updateSubmenu()
    {
        $data = [
            'title' => $this->input->post('title'),
            'id_menu' => $this->input->post('id_menu'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'aktif' => $this->input->post('aktif'),
            'urutan_submenu' => $this->input->post('urutan_submenu')
        ];

        $id_submenu = $this->input->post('id_submenu');
        $this->db->where('id_submenu', $id_submenu);
        $this->db->update('tabel_submenu', $data);
    }

    public function deleteSubmenu($id_submenu)
    {
        $this->db->where('id_submenu', $id_submenu);
        $this->db->delete('tabel_submenu');
    }
    // --- AKHIR MODEL SUBMENU ---
    // -------------------------------------------------------------------


    // -------------------------------------------------------------------
    // --- MODEL ??? ---
    // --- AKHIR MODEL ??? ---
    // -------------------------------------------------------------------

}
