<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result Search</title>
</head>
<body>
    <div class="container">
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
    <div class="clear" style="clear:left;"></div>
    
</body>
</html>