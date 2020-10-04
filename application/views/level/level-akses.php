<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg">
        <h1 class="h3 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- End of Page Heading -->

    <!-- Content -->
    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg">

        <a class="mb-3 btn btn-outline-warning" href="<?= base_url('admin/level'); ?>" role="button">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>

        <button type="button" class="mb-3 btn btn-primary">Profil : <?= $level->level; ?></button>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col" class="td-60">Access</th>
                    </tr>
                </thead>
                <tbody class="text-black">
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <td class="text-center"><?= $i; ?></td>
                            <td><?= $m->menu; ?></td>
                            <td class="text-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" <?= check_access($level->id_level, $m->id_menu); ?> data-level="<?= $level->id_level; ?>" data-menu="<?= $m->id_menu; ?>">
                                </div>
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
<script>
    $('.form-check-input').on('click', function() {
        const id_menu = $(this).data('menu');
        const id_level = $(this).data('level');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                id_menu: id_menu,
                id_level: id_level
            },
            success: function() {
                document.location.href = "<?= base_url('admin/levelaccess/'); ?>" + id_level;
            }
        });

    });
</script>
<!-- Akhir Script -->