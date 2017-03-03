<?php if(!$this->session->userdata('loggedin')): ?>
<div class="login_panel">
	<div class="head_login">
		<p class="text-center">Panel logowania</p>	
	</div>
	<div class="login_inputs"> 
		<?php echo form_open('user/login'); ?>
			<div class="form-group">
				<label for="Input_email_login">Login</label>
				<?php echo form_input('login', $this->input->post('email'),'id="Input_email_login" class="form-control no_border_radius" placeholder="Login"'); ?>
				<?php if(form_error('login')) : ?>
					<div class="alert alert-warning" role="alert">
						<?php echo form_error('login'); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="form-group">
				<label for="Password_login">Hasło</label>
				<?php echo form_password('password','','id="Password_login" class="form-control no_border_radius" placeholder="Hasło"'); ?>
				<?php if(form_error('password')) : ?>
					<div class="alert alert-warning" role="alert">
						<?php echo form_error('password'); ?>
					</div>
				<?php endif; ?>
				<a class="text-center" href="user/forgotten_password"><p>Zapomniane hasło?</p></a>
			</div>
			<?php echo form_submit('submit', 'Logowanie', 'class="btn btn-default btn-register center-block no_border_radius"'); ?>
		<?php echo form_close(); ?>
	</div>
</div> <!-- login_panel -->
<?php else: ?>
	<div class="login_panel">
		<div class="head_login">
			<p class="text-center">Zalogowano jako: <?php echo $this->session->userdata('login'); ?>
				<span class="badge pull-right log_out_ic" data-toggle="tooltip" data-placement="bottom" title="Wyloguj się">
					<a href="user/logout"><i class="glyphicon glyphicon-off"></i></a>
				</span>
			</p>
		</div>
		<div class="logged_panel">
			<label for="">Email:&nbsp&nbsp </label>
			<?php echo $user_data->email . '&nbsp&nbsp'; ?>
			<br>
			<label for="">Data stworzenia konta:</label><br>
			<?php echo $user_data->create_date; ?>
			<br>
			<label for="">Ostatnie logowanie:</label><br>
			<?php echo $user_data->last_login; ?>
			<?php echo br(2); ?>
			<button type="button" class="btn btn-default btn-sm no_border_radius" data-toggle="modal" data-target="#myModalemail">Zmień email</button>	
			<button type="button" class="btn btn-default btn-sm no_border_radius" data-toggle="modal" data-target="#myModal">Zmień hasło</button>	
			<button type="button" class="btn btn-default btn-sm no_border_radius" data-toggle="modal" data-target="#myModaldel">Zmień kod</button>
			<?php if($this->session->userdata('mods') === 'admin' && $this->session->userdata('loggedin') === TRUE): ?>
				<a href="<?php echo site_url() . 'admin/dashboard'; ?>">
					<button type="button" class="btn btn-default btn-sm no_border_radius btn_adm">Panel administratora</button>
				</a>
			<?php endif; ?>	
		</div>
	</div>
<?php endif; ?>
			
<!-- news-panel -->
<div class="left_news_panel">
	<div role="tabpanel">
	<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active no_border_radius"><a href="#nowe" aria-controls="nowe" role="tab" data-toggle="tab">Najnowsze</a></li>
			<li role="presentation" class="no_border_radius"><a href="#najpopularniejsze" aria-controls="rozpatrzone" role="tab" data-toggle="tab">Najpopularniejsze</a></li>
		</ul>
	<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="nowe">
				<?php if(isset($newest_arts) && !empty($newest_arts)): ?>
				<?php foreach($newest_arts as $newar): ?>
				<div class="simply_recent">
					<div class="row no_space">
						<div class="col-lg-4">
							<a class="img_new_art" href="<?php echo site_url() . 'article/' . $newar->parent_page . '/' . $newar->id; ?>"><img src="<?php echo site_url() . $newar->logo; ?>" alt="<?php echo $newar->title; ?>"></a>
						</div>
						<div class="col-lg-8">
							<div class="rc_right">	
								<div class="rc_right_title">
								    <p><?php echo anchor(site_url() . 'article/' . $newar->parent_page . '/' . $newar->id,$newar->title); ?></p>
								</div>
								<div data-toggle="tooltip" data-placement="bottom" title="Kategoria" class="rc_right_cat">
									<?php $slashed = explode(',',$newar->category);
									foreach($slashed as $slash)
									{
										echo '<p>' . anchor(site_url() . 'search/category_menager/' . str_replace(' ','',$slash),$slash) .'</p>';
									}  
									?>
								</div>
								<div data-toggle="tooltip" data-placement="bottom" title="Wyświetlenia" class="rc_right_views">
									<p><?php echo $newar->views; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div> 
				<?php endforeach; ?>
				<?php endif; ?>	
			</div>
			<div role="tabpanel" class="tab-pane" id="najpopularniejsze">
				<?php if(isset($popular_arts) && !empty($popular_arts)): ?>
				<?php foreach($popular_arts as $popar): ?>
				<div class="simply_recent">
					<div class="row no_space">
						<div class="col-lg-4">
							<a class="img_new_art" href="<?php echo site_url() . 'article/' . $popar->parent_page . '/' . $popar->id; ?>"><img src="<?php echo site_url() . $popar->logo; ?>" alt="<?php echo $popar->title; ?>"></a>
						</div>
						<div class="col-lg-8">
							<div class="rc_right">	
								<div class="rc_right_title">
								    <p><?php echo anchor(site_url() . 'article/' . $popar->parent_page . '/' . $popar->id,$popar->title); ?></p>
								</div>
								<div data-toggle="tooltip" data-placement="bottom" title="Kategoria" class="rc_right_cat">
									<?php $slashed = explode(',',$popar->category);
									foreach($slashed as $slash)
									{
										echo '<p>'. $slash .'</p>';
									}  
									?>
								</div>
								<div data-toggle="tooltip" data-placement="bottom" title="Wyświetlenia" class="rc_right_views">
									<p><?php echo $popar->views; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div> 
				<?php endforeach; ?>
				<?php endif; ?> 
			</div>
		</div> <!-- tabpanel -->
	</div> <!-- news-panel -->
</div>		
<div class="facebook_panel">
	<div class="fb_header">
		<p class="text-center">Facebook</p>
	</div>
	<div class="fb-like-box" data-href="<?php echo $cmscfg->fb_link; ?>" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true" data-width="270"></div>
</div>