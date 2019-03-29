
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Purple Admin</title>
<!-- plugins:css -->
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/admin//vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- inject:css -->
<link rel="stylesheet" href="<?= base_url() ?>assets/admin//css/style.css">
<!-- endinject -->
<link rel="shortcut icon" href="<?= base_url() ?>assets/admin//images/favicon.png" />
<style>
    .bg-primary{
        background-color:salmon !important;
    }

    h2{
        font-size:50px;
    }
</style>
</head>

<body>
<div class="container-scroller">
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
    <div class="row flex-grow">
        <div class="col-lg-7 mx-auto text-white">
        <div class="row align-items-center d-flex flex-row">
            <div class="col-lg-6 text-lg-right pr-lg-4">
            <h1 class="display-1 mb-0">:(</h1>
            </div>
            <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
            <h2>SORRY!</h2>
            <h5 class="font-weight-light">Your account is not active, please check your email</h5>
            <h6>Or</h6>
            <h5 class="font-weight-light">Your account has been <h4>SUSPENDED</h4></h5>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center mt-xl-2">
            <a class="text-white font-weight-medium" href="<?= base_url() ?>">Back to home</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 mt-xl-2">
            <p class="text-white font-weight-medium text-center">Copyright &copy; 2018  All rights reserved.</p>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?= base_url() ?>assets/admin//vendors/js/vendor.bundle.base.js"></script>
<script src="<?= base_url() ?>assets/admin//vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?= base_url() ?>assets/admin//js/off-canvas.js"></script>
<script src="<?= base_url() ?>assets/admin//js/misc.js"></script>
<!-- endinject -->
</body>

</html>
