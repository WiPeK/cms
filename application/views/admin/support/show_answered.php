<div class="row no_space edit_data row_suppan">
	<div class="col-lg-10 col-lg-offset-1">
		<div class="row answer_block">
				<div class="col-lg-2">
					<p class="pull-right">
						Zgłoszenie wysłane od:
					</p>
				</div>
				<div class="col-lg-10">
					<?php echo e($show_answer->email); ?>
				</div>		
		</div>

		<div class="row answer_block">
				<div class="col-lg-2">
					<p class="pull-right">
						Treść zgłoszenia:
					</p>
				</div>
				<div class="col-lg-10">
					<?php echo e($show_answer->body); ?>
				</div>
		</div>

		<div class="row answer_block">
				<div class="col-lg-2">
					<p class="pull-right">
						Data wysłania zgłoszenia:
					</p>
				</div>
				<div class="col-lg-10">
					<?php echo e($show_answer->send_date); ?>
				</div>	
		</div>

		<div class="row answer_block">
				<div class="col-lg-2">
					<p class="pull-right">
						Data odpowiedzi:
					</p>
				</div>
				<div class="col-lg-10">
					<?php echo e($show_answer->answer_date); ?>
				</div>
		</div>

		<div class="row answer_block">
				<div class="col-lg-2">
					<p class="pull-right">
						Odpowiedź udzielona przez:
					</p>
				</div>
				<div class="col-lg-10">
					<?php echo e($show_answer->who_answer); ?>
				</div>
		</div>

		<div class="row answer_block">
				<div class="col-lg-2">
					<p class="pull-right">
						Treść odpowiedzi:
					</p>
				</div>
				<div class="col-lg-10">
					<?php echo $show_answer->answer_body; ?>
				</div>
		</div>
	</div>
</div>