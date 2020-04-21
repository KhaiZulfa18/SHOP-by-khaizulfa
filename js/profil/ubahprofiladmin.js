$('#btnedit').click(function(){
	edit();
});

function edit(){

	$('#attention').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fas fa-check"></i>Profil Anda Berhasil Diubah!</div>');

	var id = $('#id').val();
	var base_url = $('#base_url').val();
	var nama = $('#nama').val();
	var username = $('#username').val();
	var email = $('#email').val();
	var telepon = $('#telepon').val();
	var gender = $('#gender').val();

	var lanjut = true;

	if(nama.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Belum Diisi!</div>');
		return false;
	}
	if(username.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Username Belum Diisi!</div>');
		return false;
	}
	if(username.length<5){
		$('#attention').html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i>Username Tidak Memenuhi Syarat</h5>Username Harus Lebih Dari 5 Huruf!</div>');
		return false;
	}
	if(email.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email Belum Diisi!</div>');
		return false;
	}
	if(gender.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Jenis Kelamin Belum Diisi!</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'profile/update_admin',
			data : {
				id:id,
				nama:nama,
        		username:username,
        		email:email,
        		telepon:telepon,
        		gender:gender
        	},
        	beforeSend: function (){
				$("#form").LoadingOverlay("show");
	        },
			success	: function(response){
				if(response.status=='gagal'){
					$("#form").LoadingOverlay("hide", true);
					$('#attention').html(response.pesan);
				}
				else{
					$("#form").LoadingOverlay("hide", true);
					$('#attention').html(response.pesan);
					back();
            	}
			}
		});
	}
}