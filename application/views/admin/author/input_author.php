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

							<li class="active">Input Author</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Input Author
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form">

									<div class="form-group">
										<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">

										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Author </label>

										<div class="col-sm-9">
											<input type="text" id="nama" name="nama" placeholder="Nama" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Account Author </label>

										<div class="col-sm-9">
											<input type="text" id="account" name="account" placeholder="Account" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Link Account </label>

										<div class="col-sm-9">
											<input type="text" id="link_acc" name="link_acc" placeholder="Link Account" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> WhatsApp </label>

										<div class="col-sm-9">
											<input type="text" id="wa" name="wa" placeholder="WhatsApp" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="space-6"></div>
									
									<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-info" type="button" id="btnsimpan">
											<i class="ace-icon fa fa-check bigger-110"></i>
											Simpan
										</button>

										&nbsp; &nbsp; &nbsp;
										<button class="btn" type="reset">
											<i class="ace-icon fa fa-undo bigger-110"></i>
											Reset
										</button>
									</div>
								</form>
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

		<?php $this->load->view('basic-scripts'); ?>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
		<script src="<?php echo base_url(); ?>css/ace-master/assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>js/input_author.js?v=1.1.0" type="text/javascript"></script>

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
