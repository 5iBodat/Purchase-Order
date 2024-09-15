<script>
	$(function () {
		const table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			ajax: "<?php echo e(route('api.v1.datatables.po-transporter.index')); ?>",
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex" },
				{ data: "sph_code", name: "sph_code"},
				//{ data: "po_numbers", name: "po_numbers"},
				{
                    data: "po_numbers",
                    name: "po_numbers",
                    render: function(data, type, row) {
                        if (type === 'display') {
													if (data === null || data === ''){
														return `<span class="badge bg-info">PO Belum Dibuat</span>`;
													}
													}
                        return data;
                    }
        },
				{
					data: "po_date",
					name: "po_date",
					render: function(data, type, row) {
                        if (type === 'display') {
													if (data === null || data === ''){
														return `<span class="badge bg-info">-</span>`;
													}
													}
                        return data;
                    }
				},
				{ data: "requested_by",
					name: "requested_by",
					render: function(data, type, row) {
                        if (type === 'display') {
													if (data === null || data === ''){
														return `<span class="badge bg-info">-</span>`;
													}
													}
                        return data;
                    }
				},
				{ data: "shipped_by",
					name: "shipped_by",
					render: function(data, type, row) {
                        if (type === 'display') {
													if (data === null || data === ''){
														return `<span class="badge bg-info">-</span>`;
													}
													}
                        return data;
                    }
				},
				{ data: "fob",
					name: "fob",
					render: function(data, type, row) {
                        if (type === 'display') {
													if (data === null || data === ''){
														return `<span class="badge bg-info">-</span>`;
													}
													}
                        return data;
                    }
				},
				{ data: "term",
					name: "term",
					render: function(data, type, row) {
                        if (type === 'display') {
													if (data === null || data === ''){
														return `<span class="badge bg-info">-</span>`;
													}
													}
                        return data;
                    }
				},
				{ data: "transport",
					name: "transport",
					render: function(data, type, row) {
                        if (type === 'display') {
													if (data === null || data === ''){
														return `<span class="badge bg-info">-</span>`;
													}
													}
                        return data;
                    }
				},
				{ data: "po_status",
					name: "po_status",
					render: function(data, type, row) {
															if (data === null || data === '') {
        											return '<a href="#" class="open-upload-modal" data-id="${row.id}" data-sph-code="${data}"><span class="badge bg-primary">Buat PO</span></a>';
															}
															else if (data === 1) {
																	return '<span class="badge bg-info">Waiting Approval</span>';
															} else if (data === 2) {
																	return '<span class="badge bg-success">Approved</span>';
															} else {
																	return '<span class="badge bg-danger">Rejected</span>';
															}

													}
				},
				{ data: "updated_at",
					name: "updated_at",
					render: function(data, type, row) {
													if (type === 'display' || type === 'filter') {
															return moment(data).format('DD MMMM yyyy HH:mm');
													}
													return data;
											}
				},
				{ data: "action", name: "action" },

			],
		});

		// Event listener for opening the upload modal
		$("#table").on("click", ".open-upload-modal", function (e) {
            e.preventDefault();

            const id = $(this).data("id");
						const sphCode = $(this).data("sph-code");

            $("#uploadForm #po_id").val(id);
						$("#uploadForm #sph_code").val(sphCode);
            $("#uploadModal").modal("show");
        });

		// Handle form submit for file upload
		$("#uploadForm").submit(function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const url = "<?php echo e(route('api.v1.datatables.purchase-order.upload')); ?>";

            $.ajax({
                url: url,
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: (res) => {
                    table.ajax.reload();
                    $("#uploadModal").modal("hide");

                    Swal.fire({
                        icon: "success",
                        title: "PO berhasil diupload!",
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener("mouseenter", Swal.stopTimer);
                            toast.addEventListener("mouseleave", Swal.resumeTimer);
                        },
                    });
                },
                error: (err) => {
                    Swal.fire({
                        icon: "warning",
                        title: "Perhatian!",
                        text: err.responseJSON.message,
                    });
                },
            });
        });

	});
</script>
<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/po_transporter/script.blade.php ENDPATH**/ ?>