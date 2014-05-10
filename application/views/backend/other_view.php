<div class="page-header">
	<h1>Other <small>(html meta tag)</small></h1>
</div>
<?php if(isset($update_result) && $update_result === true){ ?>
<div class="alert alert-success">Update was successful.</div>
<?php } ?>
<p class="text-right">
	<a class="btn btn-default" href="javascript:void(0;" id="edit-button">Edit</a>
	<a class="btn btn-default" href="javascript:void(0;" id="cancel-to-edit" style="display: none;">Cancel</a>
</p>
<form class="form-horizontal" role="form" method="post" accept-charset="utf-8" action="<?php echo site_url('backend/other/'); ?>" name="other-form">
	<?php foreach($option_list as $option): ?>
	<div class="form-group">
		<label for="<?php echo $option['option_name']; ?>" class="col-xs-3 control-label"><?php echo $option['option_name']; ?>:</label>
		<div class="col-xs-9">
			<textarea class="form-control" rows="6" name="input-<?php echo $option['option_name']; ?>" id="<?php echo $option['option_name']; ?>"><?php echo $option['option_value']; ?></textarea>
		</div>
	</div>
	<?php endforeach; ?>
	<div class="form-group">
		<div class="col-xs-offset-3 col-xs-9">
			<input class="btn btn-primary" name="input-save-changes" type="submit" value="Save Changes">
		</div>
	</div>
</form>