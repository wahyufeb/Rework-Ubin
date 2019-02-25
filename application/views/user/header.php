<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome User Page</title>
    <link href='<?= base_Url() ?>assets/dropzone/dropzone.min.css' type='text/css' rel='stylesheet'>
    <script src='<?= base_url() ?>assets/dropzone/dropzone.min.js' type='text/javascript'></script>
    <style>
        .photo{
            height:100%;
            width:100%;
        }
        .dropzone{
            border: 3px solid skyblue;
            border-style:dashed;
        }

        #delete-photo{
            position:absolute;
            top:5px;
            left:25px;
        }

        #delete-photo .trash{
            color:orange;
            transition:.3s;
        }

        #delete-photo .trash:hover{
            color:red;
        }
    </style>
</head>
<body>
    <div class="row" id="user-content">
        <div class="col-lg-2 col-md-2 col-sm-12 col-12 left-side">
            <div class="header-menu">
                    <div class="photo-profile">
                        <a href="#">
                            <!-- <i class="fa fa-camera"></i> -->
                            <img src="<?= base_url() ?>uploads/<?= $user[0]->photo;?>">
                        </a>
                    </div>
                    <p id="dropdown">
                        <b><?php
                            $name = $user[0]->name;
                            echo substr($name, 0, 5); 
                        ?>..</b>
                        <i class="fas fa-caret-down" id="top-arrow"></i>
                    </p>
            </div>
            <div class="side-menu">
                <ul id="menu-user">  
                    <li class="menu-side">
                        <a href="<?= base_url() ?>User/index">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="menu-side">
                        <a href="<?= base_url() ?>User/profile">
                            <i class="fas fa-user"></i> Profile
                        </a>
                    </li>
                    <li class="menu-side">
                        <a href="<?= base_url() ?>">
                            <i class="fas fa-book"></i> Catalog
                        </a>
                    </li>
                    <li class="menu-side">
                        <a href="<?= base_url() ?>User/shopping_cart">
                            <i class="fas fa-cart-arrow-down"></i>  Cart
                        </a>
                    </li>
                    <li class="menu-side">
                        <a href="<?= base_url() ?>User/payment">
                            <i class="fas fa-money-bill-alt"></i> Payment
                        </a>
                    </li>
                    <li class="menu-side">
                        <a href="#"><i class="fas fa-hand-holding-usd">
                            </i> Donation
                        </a>
                    </li>
                    <li class="menu-side">
                        <a href="#"><i class="fas fa-cog"></i> Setting
                        </a>  
                    </li>
                    <li class="menu-side">
                        <a href="<?= base_url() ?>User/logout" class="logout">
                            <i class="fas fa-power-off"></i>  Logout
                        </a
                    ></li>
                </ul>
            </div>
        </div>