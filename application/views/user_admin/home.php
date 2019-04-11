<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>                 
                </span>
                Dashboard
            </h3>
            </div>
            <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white" style="border-radius:18px;">
                <div class="card-body">
                    <img src="<?= base_url() ?>assets/admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                    <h4 class="font-weight-normal mb-3">Revenue
                    <i class="mdi mdi-cash-multiple mdi-24px float-right"></i>
                    </h4>
                    <?php foreach($salesTotal as $row): ?>
                        <?php if($row['status'] == "paid"): ?>
                            <h2 class="mb-5">Rp. <?= number_format($row['total'], 0,',','.') ?></h2>
                        <?php endif; ?>
                    <?php endforeach;?>
                        <h6 class="card-text"><?= $soldout[0]['sold'] ?> <span style="font-weight:340;">products sold</span></h6>
                </div>
                </div>
            </div>
            <!-- <form action="action">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="text" name="tanggal" class="tanggal" />
                </div>
            </form> -->
            <div class="col-md-4 stretch-card grid-margin" >
                <div class="card bg-gradient-info card-img-holder text-white" style="border-radius:18px;">
                <div class="card-body">
                    <img src="<?= base_url() ?>assets/admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                  
                    <h4 class="font-weight-normal mb-3">Total Orders
                    <i class="mdi mdi-cart mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?= number_format($totalorders[0]['orders'], 0, ',','.') ?></h2>
                    <h6 class="card-text">Total Products : <?= number_format($totalpro[0]['products'], 0, ',','.') ?></h6>
                </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white" style="border-radius:18px;">
                <div class="card-body">
                    <img src="<?= base_url() ?>assets/admin/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                    <h4 class="font-weight-normal mb-3">Total Testimonials
                    <i class="mdi mdi-account-switch mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?= number_format($totaltesti[0]['comments'],0,',','.') ?></h2>
                    <h6 class="card-text">Total Users : <?= number_format($totalusers[0]['users'],0,',','.') ?></h6>
                </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                    <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                    <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>                                     
                    </div>
                    <canvas id="visit-sale-chart" class="mt-4"></canvas>
                </div>
                </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Traffic Sources</h4>
                    <canvas id="traffic-chart"></canvas>
                    <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>                                                      
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- content-wrapper ends -->