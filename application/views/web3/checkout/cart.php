<div class="inner-sec-shop px-lg-4 px-3">
	<h3 class="tittle-w3layouts my-lg-4 mt-3">Checkout </h3>
	<div class="checkout-right">
		<h4>Your shopping cart contains:
			<span><?php echo $jml_data; ?> Products</span>
		</h4>
		<table class="timetable_sub">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Produk</th>
					<th>Quantity</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Remove</th>
				</tr>
			</thead>
			<?php
			if($noPage==1){
				$no = 1;
			} else {
				$no = $offset+1;
			}
			?>
			<tbody>
				<?php foreach ($list_cart as $data) {
					 ?>
				<tr class="rem1">
					<td class="invert"><?php echo $no; ?></td>
					<td class="invert"><?php echo $data->id_produk; ?></td>
					<td class="invert"><input type="number" name="qty" id="qty" value="<?php echo $data->qty; ?>">
					</td>
					<td class="invert"><?php echo $data->id_produk; ?></td>

					<td class="invert"><?php echo $data->qty; ?></td>
					<td class="invert">
						<div class="rem">
							<div class="close1"> </div>
						</div>
					</td>
				</tr>
				<?php $no++; } ?>
			</tbody>
		</table>
	</div>
	<div class="checkout-left row">
		<div class="col-md-4 checkout-left-basket">
			<h4>Continue to basket</h4>
		</div>	
		<div class="checkout-right-basket">
			<a href="payment.html">Make a Payment </a>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>