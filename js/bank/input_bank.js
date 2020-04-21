$('#btnsimpan').click(function(){
	simpan_data();
});

function simpan_data(){

	$('#attention').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Tersimpan!</div>');

	var base_url = $('#base_url').val();
	var nama_bank = $('#nama_bank').val();
	var atas_nama = $('#atas_nama').val();
	var no_rek = $('#no_rek').val();
	
	var lanjut = true;

	if(nama_bank.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Bank Belum Diisi!</div>');
		return false;
	}
	if(atas_nama.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Atas Nama Belum Diisi!</div>');
		return false;
	}
	if(no_rek.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>No. Rekening Belum Diisi!</div>');
		return false;
	}
	


	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'tools/simpan_bank',
        	data : {
        		nama_bank:nama_bank,
        		atas_nama:atas_nama,
        		no_rek:no_rek
        	},
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
					//clear_data();
					back();
            	}
			}
		});
	}
}

function clear_data(){
	$('#nama_bank').val('');
	$('#atas_nama').val('');
	$('#no_rek').val('');
}

$('#btnback').click(function() {
	back();
});

function back(){
	var base_url = $('#base_url').val();

	window.location.assign(base_url+"tools/metode_pembayaran");
}