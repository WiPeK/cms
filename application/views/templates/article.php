<article class="article_template">
	<h2 class="article_title">
		<?php echo e($article->title); ?>
	</h2>
	<p class="pubdate">Data dodania: <span><?php echo anchor(site_url() . 'search/date_menager/' . e($article->pubdate),e($article->pubdate)) ; ?></span></p>
	<p class="category">Kategoria: 
			<?php
				$categ = explode(',',$article->category);
				foreach($categ as $cat)
				{
					echo '<span><a href="' . site_url() . 'search/category_menager/' . str_replace(' ','',$cat) . '">' . str_replace(' ','',$cat) . '</a></span>'; 
				}
			?>
	</p>
	<p class="add_by">
		Dodane przez:
		<span>
			<?php echo $article->created_by; ?>
		</span>
	</p>
	<p class="shows">
		Wyświetlenia:
		<span>
			<?php echo $article->views; ?> 
		</span>
	</p>
	<div class="clearfix"></div>
	<div class="article_body">
		<?php echo $article->body; ?>
	</div>
	<div class="article_tags">
	<p>Tagi:</p>
		<?php 
			$art_tags = explode(',',$article->tags);
			foreach($art_tags as $art_tag)
			{
				echo '<p class="tag_art"><a href="' . site_url() . 'search/tags_menager/' . str_replace(' ','',$art_tag) . '">' . e($art_tag) . '</a></p>';
			}
		?>
	</div>
</article>
<div class="clearfix"></div>
<div class="social_media_buttons">
	<div class="fb-like pull-left" data-href="<?php echo $cmscfg->fb_link; ?>" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
	<div class="g-plusone pull-left" data-size="medium" data-annotation="none" data-href="https://plus.google.com/101926306756321985062/posts/Nwo35Rfk2Ap"></div>

	<a class="twitter-share-button"
	  href="https://twitter.com/share"
	  data-via="twitterdev">
	Tweet
	</a>
	<script type="text/javascript">
	window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
	</script>
</div>	

<div class="simil_art">
	<h4>Podobne artykuły</h4>
	<?php foreach($similar_articles as $sim_art){
			echo '<p>' . anchor(site_url() . 'article/' . $sim_art->parent_page . '/' . $sim_art->id, $sim_art->title) . '</p>';
		}
	?>
</div>
<div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/" data-numposts="5" data-colorscheme="light" data-width="800"></div>