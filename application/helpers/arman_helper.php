<?php

function security()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('login');
    } else {
        $id_level = $ci->session->userdata('id_level');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('tabel_menu', ['menu' => $menu])->row();
        $id_menu = $queryMenu->id_menu;

        $aksesUser = $ci->db->get_where('tabel_akses', [
            'id_level' => $id_level,
            'id_menu' => $id_menu
        ]);

        if ($aksesUser->num_rows() < 1) {
            redirect('login/error');
        }
    }

    function check_access($id_level, $id_menu)
    {
        $ci = get_instance();

        $ci->db->where('id_level', $id_level);
        $ci->db->where('id_menu', $id_menu);

        $result = $ci->db->get('tabel_akses');

        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }
    }
}
