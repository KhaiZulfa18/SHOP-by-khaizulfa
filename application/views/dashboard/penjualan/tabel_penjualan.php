<table class="table table-bordered table-striped table-hover" style="table-layout: fixed; word-wrap: break-word;" >
  <thead>                  
    <tr>
      <th class="text-center" style="width: 50px">No</th>
      <th class="text-center" style="width: 200px">ID Invoice</th>
      <th class="text-center" style="width: 150px">Total</th>
      <th class="text-center" style="width: 150px">Tanggal Penjualan</th>
      <th class="text-center" style="width: 100px">Aksi</th>
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
  <?php foreach ($list_penjualan as $data) {
  ?>
    <tr>
      <td class="text-center" id="no"><?php echo $no; ?></td>
      <td class="text-center" id=""><?php echo $data->id_invoice; ?></td>
      <td class="text-right" id=""><?php echo $data->total; ?></td>
      <td class="text-right" id=""><?php echo format_tanggal($data->tgl_penjualan); ?></td>
      <td class="text-center" id="aksi">
        <div class="btn-group">
            <div class="btn-group">
              <button class="btn btn-sm btn-info" onClick="lihat('<?php echo $data->id_invoice; ?>')" id='btnlihat'>
                <i class="fas fa-eye bigger-120"></i>&nbsp;Lihat
              </button>
          </div>
        </div>
      </td>
    </tr>
  <?php $no++; } ?>
  </tbody>
</table>