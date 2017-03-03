<div class="row pasek_logo">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 logo_top">
		<img class="img-responsive" src="<?php echo site_url() . $logo; ?>" alt="Logo">
	</div>

	<div class="col-lg-2 col-lg-offset-7 col-md-3 col-sm-3 col-xs-12 logged_as">
		<?php if(!$this->session->userdata('loggedin')): ?>
			<div class="register_top">
				<a href="<?php echo site_url() . 'register'; ?>">
					<button type="button" class="btn btn-lg btn-register">
						Zarejestruj się
					</button>
				</a>
			</div>
		<?php endif; ?>
	</div>
</div>