$(document).ready(function(){
	tampil_data(1);
});

$('#gender').change(function(){
	tampil_data(1);
});

$('#cari').change(function(){
	tampil_data(1);
});

function tampil_data(pageno){
	var base_url = $('#base_url').val();
	var cari = $('#cari').val();
	var gender = $('#gender').val();

	$.ajax({
		type: 'POST',
		url: base_url+'dashboard/get_admin',
		data: {
			gender: gender,
			cari: cari,
			page: pageno
        },
        beforeSend: function (){
			$("#tabel-data").LoadingOverlay("show");
        },
		success: function(data) {
			$("#tabel-data").LoadingOverlay("hide", true);
			$('#tabel-data').html(data);
			paging(pageno);
		}
	});
}

function paging(pageno){
	var base_url = $('#base_url').val();
	var cari = $('#cari').val();
	var gender = $('#gender').val();

	$.ajax({
		type: "POST",		
		url: base_url+'dashboard/paging_admin',
		data: {
			gender: gender,
			cari: cari,
          	page: pageno
		},
		success: function(data) {
			$("#paging").html(data);
		}
	});
}

function hapus(id,noPage,nama){
	$("#hapus-modal").modal('toggle');
	$("#hapus-modal").modal('show');
	$("#hapus-teks").html("<h6>Yakin Untuk Menghapus Data "+nama+"?</h6>");
	$('#id').val(id);
	$('#pageno').val(noPage);
}

$('#btnhapus').click(function() {
	var base_url = $('#base_url').val();
	var id = $('#id').val();
	var pageno = $('#pageno').val();
	if(pageno.length==0){
		var pageno = 1;
	}

	$.ajax({
		type: "POST",		
		url: base_url+'dashboard/delete_admin',
		data: {
			id: id
		},
		beforeSend: function (){
            $("#btnhapus").prop('disabled', true);
            $("#btntidak").prop('disabled', true);
        },
		success: function() {
			$("#hapus-modal").modal('hide');
			$("#btnhapus").prop('disabled', false);
			$("#btntidak").prop('disabled', false);
			$('#id').val('');
			$('#pageno').val('');
			tampil_data(pageno);
		}
	});
});
