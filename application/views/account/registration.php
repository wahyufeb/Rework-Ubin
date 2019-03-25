<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">

    <!-- CSS Registration -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/custom/css/registration.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert/sweetalert2.min.css">
</head>
<body>
<div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash') ?>" ></div>
<?php if($this->session->flashdata('flash')): ?>
 <?php $this->session->flashdata('flash'); ?>
<?php endif; ?>
    <div class="container" style="margin-bottom:100px;">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12 col-12 offset-lg-3 offset-md-2 sign">
            <h4 class="text-center">Sign Up <small>to Continue</small></h4><hr><br>
                <form action="<?= base_url() ?>Registration/sign_up" method="post">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email..." autocomplete="off" required>
                        <span style="color:red;font-size:13px;"><?= form_error('email'); ?></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="First">First name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name..." autocomplete="off" required>
                        <span style="color:red;font-size:13px;"><?= form_error('first_name'); ?></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="Last">Last name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name..." autocomplete="off" required>
                        <span style="color:red;font-size:13px;"><?= form_error('last_name'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password..." autocomplete="off" required>
                        <span style="color:red;font-size:13px;"><?= form_error('password'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="conf_password">Confirmation Password</label>
                        <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Enter confirmation password..." autocomplete="off" required>
                        <span style="color:red;font-size:13px;"><?= form_error('conf_password'); ?></span>
                    </div>
                    <!-- Captha pending dulu -->
                    <!-- <div class="form-group">
                        <p id="image-captcha">></p>
                        <p>Can't read the Image? click <a href="javascript:void(0);" class="captcha-refresh" >here</a> to refresh</p>
                        <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Enter Captcha..." autocomplete="off" required>
                        <span style="color:red;font-size:13px;"><?= form_error('captcha'); ?></span>
                    </div> -->
                    <br><hr>
                    <button type="submit" class="btn" id="btn-sign-up">Sign Up</button>
                </form>
            </div>
        </div>
        <div class="text-center"><a href="<?= base_url() ?>Login"><small>Login</small></a></div>
    </div>
</body>

<script src="<?= base_url() ?>assets/custom/js/jquery.js"><script>
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/sweetalert/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>/assets/custom/js/sweetcustom.js"></script>
<script>
    function refresh(){
        $(document).ready(function(){
        $('.captcha-refresh').on('click', function(){
            $.get('<?php echo base_url().'Registration/refresh'?>', function(data){
                $('#image_captcha').html(data);
            });
        });
    });
}
</script>

</html>