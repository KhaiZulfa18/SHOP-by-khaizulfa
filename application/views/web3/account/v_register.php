<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v10 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/registrasi/fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/registrasi/css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<form action="">
					<h3>Daftar Akun</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" placeholder="Username" id="username" name="username">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" placeholder="Nama" id="nama" name="nama">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-phone-handset"></span>
						<input type="text" class="form-control" placeholder="No. Telepon" id="telepon" name="telepon">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" placeholder="Email" id="email" name="email">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Password" id="password" name="password">
					</div>
					<div class="form-holder">
						<span class="lnr">Pilih</span>
						<select class="form-control" id="gender">
							<option value="">--Jenis Kelamin--</option>
							<option value="1">Laki-laki</option>
							<option value="2">Perempuan</option>
						</select>
					</div>
					<div class="form-holder">
						<span class="lnr"></span>
						<textarea class="textarea form-control" style="height: 50px;" placeholder="Alamat"></textarea>
					</div>
					<button>
						<span>Register</span>
					</button>
				</form>
			</div>
			
		</div>
		
		<script src="<?php echo base_url(); ?>css/registrasi/js/jquery-3.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>css/registrasi/js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>