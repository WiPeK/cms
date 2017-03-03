<div class="col-lg-8 left_right_body">
	<?php if(isset($post_oad) && !empty($post_oad)): ?>
		<div class="post_of_a_day">
			<div class="head_poad">
				Artykuł dnia
			</div>
			<div class="row body_poad">			
				<div class="col-lg-6">
					<a href="<?php echo site_url() . 'article/' . $post_oad->parent_page . '/' . $post_oad->id; ?>">
						<img src="<?php echo site_url() . $post_oad->logo; ?>" alt="<?php echo $post_oad->title; ?>">
			 		</a>			
				</div>
				<div class="col-lg-6 poad">
					<a href="<?php echo site_url() . 'article/' . $post_oad->parent_page . '/' . $post_oad->id; ?>">
						<p class="title_poad"><?php echo $post_oad->title; ?></p>
			 		</a>
			 		<div class="clearfix"></div>
					<p class="pubdate_poad"><?php echo anchor(site_url() . 'search/date_menager/' . e($post_oad->pubdate),$post_oad->pubdate); ?></p>
					<div class="clearfix"></div>
					<p class="tresc_poad">
						<?php echo word_limiter(strip_tags($post_oad->body), 30); ?>
					</p>
				</div>
			</div>
		</div>
	<?php endif; ?>	
	<?php if(isset($main_pages) && !empty($main_pages)): ?>
	<?php foreach($main_pages as $m_page): ?>
	<?php $m_art = $this->article_m->get_artc(str_replace(' ','_',$m_page->title)); ?>
	<div class="news_from_npages">
		<div class="head_nwfp">
			<?php echo $m_page->title;?>
		</div>
		<div class="row">
			<?php if(isset($m_art) && !empty($m_art)): ?>
			<div class="col-lg-6">
				<div class="left_new">
					<a href="<?php echo site_url() . 'article/' . $m_art[0]->parent_page . '/' . $m_art[0]->id; ?>">
						<img src="<?php echo site_url() . $m_art[0]->logo; ?>" alt="<?php echo $m_art[0]->title; ?>">
					<p class="title_nwfp"><?php echo $m_art[0]->title; ?></p>
					</a>
					<p class="pubdate_nwfp"><?php echo anchor(site_url() . 'search/date_menager/' . e($m_art[0]->pubdate),$m_art[0]->pubdate); ?></p>
					<p class="body_nwfp"><?php echo word_limiter($m_art[0]->title,10); ?></p>
				</div>
			</div>
			<div class="col-lg-6">
			<?php if(isset($m_art[1])): ?>
				<div class="simple_nwfp">
					<div class="row">
						<div class="col-lg-3">
							<a href="<?php echo site_url() . 'article/' . $m_art[1]->parent_page . '/' . $m_art[1]->id; ?>">
								<img src="<?php echo site_url() . $m_art[1]->logo; ?>" alt="<?php echo $m_art[1]->title; ?>">
							</a>
						</div>
						<div class="col-lg-9">
							<p class="simple_nwfp_title">
								<a href="<?php echo site_url() . 'article/' . $m_art[1]->parent_page . '/' . $m_art[1]->id; ?>">
									<?php echo $m_art[1]->title; ?>
								</a>
							</p>
							<p class="simple_nwfp_pubdate"><?php echo anchor(site_url() . 'search/date_menager/' . e($m_art[1]->pubdate),$m_art[1]->pubdate); ?></p>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<?php if(isset($m_art[2])): ?>
				<div class="simple_nwfp">
					<div class="row">
						<div class="col-lg-3">
							<a href="<?php echo site_url() . 'article/' . $m_art[2]->parent_page . '/' . $m_art[2]->id; ?>">
								<img src="<?php echo site_url() . $m_art[2]->logo; ?>" alt="<?php echo $m_art[2]->title; ?>">
							</a>
						</div>
						<div class="col-lg-9">
							<p class="simple_nwfp_title">
								<a href="<?php echo site_url() . 'article/' . $m_art[2]->parent_page . '/' . $m_art[2]->id; ?>">
									<?php echo $m_art[2]->title; ?>
								</a>
							</p>
							<p class="simple_nwfp_pubdate"><?php echo anchor(site_url() . 'search/date_menager/' . e($m_art[2]->pubdate),$m_art[2]->pubdate); ?></p>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<?php if(isset($m_art[3])): ?>
				<div class="simple_nwfp">
					<div class="row">
						<div class="col-lg-3">
							<a href="<?php echo site_url() . 'article/' . $m_art[3]->parent_page . '/' . $m_art[3]->id; ?>">
								<img src="<?php echo site_url() . $m_art[3]->logo; ?>" alt="<?php echo $m_art[3]->title; ?>">
							</a>
						</div>
						<div class="col-lg-9">
							<p class="simple_nwfp_title">
								<a href="<?php echo site_url() . 'article/' . $m_art[3]->parent_page . '/' . $m_art[3]->id; ?>">
									<?php echo $m_art[3]->title; ?>
								</a>
							</p>
							<p class="simple_nwfp_pubdate"><?php echo anchor(site_url() . 'search/date_menager/' . e($m_art[3]->pubdate),$m_art[3]->pubdate); ?></p>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>	
		</div>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
</div>


	<!-- <div class="news_from_npages">
		<div class="head_nwfp">
			Nazwa strony
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="left_new">
					<a href="">
						<img src="holder.js/250x150" alt="">
					</a>
					<p class="title_nwfp">Lorem ipsum dolor sit amet.</p>
					<p class="pubdate_nwfp">30-11-2014</p>
					<p class="body_nwfp">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, repellendus?</p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="simple_nwfp">
					<div class="row">
						<div class="col-lg-3">
							<a href="">
								<img src="holder.js/70x70" alt="">
							</a>
						</div>
						<div class="col-lg-9">
							<p class="simple_nwfp_title">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, neque!</p>
							<p class="simple_nwfp_pubdate">30-11-2014</p>
						</div>
					</div>
				</div>
				<div class="simple_nwfp">
					<div class="row">
						<div class="col-lg-3">
							<a href="">
								<img src="holder.js/70x70" alt="">
							</a>
						</div>
						<div class="col-lg-9">
							<p class="simple_nwfp_title">Lorem ipsum dolor sit amet.</p>
							<p class="simple_nwfp_pubdate">30-11-2014</p>
						</div>
					</div>
				</div>
				<div class="simple_nwfp">
					<div class="row">
						<div class="col-lg-3">
							<a href="">
								<img src="holder.js/70x70" alt="">
							</a>
						</div>
						<div class="col-lg-9">
							<p class="simple_nwfp_title">Lorem ipsum dolor sit amet.</p>
							<p class="simple_nwfp_pubdate">30-11-2014</p>
						</div>
					</div>
				</div>
				<div class="simple_nwfp">
					<div class="row">
						<div class="col-lg-3">
							<a href="">
								<img src="holder.js/70x70" alt="">
							</a>
						</div>
						<div class="col-lg-9">
							<p class="simple_nwfp_title">Lorem ipsum dolor sit amet.</p>
							<p class="simple_nwfp_pubdate">30-11-2014</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->