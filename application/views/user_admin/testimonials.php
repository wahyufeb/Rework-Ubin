<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
    <div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-basket menu-icon"></i>                
        </span>
        Testimonials
    </h3>
</div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card" style="padding:30px;">
                <div class="table-hover table-striped table-responsive">
                <table class="table" id="table">
                <thead align="center"> 
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Product Nmae</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 0; ?>
                <?php foreach($testimonial   as $row): ?>
                <?php $i++ ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><img src="<?= base_url() ?>uploads/<?= $row['photo'] ?>" alt="<?= $row['photo'] ?>"></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><img src="<?= base_url() ?>assets/img/<?= $row['image'] ?>" alt="<?= $row['image'] ?>" style="border-radius:0px;width:60px;height:50px;"></td>
                        <td><?= $row['product'] ?></td>
                        <td><?= $row['comment'] ?></td>
                        <td><?= $row['date_created'] ?></td>
                        <td>
                            <a href="<?= base_url() ?>User_admin/deleteComment/<?= $row['id_comment'] ?>" class="delete-comment" data-delete="<?= $row['name'] ?>">   
                                <button type="button" class="btn btn-inverse-danger btn-icon">
                                <i class="mdi mdi-delete"></i>
                                </button>
                            </a>
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