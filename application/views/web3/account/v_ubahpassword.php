<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<?php
	$this->load->view('web/header'); 
?>

<body>
	<div class="banner-top container-fluid" id="home">
		<?php  
			$this->load->view('web/navbar');
		?>
		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="#"> Profil </a>
							<i>|</i>
						</li>
						<li> Ubah Password</li>
					</ul>
				</div>
			</div>

		</div>
		<!--//banner -->
	</div>
	<!--// header_top -->
	<!-- top Products -->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<h3 class="tittle-w3layouts text-center my-lg-4 my-4"><?php echo $akun->nama; ?></h3>
			<div class="inner_sec">
				<p class="sub text-center mb-lg-5 mb-3"><?php echo $akun->id_user; ?></p>
				<div class="address row">
					<div class="col-lg-12 address-grid">
						<div class="row address-info" id="form">
							<div class="col-md-6 address-center text-left">
								<div class="col-md-12 address-right text-left  mt-1">
									<ul class="list-group form-group">
										<li class="list-group">
											<h5><b>ID User</b></h5>
											<input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $akun->id_user; ?>" disabled>
										</li>
										<hr>
										<li class="list-group">
											<h5><b>Password Anda</b></h5>
											<input type="password" class="form-control" id="currentpassword" name="currentpassword" placeholder="Current Password">
											<input type="hidden" id="base_url" name="base_url" value="<?php echo base_url(); ?>">
											<input type="hidden" id="id" name="id" value="<?php echo $akun->id; ?>">
										</li>
										<hr>
									</ul>
								</div>
							</div>
							<div class="col-md-6 address-center text-left">
								<div class="col-md-12 address-right text-left  mt-1">
									<ul class="list-group">
										<li class="list-group">
											<h5><b>Password Baru</b></h5>
											<input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="New Password">
										</li>
										<hr>
										<li class="list-group">
											<h5><b>Konfirmasi Password Baru</b></h5>
											<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
										</li>
										<hr>
									</ul>
								</div>
							</div>
							<div class="col-md-11 address-center mt-4 text-right">
								<div class="text-center" id="attention"></div>
								<button type="button" class="btn btn-lg btn-success" id="btnedit">Simpan Perubahan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- <div class="contact-map">

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100949.24429313939!2d-122.44206553967531!3d37.75102885910819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1472190196783"
		    class="map" style="border:0" allowfullscreen=""></iframe>
	</div> -->

	<?php
		$this->load->view('web/footer'); 
		$this->load->view('web/js-script'); 
	?>
<script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
<script src="<?php echo base_url(); ?>js/account/ubahpassword.js?v=1.0.1" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
</body>
</html>