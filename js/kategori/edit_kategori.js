$('#btnedit').click(function(){
	edit();
});

function edit(){

	var base_url = $('#base_url').val();
	var id = $('#id').val();
	var id_kategori = $('#id_kategori').val();
	var nama_ktg = $('#nama_ktg').val();
	var url_ktg = $('#url_ktg').val();	

	var lanjut = true;

	if(nama_ktg.length==0){
		$('#attention').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama Kategori Belum Diisi!</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'dashboard/update_kategori',
        	data : {
        		id:id,
        		id_kategori:id_kategori,
        		nama_ktg:nama_ktg,
        		url_ktg:url_ktg
        	},
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

	window.location.assign(base_url+"dashboard/data_kategori");
}