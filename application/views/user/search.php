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
        <h4 style="margin:100px 0 0px 0;opacity:.6;" class="text-center">Hasil Pencarian :</h4>
        <p class="text-center" style="opacity:.9;"><b><?= $input ?></b></p>
        <div class="free-shipping">
                <?php foreach($results as $row): ?>
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