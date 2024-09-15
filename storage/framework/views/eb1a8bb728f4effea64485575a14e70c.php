<script>
	$(function () {
		const table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			ajax: "<?php echo e(route('api.v1.datatables.settings.index')); ?>",
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex" },
				{ data: "key", name: "key" },
				{ data: "value", name: "value" },
				{ data: "remarks", name: "remarks" },
				{ data: "created_at", name: "created_at" },
			],
		});


	});
</script>
<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/settings/script.blade.php ENDPATH**/ ?>