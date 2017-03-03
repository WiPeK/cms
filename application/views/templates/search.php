<div class="news_archive_template">
	<div class="articles_list">
		<h3 class="article_search">Wyniki</h3>
		<?php if (count($search_data)): foreach ($search_data as $sr_data): ?>
			<div class="row">
 				<article>
 					<div class="col-lg-3">
 						<a class="a_articles_list" href="<?php echo site_url() . 'article/' . $sr_data->parent_page . '/' . $sr_data->id; ?>">
 							<img src="<?php echo site_url() . $sr_data->logo; ?>" alt="<?php echo $sr_data->title; ?>">
 						</a>
 					</div>
 					<div class="col-lg-9 narticle_right">
 						<?php echo get_excerpt($sr_data); ?>
 					</div>
 				</article>
 			</div><hr>
		<?php endforeach; else: ?>
			<div class="row">
				<article>
					<div class="col-lg-12">
						<p>Nie znaleziono pasujących wyników</p>
					</div>
				</article>
			</div>
		<?php endif; ?>	
	</div>
</div>
