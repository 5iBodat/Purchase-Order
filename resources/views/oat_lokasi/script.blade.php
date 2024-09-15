<script>
	$(function () {
		const table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('api.v1.datatables.oatlokasi.index') }}",
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex" },
				{ data: "name", name: "name" },
				{
					data: "price",
					name: "price",
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
				name: $("#createModal form #name").val(),
				price: $("#createModal form #price").val(),
			};

			$.ajax({
				url: "{{ route('api.v1.datatables.oatlokasi.store') }}",
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
						title: "Data OAT Lokasi berhasil ditambahkan!",
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
				"{{ route('api.v1.datatables.oatlokasi.show', ':paramID') }}".replace(
					":paramID",
					id
				);
			let updateURL =
				"{{ route('api.v1.datatables.oatlokasi.update', ':paramID') }}".replace(
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
					$("#updateModal form #name").val(res.data.name);
					$("#updateModal form #price").val(res.data.price);
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
				name: $("#updateModal form #name").val(),
				price: $("#updateModal form #price").val(),
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
						title: "Data OAT Lokasi berhasil diubah!",
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
						"{{ route('api.v1.datatables.oatlokasi.destroy', ':paramID') }}".replace(
							":paramID",
							id
						);

					$.ajax({
						url: url,
						method: "DELETE",
						success: (res) => {
							Swal.fire({
								icon: "success",
								title: "Data OAT Lokasi berhasil dihapus!",
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
