<div class="row edit_data no_space">
	<div class="col-lg-12">
		<h3><?php echo empty($article->id) ? 'Dodaj artykuł' : 'Edycja artykułu ' . $article->title; ?></h3>
		<?php if($error): ?>
			<div class="alert alert-warning" role="alert">
				<?php echo $error; ?>
			</div>
		<?php endif; ?>	
		<?php if(validation_errors()): ?>
			<div class="alert alert-warning" role="alert">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?php echo form_open_multipart('admin/article/edit/' . $this->uri->segment(4)); ?>
		
		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Logo artykułu</p>
			</div>
			<div class="col-lg-3">
				<?php if($article->logo != 0 || $article->logo != null || $article->logo != '' || $article->logo == ' '): ?>
					<div class="article_logo">
						<img src="<?php echo site_url() . $article->logo; ?>" alt="" class="logo_edit">
						<span>
							<?php echo anchor('admin/article/deletelogo/' . $article->id, '<i class="glyphicon glyphicon-remove"></i>', array(
								'onclick' => "return confirm('Czy napewno chcesz usunąć logo? Wszystkie niezapisane edytowane elementy zostaną niezapisane. Zapisz edycję a następnie usuń logo. Czy nadal chcesz usunąć logo?');"
							)) ?>
						</span>
					</div>
				<?php elseif($article->logo == 0 || $article->logo == null || $article->logo == '' || $article->logo == ' '): ?>
					<?php echo form_upload('article_logo','','class="input_file"'); ?>
				<?php endif; ?>	
			</div>
			<div class="col-lg-3 no_space">
				<p class="pull-right">Strona do której zostanie dodany artykuł</p>
			</div>
			<div class="col-lg-4">
				<?php echo form_dropdown('parent_page', $article_parent, $this->input->post('parent_page') ? $this->input->post('parent_page') : $article->parent_page); ?>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Data publikacji</p>
			</div>
			<div class="col-lg-4">
				<?php echo form_input('pubdate', set_value('pubdate', $article->pubdate), 'class="datepicker"'); ?>
			</div>
			<div class="col-lg-2">
				<p class="pull-right">Tytuł</p>
			</div>
			<div class="col-lg-4">
				<?php echo form_input('title', set_value('title', $article->title)); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Kategoria</p>
			</div>
			<div class="col-lg-4">
				<?php echo form_input('category', set_value('category', $article->category)); ?>
			</div>
			<div class="col-lg-2">
				<p class="pull-right">Tagi</p>
			</div>
			<div class="col-lg-4">
				<?php echo form_input('tags', set_value('tags', $article->tags)); ?>
			</div>
		</div>

		<h3>
			<a href="http://getbootstrap.com/components/" target="_blank">
				 <button type="button" class="btn btn-primary no_border_radius">Elementy z których możesz skorzystać</button>
			</a>
			<a href="#filesid">
				<button type="button" class="btn btn-primary no_border_radius">Pliki</button>
			</a>
		</h3>

		<div class="row">
			<div class="col-lg-2">
				<p>Treść</p>
			</div>
			<div class="col-lg-12">
				<?php echo form_textarea('body', set_value('body', $article->body), 'id="ckeditor"'); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<?php echo form_submit('submit', 'Zapisz', 'class="btn btn-primary btn-lg btn-block btn_save_data"'); ?>
			</div>
		</div>	
		<?php echo form_close();?>
	</div>
</div>
<?php $this->load->view('admin/include/files_urls'); ?>
<div class="bottom_space"></div>

<script>
$(function() {
	$('.datepicker').datepicker({ format : 'yyyy-mm-dd' });
});
</script>