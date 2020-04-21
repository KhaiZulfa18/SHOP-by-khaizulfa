<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Header -->
        <?php $this->load->view('web/header'); ?>
    </head>
    <body>
        <div class="wrapper">
            <!-- header start -->
            <header>
                <!-- Navbar -->
                <?php $this->load->view('web/navbar'); ?>
            </header>
            <!-- Slider -->
            <?php $this->load->view('web/slider'); ?>

            <div class="shop-wrapper fluid-padding-2 pt-120 pb-150">
                <div class="container-fluid">
                  <div class="section-title section-fluid text-center mb-60">
                    <h2>KATALOG</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipic it</p>
                  </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="product-sidebar-area pr-60">
                          <div class="sidebar-widget pb-55">
                            <h3 class="sidebar-widget">Search Products</h3>
                            <div class="sidebar-search">  
                              <input type="text" id="cari" class="cari" placeholder="Search Products...">
                              <input type="hidden" id="base_url" class="base_url" value="<?php echo base_url(); ?>">
                            </div>
                          </div>
                          <div class="sidebar-widget pb-50">
                            <h3 class="sidebar-widget">Kategori</h3>
                            <div class="widget-categories">
                              <select id="kategori" name="kategori" class="">
                                <option value="">- Kategori -</option>
                                <?php foreach ($datakategori as $data) { ?>
                                  <option value="<?php echo $data->id_kategori; ?>"><?php echo $data->nama_ktg; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="sidebar-widget mb-45">
                            <h3 class="sidebar-widget">Urutkan Berdasarkan</h3>
                            <div class="widget-categories">
                              <select id="sortby" name="sortby" class="">
                                <option value="">- Urutkan Berdasarkan -</option>
                                <option value="nama_asc">Nama A-Z</option>
                                <option value="nama_desc">Nama Z-A</option>
                                <option value="harga_asc">Harga Termurah</option>
                                <option value="harga_desc">Harga Termahal</option>
                                <option value="waktu_asc">Terbaru</option>
                                <option value="waktu_desc">Terlama</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-9">
                          <div class="shop-topbar-wrapper">
                              <div class="grid-list-options">
                                  <ul class="view-mode">
                                      <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ti-layout-grid2"></i></a></li>
                                      <li><a href="#product-list" data-view="product-list"><i class="ti-view-list"></i></a></li>
                                  </ul>
                              </div>
                              <div class="product-sorting">
                                  <div class="shop-product-sorting nav">
                                      <a class="active" data-toggle="tab" href="#new-product">KATALOG</a>
                                  </div>
                              </div>
                          </div>
                          <div id="tabel-data"></div>
                          <div id="paging"></div>
                      </div>
                    </div>
                </div>
            </div>

            <footer>
                <!-- Footer -->
                <?php $this->load->view('web/footer'); ?>
            </footer>
        <!-- Javascript -->
    <?php $this->load->view('web/js-script'); ?>
    <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
    <script src="<?php echo base_url(); ?>js/shop/datakatalog.js?v=1.0.3" type="text/javascript"></script>
    </body>
</html>
