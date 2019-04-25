<div class="col-lg-12" style="margin-top:100px;height:500px;overflow:auto;">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title box-title">Direct Message</h4>
            <div class="card-content">
                <div class="messenger-box">
                    <ul>
                        <li>
                            <div class="row">
                                <div class="col-lg-12" style="margin-top:20px;">
                                    <div class="msg-received msg-container">
                                        <div class="avatar">
                                            <img src="" alt="" id="photo">
                                            <div class="send-time">11.11 am</div>
                                        </div>
                                        <div class="msg-box">
                                            <div class="inner-box">
                                                <div class="name">
                                                    John Doe
                                                </div>
                                                <div class="meg">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis sunt placeat velit ad reiciendis ipsam
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </li>
                        <li id="sent">
                            
                        </li>
                    </ul>
                    <div class="send-mgs">
                        <div class="yourmsg">
                            <input class="form-control" name="mess" id="mess" type="text">
                        </div>
                        <button class="btn msg-send-btn" id="send">
                            <i class="pe-7s-paper-plane"></i>
                        </button>
                    </div>
                </div><!-- /.messenger-box -->
            </div>
        </div> <!-- /.card-body -->
    </div><!-- /.card -->
</div>
<div class="a"></div>
<script>
$(document).ready(function(){
    let to = <?= $this->uri->segment(3) ?>;
    $.ajax({
        url:'<?= base_url() ?>User_super_admin/getChat',
        data:'to='+to,
        dataType:'json',
        type:'POST',
        success:function(data){
            let result = '';
            for (let i = 0; i < data.length; i++) {
                result += `
                <div class="row">
                    <div class="col-lg-12" style="margin-top:20px;">
                        <div class="msg-sent msg-container">
                            <div class="avatar">
                                <img src="<?= base_url() ?>uploads/`+ data[i].photo +`" alt="">
                                <div class="send-time">`+ data[i].date+`</div>
                            </div>
                            <div class="msg-box">
                                <div class="inner-box">
                                    <div class="name" id="namechat">
                                        <b>`+data[i].name+`</b>
                                    </div>
                                    <div class="meg" id="megchat">
                                        <p>`+data[i].mess+`</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            }
            $('#sent').html(result);
        }
    });
    $.ajax({
        url:'<?= base_url() ?>User_super_admin/getUser',
        data:'id='+to,
        type:'POST',
        dataType:'json',
        success:function(data){
            let photo = data[0].photo;
            $('#photo').attr('src','<?=base_url()?>uploads/'+ photo+'')
        }
    });
})
$('#send').on("click", function(){
    let to = <?= $this->uri->segment(3) ?>;
    let mess    = $('input[name="mess"]').val();
    $.ajax({
        url:'<?= base_url()?>User_super_admin/sendMess',
        data:'to='+to+'&mess='+mess,
        dataType:'json',
        type:'POST',
        success:function(){
            $('input[name="mess"]').val("");
            $.ajax({
                url:'<?= base_url() ?>User_super_admin/getChat',
                data:'to='+to,
                dataType:'json',
                type:'POST',
                success:function(data){
                    let result = '';
                    for (let i = 0; i < data.length; i++) {
                        result += `
                        <div class="row">
                    <div class="col-lg-12" style="margin-top:20px;">
                        <div class="msg-sent msg-container">
                            <div class="avatar">
                                <img src="<?= base_url() ?>uploads/`+ data[i].photo +`" alt="">
                                <div class="send-time">`+ data[i].date+`</div>
                            </div>
                            <div class="msg-box">
                                <div class="inner-box">
                                    <div class="name" id="namechat">
                                        <b>`+data[i].name+`</b>
                                    </div>
                                    <div class="meg" id="megchat">
                                        <p>`+data[i].mess+`</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        `;
                    }
                    $('#sent').html(result);
                }
            });
        }
    })
})
</script>