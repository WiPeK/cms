<div class="container-fluid container_center">
	<?php $this->load->view('inc/strap_top'); ?>
	<?php $this->load->view('inc/strap_logo'); ?>
	<?php $this->load->view('inc/menu'); ?>
	<div class="row body_row">
		<div class="col-lg-9 left_body">
			<div class="row">
				<?php $this->load->view('inc/left_lbody'); ?>
				<?php $this->load->view('inc/left_rbody'); ?>				
			</div>			
		</div>

		<div class="col-lg-3 right_body">
			<?php $this->load->view('inc/right_body'); ?>	
		</div> <!-- right body -->
	</div>
</div>
<?php $this->load->view('inc/footer_s'); ?>