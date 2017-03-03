<footer>
		<div class="row">
			<div class="footer_container">
				<div class="col-lg-3">
					<div class="about_ft">
						<div class="head_item_ft center-block">
							O serwisie
						</div>
						<div class="body_about_ft">
							<p>
								<?php echo e($cmscfg->about); ?>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="tags_ft">
						<div class="head_item_ft center-block">
							Tagi
						</div>
						<div class="body_tags_ft">
						<?php
							if(isset($tags_data) && !empty($tags_data))
							{
								foreach($tags_data as $tags)
								{
									$tagss = explode(',',$tags);
									foreach($tagss as $tag)
									{
										echo '<p>' . anchor(site_url() . 'search/tags_menager/' . str_replace(' ','',$tag),$tag) . '</p>';
									}
								}	
							} 
						?>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="recent_ft">
						<div class="head_item_ft center-block">
							Zgłoszenia
						</div>
						<div class="body_recent_ft">
							<div class="simply_recent_ft">
					        	<div class="rc_right_ft">	
						        	<div class="rc_right_title_ft">
						        		<p>Aby napisać do nas zgłoszenie kliknij w poniższy przycisk.</p>
						        		<button type="button" class="btn btn-default btn-lg no_border_radius center-block btn_support" data-toggle="modal" data-target="#modal_support">Support</button>
						        		<br><p>Aby zapoznać się z naszym regulaminem kliknij w poniższy przycisk</p>
						        		<a href="<?php echo site_url() . 'register'; ?>">
						        			<button type="button" class="btn btn-default btn-lg no_border_radius center-block btn_support">Regulamin</button>
						        		</a>
						        	</div>
						        </div>
					        </div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="gallery_ft">
						<div class="head_item_ft center-block">
							Losowe zdjęcia
						</div>
						<div class="body_gallery_ft">
							<?php 
								if(isset($fimages) && !empty($fimages))
								{
									foreach($fimages as $fimg)
									{
										echo '<a href="' . site_url() . 'static/gallery"><img src="' . site_url() . $fimg . '"></a>';
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
			<hr class="footer_hr">
			<div class="footer_copyright">
				<div class="row">
					<div class="col-lg-4">
						<p class="ft_lf">
						© 2014 WiPeK. All Right Reserved. Created by WiPeK
						</p>
					</div>				
					<div class="col-lg-5 col-lg-offset-3">					
						<p class="ft_rg pull-right">Strona wygenerowana dnia <strong><?php echo date('Y-m-d H-i-s') ?></strong> w czasie <strong>{elapsed_time}</strong> sek</p>
					</div>
			</div>	
				</div>
	</footer>