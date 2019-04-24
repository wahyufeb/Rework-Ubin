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
    @media only screen and (max-width: 400px) {
        #list{
            font-size:14px;
        }
        #list span{
            font-weight: bold;
            font-size: 14px;
        }
        .card-body p{
            font-size: 14px;
        }
        .card-body h5{
            font-size: 18px;
        }
        #null{
            font-size:13px;
        }
    }
</style>
<div class="col-lg-9 col-md-9 col-sm-11 col-11 offset-lg-1 offset-md-1  right-side">
    <!-- <h5>Transaction</h5> -->
    <nav aria-label="breadcrumb" style="margin-top:20px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>User">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Transaction</li>
        </ol>
        </nav>

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-12 offset-lg-2">
            <div id="transaction" data-id="<?= $this->session->userdata('id_user'); ?>"></div>
            <h6 class="text-center" style="margin-top:20px;margin-bottom:30px;" id="tittle">Upload Image Proof of Transaction</h6> 
        </div>
    </div>
    <div id="null"></div>
    <div class="row" id="result-search">
    </div>  
</div>
    </div>
</body>
<script>
    $(document).ready(function(){
        let id = $('#transaction').data('id');
        // let key = $('#search-code').val();
        $.ajax({
            url:'<?= base_url() ?>User/getTransaction',
            data:'id_user='+ id,
            dataType:'json',
            type:'POST',
            success:function(data){
                if(data.length == 0){
                    $('#null').html(`    
                    <div class="alert alert-success" role="alert">
                        <h5 class="alert-heading">Payment Confirmation</h5>
                        <p>
                            <p>Step for Payment Confirmation</p>
                            <ol>
                                <li>Check your email</li>
                                <li>In the e-mail contact, select the e-mail from CUBIN Website</li>
                                <li>Open the email, see the transaction code and ATM Account number belonging to Cubin Webiste</li>
                                <li>Send the approved money in an email and choose one of the account numbers from the Cubin ATM Site</li>
                                <li>After that, the photo approves the payment from your ATM and uploads it on the transaction menu</li>
                                <li>Check payment confirmation from the admin</li>
                                <li>Check the status in the transaction menu</li>
                                <li>If the transaction status is "paid" means the item is being shipped</li>
                            </ol>
                        </p>
                        <hr>            
                        <p class="mb-0">If you not receive a email, please contact <a href="#" class="btn btn-info" style="height:30px;line-height:15px;">Admin</a></p>
                    </div>
                    `);
                    $('#tittle').hide();
                }else{
                    
                    let result = '';
                    for (let i = 0; i < data.length; i++) {
                        let payment = data[i].total_payment;
                        let reverse2 =  payment.toString().split('').reverse().join(''),
                        total = reverse2.match(/\d{1,3}/g);
                        total = total.join('.').split('').reverse().join('');
                        if(data[i].transaction_image == ""){
                            result +=`
                            </div>     
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <p>Step for Payment Confirmation</p>
                                <ol>
                                    <li>Check your email</li>
                                    <li>In the e-mail contact, select the e-mail from CUBIN Website</li>
                                    <li>Open the email, see the transaction code and ATM Account number belonging to Cubin Webiste</li>
                                    <li>Send the approved money in an email and choose one of the account numbers from the Cubin ATM Site</li>
                                    <li>After that, the photo approves the payment from your ATM and uploads it on the transaction menu</li>
                                    <li>Check payment confirmation from the admin</li>
                                    <li>Check the status in the transaction menu</li>
                                    <li>If the transaction status is "paid" means the item is being shipped</li>
                                </ol>
                            </div>
                            <div class="col-lg-6  col-md-6 col-sm-12 col-12" style="margin-bottom:20px;">
                                <div class="card" style="box-shadow:none;">
                                    <div class="card-body">
                                        <h6 class="card-title" id="code" data-code="`+data[i].transaction_code +`">Transaction Code : <span style="font-weight:normal;">`+data[i].transaction_code +`</span> </h6>
                                            <div class="detail"></div>
                                            <div id="address" style="margin-top:20px;"></div>
                                            <div id="cost" style="margin-top:40px;"></div>
                                            <h6>Total Payment : Rp.`+ total +`</h6><hr><br>
                                            <div id="status" style="margin-bottom:20px;"></div>
                                        <span style="font-size:15px;opacity:.8;">*Upload your proof of transaction in here</span>
                                        <?php echo form_open_multipart('User/uploadTransaction_image');?>
                                            <input type="file" name="image" size="20" />
                                            <input type="submit" class="btn btn-success" value="Upload Image" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            `;
                        }else{
                            result +=`
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                <p>Step for Payment Confirmation</p>
                                <ol>
                                    <li>Check your email</li>
                                    <li>In the e-mail contact, select the e-mail from CUBIN Website</li>
                                    <li>Open the email, see the transaction code and ATM Account number belonging to Cubin Webiste</li>
                                    <li>Send the approved money in an email and choose one of the account numbers from the Cubin ATM Site</li>
                                    <li>After that, the photo approves the payment from your ATM and uploads it on the transaction menu</li>
                                    <li>Check payment confirmation from the admin</li>
                                    <li>Check the status in the transaction menu</li>
                                    <li>If the transaction status is "paid" means the item is being shipped</li>
                                </ol>
                            </div>
                            <div class="col-lg-6  col-md-12 col-sm-12 col-12" style="margin-bottom:20px;">
                                <div class="card" style="box-shadow:none;overflow:hidden;">
                                    <div class="card-body">
                                        <h6 class="card-title" id="code" data-code="`+data[i].transaction_code +`">Transaction Code : <span style="font-weight:normal;">`+data[i].transaction_code +`</span> </h6>
                                            <div class="detail"></div>
                                            <div id="address" style="margin-top:20px;"></div>
                                            <div id="cost" style="margin-top:40px;"></div>
                                            <h6>Total Payment : Rp.`+ total +`</h6><hr><br>
                                            <div id="status" style="margin-bottom:20px;"></div>
                                            <img src="<?= base_url() ?>assets/transaction/image/`+data[i].transaction_image+`" width="200"><br>
                                            <span id="note" style="font-size:15px;opacity:.8;">*Proof of payment is being confirmed by the admin, please wait and check the status in the transaction menu</span>
                                            <span id="note2" style="font-size:15px;opacity:.8;"></span>
                                    </div>
                                </div>
                            </div>
                            `;
                        }
                    }
                    $('#result-search').html(result);
                    $('#tittle').show();
    
                    let code = $('#code').data('code');
                    $.ajax({
                        url:'<?= base_url() ?>User/getCode',
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
    
                                data += `
                                    <div class="row" id="list">
                                        <div class="col-md-6 col-sm-6 col-12"><span>`+no+`.</span> `+resp[i].name+`</div>
                                        <div class="col-md-2 col-sm-2 col-6">qty :`+ resp[i].qty +`</div>
                                        <div class="col-md-4 col-sm-4 col-6"> Rp. `+ payment +`</div>
                                    </div>
                                `;
                                $('#address').html(`<h6>Address : </h6><p>`+ resp[i].province+`, `+resp[i].city+`, `+resp[i].street_adress +`</p>
                                <div class="row">
                                    <div class="col-md-6"><h6>Date : </h6><p>`+ date.substr(0, 10) +`</p></div>
                                    <div class="col-md-6"><h6>Expired : </h6><p>`+ due_date.substr(0,10) +`</p></div>
                                </div>`)
                                $('#status').html(`
                                <center>
                                    <h5 style="color:red;">Status : `+ resp[i].status +` <i class="far fa-times-circle animated infinite heartBeat delay-3s"></i></h5>
                                </center>
                                `);
                                $('#cost').html(`Total Cost &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.`+cost+``);
                                if(resp[i].status == "paid"){
                                    $('#note').hide();
                                    $('#note2').html("*Thank you, your order is in the process of being shipped")
                                    $('#status').html(`
                                        <center>
                                            <h5 style="color:#84CF96;">Status : `+ resp[i].status +` <i class="fas fa-check animated infinite tada delay-1s"></i></h5>
                                        </center>
                                    `);
                                }else if(resp[i].status == "confirmation process"){
                                    $('#status').html(`
                                        <center>
                                            <h5 style="color:#ff7400;">Status : `+ resp[i].status +` <i class="fas fa-spinner animated infinite rotateOut "></i></h5>
                                        </center>
                                    `);
                                }
                            }
                            $('.detail').html(data);
                            $('#tittle').show();
                        }
                    });
                }
            }
        });
    });
</script>
</html>