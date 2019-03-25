<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">

    <!-- CSS login -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/custom/css/login.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert/sweetalert2.min.css">


    <!-- General CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/custom/css/general.css">

</head>
<body>
<div class="screen"></div>
<div class="loading">
    <div id="loader"></div>
    <p>Loading...</p>
</div>

<div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash') ?>" ></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12 col-12 offset-lg-3 offset-md-2 login">
            <h4 class="text-center">Login <small>to Continue</small></h4><hr><br>
            <?php if($this->session->flashdata('failed')): ?>
                <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('failed'); ?>
                </div>
            <?php endif; ?>
                <form action="<?= base_url()?>Login/login" method="post" id="form_login">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" autocomplete="off" required>
                    </div><br><hr>
                    <button type="submit" class="btn" id="login">Login</button>
                    <span id="mess"></span>
                </form>
            </div>
        </div>
        <div class="text-center"><a href="<?= base_url() ?>Registration" ><small>Sign Up</small></a></div>
        
    </div>
</body>
<script src="<?= base_url() ?>assets/bootstrap/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/sweetalert/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>assets/custom/js/sweetcustom.js"></script>
<script>
    const bg = $('.screen');
    const load = $('.loading');
    bg.hide();
    load.hide();
    url = '<?= base_url(); ?>'

$(document).ready(function(){
    $('#login').html('Login');
    $('#form_login').submit(function(){
        bg.show();
        load.show();
    });
});


</script>
</html>