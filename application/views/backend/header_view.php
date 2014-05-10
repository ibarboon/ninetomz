<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Nine-Tom Studio - Backend</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/style.css'); ?>">
		<script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	</head>
	<body>
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo site_url('/backend/'); ?>">Backend</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<?php
							$menu_list = array('Content','Portfolio','Contact','Other');
							foreach($menu_list as $menu):
								$attr = ($current_page === strtolower($menu))? 'class="active"': '';
								echo '<li '.$attr.'><a href="'.site_url('backend/'.strtolower($menu).'/').'">'.$menu.'</a></li>';
							endforeach;
						?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo site_url('backend/user/'.strtolower($user['user_login'])); ?>"><?php echo $user['user_login']; ?></a></li>
						<li><a href="<?php echo site_url('backend/signout'); ?>">Sign out</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
		<div class="container">