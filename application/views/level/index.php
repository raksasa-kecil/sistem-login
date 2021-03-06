<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg">
        <h1 class="h3 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- End of Page Heading -->

    <!-- Content -->
    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg">

        <a href="<?= base_url('admin/tambahlevel'); ?>" class="btn btn-primary mb-3">Tambah</a>

        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center w-100" id="myTable">
                <thead class="bg-primary text-white ">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Level</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-black">
                    <?php $i = 1; ?>
                    <?php foreach ($level as $l) : ?>
                        <tr>
                            <td scope="row" class="text-center"><?= $i; ?></td>
                            <td><?= $l->level; ?></td>
                            <td class="text-nowrap">
                                <a href="<?= base_url('admin/levelaccess/' . $l->id_level); ?>" class="btn btn-success">
                                    <i class="fas fa-user-shield"></i>
                                </a>
                                <a href="<?= base_url('admin/ubahlevel/' . $l->id_level); ?>" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('admin/hapuslevel/' . $l->id_level); ?>" class="button-delete btn btn-danger">
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
<!-- Akhir Modal -->

<?php require_once('application/views/templates/footer.php'); ?>

<!-- Script -->
<!-- Akhir Script -->