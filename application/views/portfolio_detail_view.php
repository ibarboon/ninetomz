<!--start intro section-->
<section  id="intro" class="content no-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-offset-2">
				<h1 class="text-center"><?php echo $album['album_name']; ?></h1>
				<p class="text-center"><?php echo $album['album_description']; ?></p>
			</div>
			<div class="col-lg-12">
				<div class="row">
					<ul class="grid"><!--start grid -->
						<?php foreach($photo_list as $photo) : ?>
						<li class="col-lg-4 col-sm-4">
							<a class="fancybox" href="<?php echo base_url('assets/img/portfolio/'.$photo['photo_name']); ?>" data-fancybox-group="gallery" title="<?php echo $photo['photo_description']; ?>">
							<figure>
								<img class="img-responsive" src="<?php echo base_url('assets/img/portfolio/'.$photo['photo_name']); ?>" alt="<?php echo $photo['photo_name']; ?>">
								<figcaption>
									<span><?php echo $photo['photo_description']; ?></span>
								</figcaption>
							</figure>
							</a>
						</li>
						<?php endforeach; ?>
					</ul><!--end grid -->
				</div>
				<div class="row">
					<button type="button" class="btn btn-default" id="btn-load-more-pdv">Load more</button>
				</div>
			</div>
		</div>
	</div>
</section>
<!--end intro section-->