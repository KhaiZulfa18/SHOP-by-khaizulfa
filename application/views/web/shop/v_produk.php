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

            <div class="product-details-area fluid-padding-3 ptb-130">
                <div class="container-fluid">
                  <div class="section-title section-fluid text-center mb-60">
                    <h2><?php echo strtoupper($produk->nama_produk); ?></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipic it</p>
                  </div>
                    <div class="row">
                        <div class="col-lg-6">
                          <div class="product-details-img-content">
                            <div class="product-details-tab mr-40">
                              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators ">
                                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                    <img src="<?php echo base_url().'images/produk/'.$produk->picture; ?>" class="d-block w-100" alt=""/>
                                  </li>
                                  <li data-target="#carouselExampleIndicators" data-slide-to="1">
                                    <img src="<?php echo base_url().'images/produk/'.$produk->picture_2; ?>" class="d-block w-100" alt=""/>
                                  </li>
                                  <li data-target="#carouselExampleIndicators" data-slide-to="2">
                                    <img src="<?php echo base_url().'images/produk/'.$produk->picture_3; ?>" class="d-block w-100" alt="" />
                                  </li>
                                </ol>
                                <div class="carousel-inner">
                                  <div class="carousel-item active">
                                    <img
                                    class="d-block w-100"
                                    src="<?php echo base_url().'images/produk/'.$produk->picture; ?>"
                                    alt="First slide"
                                    />
                                  </div>
                                  <div class="carousel-item">
                                    <img
                                    class="d-block w-100"
                                    src="<?php echo base_url().'images/produk/'.$produk->picture_2; ?>"
                                    alt="Second slide"
                                    />
                                  </div>
                                  <div class="carousel-item">
                                    <img
                                    class="d-block w-100"
                                    src="<?php echo base_url().'images/produk/'.$produk->picture_3; ?>"
                                    alt="Third slide"
                                    />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details-content">
                                <h2><?php echo $produk->nama_produk; ?></h2>
                                <div class="product-price">
                                    <span>Rp. <?php echo format_rupiah($produk->harga); ?></span>
                                </div>
                                <div class="product-overview">
                                    <h5 class="pd-sub-title">Description :</h5>
                                    <p><?php echo $produk->catatan; ?></p>
                                </div>
                                <div class="product-color">
                                    <h5 class="pd-sub-title">Stok</h5>
                                    <p>  
                                    <?php if ($produk->stok>1) {
                                      echo $produk->stok."&nbsp;<mark>Tersedia</mark>";
                                    }elseif($produk->stok<1){
                                      echo "&nbsp;<mark style='background: red;'><del>Sold Out</del></mark>";
                                    } ?>
                                    </p>
                                </div>
                                <div class="quickview-plus-minus">
                                  <form  method="post" action="<?php echo base_url('cart/add_to_cart') ?>">
                                    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                                    <!-- <input type="hidden" name="cart_qty" id="cart_qty" value="1"> -->
                                    <input type="hidden" name="cart_id_produk" id="cart_id_produk" value="<?php echo $produk->id_produk; ?>">
                                    <div class="cart-plus-minus mb-3">
                                        <input type="text" value="1" name="cart_qty" id="cart_qty" class="cart-plus-minus-box">
                                    </div>

                                    <?php if (!empty($this->session->userdata('id_user'))) { ?>
                                      <button type="submit" class="btn-style cr-btn">
                                        <i class="ti-shopping-cart"></i>Add to cart
                                      </button>
                                    <?php }else{ ?>
                                      <button type="button" class="btn-style cr-btn" data-toggle="modal" data-target="#warning">
                                        <i class="ti-shopping-cart"></i>Add to cart
                                      </button>
                                    <?php } ?>
                                  </form>
                                </div>
                                <div class="product-share">
                                    <h5 class="pd-sub-title">Share</h5>
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icofont icofont-social-pinterest"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="icofont icofont-social-instagram"></i></a>
                                        </li>
                                    </ul>
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
