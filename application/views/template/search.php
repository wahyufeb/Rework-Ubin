<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result Search</title>
</head>
<body>
<!-- SPECIAL NAV -->
<div id="menu-side"></div>
    <div id="side-menu-show">
        <div id="btn-close"></div>
        <h5 class="text-center">Menu</h5>
        <hr style="margin-top:30px;background-color:white; height:.7px;" width="70%"/>
            <div id="menu-data">
                <ul>
                    <li><a href='<?= base_url() ?>Ubin'>Home</a></li>
                    <li id="catagory">Catagory <i class="fa fa-caret-down" id="drop"></i>
                        <ul>                
                            <li><a href='<?= base_url() ?>Ubin/productCat/mugs'>Mugs</a></li>
                            <li><a href='<?= base_url() ?>Ubin/productCat/vase'>Vase</a></li>
                            <li><a href='<?= base_url() ?>Ubin/productCat/bowl'>Bowl</a></li>
                            <li><a href='<?= base_url() ?>Ubin/productCat/jars'>Jars</a></li>
                        </ul>
                    </li>        
                    <li><a href='<?= base_url() ?>Ubin/#top-products' >Top Products</a></li>
                    <li><a href='<?= base_url() ?>Ubin/#all-products' >All Products</a></li>
                    <li><a href='<?= base_url() ?>Ubin/#testimonials' >Testimonials</a></li>
                    <li><a href='<?= base_url() ?>Ubin/#about' >About</a></li>
                </ul>
            </div>
            <span><i>www.cubinwebsite.com</i> </span>
    </div>
<!-- END SPECIAL NAV -->
    <div class="container">
        <div class="row" style="margin-top:-60px;">
            <div class="col-lg-8 col-md-6 col-sm-6 col-12">
                <h5 style="margin:80px 0 0px 0;opacity:.8;">Catagory : <?php if($catagory){
                    echo $catagory[0]->catagory;
                }else{
                    echo " ";
                } ?></h5>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <form action="<?= base_url() ?>Ubin/sortCatagory/<?php if($catagory){
                    echo $catagory[0]->catagory;
                }?>" style="margin:80px 0 0px 0;" method="POST">
                <div class="row">
                    <input type="hidden" name="catagory" value="<?=$this->uri->segment(3);?>">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                        <select class="form-control" id="sortcat" name="sortcat" required>
                            <option value="" selected disabled>- Select one -</option>  
                            <option value="upto">Price > Rp. 50.000</option>
                            <option value="under">Price < Rp. 50.000</option>
                            <option value="alldiscount">All Discount</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                        <input type="submit" value="Sort" class="btn btn-warning">
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="free-shipping">
                <?php foreach($catagory as $row): ?>
                <?php         
                    $price = $row->price;
                    $disc  = $row->discount;

                    $discount = $price * $disc / 100;
                    $countDisc = $price - $discount;
                    $row->price = $countDisc;
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6 product-free-shipping">
                        <div class="card">
                            <a href="<?= base_url() ?>Ubin/product/<?= $row->id_product ?>">
                                <img src="<?= base_url() ?>assets/img/<?= $row->image ?>" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><?= $row->name ?></h5>
                                <p>Rp.<?= number_format($row->price, 0,',','.') ?></p>
                                <p style="font-size:13px;">Stock : <?= $row->stock; ?></p>
                                <div class="row">
                                    <a href="<?= base_url() ?>Ubin/addToCart/<?= $row->id_product; ?>" class="btn btn-success add-cart">Add to cart <i class="fas fa-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                    <!-- end Free Shipping -->
        </div>
    </div>
    <div class="clear" style="clear:left;"></div><br>
    <br>
    <br>
    <br>
    <br>
    <br>
</body>
</html>