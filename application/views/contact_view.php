<!--<section id="contact-header" class="header header-extended">
	<div id="map" data-start="opacity: 1;" data-250="opacity: 0;"></div>
</section><!-- /#contact-header -->
<section  id="intro" class="content no-header">
<div class="container">

<div class="row">
<div class="col-lg-8 col-offset-2">
<h1 class="text-center">Contact us</h1>
<p class="text-center">Hey, that's a nice form and you should use it.</p>
<?php if(isset($alert_message)){ ?>
<div class="alert alert-success"><?php echo $alert_message; ?></div>
<?php } ?>
<form role="form" style="text-align: left;"  method="post" accept-charset="utf-8" action="<?php echo site_url('contact/submit/true'); ?>" id="send-mail-form"/>
<div class="form-group">
<label for="input-name">Name:</label>
<input type="text" placeholder="enter your name" name="input-name" id="input-name" class="form-control">
</div>
<div class="form-group">
<label for="input-email">Email:</label>
<input type="text" placeholder="enter your email" name="input-email" id="input-email" class="form-control">
</div>
<div class="form-group">
<label for="input-phone">Phone:</label>
<input type="text" placeholder="enter your phone number" name="input-phone" id="input-phone" class="form-control">
</div>
<label>Service:</label>
<div class="radio">
<label>
<input type="radio" name="input-service" value="Pre Wedding" checked="checked"> Pre Wedding
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="input-service" value="Wedding Ceremony"> Wedding Ceremony
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="input-service" value="Engagement"> Engagement
</label>
</div>
<div class="form-group">
<label for="input-message">Message:</label>
<textarea name="input-message" class="form-control" rows="3" style="resize: none;"></textarea>
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
</div>

<div class="content-divider"></div>

		<div class="row">
			<?php foreach($contact_list as $contact): ?>
			<div class="col-lg-3 col-sm-3">
				<h3><?php echo $contact['option_name']; ?></h3><br>
				<blockquote><?php echo str_replace("|","<br />",$contact['option_value']); ?></blockquote>
			</div>
			<?php endforeach; ?>
		</div><!-- /.row -->

</div>
</section>
<!--end intro section-->