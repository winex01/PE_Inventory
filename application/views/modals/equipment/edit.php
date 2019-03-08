<div class="modal fade" id="modal-edit-equipment">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit <?= $title ?></h4>
			</div>
			<div class="modal-body">

				<div id="validation_errors"></div>

				<form class="form-horizontal">

				<input type="hidden" id="edit_equipment_id">

				<!-- edit_equipment_name -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="edit_equipment_name"><?= lang('equipment_name') ?>:</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="edit_equipment_name" placeholder="Enter <?= strtolower(lang('equipment_name')) ?>">
					</div>
				</div>

				<!-- edit_quantity -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="edit_quantity"><?= lang('quantity') ?>:</label>
					<div class="col-sm-8">
					  <input type="number" min="1" class="form-control" id="edit_quantity" placeholder="Enter <?= strtolower(lang('quantity')) ?>">
					</div>
				</div>

				<!-- edit_brand -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="edit_brand"><?= lang('brand') ?>:</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="edit_brand" placeholder="Enter <?= strtolower(lang('brand')) ?>">
					</div>
				</div>

				<!-- edit_date_arrived -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="edit_date_arrived"><?= lang('date_arrived') ?>:</label>
					<div class="col-sm-8">
					  <input type="date" value="<?= date_now() ?>" class="form-control" id="edit_date_arrived" placeholder="Enter <?= strtolower(lang('date_arrived')) ?>">
					</div>
				</div>

				<!-- edit_condition_id -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="edit_condition_id"><?= lang('condition') ?>:</label>
					<div class="col-sm-8">
						<select class="form-control" id="edit_condition_id">
							<?php foreach ($conditions as $condition): ?>
								<option value="<?= $condition->id ?>"><?= $condition->description ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					Close
				</button>

				<button type="button" class="btn btn-primary" id="btn-update-equipment">
					<span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
					Update
				</button>
			</div>

				</form>
				<!-- end form -->
		</div>
	</div>
</div>