$('#btnedit').click(function(){
	edit();
});

function edit(){

	var id = $('#id').val();
	var id_user = $('#id_user').val();
	var base_url = $('#base_url').val();
	var newpassword = $('#newpassword').val();
	var currentpassword = $('#currentpassword').val();
	var confirmpassword = $('#confirmpassword').val();

	var lanjut = true;

	if(currentpassword.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Masukkan Password Anda!</div>');
		return false;
	}
	if(newpassword.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Masukkan Password Baru!</div>');
		return false;
	}
	if(newpassword.length<5){
		$('#attention').html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i>Password Tidak Memenuhi Syarat</h5>Password Harus Lebih Dari 5 Karakter!</div>');
		return false;
	}
	if(confirmpassword.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Konfirmasi Password Dahulu!</div>');
		return false;
	}
	
	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'useraccount/update_password',
			data : {
				id:id,
				id_user:id_user,
				confirmpassword:confirmpassword,
				newpassword:newpassword,
				currentpassword:currentpassword
        	},
        	dataType:"json",
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
					back();
            	}
			}
		});
	}
}
$('#btnback').click(function() {
	back();
});

function back(){
	var base_url = $('#base_url').val();
	var id = $('#id').val();

	window.location.assign(base_url+"useraccount/myaccount");
}

function clear_data(){
	$('#newpassword').val('');
	$('#currentpassword').val('');
	$('#confirmpassword').val('');
}