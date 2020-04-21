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
							<a href="#"> Home </a>
							<i>|</i>
						</li>
						<li>Keranjang</li>
					</ul>
				</div>
			</div>

		</div>
		<!--//banner -->
	</div>
	
	<!--checkout-->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 mt-3">Checkout </h3>
				<div class="checkout-right">
				
				<h4>Total Item :
					<span><?php echo $jml_data; ?> Item's</span>
				</h4>
					<table class="timetable_sub table-hover">
						<thead>
							<tr>
								<th width="50px">No</th>
								<th width="200px">Nama Produk</th>
								<th width="50px">Quantity</th>
								<th width="200px">Harga</th>
								<th width="50px">Hapus</th>
							</tr>
						</thead>
						<tbody>

						<?php 
							$no = 1;
							$total = 0;
							$item = 0;
							foreach ($list_cart as $data) { 
							$jml_hrg = $data->harga*$data->qty; 
						?>
							<tr class="rem1">
								<td class="invert"><?php echo $no++; ?></td>
								<td class="invert"><?php echo $data->produk; ?></td>
								<td class="invert">
									<a href="<?php echo base_url('cart/update_cart_minus/'.$data->id) ?>"><button class="btn btn-sm btn-info"><i class="fa fa-minus"></i></button></a>
									&nbsp;<?php echo $data->qty; ?>&nbsp;
									<a href="<?php echo base_url('cart/update_cart_plus/'.$data->id) ?>"><button class="btn btn-sm btn-info"><i class="fa fa-plus"></i></button></a>
								</td>
								<td class="invert text-left">Rp.<?php echo format_rupiah($jml_hrg); ?></td>
								<td class="invert">
									<div class="rem">
										<a href="<?php echo base_url('cart/delete_cart/'.$data->id) ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
									</div>
								</td>
							</tr>
							<?php 
								$total += $jml_hrg;
							 	$item += $data->qty; 
							}  ?>
							<tr>
								<th colspan="2">Jumlah Item & Total</th>
								<td class="text-center"><?php echo $item; ?></td>
								<td colspan="2" class="text-left">Rp.<?php echo format_rupiah($total); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="checkout-left row">
					<div class="col-md-4 checkout-left-basket">
						<a href="javascript:history.back();"><h4><i class="fa fa-arrow-left"></i>&nbsp;Lanjut Belanja</h4></a>
					</div>	
					<div class="col-md-4 checkout-left-basket">
						<a href="<?php echo base_url('pembayaran/checkout') ?>"><h4>Pembayaran &nbsp;<i class="fa fa-arrow-right"></i></h4></a>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</section>
	<!--//checkout-->
	<!-- about -->
	<?php
		$this->load->view('web/footer'); 
		$this->load->view('web/js-script'); 
	?>
</body>
<script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>js/shop/datacart.js?v=1.0.2" type="text/javascript"></script> -->
</html>