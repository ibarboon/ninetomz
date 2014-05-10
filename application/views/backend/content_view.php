<div class="page-header">
	<h1>Content</h1>
</div>
<?php if(isset($update_result) && $update_result === true){ ?>
<div class="alert alert-success">Update was successful.</div>
<?php } ?>
<p class="text-right">
	<a class="btn btn-default" href="javascript:void(0;" id="edit-button">Edit</a>
	<a class="btn btn-default" href="javascript:void(0;" id="cancel-to-edit" style="display: none;">Cancel</a>
</p>
<form class="form-horizontal" role="form" method="post" accept-charset="utf-8" action="<?php echo site_url('backend/content/'); ?>" name="other-form">
	<div class="form-group">
		<label for="input-content-header" class="col-xs-3 control-label">Content head:</label>
		<div class="col-xs-9">
			<input type="text" class="form-control" name="input-content-header" id="input-content-header" placeholder="Content head" value="<?php echo $contents['content_head']; ?>">
		</div>
	</div>
	<?php foreach($contents['content_body'] as $key => $value): ?>
	<div class="form-group">
		<label for="input-content-body-<?php echo $key; ?>" class="col-xs-3 control-label">Content body <?php echo $key + 1; ?>:</label>
		<div class="col-xs-9">
			<textarea class="form-control" rows="6" name="input-content-body-<?php echo $key; ?>" id="input-content-body-<?php echo $key; ?>"><?php echo $value; ?></textarea>
		</div>
	</div>
	<?php endforeach; ?>
	<div class="form-group">
		<div class="col-xs-offset-3 col-xs-9">
			<input class="btn btn-primary" name="input-save-changes" type="submit" value="Save Changes">
		</div>
	</div>
</form>