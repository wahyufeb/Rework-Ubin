<div class="col-lg-9 col-md-9 col-sm-9 col-9 right-side">
<div class="mess" data-flashdata="<?= $this->session->flashdata('mess');?>"></div>
<?php if ($this->session->flashdata('mess')):?>
<?php $this->session->flashdata('mess');?>
<?php endif; ?>
            <h5>Profile </h5>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus rerum debitis, quidem quam vero a voluptatum commodi maxime eligendi mollitia magnam eius excepturi, labore doloremque fugit itaque quibusdam sint suscipit.</p>
                <div class="row">
                    <div class="col-lg-11 col-md-12 col-sm-12 col-12 offset-lg-1 offset-md-1 ">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-4">
                            <div class="photo">
                                <img src="<?= base_url() ?>uploads/<?= $user[0]->photo;?>" width="230">
                                    <a href="<?= base_url(); ?>User/delete_photo" id="delete-trash">
                                        <div id="delete-photo" data-toggle="tooltip" data-placement="left" tittle="Delete your photo">
                                            <i class="fas fa-trash trash" id="trash"></i>
                                        </div>  
                                    </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <div class='content'>
                                <div class="dropzone">
                                    <div class="dz-message">
                                        <p style="font-size:12px;"> Drop file or click here to upload your photo profile</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <form action="<?= base_url() ?>User/profile_update" method="post">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group ">
                                        <label for="email">Email address</label><br>  
                                        <small id="passwordHelpInline" class="text-muted">
                                            Your email adress : <?= $user[0]->email; ?>
                                        </small>
                                        <input type="email" class="form-control " name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email..." autocomplete="off" value="<?= $user[0]->email; ?>" disabled required>
                                        <span style="color:red;font-size:13px;"><?= form_error('email'); ?></span>
                                    </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="name">Name</label><br>
                                            <small id="passwordHelpInline" class="text-muted">
                                                Your name : <?= $user[0]->name; ?>
                                            </small>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name..." autocomplete="off" value="<?= $user[0]->name; ?>" required>
                                            <span style="color:red;font-size:13px;"><?= form_error('name'); ?></span>
                                        </div>
                                    </div>
                                </div><br>
                                <h6>Adress</h6>
                                <hr style="width:30%;border:2px solid orange;float:left;margin-top:-5px;">
                                <div style="clear:left;"></div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="province">Province</label><br>
                                            <small id="passwordHelpInline" class="text-muted">
                                                Your province : <?= $user[0]->province; ?>
                                            </small>
                                            <input type="text" class="form-control" id="province" name="province" placeholder="Enter province..." autocomplete="off" value="<?= $user[0]->province; ?>" required>
                                            <span style="color:red;font-size:13px;"><?= form_error('province'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="city">City</label><br>
                                            <small id="passwordHelpInline" class="text-muted">
                                                Your city : <?= $user[0]->city; ?>
                                            </small>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter city..." autocomplete="off" value="<?= $user[0]->city; ?>" required>
                                            <span style="color:red;font-size:13px;"><?= form_error('city'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="street">Street</label><br>
                                            <small id="passwordHelpInline" class="text-muted">
                                                Your street : <?= $user[0]->street; ?>
                                            </small>
                                            <input type="text" class="form-control" id="street" name="street" placeholder="Enter street..." autocomplete="off" value="<?= $user[0]->street; ?>" required>
                                            <span style="color:red;font-size:13px;"><?= form_error('street'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <label for="telephone">Telephone</label>
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                        <div class="form-group">
                                            <small id="passwordHelpInline" class="text-muted">
                                                Your telephone : <?= $user[0]->telephone; ?>
                                            </small>
                                            <input type="telephone" class="form-control" id="telephone" name="telephone" placeholder="Enter telephone..." autocomplete="off" value="<?= $user[0]->telephone; ?>" required>
                                            <span style="color:red;font-size:13px;"><?= form_error('telephone'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12"><br>
                                        <button type="submit" class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                    </div>
        </div>
        </div>
    </div>
</div>
</body>
<script>

Dropzone.autoDiscover = false;

var foto_upload= new Dropzone(".dropzone",{
    url: "<?= base_url('User/proses_upload')?>",
    maxFilesize: 2,
    method:"POST",
    acceptedFiles:"image/*",
    paramName:"userfile",
    dictInvalidFileType:"Type file ini tidak dizinkan",
    addRemoveLinks:true,
});

//Event ketika Memulai mengupload
foto_upload.on("sending",function(a,b,c){
	a.token=Math.random();
	c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
});

// //Event ketika foto dihapus
foto_upload.on("removedfile",function(a){
	var token=a.token;
	$.ajax({
		type:"post",
		data:{token:token},
		url:"<?php echo base_url('User/remove_photo')?>",
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


// getUser();
// function getUser(){
//     $.ajax({
//         type:'POST',
//         dataType:'json',
//         url:'<?php echo base_url().'User/getuser'?>',
//         success:function(data){
//             var x = data[0];
//             console.log(x.photo);
//         }
//     });
// }

</script>
</html>