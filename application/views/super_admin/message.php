<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Mail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li>Message</li>
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
                                <div class="stat-text"><span class="count">314</span></div>
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
                                <div class="stat-text"><span class="count">123</span></div>
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
                <button class="card-body btn btn-primary" style="font-size:18px;padding:15px;" data-toggle="modal" data-target="#modalMess" id="newmess">New <i class="fa fa-plus"></i></button>
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
                            ada
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
<div class="modal fade" id="modalMess" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" style="width:600px;margin:auto;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Direct Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding:0px;padding-bottom:20px;">
                <div class="form-group" style="margin:0 30px;margin-top:30px;">                                
                    <input type="text" class="form-control" id="search_admin" name="search_admin" placeholder="Search admin..." autocomplete="off">
                </div>
                <div id="result-admin" style="margin-top:30px;;"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#newmess').on("click", function(){
        $.ajax({
            url:'<?= base_url() ?>User_super_admin/getAllAdmin',
            type:'POST',
            dataType:'json',
            success:function(data){
                let result = '';
                for (let i = 0; i < data.length; i++) {
                    result += `
                    <div class="row row-admin" style="border-bottom:1px solid rgba(0,0,0,.15);padding:10px;position:relative;">
                            <div class="col-lg-2"><img src="<?= base_url() ?>uploads/`+ data[i].photo +`" width="50" style="border-radius:50%;margin-bottom:10px;"/></div>
                            <div class="col-lg-8">
                                <b>`+ data[i].name +`</b><br/>
                                <span style="font-size:15px;opacity:.6;font-weight:300;">`+ data[i].email +`</span>
                                    <div class="icon-mail" style="position:absolute;right:10%;top:25%;font-size:20px;">
                                        <a href="<?= base_url() ?>User_super_admin/messageTo/`+ data[i].id_user +`">
                                            <i class="ti-email"></i>
                                        </a>
                                    </div>
                            </div>
                    </div>
                    `;
                }
                $('#result-admin').html(result);
                $('.icon-mail').hide();
                $('.row-admin').on("mouseenter",function(){
                    $(this).css('backgroundColor', 'rgba(0,0,0,.1)');
                    $('.icon-mail', this).show();
                })
                $('.row-admin').on("mouseleave",function(){
                    $(this).css('backgroundColor', 'transparent');
                    $('.icon-mail', this).hide();
                })
            }
        });
    });
    $('input[name="search_admin"]').on("keyup", function(){
        let inputVal = $('input[name="search_admin"]').val();
        $.ajax({
            url:'<?= base_url() ?>User_super_admin/searchAdmin',
            data:'key='+inputVal,
            dataType:'json',
            type:'POST',
            success:function(data){
                let result = '';
                for (let i = 0; i < data.length; i++) {
                    result += `
                    <div class="row row-admin" style="border-bottom:1px solid rgba(0,0,0,.15);padding:10px;position:relative;">
                            <div class="col-lg-2"><img src="<?= base_url() ?>uploads/`+ data[i].photo +`" width="50" style="border-radius:50%;margin-bottom:10px;"/></div>
                            <div class="col-lg-8">
                                <b>`+ data[i].name +`</b><br/>
                                <span style="font-size:15px;opacity:.6;font-weight:300;">`+ data[i].email +`</span>
                                    <div class="icon-mail" style="position:absolute;right:10%;top:25%;font-size:20px;">
                                        <a href="<?= base_url() ?>User_super_admin/messageTo/`+ data[i].id_user +`">
                                            <i class="ti-email"></i>
                                        </a>
                                    </div>
                            </div>
                    </div>
                    `;
                }
                $('#result-admin').html(result);
                $('.icon-mail').hide();
                $('.row-admin').on("mouseenter",function(){
                    $(this).css('backgroundColor', 'rgba(0,0,0,.1)');
                    $('.icon-mail', this).show();
                })
                $('.row-admin').on("mouseleave",function(){
                    $(this).css('backgroundColor', 'transparent');
                    $('.icon-mail', this).hide();
                })
            }
        });
    });

</script>


