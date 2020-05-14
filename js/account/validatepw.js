$('#btnvalidate').click(function(){
	validate();
});

function validate(){

	var base_url = $('#base_url').val();
	var newpassword = $('#newpassword').val();
	var confirmpassword = $('#confirmpassword').val();
	var token = $('#token').val();
	var url = $('#url').val();

	if(newpassword.length<=5){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Harap isi Password Baru!</div>');
		return false;
	}
	if(token.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Harap Konfirmasi Password Anda!</div>');
		return false;
	}
	if(confirmpassword.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Harap isi Token!</div>');
		return false;
	}
	if(url.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Terjadi Kesalahan!</div>');
		return false;
	}

	var lanjut = true;

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'resetpassword/validate',
        	data : {
        		newpassword: newpassword,
        		confirmpassword: confirmpassword,
        		token: token,
        		url: url
        	},
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
}
