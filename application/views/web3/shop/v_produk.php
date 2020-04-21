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
			//$this->load->view('web/slider'); 
		?>
		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="#"> Produk </a>
							<i>|</i>
						</li>
						<li><?php echo $nama_produk; ?></li>
					</ul>
				</div>
			</div>

		</div>
		<!--//banner -->
	</div>
	
	<!--//banner-sec-->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<div class="inner-sec-shop pt-lg-4 pt-3">
				<h3 class="tittle-w3layouts my-lg-4 my-4"><?php echo $nama_produk; ?> </h3>
				<div class="row">
					<div class="col-lg-4 single-right-left ">
						<div class="grid images_3_of_2">
							<div class="flexslider1">		
								<ul class="slides">
									<li data-thumb="<?php echo base_url().'images/produk/'.$produk->picture ?>">
										<div class="thumb-image">
										<?php 
								            $txtgambar = (!empty($produk->picture)) ? '<img src="'.base_url().'images/produk/'.$produk->picture.'" class="img-fluid">' : '-';
								    	    echo $txtgambar;
								        ?> 
										</div>
									</li>
									<li data-thumb="<?php echo base_url().'images/produk/'.$produk->picture_2 ?>">
										<div class="thumb-image"> 
										<?php 
								            $txtgambar2 = (!empty($produk->picture_2)) ? '<img src="'.base_url().'images/produk/'.$produk->picture_2.'" class="img-fluid">' : '-';
								    	    echo $txtgambar2;
								        ?> 
										</div>
									</li>
									<li data-thumb="<?php echo base_url().'images/produk/'.$produk->picture_3 ?>">
										<div class="thumb-image"> 
										<?php 
								            $txtgambar2 = (!empty($produk->picture_3)) ? '<img src="'.base_url().'images/produk/'.$produk->picture_3.'" class="img-fluid">' : '-';
								    	    echo $txtgambar2;
								        ?> 
										</div>
									</li>
								</ul>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-8 single-right-left simpleCart_shelfItem">
						<h3><?php echo $produk->nama_produk; ?></h3>
						<p>
							<span class="item_price">Rp.<?php echo format_rupiah($produk->harga); ?></span>
						</p>
						<div class="description">
							<h4>Deskripsi :</h4>
							<p><h5><?php echo $produk->catatan; ?></h5></p>
						</div>
						<div class="color-quality">
							<div class="color-quality-right">
								<h4>Qty :</h4>
								<p><span><?php echo $produk->stok; ?></span></p>
							</div>
						</div>
						
						<div class="occasion-cart">
							<div class="googles single-item singlepage">
								<form action="<?php echo base_url('cart/add_to_cart') ?>" method="post">
									<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
									<input type="hidden" name="cart_qty" id="cart_qty" value="1">
									<input type="hidden" name="cart_id_produk" id="cart_id_produk" value="<?php echo $id_produk; ?>">
									<?php if (!empty($this->session->userdata('id_user'))) { ?>
										<button type="submit" class="googles-cart pgoogles-cart">
											Tambah ke Keranjang
										</button>
									<?php }else{ ?>
										<button type="button" class="googles-cart pgoogles-cart" data-toggle="modal" data-target="#warning">
											Tambah ke Keranjang
										</button>
									<?php } ?>
									
								</form>
							</div>
						</div>
						<ul class="footer-social text-left mt-lg-4 mt-3">
							<li><h4>Pesan Melalui : </h4></li>
							<?php
								$telepon = $profiltoko->telepon;
								$phone = phone_indo($telepon);
								$text = "Halo, Saya Tertarik Dengan ".$produk->nama_produk."!%0ABagaimana Cara Pesannya ya?? >.<";
								$txt = str_replace(" ", "%20", $text); 
							?>
							<li class="mx-2">
								<a href="https://api.whatsapp.com/send?phone=<?php echo $phone; ?>&text=<?php echo $txt; ?>" target="_blank">
									<h4><span class="fab fa-whatsapp"></span>&nbsp;+<?php echo $phone; ?></h4>
								</a>
							</li>						
						</ul>
					</div>
					<div class="clearfix"> </div>			
				</div>
			</div>
		</div>
	</section>
	<!-- about -->
	<?php
		$this->load->view('web/footer'); 
		$this->load->view('web/js-script'); 
	?>
</body>
<script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
<script src="<?php echo base_url(); ?>js/shop/datakategori.js?v=1.0.1" type="text/javascript"></script>
</html>