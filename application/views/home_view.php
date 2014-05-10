<section id="intro">
	<div id="carousel_intro" class="carousel slide fadeing">
		<!-- Indicators -->
		<!--ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class=""></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
		</ol-->
		<div class="carousel-inner">
			<?php
				foreach($carousel_intro_list as $key => $carousel):
				$attr = ((int)$key === 0)? ' active': null;
			?>
			<div class="item <?php echo $attr; ?>">
				<img alt="<?php echo $carousel['photo_description']; ?>" src="<?php echo base_url('/assets/img/portfolio/'.$carousel['photo_name']); ?>">
				<!--div class="carousel-caption">
					<h2><?php echo $carousel['photo_description']; ?></h2>
				</div-->
			</div>
			<?php endforeach; ?>
		</div>
		<!--button class="left carousel-control" href="#carousel_intro" data-slide="prev"><i class="icon-chevron-left"></i></button>
		<button class="right carousel-control" href="#carousel_intro" data-slide="next"><i class="icon-chevron-right"></i></button-->
	</div>
	<div class="hidden-sm more">
		<a href="#aboutus" class="btn btn-cool squared" data-start="opacity:1; margin-top: 0%;" data-150="opacity:0; margin-top: -10%;"><i class="icon-angle-down"></i> See more</a>
	</div><!-- /.hidden-sm .more-->
</section><!-- /#intro -->
<p class="text-center" id="for-mobile-version"><br/>Mobile version pless ( <i class="icon-align-justify"></i> ) to another menu<br/></p>
<section id="aboutus">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="carousel slide fadeing" id="carousel_content">
					<div class="carousel-inner">
						<?php
							foreach($carousel_content_list as $key => $carousel):
							$attr = ((int)$key === 0)? 'active ': null;
						?>
						<div class="<?php echo $attr; ?>item">
							<img alt="" src="<?php echo base_url('assets/img/portfolio/'.$carousel['photo_name']); ?>" class="img-responsive">
						</div>
						<?php endforeach; ?>
					</div>
					<!--button data-slide="prev" href="#carousel_content" class="left carousel-control"><i class="icon-chevron-left"></i></button>
					<button data-slide="next" href="#carousel_content" class="right carousel-control"><i class="icon-chevron-right"></i></button-->
				</div>
			</div>
			<div class="col-lg-6 margin">
				<h3><?php echo $contents['content_head']; ?></h3>
				<p><?php echo $contents['content_body'][0]; ?></p>
			</div>
		</div>
		<div class="content-divider"></div>
		<div class="row">
			<div class="col-lg-6">
				<p><?php echo $contents['content_body'][1]; ?></p>
			</div>
			<div class="col-lg-6">
				<p><?php echo $contents['content_body'][2]; ?></p>
			</div>
		</div><!-- /.row -->
		<div class="content-divider"></div>
		<div class="row">
			<?php foreach($contact_list as $contact): ?>
			<div class="col-lg-3 col-sm-3">
				<h3><?php echo $contact['option_name']; ?></h3><br>
				<blockquote <?php echo ($contact['option_name'] == 'Call-us')? 'style="color: #0099CC"': null; ?>><?php echo str_replace("|","<br />",$contact['option_value']); ?></blockquote>
			</div>
			<?php endforeach; ?>
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /#aboutus -->