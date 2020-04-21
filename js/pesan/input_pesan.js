$('#btnkirim').click(function(){
	simpan_data();
});

function simpan_data(){

	$('#attention').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Pesan anda telah terkirim!</div>');

	var base_url = $('#base_url').val();
	var nama = $('#nama').val();
	var email = $('#email').val();
	var subjek = $('#subjek').val();
	var pesan = $('#pesan').val();
	
	var lanjut = true;

	if(nama.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Tidak Boleh Kosong!</div>');
		return false;
	}

	if(pesan.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Pesan Tidak Boleh Kosong!</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'shop/simpan_pesan',
        	data : {
        		nama:nama,
        		subjek:subjek,
        		pesan:pesan,
        		email:email
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
					clear_data();
					//back();
            	}
			}
		});
	}
}

function clear_data(){
	$('#nama').val('');
	$('#email').val('');
	$('#subjek').val('');
	$('#pesan').val('');
}

