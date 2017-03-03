<div class="row edit_data">
	<div class="col-lg-12 col-articles">
		<h3>Artykuły</h3>
		<a href="<?php echo site_url() . 'admin/article/edit' ?>">
			<button class="btn btn-default add_user_bt">
				<i class="glyphicon glyphicon-plus"></i> Dodaj artykuł
			</button>
		</a>
		<div class="paginationdiv text-center">
		<?php if($pagination): ?>
			<section class="pagination"><?php echo $pagination; ?></section>
		<?php endif; ?>	
		</div>
		<section>
		<table class="table table_hover">
			<thead>
				<tr>
					<th>Tytuł</th>
					<th>Data publikacji</th>
					<th>Strona</th>
					<th>Liczba odsłon</th>
					<th>Edytuj</th>
					<th>Usuń</th>
				</tr>
			</thead>
			<tbody>
		<?php if(count($articles)): foreach($articles as $article): ?>	
			<tr>
				<td class="art_tit"><?php echo anchor('admin/article/edit/' . $article->id, $article->title);
					echo ' ' . anchor(site_url() . 'article/' . $article->parent_page . '/' . $article->id, '<i class="glyphicon glyphicon-th-large pull-right"></i>');
				?></td>
				<td><?php echo $article->pubdate; ?></td>
				<td><?php echo str_replace('_',' ',$article->parent_page); ?></td>
				<td><?php echo $article->views; ?></td>
				<td><?php echo btn_edit('admin/article/edit/' . $article->id); ?></td>
				<td><?php echo btn_delete('admin/article/delete/' . $article->id); ?></td>
			</tr>
		<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td class="col-lg-3">Nie można znaleźć żadnego artykułu</td>
			</tr>
		<?php endif; ?>	
			</tbody>
		</table>
		</section>
		<div class="paginationdiv text-center">
			<?php if($pagination): ?>
				<section class="pagination"><?php echo $pagination; ?></section>
			<?php endif; ?>	
		</div>
		<div class="bottom_space"></div>
	</div>
</div>
