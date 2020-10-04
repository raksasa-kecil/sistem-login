<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg">
        <h1 class="h3 text-gray-800"><?= $title; ?></h1>
    </div>
    <!-- End of Page Heading -->

    <!-- Content -->
    <div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg">

        <div class="row">

            <div class="col-md-3">
                <img src="<?= base_url('assets/img/profile/'); ?><?= $user->image ? $user->image : 'no-profile.png'; ?>" class="w-100" height="350">
            </div>

            <div class="col-md-9">
                <table class="h4 text-gray-800 table">
                    <tr class="align-text-top">
                        <td width="150px">Username </td>
                        <td width="5px">:</td>
                        <td class="font-weight-bold"><?= $user->username; ?></td>
                    </tr>
                    <tr class="align-text-top">
                        <td width="150px">Email </td>
                        <td width="5px">:</td>
                        <td class="font-weight-bold"><?= $user->email; ?></td>
                    </tr>
                    <tr class="align-text-top">
                        <td>Nama</td>
                        <td>:</td>
                        <td class="font-weight-bold"><?= $user->nama_user; ?></td>
                    </tr>
                    <tr class="align-text-top">
                        <td>Bergabung </td>
                        <td>:</td>
                        <td class="font-weight-bold"><?= date('d F Y', $user->date_created); ?></td>
                    </tr>
                </table>
            </div>

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