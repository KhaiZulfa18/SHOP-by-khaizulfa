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
              <li class="breadcrumb-item"><a href="#">Produk</a></li>
              <li class="breadcrumb-item active">Input Produk</li>
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
                <h3 class="card-title">Input Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form">
                <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control col-lg-8 col-md-12" id="nama_produk" name="nama_produk" placeholder="Nama Produk" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="">Kategori</label>
                    <select id="kategori" name="kategori" class="form-control col-lg-8 col-md-12">
                      <option value="">- Kategori -</option>
                      <?php foreach ($list_kategori as $data) { ?>
                        <option value="<?php echo $data->id_kategori; ?>"><?php echo $data->nama_ktg; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" class="form-control col-lg-8 col-md-12" id="harga" name="harga" placeholder="Harga" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="">Stok</label>
                    <input type="number" class="form-control col-lg-8 col-md-12" id="stok" name="stok" placeholder="Stok" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="">Catatan</label>
                    <textarea class="form-control col-lg-8 col-md-12" id="catatan" name="catatan" placeholder="Catatan" autocomplete="off"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <div class="col-lg-8 col-md-12">
                          <input type="file" class="custom-file-input" id="picture" name="picture">
                          <label class="custom-file-label" for="picture">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="text-muted">*Wajib Diisi</div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile2">Foto 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <div class="col-lg-8 col-md-12">
                          <input type="file" class="custom-file-input" id="picture2" name="picture2">
                          <label class="custom-file-label" for="picture2">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto 3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <div class="col-lg-8 col-md-12">
                          <input type="file" class="custom-file-input" id="picture3" name="picture3">
                          <label class="custom-file-label" for="picture3">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div id="attention"></div>
                  <button type="button" class="btn btn-lg btn-primary" name="btnsimpan" id="btnsimpan">Simpan</button>
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
<script src="<?php echo base_url(); ?>js/produk/input_produk.js?v=1.0.1" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
</body>
</html>