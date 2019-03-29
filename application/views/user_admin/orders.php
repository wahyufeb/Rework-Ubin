
<link href='<?= base_Url() ?>assets/dropzone/dropzone.min.css' type='text/css' rel='stylesheet'>
<script src='<?= base_url() ?>assets/dropzone/dropzone.min.js' type='text/javascript'></script>

<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-basket menu-icon"></i>                
                </span>
                Orders
            </h3>
        </div>
<?php print_r($orders); ?>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card" style="padding:30px;">
                        <div class="table-hover table-striped table-responsive">
                        <table class="table" id="table">
                        <thead align="center"> 
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Weight</th>
                                <th>Sold</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        <?php foreach($products as $row): ?>
                        <?php $i++ ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><img src="<?= base_url() ?>assets/img/<?= $row['image'] ?>" alt="<?= $row['image'] ?>" style="border-radius:0px;width:60px;height:50px;"></td>
                                <td align="left"><?= $row['name']; ?></td>
                                <td>Rp.<?= number_format($row['price'], 0,',','.') ?></td>
                                <td><?=  $row['weight']?> grams</td>
                                <td>
                                    <div class="progress">
                                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: <?= $row['sold'] ?>%" aria-valuenow="<?= $row['sold'] ?>" aria-valuemin="0" aria-valuemax="1000"></div>
                                </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-inverse-dark btn-icon update" data-id="<?= $row['id_product'] ?>" data-toggle="modal" data-target=".bd-example-modal-md-update">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>

                                    <a href="<?= base_url() ?>User_admin/deleteProduct/<?= $row['id_product'] ?>" class="delete-product" data-delete="<?= $row['name'] ?>">   
                                        <button type="button" class="btn btn-inverse-danger btn-icon">
                                        <i class="mdi mdi-delete"></i>
                                        </button>
                                    </a>

                                    <button type="button" class="btn btn-inverse-info btn-icon" data-toggle="modal" data-target=".bd-example-modal-md-detail" onclick="detail(<?= $row['id_product'] ?>)">
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
        <div class="modal fade bd-example-modal-md-detail" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
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