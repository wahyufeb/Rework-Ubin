<div id="nostock" data-stock="<?= $this->session->flashdata('nostock') ?>"></div>
<?php if($this->session->flashdata('nostock')){ ?>
<?php $this->session->flashdata('nostock'); ?>
<?php } ?>
<div class="container">
    <!-- Discount -->
    <h2>BIG DISCOUNT <i class="fas fa-percent fa-sm"></i></h2>
    <div class="row">
    <?php foreach($discount as $row): ?>
    <?php
        $price = $row['price'];
        $disc  = $row['discount'];

        $discount = $price * $disc / 100;
        $countDisc = $price - $discount;
        $row['price'] = $countDisc;
    ?>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="discount" style="background-image:url('<?= base_url() ?>assets/img/<?= $row['image']; ?>');">
                <h1><?= $row['discount'] ?>%</h1>
                <img src="<?= base_url() ?>assets/img/icon/as.png">
                <p style="color:white;text-decoration:line-through;margin:50px 0px -50px 10px">Rp. <?= number_format($price, 0,',','.') ?></p>
                <h3 style="color:white;margin-top:50px;margin-left:20px;">Rp. <?= number_format($row['price'], 0,',','.') ?></h3>
                <button class="btn btn-primary"><a href="<?= base_url() ?>Ubin/addToCart/<?= $row['id_product']; ?>" class="add-cart">Buy Now</a></button>
            </div>
        </div>
    <?php endforeach; ?>
        <!-- end Discount -->

        <!-- Top Items -->
        <div class="list">
            <h2>Top 4 Products</h2>
        <?php foreach($top as $row): ?>
        <?php         
            $price = $row['price'];
            $disc  = $row['discount'];

            $discount = $price * $disc / 100;
            $countDisc = $price - $discount;
            $row['price'] = $countDisc;
        ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 product-free-shipping">
                <div class="card">
                    <a href="<?= base_url() ?>Ubin/product/<?= $row['id_product'] ?>">
                        <img src="<?= base_url() ?>assets/img/<?= $row['image']; ?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name']; ?></h5>
                        <p>Rp.<?= number_format($row['price'], 0,',','.') ?></p>
                        <p style="font-size:13px;">Stock : <?= $row['stock']; ?></p>
                        <div class="row">
                            <a href="<?= base_url() ?>Ubin/addToCart/<?= $row['id_product']; ?>" class="btn btn-success add-cart">Add to cart <i class="fas fa-cart-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- end Top Items -->
        </div>
    </div>
    <div class="table-responsive" id="products"></div>
    <nav aria-label="Page navigation example" id="pagination">
        
    </nav>
</div>
    <!-- Testimonial -->
    <div class="testimonial">
        <h2>Testimonial</h2>
    </div>
    <!-- end Testimonial -->
<div class="row">
    <!-- Ilustration -->
    <!-- <div class="ilustration">
        <img src="<?= base_url() ?>assets/img/ilustrasi.svg" width="100%">
    </div> -->
    <!-- end Ilustration -->
</div>
</div>