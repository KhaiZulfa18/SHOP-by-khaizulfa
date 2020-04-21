<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url('images/shop_profil/'.$profiltoko->logo);?>" class="brand-image img-circle elevation-3"
           style="opacity: .8"  alt="<?php echo $profiltoko->nama; ?>" />
      <span class="brand-text font-weight-light"><?php echo $profiltoko->nama; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php if ($this->session->userdata('gender')=='1') {?>
          <img src="<?php echo base_url(); ?>images/user/001-businessman.png" alt="User Image" class="img-circle elevation-2">
          <?php } elseif ($this->session->userdata('gender')=='2') { ?>
          <img src="<?php echo base_url(); ?>images/user/004-manager.png" alt="User Image" class="img-circle elevation-2">
          <?php } ?>
        </div>
        <div class="info">
          <a href="<?php echo base_url('profile/myprofile');?>" class="d-block"><?php echo $this->session->userdata('namaadmin'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard/home')?>" class="nav-link <?php if($menu=='home'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($menu_induk=='admin'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($menu_induk=='admin'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('dashboard/data_admin')?>" class="nav-link <?php if($menu=='data_admin'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('dashboard/input_admin')?>" class="nav-link <?php if($menu=='input_admin'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Admin</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($menu_induk=='user'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($menu_induk=='user'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('dashboard/data_user')?>" class="nav-link <?php if($menu=='data_user'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('dashboard/input_user')?>" class="nav-link <?php if($menu=='input_user'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($menu_induk=='produk'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($menu_induk=='produk'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Produk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('dashboard/data_produk')?>" class="nav-link <?php if($menu=='data_produk'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('dashboard/input_produk')?>" class="nav-link <?php if($menu=='input_produk'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Produk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($menu_induk=='kategori'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($menu_induk=='kategori'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Kategori
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('dashboard/data_kategori')?>" class="nav-link <?php if($menu=='data_kategori'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('dashboard/input_kategori')?>" class="nav-link <?php if($menu=='input_kategori'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Kategori</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($menu_induk=='checkout'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($menu_induk=='checkout'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Checkout
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('dashboard/data_checkout')?>" class="nav-link <?php if($menu=='data_checkout'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Chekcout</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($menu_induk=='penjualan'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($menu_induk=='penjualan'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Penjualan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('dashboard/data_penjualan')?>" class="nav-link <?php if($menu=='data_penjualan'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Penjualan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($menu_induk=='notifikasi'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($menu_induk=='notifikasi'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Notifikasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('tools/data_pesan')?>" class="nav-link <?php if($menu=='pesan'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pesan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($menu_induk=='settings'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($menu_induk=='settings'){ echo 'active'; } ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('tools/shop_profil')?>" class="nav-link <?php if($menu=='shop_profil'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil Toko</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('tools/metode_pembayaran')?>" class="nav-link <?php if($menu=='metode_pembayaran'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Metode Pembayaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('tools/data_slider')?>" class="nav-link <?php if($menu=='data_slider'){ echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Logout</li>
          <li class="nav-item">
            <a href="<?php echo base_url('loginuser/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>