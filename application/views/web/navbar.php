<div class="header-area transparent-bar ptb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-4">
                <div class="logo-small-device">
                    <a href="<?php echo base_url('shop/home'); ?>"><img alt="<?php echo $profiltoko->nama ?>" src="<?php echo base_url('images/shop_profil/'.$profiltoko->logo);?>" height="60px"></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-9 col-8">
                <div class="header-contact-menu-wrapper pl-45 mt-15">
                    <div class="header-contact">
                        <h1><?php echo $profiltoko->nama; ?></h1>
                    </div>
                    <div class="menu-wrapper text-center">
                        <button class="menu-toggle">
                            <img class="s-open" alt="" src="<?php echo base_url(); ?>css/oswan/assets/img/icon-img/menu.png">
                            <img class="s-close" alt="" src="<?php echo base_url(); ?>css/oswan/assets/img/icon-img/menu-close.png">
                        </button>
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li class="<?php if($menu=='home'){ echo 'active'; }?>"><a href="<?php echo base_url('shop/home') ?>">HOME</a></li>
                                    <li class="<?php if($menu=='katalog'){ echo 'active'; }?>"><a href="<?php echo base_url('shop/katalog') ?>">KATALOG</a></li>
                                    <li class="<?php if($menu=='kategori'){ echo 'active'; }?>"><a href="#">KATEGORI</a>
                                        <ul>
                                        <?php foreach ($datakategori as $data_ktg) { ?>
                                            <li class="nav-item">
                                                <a class="nav-link"href="<?php echo base_url('shop/kategori/'.$data_ktg->url_ktg); ?>">
                                                    <?php echo $data_ktg->nama_ktg; ?>
                                                </a>
                                            </li>
                                        <?php } ?> 
                                        </ul>
                                    </li>
                                    <li class="<?php if($menu=='kontak'){ echo 'active'; }?>"><a href="<?php echo base_url('shop/kontak') ?>">KONTAK</a></li>
                                    <li class="<?php if($menu=='konfirmasi'){ echo 'active'; }?>"><a href="<?php echo base_url('shop/konfirmasi_pembayaran') ?>">PEMBAYARAN</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="header-cart cart-small-device float-right pr-20">
                    <button class="icon-cart menu-toggle">
                    <?php if (!empty($this->session->userdata('id_user'))) {
                    if (!empty($this->session->userdata('foto'))) { ?>
                        <img src="<?php echo base_url();?>images/profil_pic/<?php echo $this->session->userdata('foto');?>" class="mr-2 mt-15 rounded-circle" height="45">
                    <?php }else{ ?>
                        <i class="ti-user mt-15 mt-15" aria-hidden="true"></i>
                    <?php } }else{  ?>
                        <i class="ti-user mt-15 mr-3" aria-hidden="true"></i>
                    <?php } ?>
                    </button>
                    <div class="shopping-cart-content">
                        <?php if (!empty($this->session->userdata('id_user'))) { ?>
                            <ul>
                                <li class="single-shopping-cart">
                                    <a href="<?php echo base_url('useraccount/myaccount'); ?>"><h4>MY ACCOUNT</h4></a>
                                </li>
                                <li class="single-shopping-cart">
                                    <a href="<?php echo base_url('useraccount/history'); ?>"><h4>ORDER HISTORY</h4></a>
                                </li>
                                <li class="single-shopping-cart">
                                    <a href="<?php echo base_url('useraccount/logout'); ?>"><h4>LOGOUT</h4></a>
                                </li>
                            </ul>

                            <div class="shopping-cart-btn">
                                <a class="btn-style cr-btn" href="<?php echo base_url('cart/mycart'); ?>"><?php if (!empty($item_cart)) {
                                    echo $item_cart;
                                }else{ echo "0"; } ?> items</a>
                            </div>
                        <?php }else{ ?>
                            <ul>
                                <li class="single-shopping-cart">
                                    <a href="<?php echo base_url('useraccount/login'); ?>"><h4>LOGIN</h4></a>
                                </li>
                                <li class="single-shopping-cart">
                                    <a href="<?php echo base_url('useraccount/register'); ?>"><h4>REGISTER</h4></a>
                                </li>
                            </ul>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area col-12">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li class="<?php if($menu=='home'){ echo 'active'; }?>"><a href="<?php echo base_url('shop/home') ?>">HOME</a></li>
                            <li class="<?php if($menu=='katalog'){ echo 'active'; }?>"><a href="<?php echo base_url('shop/katalog') ?>">KATALOG</a></li>
                            <li class="<?php if($menu=='kategori'){ echo 'active'; }?>"><a href="#">KATEGORI</a>
                                <ul>
                                    <?php foreach ($datakategori as $data_ktg) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link"href="<?php echo base_url('shop/kategori/'.$data_ktg->url_ktg); ?>">
                                                <?php echo $data_ktg->nama_ktg; ?>
                                            </a>
                                        </li>
                                    <?php } ?> 
                                </ul>
                            </li>
                            <li class="<?php if($menu=='kontak'){ echo 'active'; }?>"><a href="<?php echo base_url('shop/kontak') ?>">KONTAK</a></li>
                            <li class="<?php if($menu=='konfirmasi'){ echo 'active'; }?>"><a href="<?php echo base_url('shop/konfirmasi_pembayaran') ?>">PEMBAYARAN</a></li>
                        </ul>
                    </nav>							
                </div>
            </div>
        </div>
    </div>
    <div class="header-cart-wrapper">
        <div class="header-cart">
            <button class="icon-cart menu-toggle">
            <?php if (!empty($this->session->userdata('id_user'))) {
                if (!empty($this->session->userdata('foto'))) { ?>
                <img src="<?php echo base_url();?>images/profil_pic/<?php echo $this->session->userdata('foto');?>" class="rounded-circle" height="60">
            <?php }else{ ?>
                <i class="ti-user" aria-hidden="true"></i>
            <?php } }else{  ?>
                <i class="ti-user" aria-hidden="true"></i>
            <?php } ?>
            </button>
            <div class="shopping-cart-content">
                <?php if (!empty($this->session->userdata('id_user'))) { ?>
                    <ul>
                        <li class="single-shopping-cart">
                            <a href="<?php echo base_url('useraccount/myaccount'); ?>"><h4>MY ACCOUNT</h4></a>
                        </li>
                        <li class="single-shopping-cart">
                            <a href="<?php echo base_url('useraccount/history'); ?>"><h4>ORDER HISTORY</h4></a>
                        </li>
                        <li class="single-shopping-cart">
                            <a href="<?php echo base_url('useraccount/logout'); ?>"><h4>LOGOUT</h4></a>
                        </li>
                    </ul>
                        
                    <div class="shopping-cart-btn">
                        <a class="btn-style cr-btn" href="<?php echo base_url('cart/mycart'); ?>"><?php if (!empty($item_cart)) {
                            echo $item_cart;
                        }else{ echo "0"; } ?> items</a>
                    </div>
                <?php }else{ ?>
                    <ul>
                        <li class="single-shopping-cart">
                            <a href="<?php echo base_url('useraccount/login'); ?>"><h4>LOGIN</h4></a>
                        </li>
                        <li class="single-shopping-cart">
                            <a href="<?php echo base_url('useraccount/register'); ?>"><h4>REGISTER</h4></a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>