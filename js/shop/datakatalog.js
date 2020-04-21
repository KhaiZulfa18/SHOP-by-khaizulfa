$(document).ready(function(){
	tampil_data(1);
});

$('#kategori').change(function(){
 	tampil_data(1);
});

$('#cari').change(function(){
	tampil_data(1);
});

$('#sortby').change(function(){
	tampil_data(1);
});

function tampil_data(pageno){
	var base_url = $('#base_url').val();
	var cari = $('#cari').val();
	var sortby = $('#sortby').val();
	var kategori = $('#kategori').val();

	$.ajax({
		type: 'POST',
		url: base_url+'shop/get_katalog',
		data: {
			cari: cari,
			sortby: sortby,
			kategori: kategori,
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
	var sortby = $('#sortby').val();
	var kategori = $('#kategori').val();

	$.ajax({
		type: "POST",		
		url: base_url+'shop/paging_katalog',
		data: {
			sortby:sortby,
			kategori:kategori,
			cari: cari,
          	page: pageno
		},
		success: function(data) {
			$("#paging").html(data);
		}
	});
}