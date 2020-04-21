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
								<td class="invert"><?php echo $data->qty; ?></td>
								<td class="invert text-left">Rp.<?php echo format_rupiah($jml_hrg); ?></td>
							</tr>
							<?php 
								$total += $jml_hrg;
							 	$item += $data->qty; 
							}  ?>
							<tr>
								<th colspan="2">Jumlah Item & Total</th>
								<td class="text-center"><?php echo $item; ?></td>
								<td class="text-left">Rp.<?php echo format_rupiah($total); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="checkout-left row">
					
					<div class="col-md-7 address_form">
						<h4>Add a new Details</h4>
						<form action="#" method="post" class="creditly-card-form agileinfo_form">
							<section class="creditly-wrapper wrapper">
								<div class="information-wrapper">
									<div class="first-row form-group">
										<div class="controls">
											<label class="control-label">Nama Penerima: </label>
											<input class="billing-address-name form-control" type="text" name="name" placeholder="Nama Penerima">
										</div>
										<div class="card_number_grids">
											<div class="card_number_grid_left">
												<div class="controls">
													<label class="control-label">No. Telepon:</label>
													<input class="form-control" type="text" placeholder="No. Telepon Yang Aktif">
												</div>
											</div>
											<div class="clear"></div>
										</div>
										<div class="controls">
											<label class="control-label">Provinsi :</label>
											<select class="form-control option-w3ls">
												<option>Office</option>
												<option>Home</option>
												<option>Commercial</option>
											</select>
										</div>
										<div class="controls">
											<label class="control-label">Kabupaten/Kota :</label>
											<select class="form-control option-w3ls">
												<option>Office</option>
												<option>Home</option>
												<option>Commercial</option>
											</select>
										</div>
										<div class="controls">
											<label class="control-label">Alamat Lengkap : </label>
											<textarea class="form-control" placeholder="Alamat Lengkap"></textarea>
										</div>
										<div class="controls">
											<label class="control-label">Kode Pos : </label>
											<input class="form-control" type="number" placeholder="Kode Pos">
										</div>
										<div class="controls">
											<label class="control-label">Catatan Tambahan : </label>
											<textarea class="form-control" placeholder="Catatan Tambahan"></textarea>
										</div>
									</div>
								</div>
							</section>
						</form>
					</div>
					<div class="col-md-5 checkout-left-basket">
						<h2>Total Bayar</h2>
						<ul>
							<li>Harga Barang
								<span>Rp.<?php echo format_rupiah($total); ?></span>
							</li>
							<li>Ongkos Kirim
								<span>Rp.0000000</span>
							</li>
							<hr>
							<li style="color: #212121; font-size: 25px;">Total :
								<span>Rp.00000000</span>
							</li>
						</ul>
						<hr>
						<h2>Metode Pembayaran</h2>
						<hr>
						<ul>
						<?php foreach ($list_bank as $data ) { ?>
							<li style="color: #212121; font-size: 17px;">
								<input type="radio" name="metode_pembayaran" id="metode_pembayaran" value="<?php echo $data->id_bank ?>">&nbsp;<?php echo $data->nama_bank; ?>
								<span><?php echo $data->no_rekening; ?> a/n <?php echo $data->atas_nama; ?></span>
							</li>
						<?php } ?>
						</ul>
					</div>
					<div class="col-md-6 checkout-left-basket">
						<a href="<?php echo base_url('cart/mycart') ?>"><h4><i class="fa fa-arrow-left"></i>&nbsp;Batal</h4></a>
					</div>	
					<div class="col-md-6 checkout-left-basket">
						<a href="<?php echo base_url('pembayaran/checkout') ?>"><h4>Checkout&nbsp;<i class="fa fa-arrow-right"></i></h4></a>
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