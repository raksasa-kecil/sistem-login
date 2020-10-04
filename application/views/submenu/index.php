<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg">
        <h1 class="h3 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- End of Page Heading -->

    <!-- Content -->
    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg">

        <a class="mb-3 btn btn-primary" href="<?= base_url('menu/tambahsubmenu'); ?>" role="button">
            Tambah
        </a>

        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center w-100" id="myTable">
                <thead class="bg-primary text-white ">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Urutan</th>
                        <th scope="col">Aktif</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class=" text-black">
                    <?php $i = 1; ?>
                    <?php foreach ($submenu as $m) : ?>
                        <tr>
                            <td scope="row" class="text-center"><?= $i; ?></td>
                            <td><?= $m->title; ?></td>
                            <td><?= $m->menu; ?></td>
                            <td><?= $m->url; ?></td>
                            <td><?= $m->icon; ?></td>
                            <td><?= $m->urutan_submenu; ?></td>
                            <td><?= $m->aktif; ?></td>
                            <td class="text-nowrap">
                                <a href="<?= base_url('menu/ubahsubmenu/' . $m->id_submenu); ?>" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('menu/hapussubmenu/' . $m->id_submenu); ?>" class="button-delete btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- End of Content -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<!-- AKhir Modal -->

<?php require_once('application/views/templates/footer.php'); ?>

<!-- Script -->
<!-- Akhir Script -->