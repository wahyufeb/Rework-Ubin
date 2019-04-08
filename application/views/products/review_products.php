<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>
<!-- SPECIAL NAV -->
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
                <li><a href='<?= base_url() ?>Ubin/index#big-discounts'>Big Discounts</a></li>
                <li><a href='<?= base_url() ?>Ubin/index#top-products'>Top Products</a></li>
                <li><a href='<?= base_url() ?>Ubin/index#all-products'>All Products</a></li>
                <li><a href='<?= base_url() ?>Ubin/index#testimonials'>Testimonials</a></li>
                <li><a href='<?= base_url() ?>Ubin/index#about'>About</a></li>
            </ul>
        </div>
</div>
<!-- END SPECIAL NAV -->

<div class="container">
    <div class="row">
        <div class="col-lg-7 product-side">
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
        <div class="col-lg-4 side-comment" style="overflow:auto;">
        <h6>Testimonial</h6>
        <hr>
                <div class="row" style="padding:20px;" id="comment">
                <?php foreach($comment as $row): ?>
                <?php $date = $row['date_created']; ?>
                    <div class="col-lg-12 photo-profile" style="background-color:#eaeff2;padding:15px;border-radius:10px;margin-bottom:10px;">
                        <img src="<?= base_url() ?>uploads/<?= $row['photo'] ?>" alt="user" width="30" height="30" style="border-radius:50%;">
                        <span style="opacity:.7;"><?= $row['name'] ?></span><span style="opacity:.9;font-weight:300;font-size:15px;float:right;"><?= substr($date, 0, 17) ?></span>
                        <p style="opacity:.9;"><?= $row['comment'] ?></p>
                        <?php if($this->session->userdata('id_user') == $row['id_user']){ ?>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button type="button" class="btn btn-success edit-comment" data-id="<?= $row['id_comment'] ?>" style="transform:scale(.8)">
                                    <a href="#form" class="scroll" style="color:white;"><i class="far fa-edit" ></i>edit</i></a>
                                </button>

                                <button type="button" class="btn btn-danger" style="transform:scale(.8)">
                                    <a href="<?= base_url() ?>Comment/deleteComment/<?= $row['id_comment'] ?>/<?= $row['id_product'] ?>" style="color:white;"><i class="fas fa-trash-alt"></i>delete</a>
                                </button>
                                    <!-- <a href="<?= $row['id_comment'] ?>"><i class="fas fa-trash-alt"></i></a> -->
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                <?php endforeach; ?>
                </div>
        </div>
        </div>
        <div id="form"></div>
        <div class="row">
            <div class="col-lg-1">
                <div class="col-lg-12 col-sm-3 col-3" id="top-comment">
                <?php if($this->session->userdata('level') == "member"){ ?>
                    <img src="<?= base_url() ?>uploads/<?= $user[0]->photo;?>" width="60" style="margin-top:35px;border-radius:50%;width:70px;height:70px;">
                <?php }else{ ?>
                    <img src="<?= base_url() ?>uploads/user.svg" width="60" style="margin-top:35px;border-radius:50%;width:70px;height:70px;">         
                <?php } ?>
                </div>
            </div>
            <div class="col-lg-11 col-md-12 col-sm-12 col-12" id="form_comment">
            <form action="<?= base_url() ?>Comment/addComment" method="post" id="update-comment">
                <input type="hidden" name="idproduct" value="<?= $this->uri->segment(3); ?>">
                <input type="hidden" name="idcomment">
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" rows="5"  name="comment" required></textarea>
                        </div>
                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-primary" id="submit"></button>
                        </div>
                        </form>
            </div>
        </div>
</div>
</body>
<script>
    $('#submit').append('Submit <i class="fas fa-paper-plane"></i>');
    $('.edit-comment').on("click", function(){
        let id = $(this).data('id');
        $.ajax({
            url:'<?= base_url() ?>Comment/getCommentId',
            type:'POST',
            dataType:'json',
            data:'id_comment='+id,
            success:function(data){
                let result = data[0];
                $('textarea[name="comment"]').val(result.comment);
                $('#update-comment').attr('action', '<?= base_url() ?>Comment/updateComment');
                $('input[name="idcomment"]').attr('value', ''+ id +'');
                $('#submit').removeClass('btn-primary');
                $('#submit').addClass('btn-success');
            }
        });
    });
</script>
</html>