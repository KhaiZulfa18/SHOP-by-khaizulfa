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

                <a href="<?php echo base_url('profile/ubahpassword')?>" class="btn btn-danger btn-block"><b>Ubah Password</b></a>
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
                  <li class="nav-item"><a class="nav-link active" href="#aboutme" data-toggle="tab">About Me</a></li>
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
                    <strong>
                      Gender 
                      <?php if ($gender=='1'){
                        echo "<i class='fas fa-mars mr-1'></i> ";
                      }elseif ($gender=='2'){
                        echo "<i class='fas fa-venus mr-1'></i> ";
                      }?>
                    </strong>
                    <p class="text-muted">
                      <?php if ($gender=='1'){ 
                          echo "Laki-laki";
                        }elseif ($gender=='2') { 
                          echo "Perempuan";
                        }else{ 
                          echo "-"; 
                        } ?>
                    </p>
                  </div>
                  <div class="tab-pane" id="settings">
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
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama; ?>" placeholder="Nama">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">No. Telepon</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="telepon" id="telepon" value="<?php echo $telepon; ?>" placeholder="Telepon">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                          <select id="gender" name="gender" class="form-control">
                            <option value="">- Jenis Kelamin -</option>
                            <option value="1" <?php if($gender=='1'){ echo "selected";} ?> >Laki-laki</option>
                            <option value="2" <?php if($gender=='2'){ echo "selected";} ?>>Perempuan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div id="attention"></div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="button" class="btn btn-primary" id="btnedit">Ubah Profile</button>
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
<script src="<?php echo base_url(); ?>js/profil/ubahprofiladmin.js?v=1.0.1" type="text/javascript"></script>
</body>
</html>
