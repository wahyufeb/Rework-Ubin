<div class="container">
    <!-- Discount -->
    <h2>BIG DISCOUNT <i class="fas fa-percent fa-sm"></i></h2>
    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="discount">
                <h1>20%</h1>
                <img src="<?= base_url() ?>assets/img/icon/as.png">
                <button class="btn btn-primary">Buy Now</button>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="discount">
                <h1>20%</h1>
                <img src="<?= base_url() ?>assets/img/icon/as.png">
                <button class="btn btn-primary">Buy Now</button>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="discount">
                <h1>20%</h1>
                <img src="<?= base_url() ?>assets/img/icon/as.png">
                <button class="btn btn-primary">Buy Now</button>
            </div>
        </div>
        <!-- end Discount -->

        <!-- Top Items -->
        <div class="list">
            <h2>Top 10 Items</h2>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 top-items">
                <div class="card">
                    <img src="<?= base_url() ?>assets/img/vase.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product</h5>
                        <p>$200</p>
                        <div class="row">
                           <a href="#" class="btn btn-primary">Add to cart <i class="fas fa-cart-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 top-items">
                <div class="card">
                    <img src="<?= base_url() ?>assets/img/vase.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product</h5>
                        <p>$200</p>
                        <div class="row">
                           <a href="#" class="btn btn-primary">Add to cart <i class="fas fa-cart-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 top-items">
                <div class="card">
                    <img src="<?= base_url() ?>assets/img/vase.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product</h5>
                        <p>$200</p>
                        <div class="row">
                           <a href="#" class="btn btn-primary">Add to cart <i class="fas fa-cart-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 top-items">
                <div class="card">
                    <img src="<?= base_url() ?>assets/img/vase.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Product</h5>
                        <p>$200</p>
                        <div class="row">
                           <a href="#" class="btn btn-primary">Add to cart <i class="fas fa-cart-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <!-- end Top Items -->

        <!-- Free Shipping -->
        <div class="free-shipping">
            <h2>Products</h2>
        <?php foreach($products as $row): ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 product-free-shipping">
                <div class="card">
                    <a href="<?= base_url() ?>Ubin/product/<?= $row['id_product'] ?>">
                        <img src="<?= base_url() ?>assets/img/<?= $row['image']; ?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name']; ?></h5>
                        <p>Rp.<?= number_format($row['price'], 0,',','.') ?></p>
                        <div class="row">
                            <a href="<?= base_url() ?>Ubin/addToCart/<?= $row['id_product']; ?>" class="btn btn-success">Add to cart <i class="fas fa-cart-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

            <!-- end Free Shipping -->
        </div>
    </div>
        <nav aria-label="Page navigation example" id="pagination">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
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