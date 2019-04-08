
<link href='<?= base_Url() ?>assets/dropzone/dropzone.min.css' type='text/css' rel='stylesheet'>
<script src='<?= base_url() ?>assets/dropzone/dropzone.min.js' type='text/javascript'></script>

<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-square-inc-cash menu-icon"></i>                
                </span>
                Orders & Transaction
            </h3>
        </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card" style="padding:30px;">
                        <div class="table-hover table-striped table-responsive">
                        <table class="table" id="table-orders">
                        <thead> 
                            <tr>
                                <th>#</th>
                                <th>Transaction Code</th>
                                <th>Photo</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Telephone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        <?php foreach($orders as $row): ?>
                        <?php $i++ ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['transaction_code']; ?></td>
                                <td><img src="<?= base_url() ?>uploads/<?= $row['photo'] ?>" alt="<?= $row['photo'] ?>" style="border-radius:50%;width:50px;height:50px;"></td>
                                <td><?= $row['email'] ?></td>
                                <td>
                                <?php if($row['status'] == "paid"){ ?>
                                    <label class="badge badge-gradient-success" style="padding:5px;">PAID</label>
                                <?php }elseif($row['status'] =="unpaid"){?>
                                    <label class="badge badge-gradient-danger" style="padding:5px;">UNPAID</label>
                                <?php }else{?>
                                    <label class="badge badge-gradient-warning" style="padding:5px;">CONFIRMATION PROCESS</label>
                                <?php } ?>
                                </td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['telephone'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-inverse-info btn-icon transaction" data-toggle="modal" data-target=".bd-example-modal-md-transaction" data-code="<?= $row['transaction_code'] ?>">
                                        <i class="mdi mdi-information-outline"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        </table>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- Modal Detail -->
        <div class="modal fade bd-example-modal-md-transaction" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md-detail">
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <div id="result"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Detail -->
        <!-- Modal Detail -->
        <div class="modal fade bd-example-modal-md-img" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md-img">
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <div id="img" style="padding:5px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Detail -->

<script>
    $('.transaction').on("click", function(){
        let code = $(this).data('code');
        $.ajax({
            url:'<?= base_url() ?>User_admin/getTransaction',
            data:'transaction_code='+code,
            dataType:'json',
            type:'POST',
            success:function(data){
                let result = '';
                for (let i = 0; i < data.length; i++) {
                let payment = data[i].total_payment;
                let reverse2 =  payment.toString().split('').reverse().join(''),
                total = reverse2.match(/\d{1,3}/g);
                total = total.join('.').split('').reverse().join('');
                    result +=`
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:20px;">
                            <div class="card" style="box-shadow:none;border:none;">
                                <div class="card-body">
                                    <h6 class="card-title" id="code" data-code="`+data[i].transaction_code +`">Transaction Code : <span style="font-weight:normal;">`+data[i].transaction_code +`</span> </h6>
                                        <div class="detail"></div>
                                        <div id="address" style="margin-top:20px;"></div>
                                        <div id="cost" style="margin-top:40px;"></div>
                                        <h6>Total Payment : Rp.`+ total +`</h6><hr><br>
                                </div>
                            <center style="color:skyblue;">
                            <button type="button" class="btn btn-inverse-info btn-icon img" data-toggle="modal" data-target=".bd-example-modal-md-img"">
                                <i class="mdi mdi-eye"></i>
                            </button> view image
                            </center><br>
                            <center>
                                <a href="<?= base_url() ?>User_admin/confirmationTransaction/`+ data[i].transaction_code +`" class="confirm">
                                    <button type="submit" class="btn btn-success">Confirm Transaction</button>
                                </a>
                            </center>
                                <div id="status" style="margin-bottom:20px;margin-top:10px"></div>
                                </div>
                        </div>
                    `;
                    $('#img').html(`<center>
                                        <img src="<?= base_url() ?>assets/transaction/image/`+ data[i].transaction_image +`" width="420">
                                    </center>
                    `)
                }
                $('#result').html(result);
                
                $.ajax({
                    url:'<?= base_url() ?>User_admin/getCode',
                    data:'code='+code,
                    dataType:'json',
                    type:'POST',
                    success:function(resp){
                        let data = '';
                        for (let i = 0; i < resp.length; i++) {                    
                            let total = resp[i].total;
                            let no = i+1
                            let costs = resp[i].total_cost;

                            let reverse2 =  total.toString().split('').reverse().join(''),
                            payment = reverse2.match(/\d{1,3}/g);
                            payment = payment.join('.').split('').reverse().join('');

                            let reverse =  costs.toString().split('').reverse().join(''),
                            cost = reverse.match(/\d{1,3}/g);
                            cost = cost.join('.').split('').reverse().join('');
                            
                            let date = resp[i].date;
                            let due_date = resp[i].due_date;
                            let service = resp[i].service;
                            
                            data += `
                                <div class="row" style="font-size:15px;">
                                    <div class="col-md-5 col-sm-5 col-12">`+no+`. `+resp[i].name+`</div>
                                    <div class="col-md-1 col-sm-1 col-6">`+ resp[i].qty +`</div>
                                    <div class="col-md-5 col-sm-5 col-6"> Rp. `+ payment +`</div>
                                </div>
                            `;
                            $('#address').html(`<h6>Address : </h6><p>`+ resp[i].province+`, `+resp[i].city+`, `+resp[i].street_adress +`</p>
                            <div class="row">
                            <div class="col-md-12"><h6>Service : </h6><p><span class="text-uppercase">`+ resp[i].courier+`</span> `+ service.substr(6) +`</p></div>
                                <div class="col-md-6"><h6>Date : </h6><p>`+ date.substr(0, 10) +`</p></div>
                                <div class="col-md-6"><h6>Expired : </h6><p>`+ due_date.substr(0,10) +`</p></div>
                            </div>
                            `);
                            $('#status').html(`
                            <center>
                                <h5 style="color:#ff5252;">Status : `+ resp[i].status +` <i class="mdi mdi-close-circle-outline"></i></h5>
                            </center>
                            `);
                            $('#cost').html(`Total Cost &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.`+cost+``);
                            if(resp[i].status == "paid"){
                                $('.confirm').hide();
                                $('#status').html(`
                                    <center>
                                        <h5 style="color:#84CF96;">Status : `+ resp[i].status +` <i class="mdi mdi-checkbox-marked-circle-outline"></i></h5>
                                    </center>
                                `);
                            }else if(resp[i].status == "confirmation process"){
                                $('#status').html(`
                                    <center>
                                        <h5 style="color:#ff7400;">Status : `+ resp[i].status +` ...</h5>
                                    </center>
                                `);
                            }
                        }
                        $('.detail').html(data);
                    }
                });
            }
        })
    });
</script>