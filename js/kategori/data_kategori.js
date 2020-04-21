$(document).ready(function(){
	tampil_data(1);
});

$('#status').change(function(){
	tampil_data(1);
});

$('#cari').change(function(){
	tampil_data(1);
});

function tampil_data(pageno){
	var base_url = $('#base_url').val();
	var cari = $('#cari').val();
	var status = $('#status').val();

	$.ajax({
		type: 'POST',
		url: base_url+'dashboard/get_kategori',
		data: {
			status: status,
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
	var status = $('#status').val();

	$.ajax({
		type: "POST",		
		url: base_url+'dashboard/paging_kategori',
		data: {
			status: status,
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
		url: base_url+'dashboard/delete_kategori',
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

function change(id,noPage,status){
	$("#change-modal").modal('toggle');
	$("#change-modal").modal('show');
	$("#change-teks").html("<h6>Anda Yakin?</h6>");
	$('#id_ch').val(id);
	$('#status_ch').val(status);
	$('#pageno_ch').val(noPage);
}


$('#btnchange').click(function() {
	var base_url = $('#base_url').val();
	var id = $('#id_ch').val();
	var status = $('#status_ch').val();
	var pageno = $('#pageno_ch').val();
	if(pageno.length==0){
		var pageno = 1;
	}

	$.ajax({
		type: "POST",		
		url: base_url+'dashboard/change_status_ktg',
		data: {
			id: id,
			status:status
		},
		beforeSend: function (){
            $("#btnchange").prop('disabled', true);
            $("#btntidak").prop('disabled', true);
        },
		success: function() {
			$("#change-modal").modal('hide');
			$("#btnchange").prop('disabled', false);
			$("#btntidak").prop('disabled', false);
			$('#id_ch').val('');
			$('#status_ch').val('');
			$('#pageno_ch').val('');
			tampil_data(pageno);
		}
	});
});
