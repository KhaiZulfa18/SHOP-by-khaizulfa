$('#btnedit').click(function(){
	edit();
});

function edit(){

	var base_url = $('#base_url').val();
	var id = $('#id').val();
	var id_produk = $('#id_produk').val();
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
	

	if(lanjut==true){
		var form_data = new FormData();

		form_data.append('id',id);
		form_data.append('id_produk',id_produk);
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
			url  : base_url+'dashboard/update_produk',
        	data : form_data,
        	processData : false,
        	contentType : false,
        	dataType : "json", 
        	cache : false,
        	beforeSend: function (){
				$("#form").LoadingOverlay("show");
	        },
			success	: function(response){
				$("#form").LoadingOverlay("hide", true);
				back();
			}
		});
	}
}
$('#btnback').click(function() {
	back();
});

function back(){
	var base_url = $('#base_url').val();

	window.location.assign(base_url+"dashboard/data_produk");
}