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
              <li class="breadcrumb-item"><a href="#">Checkout</a></li>
              <li class="breadcrumb-item active">Data Checkout</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="header-title">Data <?php echo $title; ?></h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group col-md-12 input-group">

                  <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">

                  <div class="col-md-6">
                    <select id="status" name="status" class="form-control">
                      <option value="1">Menunggu Pembayaran</option>
                      <option value="2">Selesai</option>
                      <option value="">Semua</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <input type="text" class="form-control" id="cari" name="cari" placeholder="Search">
                  </div>
                </div>
                <hr>
                <div class="table-responsive" id="tabel-data"></div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <div class="row" id="paging"></div>
              </div>
            </div>
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
    <!-- <div id="modal_invoice"></div> -->
    <div class="modal fade" id="modal_invoice" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="result_modal"></div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-info" id="btnprint"><i class="fa fa-print"></i>&nbsp;Print</button> 
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal" id="btntidak">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="hapus-modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" id="id" name="id">
              <input type="hidden" id="pageno" name="pageno">
              <div id="hapus-teks"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal" id="btntidak">Batal</button>
              <button type="button" class="btn btn-outline-light" id="btnhapus">Yakin</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="change-modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Pembayaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" id="id_ch" name="id_ch">
              <input type="hidden" id="status_ch" name="status_ch">
              <input type="hidden" id="pageno_ch" name="pageno">
              <div id="change-teks"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal" id="btntidak">Batal</button>
              <button type="button" class="btn btn-outline-light" id="btnchange">Yakin</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

</div>
<!-- ./wrapper -->
<?php
  $this->load->View('dashboard/script'); 
?>
<script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
<script src="<?php echo base_url(); ?>js/konfirmasi/data_konfirmasi.js?v=1.0.2" type="text/javascript"></script>

<script type="text/javascript">
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
</body>
</html>