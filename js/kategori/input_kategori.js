$('#btnsimpan').click(function(){
	simpan_data();
});

function simpan_data(){

	$('#attention').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Tersimpan!</div>');

	var base_url = $('#base_url').val();
	var nama_ktg = $('#nama_ktg').val();
	var url_ktg = $('#url_ktg').val();
	
	var lanjut = true;

	if(nama_ktg.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Kategori Belum Diisi!</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'dashboard/simpan_kategori',
        	data : {
        		nama_ktg:nama_ktg,
        		url_ktg:url_ktg
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
	$('#nama_ktg').val('');
	$('#url_ktg').val('');
}

