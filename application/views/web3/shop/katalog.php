
	<div class="wrapper_top_shop">								
		<div class="row">
		<!-- /womens -->
		<?php foreach ($list_produk as $data) { 
			if ($data->stok>50) {
				$stok = '50+';
			}elseif ($data->stok>20) {
				$stok = '20+';
			}else{
				$stok = $data->stok;
			}
		?>
			<div class="col-md-4 product-men women_two shop-gd">
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
										<input type="hidden" name="cart_nama" id="cart_nama" value="<?php echo $data->nama_produk; ?>">
										<input type="hidden" name="cart_harga" id="cart_harga" value="<?php echo $data->harga; ?>">
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
		</div>
	</div>
	<!-- // preference -->
<!-- /mens -->
