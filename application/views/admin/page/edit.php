<div class="row edit_data no_space">
	<div class="col-lg-12">
		<h3><?php echo empty($page->id) ? 'Dodawanie nowej strony' : 'Edycja strony ' . $page->title; ?></h3>	
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
		<?php echo form_open_multipart('admin/page/edit/' . $this->uri->segment(4)); ?>
		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Logo strony</p>
			</div>
			<div class="col-lg-4">
				<?php if($page->logo != 0 || $page->logo != null || $page->logo != '' || $page->logo == ' '): ?>
					<div class="page_logo">
						<img src="<?php echo site_url() . $page->logo; ?>" alt="" class="logo_edit">
						<span>
							<?php echo anchor('admin/page/deletelogo/' . $page->id, '<i class="glyphicon glyphicon-remove"></i>', array(
								'onclick' => "return confirm('Czy napewno chcesz usunąć logo? Wszystkie niezapisane edytowane elementy zostaną niezapisane. Zapisz edycję a następnie usuń logo. Czy nadal chcesz usunąć logo?');"
							)) ?>
						</span>
					</div>
				<?php elseif($page->logo == 0 || $page->logo == null || $page->logo == '' || $page->logo == ' '): ?>
					<?php echo form_upload('page_logo','','class="input_file"'); ?>
				<?php endif; ?>	
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Strona nadrzędna</p>
			</div>
			<div class="col-lg-4">
				<?php echo form_dropdown('parent_id', $pages_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id,'class="input_wp"'); ?>
				<i class="glyphicon glyphicon-question-sign"  data-trigger="hover" data-toggle="popover" data-placement="left" data-content="Aby chcesz aby ta strona była podstroną wybierz strone 'rodzica'."></i>
			</div>
			<div class="col-lg-2">
				<p class="pull-right">Szablon</p>
			</div>
			<div class="col-lg-4">
				<?php echo form_dropdown('template', array('page' => 'Page', 'news_archive' => 'News archive'), $this->input->post('template') ? $this->input->post('template') : $page->template,'class="input_wp"'); ?>
				<i class="glyphicon glyphicon-question-sign" data-trigger="hover" data-toggle="popover" data-placement="left" data-content="Wybierz typ strony: zwykła strona lub strona zawierająca artykuły."></i>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Tytuł</p>
			</div>
			<div class="col-lg-4">
				<?php echo form_input('title', set_value('title', $page->title),'class="input_wp"'); ?>
			</div>
			<div class="col-lg-2">
				<p class="pull-right">Alias</p>
			</div>
			<div class="col-lg-4">
				<?php echo form_input('slug', set_value('slug', $page->slug),'class="input_wp"'); ?>
				<i class="glyphicon glyphicon-question-sign" data-trigger="hover" data-toggle="popover" data-placement="left" data-content="Nazwa strony jaka będzie wyświetlana w pasku adresu."></i>
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
				<?php echo form_textarea('body', set_value('body', $page->body), 'id="ckeditor"'); ?>
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

