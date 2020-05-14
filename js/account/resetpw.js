$('#btnsent').click(function(){
	sent();
});

function sent(){

	var base_url = $('#base_url').val();
	var email = $('#email').val();

	if(email.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email Belum Diisi!</div>');
		return false;
	}

	var lanjut = true;

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'resetpassword/sent_token',
        	data : {
        		email: email
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
