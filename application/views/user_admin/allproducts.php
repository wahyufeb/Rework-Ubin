
<link href='<?= base_Url() ?>assets/dropzone/dropzone.min.css' type='text/css' rel='stylesheet'>
<script src='<?= base_url() ?>assets/dropzone/dropzone.min.js' type='text/javascript'></script>

<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>                 
                </span>
                Products
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
        <!-- Extra large modal -->
        <div class="modal fade bd-example-modal-md-update" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md-update">
            <div class="modal-content">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="font-size:25px;color:#b66dff;"><i class="mdi mdi-package-variant-closed menu-icon"></i>Products</h4>
                    <p class="card-description">
                        Update Products
                    </p>
                    <form action="<?= base_url() ?>User_admin/updateProduct">
                    <div id="img"></div>
                    <input type="hidden" value="" name="update_idproduct">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="update_name" placeholder="Name" name="update_name" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="dropzone" style="border: 3px solid skyblue;border-style:dashed">
                                <div class="dz-message">
                                    <p style="font-size:15px;"> Drop file here to upload your image product</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="price">Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-danger text-white">Rp. </span>
                                </div>
                                <input type="number" class="form-control" aria-label="Amount (to the nearest rupiah)" placeholder="Price" name="update_price" autocomplete="off" required>
                                    <div class="input-group-append">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="number" class="form-control" id="update_weight" placeholder="Weight" name="update_weight" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="update_stock" placeholder="Stock" name="update_stock" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                        <label for="catagory">Discount</label>
                            <div class="input-group">
                                <input type="number" class="form-control" placeholder="Discount" aria-label="Recipient's discount" aria-describedby="basic-addon2" name="update_discount" autocomplete="off" required>
                                <div class="input-group-append">
                                <button class="btn btn-sm btn-gradient-success" type="button">%</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="catagory">Catagory</label>
                            <input type="text" class="form-control" id="update_catagory" placeholder="Catagory" name="update_catagory" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="update_description" name="update_description" rows="4" autocomplete="off" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
</div>
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

        <!-- Modal Update -->

        <!-- End Modal Update -->



<script>
    Dropzone.autoDiscover = false;

    var image_upload= new Dropzone(".dropzone",{
        url: "<?= base_url('User_admin/updateImage')?>",
        maxFilesize: 2,
        method:"POST",
        acceptedFiles:"image/*",
        paramName:"userfile",
        dictInvalidFileType:"Type file ini tidak dizinkan",
        addRemoveLinks:true,
    });

    //Event ketika Memulai mengupload
    image_upload.on("sending",function(a,b,c){
        a.id = $('input[name="update_idproduct"]').val();
        c.append("id_product",a.id); //Menmpersiapkan token untuk masing masing foto
    });

    // //Event ketika foto dihapus
    image_upload.on("removedfile",function(a){
        var id=a.id;
        $.ajax({
            type:"post",
            data:{id:id},
            url:"<?php echo base_url('User_admin/remove_image')?>",
            cache:false,
            dataType: 'json',
            success: function(){
                Swal.fire(
                    'Success!',
                    'Your photo has been removed',
                    'success'
                );     
            },
            error: function(){
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong, Please Try Again!'
                })

            }
        });
    });

</script>
<script>
    // AJAX DETAIL
    const detail=(id)=>{
        $.ajax({
            url:'<?= base_url() ?>User_admin/getProductId',
            data:'id='+id,
            dataType:'json',
            type:'POST',
            success:(data)=>{

                let result = '';
                for (let i = 0; i < data.length; i++) {
                let price = data[i].price;
                let reverse = price.toString().split('').reverse().join(''),
                        cost  = reverse.match(/\d{1,3}/g);
                        cost  = cost.join('.').split('').reverse().join('');
                    result +=`
                    <style>
                        h4, h6{
                            color:#b66dff;
                        }
                    </style>
                    
                    <h4>`+ data[i].name +`</h4>
                    <center>
                        <img src="<?= base_url() ?>assets/img/`+ data[i].image +`" width="200">
                    </center><br>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <h6>Price</h6>
                            <p class="text-muted">Rp.`+ cost +`</p>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h6>Weight</h6>
                            <p class="text-muted">`+ data[i].weight +` grams</p>
                        </div>
                    </div>
                    <h6>Sold</h6>
                    `+ data[i].sold +`
                    <div class="progress">
                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: `+ data[i].sold +`%" aria-valuenow="`+ data[i].sold +`" aria-valuemin="0" aria-valuemax="1000"></div>
                    </div><br>
                    <h6>Stock</h6>
                    `+ data[i].stock +`
                    <div class="progress">
                        <div class="progress-bar bg-gradient-danger " role="progressbar" style="width: `+ data[i].stock +`%" aria-valuenow="`+ data[i].stock +`" aria-valuemin="0" aria-valuemax="1000"></div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-6 col-md-6" id="discount">
                            <h6>Discount</h6>
                            <p style="color:#07cdae;font-size:25px;">`+ data[i].discount +`<i class="mdi mdi-sale"></i></p>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h6>Catagory</h6>
                            <label class="badge badge-gradient-danger text-uppercase">`+ data[i].catagory +`</label>
                        </div>
                    </div>
                    <h6>Description</h6>
                    <p class="text-muted">`+ data[i].description +`<p>
                    `;
                }
                $('#result').html(result);
            }
        });
    }

    $('.update').on("click", function(){
        let id  = $(this).data('id');
        $.ajax({
            url:'<?= base_url() ?>User_admin/getProductId',
            data:'id='+id,
            dataType:'json',
            type:'POST',
            success:(data)=>{
                for (let i = 0; i < data.length; i++) {
                    $('#img').html(`
                    <center>
                        <img src="<?= base_url() ?>assets/img/`+data[i].image+`" width="300">
                    </center>
                    `);
                    $('input[name="update_idproduct"]').val(data[i].id_product);
                    $('input[name="update_name"]').val(data[i].name);
                    $('input[name="update_price"]').val(data[i].price);
                    $('input[name="update_weight"]').val(data[i].weight);
                    $('input[name="update_stock"]').val(data[i].stock);
                    $('input[name="update_discount"]').val(data[i].discount);
                    $('input[name="update_catagory"]').val(data[i].catagory);
                    $('#update_description').val(''+data[i].description+'');
                }
            }
        });
    });


</script>