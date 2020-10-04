<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg">
        <h1 class="h3 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- End of Page Heading -->

    <!-- Content -->
    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg">

        <?= form_open_multipart(); ?>

        <div class="row">

            <div class="col-md-12">

                <div class="form-group">
                    <label for="nama_user">Nama User <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= form_error('nama_user') ? 'is-invalid' : null; ?>" id="nama_user" name="nama_user" autocomplete="off">
                    <?= form_error('nama_user'); ?>
                </div>

                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : null; ?>" id="email" name="email" autocomplete="off">
                    <?= form_error('email'); ?>
                </div>

                <div class="form-group">
                    <label for="username">Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : null; ?>" id="username" name="username" autocomplete="off">
                    <?= form_error('username'); ?>
                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="password1">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control <?= form_error('password1') ? 'is-invalid' : null; ?>" id="password1" name="password1" autocomplete="off">
                            <?= form_error('password1'); ?>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="password2">Password Confirm <span class="text-danger">*</span></label>
                            <input type="password" class="form-control <?= form_error('password2') ? 'is-invalid' : null; ?>" id="password2" name="password2" autocomplete="off">
                            <?= form_error('password2'); ?>
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="id_level">Level <span class="text-danger">*</span></label>
                            <select id="id_level" class="form-control <?= form_error('id_level') ? 'is-invalid' : null; ?>" name="id_level">
                                <option value="">-- Pilih Level --</option>
                                <?php foreach ($level as $l) : ?>
                                    <option value="<?= $l->id_level; ?>"><?= $l->level; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_level'); ?>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="aktif">Aktif <span class="text-danger">*</span></label>
                            <select id="aktif" class="form-control <?= form_error('aktif') ? 'is-invalid' : null; ?>" name="aktif">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <?= form_error('aktif'); ?>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <a class="mr-2 mt-3 btn btn-warning " href="<?= base_url('admin/user'); ?>" role="button">Batal</a>
        <button class="mt-3 btn btn-primary" type="submit">Tambah </button>

        </form>

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