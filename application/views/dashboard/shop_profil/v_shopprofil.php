<!DOCTYPE html>
<head>
  <?php
    $this->load->View('dashboard/header'); 
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php
    $this->load->View('dashboard/navbar');
    $this->load->View('dashboard/sidebar');  
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Profile</a></li>
              <li class="breadcrumb-item active"><?php echo $nama; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Profil</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body box-profile">
                <div class="text-center">
                  <?php 
                    $txtgambar = (!empty($logo)) ? '<img src="'.base_url().'images/shop_profil/'.$logo.'" class="img-fluid img-thumbnail" >' : '-';
                    echo $txtgambar;
                  ?>
                </div>

                <h3 class="profile-username text-center"><?php echo $nama;?></h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nama</b> <a class="float-right"><?php echo $nama;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php echo $email;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Telepon</b> <a class="float-right"><?php echo $telepon;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right"><?php echo $alamat;?></a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-8">
            <!-- About Me Box -->
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#aboutme" data-toggle="tab">Profil</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="aboutme">
                    <strong><i class="fas fa-user mr-1"></i> Name </strong>
                    <p class="text-muted">
                      <?php echo $nama;?>
                    </p>
                    <hr>
                    <strong><i class="fas fa-phone mr-1"></i> Telephone </strong>
                    <p class="text-muted">
                      <?php echo $telepon;?>
                    </p>
                    <hr>
                    <strong><i class="fas fa-envelope mr-1"></i> Email </strong>
                    <p class="text-muted">
                      <?php echo $email;?>
                    </p>
                    <hr>
                    <strong><i class="fab fa-facebook-f mr-1"></i> Facebook </strong>
                    <p class="text-muted">
                      <?php echo $facebook;?>
                    </p>
                    <hr>
                    <strong><i class="fab fa-instagram mr-1"></i> Instagram </strong>
                    <p class="text-muted">
                      <?php echo $instagram;?>
                    </p>
                    <hr>
                    <strong><i class="fab fa-twitter mr-1"></i> Twitter </strong>
                    <p class="text-muted">
                      <?php echo $twitter;?>
                    </p>
                    <hr>
                    <strong><i class="fas fa-map mr-1"></i> Alamat </strong>
                    <p class="text-muted">
                      <?php echo $alamat;?>
                    </p>
                    <hr>
                  </div>
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" id="form">
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nama Toko</label>
                        <div class="col-sm-10">
                          <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">
                          <input type="hidden" class="form-control" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                          <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="telepon" id="telepon" value="<?php echo $telepon; ?>" placeholder="Telepon">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $facebook; ?>" placeholder="Facebook">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">URL Facebook</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="url_facebook" id="url_facebook" value="<?php echo $url_facebook; ?>" placeholder="URL Facebook">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="instagram" id="instagram" value="<?php echo $instagram; ?>" placeholder="Instagram">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">URL Instagram</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="url_instagram" id="url_instagram" value="<?php echo $url_instagram; ?>" placeholder="URL Instagram">
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $twitter; ?>" placeholder="Twitter">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">URL Twitter</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="url_twitter" id="url_twitter" value="<?php echo $url_twitter; ?>" placeholder="URL Twitter">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="alamat" id="alamat" autocomplete="off"><?php echo $alamat; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputFile" class="col-sm-2 col-form-label">Logo</label>
                        <div class="input-group col-sm-10">
                          <div class="custom-file">
                            <div class="">
                              <input type="file" class="custom-file-input" id="picture" name="picture">
                              <label class="custom-file-label" for="picture">Choose file</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div id="attention"></div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <?php if ($this->session->userdata('level')=='2') { ?>
                            <button type="button" class="btn btn-primary" id="btnedit">Save Changes</button>
                          <?php }else{ ?>
                            <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#warning">Save Changes</button>
                          <?php } ?>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    $this->load->View('dashboard/footer'); 
  ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php
  $this->load->View('dashboard/script'); 
?>
<script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
<script src="<?php echo base_url(); ?>js/shop_profil/ubahshopprofil.js?v=1.0.2" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
</body>
</html>
