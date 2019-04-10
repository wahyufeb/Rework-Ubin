<div id="top"></div>
        <div id='cssmenu'>
            <ul>
                <li><a href='<?= base_url() ?>Ubin'>Home</a></li>
                <li class='active has-sub'><a href='#'>Catagories</a>
                    <ul>
                        <li class='has-sub'><a href='#'>Mugs</a>
                            <ul>
                            <li><a href='#'>Sub Product</a></li>
                            <li><a href='#'>Sub Product</a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'>Gucci</a>
                            <ul>
                            <li><a href='#'>Sub Product</a></li>
                            <li><a href='#'>Sub Product</a></li>
                            </ul>
                        </li>                        
                        <li>
                            <a href='#'>Vase</a>
                        </li>
                    </ul>
                </li>
                <li><a href='#big-discounts' class="scroll">Big Discounts</a></li>
                <li><a href='#top-products' class="scroll">Top Products</a></li>
                <li><a href='#all-products' class="scroll">All Products</a></li>
                <li><a href='#testimonials' class="scroll">Testimonials</a></li>
                <li><a href='#about' class="scroll">About</a></li>
            </ul>
        </div>
</div>
<div id="nostock" data-stock="<?= $this->session->flashdata('nostock') ?>"></div>
<?php if($this->session->flashdata('nostock')){ ?>
<?php $this->session->flashdata('nostock'); ?>
<?php } ?>
<div class="go-top">
    <a href="#top" class="scroll">
        <center><i class="fas fa-chevron-up"></i></center>
    </a>
</div>
<div class="container">
    <!-- Discount -->
    <h3 style="color:#009ae1;" >BIG DISCOUNT <i class="fas fa-percent fa-sm"></i></h3>
    <div class="row" id="big-discounts">
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
                <p style="color:white;text-decoration:line-through;margin:40px 0px -50px 10px">Rp. <?= number_format($price, 0,',','.') ?></p>
                <h3 style="color:white;margin-top:50px;margin-left:20px;">Rp. <?= number_format($row['price'], 0,',','.') ?></h3>
                <button class="btn btn-primary"><a href="<?= base_url() ?>Ubin/addToCart/<?= $row['id_product']; ?>" class="add-cart">Buy Now</a></button>
                <a href="<?= base_url() ?>Ubin/product/<?= $row['id_product'] ?>" class="btn  detail_pro">Detail product</a>
            </div>
        </div>
    <?php endforeach; ?>
        <!-- end Discount -->

        <!-- Top Items -->
        <div class="list">
            <h3 style="color:#009ae1;" id="top-products">Top 4 Products</h3>
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
        <div class="testimonial" id="testimonials">
            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active first" data-interval="10000" style="background-color:#009ae1;height:400px;padding:20px;">
                        <div class="row">                            
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <img src="<?= base_url() ?>assets/img/icon/testi.svg">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6" style="color:white;">
                                <h3>Testimonials</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos consectetur autem cum nesciunt eligendi iste dolore reiciendis laboriosam dolorem laudantium soluta hic necessitatibus sunt quas sapiente, suscipit nulla sed dolor?</p>
                            </div>
                        </div>
                    </div>
                    <?php foreach($testi as $row): ?>                                                           
                    <div class="carousel-item second" style="background-color:#009ae1;background-repeat: no-repeat;background-size: cover;background-position: center;height:400px;padding:20px;background-image:url('<?= base_url()?>assets/img/<?= $row['image'] ?>');">
                        <div class="row">
                                <div class="col-lg-6 col-md-8 col-sm-10 col-12 offset-lg-3 offset-md-2 offset-sm-1">
                                    <div class="card animated fadeInDown">
                                        <p>
                                            <?php 
                                                $testi = $row['comment']; 
                                                echo substr($testi, 0, 270);
                                            ?>
                                        </p>
                                        <h5><?= $row['username'] ?></h5>
                                        <span>
                                            <?php if($row['level'] =="member"): ?>
                                                Customer
                                            <?php endif;?>
                                        </span>
                                    </div>
                                    <center>
                                        <img src="<?= base_url() ?>uploads/<?= $row['photo'] ?>" width="100" height="100" class="animated fadeInUp ">
                                    </center>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="padding:15px;"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="padding:15px;"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    <!-- end Testimonial -->
<div class="row">
    <!-- Ilustration -->
    <div class="ilustration">
        <!-- <img src="<?= base_url() ?>assets/img/people.svg"> -->
    </div>
    <!-- end Ilustration -->
</div>
</div>
<script>
    $('.discount').mouseenter(function(){
        $('.detail_pro', this).css('display', 'block');
    });
    $('.discount').mouseleave(function(){
        $('.detail_pro', this).css('display', 'none');
    });
</script>