<!-- Sidebar -->
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code icon"></i>
        </div>
        <div class="sidebar-brand-text mx-3">WPU Login</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- QUERY MENU -->
    <?php
    $id_level = $this->session->userdata('id_level');
    $queryMenu = "SELECT `tabel_menu`.`id_menu`, `menu`
                    FROM `tabel_menu` JOIN `tabel_akses`
                    ON `tabel_menu`.`id_menu` = `tabel_akses`.`id_menu`
                    WHERE `tabel_akses`.`id_level` = $id_level
                    ORDER BY `tabel_menu`.`urutan` ASC
";
    $menu = $this->db->query($queryMenu)->result();
    ?>
    <!-- AKHIR QUERY MENU -->

    <?php $url = $this->uri->segment(1); ?>

    <!-- LOOPING MNEU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m->menu; ?>
        </div>

        <!-- SUB-MENU SESUAI MENU -->
        <?php
        $id_menu = $m->id_menu;
        $querySubMenu = "SELECT *
                            FROM `tabel_submenu` JOIN `tabel_menu`
                            ON `tabel_submenu`.`id_menu` = `tabel_menu`.`id_menu`
                            WHERE `tabel_submenu`.`id_menu` = $id_menu
                            AND `tabel_submenu`. `aktif` = 'Yes'
                            ORDER BY `tabel_submenu`.`urutan_submenu` ASC
                        ";
        $subMenu = $this->db->query($querySubMenu)->result();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm->title) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm->url); ?>">
                    <i class="<?= $sm->icon; ?>"></i>
                    <span><?= $sm->title; ?></span></a>
                </li>
            <?php endforeach; ?>
            <!-- AKHIR SUB-MENU SESUAI MENU -->

            <hr class="sidebar-divider mt-3">

        <?php endforeach; ?>
        <!-- AKHIR LOOPING MNEU -->


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->