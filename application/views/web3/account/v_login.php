<!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('web/account/h_login');
?>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url(); ?>images/rem2.png" alt="Login" >
				</div>

				<form class="login100-form validate-form" method="post" action="<?php echo base_url('useraccount/cek_login'); ?>">
					<span class="login100-form-title">
						Login User
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<span class="red" style="color: red;">
							<?php 
								if($this->session->flashdata('error') <> '') {
									echo $this->session->flashdata('error');
								}
							?>
						</span>
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-136">
						<span>@khaiz.18_</span>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
		$this->load->view('web/account/j_login');
	?>
</body>
</html>