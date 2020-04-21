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
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active">Input User</li>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Input User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form">
                <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control col-8" id="nama" name="nama" placeholder="Nama" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control col-8" id="username" name="username" placeholder="Username" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control col-8" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control col-8" id="email" name="email" placeholder="Email" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input type="number" class="form-control col-8" id="telepon" name="telepon" placeholder="Telepon" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select id="gender" name="gender" class="form-control col-8">
                      <option value="">- Jenis Kelamin -</option>
                      <option value="1">Laki-laki</option>
                      <option value="2">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea class="form-control col-8" id="alamat" name="alamat" placeholder="Alamat" autocomplete="off"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <div class="col-8">
                          <input type="file" class="custom-file-input" id="picture" name="picture">
                          <label class="custom-file-label" for="foto">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div id="attention"></div>
                  <button type="button" class="btn btn-lg btn-primary" name="btnsimpan" id="btnsimpan">Simpan</button>
                  <button type="button" class="btn btn-lg btn-primary" name="btnclear" id="btnclear">Reset</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
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
<script src="<?php echo base_url(); ?>js/user/input_user.js?v=1.0.5" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
</body>
</html>