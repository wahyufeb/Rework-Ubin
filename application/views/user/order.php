        <div class="col-lg-9 col-md-9 col-sm-9 col-9 right-side">
            <table class="table table-bordered table-striped">
                <thead align="center" class="thead-dark">
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
                        <td><img src="<?= base_url() ?>assets/img/<?=$row['options']['image'];?>" alt="<?= $row['name'] ?>" width=80"></td>
                        <td><?= $row['name']; ?></td>
                        <td><a href="<?= base_url() ?>Cart/deleteProduct/<?= $row['rowid'] ?>" id="delete-product"><i class="fas fa-trash trash"></i></a></td>
                        <td> <?= $row['qty']; ?></td>
                        <td>Rp.<?= number_format($row['price'], 0,',','.'); ?></td>
                        <td><?= $row['options']['weight'] ?> grams</td>
                        <td>Rp.<?= number_format($row['subtotal'], 0,',','.'); ?></td>
                        <?php $sum += $row['options']['weight'];?>
                    </tr>
                <?php endforeach;?>
                    <!-- <tr>
                        <td colspan="6" align="right"> <b>Total</b> </td>
                        <td><?php echo $sum;  ?> grams</td>
                        <td>Rp.<?= number_format($this->cart->total(),0,',','.') ?></td>
                    </tr> -->
                </tbody>
            </table>
            <div class="row">
            <input type="hidden" value="<?php echo $sum; ?>" id="weight">
                    <div class="col-lg-3 offset-lg-7" >
                    <?php $totalWeight = $sum; ?>
                        Total Weight : <b><?= $totalWeight;  ?> grams</b>
                    </div>
                    <input type="hidden" value="<?= $totalWeight; ?>" id="weight">
                    <div class="col-lg-2">
                    <?php $totalPrice = number_format($this->cart->total(),0,',','.'); ?>
                        Total : <b>Rp. <?= $totalPrice; ?></b>
                    </div>
            </div><br>
            <form action="<?= base_url() ?>Order/getcost">
            <div class="row ">
                <div class="col-lg-4 col-md-6 col-sm-6 col-6     offset-lg-1">
                    <label for="province">Select Your Province</label>
                    <select class="form-control" id="destination_province" name="destination_province">
                    <option>- Province -</option>
                    <?php foreach($province->rajaongkir->results as $row) {?>
                <option value="<?= $row->province_id ?>">
                    <?= $row->province ?>
                </option>
                <?php }?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-6 offset-lg-1">
                    <label for="province">Select Your City</label>
                    <select class="form-control" id="destination_city" name="destination_city">
                    <option value="">- City -</option>  
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-9 offset-lg-1">
                    <label for="courier">Select Your Courier</label>
                    <select class="form-control" id="courier" name="couirer">
                    <option value="">- Courier -</option>  
                        <option value="jne">JNE</option>
                        <option value="pos">POS</option>
                        <option value="tiki">TIKI</option>
                    </select>
                </div>
            </div><br>
            <div class="row">
                <div class="col-9 offset-lg-1">
                    <label for="service">Select Your Service</label>
                    <select class="form-control" id="service" name="service">
                    <option value="">- Service -</option>
                    </select>
                </div>
            </div><hr>
            <div class="row">
                <div class="col-lg-2 offset-lg-1" id="cost"></div>
                <div class="col-lg-3 offset-lg-6" id="total"></div>
            </div>
            </form>
        </div>
    </div>
</body>
<script>

    //menampilkan kota tujuan pengiriman
    $(document).ready(function () {
        $('#destination_province').change(function () {

            var province_id = $('#destination_province').val();
            $.get('<?php echo site_url('Order/get_city_by_province/') ?>'+ province_id, function (resp) {
                $('#destination_city').html(resp);
            });
        });


        $('#courier').change(function(){
            var originCity = 37;
            var destCity = $('#destination_city').val();
            var dest = destCity.split(',');
            var weight = $('#weight').val();
            var courier = $('#courier').val();
            $.ajax({
                type:'POST' ,
                data:{dest : dest[0], courier : courier},
                url:'<?= base_url();?>Order/getcost',
                success:function(resp){
                    $('#service').html(resp);
                }
            })
        });


        $('#service').change(function(){
            var service = $('#service').val();

            $.ajax({
                type:'POST',
                data:{service : service},
                url:'<?= base_url() ?>Order/cost',
                success:function(resp){
                    var result = resp.split(",");
                     $('#cost').html(`<h6>Total Cost: `+result[0]+`</h6>`);
                     $('#total').html(`<h4>Total : `+result[1] +`</h4>`);
                }
            });
        });
    });



    //menampilakn cost
</script>
</html>