<style>
    .card:hover{
        transform:none;
    }
</style>
<div class="col-lg-9 col-md-9 col-sm-9 col-9 offset-lg-1 offset-md-1 offset-sm-1 offset-1 right-side">
    <h5>Payment</h5><br>
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
                            <div class="row">
                                <a href="<?= base_url() ?>Order/cancelOrder/<?= $row['id_order'] ?>" class="btn btn-danger" id="cancel">Cancel Order <?= $i ?></a>
                            </div>
                        </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-4 col-12" id="exp" data-exp="<?= $this->session->userdata('id_user')?>">
                Expired : 
                    <div id="clock" data-clock="<?= $row['due_date'] ?>"></div><br>
            </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>