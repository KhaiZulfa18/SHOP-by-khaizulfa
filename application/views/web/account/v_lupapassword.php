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
                    <h2>RESET PASSWORD</h2>
                    <ul>
                        <li>
                            <a href="#"><?php echo $profiltoko->nama; ?></a>
                        </li>
                        <li>RESET PASSWORD</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="contact-area pt-1">
            <div class="all-info ptb-130">
                <div class="container">
                    <div class="section-title section-fluid text-center mb-60">
                        <h2>RESET PASSWORD</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-message-wrapper">
                                <h4 class="contact-title">Reset Password</h4>
                                <div class="contact-message">
                                    <form id="form" method="post" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="contact-form-style mb-20">
                                                    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                                                    <input class="form-control" name="email" id="email" type="text" placeholder="Email Anda" required="required">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div id="attention"></div>
                                                <div class="contact-form-style mb-20">
                                                    <button type="button" class="cr-btn btn-style mt-3" id="btnsent">KIRIM</button>  
                                                </div>
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
    </div>

    <footer>
        <!-- Footer -->
        <?php $this->load->view('web/footer'); ?>
    </footer>
    <!-- Javascript -->
    <?php $this->load->view('web/js-script'); ?>
    <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
    <script src="<?php echo base_url(); ?>js/account/resetpw.js?v=1.0.0" type="text/javascript"></script>    
</body>
</html>