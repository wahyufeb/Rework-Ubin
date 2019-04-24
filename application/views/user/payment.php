<style>
    .card:hover{
        transform:none;
    }
    .breadcrumb-item a{
        color:#333;
    }
    .breadcrumb-item a:hover{
        color:skyblue;
    }
</style>
<div class="col-lg-9 col-md-9 col-sm-11 col-11 offset-lg-1 offset-md-1 right-side">
    <!-- <h5>Payment</h5><br> -->
    <nav aria-label="breadcrumb" style="margin-top:20px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>User">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Payment</li>
        </ol>
    </nav>
        <?php if($this->session->flashdata('msg')){ ?>
            <?= $this->session->flashdata('msg') ?>
        <?php }?>
        <?php if($this->session->flashdata('payment')){ ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Terimakasih, </strong>permintaan akan segera diproses. Silahkan <?=  $this->session->flashdata('payment'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php }?>

        <!-- Order Max !! -->
        <?php if($this->session->flashdata('ordermax')){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Maaf, untuk orderan selanjutnya </strong>Anda harus menyelesaikan pembayaran dahulu atau bisa mengcancel semua orderan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <?php if(count($orders) == 0):?>
            <div class="alert alert-info" role="alert">
            <h5 class="alert-heading">Payment Method</h5>
                <p>We use <b>Transfer Bank</b> for payment method</p>
                    <ul>
                        <li>BCA : 13912738721167</li>
                        <li>BRI : 13912738236167</li>
                        <li>Mandiri : 13721632716423</li>
                        <li>BNI : 82367216327167</li>
                    </ul>
            <hr>
            <p class="mb-0">More info, please click <a href="#" style="color:blue;">here</a></p>
            </div>
                    <h5 class="text-center"></h5>
            <?php endif;?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-8 col-12">
                <?php $row['due_date'] =''; ?>
                <?php $i = 0; ?>
                <?php foreach($orders as $row): ?>
                <?php $i++ ?>
                <div class="card" style="width:15em;float:left;box-shadow:none;">
                        <a href="#">
                            <img src="<?= base_url() ?>assets/img/<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['image'] ?>" height="200">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['name'] ?></h5>
                            <p>Rp.<?= number_format($row['total'], 0, ",",".") ?></p>
                        </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-4 col-12" id="exp" data-exp="<?= $this->session->userdata('id_user')?>">
                <?php if(count($orders) > 0):?>
                <div class="time">
                <?php if($orders[0]['status'] == "paid"): ?>
                <?php else:?>
                    Expired : 
                    <div id="clock" data-clock="<?= $row['due_date'] ?>"></div>
                <?php endif;?>
                </div>
                <br>
                    <?php if($orders[0]['status'] == "paid"): ?>
                    <h6>Status : 
                        <i class="fas fa-shipping-fast"></i> In Shipping 
                    </h6>
                        <div class="row">
                            <button class="btn btn-success" id="confirm">Confirm Payment</button>
                        </div>

                    <?php else:?>
                        <div class="row">
                            <a href="<?= base_url() ?>Order/cancelOrder" class="btn btn-danger" id="cancel">Cancel All Order</a>
                        </div>
                    <?php endif;?>
                <?php endif;?>
            
            </div>
        </div>
    </div>
    </div>
</div>
</body>
<script>
    $('#confirm').on("click", function(){
        $('.clock').hide();

    })
</script>
</html>