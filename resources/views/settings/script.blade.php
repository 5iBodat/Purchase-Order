<script>
	$(function () {
		const table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('api.v1.datatables.settings.index') }}",
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
