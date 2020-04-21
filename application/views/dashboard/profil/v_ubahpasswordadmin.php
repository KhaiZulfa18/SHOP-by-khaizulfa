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
            <h1 class="m-0 text-dark"><?php echo $title; ; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Profil</a></li>
              <li class="breadcrumb-item active">Password</li>
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

        <!-- Main row -->
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <?php if ($this->session->userdata('gender')=='1') {?>
                  <img src="<?php echo base_url(); ?>images/user/001-businessman.png" alt="User Image" class="profile-user-img img-fluid img-circle">
                  <?php } elseif ($this->session->userdata('gender')=='2') { ?>
                  <img src="<?php echo base_url(); ?>images/user/004-manager.png" alt="User Image" class="profile-user-img img-fluid img-circle">
                  <?php } ?>
                </div>

                <h3 class="profile-username text-center"><?php echo $nama;?></h3>

                <p class="text-muted text-center">
                  <?php echo $id_admin; ?>
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nama</b> <a class="float-right"><?php echo $nama;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Username</b> <a class="float-right"><?php echo $username;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Position</b> 
                    <a class="float-right">
                      <?php if ($level=='1') {
                        echo "Admin";
                      } elseif ($level=='2') { 
                        echo "Owner";
                      } ?>
                    </a>
                  </li>
                </ul>

                <!--<a href="<?php echo base_url('profile/ubahpassword')?>" class="btn btn-danger btn-block"><b>Ubah Password</b></a>-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Password</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal" id="form">
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">ID Admin</label>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">
                      <input type="hidden" class="form-control" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                      <input type="text" class="form-control" name="id_admin" id="id_admin" value="<?php echo $id_admin; ?>" placeholder="ID Admin" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="currentpassword" class="col-sm-2 col-form-label">Password Anda</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="currentpassword" id="currentpassword"  placeholder="Current Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="newpassword" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="confirmpassword" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div id="attention"></div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="button" class="btn btn-primary" id="btnedit">Ubah Password</button>
                      <button type="button" class="btn btn-danger" id="btnback">Kembali</button> 
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
        
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
<script src="<?php echo base_url(); ?>js/profil/ubahpasswordadmin.js?v=1.0.0" type="text/javascript"></script>
</body>
</html>
