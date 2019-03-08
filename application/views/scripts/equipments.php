<script>
	$(document).ready(function() {
		$('#table-equipments').DataTable( {
		    	ajax:  {
		        	url: '<?= base_url('equipment/get_lists') ?>',
		        	dataSrc: '',
		          	type: 'POST',
		          	dataType: 'json',
		          	data: {
		          		'<?php csrfName(); ?>' : '<?php csrfHash(); ?>'
		        	}
		       	}, 
		       	columns: [
		       		{ data: "equipment_name" },
		        	{ data: "quantity" },
		        	{ data: "brand" },
		        	{ data: "date_arrived" },
		        	{ data: "date_added" },
		        	{ data: "added_by" },
		        	{ data: "condition" },
		        	{ data: "action" },
		       	]  
	        } );
		} );
</script>


<script type="text/javascript">
	$(document).ready(function() {
		$('#btn-save-equipment').on('click', function(event) {
			event.preventDefault();
			/* Act on the event */

			var validate = '';
			var equipment_name = $('#equipment_name').val();
			var quantity = $('#quantity').val();
			var brand = $('#brand').val();
			var date_arrived = $('#date_arrived').val();
			var condition_id = $('#condition_id').val();

			// equipment_name validation
			if (equipment_name == null || equipment_name == '') {
				$('#equipment_name').parent().parent().addClass('has-error');
			}else {
		      $('#equipment_name').parent().parent().removeClass('has-error');
		      validate += '1';
		    }

		    // quantity validation
			if (quantity == null || quantity == '') {
				$('#quantity').parent().parent().addClass('has-error');
			}else {
		      $('#quantity').parent().parent().removeClass('has-error');
		      validate += '2';
		    }

		    // brand validation
			if (brand == null || brand == '') {
				$('#brand').parent().parent().addClass('has-error');
			}else {
		      $('#brand').parent().parent().removeClass('has-error');
		      validate += '3';
		    }

		    // date_arrived validation
			if (date_arrived == null || date_arrived == '') {
				$('#date_arrived').parent().parent().addClass('has-error');
			}else {
		      $('#date_arrived').parent().parent().removeClass('has-error');
		      validate += '4';
		    }

		    // condition_id validation
			if (condition_id == null || condition_id == '') {
				$('#condition_id').parent().parent().addClass('has-error');
			}else {
		      $('#condition_id').parent().parent().removeClass('has-error');
		      validate += '5';
		    }


		    
		    if (validate == '12345') {
		    	$.ajax({
		    		url: '<?= base_url('equipment/create') ?>',
		    		type: 'POST',
		    		dataType: 'json',
		    		data: {
		    			'<?php csrfName(); ?>' : '<?php csrfHash(); ?>',
		    			equipment_name 	: equipment_name, 
		    			quantity 		: quantity, 
		    			brand 			: brand, 
		    			date_arrived 	: date_arrived, 
		    			condition_id 	: condition_id, 
		    		},
		    	})
		    	.done(function(response) {
		    		console.log(response);
		    		if (response.inserted == true) {
		    			$.growl.notice({ message: response.flash });
		    			$('#table-equipments').DataTable().ajax.reload();
		    			$('#modal-equipment').modal('hide');
		    		}else {
		    			$.growl.error({ message: response.flash })
		    		}

		    	});
		    }
		});
		
	});

	function delete_equipment(id) {
		// console.log(id);
		$('#confirm-delete-equipment').val(id);
		$('#modal-delete-equipment').modal();
	}
	$('#confirm-delete-equipment').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).val();

		$.ajax({
			url: '<?= base_url('equipment/delete') ?>',
			type: 'POST',
			dataType: 'json',
			data: {
				'<?php csrfName(); ?>' : '<?php csrfHash(); ?>',
				id : id
			},
		})
		.done(function(response) {
			console.log(response);
			if (response.deleted) {
				$.growl.notice({ message: response.flash });
				$('#table-equipments').DataTable().ajax.reload();
				$('#modal-delete-equipment').modal('hide');
			}
		});
		
	});


	function edit_user(id) {
		// console.log(id);
		$.ajax({
			url: '<?= base_url('user/edit') ?>',
			type: 'POST',
			dataType: 'json',
			data: {
				'<?php csrfName(); ?>' : '<?php csrfHash(); ?>',
				id : id
			},
		})
		.done(function(response) {
			if (response) {
				console.log(response);
				$('#edit_user_id').val(response.id);
				$('#edit_first_name').val(response.first_name);
				$('#edit_last_name').val(response.last_name);
				$('#edit_username').val(response.username);
				$('#modal-edit-user').modal();
			}
		});
	}


	$('#btn-update-user').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $('#edit_user_id').val();
		var first_name = $('#edit_first_name').val();
		var last_name = $('#edit_last_name').val();
		var username = $('#edit_username').val();

		$.ajax({
			url: 'user/update',
			type: 'POST',
			dataType: 'json',
			data: {
				'<?php csrfName(); ?>' : '<?php csrfHash(); ?>',
				id : id,
				first_name : first_name,
				last_name : last_name,
				username : username,
			},
		})
		.done(function(response) {
			if (response.updated == true) {
    			$.growl.notice({ message: response.flash });
    			$('#table-users').DataTable().ajax.reload();
    			$('#modal-edit-user').modal('hide');
    		}else {
    			$.growl.error({ message: response.flash })
    		}
		});
		
	});


	
</script>