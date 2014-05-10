<!--start intro section-->
<section  id="intro" class="content no-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-offset-2">
				<h1 class="text-center">Portfolio</h1>
				<p class="text-center" style="margin-bottom: 15px;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
				<div class="btn-group" style="margin-bottom: 15px;">
					<button type="button" class="btn btn-default" id="all">All</button>
					<button type="button" class="btn btn-default" id="pw">Pre Wedding</button>
					<button type="button" class="btn btn-default" id="wc">Wedding Ceremony</button>
					<button type="button" class="btn btn-default" id="e">Engagement</button>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="row">
					<ul class="grid"><!--start grid -->
						<?php foreach($album_list as $album): ?>
						<li class="col-lg-4 col-sm-4 <?php echo $album['album_type']; ?>">
							<a href="<?php echo site_url('portfolio/'.$album['album_id']); ?>">
							<figure>
								<img class="img-responsive" src="<?php echo base_url('assets/img/portfolio/'.$album['photo_name']); ?>" alt="">
								<figcaption>
									<h4><?php echo $album['album_name']; ?></h4>
									<span><?php echo $album['album_description']; ?></span>
								</figcaption>
							</figure>
							</a>
						</li>
						<?php endforeach; ?>
					</ul><!--end grid -->
				</div>
				<div class="row">
					<button type="button" class="btn btn-default" id="btn-load-more-pv">Load more</button>
				</div>
			</div>
		</div>
	</div>
</section>
<!--end intro section-->