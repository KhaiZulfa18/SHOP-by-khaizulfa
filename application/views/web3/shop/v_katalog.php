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
			$this->load->view('web/slider'); 
		?>
	</div>
	<!--//banner-sec-->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container-fluid">
			<div class="inner-sec-shop px-lg-4 px-3">

				<h3 class="tittle-w3layouts my-lg-4 my-4">New Arrivals for you </h3>
				<div class="row">
					<!-- product left -->
						<div class="side-bar col-lg-3">
							<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
							<div class="search-hotel">
								<h3 class="agileits-sear-head">Cari</h3>
									<input class="form-control" type="text" name="cari" id="cari" placeholder="Cari Nama Produk" >
									<div class="clearfix"> </div>
							</div>
							<div class="left-side">
								<h3 class="agileits-sear-head">Kategori</h3>
								<ul>
									<li>
										<select id="kategori" name="kategori" class="form-control col-12">
					                      <option value="">- Kategori -</option>
					                      <?php foreach ($datakategori as $data) { ?>
					                        <option value="<?php echo $data->id_kategori; ?>"><?php echo $data->nama_ktg; ?></option>
					                      <?php } ?>
					                    </select>
									</li>
								</ul>
							</div>
							<!--preference -->
							<div class="left-side">
								<h3 class="agileits-sear-head">Urutkan Berdasarkan</h3>
								<ul>
									<li>
										<select id="sortby" name="sortby" class="form-control col-lg-12">
											<option value="">- Urutkan Berdasarkan -</option>
											<option value="nama_asc">Nama A-Z</option>
											<option value="nama_desc">Nama Z-A</option>
											<option value="harga_asc">Harga Termurah</option>
											<option value="harga_desc">Harga Termahal</option>
											<option value="waktu_asc">Terbaru</option>
											<option value="waktu_asc">Terlama</option>
										</select>
									</li>
								</ul>
							</div>
						</div>
						<div class="left-ads-display col-lg-9">
							<div id="tabel-data"></div>
							<div id="paging"></div>
						</div>
				<!--//row-->
								
				<!-- /clients-sec -->
				<div class="testimonials p-lg-5 p-3 mt-4">
					<div class="row last-section">
						<div class="col-lg-3 footer-top-w3layouts-grid-sec">
							<div class="mail-grid-icon text-center">
								<i class="fas fa-gift"></i>
							</div>
							<div class="mail-grid-text-info">
								<h3>Genuine Product</h3>
								<p>Lorem ipsum dolor sit amet, consectetur</p>
							</div>
						</div>
						<div class="col-lg-3 footer-top-w3layouts-grid-sec">
							<div class="mail-grid-icon text-center">
								<i class="fas fa-shield-alt"></i>
							</div>
							<div class="mail-grid-text-info">
								<h3>Secure Products</h3>
								<p>Lorem ipsum dolor sit amet, consectetur</p>
							</div>
						</div>
						<div class="col-lg-3 footer-top-w3layouts-grid-sec">
							<div class="mail-grid-icon text-center">
								<i class="fas fa-dollar-sign"></i>
							</div>
							<div class="mail-grid-text-info">
								<h3>Cash on Delivery</h3>
								<p>Lorem ipsum dolor sit amet, consectetur</p>
							</div>
						</div>
						<div class="col-lg-3 footer-top-w3layouts-grid-sec">
							<div class="mail-grid-icon text-center">
								<i class="fas fa-truck"></i>
							</div>
							<div class="mail-grid-text-info">
								<h3>Easy Delivery</h3>
								<p>Lorem ipsum dolor sit amet, consectetur</p>
							</div>
						</div>
					</div>
				</div>
				<!-- //clients-sec -->
			</div>
		</div>
	</section>
	<!-- about -->
	<?php
		$this->load->view('web/footer'); 
		$this->load->view('web/js-script'); 
	?>
</body>
<!-- <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
<script src="<?php echo base_url(); ?>js/shop/datakatalog.js?v=1.0.1" type="text/javascript"></script> -->
</html>