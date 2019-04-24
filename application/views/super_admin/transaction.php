
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>TRANSACTION</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li>Data Transaction</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-3">
                            <i class="ti-bag"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?= $totaltrans[0]['total'] ?></span></div>
                                <div class="stat-heading" style="margin-left:-20px;">Total Transaction</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <i class="ti-shopping-cart-full"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text" style="margin-left:-30px;">Rp.<?= number_format($totalPay[0]['payment'], 0,',','.') ?></div>
                                <div class="stat-heading" style="margin-left:-20px;">Total Payment</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card" >
                <div class="card-body">
                <button id="printpdf" class="card-body btn btn-primary" style="font-size:18px;padding:15px;"><i class="ti-printer"></i> Print</button>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card" >
                <div class="card-body">
                <button class="card-body btn btn-success" style="font-size:18px;padding:15px;" data-toggle="modal" data-target="#staticModal"><i class="fa fa-file-text"></i> Excel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Transaction</strong>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="font-size:16px;">Data Transaction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" style="font-size:16px;">Chart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" style="font-size:16px;">Menu 2</a>
                            </li>
                        </ul>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div style="margin-bottom:30px;margin-top:30px;"></div>
									<!-- <h6>Search Orders Data</h6> -->
									<div class="row">
										<div class="col-lg-3">
											<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar-o"></i></span>
											</div>
											<input type="text" class="form-control tanggal" placeholder="Start Date" aria-describedby="basic-addon1" name="start-date">
											</div>
										</div>
										<div class="col-lg-3">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar-o"></i></span>
												</div>
												<input type="text" class="form-control tanggal" placeholder="End Date" aria-describedby="basic-addon1"
												name="end-date">
											</div>
										</div>
										<div class="col-lg-3">
											<button type="submit" class="btn btn-success" id="search-date"><i class="fa  fa-search"></i> Search</button>
										</div>
									</div>
                            <div style="margin-bottom:30px;margin-top:30px;"></div>
                            <div class="out">
                            <div class="typo">
                                <center>
                                    <h5>REPORT DATA TRANSACTION</h5>
                                    <p><i>www.cubinwebsite.com</i></p>
                                </center>
                            </div>
                                <table class="table table-striped table-bordered display responsive no-wrap table-responsive" id="table-result">
                                        <thead align="center">
                                            <tr>
                                                <th>No</th>
                                                <th>Transaction Code</th>
                                                <th>Date</th>
                                                <th>Photo</th>
                                                <th>Email</th>
                                                <th>Name</th>
                                                <th>Telephone</th>
                                                <th>Total Payment</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="result">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3>Menu 1</h3>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <h3>Menu 2</h3>
                                <p>Some content here.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


<div class="clearfix"></div>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Modal Excel -->
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Export Data Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>User_super_admin/transactionxls" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="hidden" value="<?= date("d-M-Y"); ?>" name="reportdate">
                                    <label for="filename">File name</label>
                                    <input type="text" class="form-control" id="filename" placeholder="Enter file name" name="filename"  required>
                                </div>
                            </div>
                                <div class="col-lg-12">
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar-o"></i></span>
                                    </div>
                                    <input type="text" class="form-control tanggal" placeholder="Start Date"  name="start">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar-o"></i></span>
                                        </div>
                                        <input type="text" class="form-control tanggal" placeholder="End Date"
                                        name="end">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- Print Area -->
<script src="<?= base_url() ?>assets/custom/js/jquery.PrintArea.js"></script>
<!-- datepicker -->
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('.tanggal').datepicker({
			format: "yyyy-mm-dd",
			autoclose:true
		});
	});
</script>
<script>
$(document).ready(function(){
	$.ajax({
		url:'<?= base_url() ?>User_super_admin/ajaxTransaction',
		dataType:'json',
		success:function(data){
			let x = '';
				for (let i = 0; i < data.length; i++) {
				let no = i + 1; 
            var reverse = data[i].total_payment.toString().split('').reverse().join(''),
                            total  = reverse.match(/\d{1,3}/g);
                            total  = total.join('.').split('').reverse().join('');
				x +=`
					<tr align="center">
						<td>`+no+`</td>
						<td>`+data[i].transaction_code+`</td>
						<td>`+data[i].date+`</td>
						<td><img src="<?= base_url() ?>uploads/`+data[i].photo+`"/></td>
						<td>`+data[i].email+`</td>
						<td>`+data[i].name+`</td>
						<td>`+data[i].telephone+`</td>
						<td>Rp.`+total+`</td>
						<td>`+data[i].status+`</td>
					</tr>
				`;
				}
				$('#result').html(x);
		}
	});
	$('#search-date').on("click", function(){
		let start = $('input[name="start-date"]').val();
		let end = $('input[name="end-date"]').val();

		$.ajax({
			url:'<?= base_url() ?>User_super_admin/searchTransaction',
			type:'POST',
			dataType:'json',
			data:'start='+start+'&& end='+end,  
			success:function(data){
                let x = '';
				for (let i = 0; i < data.length; i++) {
        var reverse2 = data[i].total_payment.toString().split('').reverse().join(''),
                total  = reverse2.match(/\d{1,3}/g);
                total  = total.join('.').split('').reverse().join('');
				let no = i + 1; 
				x +=`
                <tr align="center">
						<td>`+no+`</td>
						<td>`+data[i].transaction_code+`</td>
						<td>`+data[i].date+`</td>
						<td><img src="<?= base_url() ?>uploads/`+data[i].photo+`"/></td>
						<td>`+data[i].email+`</td>
						<td>`+data[i].name+`</td>
						<td>`+data[i].telephone+`</td>
						<td>Rp. `+total+`</td>
						<td>`+data[i].status+`</td>
					</tr>
				`;
				}
				$('#result').html(x);
			}
		})
	});
})
</script>
<script>
    $('.typo').hide();
    $('#printpdf').on("click", function(){
        $('.typo').show();
        $('.out').printArea();
    });
</script>
