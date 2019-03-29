
<link href='<?= base_Url() ?>assets/dropzone/dropzone.min.css' type='text/css' rel='stylesheet'>
<script src='<?= base_url() ?>assets/dropzone/dropzone.min.js' type='text/javascript'></script>

<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
    <div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-account-multiple menu-icon"></i>                
        </span>
        Accounts
    </h3>
</div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card" style="padding:30px;">
                <div class="table-hover table-striped table-responsive">
                <table class="table" id="table-accounts">
                <thead> 
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Telephone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                <?php foreach($allaccounts as $row): ?>
                <?php $i++ ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><img src="<?= base_url() ?>uploads/<?= $row['photo'] ?>" alt="<?= $row['photo'] ?>""></td>
                        <td><?= $row['email']; ?></td>
                        <td>
                            <?php if($row['active'] == 1){ ?>
                                <label class="badge badge-gradient-success">ACTIVED</label>
                            <?php }else{?>
                                <label class="badge badge-gradient-danger">SUSPENDED</label>
                            <?php } ?>
                        </td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['telephone'] ?></td>
                        <td>
                            <?php if($row['active'] == 1){ ?>
                                <a href="<?= base_url() ?>User_admin/suspendAccount/<?= $row['id_user'] ?>" class="suspend" data-name="<?= $row['name'] ?>">
                                <button type="button" class="btn btn-inverse-danger btn-icon">
                                    <i class="mdi mdi-account-off"></i>
                                </button>
                                </a>
                            <?php }else{ ?>
                                <a href="<?= base_url() ?>User_admin/activeAccount/<?= $row['id_user'] ?>" class="active" data-name="<?= $row['name'] ?>">
                                    <button type="button" class="btn btn-inverse-success btn-icon">
                                        <i class="mdi mdi-account-check"></i>
                                    </button>
                                </a>                                            
                            <?php } ?>

                            <button type="button" class="btn btn-inverse-info btn-icon" data-toggle="modal" data-target=".bd-example-modal-md-detail-user" onclick="getAccount(<?= $row['id_user'] ?>)">
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
<div class="modal fade bd-example-modal-md-detail-user" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md-detail">
    <div class="modal-content">
        <div class="card">
            <div class="card-body">
                <div id="result-detail"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Detail -->
<script>
    function getAccount(id){
        $.ajax({
            url:'<?= base_url() ?>User_admin/getAccount',
            data:'id_user='+id,
            dataType:'json',
            type:'POST',
            success:function(data){
                let result = '';
                for (let i = 0; i < data.length; i++) {
                    result +=`
                                                <style>
                                                        h4, h6{
                                                                color:#b66dff;
                                                        }
                                                </style>
                    <center>
                        <img src="<?= base_url() ?>uploads/`+ data[i].photo +`" width="300">
                    </center>
                                                <div class="row" style="margin-top:20px;">
                                                        <div class="col-lg-6 col-md-6">
                                                                <h6><i class="mdi mdi-email-outline"></i> Email</h6>
                                                                <p class="text-muted">`+ data[i].email +`</p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                                <h6><i class="mdi mdi-account"></i> Name</h6>
                                                                <p class="text-muted">`+ data[i].name +`</p>
                                                        </div>
                                                </div>
                                                <hr>
                                                <div class="row" style="margin-top:30px;">
                                                        <div class="col-lg-4 col-md-4">
                                                                <h6 class="text-muted">Province :</h6>
                                                                <p class="text-muted">`+ data[i].province +`</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4">
                                                                <h6 class="text-muted">City :</h6>
                                                                <p class="text-muted">`+ data[i].city +`</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4">
                                                                <h6 class="text-muted">Street :</h6>
                                                                <p class="text-muted">`+ data[i].street +`</p>
                                                        </div>
                                                </div>
                                                <hr>
                                                <div class="row" style="margin-top:10px;">
                                                        <div class="col-lg-6 col-md-6">
                                                                <h6><i class="mdi mdi-phone"></i> Telephone</h6>
                                                                <p class="text-muted">`+ data[i].telephone +`</p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                                <h6>Status</h6>
                                                                <div id="status"></div>
                                                        </div>
                                                </div>
                    `;
                $('#result-detail').html(result);
                                        
                if (data[i].active == 1) {
                    $('#status').html(`<label class="badge badge-gradient-success">ACTIVED</label>`);
                }else{
                    $('#status').html(`<label class="badge badge-gradient-danger">SUSPENDED</label>`);
                }
                }

            }
        });
    }
</script>