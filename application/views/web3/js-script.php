<div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center p-5 mx-auto mw-100">
				<h1>Login!</h1>
				
				<div class="login newsletter">
					<div class="col-12">
						<a href="<?php echo base_url('useraccount/login'); ?>"><button class="btn btn-lg btn-success"><i class="fa fa-sign-in-alt"></i>&nbsp;Login</button></a>
					</div>
					<hr>
					
				</div>
				<div class="col-12">
					<span>Belum Punya Akun?&nbsp;<a href="<?php echo base_url('useraccount/register'); ?>">Daftar</a></span>
				</div>
			</div>

		</div>
	</div>
</div>




<!--jQuery-->
	<script src="<?php echo base_url()?>css/goggles/js/jquery-2.2.3.min.js"></script>

	<!-- newsletter modal -->
	<!-- <script type="text/javascript">
	    $(document).ready(function(){
	        openLoginModal();
	    });
	</script> -->
	
	<!--search jQuery-->
	<script src="<?php echo base_url()?>css/goggles/js/modernizr-2.6.2.min.js"></script>
	<script src="<?php echo base_url()?>css/goggles/js/classie-search.js"></script>
	<script src="<?php echo base_url()?>css/goggles/js/demo1-search.js"></script>
	<!--//search jQuery-->
	<!-- cart-js -->
	<script src="<?php echo base_url()?>css/goggles/js/minicart.js"></script>
	<script>
		googles.render();

		googles.cart.on('googles_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>
	<!-- carousel -->
	<!-- price range (top products) -->
		<script src="<?php echo base_url()?>css/goggles/js/jquery-ui.js"></script>
		<script>
			//<![CDATA[ 
			$(window).load(function () {
				$("#slider-range").slider({
					range: true,
					min: 0,
					max: 9000,
					values: [50, 6000],
					slide: function (event, ui) {
						$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
					}
				});
				$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

			}); //]]>
		</script>
		<!-- //price range (top products) -->

	<!-- Count-down -->
	<!-- <script src="<?php echo base_url()?>css/goggles/js/simplyCountdown.js"></script>
	<link href="<?php echo base_url()?>css/goggles/css/simplyCountdown.css" rel='stylesheet' type='text/css' />
	<script>
		var d = new Date();
		simplyCountdown('simply-countdown-custom', {
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
	</script> -->
	<!--// Count-down -->
	<!-- FlexSlider -->
		<script src="<?php echo base_url()?>css/goggles/js/jquery.flexslider.js"></script>
		<script>
			// Can also be used with $(document).ready()
			$(window).load(function () {
				$('.flexslider1').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				});
			});
		</script>
		<!-- //FlexSlider-->
	<script src="<?php echo base_url()?>css/goggles/js/owl.carousel.js"></script>
	<script>
		$(document).ready(function () {
			$('.owl-carousel').owlCarousel({
				loop: false,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 2,
						nav: false
					},
					900: {
						items: 3,
						nav: false
					},
					1000: {
						items: 4,
						nav: true,
						loop: false,
						margin: 20
					}
				}
			})
		})

		$(document).ready(function () {
			$('#owl-slider').owlCarousel({
				autoplay:3000,
				items:4,
				itemsDekstop:[119,9,3],
				itemsDekstopSmall:['979,3']
			});
		});
	</script>

	<!-- //end-smooth-scrolling -->


	<!-- dropdown nav -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //dropdown nav -->
  <script src="<?php echo base_url()?>css/goggles/js/move-top.js"></script>
    <script src="<?php echo base_url()?>css/goggles/js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--// end-smoth-scrolling -->

	<script src="<?php echo base_url()?>css/goggles/js/bootstrap.js"></script>
	<!-- bs-custom-file-input -->
	<script src="<?php echo base_url(); ?>css/AdminLTE-3.0.2/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<!-- js file -->