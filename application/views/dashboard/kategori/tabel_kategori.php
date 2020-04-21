  <table class="table table-bordered table-striped table-hover" style="table-layout: fixed; word-wrap: break-word;" >
    <thead>                  
      <tr>
        <th class="text-center" style="width: 50px">No</th>
        <th class="text-center" style="width: 150px">Kategori ID</th>
        <th class="text-center" style="width: 150px">Nama</th>
        <th class="text-center" style="width: 150px">URL</th>
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
    <?php foreach ($list_kategori as $data) {
      $status = $data->status;
    ?>
      <tr>
        <td class="text-center" id="no"><?php echo $no; ?></td>
        <td class="text-center" id="id_admin"><?php echo $data->id_kategori; ?></td>
        <td class="text-left" id="nama_ktg"><?php echo $data->nama_ktg; ?></td>
        <td class="text-left" id="url_ktg"><?php echo $data->url_ktg; ?></td>
        <td class="text-center" id="status">
          <?php if ($status=='1') {
            echo "Aktif";
          }elseif ($status=='2') {
            echo "Non-Aktif";
          }?>
        </td>
        <td class="text-center" id="aksi">
          <div class="btn-group">
              <button class="btn btn-sm btn-success" onClick="change('<?php echo $data->id; ?>','<?php echo $noPage; ?>','<?php echo $status; ?>')" id='change'>
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
            <a href="<?php echo base_url('dashboard/edit_kategori/'.$data->id_kategori); ?>">
              <button class="btn btn-sm btn-primary" id='edit'><i class="fas fa-edit bigger-120"></i>&nbsp;Ubah</button>
            </a>
          </div>
          <div class="btn-group">
              <button class="btn btn-sm btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>','<?php echo $data->nama_ktg; ?>')" id='hapus'><i class="fas fa-trash bigger-120"></i>&nbsp;Hapus</button>
          </div>
        </td>
      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>