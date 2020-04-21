<table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
	<thead>
		<tr>
			<th class="center" width="50px">No</th>
			<th class="center" width="125px">ID</th>
			<th class="center" width="200px">Nama</th>
			<th class="center" width="200px">Account</th>
			<th class="center" width="200px">Link Account</th>
			<th class="center" width="150px">WhatsApp</th>
			<th class="center" width="120px">Tools</th>
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
		<?php foreach ($list_author as $data) { 
			?>
			<tr>
				<td class="center" id="no"><?php echo $no; ?></td>
				<td class="center" id="id"><?php echo $data->id; ?></td>
				<td class="left" id="nama"><?php echo $data->nama; ?></td>
				<td class="left" id="account"><?php echo $data->account; ?></td>
				<td class="left" id="link"><?php echo $data->link; ?></td>
				<td class="left" id="wa"><?php echo $data->no_wa; ?></td>
				
				<td class="center" id="aksi">
					<div class="btn-group">
                		<button class="btn btn-xs btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>')" id='hapus'><i class="ace-icon fa fa-trash bigger-120"></i>Hapus</button>
                	</div>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>