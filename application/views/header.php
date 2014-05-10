<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Nine-Tom Studio</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<?php foreach($html_meta_list as $html_meta): ?>
		<meta name="<?php echo $html_meta['option_name']; ?>" content="<?php echo $html_meta['option_value']; ?>">
		<?php endforeach; ?>
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/fancybox/jquery.fancybox.css'); ?>" media="screen" />
		<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700'>
		<script src="<?php echo base_url('assets/js/modernizr.js'); ?>" type="text/javascript"></script>
		<!--[if lt IE 9]>
		<script src="<?php echo base_url('assets/js/html5shiv.js'); ?>"></script>
		<![endif]-->
	</head>
	<body data-spy="scroll" data-target=".navbar" data-offset='61'>
		<div id="preloader">
			<div id="status">&nbsp;</div>
		</div><!-- /#preloader -->
		<div class="navbar navbar-fixed-top">
			<div class="container" data-start="padding: 15px 0px;" data-200="padding: 0px 0px;">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button><!-- /.navbar-responsive-collapse -->
				<a href="<?php echo (isset($current_page) and $current_page == 'home')? '#intro': site_url('home'); ?>" class="navbar-brand">
					<img class="img-responsive" src="<?php echo base_url('assets/img/logo.png'); ?>" alt="nine tom logo">
				</a>
				<div class="nav-collapse collapse navbar-responsive-collapse">
					<ul class="nav navbar-nav pull-right">
						<?php
							$menus = array('Home','Portfolio','Contact');
							foreach($menus as $menu):
								$attr = ($current_page == strtolower($menu))? 'class="active"': null;
								if(isset($current_page) && $current_page == 'home' && strtolower($menu) == 'home') {
									echo '<li class="active"><a href="#intro">Home</a></li>';
									echo '<li><a href="#aboutus">About us</a></li>';
								}
								else
								{
									echo '<li '.$attr.'><a href="'.site_url(strtolower($menu)).'">'.$menu.'</a></li>';
								}
							endforeach;
						?>
						<li><a href="https://www.facebook.com/ninetomzfoto">Facebook</a></li>
					</ul>
				</div><!-- /.container -->
			</div><!-- /.navbar .navbar-fixed-top -->
		</div><!-- /.navbar .navbar-fixed-top -->