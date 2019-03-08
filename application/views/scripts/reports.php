<script>
	$(document).ready(function() {
		var date = $('#date').val();
		$('#table-reports').DataTable( {
	    	ajax:  {
	        	url: '<?= base_url('report/get_lists') ?>',
	        	dataSrc: '',
	          	type: 'POST',
	          	dataType: 'json',
	          	data: {
	          		'<?php csrfName(); ?>' : '<?php csrfHash(); ?>',
	          		date : date
	        	}
	       	}, 
	       	columns: [
	       		{ data: "studentid" },
	        	{ data: "studentname" },
	        	{ data: "studentcourse" },
	        	{ data: "lostitem" },
	        	{ data: "reason" },
	        	{ data: "datelost" },
	        	{ data: "dateadded" },
	        	{ data: "quantity" },
	        	{ data: "brand" },
	       	],
        } );




		$('#date').on('change',  function(event) {
			event.preventDefault();
			/* Act on the event */
			var date = $(this).val();
      
			if (date != '') {
				$('#table-reports').DataTable( {
					destroy: true,
			    	ajax:  {
			        	url: '<?= base_url('report/get_lists') ?>',
			        	dataSrc: '',
			          	type: 'POST',
			          	dataType: 'json',
			          	data: {
			          		'<?php csrfName(); ?>' : '<?php csrfHash(); ?>',
			          		date : date
			        	}
			       	}, 
			       	columns: [
			       		{ data: "studentid" },
			        	{ data: "studentname" },
			        	{ data: "studentcourse" },
			        	{ data: "lostitem" },
			        	{ data: "reason" },
			        	{ data: "datelost" },
			        	{ data: "dateadded" },
			        	{ data: "quantity" },
			        	{ data: "brand" },
			       	],
		        } );
			}
		});


		$('#print').on('click',  function(event) {
			event.preventDefault();
			/* Act on the event */
			// window.print();

		});




	} );
</script>

<script type="text/javascript">
	$(function () {
	    $('#print').click(function () {
	        var pageTitle = 'Page Title',
	            stylesheet = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css',
	            win = window.open('', 'Print', 'width=500,height=300');
	        win.document.write('<html><head><title>' + pageTitle + '</title>' +
	            '<link rel="stylesheet" href="' + stylesheet + '">' +
	            '</head><body>' + $('.table')[0].outerHTML + '</body></html>');
	        win.document.close();
	        win.print();
	        win.close();
	        return false;
	    });
	});
</script>
