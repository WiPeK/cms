<div class="modal-body">
	<?php //echo validation_errors(); ?>
	<?php echo form_open(); ?>
	<table class="table">
		<tr>
			<td>Twój email:</td>
			<td>
				<?php echo form_input('email_support'); ?>
				<?php if(form_error('email_support')) : ?>
					<div class="alert alert-warning" role="alert">
						<?php echo form_error('email_support'); ?>
					</div>
				<?php endif; ?>
			</td>
		</tr>

		<tr>
			<td>Treść zgłoszenia:</td>
			<td>
				<?php echo form_textarea('support_body'); ?>
				<?php if(form_error('support_body')) : ?>
					<div class="alert alert-warning" role="alert">
						<?php echo form_error('support_body'); ?>
					</div>
				<?php endif; ?>
			</td>
		</tr>

		<tr>
			<td></td>
			<td>
				<?php echo form_submit('submit', 'Wyślij zgłoszenie', 'class="btn btn-primary"'); ?>
			</td>
		</tr>
	</table>

	<?php echo form_close(); ?>
</div>