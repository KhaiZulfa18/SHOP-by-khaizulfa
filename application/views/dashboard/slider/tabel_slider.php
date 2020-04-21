  <table class="table table-bordered table-striped table-hover" style="table-layout: fixed; word-wrap: break-word;" >
    <thead>                  
      <tr>
        <th class="text-center" style="width: 50px">No</th>
        <th class="text-center" style="width: 200px">Text 1</th>
        <th class="text-center" style="width: 200px">Text 2</th>
        <th class="text-center" style="width: 200px">Foto</th>
        <th class="text-center" style="width: 200px">Status</th>
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
    <?php foreach ($list_slider as $data) {
      $status = $data->status;
    ?>
      <tr>
        <td class="text-center" id="no"><?php echo $no; ?></td>
        <td class="text-center" id="text1"><?php echo $data->text1; ?></td>
        <td class="text-left" id="text2"><?php echo $data->text2; ?></td>
        <td class="text-center" id="foto">
          <?php 
            $txtgambar = (!empty($data->picture)) ? '<img src="'.base_url().'images/slider/'.$data->picture.'" width="200px" height="">' : '-';
            echo $txtgambar;
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
              <button class="btn btn-sm btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>','<?php echo $data->text1; ?>')" id='hapus'><i class="fas fa-trash bigger-120"></i>&nbsp;Hapus</button>
          </div>
        </td>
      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>