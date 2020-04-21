<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('dashboard/index') ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('shop/index') ?>" target="_blank" class="nav-link">Web</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto mr-4">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">
            <?php if (!empty($notifikasi)) {
              echo $notifikasi;
            }else{
              echo "0";
            } ?>    
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">
            <?php if (!empty($notifikasi)) {
              echo $notifikasi;
            }else{
              echo "0";
            } ?> Notifications
          </span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('dashboard/konfirmasi_pembayaran') ?>" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Konfirmasi Pembayaran
            <span class="float-right text-muted">
              <?php if (!empty($notifikasi)) {
                echo $notifikasi;
              }else{
                echo "0";
              } ?>
            </span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">@khaiz.18_</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
