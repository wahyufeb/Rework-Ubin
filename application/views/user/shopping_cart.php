<div id="order" data-order="<?= $this->session->flashdata('order');  ?>"></div>
<div id="nostock" data-stock="<?= $this->session->flashdata('nostock') ?>"></div>
<?php if($this->session->flashdata('order') && $this->session->flashdata('nostock')){ ?>
<?php $this->session->flashdata('order') ?>
<?php $this->session->flashdata('nostock'); ?>
<?php }?>
        <div class="col-lg-9 col-md-9 col-sm-11 col-11 right-side">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead align="center">
                    <tr>
                    <th scope="col">No</th>
                    <th>Image</th>
                    <th scope="col">Product</th>
                    <th scope="col" width="50">Option</th>
                    <th scope="col" align="center">Qty</th>
                    <th scope="col">Price</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody align="center">
                <?php $i = 0; ?>
                <?php $total = $this->cart->contents() ?>
                <?php $sum = 0; ?>
                <?php foreach($total as $row):  ?>
                <?php $i++ ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><img src="<?= base_url() ?>assets/img/<?=$row['options']['image'];?>" alt="<?= $row['name'] ?>" width=120"></td>
                        <td><?= $row['name']; ?></td>
                        <td><a href="<?= base_url() ?>Cart/deleteProduct/<?= $row['rowid'] ?>" id="delete-product"><i class="fas fa-trash trash"></i></a></td>
                        <td>
                            <a href="<?= base_url() ?>Cart/minQty/<?= $row['id']?>/<?= $row['rowid']; ?>/<?= $row['qty']; ?>/<?= $row['options']['weight']; ?>/<?=$row['options']['image'];?>" style="font-size:15px;color:red;"><i class="fas fa-minus-circle"></i></a>
                            <?= $row['qty']; ?>
                            <a href="<?= base_url() ?>Cart/addQty/<?= $row['id']?>/<?= $row['rowid']; ?>/<?= $row['qty']; ?>/<?= $row['options']['weight']; ?>/<?=$row['options']['image'];?>" style="font-size:15px;color:#13ba0b;"><i class="fas fa-plus-circle"></i></a>
                        </td>
                        <td>Rp.<?= number_format($row['price'], 0,',','.'); ?></td>
                        <td><?= $row['options']['weight'] ?> grams</td>
                        <td>Rp.<?= number_format($row['subtotal'], 0,',','.'); ?></td>
                        <?php $sum += $row['options']['weight'];?>
                    </tr>
                <?php endforeach;?>
                    <tr>
                        <td colspan="6" align="right"> <b>Total</b> </td>
                        <td><?php echo $sum;  ?> grams</td>
                        <td>Rp.<?= number_format($this->cart->total(),0,',','.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
            <div class="row">
                <div class="continue-button">
                    <a href="<?= base_url() ?>Cart/clearCart" class="btn btn-danger" id="clear-cart">Clear Cart <i class="fas fa-trash"></i></a>
                    <a href="<?= base_url() ?>Order/order" class="btn btn-success">Checkout <i class="fas fa-sign-out-alt"></i></a>
                    <a href="<?= base_url() ?>Ubin/index" class="btn btn-primary">Continue Shopping <i class="fas fa-arrow-right"></i></a>
                    <div id="get"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>