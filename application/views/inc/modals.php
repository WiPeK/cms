<?php if($this->user_m->loggedin() === true): ?>
<!-- Modal hasło-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content no_border_radius">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Zmiana hasła</h4>
			</div>
			<div class="modal-body">
				<?php //echo validation_errors(); ?>
				<?php echo form_open('user/change_password'); ?>
				<table class="table">
					<tr>
						<td>Stare hasło:</td>
						<td>
							<?php echo form_password('old_password'); ?>
							<?php if(form_error('old_password')) : ?>
								<div class="alert alert-warning" role="alert">
									<?php echo form_error('old_password'); ?>
								</div>
							<?php endif; ?>
						</td>
					</tr>

					<tr>
						<td>Nowe hasło:</td>
						<td>
							<?php echo form_password('new_password'); ?>
							<?php if(form_error('new_password')) : ?>
								<div class="alert alert-warning" role="alert">
									<?php echo form_error('new_password'); ?>
								</div>
							<?php endif; ?>
						</td>
					</tr>

					<tr>
						<td>Powtórz nowe hasło:</td>
						<td>
							<?php echo form_password('cnew_password'); ?>
							<?php if(form_error('cnew_password')) : ?>
								<div class="alert alert-warning" role="alert">
									<?php echo form_error('cnew_password'); ?>
								</div>
							<?php endif; ?>
						</td>
					</tr>

					<tr>
						<td></td>
						<td>
							<?php echo form_submit('submit', 'Zmień hasło', 'class="btn btn-primary no_border_radius"'); ?>
						</td>
					</tr>
				</table>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- koniec modal hasło -->

<!-- Modal kod usuniecia-->
<div class="modal fade" id="myModaldel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content no_border_radius">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Zmiana kodu usunięcia</h4>
			</div>
			<div class="modal-body">
				<?php //echo validation_errors(); ?>
				<?php echo form_open('user/change_delcode'); ?>
				<table class="table">
					<tr>
						<td>Stary kod:</td>
						<td>
							<?php echo form_input('old_del_code'); ?>
							<?php if(form_error('old_del_code')) : ?>
								<div class="alert alert-warning" role="alert">
									<?php echo form_error('old_del_code'); ?>
								</div>
							<?php endif; ?>
						</td>
					</tr>

					<tr>
						<td>Nowy kod:</td>
						<td>
							<?php echo form_input('new_del_code'); ?>
							<?php if(form_error('new_del_code')) : ?>
								<div class="alert alert-warning" role="alert">
									<?php echo form_error('new_del_code'); ?>
								</div>
							<?php endif; ?>
						</td>
					</tr>

					<tr>
						<td>Powtórz nowy kod:</td>
						<td>
							<?php echo form_input('cnew_del_code'); ?>
							<?php if(form_error('cnew_del_code')) : ?>
								<div class="alert alert-warning" role="alert">
									<?php echo form_error('cnew_del_code'); ?>
								</div>
							<?php endif; ?>
						</td>
					</tr>

					<tr>
						<td></td>
						<td>
							<?php echo form_submit('submit', 'Zmień kod', 'class="btn btn-primary no_border_radius"'); ?>
						</td>
					</tr>
				</table>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- koniec modal kod usuniecia -->

<!-- Modal email-->
<div class="modal fade" id="myModalemail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content no_border_radius">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Zmiana email</h4>
			</div>
			<div class="modal-body">
				<?php //echo validation_errors(); ?>
				<?php echo form_open('user/change_email'); ?>
				<table class="table">
					<tr>
						<td>Stary email:</td>
						<td>
							<?php echo form_input('old_email',set_value('old_email', $user_data->email)); ?>
							<?php if(form_error('old_email')) : ?>
								<div class="alert alert-warning" role="alert">
									<?php echo form_error('old_email'); ?>
								</div>
							<?php endif; ?>
						</td>
					</tr>

					<tr>
						<td>Nowy email:</td>
						<td>
							<?php echo form_input('new_email'); ?>
							<?php if(form_error('new_email')) : ?>
								<div class="alert alert-warning" role="alert">
									<?php echo form_error('new_email'); ?>
								</div>
							<?php endif; ?>
						</td>
					</tr>

					<tr>
						<td>Powtórz nowy email:</td>
						<td>
							<?php echo form_input('cnew_email'); ?>
							<?php if(form_error('cnew_email')) : ?>
								<div class="alert alert-warning" role="alert">
									<?php echo form_error('cnew_email'); ?>
								</div>
							<?php endif; ?>
						</td>
					</tr>

					<tr>
						<td></td>
						<td>
							<?php echo form_submit('submit', 'Zmień email', 'class="btn btn-primary no_border_radius"'); ?>
						</td>
					</tr>
				</table>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- koniec modal email -->
<?php endif; ?>

<div class="modal fade bs-example-modal-lg" id="modal_support" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Support</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('support'); ?>
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
	</table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
        <?php echo form_submit('submit', 'Wyślij zgłoszenie', 'class="btn btn-primary"'); ?>
		<?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>