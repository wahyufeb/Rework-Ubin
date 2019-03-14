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
        </div>
        <div class="col-lg-3 recent-side">
            <div class="row">
                <p>&emsp;&emsp;Recent Products</p>
                <hr>
                <div class="col-lg-12 col-md-10 col-sm-6 col-6 recent-img">
                        <img src="<?= base_url() ?>assets/img/5.jpg" class="hover-img" height="200">
                    <p class="hover">
                        $200
                        <a href="">Product Name</a>
                    </p>
                </div>
                <div class="col-lg-12 col-md-10 col-sm-6 col-6 recent-img" >
                    <img src="<?= base_url() ?>assets/img/2.jpg" class="hover-img" height="200">
                    <p class="hover">
                        $200
                        <a href="">Product Name</a>
                    </p>
                </div>
                <div class="col-lg-12 col-md-10 col-sm-6 col-6 recent-img" >
                    <img src="<?= base_url() ?>assets/img/3.jpg" class=" hover-img" height="200">
                    <p class="hover">
                        $200
                        <a href="">Product Name</a>
                    </p>
                </div>
                <div class="col-lg-12 col-md-10 col-sm-6 col-6 recent-img" >
                    <img src="<?= base_url() ?>assets/img/3.jpg" class=" hover-img" height="200">
                    <p class="hover">
                        $200
                        <a href="">Product Name</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="testi" id="comment">
                <h5>Testimonial</h5>
                <div class="row" style="padding:20px;">
                <?php foreach($comment as $row): ?>
                    <div class="col-lg-12 photo-profile" style="background-color:#eaeff2;padding:15px;border-radius:10px;margin-bottom:10px;">
                        <img src="<?= base_url() ?>uploads/<?= $row['photo'] ?>" alt="">
                        <span><?= $row['name'] ?></span><span style="font-weight:lighter;font-size:15px;float:right;"><?= $row['date_created']; ?></span>
                        <p><?= $row['comment'] ?></p>
                        <?php if($this->session->userdata('id_user') == $row['id_user']){ ?>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a href="<?= $row['id_comment'] ?>"><i class="far fa-edit"></i>edit</i></a>
                                <a href="<?= base_url() ?>Comment/deleteComment/<?= $row['id_comment'] ?>/<?= $row['id_product'] ?>"><i class="fas fa-trash-alt"></i>delete</a>
                                <a href="<?= $row['id_comment'] ?>"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-1">
                <div class="col-lg-12 col-sm-3 col-3">
                <?php if($this->session->userdata('level') == "member"){ ?>
                    <img src="<?= base_url() ?>uploads/<?= $user[0]->photo;?>" width="60" style="margin-top:35px;border-radius:50%;width:70px;height:70px;">
                <?php }else{ ?>
                    <img src="<?= base_url() ?>uploads/user.svg" width="60" style="margin-top:35px;border-radius:50%;width:70px;height:70px;">         
                <?php } ?>
                </div>
            </div>
            <div class="col-lg-11 col-md-12 col-sm-12 col-12">
                    <form action="<?= base_url() ?>Comment/addComment" method="post">
                    <input type="hidden" name="idproduct" value="<?= $this->uri->segment(3);
                     ?>">
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" rows="5"  name="comment"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12  text-right">
                    <button type="submit" class="btn btn-primary">Submit <i class="fas fa-paper-plane"></i></button>
                </div>
            </form>
    </div>
</div>
    
</body>
</html>