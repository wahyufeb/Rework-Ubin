<style>
	.header{
		color:#009ae1;
	}
	
	#black{
		color:#333;
	}

	#btn-contact{
		background-color:#009ae1;
		color:white;
	}

	textarea{
		width: 600px;
		height:100px;
	}

	@media only screen and (max-width: 1000px) {
		textarea{
			width: 400px;
		}
	}
	@media only screen and (max-width: 400px) {
		textarea{
			width: 320px;
		}
	}
</style>
	<div class="row">
			<div class="col-lg-6 col-md-8 col-sm-12 col-12 offset-lg-3 offset-md-2 login">
			<h4 class="text-center header">Contact <small id="black"> Admin</small></h4><hr><br>
				<form action="<?= base_url()?>Ubin/sendToAdmin" method="post" id="form_contact">
						<div class="form-group">
								<label for="email">Email address</label>
								<input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off" required>
						</div>
						<label for="problem">Problem</label>
							<select class="form-control" id="problem" name="problem" required>
								<option value="" selected disabled>- Select one -</option>  
								<option value="account suspended">Account suspended</option>
								<option value="not receive activated email">Not receive activated email</option>
								<option value="verfication">Verification problem</option>
							</select>
							<br>
						<label for="problemdetail">Problem detail</label>
						<div class="form-group">
							<textarea name="problem_detail" id="problem_detail"></textarea>
						</div>
						<br><hr>
						<button type="submit" class="btn text-center" id="btn-contact">Send Problem</button>
				</form>
			</div>
	</div>