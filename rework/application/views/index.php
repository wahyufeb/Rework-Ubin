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


    <!-- nav plugin -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/menu/css/slimmenu.min.css">

    <!-- Nav -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/custom/css/nav.css">

    <!-- content -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/custom/css/content.css">
</head>

<body>
    <?= $nav; ?>
    <?= $content; ?>
    <?= $footer; ?>
</body>
<script src="<?= base_url() ?>assets/bootstrap/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/menu/js/jquery.slimmenu.min.js"></script>
<script>
    $('#navigation').slimmenu(
        {
            resizeWidth: '800',
            collapserTitle: 'Menu',
            animSpeed: 'medium',
            easingEffect: null,
            indentChildren: false,
            childrenIndenter: '&nbsp;'
        });
</script>

</html>