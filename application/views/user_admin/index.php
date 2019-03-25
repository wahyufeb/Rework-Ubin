<!DOCTYPE html>
    <html lang="en">

        <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- inject:css -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/admin/images/favicon.png" />
        <!-- Sweet Alert -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert/sweetalert2.min.css">
        <!-- Jquery -->
        <script src="<?= base_url() ?>assets/custom/js/jquery.js"></script>

        <!-- datatables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css"/>

        </head>
    <body>

        <?= $nav; ?>
        <?= $content; ?>
    <!-- plugins:js -->
    <script src="<?= base_url() ?>assets/admin/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url() ?>assets/admin/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?= base_url() ?>assets/admin/js/off-canvas.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?= base_url() ?>assets/admin/js/dashboard.js"></script>
    <!-- End custom js for this page-->
    <!-- sweetalert -->
    <script src="<?= base_url() ?>assets/sweetalert/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/custom/sweet.js"></script>

    <!-- datatables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#table-product').DataTable();
        })
    </script>
</body>

</html>
