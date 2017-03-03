<div class="row edit_data no_space">
	<div class="col-lg-12">
		<h3><?php echo empty($page->id) ? 'Dodawanie nowej strony statycznej' : 'Edycja strony statycznej ' . $page->title; ?></h3>	
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
		<?php echo form_open(); ?>
		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Strona nadrzędna</p>
			</div>
			<div class="col-lg-4">
				<?php echo form_dropdown('parent_id', $pages_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id,'class="input_wp"'); ?>
				<i class="glyphicon glyphicon-question-sign"  data-trigger="hover" data-toggle="popover" data-placement="left" data-content="Aby chcesz aby ta strona była podstroną wybierz strone 'rodzica'."></i>
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
		<div class="row">
			<div class="col-lg-4">
				<p class="pull-right">Ładowanie domyślnego headera i stopki</p>
			</div>
			<div class="col-lg-1">
				<?php echo form_checkbox('headnfoot',1); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2">
				<p class="pull-right">Ścieżka do strony</p>
			</div>
			<div class="col-lg-4">
				<?php echo form_input('pageadress', '','class="input_wp"'); ?>
				<i class="glyphicon glyphicon-question-sign" data-trigger="hover" data-toggle="popover" data-placement="left" data-content="Niezbędne do prawidłowego ładowania twojej strony statycznej. Pliki strony muszą się znajdować w folderze application/views/static/. Podaj nazwe pliku strony bez rozszerzenia."></i>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-5">
				<?php echo form_submit('submit', 'Zapisz', 'class="btn btn-primary"'); ?>
			</div>
		</div>
		<?php echo form_close();?>
	</div>
</div>

