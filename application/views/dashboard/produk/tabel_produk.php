  <table class="table table-bordered table-striped table-hover" style="table-layout: fixed; word-wrap: break-word;" >
    <thead>                  
      <tr>
        <th class="text-center" style="width: 50px">No</th>
        <th class="text-center" style="width: 100px">Item ID</th>
        <th class="text-center" style="width: 200px">Nama</th>
        <th class="text-center" style="width: 150px">Kategori</th>
        <th class="text-center" style="width: 100px">Harga</th>
        <th class="text-center" style="width: 100px">Stok</th>
        <th class="text-center" style="width: 250px">Catatan</th>
        <th class="text-center" style="width: 150px">URL</th>
        <th class="text-center" style="width: 200px">Foto 1</th>
        <th class="text-center" style="width: 200px">Foto 2</th>
        <th class="text-center" style="width: 200px">Foto 3</th>
        <th class="text-center" style="width: 150px">Status</th>
        <th class="text-center" style="width: 300px">Aksi</th>
      </tr>
    </thead>  
    <?php
      if($noPage==1){
        $no = 1;
      } else {
        $no = $offset+1;
      }
    ?>
    <tbody>
    <?php foreach ($list_produk as $data) {
      $status = $data->status;
    ?>
      <tr>
        <td class="text-center" id="no"><?php echo $no; ?></td>
        <td class="text-center" id="id_produk"><?php echo $data->id_produk; ?></td>
        <td class="text-center" id="nama_produk"><?php echo $data->nama_produk; ?></td>
        <td class="text-center" id="id_kategori"><?php echo $data->kategori; ?></td>
        <td class="text-right" id="harga"><?php echo format_rupiah($data->harga); ?></td>
        <td class="text-right" id="stok"><?php echo $data->stok; ?></td>
        <td class="text-left" id="catatan">
          <?php 
            $catatan =  $data->catatan; 
            $txtcatatan = word_limiter($catatan,20);
            echo $txtcatatan;
          ?>
        </td>
        <td class="text-left" id="url_ktg"><?php echo $data->url; ?></td>
        <td class="text-center" id="foto1">
          <?php 
            $txtgambar = (!empty($data->picture)) ? '<img src="'.base_url().'images/produk/'.$data->picture.'" width="100px" height="100px">' : '-';
            echo $txtgambar;
          ?>
        </td>
        <td class="text-center" id="foto2">
          <?php 
            $txtgambar2 = (!empty($data->picture_2)) ? '<img src="'.base_url().'images/produk/'.$data->picture_2.'" width="100px" height="100px">' : '-';
            echo $txtgambar2;
          ?>
        </td>
        <td class="text-center" id="foto3">
          <?php 
            $txtgambar3 = (!empty($data->picture_3)) ? '<img src="'.base_url().'images/produk/'.$data->picture_3.'" width="100px" height="100px">' : '-';
            echo $txtgambar3;
          ?>
        </td>
        <td class="text-center" id="status">
          <?php if ($status=='1') {
            echo "Aktif";
          }elseif ($status=='2') {
            echo "Non-Aktif";
          }?>
        </td>
        <td class="text-center" id="aksi">
          <div class="btn-group">
              <button class="btn btn-sm btn-success" onClick="change('<?php echo $data->id_produk; ?>','<?php echo $noPage; ?>','<?php echo $status; ?>')" id='change'>
                <i class="fas fa-exchange-alt bigger-120"></i>&nbsp;
                <?php 
                  if ($status==1) {
                    echo "Non-Aktifkan";
                  }elseif ($status==2) {
                    echo "Aktifkan";
                  }
                ?>
              </button>
          </div>
          <div class="btn-group">
            <a href="<?php echo base_url('dashboard/edit_produk/'.$data->id_produk); ?>">
              <button class="btn btn-sm btn-primary" id='edit'><i class="fas fa-edit bigger-120"></i>&nbsp;Ubah</button>
            </a>
          </div>
          <div class="btn-group">
              <button class="btn btn-sm btn-danger" onClick="hapus('<?php echo $data->id_produk; ?>','<?php echo $noPage; ?>','<?php echo $data->nama_produk; ?>')" id='hapus'><i class="fas fa-trash bigger-120"></i>&nbsp;Hapus</button>
          </div>
        </td>
      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>