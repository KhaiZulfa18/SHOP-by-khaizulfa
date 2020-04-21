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
		url: base_url+'useraccount/get_history',
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
		url: base_url+'useraccount/paging_history',
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