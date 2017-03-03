<div class="container-fluid">
	<div class="row no_space">
		<div class="col-lg-3 col-xs-12 no_space">
			<?php $this->load->view($navbar_admin); ?>
		</div>
		<div class="col-lg-9 no_space">
			 <div class="row top_strap">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-9 uri_top no_space">
							<ul>
								<li>
									<a href="<?php echo site_url() . $this->uri->segment(1) . '/dashboard'; ?>">
										<div class="uri_one">								
											<?php echo $this->uri->segment(1); ?>										
										</div>
									</a>
								</li>

								<?php if($this->uri->segment(2)): ?>
									<li>
										<a href="<?php echo site_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2); ?>">
											<div class="uri_two">	
												<?php echo $this->uri->segment(2); ?>	
											</div>
										</a>
									</li>	
								<?php else: ?>
									<li></li>
								<?php endif; ?>

								<?php if($this->uri->segment(3)): ?>
									<li>
										<a href="<?php echo site_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3); ?>">
											<div class="uri_three">
												<?php echo $this->uri->segment(3); ?>
											</div>
										</a>
									</li>	
								<?php else: ?>
									<li></li>
								<?php endif; ?>	
							</ul>
						</div>
						<div class="col-lg-3 no_space fast_add">
							<ul class="pull-right">
								<li>
									<a href="<?php echo site_url() . 'admin/user/edit'; ?>" data-toggle="tooltip" data-placement="bottom" title="Dodaj nowego użytkownika">
										<i class="glyphicon glyphicon-user"></i>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url() . 'admin/page/edit'; ?>" data-toggle="tooltip" data-placement="bottom" title="Dodaj nową stronę">
										<i class="glyphicon glyphicon-book"></i>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url() . 'admin/article/edit'; ?>" data-toggle="tooltip" data-placement="bottom" title="Dodaj nowy artykuł">
										<i class="glyphicon glyphicon-credit-card"></i>
									</a>
								</li>
							</ul>
						</div>			
					</div>	
				</div>
			</div>
			<?php $this->load->view($subview); ?>
		</div>
	</div>
</div>