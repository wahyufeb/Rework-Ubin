<div class="col-lg-12" style="margin-top:100px;height:500px;overflow:auto;">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title box-title">Direct Message</h4>
            <div class="card-content">
                <div class="messenger-box">
                    <ul id="chat-result">
                        <li></li>
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
<script>

// Click
$(document).ready(function(){
    let to = <?= $this->uri->segment(3) ?>;
    const get=()=>{
        $.ajax({
            url:'<?= base_url() ?>User_super_admin/getChat',
            data:'to='+to,
            dataType:'json',
            type:'POST',
            success:function(chat1){
                $.ajax({
                    url:'<?= base_url() ?>User_super_admin/getChat2',
                    data:'to='+to,
                    dataType:'json',
                    type:'POST',
                    success:function(chat2){
                        let data = chat1.concat(chat2);
                        let result = '';
                            for (let i = 0; i < data.length; i++) {
                                let date = data[i].date;
                                let from = <?= $this->session->userdata('id_user') ?>;
                                let to = <?= $this->uri->segment(3) ?>;
                                    if(data[i].send_from == from){
                                        result += `<li>
                                        <div class="row">
                                            <div class="col-lg-12" style="margin-top:20px;">
                                                <div class="msg-sent msg-container">
                                                    <div class="avatar">
                                                        <img src="<?= base_url() ?>uploads/`+ data[i].photo +`" alt="">
                                                        <div class="send-time">`+date.substring(0, 8)+`</div>
                                                    </div>
                                                    <div class="msg-box">
                                                        <div class="inner-box">
                                                            <div class="name" id="namechat">
                                                                <b>`+data[i].name+`</b>
                                                            </div>
                                                            <div class="meg" id="megchat">
                                                                <p>`+data[i].mess+`</p>
                                                                <span style="position:absolute;right:8px;bottom:5px;font-size:12px;font-weight:300;">`+ date.substring(8, 16) +`</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </li>`;
                                    }else{
                                        result += `<li>
                                        <div class="row">
                                            <div class="col-lg-12" style="margin-top:20px;">
                                                <div class="msg-receive msg-container">
                                                    <div class="avatar">
                                                        <img src="<?= base_url() ?>uploads/`+ data[i].photo +`" alt="">
                                                        <div class="send-time">`+date.substring(0, 8)+`</div>
                                                    </div>
                                                    <div class="msg-box">
                                                        <div class="inner-box">
                                                            <div class="name" id="namechat">
                                                                <b>`+data[i].name+`</b>
                                                            </div>
                                                            <div class="meg" id="megchat">
                                                                <p>`+data[i].mess+`</p>
                                                                <span style="position:absolute;right:8px;bottom:5px;font-size:12px;font-weight:300;">`+ date.substring(8, 16) +`</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </li>`;
                                    }
                            }
                            $('#chat-result').html(result);
                    }
                })
            }
        })
    }
get();
});
    $('#send').on("click", function(){
            let to     = <?= $this->uri->segment(3) ?>;
            let mess   = $('input[name="mess"]').val();
            $.ajax({
                url:'<?= base_url()?>User_super_admin/sendMess',
                data:'to='+to+'&mess='+mess,
                dataType:'json',
                type:'POST',
                success:function(){
                    $('input[name="mess"]').val("");
                    let  result = `<li>
                                    <div class="row">
                                        <div class="col-lg-12" style="margin-top:20px;">
                                            <div class="msg-sent msg-container">
                                                <div class="msg-box">
                                                        <div class="inner-box">
                                                            <div class="name" id="namechat">
                                                                <b></b>
                                                            </div>
                                                            <div class="meg" id="megchat">
                                                                <p>`+mess+`</p>
                                                                <span style="position:absolute;right:8px;bottom:5px;font-size:12px;font-weight:300;">date</span>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </li>`;
                    $('#chat-result li:last').after(result);
                }
            });
    });

</script>