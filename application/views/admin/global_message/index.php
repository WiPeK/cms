<div class="row edit_data no_space">
	<div class="col-lg-10 col-lg-offset-1">
		<h3>Global message</h3>
		<?php if(validation_errors()): ?>
			<div class="alert alert-warning" role="alert">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?php echo form_open(); ?>
		<div class="row">
			<div class="col-lg-1">
				<p class="">Temat</p>
			</div>
			<div class="col-lg-5">
				<?php echo form_input('subject'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<p class="">Treść</p>
			</div>
			<div class="col-lg-12">
				<?php echo form_textarea('message_body','','id="ckeditor"'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-5">
				<?php echo form_submit('submit', 'Wyślij Email', 'class="btn btn-primary btn-lg btn-block btn_save_data"'); ?>
			</div>
		</div>
		<?php echo form_close();?>
	</div>
</div>
