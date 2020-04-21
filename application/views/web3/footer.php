	<!--footer -->
	<footer class="py-lg-5 py-3">
		<div class="container-fluid px-lg-5 px-3">
			<div class="row footer-top-w3layouts">
				<div class="col-lg-4 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Temukan Kami</h3>
					</div>
					<div class="contact-info">
						<h4>Alamat :</h4>
						<p><?php echo $profiltoko->alamat; ?></p>
						<div class="phone">
							<h4>Kontak :</h4>
							<?php
								$telepon = $profiltoko->telepon;
								$phone = phone_indo($telepon);
								$text = "Halo ".$profiltoko->nama.", Saya Tertarik Dengan Produk Anda!";
								$txt = str_replace(" ", "%20", $text); 
							?>
							<p>Phone : 
								<a href="https://api.whatsapp.com/send?phone=<?php echo $phone; ?>&text=<?php echo $txt; ?>" target="_blank">+<?php echo $phone; ?></a>
							</p>
							<p>Email :
								<a href="mailto:info@example.com"><?php echo $profiltoko->email; ?></a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Link</h3>
					</div>
					<ul class="links">
						<li>
							<a href="<?php echo base_url('shop/home');?>">Home</a>
						</li>
						<li>
							<a href="<?php echo base_url('shop/home');?>">Contact</a>
						</li>
						<li>
							<a href="<?php echo base_url('shop/home');?>">Katalog</a>
						</li>
						<?php foreach ($datakategori as $data ) { 
							$kategori = strtolower($data->nama_ktg);
							$nama_ktg = ucwords($kategori)
						?>
							<li>
								<a href="<?php echo base_url('shop/kategori/'.$data->url_ktg); ?>">
									<?php echo $nama_ktg; ?>
								</a>
							</li>
						<?php } ?>
						<li>
							<a href="contact.html">Konfirmasi Pembayaran</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-4 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Our Social Media</h3>
					</div>
					<div class="footer-text">
						<ul class="footer-social text-left mt-lg-4 mt-3">
							<li class="mx-2">
								<a href="https:<?php echo $profiltoko->url_facebook; ?>" target="_blank">
									<span class="fab fa-facebook-f"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="https:<?php echo $profiltoko->url_facebook; ?>" target="_blank">
									<p><?php echo $profiltoko->facebook; ?></p>
								</a>
							</li>
						</ul>
						<ul class="footer-social text-left mt-lg-4 mt-3">
							<li class="mx-2">
								<a href="https:<?php echo $profiltoko->url_twitter; ?> " target="_blank">
									<span class="fab fa-twitter"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="https:<?php echo $profiltoko->url_twitter; ?>" target="_blank">
									<p><?php echo $profiltoko->twitter; ?></p>
								</a>
							</li>
						</ul>
						<ul class="footer-social text-left mt-lg-4 mt-3">
							<li class="mx-2">
								<a href="https:<?php echo $profiltoko->url_instagram; ?>" target="_blank">
									<span class="fab fa-instagram"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="https:<?php echo $profiltoko->url_instagram; ?>" target="_blank">
									<p><?php echo $profiltoko->instagram; ?></p>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copyright-w3layouts mt-4">
				<?php $thnskrg = date('Y'); ?>
				<p class="copy-right text-center ">&copy; <?php echo $thnskrg ?> Khai Zulfa | Goggles. All Rights Reserved | Design by
					<a href="http://w3layouts.com/"> W3layouts </a>
				</p>
			</div>
		</div>
	</footer>
	<!-- //footer -->