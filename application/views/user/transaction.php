<style>
    .card:hover{
        transform:none;
    }
</style>
<div class="col-lg-9 col-md-9 col-sm-9 col-9 offset-lg-1 offset-md-1 offset-sm-1 offset-1 right-side">
    <h6>Transaction</h6><br>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-12 offset-lg-2">
        <form action="#">
            <div class="form-group">
                <label for="transaction">Search Code Transaction</label>
                <input type="text" class="form-control" id="search-code" placeholder="Search Code..." name="search-code" autocomplete="off" data-id="<?= $this->session->userdata('id_user'); ?>" required>
            </div>
        </form>
        </div>
    </div>
    <div class="row" id="result-search">
    </div>  
</div>
</body>
<script>
    $('#search-code').on('keypress', function(){
        let id = $('#search-code').data('id');
        let key = $('#search-code').val();
        $.ajax({
            url:'<?= base_url() ?>User/getTransaction',
            data:'id_user='+ id+'&& key='+key,
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
                        <div class="card" style="box-shadow:none;">
                            <div class="card-body">
                                <h6 class="card-title" id="code" data-code="`+data[i].transaction_code +`">Transaction Code : <span style="font-weight:normal;">`+data[i].transaction_code +`</span> </h6>
                                    <div class="detail"></div>
                                <h6>Rp.`+ total +`</h6>
                            </div>
                        </div>
                    </div>
                    `;
                }
                $('#result-search').html(result);

                let code = $('#code').data('code');
                $.ajax({
                    url:'<?= base_url() ?>User/getCode',
                    data:'code='+code,
                    dataType:'json',
                    type:'POST',
                    success:function(resp){
                        console.log(resp);
                        let data = '';
                        for (let i = 0; i < resp.length; i++) {                    
                            let total = resp[i].total;

                            let reverse2 =  total.toString().split('').reverse().join(''),
                            payment = reverse2.match(/\d{1,3}/g);
                            payment = payment.join('.').split('').reverse().join('');
                            
                            data += `
                                <p>`+ payment +`</p>
                            `;
                        }

                        $('.detail').html(data);
                    }
                });
            }
        });
    });
</script>
</html>