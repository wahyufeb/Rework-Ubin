<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UBIN</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">

    <!-- General CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/custom/css/general.css">

    <!-- nav plugin -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/menu/css/slimmenu.min.css">

    <!-- Nav -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/custom/css/nav.css">

    <!-- Home Content -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/custom/css/content.css">

    <!-- Review Products -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/custom/css/review_products.css">

    <!-- User -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/custom/css/user.css">

    <!-- Footer -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/custom/css/footer.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert/sweetalert2.min.css">


    <!-- Animation.css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/animation/animate.min.css">

    <!-- Dropzone -->
    <!-- link rel="stylesheet" href="<?= base_url() ?>assets/dropzone/dropzone.min.css"> -->

    <script src="<?= base_url() ?>assets/custom/js/jquery.js"></script>
</head>

<body>
    <?= $nav; ?>
    <?= $content; ?>
    <?= $footer; ?>
    <?= $script; ?>