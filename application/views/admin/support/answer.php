<div class="row edit_data no_space">
	<div class="col-lg-10 col-lg-offset-1">
		<div class="row answer_block">
			<div class="col-lg-2">
				<p class="pull-right">Od:</p>
			</div>
			<div class="col-lg-10">
				<?php echo $support->email; ?>
			</div>
		</div>
		<div class="row answer_block">
			<div class="col-lg-2">
				<p class="pull-right">Treść:</p>
			</div>
			<div class="col-lg-10">
				<?php echo $support->body; ?>
			</div>
		</div>
		<?php if(validation_errors()): ?>
			<div class="alert alert-warning" role="alert">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?php echo form_open(); ?>
		<div class="row">
			<div class="col-lg-12">
				<p>Treść odpowiedzi:</p>
			</div>
			<div class="col-lg-12">
				<?php echo form_textarea('answer_body','','id="ckeditor"'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-5">
				<?php echo form_submit('submit', 'Wyślij odpowiedź', 'class="btn btn-primary btn_save_data btn-block"'); ?>
			</div>
		</div>
		<?php echo form_close(); ?>
		<div class="bottom_space"></div>
	</div>
</div>