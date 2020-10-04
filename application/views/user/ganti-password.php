<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg">
        <h1 class="h3 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- End of Page Heading -->

    <!-- Content -->
    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg">

        <?= form_open('user/changepassword'); ?>

        <div class="form-group">
            <label for="current_password">Current Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="current_password" id="current_password">
            <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label for="new_password1">New Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="new_password1" id="new_password1">
            <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label for="new_password2">Repeat Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="new_password2" id="new_password2">
            <?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Change Password </button>
        </div>

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