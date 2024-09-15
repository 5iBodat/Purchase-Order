<script>
	$(function () {
		const table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			ajax: "<?php echo e(route('api.v1.datatables.item.index')); ?>",
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex" },
				{ data: "item_name", name: "item_name" },
				{ data: "item_description", name: "item_description" },
				{
					data: "item_price",
					name: "item_price",
					render: function(data, type, row) {
					if (type === 'display' || type === 'filter') {
							// Ubah data ke dalam format Rupiah
							var rupiah = Number(data).toLocaleString('id-ID', {
									style: 'currency',
									currency: 'IDR'
							});
							return rupiah;
					}
					return data;
    }
				},
				{
                    data: 'updated_at',
                    name: 'updated_at',
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

		$("#createModal form").submit(function (e) {
			e.preventDefault();

			const formData = {
				item_name: $("#createModal form #item_name").val(),
				item_description: $("#createModal form #item_description").val(),
				item_price: $("#createModal form #item_price").val(),
			};

			$.ajax({
				url: "<?php echo e(route('api.v1.datatables.item.store')); ?>",
				method: "POST",
				header: {
					"Content-Type": "application/json",
				},
				data: formData,
				success: (res) => {
					table.ajax.reload();
					$("#createModal").modal("hide");

					Swal.fire({
						icon: "success",
						title: "Data item / produk berhasil ditambahkan!",
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
						text: err.responseJSON.messages,
					});
				},
			});
		});

		$("#table").on("click", ".update-modal", function () {
			const id = $(this).data("id");
			let url =
				"<?php echo e(route('api.v1.datatables.item.show', ':paramID')); ?>".replace(
					":paramID",
					id
				);
			let updateURL =
				"<?php echo e(route('api.v1.datatables.item.update', ':paramID')); ?>".replace(
					":paramID",
					id
				);

			$.ajax({
				url: url,
				method: "GET",
				header: {
					"Content-Type": "application/json",
				},
				success: (res) => {
					$("#updateModal form #item_name").val(res.data.item_name);
					$("#updateModal form #item_price").val(res.data.item_price);
					$("#updateModal form #item_description").val(res.data.item_description);
					$("#updateModal form").attr("action", updateURL);
				},
				error: (err) => {
					alert("error occured, check console");
					console.log(err);
				},
			});
		});

		$("#updateModal form").submit(function (e) {
			e.preventDefault();

			const formData = {
				item_name: $("#updateModal form #item_name").val(),
				item_price: $("#updateModal form #item_price").val(),
				item_description: $("#updateModal form #item_description").val(),
			};

			const updateURL = $("#updateModal form").attr("action");

			$.ajax({
				url: updateURL,
				method: "PUT",
				header: {
					"Content-Type": "application/json",
				},
				data: formData,
				success: (res) => {
					table.ajax.reload();
					$("#updateModal").modal("hide");

					Swal.fire({
						icon: "success",
						title: "Data item / produk berhasil diubah!",
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

		$("#table").on("click", ".delete", function (e) {
			e.preventDefault();

			Swal.fire({
				title: "Hapus?",
				text: "Data tersebut akan dihapus!",
				icon: "warning",
				showCancelButton: true,
				reverseButtons: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				cancelButtonText: "Tidak",
				confirmButtonText: "Ya!",
			}).then((result) => {
				if (result.isConfirmed) {
					const id = $(this).data("id");
					const url =
						"<?php echo e(route('api.v1.datatables.item.destroy', ':paramID')); ?>".replace(
							":paramID",
							id
						);

					$.ajax({
						url: url,
						method: "DELETE",
						success: (res) => {
							Swal.fire({
								icon: "success",
								title: "Data item / produk berhasil dihapus!",
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

							table.ajax.reload();
						},
						error: (err) => {
							Swal.fire({
								icon: "warning",
								title: "Perhatian!",
								text: err.responseJSON.message,
							});
						},
					});
				}
			});
		});
	});
</script>
<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/item/script.blade.php ENDPATH**/ ?>