$('#btnpesan').click(function(){
	pesan();
});

function pesan(){

	$('#attention').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Melakukan Pemesanan! silahkan ikuti langkah selanjutnya</div>');

	var base_url = $('#base_url').val();
	var nama_penerima = $('#nama_penerima').val();
	var telepon = $('#telepon').val();
	var email = $('#email').val();
	var kode_pos = $('#kode_pos').val();
	var kurir = $('#courier').val();
	var catatan = $('#catatan').val();
	var alamat = $('#alamat_lengkap').val();
	var total_barang = $('#totalbarang').val();
	var ongkir = $('#txt_ongkir').val();
	var total = $('#total').val();
	var jml_barang = $('#jml_barang').val();
	var bank = $('#bank').val();
	
	var lanjut = true;

	if(jml_barang<1){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Keranjang Anda Kosong! Belanja dulu dong....</div>');
		return false;
	}
	if(nama_penerima.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Belum Diisi!</div>');
		return false;
	}
	if(telepon.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Telepon Belum Diisi!</div>');
		return false;
	}
	if(email.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email Belum Diisi!</div>');
		return false;
	}
	if(kode_pos.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kode Pos Belum Diisi!</div>');
		return false;
	}
	if(catatan.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Catatan Belum Diisi!</div>');
		return false;
	}
	if(alamat.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Alamat Belum Diisi!</div>');
		return false;
	}
	
	// if(ongkir.length==0){
	// 	$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Silahkan Pilih Kota!</div>');
	// 	return false;
	// }
	// if(total.length==0){
	// 	$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Maaf, terjadi kesalahan!</div>');
	// 	return false;
	// }
	if(bank.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Silahkan Pilih Bank!</div>');
		return false;
	}




	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'pembayaran/simpan_pesanan',
        	data : {
        		nama_penerima:nama_penerima,
        		telepon:telepon,
        		email:email,
        		kurir:kurir,
        		kode_pos:kode_pos,
        		alamat:alamat,
        		catatan:catatan,
        		total_barang:total_barang,
        		ongkir:ongkir,
        		total:total,
        		bank:bank
        	},
        	beforeSend: function (){
				$("#form_checkout").LoadingOverlay("show");
	        },
			success	: function(response){ 
				if(response.status=='gagal'){
					$('#attention').html(response.pesan);
					$("#form_checkout").LoadingOverlay("hide", true);
				}
				else{
					$('#attention').html(response.pesan);
					$("#form_checkout").LoadingOverlay("hide", true);
					next();
            	}
			}
		});
	}
}

function next(){
	var base_url = $('#base_url').val();

	window.location.assign(base_url+"useraccount/history");
}

