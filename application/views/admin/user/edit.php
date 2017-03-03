<div class="row edit_data no_space">
	<div class="col-lg-10 col-lg-offset-1">
		<div class="row">
			<div class="col-lg-6">
				<h3><?php echo empty($user->id) ? 'Dodaj nowego użytkownika:' : 'Edycja użytkownika: ' . $user->login; ?></h3>
			</div>
		</div>	
		<?php echo form_open(); ?>
		<div class="row">
			<div class="col-lg-2">
				<p>Login:</p>
			</div>
			<div class="col-lg-3">
				<?php echo form_input('login', set_value('login', $user->login)); ?>
				<?php if(form_error('login')) : ?>
					<div class="alert alert-warning bad_validation" role="alert">
						<?php echo form_error('login'); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<p>Email:</p>
			</div>
			<div class="col-lg-3">
				<?php echo form_input('email', set_value('email', $user->email)); ?>
				<?php if(form_error('email')) : ?>
					<div class="alert alert-warning bad_validation" role="alert">
						<?php echo form_error('email'); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<p>Hasło:</p>
			</div>
			<div class="col-lg-3">
				<?php echo form_password('password'); ?>
				<?php if(form_error('password')) : ?>
					<div class="alert alert-warning bad_validation" role="alert">
						<?php echo form_error('password'); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<p>Powtórz hasło:</p>
			</div>
			<div class="col-lg-3">
				<?php echo form_password('password_c'); ?>
				<?php if(form_error('password_c')) : ?>
					<div class="alert alert-warning bad_validation" role="alert">
						<?php echo form_error('password_c'); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<p>Kod:</p>
			</div>
			<div class="col-lg-3">
				<?php echo form_input('del_code', set_value('del_code', $user->del_code)); ?>
				<?php if(form_error('del_code')) : ?>
					<div class="alert alert-warning bad_validation" role="alert">
						<?php echo form_error('del_code'); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-5"><?php echo form_submit('submit', 'Zapisz', 'class="btn btn-primary save_bt"'); ?></div>
		</div>
		<?php echo form_close();?>
	</div>
</div>

