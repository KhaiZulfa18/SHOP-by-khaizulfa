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

            <div class="contact-area ">
            <div class="all-info ptb-130">
                <div class="container">
                    <div class="section-title section-fluid text-center mb-60">
                        <h2><?php echo $akun->nama; ?></h2>
                        <p><?php echo $akun->id_user; ?></p>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 mb-5">
                            <div class="contact-message-wrapper">
                                <h4 class="contact-title">Picture</h4>
                                <div class="contact-message">
                                  <div class="col-md-12 text-center">
                                    <?php 
                                    $txtgambar = (!empty($akun->foto)) ? '<img src="'.base_url().'images/profil_pic/'.$akun->foto.'" class="img-thumbnail rounded mx-auto d-block" >' : '-';
                                    echo $txtgambar;
                                    ?>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-info-wrapper">
                                <h4 class="contact-title">Profile</h4>
                                <div class="communication-info">
                                  <div class="row">
                                    <div class="col-sm-6 mb-3">
                                      <div class="single-communication">
                                        <div class="communication-icon">
                                            <i class="fa fa-id-card" aria-hidden="true"></i>
                                        </div>
                                        <div class="communication-text">
                                            <h4>ID USER</h4>
                                            <p><?php echo $akun->id_user; ?></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                      <div class="single-communication">
                                        <div class="communication-icon">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </div>
                                        <div class="communication-text">
                                            <h4>Nama :</h4>
                                            <p><?php echo $akun->nama; ?></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                      <div class="single-communication">
                                        <div class="communication-icon">
                                            <i class="fa fa-id-badge" aria-hidden="true"></i>
                                        </div>
                                        <div class="communication-text">
                                            <h4>Username :</h4>
                                            <p><?php echo $akun->username; ?></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                      <div class="single-communication">
                                        <div class="communication-icon">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                        <div class="communication-text">
                                            <h4>Email :</h4>
                                            <p><?php echo $akun->email; ?></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                      <div class="single-communication">
                                        <div class="communication-icon">
                                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                        </div>
                                        <div class="communication-text">
                                            <h4>Telepon :</h4>
                                            <p><?php echo $akun->telepon; ?></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                      <div class="single-communication">
                                        <div class="communication-icon">
                                          <?php if ($akun->gender=='1'){ 
                                            echo "<i class='fa fa-mars'></i>";
                                          }elseif ($akun->gender=='2') { 
                                            echo "<i class='fa fa-venus'></i>";
                                          }else{ 
                                            echo "-"; 
                                          } ?>
                                        </div>
                                        <div class="communication-text">
                                            <h4>Gender :</h4>
                                            <p><?php if ($akun->gender=='1'){ 
                                              echo "Laki-laki";
                                            }elseif ($akun->gender=='2') { 
                                              echo "Perempuan";
                                            }else{ 
                                              echo "-"; 
                                            } ?></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                      <div class="single-communication">
                                        <div class="communication-icon">
                                            <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                                        </div>
                                        <div class="communication-text">
                                            <h4>Alamat :</h4>
                                            <p><?php echo $akun->alamat; ?></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-12">
                                      <a href="<?php echo base_url('useraccount/ubahprofil') ?>" class="btn-style cr-btn"><i class="fa fa-edit"></i>&nbsp;Ubah Profil</a>
                                      <a href="<?php echo base_url('useraccount/ubahpassword') ?>" class="btn-style cr-btn"><i class="fa fa-lock"></i>&nbsp;Ubah Password</a>
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
    </body>
</html>
