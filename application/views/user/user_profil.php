<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Login</h3>
	</div>
	<div class="panel-body">
		<?php echo $user_data->login; ?>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Email</h3>
	</div>
	<div class="panel-body">
		<?php echo $user_data->email; ?>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalemail">
			Zmień email
		</button>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Hasło</h3>
	</div>
	<div class="panel-body">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			Zmień hasło
		</button>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Kod usunięcia</h3>
	</div>
	<div class="panel-body">
		<?php echo $user_data->del_code; ?>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModaldel">
			Zmień kod usunięcia
		</button>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Data stworzenia konta</h3>
	</div>
	<div class="panel-body">
		<?php echo $user_data->create_date; ?>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Ostatnie udane logowanie</h3>
	</div>
	<div class="panel-body">
		<?php echo $user_data->last_login; ?>
	</div>
</div>

<!-- Modal hasło-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
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
							<?php echo form_submit('submit', 'Zmień hasło', 'class="btn btn-primary"'); ?>
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
		<div class="modal-content">
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
							<?php echo form_input('old_del_code',set_value('old_del_code', $user_data->del_code)); ?>
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
							<?php echo form_submit('submit', 'Zmień kod', 'class="btn btn-primary"'); ?>
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
		<div class="modal-content">
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
							<?php echo form_submit('submit', 'Zmień email', 'class="btn btn-primary"'); ?>
						</td>
					</tr>
				</table>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- koniec modal email -->
