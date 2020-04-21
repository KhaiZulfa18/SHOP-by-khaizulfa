		<header>
			<div class="row">
				<div class="col-md-3 top-info text-left mt-lg-4">
					<h6>Contact</h6>
					<ul>
						<li><i class="fas fa-envelope"></i></li>
						<li class=" mt-2"><?php echo $profiltoko->email; ?></li>
						
					</ul>
					<ul>
						<li><i class="fas fa-phone"></i></li>
						<li class=" mt-2"><?php echo $profiltoko->telepon; ?></li>
					</ul>
				</div>
				<div class="col-md-6 logo-w3layouts text-center">
					<h1 class="logo-w3layouts">
						<a class="navbar-brand" href="index.html"><?php echo $profiltoko->nama; ?> </a>
					</h1>
				</div>

				<div class="col-md-3 top-info-cart text-right mt-lg-4">
					<ul class="cart-inner-info">
						<li class="nav-item dropdown">
							<?php if (!empty($this->session->userdata('id'))) { ?>
								<?php if (!empty($this->session->userdata('foto'))) { ?>
									<img src="<?php echo base_url();?>images/profil_pic/<?php echo $this->session->userdata('foto');?>" class="rounded-circle dropdown-toggle " id="dropdownlgn" data-toggle="dropdown" aria-hashpopup="true" aria-expanded="false" width="50" height="50">
								<?php }else{ ?>
								<span class="fa fa-user dropdown-toggle" id="dropdownlgn" data-toggle="dropdown" aria-hashpopup="true" aria-expanded="false"></span>
								<?php } ?>
								<ul class="dropdown-menu " aria-labelledby="dropdownlgn">
									<a class="dropdown-item media-mini mt-2" href="<?php echo base_url('useraccount/myaccount'); ?>">
										<i class="fa fa-user"></i>Akun Saya 
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item media-mini mt-2" href="<?php echo base_url('useraccount/logout'); ?>">
										<i class="fa fa-sign-out-alt"></i>Logout 
									</a>
							</ul>
							<?php }else{ ?>
								<span class="fa fa-user dropdown-toggle" id="dropdownlgn" data-toggle="dropdown" aria-hashpopup="true" aria-expanded="false"></span>
								<ul class="dropdown-menu " aria-labelledby="dropdownlgn">
									<a class="dropdown-item media-mini mt-2" href="<?php echo base_url('useraccount/login'); ?>">
										<i class="fa fa-sign-in-alt"></i>Login 
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item media-mini mt-2" href="<?php echo base_url('useraccount/register'); ?>">
										<i class="fa fa-plus-square"></i>Register
									</a>
							</ul>
							<?php } ?>
						</li>
						<li class="galssescart galssescart2 cart cart box_1">
							<?php if (!empty($this->session->userdata('id_user'))) { ?>
								<a href="<?php echo base_url('cart/mycart') ?>">
									<button class="top_googles_cart" value="">
										<i class="fas fa-cart-arrow-down"></i>
										<?php if (!empty($item_cart)) {
											echo $item_cart;
										}else{ echo "0"; } ?> items
									</button>
								</a>
							<?php }else{ ?>
								<button class="top_googles_cart" data-toggle="modal" data-target="#warning">
									<i class="fas fa-cart-arrow-down"></i>
									0 Items
								</button>
							<?php } ?>
							
						</li>
					</ul>
					
				</div>
			</div>
			<div class="search">
				<div class="mobile-nav-button">
					<button id="trigger-overlay" type="button">
						<i class="fas fa-search"></i>
					</button>
				</div>
				<!-- open/close -->
				<div class="overlay overlay-door">
					<button type="button" class="overlay-close">
						<i class="fa fa-times" aria-hidden="true"></i>
					</button>
					<form action="#" method="post" class="d-flex">
						<input class="form-control" type="search" placeholder="Search here..." required="">
						<button type="submit" class="btn btn-primary submit">
							<i class="fas fa-search"></i>
						</button>
					</form>

				</div>
				<!-- open/close -->
			</div>
			<label class="top-log mx-auto"></label>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-mega mx-auto">
						<li class="nav-item <?php if($menu=='home'){ echo 'active'; } ?>">
							<a class="nav-link ml-lg-0" href="<?php echo base_url('shop/home'); ?>">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item <?php if($menu=='katalog'){ echo 'active'; } ?>">
							<a class="nav-link ml-lg-0" href="<?php echo base_url('shop/katalog'); ?>">Katalog</a>
						</li>
						<li class="nav-item dropdown <?php if($menu=='kategori'){ echo 'active'; } ?>">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								Kategori
							</a>
							<ul class="dropdown-menu mega-menu ">
								<li>
									<div class="row">
										<div class="col-md-12 media-list span text-left">
											<h5 class="tittle-w3layouts-sub">Kategori</h5>
											<?php foreach ($datakategori as $data_ktg) { ?>
											<ul>
												<li class="media-mini mt-2">
													<a href="<?php echo base_url('shop/kategori/'.$data_ktg->url_ktg); ?>">
														<?php echo $data_ktg->nama_ktg; ?>
													</a>
												</li>
											</ul>
											<?php } ?>
										</div>
									</div>
									<hr>
								</li>
							</ul>
						</li>
						<li class="nav-item <?php if($menu=='home'){ echo 'active'; } ?>">
							<a class="nav-link" href="contact.html">Contact</a>
						</li>
					</ul>

				</div>
			</nav>
		</header>
		<!-- //header