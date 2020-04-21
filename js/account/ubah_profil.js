$('#btnedit').click(function(){
	edit();
});

function edit(){

	var base_url = $('#base_url').val();
	var id = $('#id').val();
	var id_user = $('#id_user').val();
	var nama = $('#nama').val();
	var username = $('#username').val();
	var email = $('#email').val();
	var telepon = $('#telepon').val();
	var alamat = $('#alamat').val();
	var gender = $('#gender').val();
	var picture = $('#picture').prop('files')[0];
	var picture_name = $('input[name=picture]').val().split('\\').pop();
	

	var lanjut = true;

	if(nama.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Belum Diisi!</div>');
		return false;
	}
	if(username.length<=5){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Username Harus Lebih Dari 5 Karakter!</div>');
		return false;
	}
	if(email.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email Belum Diisi!</div>');
		return false;
	}
	if(telepon.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Telepon Belum Diisi!</div>');
		return false;
	}
	if(gender.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Alamat Belum Diisi!</div>');
		return false;
	}
	

	if(lanjut==true){
		var form_data = new FormData();

		form_data.append('id',id);
		form_data.append('id_user',id_user);
		form_data.append('nama',nama);
		form_data.append('email',email);
		form_data.append('telepon',telepon);
		form_data.append('alamat',alamat);
		form_data.append('username',username);
		form_data.append('gender',gender);
		form_data.append('picture',picture);
		form_data.append('picture_name',picture_name);

		$.ajax({
			type : "POST", 
			url  : base_url+'useraccount/update_profil',
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

function back(){
	var base_url = $('#base_url').val();

	window.location.assign(base_url+"useraccount/myaccount");
}