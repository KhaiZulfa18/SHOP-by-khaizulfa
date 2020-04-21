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
                        <h2>Order History</h2>
                        <ul>
                            <li>
                                <a href="#">home</a>
                            </li>
                            <li>Order History</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="product-cart-area pt-120 pb-130">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-form-style mb-20">
                                <select id="status" name="status" class="">
                                    <option value="">- Status -</option>
                                    <option value="1">Dalam Proses</option>
                                    <option value="2">Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form-style mb-20">
                                <input class="form-control" name="cari" id="cari" type="text" placeholder="Cari">
                                <input name="base_url" id="base_url" type="hidden" value="<?php echo base_url(); ?>">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <div id="tabel-data"></div>
                            </div>
                            <div id="paging"></div>
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
    <script src="<?php echo base_url(); ?>js/history/history.js?v=1.0.0" type="text/javascript"></script>
    </body>
</html>
