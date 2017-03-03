<div class="col-lg-4 left_left_body">
	<div class="random_posts">
		<div class="head_rp">
			Losowe artykuły
		</div>
		<?php if(isset($random_arts) && !empty($random_arts)): ?>
			<?php foreach($random_arts as $rand_art): ?>
				<!-- <div class="simply_rrp">
					<a href="<?php echo site_url() . 'article/' . $rand_art->parent_page . '/' . $rand_art->id; ?>">
						<img src="<?php echo site_url() . $rand_art->logo; ?>" alt="">
					</a>
					<div class="rrp_content">
						<div class="rrp_cat">
							<?php echo $rand_art->category; ?>
						</div>
						<div class="rrp_title">
							<a href="<?php echo site_url() . 'article/' . $rand_art->parent_page . '/' . $rand_art->id; ?>">
								<?php echo $rand_art->title; ?>
							</a>
						</div>
					</div>
				</div> -->
				<div class="simply_rrp">
					<a href="<?php echo site_url() . 'article/' . $rand_art->parent_page . '/' . $rand_art->id; ?>">
						<img src="<?php echo site_url() . $rand_art->logo; ?>" alt="<?php echo $rand_art->title; ?>">
					</a>
						<div class="rrp_content">
							<div class="rrp_cat">
							<ul>
								<?php $rp_cat = explode(',',$rand_art->category);
								foreach($rp_cat as $rpcat)
								{
									echo '<li>' . anchor(site_url() . 'search/category_menager/' . str_replace(' ','',$rpcat),$rpcat) . '</li>';
								}
								?>
							</ul>
							</div>
							<div class="rrp_title">
								<a href="<?php echo site_url() . 'article/' . $rand_art->parent_page . '/' . $rand_art->id; ?>">
									<?php echo $rand_art->title; ?>
								</a>
							</div>
						</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>	
	</div>
</div>