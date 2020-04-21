$('#btnkirim').click(function(){
	kirim();
});

function kirim(){

	var base_url = $('#base_url').val();
	var id_invoice = $('#id_invoice').val();
	var nama_pengirim = $('#nama_pengirim').val();
	var nominal = $('#nominal').val();
	var bank = $('#bank').val();
	var picture = $('#picture').prop('files')[0];
	var picture_name = $('input[name=picture]').val().split('\\').pop();
	
	var lanjut = true;

	if(id_invoice.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Harap Masukkan ID Invoice!</div>');
		return false;
	}
	if(nama_pengirim.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Pengirim Belum Diisi!</div>');
		return false;
	}
	if(bank.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bank Belum Dipilih!</div>');
		return false;
	}
	if(nominal.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nominal Belum Diisi!</div>');
		return false;
	}
	if(picture_name.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Harap Lampirkan Bukti Pembayaran!</div>');
		return false;
	}
	
	
	if(lanjut==true){
		var form_data = new FormData();

		form_data.append('nama_pengirim',nama_pengirim);
		form_data.append('id_invoice',id_invoice);
		form_data.append('nominal',nominal);
		form_data.append('bank',bank);
		form_data.append('picture',picture);
		form_data.append('picture_name',picture_name);

		$.ajax({
			type : "POST", 
			url  : base_url+'shop/simpan_konfirmasi',
        	data : form_data,
        	processData : false,
        	contentType : false,
        	dataType : "json", 
        	cache : false,
        	beforeSend: function (){
				$("#form").LoadingOverlay("show");
	        },
			success	: function(response){ 
				if(response.status=='gagal'){
					$('#attention').html(response.pesan);
					$("#form").LoadingOverlay("hide", true);
				}
				else{
					$('#attention').html(response.pesan);
					$("#form").LoadingOverlay("hide", true);
					clear_data();
            	}
			}
		});
	}
}

$('#btnclear').click(function(){
	clear_data();
});

function clear_data(){
	$('#form').trigger("reset");
	/*$('#nama').val('');
	$('#username').val('');
	$('#password').val('');
	$('#email').val('');
	$('#telepon').val('');
	$('#gender').val('');
	$('#alamat').val('');
	//$('#picture').handleFormReset();*/
}
