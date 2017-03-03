<div class="row pasek_top">		
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 left_data_top">
		<?php echo 'Witaj na ' . $site_name . '. Twoje ip to: ' . $this->input->ip_address(); ?>
	</div>
	<div class="col-lg-2 col-lg-offset-2 col-md-2 col-sm-2 col-xs-12 data_top">
		<div class="pull-right">
			<?php echo dateV('l j f Y',strtotime(date('Y-m-d'))); ?>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 social_icons_top">	
		<ul class="pull-right">
			<li>
				<a href="">
					<i class="fa fa-facebook"></i>
				</a>
			</li>
			<li>
				<a href="">
					<i class="fa fa-twitter"></i>
				</a>
			</li>
			<li>
				<a href="">
					<i class="fa fa-google-plus"></i>
				</a>
			</li>
			<li>
				<a href="">
					<i class="fa fa-instagram"></i>
				</a>
			</li>
			<li>
				<a href="">
					<i class="fa fa-youtube"></i>
				</a>
			</li>
		</ul>
	</div>
</div>