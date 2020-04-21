<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Header -->
        <?php $this->load->view('web/header'); ?>
    </head>
    <body>
        <div class="wrapper">
            <!-- header start -->
            <header>
                <!-- Navbar -->
                <?php $this->load->view('web/navbar'); ?>
            </header>
            <!-- Slider -->
            <?php $this->load->view('web/slider'); ?>

            <div class="shop-wrapper fluid-padding-2 pt-120 pb-150">
                <div class="container-fluid">
                    <div class="section-title section-fluid text-center mb-60">
                        <h2>HOME</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipic it</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shop-topbar-wrapper">
                                <div class="grid-list-options">
                                    <ul class="view-mode">
                                        <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ti-layout-grid2"></i></a></li>
                                        <li><a href="#product-list" data-view="product-list"><i class="ti-view-list"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-sorting">
                                    <div class="shop-product-sorting nav">
                                        <a class="active" data-toggle="tab" href="#new-product">NEW PRODUCT</a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list-product-wrapper tab-content">
                                <div id="new-product" class="product-grid product-view tab-pane active">
                                    <div class="row">
                                        <?php foreach ($dataproduk as $data) { ?>
                                        <div class="product-width col-md-6 col-xl-4 col-lg-6">
                                            <div class="product-wrapper mb-35">
                                                <div class="product-img">
                                                    <a href="<?php echo base_url('shop/produk/'.$data->url); ?>">
                                                        <?php 
                                                        $txtgambar = (!empty($data->picture)) ? '<img src="'.base_url().'images/produk/'.$data->picture.'" class="img-fluid">' : '-';
                                                        echo $txtgambar;
                                                        ?>
                                                    </a>
                                                    <div class="product-action" style="background: rgba(0, 0, 0, 0.6);">
                                                        <form  method="post" action="<?php echo base_url('cart/add_to_cart') ?>">
                                                            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                                                            <input type="hidden" name="cart_qty" id="cart_qty" value="1">
                                                            <input type="hidden" name="cart_id_produk" id="cart_id_produk" value="<?php echo $data->id_produk; ?>">
                                                            <?php if (!empty($this->session->userdata('id_user'))) { ?>
                                                              <button type="submit" class="btn btn-md btn-warning rounded">
                                                                <i class="fas fa-cart-plus"></i>
                                                              </button>
                                                            <?php }else{ ?>
                                                              <button type="button" class="btn btn-md btn-warning rounded" data-toggle="modal" data-target="#warning">
                                                                <i class="ti-shopping-cart"></i>
                                                              </button>
                                                            <?php } ?>
                                                        </form>
                                                    </div>
                                                    <div class="product-content-wrapper" style="background: rgba(0, 0, 0, 0.6);">
                                                        <div class="product-title-spreed">
                                                            <h4 style="color: #ffffff"><?php echo $data->nama_produk; ?></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span style="color: #ffb52f;">Rp.<?php echo format_rupiah($data->harga); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-list-details">
                                                    <h2><a href="<?php echo base_url('shop/produk/'.$data->url); ?>"><?php echo $data->nama_produk; ?></a></h2>
                                                    <div class="product-price">
                                                        <span>Rp.<?php echo format_rupiah($data->harga); ?></span>
                                                    </div>
                                                    <p><?php echo $data->catatan; ?></p>
                                                    <div class="shop-list-cart">
                                                        <form  method="post" action="<?php echo base_url('cart/add_to_cart') ?>">
                                                            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                                                            <input type="hidden" name="cart_qty" id="cart_qty" value="1">
                                                            <input type="hidden" name="cart_id_produk" id="cart_id_produk" value="<?php echo $data->id_produk; ?>">
                                                            <?php if (!empty($this->session->userdata('id_user'))) { ?>
                                                              <button type="submit" class="btn-style cr-btn rounded">
                                                                <i class="ti-shopping-cart"></i>Add to cart
                                                              </button>
                                                            <?php }else{ ?>
                                                              <button type="button" class="btn-style cr-btn rounded" data-toggle="modal" data-target="#warning">
                                                                <i class="ti-shopping-cart"></i>Add to cart
                                                              </button>
                                                            <?php } ?>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <!-- Footer -->
                <?php $this->load->view('web/footer'); ?>
            </footer>
        <!-- Javascript -->
		<?php $this->load->view('web/js-script'); ?>
    </body>
</html>
