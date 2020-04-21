$('#btnsimpan').click(function(){
	simpan_data();
});

function simpan_data(){

	$('#attention').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Tersimpan!</div>');

	var base_url = $('#base_url').val();
	var nama = $('#nama').val();
	var username = $('#username').val();
	var password = $('#password').val();
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
	if(password.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Belum Diisi!</div>');
		return false;
	}
	if(password.length<5){
		$('#attention').html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i>Password Tidak Memenuhi Syarat</h5>Password Harus Lebih Dari 5 Huruf!</div>');
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
			url  : base_url+'dashboard/simpan_admin',
        	data : {
        		nama:nama,
        		username:username,
        		password:password,
        		email:email,
        		telepon:telepon,
        		gender:gender
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
            	}
			}
		});
	}
}

function clear_data(){
	$('#nama').val('');
	$('#username').val('');
	$('#password').val('');
	$('#email').val('');
	$('#telepon').val('');
	$('#gender').val('');
}