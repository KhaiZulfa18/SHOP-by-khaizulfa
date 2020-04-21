$('#btnsimpan').click(function(){
	simpan_data();
});

function simpan_data(){

	var base_url = $('#base_url').val();
	var nama = $('#nama').val();
	var username = $('#username').val();
	var password = $('#password').val();
	var email = $('#email').val();
	var telepon = $('#telepon').val();
	var gender = $('#gender').val();
	var alamat = $('#alamat').val();
	var picture = $('#picture').prop('files')[0];
	var picture_name = $('input[name=picture]').val().split('\\').pop();
	
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
	
	if(lanjut==true){
		var form_data = new FormData();

		form_data.append('nama',nama);
		form_data.append('username',username);
		form_data.append('password',password);
		form_data.append('email',email);
		form_data.append('telepon',telepon);
		form_data.append('gender',gender);
		form_data.append('alamat',alamat);
		form_data.append('picture',picture);
		form_data.append('picture_name',picture_name);

		$.ajax({
			type : "POST", 
			url  : base_url+'dashboard/simpan_user',
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
