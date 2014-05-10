<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Nine Tome Studio | Backend</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?php echo base_url('/assets/backend/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url('/assets/backend/css/style.css'); ?>">
		<link href="<?php echo base_url('/assets/backend/css/ui-lightness/jquery-ui-1.10.4.custom.min.css'); ?>" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="<?php echo base_url('/assets/backend/js/jquery-1.10.2.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('/assets/backend/js/jquery-ui-1.10.4.custom.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('/assets/backend/js/bootstrap.min.js'); ?>"></script>
		<script type="text/javascript">
			$(function(){
				$('form').on('submit', function(){
					var validate = true;
					$('form input').each(function(){
						if($(this).val() == '' || $(this).val() == null){
							$(this).focus();
							$('.panel').effect('shake', 'slow');
							validate = false;
							return validate;
						}
					});
					return validate;
				});
			});
		</script>
	</head>
	<body style="margin-top: 160px;">
		<div class="container">
			<div class="row">
				<div class="col-xs-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Sign in to backend</h3>
						</div>
						<div class="panel-body">
							<?php if(isset($alert_type) && isset($alert_message)){ ?>
							<div class="alert <?php echo $alert_type; ?>"><?php echo $alert_message; ?></div>
							<?php } ?>
							<form role="form" method="post" accept-charset="utf-8" action="<?php echo site_url('backend/signin'); ?>">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									<input type="text" class="form-control" placeholder="Username" name="in-user-login">
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									<input type="password" class="form-control" placeholder="Password" name="in-user-password">
								</div>
								<br>
								<button type="submit" class="btn btn-primary btn-block" name="in-submit" value="signin"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Sign In</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>