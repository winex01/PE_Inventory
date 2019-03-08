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
		        	{ data: "added_by" },
		        	{ data: "condition" },
		        	{ data: "date_added" },
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


	function edit_equipment(id) {
		// console.log(id);
		$.ajax({
			url: '<?= base_url('equipment/edit') ?>',
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
				$('#edit_equipment_id').val(response.equipmentid);
				$('#edit_equipment_name').val(response.equipmentname);
				$('#edit_quantity').val(response.quantity);
				$('#edit_brand').val(response.brand);
				$('#edit_date_arrived').val(response.datearrived);
				$('#edit_condition_id').val(response.condition_id);
				$('#modal-edit-equipment').modal();
			}
		});
	}


	$('#btn-update-equipment').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var equipmentid = $('#edit_equipment_id').val();
		var equipmentname = $('#edit_equipment_name').val();
		var quantity = $('#edit_quantity').val();
		var brand = $('#edit_brand').val();
		var datearrived = $('#edit_date_arrived').val();
		var condition_id = $('#edit_condition_id').val();

		$.ajax({
			url: 'equipment/update',
			type: 'POST',
			dataType: 'json',
			data: {
				'<?php csrfName(); ?>' : '<?php csrfHash(); ?>',
				equipmentid		: equipmentid,
				equipmentname 	: equipmentname,
				quantity 		: quantity,
				brand 			: brand,
				datearrived 	: datearrived,
				condition_id 	: condition_id,
			},
		})
		.done(function(response) {
			if (response.updated == true) {
    			$.growl.notice({ message: response.flash });
    			$('#table-equipments').DataTable().ajax.reload();
    			$('#modal-edit-equipment').modal('hide');
    		}else {
    			$.growl.error({ message: response.flash })
    		}
		});
		
	});


	
</script>