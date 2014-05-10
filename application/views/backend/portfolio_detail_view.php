<div class="page-header">
	<h1>Portfolio detail: <small><?php echo $album['album_name']; ?></small></h1>
	<!--<input type="" name="input-hidden-" value="">-->
</div>
<?php if(isset($update_result) && $update_result === true){ ?>
<div class="alert alert-success">Update was successful.</div>
<?php } ?>
<?php if(!($album['album_type'] == 'CI' || $album['album_type'] == 'CC')) { ?>
<p class="text-right">
	<button class="btn btn-default" data-toggle="modal" data-target="#add-photo-modal" id="add-photo-button">Add Photo</button>
	<button class="btn btn-default" data-toggle="modal" data-target="#album-modal" id="launch-album-modal">Edit Album</button>
	<button class="btn btn-default" data-toggle="modal" data-target="#delete-album-modal" id="launch--delete-album-modal">Delete Album</button>
</p>
<?php } ?>
<div class="row">
	<?php foreach($photos as $photo): ?>
	<div class="col-xs-4">
		<div class="thumbnail">
			<a href="#photo-modal" data-toggle="modal" data-photo-row-id="<?php echo $photo['row_id']; ?>" data-photo-name="<?php echo $photo['photo_name']; ?>" data-photo-description="<?php echo $photo['photo_description']; ?>" class="get-photo-modal">
				<img alt="<?php echo $photo['photo_name']; ?>" style="width: 300px; height: 200px;" src="<?php echo base_url('assets/img/portfolio/'.$photo['photo_name']); ?>">
			</a>
			<div class="caption">
				<p><?php echo $photo['photo_description']; ?></p>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<div id="add-photo-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-horizontal" role="form" method="post" accept-charset="utf-8" action="<?php echo site_url('backend/portfolio/'.$album['row_id']); ?>" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Add Photo</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-xs-3 control-label">Photos:</label>
						<div class="col-xs-9">
							<input type="file" name="userfile[]" multiple>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input class="btn btn-primary" name="input-add-photos" type="submit" value="Save Changes">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div id="album-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-horizontal" role="form" method="post" accept-charset="utf-8" action="<?php echo site_url('backend/portfolio/'.$album['row_id']); ?>" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Edit Album</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="input-album-name" class="col-xs-3 control-label">Album name:</label>
						<div class="col-xs-9">
							<input type="text" class="form-control" name="input-album-name" id="input-album-name" value="<?php echo $album['album_name']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="input-album-description" class="col-xs-3 control-label">Album description:</label>
						<div class="col-xs-9">
							<textarea class="form-control" rows="6" name="input-album-description" id="input-album-description"><?php echo $album['album_description']; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-3 control-label">Album type:</label>
						<div class="col-xs-9">
							<div class="radio">
								<label><input type="radio" name="input-album-type" value="PW" <?php echo ($album['album_type'] === 'PW')? 'checked': null; ?>>Pre Wedding</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="input-album-type" value="WC" <?php echo ($album['album_type'] === 'WC')? 'checked': null; ?>>Wedding Ceremony</label>
							</div>
								<div class="radio">
								<label><input type="radio" name="input-album-type" value="E" <?php echo ($album['album_type'] === 'E')? 'checked': null; ?>>Engagement</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input class="btn btn-primary" name="input-edit-album" type="submit" value="Save Changes">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div id="delete-album-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Delete Album</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this album ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a class="btn btn-default" href="<?php echo site_url('backend/do_delete/album/'.$album['row_id']); ?>">Confirm</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div id="delete-photo-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Delete Photo</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this photo ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a class="btn btn-default" href="" id="do-delete-photo" data-href="<?php echo site_url('backend/do_delete/photo/'.$album['row_id']); ?>">Confirm</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div id="photo-modal" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Photo</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-7"></div>
					<div class="col-xs-5">
						<p class="text-left">
							<?php if(!($album['album_type'] == 'CI' || $album['album_type'] == 'CC')) { ?>
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Option <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="" id="do-carousel-intro" data-href="<?php echo site_url('backend/do_carousel/intro/'.$album['row_id']); ?>">Make Slide Intro</a></li>
									<li><a href="" id="do-carousel-content" data-href="<?php echo site_url('backend/do_carousel/content/'.$album['row_id']); ?>">Make Slide Content</a></li>
									<li><a href="" id="do-album-cover" data-href="<?php echo site_url('backend/do_album_cover/content/'.$album['row_id']); ?>">Make Album Cover</a></li>
								</ul>
							</div>
							<?php } ?>
							<button class="btn btn-default" id="edit-photo-description">Edit Description:</button>
							<button class="btn btn-default" data-toggle="modal" data-target="#delete-photo-modal" id="launch-delete-photo-modal" data-dismiss="modal">Delete Photo</button>
						</p>
						<form class="form-horizontal" role="form" method="post" accept-charset="utf-8" action="<?php echo site_url('backend/portfolio/'.$album['row_id']); ?>" id="edit-photo-description-form">
							<label for="input-photo-description">Photo description:</label>
							<textarea class="form-control" rows="4" name="input-photo-description" id="input-photo-description"></textarea>
							<br>
							<input class="btn btn-primary" name="input-edit-photo" type="submit" value="Save Changes">
						</form>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>