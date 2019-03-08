<div class="modal fade" id="modal-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">New <?= $title ?></h4>
			</div>
			<div class="modal-body">

				<div id="validation_errors"></div>

				<form class="form-horizontal">

				<!-- firstname -->
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="first_name"><?= lang('first_name_input') ?>:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="first_name" placeholder="Enter <?= strtolower(lang('first_name_input')) ?>">
				    </div>
				  </div>

				  <!-- lastname -->
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="last_name"><?= lang('last_name_input') ?>:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="last_name" placeholder="Enter <?= strtolower(lang('last_name_input')) ?>">
				    </div>
				  </div>

				  <!-- username -->
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="username"><?= lang('username_input') ?>:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="username" placeholder="Enter <?= strtolower(lang('username_input')) ?>">
				    </div>
				  </div>

				  <!-- password -->
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="password"><?= lang('password_input') ?>:</label>
				    <div class="col-sm-8"> 
				      <input type="password" class="form-control" id="password" placeholder="Enter <?= strtolower(lang('password_input')) ?>">
				    </div>
				  </div>
				  
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					Close
				</button>

				<button type="button" class="btn btn-primary" id="btn-save-user">
					<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
					Save
				</button>
			</div>

				</form>
				<!-- end form -->
		</div>
	</div>
</div>