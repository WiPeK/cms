<div class="nav-adm no_space">
	<div class="div_nav_adm no_space">			
		<div class="row">
			<div class="col-lg-6">
				<img src="<?php echo site_url(); ?>images/sample.jpg" alt="example" class="img-admin img-responsive">
			</div>
			<div class="col-lg-5 no_space logged_as">
				<p class="logas"><i class="glyphicon glyphicon-user"></i> Zalogowano jako: </p>
				<p class="text-center"><?php echo strtoupper($this->session->userdata('login')); ?></p>
				<p class="text-center">
					<ul class="act_ico">
						<li>
							<a href="<?php echo base_url('admin/user/edit') . '/' . $admin->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Przejdź do profilu"><i class="glyphicon glyphicon-th-large"></i></a>
						</li>
						<li>
							<a href="<?php echo base_url('user/logout'); ?>" data-toggle="tooltip" data-placement="bottom" title="Wyloguj się"><i class="glyphicon glyphicon-off"></i></a>
						</li>
					</ul>
				</p>
			</div>
		</div>
		<div class="row no_space">
				<?php 
					$attributes = array(
						'class' => 'navbar-form search_bar',
						'role' => 'search'
					);
					echo form_open(site_url('search/results'),$attributes);
				?>
				<div class="form-group">
					<?php echo form_input('search_input','','class="form-control no_radius_input" placeholder="Search"'); ?>
				</div>
				<button type="submit" name="submit" class="btn btn-default">
					<div class="menu_search">
	            		<span class="glyphicon glyphicon-search pull-right search_ic"></span>	
	            	</div>
				</button>
				<?php echo form_close(); ?>
			<ul class="navadmin nav">
				<li class="navadminli">
					<?php echo anchor(site_url(), 'Homepage'); ?>
				</li>
				<li class="navadminli">
					<?php echo anchor(site_url('admin/user'), 'Użytkownicy'); ?>
				</li>
				<li class="navadminli">
					<?php echo anchor(site_url('admin/page'), 'Strony'); ?>
				</li>
				<li class="navadminli">
					<?php echo anchor(site_url('admin/article'), 'Artykuły'); ?>
				</li>
				<li class="navadminli">
					<?php echo anchor(site_url('admin/page/order'), 'Kolejność stron'); ?>
				</li>
				<li class="navadminli">
					<?php echo anchor(site_url('admin/gallery'), 'Zarządzanie galerią'); ?>
				</li>
				<li class="navadminli">
					<?php echo anchor(site_url('admin/configuration'), 'Zarządzanie CMS'); ?>
				</li>
				<li class="navadminli">
					<?php echo anchor(site_url('admin/global_message'), 'Wiadomosc globalna'); ?>
				</li>
				<li class="navadminli">
					<?php echo anchor(site_url('admin/logs'), 'Logi'); ?>
				</li>
				<li class="navadminli">
					<?php echo anchor(site_url('admin/support'), 'Support'); ?>
				</li>
				<li class="navadminli">
					<?php echo anchor(site_url('admin/manage_files'), 'Pliki'); ?>
				</li>
			</ul>
		</div>		
	</div>	
</div>















