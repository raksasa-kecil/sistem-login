<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg">
        <h1 class="h3 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- End of Page Heading -->

    <!-- Content -->
    <!-- <div class="row"> -->
    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg">
        <div class="col-md-12">
            <?= form_open_multipart('user/editprofile'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_user" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $user['nama_user']; ?>">
                    <?= form_error('nama_user', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img id="prev" src="<?= base_url('assets/img/profile/' . $user['image']); ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="real-file" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit </button>
                </div>
            </div>
            </form>
        </div>
        <!-- </div> -->
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
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<!-- Akhir Script -->