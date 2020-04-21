$(document).ready(function(){
	tampil_data(1);
});

$('#start_date').change(function(){
	tampil_data(1);
});

$('#end_date').change(function(){
	tampil_data(1);
});

$('#cari').change(function(){
	tampil_data(1);
});

function tampil_data(pageno){
	var base_url = $('#base_url').val();
	var cari = $('#cari').val();
	// var status = $('#status').val();
	var start_date = $('#start_date').val();
	var end_date = $('#end_date').val();

	$.ajax({
		type: 'POST',
		url: base_url+'dashboard/get_penjualan',
		data: {
			// status: status,
			start_date: start_date,
			end_date:end_date,
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
	// var status = $('#status').val();
	var start_date = $('#start_date').val();
	var end_date = $('#end_date').val();

	$.ajax({
		type: "POST",		
		url: base_url+'dashboard/paging_penjualan',
		data: {
			start_date: start_date,
			end_date:end_date,
			// status: status,
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
		url: base_url+'dashboard/delete_checkout',
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

function confirm(id,noPage,status){
	$("#change-modal").modal('toggle');
	$("#change-modal").modal('show');
	$("#change-teks").html("<h6>Konfirmasi Pembayaran "+id+"?</h6>");
	$('#id_ch').val(id);
	$('#status_ch').val(status);
	$('#pageno_ch').val(noPage);
}


$('#btnchange').click(function() {
	var base_url = $('#base_url').val();
	var id = $('#id_ch').val();
	var pageno = $('#pageno_ch').val();
	if(pageno.length==0){
		var pageno = 1;
	}

	$.ajax({
		type: "POST",		
		url: base_url+'dashboard/confirm_inv',
		data: {
			id: id
		},
		beforeSend: function (){
			$("#btnchange").prop('disabled', true);
			$("#btntidak").prop('disabled', true);
		},
		success: function(data) {
			$("#change-modal").modal('hide');
			$("#btnchange").prop('disabled', false);
			$("#btntidak").prop('disabled', false);
			$('#id_ch').val('');
			$('#status_ch').val('');
			$('#pageno_ch').val('');
			// console.log(data)
			tampil_data(pageno);
		}
	});
});



function lihat(id_invoice){
	var base_url = $('#base_url').val();
	var id_checkout = id_checkout;

	$.ajax({
		type: "POST",		
		url: base_url+'dashboard/lihat_data_penjualan',
		data: {
			id_invoice: id_invoice
		},
		success: function(data) {
			// $("#modal_invoice").modal('toggle');
			$("#modal_invoice").modal('show');
			$("#result_modal").html(data);
			$("#modal-title").html(id_invoice);
			console.log(data);
			//tampil_data(pageno);
		}
	});
}

