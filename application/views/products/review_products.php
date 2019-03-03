<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-9 product-side">
<?php foreach($productid as $row): ?>
        <h2><?= $row['name']; ?></h2>
            <div class="big-img">
                <img class="col-lg-12 col-md-12 col-sm-12 col-12 img-product" src="<?= base_url() ?>assets/img/<?= $row['image'];?>" alt="">
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-5 con-price">
                    <p class="price">Price</p>
                    <h3>Rp.<?= number_format($row['price'], 0,',','.') ?></h3>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-5 offset-lg-6 offset-md-6 offset-sm-6 offset-2 con-weight">
                    <p class="weight">Weight</p>
                    <h4><?= $row['weight']; ?> gram</h4>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-3 con-sold">
                    <p class="price">Sold</p>
                    <h5><?= $row['sold']; ?></h5>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-3 con-stock">
                    <p class="stock">Stock</p>
                    <h5><?= $row['stock']; ?></h5>
                </div>
                <div class="col-lg-12 con-description">
                    <h5>Description</h5>
                    <p class="description">
                        <?= $row['description']; ?>
                    </p>
                </div>
            </div>
            <a href="<?= base_url() ?>Ubin/addToCart/<?= $row['id_product']; ?>" class="col-lg-12 btn btn add_cart">Buy</a>
<?php endforeach; ?>
            <div class="col-lg-12 con-testimonial">
                <h5>Testimonial</h5>
                <div class="testimonial">
                    <div class="row">
                        <div class="col-lg-12 photo-profile">
                            <img src="<?= base_url() ?>assets/img/3.jpg" alt="">
                            <span>Lorem</span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eaque, similique, ducimus magni, impedit velit quod earum esse enim tempora quis? Quia inventore aspernatur nobis eum repellat quo necessitatibus asperiores?</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 photo-profile">
                            <img src="<?= base_url() ?>assets/img/3.jpg" alt="">
                            <span>Lorem</span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi eaque, similique, ducimus magni, impedit velit quod earum esse enim tempora quis? Quia inventore aspernatur nobis eum repellat quo necessitatibus asperiores?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 recent-side">
            <p>Recent Products</p>
            <hr>
            <div class="recent-img">
                    <img src="<?= base_url() ?>assets/img/5.jpg" class="hover-img">
                <p class="hover">
                    $200
                    <a href="">Product Name</a>
                </p>
            </div>
            <div class="recent-img" >
                <img src="<?= base_url() ?>assets/img/2.jpg" class="hover-img">
                <p class="hover">
                    $200
                    <a href="">Product Name</a>
                </p>
            </div>
            <div class="recent-img" >
                <img src="<?= base_url() ?>assets/img/3.jpg" class="hover-img">
                <p class="hover">
                    $200
                    <a href="">Product Name</a>
                </p>
            </div>
            <div class="recent-img" >
                <img src="<?= base_url() ?>assets/img/4.jpg" class="hover-img">
                <p class="hover">
                    $200
                    <a href="">Product Name</a>
                </p>
            </div>
            <div class="recent-img" >
                <img src="<?= base_url() ?>assets/img/5.jpg" class="hover-img">
                <p class="hover">
                    $200
                    <a href="">Product Name</a>
                </p>
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
</div>
    
</body>
</html>