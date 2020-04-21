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
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Home</li>
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jml_user; ?></h3>
                <p>User</p>
              </div>
              <div class="icon">
                <i class="icon fa fa-users"></i>
              </div>
              <a href="<?php echo base_url('dashboard/data_user'); ?>" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jml_produk; ?></h3>
                <p>Produk</p>
              </div>
              <div class="icon">
                <i class="fa fa-tags"></i>
              </div>
              <a href="<?php echo base_url('dashboard/data_produk'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Rp.<?php echo format_rupiah($jml_pendapatan); ?></h3>

                <p>Pendapatan</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
              </div>
              <a href="<?php echo base_url('dashboard/data_penjualan'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?php echo $jml_penjualan; ?></h3>

                <p>Penjualan</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-bag"></i>
              </div>
              <a href="<?php echo base_url('dashboard/data_penjualan'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
        </div>

        <!-- <div class="row"> -->
          <!-- solid sales graph -->
          <div class="card bg-gradient-success">
            <div class="card-header border-0">
              <h3 class="card-title">
                <i class="fa fa-th mr-1"></i>
                Grafik Penjualan
              </h3>

              <div class="card-tools">
                <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>  
                </button>
              </div>
            </div>
            <div class="card-body">
              <canvas class="chart" id="line-chart" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
            </div>
            <input type="hidden" name="jan" id="jan" value="<?php echo $januari; ?>"> 
            <input type="hidden" name="feb" id="feb" value="<?php echo $februari; ?>"> 
            <input type="hidden" name="mar" id="mar" value="<?php echo $maret; ?>"> 
            <input type="hidden" name="apr" id="apr" value="<?php echo $april; ?>"> 
            <input type="hidden" name="mei" id="mei" value="<?php echo $mei; ?>"> 
            <input type="hidden" name="jun" id="jun" value="<?php echo $juni; ?>"> 
            <input type="hidden" name="jul" id="jul" value="<?php echo $juli; ?>"> 
            <input type="hidden" name="agu" id="agu" value="<?php echo $agustus; ?>"> 
            <input type="hidden" name="sep" id="sep" value="<?php echo $september; ?>"> 
            <input type="hidden" name="okt" id="okt" value="<?php echo $oktober; ?>"> 
            <input type="hidden" name="nov" id="nov" value="<?php echo $november; ?>"> 
            <input type="hidden" name="des" id="des" value="<?php echo $desember; ?>"> 
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        <!-- </div> -->
        
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
<script src="<?php echo base_url(); ?>js/chart/chart_home.js?v=1.0.1" type="text/javascript"></script>

</body>
</html>
