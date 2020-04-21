<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('header'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/ace-master/assets/css/bootstrap-datepicker3.min.css" />
	</head>

	<body class="no-skin">
		<?php $this->load->view('navbar'); ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<?php $this->load->view('sidebar'); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-users home-icon"></i>
								<a href="#">Mondayy</a>
							</li>

							<li class="active">Data Post</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Data Post
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!--2 PAGE CONTENT BEGINS -->

								<div class="row">
									<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">

									<div class="col-sm-4 form-group">
										<span class="input-icon input-icon-right" style="width: 100%">
											<input type="text" id="cari" style="width: 100%" placeholder="Search">
											<i class="ace-icon fa fa-search"></i>
										</span>
									</div>
								</div>

								<br/>
								<div class="table-responsive" id="tabel-data"></div>
								<div class="row" id="paging">
									<!-- <div class="col-sm-12" id="paging"></div> -->
								</div>
								<br/>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php $this->load->view('footer'); ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- Delete modals -->
		<div id="hapus-modal" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 id="hapus-judul" class="smaller lighter red no-margin">Hapus Data</h3>
						<input type="hidden" id="id" name="id">
						<input type="hidden" id="pageno" name="pageno">
					</div>
					<div class="modal-body" id="hapus-teks">
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm btn-danger" id="btnhapus">Ya</button>
						<button class="btn btn-sm" id="btntidak" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete modals -->

		<?php $this->load->view('basic-scripts'); ?>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
		<script src="<?php echo base_url(); ?>css/ace-master/assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>js/data_posted.js?v=1.1.0" type="text/javascript"></script>

		<?php $this->load->view('ace-scripts'); ?>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			});
		</script>
	</body>
</html>