$('#btnsimpan').click(function(){
	simpan_data();
});

function simpan_data(){

	var base_url = $('#base_url').val();
	var nama_produk = $('#nama_produk').val();
	var kategori = $('#kategori').val();
	var harga = $('#harga').val();
	var stok = $('#stok').val();
	var catatan = $('#catatan').val();
	var picture = $('#picture').prop('files')[0];
	var picture_name = $('input[name=picture]').val().split('\\').pop();
	var picture2 = $('#picture2').prop('files')[0];
	var picture_name2 = $('input[name=picture2]').val().split('\\').pop();
	var picture3 = $('#picture3').prop('files')[0];
	var picture_name3 = $('input[name=picture3]').val().split('\\').pop();
	
	var lanjut = true;

	if(nama_produk.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Produk Belum Diisi!</div>');
		return false;
	}
	if(kategori.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kategori Belum Dipilih!</div>');
		return false;
	}
	if(harga.length==0){
		$('#attention').html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Harga Belum Diisi!</div>');
		return false;
	}
	if(stok.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Stok Belum Diisi!</div>');
		return false;
	}
	if(picture_name.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Harap Masukkan Minimal 1 Gambar!</div>');
		return false;
	}
	
	if(lanjut==true){
		var form_data = new FormData();

		form_data.append('nama_produk',nama_produk);
		form_data.append('kategori',kategori);
		form_data.append('harga',harga);
		form_data.append('stok',stok);
		form_data.append('catatan',catatan);
		form_data.append('picture',picture);
		form_data.append('picture_name',picture_name);
		form_data.append('picture2',picture2);
		form_data.append('picture_name2',picture_name2);
		form_data.append('picture3',picture3);
		form_data.append('picture_name3',picture_name3);

		$.ajax({
			type : "POST", 
			url  : base_url+'dashboard/simpan_produk',
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
	/*$('#nama_produk').val('');
	$('#harga').val('');
	$('#kategori').val('');
	$('#stok').val('');
	$('#catatan').val('');
	//$('#picture').handleFormReset();*/
}