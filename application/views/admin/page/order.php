<div class="row edit_data no_space">
	<div class="col-lg-10 col-lg-offset-1">
		<section>
			<h2>Segreguj strony</h2>
			<p class="alert alert-info">Drag and drop pages and press save <br> Przenieś i upuść strone w odpowiednim miejscu a następnie naciśnij zapisz.</p>
			<div id="orderResult"></div>
			<input type="button" id="save" value="Zapisz" class="btn btn-primary btn-lg btn_block">
			<?php //echo base_url('admin/page/order_ajax'); ?>
		</section>
	</div>
</div>
<div class="bottom_space"></div>

<script>
$(function() {
	$.post('<?php echo site_url('admin/page/order_ajax'); ?>', {}, function(data){
		$('#orderResult').html(data);
	});

	$('#save').click(function(){
		oSortable = $('.sortable').nestedSortable('toArray');
		
		$('#orderResult').slideUp(function(){
			$.post('<?php echo site_url('admin/page/order_ajax'); ?>', {sortable: oSortable}, function(data){
				$('#orderResult').html(data);
				$('#orderResult').slideDown();
			});
		});
		
	});

});
</script>