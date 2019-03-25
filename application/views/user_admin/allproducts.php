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
                <table class="table table-hover table-striped" id="table-product">
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
                    <tbody align="center">
                    <?php $i = 0; ?>
                    <?php foreach($products as $row): ?>
                    <?php $i++ ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><img src="<?= base_url() ?>assets/img/<?= $row['image'] ?>" alt="<?= $row['image'] ?>" style="border-radius:0px;width:60px;height:55px;"></td>
                            <td align="left"><?= $row['name']; ?></td>
                            <td>Rp.<?= number_format($row['price'], 0,',','.') ?></td>
                            <td><?=  $row['weight']?> grams</td>
                            <td>
                                <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar" style="width: <?= $row['sold'] ?>%" aria-valuenow="<?= $row['sold'] ?>" aria-valuemin="0" aria-valuemax="1000"></div>
                            </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-inverse-dark btn-icon">
                                    <i class="mdi mdi-pencil"></i>
                                </button>

                                <a href="<?= base_url() ?>User_admin/deleteProduct/<?= $row['id_product'] ?>" class="delete-product">                                
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
                        <img src="<?= base_url() ?>assets/img/`+ data[i].image +`" width="400">
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

    $('.update').on("click",()=>{
        $.ajax({

        });
    });


</script>