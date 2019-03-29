        <style>
            label{
                font-size:15px;
            }
        </style>
        <div id="order" data-order="<?= $this->session->flashdata('order');  ?>"></div>
        <?php if($this->session->flashdata('order')){ ?>
        <?php $this->session->flashdata('order') ?>
        <?php }?>
        <div class="col-lg- col-md-9 col-sm-12 col-12 offset-md-1  right-side">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead align="center" >
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
            </div>
            <div class="row">
            <input type="hidden" value="<?php echo $sum; ?>" id="weight">
                    <div class="col-lg-3 offset-lg-6" >
                    <?php $totalWeight = $sum; ?>
                        Total Weight : <b><?= $totalWeight;  ?> grams</b>
                    </div>
                    <input type="hidden" value="<?= $totalWeight; ?>" id="weight">
                    <div class="col-lg-2">
                    <?php $totalPrice = number_format($this->cart->total(),0,',','.'); ?>
                        Total : <b>Rp. <?= $totalPrice; ?></b>
                    </div>
            </div><br>
            <form action="<?= base_url() ?>Order/getOrder" method="post">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <label for="province">Select Province</label>
                        <select class="form-control" id="destination_province" name="destination_province" required>
                        <option selected disabled>- Province -</option>
                        <?php foreach($province->rajaongkir->results as $row) {?>
                    <option value="<?= $row->province_id ?>">
                        <?= $row->province ?>
                    </option>
                    <?php }?>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <label for="province">Select City</label>
                        <select class="form-control" id="destination_city" name="destination_city" required>
                        <option value="" selected disabled>- City -</option>  
                        </select>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-lg-5 col-md-4 col-sm-12 col-12">
                        <label for="courier">Select Courier</label>
                        <select class="form-control" id="courier" name="couirer" required>
                        <option value="" selected disabled>- Courier -</option>  
                            <option value="jne">JNE</option>
                            <option value="pos">POS</option>
                            <option value="tiki">TIKI</option>
                        </select>
                    </div>
                    <div class="col-lg-5 col-md-4 col-sm-12 col-12">
                        <label for="service">Select Service</label>
                        <select class="form-control" id="service" name="service" required>
                        <option selected disabled>- Service -</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="postalcode">Postal Code</label>
                            <input type="number" class="form-control" id="postalcode" placeholder="Enter postal code" name="postalcode" required>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="street">Street Adress</label>
                            <input type="text" class="form-control" id="street" placeholder="Enter street adress" name="street" required>
                        </div>
                    </div>
                </div>
                <hr>
                <div id="costtotal"></div>
                <input type="hidden" name="cost">
                <div id="totalpayment"></div>
                <div class="row">
                    <div class="col-lg-3 offset-lg-9" id="cost">                    
                    <?php $totalPrice = number_format($this->cart->total(),0,',','.'); ?>
                        Total : <b>Rp. <?= $totalPrice; ?></b></div><hr>
                    <div class="col-lg-3 offset-lg-9" id="total"></div>
                </div><hr>
                <div class="row mt-200">
                    <div class="col-lg-3 offset-lg-9" >
                        <a href="#" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-success">Order Now</button>
                    </div>
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
                    var resultCost  = result[0];
                    var resultTotal = result[1];
                    $('input[name="cost"]').val(resultCost);

                    $('#costtotal').html(`<input type="hidden" value="`+result[0]+`"  name="cost" >`)
                    $('#totalpayment').html(`<input type="hidden" value="`+result[1]+`"  name="total" >`)
                    var reverse = resultCost.toString().split('').reverse().join(''),
                            cost  = reverse.match(/\d{1,3}/g);
                            cost  = cost.join('.').split('').reverse().join('');

                    var reverse2 =  resultTotal.toString().split('').reverse().join(''),
                            total = reverse2.match(/\d{1,3}/g);
                            total = total.join('.').split('').reverse().join('');
                    

                    $('#cost').html(`Total Cost: <b>Rp. `+cost+`</b>`);
                    $('#total').html(`Total Payment :  <h5>Rp.`+total +`</h5>`);
                }
            });
        });
    });
    //menampilakn cost
</script>
</html>