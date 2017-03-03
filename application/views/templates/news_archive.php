<div class="news_archive_template">
	<?php if($pagination): ?>
		<div class="text-center">
			<section class="pagination"><?php echo $pagination; ?></section>
		</div>
	<?php endif; ?>
	<div class="articles_list">
		<?php if (count($articles)): foreach ($articles as $article): ?>
			<div class="row">
 				<article>
 					<div class="col-lg-3">
 						<a class="a_articles_list" href="<?php echo site_url() . 'article/' . $article->parent_page . '/' . $article->id; ?>">
 							<img src="<?php echo site_url() . $article->logo; ?>" alt="<?php echo $article->title; ?>">
 						</a>
 					</div>
 					<div class="col-lg-9 narticle_right">
 						<?php echo get_excerpt($article); ?>
 					</div>
 				</article>
 			</div><hr>
		<?php endforeach; endif; ?>
	</div>
	<?php if($pagination): ?>
		<div class="text-center">
			<section class="pagination"><?php echo $pagination; ?></section>
		</div>
	<?php endif; ?>
</div>
