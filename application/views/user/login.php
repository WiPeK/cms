<div class="modal-header">
	<h3>Logowanie</h3>
</div>
<div class="modal-body">
	<?php //echo validation_errors(); ?>
	<?php echo form_open(); ?>
	<table class="table">
		<tr>
			<td>Login: (3-16 znaków)</td>
			<td>
				<?php echo form_input('login', $this->input->post('email')); ?>
				<?php if(form_error('login')) : ?>
					<div class="alert alert-warning" role="alert">
						<?php echo form_error('login'); ?>
					</div>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td>Hasło: (4-16 znaków)</td>
			<td>
				<?php echo form_password('password'); ?>
				<?php if(form_error('password')) : ?>
					<div class="alert alert-warning" role="alert">
						<?php echo form_error('password'); ?>
					</div>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><p><?php echo anchor('user/forgotten_password','Przypomnij hasło'); ?></p>
				<?php echo form_submit('submit', 'Logowanie', 'class="btn btn-primary"'); ?>
			</td>
		</tr>
	</table>

	<?php echo form_close(); ?>
</div>		