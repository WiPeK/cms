<div class="container-fluid container_center">
	<?php $this->load->view('inc/strap_top'); ?>
	<?php $this->load->view('inc/strap_logo'); ?>
	<?php $this->load->view('inc/menu'); ?>
	<div class="row body_row">
		<div class="col-lg-9 left_body">
			<?php if(isset($subview)): ?>
			<div class="row row_subview">
				<div class="col-lg-12">
					<?php $this->load->view($subview); ?>
				</div>
			</div>
			<?php endif; ?>	
			<div class="row">
				<?php if(isset($home_content) && $home_content === 1): ?>
					<?php $this->load->view('inc/left_lbody'); ?>
					<?php $this->load->view('inc/left_rbody'); ?>
				<?php endif; ?>					
			</div>			
		</div>

		<div class="col-lg-3 right_body">
			<?php $this->load->view('inc/right_body'); ?>	
		</div> <!-- right body -->
	</div>
</div>
<?php $this->load->view('inc/modals'); ?>
<?php $this->load->view('inc/footer_s'); ?>