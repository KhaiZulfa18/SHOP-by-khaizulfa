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
                        <h2>DAFTAR AKUN</h2>
                        <ul>
                            <li>
                                <a href="#"><?php echo $profiltoko->nama; ?></a>
                            </li>
                            <li>Daftar Akun</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="contact-area pt-130">
            <div class="all-info ptb-130">
                <div class="container">
                    <div class="section-title section-fluid text-center mb-60">
                        <h2>Daftar Akun Baru</h2>
                        <div class="alert alert-success alert-dismissible text-left">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-user"></i>
                            Selamat Datang di <?php echo $profiltoko->nama; ?>! Silahkan Daftar Akun Baru ya....
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-message-wrapper">
                                <h4 class="contact-title">DAFTAR</h4>
                                <div class="contact-message">
                                    <form id="form" action="#" method="post" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="username" id="username" type="text" placeholder="Username">
                                                    <input class="form-control" name="base_url" id="base_url" type="hidden" value="<?php echo base_url(); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="password" id="password" type="password" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="nama" id="nama" type="text" placeholder="Nama">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="email" id="email" type="text" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <input class="form-control" name="telepon" id="telepon" type="text" placeholder="No. Telepon">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <select id="gender" name="gender" class="form-select">
                                                        <option value="">- Jenis Kelamin -</option>
                                                        <option value="1">Laki-laki</option>
                                                        <option value="2">Perempuan</option>
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
                                            <div class="col-lg-6">
                                                <div class="contact-form-style mb-20">
                                                    <textarea class="form-control w-100" name="alamat" id="alamat" cols="30" rows="9" placeholder="Alamat"></textarea>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-lg-12">
                                                <div class="mt-20" id="attention"></div>

                                                <div class="contact-form-style mb-20">
                                                    <button type="button" id="btnregister" name="btnregister" class="cr-btn btn-style mt-3">Daftar</button>  
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <h4>Sudah Punya Akun? <a href="<?php echo base_url('useraccount/login'); ?>">Login disini</a></h4>
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
        <script src="<?php echo base_url(); ?>js/account/register.js?v=1.0.0" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
        </script>
    </body>
</html>