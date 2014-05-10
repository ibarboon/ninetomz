<div class="page-header">
	<h1>User</h1>
</div>
<?php if(isset($update_result) && $update_result === true){ ?>
<div class="alert alert-success">Update was successful.</div>
<?php } ?>
<p class="text-right">
	<a class="btn btn-default" href="javascript:void(0;" id="edit-button">Edit</a>
	<a class="btn btn-default" href="javascript:void(0;" id="cancel-to-edit" style="display: none;">Cancel</a>
</p>
<form class="form-horizontal" role="form" method="post" accept-charset="utf-8" action="<?php echo site_url('backend/user/'.strtolower($user['user_login'])); ?>" name="user-form">
	<div class="form-group">
		<label for="user-login" class="col-xs-3 control-label">User:</label>
		<div class="col-xs-9">
			<input type="text" class="form-control" name="user-login" id="user-login" placeholder="User" value="<?php echo strtolower($user['user_login']); ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="new-password" class="col-xs-3 control-label">New password:</label>
		<div class="col-xs-9">
			<input type="password" class="form-control" name="new-password" id="new-password" placeholder="Password">
		</div>
	</div>
	<div class="form-group">
		<label for="re-type-new-password" class="col-xs-3 control-label">Re-type new password:</label>
		<div class="col-xs-9">
			<input type="password" class="form-control" name="re-type-new-password" id="re-type-new-password" placeholder="Password">
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-offset-3 col-xs-9">
			<input class="btn btn-primary" name="input-save-changes" type="submit" value="Save Changes">
		</div>
	</div>
</form>