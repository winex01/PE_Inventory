<div class="modal fade" id="modal-report-equipment">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Report <?= $title ?></h4>
			</div>
			<div class="modal-body">

				<div id="validation_errors"></div>

				<form class="form-horizontal">

				<input type="hidden" id="report_equipment_id">

				<!-- report_equipment_name -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="report_equipment_name"><?= lang('equipment_name') ?>:</label>
					<div class="col-sm-8">
					  <input disabled type="text" class="form-control" id="report_equipment_name">
					</div>
				</div>

				<!-- report_quantity -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="report_quantity"><?= lang('quantity') ?>:</label>
					<div class="col-sm-8">
					  <input disabled type="number" min="1" class="form-control" id="report_quantity">
					</div>
				</div>

				<!-- report_brand -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="report_brand"><?= lang('brand') ?>:</label>
					<div class="col-sm-8">
					  <input disabled type="text" class="form-control" id="report_brand">
					</div>
				</div>

				<!-- report_condition_id -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="report_condition_id"><?= lang('condition') ?>:</label>
					<div class="col-sm-8">
						<select disabled class="form-control" id="report_condition_id">
							<?php foreach ($conditions as $condition): ?>
								<option value="<?= $condition->id ?>"><?= $condition->description ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<!-- report_loss -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="report_loss_quantity"><?= lang('report_loss') ?>:</label>
					<div class="col-sm-8">
					  <input autofocus type="number" value="1" min="1" class="form-control" id="report_loss_quantity">
					</div>
				</div>

				<!-- report_student_id -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="report_student_id"><?= lang('student_id') ?>:</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="report_student_id" placeholder="Enter <?= lang('student_id') ?>">
					</div>
				</div>

				<!-- report_student_name -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="report_student_name"><?= lang('student_name') ?>:</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="report_student_name" placeholder="Enter <?= lang('student_name') ?>">
					</div>
				</div>

				<!-- report_student_course -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="report_student_course"><?= lang('student_course') ?>:</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="report_student_course" placeholder="Enter <?= lang('student_course') ?>">
					</div>
				</div>

				<!-- report_date_lost -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="report_date_lost"><?= lang('date_lost') ?>:</label>
					<div class="col-sm-8">
					  <input type="date" value="<?= date_now() ?>" class="form-control" id="report_date_lost">
					</div>
				</div>

				<!-- report_reason -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="report_reason"><?= lang('reason') ?>:</label>
					<div class="col-sm-8">
					  <textarea class="form-control" id="report_reason"></textarea>
					</div>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					Close
				</button>

				<button type="button" class="btn btn-primary" id="btn-report-equipment">
					<span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
					Update
				</button>
			</div>

				</form>
				<!-- end form -->
		</div>
	</div>
</div>