<table class="table table-bordered table-striped table-hover" style="table-layout: fixed; word-wrap: break-word;" >
  <thead>                  
    <tr>
      <th class="text-center" style="width: 50px">No</th>
      <th class="text-center" style="width: 150px">Bank ID</th>
      <th class="text-center" style="width: 150px">Nama</th>
      <th class="text-center" style="width: 150px">Atas Nama</th>
      <th class="text-center" style="width: 150px">No. Rekening</th>
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
  <?php foreach ($list_bank as $data) {
    $status = $data->status;
  ?>
    <tr>
      <td class="text-center" id="no"><?php echo $no; ?></td>
      <td class="text-center" id="id_admin"><?php echo $data->id_bank; ?></td>
      <td class="text-left" id="nama_ktg"><?php echo $data->nama_bank; ?></td>
      <td class="text-left" id="atas_nama"><?php echo $data->atas_nama; ?></td>
      <td class="text-left" id="no_rek"><?php echo $data->no_rekening; ?></td>
      <td class="text-center" id="status">
        <?php if ($status=='1') {
          echo "Aktif";
        }elseif ($status=='2') {
          echo "Non-Aktif";
        }?>
      </td>
      <td class="text-center" id="aksi">
        <div class="btn-group">
            <button class="btn btn-sm btn-<?php if($status==1){echo "success";}elseif($status==2){echo "danger";} ?>" onClick="change('<?php echo $data->id; ?>','<?php echo $noPage; ?>','<?php echo $status; ?>')" id='change'>
              <i class="fas fa-exchange-alt bigger-120"></i>
            </button>
        </div>
        <?php if ($this->session->userdata('level')=='2') { ?>
          <div class="btn-group">
          <a href="<?php echo base_url('tools/edit_metodepembayaran/'.$data->id_bank); ?>">
            <button class="btn btn-sm btn-primary" id='edit'><i class="fas fa-edit bigger-120"></i></button>
          </a>
        </div>
        <div class="btn-group">
            <button class="btn btn-sm btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>','<?php echo $data->nama_bank; ?>')" id='hapus'><i class="fas fa-trash bigger-120"></i></button>
        </div>
        <?php } ?>
      </td>
    </tr>
  <?php $no++; } ?>
  </tbody>
</table>