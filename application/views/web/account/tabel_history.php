<table class="table table-striped" style="table-layout: fixed; word-wrap: break-word;">
  <thead>
    <tr>
      <!-- <th class="text-center" style="width: 50px" scope="col">No.</th> -->
      <th class="text-center" style="width: 200px" scope="col">Waktu</th>
      <th class="text-center" style="width: 200px" scope="col">ID Invoice</th>
      <th class="text-center" style="width: 200px" scope="col">Penerima</th>
      <th class="text-center" style="width: 150px" scope="col">Total</th>
      <th class="text-center" style="width: 250px" scope="col">Alamat</th>
      <th class="text-center" style="width: 150px" scope="col">Status</th>
      <th class="text-center" style="width: 100px" scope="col">Aksi</th>
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
    <?php foreach ($list_checkout as $data) {
      $status = $data->status;
    ?>
    <tr>
      <!-- <td class="text-center" id="no"><?php echo $no; ?></td> -->
      <td class="text-center" id=""><?php echo $data->waktu; ?></td>
      <td class="text-center" id="id_admin"><?php echo $data->id_invoice; ?></td>
      <td class="text-left" id="nama"><?php echo $data->nama_penerima; ?></td>
      <td class="text-right" id=""><?php echo $data->total; ?></td>
      <td class="text-left" id=""><?php echo $data->alamat; ?></td>
      <td class="text-center" id="">
        <?php if ($status=='1') {
          echo "<span style='color: red;'>Diproses</span>";
        }elseif ($status=='2') {
          echo "<span style='color: green;'>Selesai</span>";
        }?>      
      </td>
      <td class="text-center">
        <div class="btn-group">
          <a href="<?php echo base_url('pdf/report/'.$data->id_invoice); ?>" class="btn btn-sm btn-info"><i class="fa fa-download"></i>&nbsp;PDF</a>
        </div>
      </td>
    </tr>
    <?php  $no++; } ?>
  </tbody>
</table>