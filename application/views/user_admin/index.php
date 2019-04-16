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
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/datatables/datatables.min.css"/>
        
        <!-- datepicker -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap/css/bootstrap-datepicker.min.css"/>
        

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
    <script type="text/javascript" src="<?= base_url() ?>assets/datatables/datatables.min.js"></script>

    <!-- datepicker -->
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url() ?>assets/custom/js/jquery.PrintArea.js"></script>
    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $('.tanggal').datepicker({
                format: "dd-mm-yyyy",
                autoclose:true
            });
        });
    </script> -->
    <script>
        $(document).ready(function(){
            $('#table').DataTable( {
                responsive: true
            });
        })
    </script>
    <script>
        $(document).ready(function(){
            $('#table-accounts').DataTable();
        })
    </script>
        <script>
        $(document).ready(function(){
            $('#table-orders').DataTable();
        })
    </script>
</body>

</html>
