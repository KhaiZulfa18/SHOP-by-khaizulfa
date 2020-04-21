<table class="table table-bordered table-striped table-hover" style="table-layout: fixed; word-wrap: break-word;" >
  <thead>                  
    <tr>
      <th class="text-center" style="width: 75px">No</th>
      <th class="text-center" style="width: 200px">Nama</th>
      <th class="text-center" style="width: 250px">Email</th>
      <th class="text-center" style="width: 200px">Subjek</th>
      <th class="text-center" style="width: 300px">Pesan</th>
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
  <?php foreach ($list_pesan as $data) {
  ?>
    <tr>
      <td class="text-center" id="no"><?php echo $no; ?></td>
      <td class="text-left" id="nama"><?php echo $data->nama; ?></td>
      <td class="text-left" id="email"><?php echo $data->email; ?></td>
      <td class="text-left" id="subjek"><?php echo $data->subjek; ?></td>
      <td class="text-left" id="pesan"><?php echo $data->pesan; ?></td>
      <td class="text-center" id="aksi">
        <div class="btn-group">
            <button class="btn btn-sm btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>','<?php echo $data->nama; ?>')" id='hapus'><i class="fas fa-trash bigger-120"></i></button>
        </div>
      </td>
    </tr>
  <?php $no++; } ?>
  </tbody>
</table>