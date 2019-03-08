
<div class="modal fade" id="modal-delete-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-danger"><?= lang('delete_confirm') ?></h4>
			</div>
			<div class="modal-body">
				<div class="text-danger">
					<?= lang('delete_confirmation') ?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
				<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				No</button>
				<button type="button" class="btn btn-danger" id="confirm-delete-user">
				<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
				 Yes</button>
			</div>
		</div>
	</div>
</div>