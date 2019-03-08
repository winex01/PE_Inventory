<div class="modal fade" id="modal-equipment">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">New <?= $title ?></h4>
			</div>
			<div class="modal-body">

				<div id="validation_errors"></div>

				<form class="form-horizontal">

				<!-- equipment_name -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="equipment_name"><?= lang('equipment_name') ?>:</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="equipment_name" placeholder="Enter <?= strtolower(lang('equipment_name')) ?>">
					</div>
				</div>

				<!-- quantity -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="quantity"><?= lang('quantity') ?>:</label>
					<div class="col-sm-8">
					  <input type="number" min="1" class="form-control" id="quantity" placeholder="Enter <?= strtolower(lang('quantity')) ?>">
					</div>
				</div>

				<!-- brand -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="brand"><?= lang('brand') ?>:</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="brand" placeholder="Enter <?= strtolower(lang('brand')) ?>">
					</div>
				</div>

				<!-- date_arrived -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="date_arrived"><?= lang('date_arrived') ?>:</label>
					<div class="col-sm-8">
					  <input type="date" value="<?= date_now() ?>" class="form-control" id="date_arrived" placeholder="Enter <?= strtolower(lang('date_arrived')) ?>">
					</div>
				</div>

				<!-- condition_id -->
				<div class="form-group">
					<label class="control-label col-sm-4" for="condition_id"><?= lang('condition') ?>:</label>
					<div class="col-sm-8">
						<select class="form-control" id="condition_id">
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

				<button type="button" class="btn btn-primary" id="btn-save-equipment">
					<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
					Save
				</button>
			</div>

				</form>
				<!-- end form -->
		</div>
	</div>
</div>