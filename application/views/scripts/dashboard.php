<script type="text/javascript">
	<?php if (!empty(welcome())): ?>
		$.growl.notice({ message: "<?= welcome() ?>" });
	<?php endif; ?>
</script>