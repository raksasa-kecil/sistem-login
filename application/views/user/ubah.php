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

            <div class="col-md-4">

                <div class="form-group">
                    <label for="image">Foto User <span class="text-danger">* (Max Size 500kb)</span></label>
                    <input type="file" class="form-control-file" name="image" id="image">
                    <img src="<?= base_url('assets/img/profile/' . $user->image); ?>" width="250">

                    <input type="hidden" name="imageOld" value="<?= $user->image; ?>">
                </div>

                <input type="hidden" name="id_user" value="<?= $user->id_user; ?>">

            </div>

            <div class="col-md-8">

                <div class="form-group">
                    <label for="nama_user">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= form_error('nama_user') ? 'is-invalid' : null; ?>" id="nama_user" name="nama_user" autocomplete="off" value="<?= $user->nama_user; ?>">
                    <?= form_error('nama_user'); ?>
                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="id_level">Level <span class="text-danger">*</span></label>
                            <select id="id_level" class="form-control <?= form_error('id_level') ? 'is-invalid' : null; ?>" name="id_level">
                                <?php foreach ($level as $l) : ?>
                                    <option value="<?= $l->id_level ?>" <?= $user->id_level == $l->id_level ? 'selected' : ''; ?>><?= $l->level ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_level'); ?>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="aktif">Aktif <span class="text-danger">*</span></label>
                            <select id="aktif" class="form-control <?= form_error('aktif') ? 'is-invalid' : null; ?>" name="aktif">
                                <option value="Yes" <?= $user->aktif == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="No" <?= $user->aktif == 'No' ? 'selected' : ''; ?>>No</option>
                            </select>
                            <?= form_error('aktif'); ?>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <a class="mr-2 mt-3 btn btn-warning " href="<?= base_url('admin/user'); ?>" role="button"> Batal</a>
        <button class="mt-3 btn btn-primary" type="submit">Ubah </button>

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