
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>USERS</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li>Data Users</li>
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
                        <div class="stat-icon dib flat-color-1">
                            <i class="fa fa-group"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?= $totalusers[0]['users'] ?></span></div>
                                <div class="stat-heading" style="margin-left:-10px;">Total Users</div>
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
                        <div class="stat-icon dib flat-color-3">
                            <i class="ti-user"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?= $totaladmin[0]['admins'] ?></span></div>
                                <div class="stat-heading">Total Admins</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card" >
                <div class="card-body">
                    <button id="printpdf" class="card-body btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="font-size:18px;padding:15px;"><i class="ti-printer"></i> Print</button>
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
                        <strong class="card-title">Data Products</strong>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="font-size:16px;">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" style="font-size:16px;">Admins</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" style="font-size:16px;">Charts</a>
                            </li>
                        </ul>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div style="margin-bottom:30px;margin-top:30px;"></div>
                            <table id="tableproduct" class="table table-striped table-bordered">
                                <thead>
                                        <tr align="center">                                
                                            <th>No</th>
                                            <th>Photo</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Telephone</th>
                                            <th>Province</th>
                                            <th>City</th>
                                            <th>Street</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php $i = 0; ?>
                                <?php foreach($users as $row): ?>
                                <?php $i++ ?>
                                <tr align="center">
                                        <td><?= $i ?></td>
                                        <td><img src="<?= base_url() ?>uploads/<?= $row['photo'] ?>" alt="<?= $row['photo'] ?>" style="border-radius:50%;width:60px;height:60px;"></td>
                                        <td align="left"><?= $row['email']; ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?=  $row['telephone']?></td>
                                        <td><?= $row['province'] ?></td>
                                        <td><?= $row['city'] ?></td>
                                        <td><?= $row['street'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div style="margin-bottom:30px;margin-top:30px;"></div>
                            <table id="tableadmin" class="table table-striped table-bordered">
                                <thead>
                                        <tr align="center">                                
                                            <th>No</th>
                                            <th>Photo</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Telephone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php $i = 0; ?>
                                <?php foreach($alladmin as $row): ?>
                                <?php $i++ ?>
                                <tr align="center">
                                        <td><?= $i ?></td>
                                        <td><img src="<?= base_url() ?>uploads/<?= $row['photo'] ?>" alt="<?= $row['photo'] ?>" style="border-radius:50%;width:60px;height:60px;"></td>
                                        <td align="left"><?= $row['email']; ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?=  $row['telephone']?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
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


<!-- Modal Print -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Print Data Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url() ?>User_super_admin/printUsers" method="post">
        <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="hidden" value="<?= date("d-M-Y"); ?>" name="reportdate">
                        <label for="filename">File name</label>
                        <input type="text" class="form-control" id="filename" placeholder="Enter file name" name="filename"  required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="street">Set Size</label>
                    <select class="form-control" id="setsize" name="setsize" required>
                        <option value="" selected disabled>- Set Size -</option>  
                        <option value="A3">A3</option>
                        <option value="A4">A4</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for="street">Set Orientation</label>
                    <select class="form-control" id="setorientation" name="setorientation" required>
                        <option value="" selected disabled>- Select one -</option>  
                        <option value="landscape">Landscape</option>
                        <option value="portrait">Portrait</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
    </div>
</div>
</div>

<!-- Modal Excel -->
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Export Data Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>User_super_admin/usersxls" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="hidden" value="<?= date("d-M-Y"); ?>" name="reportdate">
                                    <label for="filename">File name</label>
                                    <input type="text" class="form-control" id="filename" placeholder="Enter file name" name="filename"  required>
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