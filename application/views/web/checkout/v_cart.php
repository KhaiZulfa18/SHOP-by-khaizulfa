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
            <!-- <?php $this->load->view('web/slider'); ?> -->
            <div class="breadcrumb-area pt-255 pb-170" style='background-color: rgba(255, 181, 47, 0.8);'>
                <div class="container-fluid">
                    <div class="breadcrumb-content text-center">
                        <h2>My Cart</h2>
                        <ul>
                            <li>
                                <a href="#">home</a>
                            </li>
                            <li>My cart</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="product-cart-area pt-120 pb-130">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-content table-responsive">
                                <table class="table" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px" class="product-name">No.</th>
                                            <th style="width: 200px" class="product-price">Nama Produk</th>
                                            <th style="width: 150px" class="product-name">Harga</th>
                                            <th style="width: 150px" class="product-price">QTY</th>
                                            <th style="width: 150px" class="product-quantity">Total</th>
                                            <th style="width: 50px" class="product-subtotal">Hapus</th>
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
                                        <tr>
                                            <td class="text-center product-price">
                                                <?php echo $no++; ?>
                                            </td>
                                            <td class="product-name">
                                                <?php echo $data->produk; ?>
                                            </td>
                                            <td class="text-left product-price"><span class="amount">Rp.<?php echo format_rupiah($data->harga); ?></span></td>
                                            <td class="product-quantity paginations text-center">
                                              <ul>
                                              <li class="active"><a href="<?php echo base_url('cart/update_cart_minus/'.$data->id) ?>"><i class="fa fa-minus"></i></button></a></li>
                                              &nbsp;<?php echo $data->qty; ?>&nbsp;
                                              <li class="active"><a href="<?php echo base_url('cart/update_cart_plus/'.$data->id) ?>"><i class="fa fa-plus"></i></button></a></li>
                                              </ul>
                                            </td>
                                            <td class="text-left product-subtotal">Rp.<?php echo format_rupiah($jml_hrg); ?></td>
                                            <td class="text-center product-cart-icon product-subtotal"><a href="<?php echo base_url('cart/delete_cart/'.$data->id) ?>"><i class="ti-trash"></i></a></td>
                                        </tr>
                                      <?php
                                        $total += $jml_hrg;
                                        $item += $data->qty; 
                                      } ?>
                                      <tr class="text-center">
                                        <td colspan="3">Jumlah Item & Total</td>
                                        <td class="text-center"><?php echo $item; ?></td>
                                        <td colspan="2" class="text-left">Rp.<?php echo format_rupiah($total); ?></td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-shiping-update">
                                <div class="update-cart">
                                    <a class="btn-style cr-btn" href="<?php echo base_url('shop/home'); ?>">
                                        <i class='fa fa-arrow-left'>&nbsp;</i><span>continue shopping</span>
                                    </a>
                                </div>
                                <div class="update-checkout-cart">
                                    <div class="update-cart">
                                        <a class="btn-style cr-btn" href="<?php echo base_url('pembayaran/checkout'); ?>">
                                            <span>checkout</span>&nbsp;<i class='fa fa-arrow-right'></i>
                                        </a>
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
