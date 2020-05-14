<div class="footer-top pt-210 pb-98 theme-bg">
    <div class="container">
     <div class="row">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="footer-widget mb-30 pl-60">
                <div class="footer-widget-title">
                    <h3>QUICK LINK</h3>
                </div>
                <div class="quick-links">
                    <ul>
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
                            <a href="<?php echo base_url('shop/konfirmasi_pembayaran'); ?>">Konfirmasi Pembayaran</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="footer-widget mb-30">
                <div class="footer-widget-title">
                    <h3>OUR SOCIAL MEDIA</h3>
                </div>
                <div class="quick-links">
                    <ul>
                        <li>
                            <a href="https:<?php echo $profiltoko->url_facebook; ?>" target="_blank">
                                <i class="fab fa-facebook-f mr-3"></i><?php echo $profiltoko->facebook; ?>
                            </a>
                        </li>
                        <li>
                            <a href="https:<?php echo $profiltoko->url_instagram; ?>" target="_blank">
                                <i class="fab fa-instagram mr-3"></i><?php echo $profiltoko->instagram; ?>
                            </a>
                        </li>
                        <li>
                            <a href="https:<?php echo $profiltoko->url_twitter; ?>" target="_blank">
                                <i class="fab fa-twitter mr-3"></i><?php echo $profiltoko->twitter; ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="footer-widget mb-30">
                <div class="footer-widget-title">
                    <h3>CONTACT INFO</h3>
                </div>
                <div class="food-info-wrapper">
                    <div class="food-address">
                        <div class="food-info-title">
                            <span>Address</span>
                        </div>
                        <div class="food-info-content">
                            <p><?php echo $profiltoko->alamat; ?></p>
                        </div>
                    </div>
                    <div class="food-address">
                        <div class="food-info-title">
                            <span>Phone & E-mail</span>
                        </div>
                        <div class="food-info-content">
                            <?php
                            $telepon = $profiltoko->telepon;
                            $phone = phone_indo($telepon);
                            $text = "Halo ".$profiltoko->nama.", Saya Tertarik Dengan Produk Anda!";
                            $txt = str_replace(" ", "%20", $text); 
                            ?>
                            <p><a href="https://api.whatsapp.com/send?phone=<?php echo $phone; ?>&text=<?php echo $txt; ?>" target="_blank">
                                <i class="fab fa-whatsapp mr-3"></i>+<?php echo $phone; ?>
                            </a></p>
                            <p><a href="https:<?php echo $profiltoko->email; ?>" target="_blank">
                              <i class="fa fa-envelope mr-3"></i><?php echo $profiltoko->email; ?>
                            </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="footer-bottom ptb-35 black-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="copyright">
                    <p>©Copyright, 2018 All Rights Reserved by <a href="https://freethemescloud.com/">Free themes Cloud</a></p>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="footer-payment-method">
                    <!-- <a href="#"><img alt="" src="assets/img/icon-img/payment.png"></a> -->
                </div>
            </div>
        </div>
    </div>
</div>