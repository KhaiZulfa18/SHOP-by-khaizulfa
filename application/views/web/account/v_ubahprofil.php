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
                        <h2>Ubah Profil</h2>
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
                                                  <input class="form-control" name="id_user" id="id_user" type="text" value="<?php echo $akun->id_user; ?>" placeholder="ID User" disabled>
                                                  <input class="form-control" name="base_url" id="base_url" type="hidden" value="<?php echo base_url(); ?>">
                                                  <input class="form-control" name="id" id="id" type="hidden" value="<?php echo $akun->id; ?>">                                                        
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="username" id="username" type="text" value="<?php echo $akun->username; ?>" placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="nama" id="nama" type="text" value="<?php echo $akun->nama; ?>" placeholder="Nama">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="email" id="email" type="text" value="<?php echo $akun->email; ?>" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="telepon" id="telepon" type="text" value="<?php echo $akun->telepon; ?>" placeholder="No. Telepon">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <select id="gender" name="gender" class="form-select">
                                                        <option value="">- Jenis Kelamin -</option>
                                                        <option value="1" <?php if($akun->gender=='1'){ echo "selected";} ?>>Laki-laki</option>
                                                        <option value="2" <?php if($akun->gender=='2'){ echo "selected";} ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="input-group">
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
                                                <div class="contact-form-style mb-20">
                                                    <textarea class="form-control w-100" name="alamat" id="alamat" cols="30" rows="9" placeholder="Alamat"><?php echo $akun->alamat; ?></textarea>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-lg-12">
                                                <div class="contact-form-style mb-20">
                                                    <button class="cr-btn btn-style" type="button" id="btnedit"><i class="fa fa-save"></i>&nbsp;<span>SIMPAN PERUBAHAN</span></button>
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
        <script src="<?php echo base_url(); ?>js/account/ubah_profil.js?v=1.0.4" type="text/javascript"></script>
        <script type="text/javascript">
          $(document).ready(function () {
            bsCustomFileInput.init();
        });
        </script>
    </body>
</html>
