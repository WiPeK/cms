<div class="row edit_data no_space">
	<div class="col-lg-10 col-lg-offset-1">		
		<div id="upload">
			<h3>Zuploaduj zdjęcie</h3>
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
			<?php echo form_open_multipart('admin/gallery/do_upload'); ?>
			<div class="row">
				<div class="col-lg-2">
					<p class="pull-right">Tytuł obrazka:</p>
				</div>
				<div class="col-lg-4">
					<?php echo form_input('img_title');//echo form_textarea('opis'); ?>
				</div>
				<div class="col-lg-2">
					<p class="pull-right">Wybierz plik:</p> 
				</div>
				<div class="col-lg-4">
					<?php echo form_upload('userfile','','class="input_file"'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<?php echo form_submit('upload', 'Upload','class="btn_upload"'); ?>
				</div>
			</div>
			<?php echo form_close(); ?>					
		</div>

		<div id="gallery">
			<div class="row row_gallery">
				<?php if(isset($images) && count($images)):  
					foreach($images as $image): ?>
					<div class="col-lg-2">	
						<div class="img_a">
							<a class="" href="<?php echo $image['img_url']; ?>">
								<img src="<?php echo site_url() . $image['thumb_url']; ?>" alt="">
							<span><?php echo btn_delete('admin/gallery/delete_image/' . $image['id']); ?></span><br>
							</a> 
						</div>
					</div>
				<?php endforeach; else: ?>
					<div id="blank_gallery">Please upload an image</div>
				<?php endif; ?>
			</div>
			
		</div>
	</div>
</div>

