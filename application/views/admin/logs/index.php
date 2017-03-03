<div class="row edit_data no_space">
	<div class="col-lg-10">
		<h3>Logi</h3>
		<section>
			<table class="table table_hover">
				<thead>
					<tr>
						<th>Data</th>
						<th>Log</th>
					</tr>
				</thead>
				<tbody>
		<?php if(count($logs)): foreach($logs as $log): ?>	
				<tr>
					<td><?php echo $log->logdate; ?></td>
					<td><?php echo $log->logbody; ?></td>
				</tr>
		<?php endforeach; ?>
		<?php else: ?>
				<tr>
					<td class="col-lg-3">We could not find any logs.</td>
				</tr>
		<?php endif; ?>	
				</tbody>
			</table>
		</section>
	</div>
</div>
