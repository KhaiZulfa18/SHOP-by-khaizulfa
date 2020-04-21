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
            <!-- <?php $this->load->view('web/slider'); ?> -->
            <div class="breadcrumb-area pt-255 pb-170" style='background-color: rgba(255, 181, 47, 0.8);'>
                <div class="container-fluid">
                    <div class="breadcrumb-content text-center">
                        <h2>My Cart</h2>
                        <ul>
                            <li>
                                <a href="#">home</a>
                            </li>
                            <li>My cart</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="product-cart-area pt-120 pb-130">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-content table-responsive">
                                <table class="table" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px" class="product-name">No.</th>
                                            <th style="width: 200px" class="product-price">Nama Produk</th>
                                            <th style="width: 150px" class="product-name">Harga</th>
                                            <th style="width: 150px" class="product-price">QTY</th>
                                            <th style="width: 150px" class="product-quantity">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      $no = 1;
                                      $total = 0;
                                      $item = 0;
                                      foreach ($list_cart as $data) { 
                                        $jml_hrg = $data->harga*$data->qty; 
                                        ?>
                                        <tr>
                                            <td class="text-center product-price">
                                                <?php echo $no++; ?>
                                            </td>
                                            <td class="product-name">
                                                <?php echo $data->produk; ?>
                                            </td>
                                            <td class="text-left product-price"><span class="amount">Rp.<?php echo format_rupiah($data->harga); ?></span></td>
                                            <td class="product-quantity paginations text-center">                                              
                                              <?php echo $data->qty; ?>
                                            </td>
                                            <td class="text-left product-subtotal">Rp.<?php echo format_rupiah($jml_hrg); ?></td>
                                        </tr>
                                      <?php
                                        $total += $jml_hrg;
                                        $item += $data->qty; 
                                      } ?>
                                      <tr class="text-center">
                                        <td colspan="3">Jumlah Item & Total</td>
                                        <td class="text-center"><?php echo $item; ?></td>
                                        <td  class="text-left">Rp.<?php echo format_rupiah($total); ?></td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-7 col-md-12 col-12">
                            <form action="#" id="form_checkout">
                                <div class="checkbox-form">                     
                                    <h3>Billing Details</h3>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" placeholder="Nama Penerima" />
                                            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" id="telepon" name="telepon" placeholder="No. Telepon Aktif" />
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos" />
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select class="form-control" name="provinsi" id="provinsi">
                                                <option disabled="disabled" selected="selected">-- Pilih Provinsi --</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select class="form-control" name="kota" id="kota">
                                                <option selected="" disabled="">-- Pilih Kota --</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select class="form-control" name="courier" id="courier">
                                                <option value="jne">JNE</option>
                                                <option value="pos">POS</option>
                                                <option value="tiki">TIKI</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <textarea class="form-control" name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat Lengkap"></textarea>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <textarea class="form-control" name="catatan" id="catatan" placeholder="Catatan"></textarea>
                                            <label>*Warna/Ukuran/Tipe Produk</label>
                                        </div>
                                        <input type="hidden" name="totalbarang" id="totalbarang" value="<?php echo $total; ?>">
                                        <input type="hidden" name="jml_barang" id="jml_barang" value="<?php echo $item; ?>">
                                        <input type="hidden" name="txt_ongkir" id="txt_ongkir">      
                                        <input type="hidden" name="total" id="total">
                                    </div>                                          
                                </div>
                            </form>
                        </div>  
                        <div class="col-lg-5 col-md-12 col-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Detail</th>
                                                <th class="product-total">Total</th>
                                            </tr>                           
                                        </thead>
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="product-name text-left">
                                                    <span>Item</span> 
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount" id="total_brg"><?php echo format_rupiah($total); ?></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="product-name text-left">
                                                    <span>Ongkir</span> 
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount" id="txt-ongkir">0</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount" id="txt-total">0</span></strong>
                                                </td>
                                            </tr>                               
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method mt-40">
                                    <div class="payment-accordion">
                                        <h3>Metode Pembayaran</h3>
                                        <div class="your-order-table">
                                            <div class="form-group">
                                                <select class="form-control" id="bank" name="bank">
                                                    <?php 
                                                    $no=1;
                                                    foreach ($list_bank as $data ) { ?>
                                                    <option value="<?php echo $data->id_bank; ?>"><?php echo $data->nama_bank; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <p id="keterangan"> 
                                            </p>
                                        </div>
                                        <div class="order-button-payment text-right">
                                            <button class="btn-style cr-btn" id="btnpesan" name="btnpesan">Buat Pemesanan</button>
                                        </div>    
                                        <div class="mt-3">
                                            <div id="attention"></div> 
                                        </div>                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-shiping-update">
                                <div class="update-cart">
                                    <a class="btn-style cr-btn" href="<?php echo base_url('cart/mycart'); ?>">
                                        <i class='fa fa-arrow-left'>&nbsp;</i><span>BACK</span>
                                    </a>
                                </div>
                            </div>
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
    <script type="text/javascript">
      $(document).ready(function(){
        list_provinsi();
        //cek_total();
      });

      function list_provinsi(){
        var base_url = "<?php echo base_url(); ?>";

        $.ajax({
          type: 'POST',
          url: base_url+'pembayaran/get_province',
          success: function(response) {
            $('#provinsi').html(response);
          }
        }); 
      }

      $('#provinsi').change(function(){
        list_kota();
      });

      function list_kota(){
        var base_url = "<?php echo base_url(); ?>";
        var provinsi = $('#provinsi').val();

        $.ajax({
          type: 'POST',
          url: base_url+'pembayaran/get_city',
          data : {
                  provinsi: provinsi
              },
              beforeSend: function (){
            $('#kota').prop("disabled", true);
              },
          success: function(response) {
            $('#kota').prop("disabled", false);
            $('#kota').html(response);
            $('#txt-ongkir').text("0");
          }
        }); 
      }

      $('#kota').change(function(){
        cek_ongkir();
      });

      $('#courier').change(function(){
        cek_ongkir();
      });

      function cek_ongkir(){
        var base_url = "<?php echo base_url(); ?>";
        var kota = $('#kota').val();
        var courier = $('#courier').val();

        var lanjut = true;

        if(kota.length==0){
          return false;
        }

        if(lanjut==true){
          $.ajax({
            type: 'POST',
            url: base_url+'pembayaran/get_cost',
            data : {
              kota: kota,
              courier: courier
            },
            beforeSend: function (){
              $('#txt-ongkir').text("0");
              $('#txt_ongkir').val();
            },
            success: function(response) {
              $('#txt-ongkir').text(response);
              $('#txt_ongkir').val(response);
              cek_total();
            }
          });
        } 
      }

      function cek_total(){
        var base_url = "<?php echo base_url(); ?>";
        var totalbarang = $('#totalbarang').val();
        var ongkir = $('#txt_ongkir').val();

        $.ajax({
          type: 'POST',
          url: base_url+'pembayaran/get_total',
          data : {
            totalbarang:totalbarang,
            ongkir:ongkir
          },
          beforeSend: function (){
            $('#txt-total').text("0");
            $('#total').val();
          },
          success: function(response) {
            $('#txt-total').text("Rp."+response);
            $('#total').val(response);
          }
        });
      }

      $('#bank').change(function(){
        cek_bank();
      });

      function cek_bank(){
        var base_url = "<?php echo base_url(); ?>";
        var id_bank = $('#bank').val();

        $.ajax({
          type: 'POST',
          url: base_url+'pembayaran/get_bank',
          data : {
            id_bank:id_bank
          },
          beforeSend: function (){
            $('#keterangan').text("");
          },
          success: function(response) {
            $('#keterangan').html(response);
          }
        });
      }
    </script>
    <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
    <script src="<?php echo base_url(); ?>js/checkout/checkout.js?v=1.0.9" type="text/javascript"></script>
    </body>
</html>
