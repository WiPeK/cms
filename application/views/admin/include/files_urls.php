<div class="row edit_data no_space">
	<div class="col-lg-12" id="filesid">
		<button type="button" class="btn btn-primary btn-lg btn-block no_border_radius files_button">Pliki</button>
		<section id="files_hs">
			<table class="table table_hover">
				<thead>
					<tr>
						<th>Plik</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($files)): foreach($files as $file): ?>
						<tr>
							<td>
								<p><?php echo $file->file_title . $file->extension; ?></p>
							<br>
								<div class="well no_border_radius well_files">		
									<?php echo site_url() . 'download_menager/' . urlencode(base64_encode($file->file_title . $file->extension)) . '/' . $file->raw_name; ?>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td class="col-lg-3">Nie znaleziono żadnego pliku</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
			<button type="button" class="btn btn-default files_button_hd no_border_radius">Ukryj pliki</button>
		</section>
	</div>
</div>