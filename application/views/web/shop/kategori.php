<div class="grid-list-product-wrapper tab-content">
    <div id="new-product" class="product-grid product-view tab-pane active">
        <div class="row">
        <?php 
        if (!empty($list_produk)) {
            foreach ($list_produk as $data) { ?>
                <div class="product-width col-md-6 col-xl-4 col-lg-6">
                    <div class="product-wrapper mb-35">
                        <div class="product-img">
                            <a href="<?php echo base_url('shop/produk/'.$data->url); ?>">
                                <?php 
                                $txtgambar = (!empty($data->picture)) ? '<img src="'.base_url().'images/produk/'.$data->picture.'" class="img-fluid">' : '-';
                                echo $txtgambar;
                                ?>
                            </a>
                            <div class="product-action" style="background: rgba(0, 0, 0, 0.6);">
                                <form  method="post" action="<?php echo base_url('cart/add_to_cart') ?>">
                                    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                                    <input type="hidden" name="cart_qty" id="cart_qty" value="1">
                                    <input type="hidden" name="cart_id_produk" id="cart_id_produk" value="<?php echo $data->id_produk; ?>">
                                    <?php if (!empty($this->session->userdata('id_user'))) { ?>
                                    <button type="submit" class="btn btn-md btn-warning rounded">
                                        <i class="ti-shopping-cart"></i>
                                    </button>
                                <?php }else{ ?>
                                    <button type="button" class="btn btn-md btn-warning rounded" data-toggle="modal" data-target="#warning">
                                        <i class="ti-shopping-cart"></i>
                                    </button>
                                <?php } ?>
                                </form>
                            </div>
                            <div class="product-content-wrapper" style="background: rgba(0, 0, 0, 0.6);">
                                <div class="product-title-spreed">
                                    <h4 style="color: #ffffff"><?php echo $data->nama_produk; ?></h4>
                                </div>
                                <div class="product-price">
                                    <span style="color: #ffb52f;">Rp.<?php echo format_rupiah($data->harga); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="product-list-details">
                            <h2><a href="<?php echo base_url('shop/produk/'.$data->url); ?>"><?php echo $data->nama_produk; ?></a></h2>
                            <div class="product-price">
                                <span>Rp.<?php echo format_rupiah($data->harga); ?></span>
                            </div>
                            <p><?php echo $data->catatan; ?></p>
                            <div class="shop-list-cart">
                                <form  method="post" action="<?php echo base_url('cart/add_to_cart') ?>">
                                    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                                    <input type="hidden" name="cart_qty" id="cart_qty" value="1">
                                    <input type="hidden" name="cart_id_produk" id="cart_id_produk" value="<?php echo $data->id_produk; ?>">
                                    <?php if (!empty($this->session->userdata('id_user'))) { ?>
                                    <button type="submit" class="btn-style cr-btn rounded">
                                        <i class="ti-shopping-cart"></i>Add to cart
                                    </button>
                                    <?php }else{ ?>
                                    <button type="button" class="btn-style cr-btn rounded" data-toggle="modal" data-target="#warning">
                                        <i class="ti-shopping-cart"></i>Add to cart
                                    </button>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } 
            }else{ ?>
                <div class="col-12 text-center">
                    <h3>Aduh, produk yang kamu cari tidak tersedia :(</h3>
                </div>
            <?php } ?>
        </div>
    </div>
</div>