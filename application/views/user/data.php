<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg">
        <h1 class="h3 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- End of Page Heading -->

    <!-- Content -->
    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg">

        <a class="mb-3 btn btn-primary" href="<?= base_url('admin/tambahuser'); ?>" role="button">
            Tambah
        </a>

        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center w-100" id="myTable">
                <thead class="bg-primary text-white ">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Level</th>
                        <th scope="col">Username</th>
                        <th scope="col">Aktif</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class=" text-black">
                    <?php $i = 1; ?>
                    <?php foreach ($user as $m) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $m->nama_user; ?></td>
                            <td><?= $m->level; ?></td>
                            <td><?= $m->username; ?></td>
                            <td><?= $m->aktif; ?></td>
                            <td class="text-nowrap">
                                <a href="#" class="getAjaxUser btn btn-primary" data-id="<?= $m->id_user; ?>" data-toggle="modal" data-target="#getUser">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?= base_url('admin/ubahuser/' . $m->id_user); ?>" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <?php if ($m->id_user != 3) : ?>
                                    <a href="<?= base_url('admin/hapususer/' . $m->id_user); ?>" class="button-delete btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                <?php endif; ?>
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
<div class="modal fade " id="getUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-800" id="exampleModalLabel">Detail User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body detailUser">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- AKhir Modal -->

<?php require_once('application/views/templates/footer.php'); ?>

<!-- Script -->
<script>
    $(document).ready(function() {
        $('#myTable').on('click', '.getAjaxUser', function() {
            const id = $(this).data('id');
            $(".detailUser").load("<?= base_url('admin/getAjaxUser/'); ?>" + id);
        });
    });
</script>
<!-- Akhir Script -->