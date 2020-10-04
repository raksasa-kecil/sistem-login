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
            <label for="level">Level <span class="text-danger">*</span></label>
            <input type="text" class="form-control  <?= form_error('level') ? 'is-invalid' : null; ?>" id="level" name="level" autocomplete="off" value="<?= $level->level; ?>">
            <?= form_error('level'); ?>
        </div>

        <input type="hidden" name="id_level" value="<?= $level->id_level; ?>">

        <a href="<?= base_url('admin/level'); ?>" class="btn btn-warning mr-2">Batal</a>
        <button type="submit" class="btn btn-primary">Ubah</button>

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