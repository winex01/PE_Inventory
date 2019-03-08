<script>
	$(document).ready(function() {
		var table = $('#table-users').DataTable( {
				    	ajax:  {
				        	url: '<?= base_url('user/get_lists') ?>',
				        	dataSrc: '',
				          	type: 'POST',
				          	dataType: 'json',
				          	data: {
				          		'<?php csrfName(); ?>' : '<?php csrfHash(); ?>'
				        	}
				       	}, 
				       	columns: [
				       		{ data: "first_name" },
				        	{ data: "last_name" },
				        	{ data: "username" },
				        	{ data: "added_by" },
				        	{ data: "action" },
				       	]  
			        } );
				} );
</script>


<script type="text/javascript">
	$(document).ready(function() {
		$('#btn-save-user').on('click', function(event) {
			event.preventDefault();
			/* Act on the event */

			var validate = '';
			var first_name = $('#first_name').val();
			var last_name = $('#last_name').val();
			var username = $('#username').val();
			var password = $('#password').val();

			// first_name validation
			if (first_name == null || first_name == '') {
				$('#first_name').parent().parent().addClass('has-error');
			}else {
		      $('#first_name').parent().parent().removeClass('has-error');
		      validate += '1';
		    }

		    // last_name validation
			if (last_name == null || last_name == '') {
				$('#last_name').parent().parent().addClass('has-error');
			}else {
		      $('#last_name').parent().parent().removeClass('has-error');
		      validate += '2';
		    }

			// username validation
			if (username == null || username == '') {
				$('#username').parent().parent().addClass('has-error');
			}else {
		      $('#username').parent().parent().removeClass('has-error');
		      validate += '3';
		    }

		    // password validation
			if (password == null || password == '') {
				$('#password').parent().parent().addClass('has-error');
			}else {
		      $('#password').parent().parent().removeClass('has-error');
		      validate += '4';
		    }
		    
		    if (validate == '1234') {
		    	$.ajax({
		    		url: '<?= base_url('user/create') ?>',
		    		type: 'POST',
		    		dataType: 'json',
		    		data: {
		    			'<?php csrfName(); ?>' : '<?php csrfHash(); ?>',
		    			first_name 	: first_name, 
		    			last_name 	: last_name, 
		    			username 	: username, 
		    			password 	: password, 
		    		},
		    	})
		    	.done(function(response) {
		    		console.log(response);
		    		if (response.inserted == true) {
		    			$.growl.notice({ message: response.flash });
		    			$('#table-users').DataTable().ajax.reload();
		    			$('#modal-user').modal('hide');
		    		}else {
		    			$.growl.error({ message: response.flash })
		    		}

		    	});
		    }
		});
		
	});

	function delete_user(id) {
		// console.log(id);
		$('#confirm-delete-user').val(id);
		$('#modal-delete-user').modal();
	}
	$('#confirm-delete-user').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).val();

		$.ajax({
			url: '<?= base_url('user/delete') ?>',
			type: 'POST',
			dataType: 'json',
			data: {
				'<?php csrfName(); ?>' : '<?php csrfHash(); ?>',
				id : id
			},
		})
		.done(function(response) {
			// console.log(response);
			if (response.deleted) {
				$.growl.notice({ message: response.flash });
				$('#table-users').DataTable().ajax.reload();
				$('#modal-delete-user').modal('hide');
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