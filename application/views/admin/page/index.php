<div class="row no_space">
	<div class="col-lg-10 col-lg-offset-1">
		<section>
			<h2>Strony</h2>
			<a href="page/edit">
				<button class="btn btn-default add_user_bt">
					<i class="glyphicon glyphicon-plus"></i> Dodaj stronę
				</button>
			</a>
			<a href="page/staticpage">
				<button class="btn btn-default add_user_bt">
					<i class="glyphicon glyphicon-plus"></i> Dodaj stronę statyczną
				</button>
			</a>
			<table class="table table_hover">
				<thead>
					<tr>
						<th>Tytuł</th>
						<th>Strona nadrzędna</th>
						<th>Szablon</th><!--  strona czy news archive-->
						<th>Wyświetlenia</th>
						<th>Edytuj</th>
						<th>Usuń</th>
					</tr>
				</thead>
				<tbody>
		<?php if(count($pages)): foreach($pages as $page): ?>	
				<tr>
					<td>
					<?php
						if($page->template != 'static')
						{
							echo anchor('admin/page/edit/' . $page->id, $page->title); 
						} 
						elseif($page->template === 'static')
						{
							echo $page->title;
						}
						echo ' ' . anchor(site_url() . $page->slug, '<i class="glyphicon glyphicon-th-large pull-right"></i>');
					?>
					</td>
					<td><?php echo $page->parent_slug; ?></td>
					<td><?php  
						if($page->template == 'page')
						{
							echo 'Zwykła strona';
						}
						elseif($page->template == 'news_archive')
						{
							echo 'Strona z artykułami';
						}
						elseif($page->template == 'static')
						{
							echo 'Strona statyczna';
						}
						elseif($page->template == 'homepage')
						{
							echo 'Strona główna';
						}
					?></td>
					<td><?php echo $page->views; ?></td>
					<td>
						<?php
							if($page->template != 'static')
							{
								echo btn_edit('admin/page/edit/' . $page->id); 
							}
						?>
					</td>
					<td><?php echo btn_delete('admin/page/delete/' . $page->id); ?></td>
				</tr>
		<?php endforeach; ?>
		<?php else: ?>
				<tr>
					<td class="col-lg-3">We could not find any pages.</td>
				</tr>
		<?php endif; ?>	
				</tbody>
			</table>
		</section>
	</div>
</div>
