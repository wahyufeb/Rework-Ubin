
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>ORDERS</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li>Data Orders</li>
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
                                <div class="stat-text"><span class="count"><?= $totalorders[0]['orders'] ?></span></div>
                                <div class="stat-heading" style="margin-left:-10px;">Total Orders</div>
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
                                <div class="stat-text"><span class="count"><?= $soldout[0]['sold'] ?></span></div>
                                <div class="stat-heading">Products Sold</div>
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
                        <strong class="card-title">Data Orders</strong>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="font-size:16px;">Data Orders</a>
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
                                    <h5>REPORT DATA ORDERS</h5>
                                    <p><i>www.cubinwebsite.com</i></p>
                                </center>
                            </div>
                                <table class="table table-striped table-bordered display responsive no-wrap table-responsive" id="table-result">
                                        <thead>
                                            <tr align="center">                 
                                                <th>No</th>
                                                <th>Email</th>
                                                <th>Product</th>
                                                <th>Qty</th>
                                                <th>Date</th>
                                                <th>Province</th>
                                                <th>City</th>
                                                <th>Courier</th>
                                                <th>Adress</th>
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
                                    <p>Some content here.</p>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="mb-3">Bar chart </h4>
                                                    <canvas id="barChartOrders"></canvas>
                                                </div>
                                            </div>
                                        </div><!-- /# column -->
                                        <div style="display:none">
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="mb-3">Yearly Sales </h4>
                                                        <canvas id="sales-chart"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- /# column -->

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="mb-3">Team Commits </h4>
                                                        <canvas id="team-chart"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- /# column -->


                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="mb-3">Rader chart </h4>
                                                        <canvas id="radarChart"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- /# column -->

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="mb-3">Line Chart </h4>
                                                        <canvas id="lineChart"></canvas>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="mb-3">Doughut Chart </h4>
                                                            <canvas id="doughutChart"></canvas>
                                                        </div>
                                                    </div>
                                                </div><!-- /# column -->
                                            </div><!-- /# column -->
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="mb-3">Pie Chart </h4>
                                                        <canvas id="pieChart"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- /# column -->


                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="mb-3">Polar Chart </h4>
                                                        <canvas id="polarChart"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- /# column -->

                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="mb-3">Single Bar Chart </h4>
                                                        <canvas id="singelBarChart"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- /# column -->    
                                        </div>
                                    </div>
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
                    <h5 class="modal-title" id="staticModalLabel">Export Data Products</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>User_super_admin/ordersxls" method="post">
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
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/super_admin/assets/js/main.js"></script>
<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/super_admin/assets/js/init/chartjs-init.js"></script>
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
		url:'<?= base_url() ?>User_super_admin/ajaxOrders',
		dataType:'json',
		success:function(data){
			let x = '';
				for (let i = 0; i < data.length/3; i++) {
				let no = i + 1; 
				x +=`
					<tr align="center">
						<td>`+no+`</td>
						<td>`+data[i].email+`</td>
						<td>`+data[i].namapro+`</td>
						<td>`+data[i].qty+`</td>
						<td>`+data[i].date+`</td>
						<td>`+data[i].province+`</td>
						<td>`+data[i].city+`</td>
						<td><span style="text-transform:uppercase;">`+data[i].courier+`</span>, `+data[i].service+`</td>
						<td>`+data[i].street_adress+`, `+data[i].postal_code+`</td>
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
			url:'<?= base_url() ?>User_super_admin/searchOrders',
			type:'POST',
			dataType:'json',
			data:'start='+start+'&& end='+end,
			success:function(data){
				let result ='';
				for (let i = 0; i < data.length/3; i++) {
				let no = i +1;
				result +=`
					<tr align="center">
						<td>`+no+`</td>
						<td>`+data[i].email+`</td>
						<td>`+data[i].namapro+`</td>
						<td>`+data[i].qty+`</td>
						<td>`+data[i].date+`</td>
						<td>`+data[i].province+`</td>
						<td>`+data[i].city+`</td>
						<td><span style="text-transform:uppercase;">`+data[i].courier+`</span>, `+data[i].service+`</td>
						<td>`+data[i].street_adress+`, `+ data[i].postal_code+`</td>
						<td>`+data[i].status+`</td>
					</tr>
				`;
				}
				$('#result').html(result);
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

<script>
</script>
<script> 
$(document).ready(function(){
    realData();
})
        const realData=(val)=>{
            $.ajax({
                url:'<?=base_url() ?>User_super_admin/chartData',
                dataType:'json',
                type:'POST',
                success:function(data){
                    for (let i = 0; i < data.length; i++) {
                            myChart.data.labels.push(data[i].date);
                            myChart.data.datasets[0].data.push(data[i].total);
                            myChart.update();
                    }
                }
            });
        }
        const up=()=>{
            $.ajax({
                url:'<?=base_url() ?>User_super_admin/chartData',
                dataType:'json',
                type:'POST',
                success:function(data){
                    console.log(data)
                }
            });
        }
        // bar chart
        var ctx = document.getElementById( "barChartOrders" );
        // ctx.height = 200;
        var myChart = new Chart( ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [
                    {
                        label: "Orders",
                        data: [],
                        borderColor: "rgba(0, 194, 146, 0.9)",
                        borderWidth: "0",
                        backgroundColor: "rgba(0, 194, 146, 0.5)"
                                }
                            ]
            },
            options: {
                scales: {
                    yAxes: [ {
                        ticks: {
                            beginAtZero: true
                        }
                                    } ]
                }
            }
        } );

// }
</script>

