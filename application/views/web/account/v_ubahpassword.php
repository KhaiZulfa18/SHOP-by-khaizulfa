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
        <div class="breadcrumb-area pt-255 pb-100" style='background-color: rgba(255, 181, 47, 0.8);'>
          <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h2>My Account</h2>
                <ul>
                    <li>
                        <a href="#">home</a>
                    </li>
                    <li>My Account</li>
                </ul>
            </div>
          </div>
        </div>

        <div class="contact-area pt-130">
            <div class="all-info ptb-130">
                <div class="container">
                    <div class="section-title section-fluid text-center mb-60">
                        <h2>Ubah Password</h2>
                        <p><?php echo $akun->nama; ?></p>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="contact-message-wrapper">
                                <h4 class="contact-title">Ubah Profil</h4>
                                <div class="contact-message">
                                    <form id="form" action="#" method="post" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <label>ID USER</label>
                                                    <input class="form-control" name="id_user" id="id_user" type="text" value="<?php echo $akun->id_user; ?>" placeholder="ID User" disabled>
                                                    <input name="base_url" id="base_url" type="hidden" value="<?php echo base_url(); ?>">
                                                    <input class="form-control" name="id" id="id" type="hidden" value="<?php echo $akun->id; ?>">  
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <label>Password Anda</label>
                                                    <input class="form-control" name="currentpassword" id="currentpassword" type="password" placeholder="Password Anda">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <label>Password Baru</label>
                                                    <input class="form-control" name="newpassword" id="newpassword" type="password" placeholder="Password Baru">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <label>Konfirmasi Password Baru</label>
                                                    <input class="form-control" name="confirmpassword" id="confirmpassword" type="password" placeholder="Konfirmasi Password Baru">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="contact-form-style mb-20">
                                                    <button class="cr-btn btn-style" type="button" id="btnedit"><i class="fa fa-save"></i>&nbsp;<span>UBAH PASSWORD</span></button>
                                                    <a href="<?php echo base_url('useraccount/myaccount'); ?>"><button class="cr-btn btn-style" type="button" id="btnkembali"><span>KEMBALI</span>&nbsp;<i class="fa fa-undo"></i></button></a>
                                                </div>
                                                <div class="mt-20" id="attention"></div>
                                            </div>
                                        </div>
                                    </form>
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
        <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
        <script src="<?php echo base_url(); ?>js/account/ubahpassword.js?v=1.0.1" type="text/javascript"></script>]
    </body>
</html>
