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

        <div class="contact-area pt-100">
            <div class="all-info ptb-100">
                <div class="container">
                    <div class="section-title section-fluid text-center mb-60">
                        <h2>KONFIRMASI PEMBAYARAN</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipic it</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="contact-message-wrapper">
                                <h4 class="contact-title">KONFIRMASI PEMBAYARAN</h4>
                                <div class="contact-message">
                                    <form id="form" action="#" method="post" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="id_invoice" id="id_invoice" type="text" placeholder="ID Invoice">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="nama_pengirim" id="nama_pengirim" type="text" placeholder="Nama Pengirim">
                                                    <input class="form-control" name="base_url" id="base_url" type="hidden" value="<?php echo base_url(); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <select class="" id="bank" name="bank">
                                                        <option value="">-- Pilih Bank --</option>
                                                        <?php 
                                                        $no=1;
                                                        foreach ($list_bank as $data ) { ?>
                                                          <option value="<?php echo $data->nama_bank; ?>"><?php echo $data->nama_bank; ?></option>
                                                      <?php } ?>
                                                      <option value="Bank Lain">Lainnya</option>
                                                  </select>
                                              </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                  <input class="form-control" name="nominal" id="nominal" type="text" placeholder="Nominal">
                                              </div>
                                          </div>
                                          <div class="col-lg-12">
                                            <div class="contact-form-style">
                                                <span>Foto Bukti Pembayaran</span>
                                                <div class="input-group mt-3">
                                                    <div class="custom-file">
                                                      <div class="col-12">
                                                        <input type="file" class="custom-file-input" id="picture" name="picture">
                                                        <label class="custom-file-label" for="foto">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact-form-style">
                                                <button class="submit cr-btn btn-style" type="button" id="btnkirim"><span>KIRIM</span></button>
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
                            <h4 class="contact-title">METODE PEMBAYARAN</h4>
                            <div class="communication-info">
                                <?php foreach ($list_bank as $data) { ?>
                                <div class="single-communication">
                                    <div class="communication-text">
                                        <h3><?php echo $data->nama_bank; ?></h3>
                                        <p><?php echo "Atas Nama : ".$data->atas_nama." </br> No. Rekening : ".$data->no_rekening; ?></p>
                                    </div>
                                </div>
                                <?php } ?>
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
    <script src="<?php echo base_url(); ?>js/konfirmasi/input_konfirmasi.js?v=1.0.2" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        bsCustomFileInput.init();
      });
    </script>
</body>
</html>
