        <div class="col-lg-9 col-md-9 col-sm-9 col-9 right-side">
        <h5>Shopping Cart</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product</th>
                    <th scope="col" width="50">Option</th>
                    <th scope="col" align="center">Qty</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Price</th>
                    <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                <?php foreach($this->cart->contents() as $row):  ?>
                <?php $i++ ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $row['name']; ?></td>
                        <td><a href="<?= base_url() ?>Cart/deleteProduct/<?= $row['rowid'] ?>" id="delete-product"><i class="fas fa-trash trash"></i></a></td>
                        <td>
                            <a href="#" style="font-size:15px;color:red;"><i class="fas fa-minus-circle"></i></a>
                            <?= $row['qty']; ?>
                            <a href="#" style="font-size:15px;color:#13ba0b;"><i class="fas fa-plus-circle"></i></a>
                        </td>
                        <td><?= $row['options']['weight'] ?></td>
                        <td>Rp.<?= number_format($row['price'], 0,',','.'); ?></td>
                        <td>Rp.<?= number_format($row['subtotal'], 0,',','.'); ?></td>
                    </tr>
                <?php endforeach;?>
                    <tr>
                        <td colspan="6" align="right"> <b>Total</b> </td>
                        <td>Rp.<?= number_format($this->cart->total(),0,',','.') ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="continue-button">
                    <a href="<?= base_url() ?>Cart/clearCart" class="btn btn-danger" id="clear-cart">Clear Cart <i class="fas fa-trash"></i></a>
                    <a href="#" class="btn btn-success">Checkout <i class="fas fa-sign-out-alt"></i></a>
                    <a href="<?= base_url() ?>Ubin/index" class="btn btn-primary">Continue Shopping <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>