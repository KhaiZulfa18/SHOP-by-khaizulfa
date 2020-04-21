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
                                        <div class="product-width col-md-6 col-xl-4 col-lg-6">
                                            <div class="product-wrapper mb-35">
                                                <div class="product-img">
                                                    <a href="product-details.html">
                                                        <img src="assets/img/product/product-1.jpg" alt="">
                                                    </a>
                                                    <div class="product-item-dec">
                                                        <ul>
                                                            <li>2018</li>
                                                            <li>MANUAL</li>
                                                            <li>PETROL</li>
                                                            <li>270 CC</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-action">
                                                        <a class="action-plus-2 p-action-none" title="Add To Cart" href="#">
                                                            <i class=" ti-shopping-cart"></i>
                                                        </a>
                                                        <a class="action-cart-2" title="Wishlist" href="#">
                                                            <i class=" ti-heart"></i>
                                                        </a>
                                                        <a class="action-reload" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                                            <i class=" ti-zoom-in"></i>
                                                        </a>
                                                    </div>
                                                    <div class="product-content-wrapper">
                                                        <div class="product-title-spreed">
                                                            <h4><a href="product-details.html">Gloriori GSX 250 R</a></h4>
                                                            <span>6600 RPM</span>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$2549</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-list-details">
                                                    <h2><a href="product-details.html">Gloriori GSX 250 R</a></h2>
                                                    <div class="quick-view-rating">
                                                        <i class="fa fa-star reting-color"></i>
                                                        <i class="fa fa-star reting-color"></i>
                                                        <i class="fa fa-star reting-color"></i>
                                                        <i class="fa fa-star reting-color"></i>
                                                        <i class="fa fa-star reting-color"></i>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>$2549</span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore mag aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo it. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                    <div class="shop-list-cart">
                                                        <a href="cart.html"><i class="ti-shopping-cart"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
