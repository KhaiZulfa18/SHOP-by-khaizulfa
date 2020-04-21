<table class="table table-bordered table-striped table-hover" style="table-layout: fixed; word-wrap: break-word;" >
  <thead>                  
    <tr>
      <th class="text-center" style="width: 50px">No</th>
      <th class="text-center" style="width: 200px">ID Invoice</th>
      <th class="text-center" style="width: 150px">Total</th>
      <th class="text-center" style="width: 200px">Nama Pengirim</th>
      <th class="text-center" style="width: 150px">Nominal</th>
      <th class="text-center" style="width: 150px">Bank</th>
      <th class="text-center" style="width: 200px">Bukti Pembayaran</th>
      <th class="text-center" style="width: 150px">Status</th>
      <th class="text-center" style="width: 150px">Aksi</th>
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
  <?php foreach ($list_konfirmasi as $data) {
    $status = $data->status_chk;
  ?>
    <tr>
      <td class="text-center" id="no"><?php echo $no; ?></td>
      <td class="text-center" id=""><?php echo $data->id_invoice; ?></td>
      <td class="text-right" id=""><?php echo $data->total; ?></td>
      <td class="text-left" id=""><?php echo $data->nama_pengirim; ?></td>
      <td class="text-right" id=""><?php echo $data->nominal; ?></td>
      <td class="text-center" id=""><?php echo $data->bank; ?></td>
      <td class="text-center" id="">
        <?php 
        $txtgambar = (!empty($data->foto)) ? '<a href="'.base_url().'images/konfirmasi/'.$data->foto.'" data-toggle="lightbox" data-title="'.$data->id_invoice.'">
          <img src="'.base_url().'images/konfirmasi/'.$data->foto.'" width="100px" height="100px">
          </a>' : '-';
        echo $txtgambar;
        ?>
      </td>
      <td class="text-center" id="status">
        <?php if ($status=='1') {
          echo "<span style='color: red;'>Belum Dikonfirmasi</span>";
        }elseif ($status=='2') {
          echo "<span style='color: green;'>Selesai</span>";
        }?>
      </td>
      <td class="text-center" id="aksi">
        <div class="btn-group">
            <button class="btn btn-sm btn-info" onClick="confirm('<?php echo $data->id_invoice; ?>','<?php echo $noPage; ?>','<?php echo $status; ?>')" id='confirm'>
              <?php if ($status==2) {
                echo  '<i class="fa fa-check bigger-120"></i>';
              }else{
                echo '<i class="fas fa-exchange-alt bigger-120"></i>';
              } ?>
            </button>
        </div>
        <div class="btn-group">
            <button class="btn btn-sm btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>','<?php echo $data->nama_pengirim; ?>')" id='hapus'><i class="fas fa-trash bigger-120"></i></button>
        </div>
      </td>
    </tr>
  <?php $no++; } ?>
  </tbody>
</table>