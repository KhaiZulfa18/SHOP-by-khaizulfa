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
					<!-- /womens -->
					<?php foreach ($dataproduk as $data) { 
						if ($data->stok>50) {
							$stok = '50+';
						}elseif ($data->stok>20) {
							$stok = '20+';
						}else{
							$stok = $data->stok;
						}
					?>
					<div class="col-md-4 ">
						<div class="product-googles-info googles">
							<div class="men-pro-item">
								<div class="men-thumb-item">
									<?php 
							            $txtgambar = (!empty($data->picture)) ? '<img src="'.base_url().'images/produk/'.$data->picture.'" class="img-fluid">' : '-';
							            echo $txtgambar;
						          	?>
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="<?php echo base_url('shop/produk/'.$data->url); ?>" class="link-product-add-cart">Lihat</a>
										</div>
									</div>
									<span class="product-new-top"><?php echo $stok; ?></span>
								</div>
								<div class="item-info-product">
									<div class="info-product-price">
										<div class="grid_meta">
											<div class="product_price">
												<h4>
													<a href="single.html"><?php echo $data->nama_produk; ?></a>
												</h4>
												<div class="grid-price mt-2">
													<span class="money ">Rp.<?php echo format_rupiah($data->harga); ?></span>
												</div>
											</div>
										</div>
										<div class="googles single-item hvr-outline-out">
											<form method="post" action="<?php echo base_url('cart/add_to_cart') ?>">
												<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
												<input type="hidden" name="cart_qty" id="cart_qty" value="1">
												<input type="hidden" name="cart_id_produk" id="cart_id_produk" value="<?php echo $data->id_produk; ?>">
												<?php if (!empty($this->session->userdata('id_user'))) { ?>
													<button type="submit" id="btn_add_to_cart" class="googles-cart pgoogles-cart">
														<i class="fas fa-cart-plus"></i>
													</button>
												<?php }else{ ?>
													<button type="button" class="googles-cart pgoogles-cart" data-toggle="modal" data-target="#warning">
														<i class="fas fa-cart-plus"></i>
													</button>
												<?php } ?>
											</form>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>	
					<!-- /mens -->
				</div>
				<!--//row-->
								
				<div class="bottom-sub-grid-content py-lg-5 py-3">
					<div class="row">
						<div class="col-lg-4 bottom-sub-grid text-center">
							<div class="bt-icon">

								<span class="fas fa-star"></span>
							</div>

							<h4 class="sub-tittle-w3layouts my-lg-4 my-3">Best Quality</h4>
							<p>Semua produk yang kami jual memiliki kualitas terbaik. Kami jamin atau uang kami refund.</p>
							<p>
								<a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
							</p>
						</div>
						<!-- /.col-lg-4 -->
						<div class="col-lg-4 bottom-sub-grid text-center">
							<div class="bt-icon">
								<span class="fas fa-truck"></span>
							</div>

							<h4 class="sub-tittle-w3layouts my-lg-4 my-3">SHIPMENT</h4>
							<p>Tidak perlu khawatir barang tidak sampai,karena kami telah bekerjasama dengan jasa pengiriman terpercaya.</p>
							<p>
								<a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
							</p>
						</div>
						<!-- /.col-lg-4 -->
						<div class="col-lg-4 bottom-sub-grid text-center">
							<div class="bt-icon">
								<span class="far fa-sun"></span>
							</div>

							<h4 class="sub-tittle-w3layouts my-lg-4 my-3">UV Protection</h4>
							<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
							<p>
								<a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
							</p>
						</div>
						<!-- /.col-lg-4 -->
					</div>
				</div>
				<!-- //grids -->
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
</html>