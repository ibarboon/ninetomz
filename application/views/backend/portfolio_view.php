<div class="page-header">
	<h1>Portfolio</h1>
</div>
<?php if(isset($update_result) && $update_result === true){ ?>
<div class="alert alert-success">Create Album was successful.</div>
<!--<pre><?php (isset($alert_message))? print_r($alert_message): null; ?></pre>-->
<?php } ?>
<p class="text-right">
	<button class="btn btn-default" data-toggle="modal" data-target="#album-modal" id="launch-album-modal">Create Album</button>
</p>
<div class="row">
	<?php foreach($albums as $album): ?>
	<div class="col-xs-4">
		<div class="thumbnail">
			<a href="<?php echo site_url('backend/portfolio/'.$album['row_id']); ?>">
				<img alt="<?php echo $album['album_name']; ?>" style="width: 300px; height: 200px;" src="<?php echo base_url('assets/img/portfolio/'.$album['photo_name']); ?>">
			</a>
			<div class="caption">
				<h3><?php echo $album['album_name']; ?></h3>
				<p><?php echo $album['album_description']; ?></p>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<div id="album-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-horizontal" role="form" method="post" accept-charset="utf-8" action="<?php echo site_url('backend/portfolio/'); ?>" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Create Album</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="input-album-name" class="col-xs-3 control-label">Album name:</label>
						<div class="col-xs-9">
							<input type="text" class="form-control" name="input-album-name" id="input-album-name">
						</div>
					</div>
					<div class="form-group">
						<label for="input-album-description" class="col-xs-3 control-label">Album description:</label>
						<div class="col-xs-9">
							<textarea class="form-control" rows="6" name="input-album-description" id="input-album-description"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-3 control-label">Album type:</label>
						<div class="col-xs-9">
							<div class="radio">
								<label><input type="radio" name="input-album-type" value="PW" checked>Pre Wedding</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="input-album-type" value="WC">Wedding Ceremony</label>
							</div>
								<div class="radio">
								<label><input type="radio" name="input-album-type" value="E">Engagement</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-3 control-label">Photos:</label>
						<div class="col-xs-9">
							<input type="file" name="userfile[]" multiple>
							<!--<input type="file" name="userfile[]">-->
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input class="btn btn-primary" name="input-create-album" type="submit" value="Save Changes">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>