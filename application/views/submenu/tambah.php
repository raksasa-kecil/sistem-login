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
            <label for="title">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control  <?= form_error('title') ? 'is-invalid' : null; ?>" id="title" name="title" autocomplete="off">
            <?= form_error('title'); ?>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_menu">Menu <span class="text-danger">*</span></label>
                    <select id="id_menu" class="form-control <?= form_error('id_menu') ? 'is-invalid' : null; ?>" name="id_menu">
                        <option value="">-- Pilih Menu --</option>
                        <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m->id_menu; ?>"><?= $m->menu; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_menu'); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="url">Url <span class="text-danger">*</span></label>
                    <input type="text" class="form-control  <?= form_error('url') ? 'is-invalid' : null; ?>" id="url" name="url" autocomplete="off">
                    <?= form_error('url'); ?>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="urutan_submenu">Urutan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control  <?= form_error('urutan_submenu') ? 'is-invalid' : null; ?>" id="urutan_submenu" name="urutan_submenu" autocomplete="off">
                    <?= form_error('urutan_submenu'); ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="icon">Icon <span class="text-danger">*</span></label>
                    <input type="text" class="form-control  <?= form_error('icon') ? 'is-invalid' : null; ?>" id="icon" name="icon" autocomplete="off">
                    <?= form_error('icon'); ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="aktif">Aktif <span class="text-danger">*</span></label>
                    <select id="aktif" class="form-control cariProdi <?= form_error('aktif') ? 'is-invalid' : null; ?>" name="aktif">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    <?= form_error('aktif'); ?>
                </div>
            </div>

        </div>

        <a href="<?= base_url('menu/submenu'); ?>" class="btn btn-warning mr-2">Batal</a>
        <button type="submit" class="btn btn-primary">Tambah</button>

        </form>

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