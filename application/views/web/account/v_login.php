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
            <div class="breadcrumb-area pt-200 pb-100" style='background-color: rgba(255, 181, 47, 0.8);'>
                <div class="container-fluid">
                    <div class="breadcrumb-content text-center">
                        <h2>LOGIN AKUN</h2>
                        <ul>
                            <li>
                                <a href="#"><?php echo $profiltoko->nama; ?></a>
                            </li>
                            <li>Login Akun</li>
                        </ul>
                    </div>
                </div>
            </div>

        <div class="contact-area pt-1">
            <div class="all-info ptb-130">
                <div class="container">
                    <div class="section-title section-fluid text-center mb-60">
                        <h2>LOGIN AKUN</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-message-wrapper">
                                <h4 class="contact-title">LOGIN</h4>
                                <div class="contact-message">
                                    <form id="form" method="post" action="<?php echo base_url('useraccount/cek_login'); ?>" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="username" id="username" type="text" placeholder="Username" required="required">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="password" id="password" type="password" placeholder="Password" required="required">
                                                </div>
                                            </div>
                                                 
                                            <div class="col-lg-12">
                                                <?php 
                                                if($this->session->flashdata('error') <> '') {
                                                    echo $this->session->flashdata('error');
                                                }
                                                ?>

                                                <div class="contact-form-style mb-20">
                                                    <button type="submit" class="cr-btn btn-style mt-3">LOGIN</button>  
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <h4>Belum punya akun? <a href="<?php echo base_url('useraccount/register'); ?>">Daftar disini</a></h4>
                            </div>
                        </div>
                        <div class="col-lg-3">
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
    </body>
</html>