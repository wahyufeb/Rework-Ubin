<div class="col-lg-12" style="margin-top:100px;">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title box-title">Direct Message</h4>
            <div class="card-content">
                <div class="messenger-box">
                    <ul>
                        <!-- <li>
                            <div class="msg-received msg-container">
                                <div class="avatar">
                                    <img src="images/avatar/64-1.jpg" alt="">
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
                            /.msg-received
                        </li> -->
                        <!-- <li>
                            <div class="msg-sent msg-container">
                                <div class="avatar">
                                    <img src="images/avatar/64-2.jpg" alt="">
                                    <div class="send-time">11.11 am</div>
                                </div>
                                <div class="msg-box">
                                    <div class="inner-box">
                                        <div class="name">
                                            John Doe
                                        </div>
                                        <div class="meg">
                                            Hay how are you doing?
                                        </div>
                                    </div>
                                </div>
                            </div>/.msg-sent
                        </li> -->
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
    let to = <?= $this->uri->segment(3) ?>;
    $.ajax({
        url:'<?= base_url() ?>User_super_admin/getChat',
        data:'to'+to,
        dataType:'json',
        type:'POST',
        success:function(data){
            console.log(data);
        }
    });
    $('#send').on("click", function(){
        let mess    = $('input[name="mess"]').val();
        $.ajax({
            url:'<?= base_url()?>User_super_admin/sendMess',
            data:'to='+to+'&mess='+mess,
            dataType:'json',
            type:'POST',
            success:function(){
            }
        })
    })
</script>