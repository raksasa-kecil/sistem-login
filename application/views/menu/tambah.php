<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg">
        <h1 class="h3 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- End of Page Heading -->

    <!-- Content -->
    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg">

        <?= form_open(); ?>

        <div class="form-group">
            <label for="menu">Menu <span class="text-danger">*</span></label>
            <input type="text" class="form-control  <?= form_error('menu') ? 'is-invalid' : null; ?>" id="menu" name="menu" autocomplete="off">
            <?= form_error('menu'); ?>
        </div>

        <div class="form-group">
            <label for="urutan">Urutan <span class="text-danger">*</span></label>
            <input type="text" class="form-control  <?= form_error('urutan') ? 'is-invalid' : null; ?>" id="urutan" name="urutan" autocomplete="off">
            <?= form_error('urutan'); ?>
        </div>

        <a href="<?= base_url('menu'); ?>" class="btn btn-warning mr-2">Batal</a>
        <button type="submit" class="btn btn-primary">Tambah</button>

        </form>

    </div>
    <!-- End of Content -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<!-- End of Modal -->

<?php require_once('application/views/templates/footer.php'); ?>

<!-- Script -->
<!-- End of Script -->