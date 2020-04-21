  <table class="table table-bordered table-striped table-hover" style="table-layout: fixed; word-wrap: break-word;" >
    <thead>                  
      <tr>
        <th class="text-center" style="width: 50px">No</th>
        <th class="text-center" style="width: 100px">User ID</th>
        <th class="text-center" style="width: 200px">Nama</th>
        <th class="text-center" style="width: 200px">Username</th>
        <th class="text-center" style="width: 250px">Email</th>
        <th class="text-center" style="width: 150px">No. Telepon</th>
        <th class="text-center" style="width: 150px">Jenis Kelamin</th>
        <th class="text-center" style="width: 200px">Alamat</th>
        <th class="text-center" style="width: 200px">Foto</th>
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
    <?php foreach ($list_user as $data) {
      $gender = $data->gender;
    ?>
      <tr>
        <td class="text-center" id="no"><?php echo $no; ?></td>
        <td class="text-center" id="id_admin"><?php echo $data->id_user; ?></td>
        <td class="text-left" id="nama"><?php echo $data->nama; ?></td>
        <td class="text-left" id="username"><?php echo $data->username; ?></td>
        <td class="text-left" id="email"><?php echo $data->email; ?></td>
        <td class="text-left" id="telepon"><?php echo $data->telepon; ?></td>
        <td class="text-center" id="telepon"><?php if ($gender=='1'){ echo "Laki-laki&nbsp;<i class='fas fa-mars'></i>";}elseif ($gender=='2') { echo "Perempuan&nbsp;<i class='fas fa-venus'></i>";}else{ echo "-"; } ?>
        </td>
        <td class="text-left" id="telepon"><?php echo $data->alamat; ?></td>
        <td class="text-center" id="foto">
          <?php 
            $txtgambar = (!empty($data->foto)) ? '<img src="'.base_url().'images/profil_pic/'.$data->foto.'" width="100px" height="100px">' : '-';
            echo $txtgambar;
          ?>
        </td>
        <td class="text-center" id="aksi">
          <div class="btn-group">
              <button class="btn btn-sm btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>','<?php echo $data->nama; ?>')" id='hapus'><i class="fas fa-trash bigger-120"></i>&nbsp;Hapus</button>
          </div>
        </td>
      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>