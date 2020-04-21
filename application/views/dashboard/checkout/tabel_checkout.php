  <table class="table table-bordered table-striped table-hover" style="table-layout: fixed; word-wrap: break-word;" >
    <thead>                  
      <tr>
        <th class="text-center" style="width: 50px">No</th>
        <th class="text-center" style="width: 200px">ID Invoice</th>
        <th class="text-center" style="width: 200px">Nama Pemesan</th>
        <th class="text-center" style="width: 150px">Total</th>
        <th class="text-center" style="width: 150px">Ongkir</th>
        <th class="text-center" style="width: 150px">Total Bayar</th>
        <th class="text-center" style="width: 100px">Bank</th>
        <th class="text-center" style="width: 100px">Kurir</th>
        <th class="text-center" style="width: 300px">Penerima</th>
        <th class="text-center" style="width: 300px">Catatan</th>
        <th class="text-center" style="width: 150px">Status</th>
        <th class="text-center" style="width: 200px">Aksi</th>
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
        <td class="text-center" id="no"><?php echo $no; ?></td>
        <td class="text-center" id="id_admin"><?php echo $data->id_invoice; ?></td>
        <td class="text-left" id="nama"><?php echo $data->nama; ?></td>
        <td class="text-right" id=""><?php echo $data->total_barang; ?></td>
        <td class="text-right" id=""><?php echo $data->ongkir; ?></td>
        <td class="text-right" id=""><?php echo $data->total; ?></td>
        <td class="text-center" id=""><?php echo $data->bank; ?></td>
        <td class="text-center" id=""><?php echo strtoupper($data->kurir); ?></td>
        <td class="text-left" id="">
          <?php 
            $alamat = $data->alamat;
            $nama_penerima = $data->nama_penerima;
            $txtalamat = $nama_penerima.', '.$alamat;
            echo $txtalamat;
          ?>  
          </td>
        <td class="text-left" id=""><?php echo $data->catatan; ?></td>
        <td class="text-center" id="status">
          <?php if ($status=='1') {
            echo "<span style='color: red;'>Menunggu Pembayaran</span>";
          }elseif ($status=='2') {
            echo "<span style='color: green;'>Selesai</span>";
          }?>
        </td>
        <td class="text-center" id="aksi">
          <div class="btn-group">
              <button class="btn btn-sm btn-info" onClick="lihat('<?php echo $data->id_checkout; ?>','<?php echo $data->id_invoice; ?>')" id='btnlihat'>
                <i class="fas fa-eye bigger-120"></i>
              </button>
          </div>
          <div class="btn-group">
            <a href="<?php echo base_url('dashboard/invoice/'.$data->id_invoice); ?>" class="btn btn-sm btn-info" target="_blank"><i class="fa fa-file-pdf"></i></a>
          </div>
          <div class="btn-group">
            <a href="<?php echo base_url('pdf/report/'.$data->id_invoice); ?>" class="btn btn-sm btn-info"><i class="fa fa-download"></i></a>
          </div>
          <div class="btn-group">
            <?php if ($status==1) { ?>
              <button class="btn btn-sm btn-info" onClick="confirm('<?php echo $data->id_invoice; ?>','<?php echo $noPage; ?>','<?php echo $status; ?>')" id='confirm'>
                <i class="fa fa-exchange-alt"></i>
            </button>
            <?php }elseif ($status==2) { ?>
              <button class="btn btn-sm btn-success" id='confirm'>
              <i class="fa fa-check bigger-120"></i>
            </button>
            <?php } ?>
          </div>
          <div class="btn-group">
              <button class="btn btn-sm btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>','<?php echo $data->id_invoice; ?>')" id='hapus'><i class="fas fa-trash bigger-120"></i></button>
          </div>
        </td>
      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>