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
							<a href="#"> Home </a>
							<i>|</i>
						</li>
						<li>Akun Saya</li>
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
						<div class="row address-info">
							<div class="col-md-6 address-center text-center">
								<!-- <i class="far fa-map"></i> -->
								<?php 
								$txtgambar = (!empty($akun->foto)) ? '<img src="'.base_url().'images/profil_pic/'.$akun->foto.'" class="img-thumbnail rounded mx-auto d-block" >' : '-';
								echo $txtgambar;
								?>
							</div>
							<div class="col-md-6 address-center text-left">
								<div class="col-md-10 address-right text-left  mt-1">
									<ul class="list-group">
										<li class="list-group-item">
											<h5>Nama : <?php echo $akun->nama; ?></h5>
										</li>
										<hr>
										<li class="list-group-item">
											<h5>Username : <?php echo $akun->username; ?></h5>
										</li>
										<hr>
										<li class="list-group-item">
											<h5>Email : <?php echo $akun->email; ?></h5>
										</li>
										<hr>
										<li class="list-group-item">
											<h5>Telepon : <?php echo $akun->telepon; ?></h5>
										</li>
										<hr>
										<li class="list-group-item">
											<h5>
												Gender : <?php if ($akun->gender=='1'){ 
													echo "Laki-laki";
												}elseif ($akun->gender=='2') { 
													echo "Perempuan";
												}else{ 
													echo "-"; 
												} ?>
											</h5>
										</li>
										<hr>
										<li class="list-group-item">
											<h5>Alamat : <?php echo $akun->alamat; ?></h5>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-md-11 address-center mt-4 text-right">
								<a href="<?php echo base_url('useraccount/ubahprofil') ?>"><button class="btn btn-lg btn-success mt-3">Ubah Profil</button></a>
								<a href="<?php echo base_url('useraccount/ubahpassword') ?>"><button class="btn btn-lg btn-info mt-3">Ubah Password</button></a>
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
</body>
</html>