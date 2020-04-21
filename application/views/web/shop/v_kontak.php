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

        <div class="contact-area pt-130">
            <div class="all-info ptb-130">
                <div class="container">
                    <div class="section-title section-fluid text-center mb-60">
                        <h2>KONTAK</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipic it</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="contact-message-wrapper">
                                <h4 class="contact-title">GET IN TOUCH</h4>
                                <div class="contact-message">
                                    <form id="form" action="#" method="post" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-lg-6 mb-20">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="nama" id="nama" type="text" placeholder="Nama Anda">
                                                    <input name="base_url" id="base_url" type="hidden" value="<?php echo base_url(); ?>">                                                        
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="email" id="email" type="email" placeholder="Email Anda">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="subjek" id="subjek" type="text" placeholder="Subjek">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="contact-form-style">
                                                    <textarea name="pesan" id="pesan" cols="30" rows="9" placeholder="Pesan"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="contact-form-style">
                                                    <button class="submit cr-btn btn-style" type="button" id="btnkirim"><span>SEND MASSAGE</span></button>
                                                </div>
                                                <div class="mt-20" id="attention"></div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="contact-info-wrapper">
                                <h4 class="contact-title">INFORMATION</h4>
                                <div class="communication-info">
                                    <div class="single-communication">
                                        <div class="communication-icon">
                                            <i class="ti-home" aria-hidden="true"></i>
                                        </div>
                                        <div class="communication-text">
                                            <h4>Address:</h4>
                                            <p><?php echo $profiltoko->alamat; ?></p>
                                        </div>
                                    </div>
                                    <div class="single-communication">
                                        <div class="communication-icon">
                                            <i class="ti-mobile" aria-hidden="true"></i>
                                        </div>
                                        <div class="communication-text">
                                            <h4>Phone:</h4>
                                            <p><?php echo $profiltoko->telepon; ?></p>
                                        </div>
                                    </div>
                                    <div class="single-communication">
                                        <div class="communication-icon">
                                            <i class="ti-email" aria-hidden="true"></i>
                                        </div>
                                        <div class="communication-text">
                                            <h4>Email:</h4>
                                            <p><a href="mailto:<?php echo $profiltoko->email; ?>"><?php echo $profiltoko->email; ?></a></p>
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
        <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
        <script src="<?php echo base_url(); ?>js/pesan/input_pesan.js?v=1.0.1" type="text/javascript"></script>
    </body>
    </html>
