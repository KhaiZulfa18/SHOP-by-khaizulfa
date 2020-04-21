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
              <li class="breadcrumb-item"><a href="#">Kategori</a></li>
              <li class="breadcrumb-item active">Input Kategori</li>
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
                <h3 class="card-title">Input Metode Pembayaran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form">
                <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama Bank</label>
                    <input type="text" class="form-control col-8" id="nama_bank" name="nama_bank" placeholder="Nama Bank" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="nama">Atas Nama</label>
                    <input type="text" class="form-control col-8" id="atas_nama" name="atas_nama" placeholder="Atas Nama" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="nama">No. Rekening</label>
                    <input type="number" class="form-control col-8" id="no_rek" name="no_rek" placeholder="No. Rekening" autocomplete="off">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div id="attention"></div>
                  <?php if ($this->session->userdata('level')=='2') { ?>
                    <button type="button" class="btn btn-lg btn-primary" name="btnsimpan" id="btnsimpan">Simpan</button>  
                  <?php }else{ ?>
                    <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#warning">Simpan</button>
                  <?php } ?>
                  <button type="button" class="btn btn-lg btn-success" name="btnback" id="btnback">Kembali</button>
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
<script src="<?php echo base_url(); ?>js/bank/input_bank.js?v=1.0.3" type="text/javascript"></script>
</body>
</html>