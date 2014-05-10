		<section id="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-sm-6 margin copy">
						<p>2013 &copy; ninetomz</p>
					</div>
					<div class="col-lg-4 col-sm-6 col-offset-2 margin social">
						<a class="facebook" href="javascript:void(0)">Facebook</a> / 
						<a class="twitter" href="javascript:void(0)">Twitter</a> / 
						<a class="google" href="javascript:void(0)">Google+</a> / 
						<a class="instagram" href="javascript:void(0)">Instagram</a>
					</div>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /#footer -->
		<a href="#intro" class="hidden-sm go-top" data-0="opacity: 0;" data-1000="opacity: 1;">Go Top</a>
		<script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
		<!--[if lte IE 8]>
		<script src="<?php echo base_url('js/respond.min.js'); ?>"></script>
		<![endif]-->
		<script src="<?php echo base_url('assets/js/retina.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/jquery.easing.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/jquery.fitvids.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/jquery.nicescroll.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/jquery.touchwipe.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/skrollr.js'); ?>"></script>
		<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo base_url('assets/js/skrollr.ie.min.js'); ?>"></script>
		<![endif]-->
		<script src="<?php echo base_url('assets/js/guideline.main.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/toucheffects.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/modals.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.fancybox.js'); ?>"></script>
		<script type="text/javascript">
			$(function() {
				$('.carousel').carousel({interval: 3000});

				$('.fancybox').fancybox();

				$('.btn-group button').on('click',function(){
					var filterTxt = $(this).attr('id');
					if(filterTxt === 'all') {
						$('.col-lg-4.col-sm-4').fadeIn('slow');
					} else {
						$('.col-lg-4.col-sm-4').fadeOut('slow');
						$('.' + filterTxt).fadeIn('slow');
					}
				});

				if ($('.navbar-toggle:visible').length) {
					$('.navbar a').click(function () { $(".nav-collapse").collapse("hide") });
				}

				$('#send-mail-form').submit(function(){
					var validateObj = true;
					$('#send-mail-form :text, textarea').each(function(){
						if($(this).val() == null || $(this).val() == '') {
							validateObj = false;
						}
					});
					return validateObj;
				});

				$("#btn-load-more-pv").on("click", function() {
					var vNumberPortfolio = $(".grid li").size();
					$.ajax({
						url: "<?php echo site_url('/portfolio/get_portfolio_list'); ?>",
						data: {
							inOffset: vNumberPortfolio
						},
						dataType: "json",
						success: function(data) {
							var rows = data.length;
							if(rows > 0) {
								for(var i = 0; i < rows; ++i) {
									var elementHtml = "<li class=\"col-lg-4 col-sm-4 " + data[i]['album_type'] + "\"><a href=\"<?php echo site_url('portfolio/'); ?>/" + data[i]['album_id'] + "\"><figure><img alt=\"\" src=\"<?php echo base_url('assets/img/portfolio/'); ?>/" + data[i]['photo_name'] + "\" class=\"img-responsive\"><figcaption><h4>" + data[i]['album_name'] + "</h4><span></span></figcaption></figure></a></li>";
									$(".grid").append(elementHtml);
								}
							} else {
								//
							}
						},
						type: "POST"
					});
				});

				$("#btn-load-more-pdv").on("click", function() {
					var vNumberPortfolio = $(".grid li").size();
					$.ajax({
						url: "<?php echo site_url('/portfolio/get_photo_list'); ?>",
						data: {
							inAlbumId: "<?php echo isset($album_id)? $album_id: null; ?>",
							inOffset: vNumberPortfolio
						},
						dataType: "json",
						success: function(data) {
							var rows = data.length;
							if(rows > 0) {
								for(var i = 0; i < rows; ++i) {
									var elementHtml = "<li class=\"col-lg-4 col-sm-4\"><a title=\"" + data[i]['photo_description'] + "\" data-fancybox-group=\"gallery\" href=\"<?php echo base_url('assets/img/portfolio/'); ?>/" + data[i]['photo_name'] + "\" class=\"fancybox\"><figure><img alt=\"\" src=\"<?php echo base_url('assets/img/portfolio/'); ?>/" + data[i]['photo_name'] + "\" class=\"img-responsive\"><figcaption><span>" + data[i]['photo_description'] + "</span></figcaption></figure></a></li>";
									$(".grid").append(elementHtml);
								}
							} else {
								//
							}
						},
						type: "POST"
					});
				});
			});
		</script>
		<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
	</body>
</html>