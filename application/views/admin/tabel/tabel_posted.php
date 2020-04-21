<table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
	<thead>
		<tr>
			<th class="center" width="50px">No</th>
			<th class="center" width="125px">ID Posted</th>
			<th class="center" width="200px">Judul</th>
			<th class="center" width="200px">Author</th>
			<th class="center" width="200px">Account</th>
			<th class="center" width="200px">Link Account</th>
			<th class="center" width="150px">Date</th>
			<th class="center" width="300px">Picture</th>
			<th class="center" width="100px">Aksi</th>
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
		<?php foreach ($list_posted as $data) { 
			$judul = $data->judul;
			$judul = str_replace('_', ' ', $judul);
			?>
			<tr>
				<td class="center" id="no"><?php echo $no; ?></td>
				<td class="center" id="id_posted"><?php echo $data->id_posted; ?></td>
				<td class="left" id="judul"><?php echo $judul; ?></td>
				<td class="left" id="author"><?php echo $data->author; ?></td>
				<td class="left" id="account"><?php echo $data->account; ?></td>
				<td class="left" id="link_account"><?php echo $data->link_acc; ?></td>
				<td class="center" id="date_posted"><?php echo format_tanggal_indo($data->date_posted); ?></td>
				<td class="center" id="picture">
					<?php 
						$txtgambar = (!empty($data->picture)) ? '<img src="'.base_url().'images/posted/'.$data->picture.'" width="100%">' : '-';
						echo $txtgambar;
					?>	
				</td>
				<td class="center" id="aksi">
					<div class="btn-group">
                		<button class="btn btn-xs btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>')" id='hapus'><i class="ace-icon fa fa-trash bigger-120"></i>Hapus</button>
                	</div>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>