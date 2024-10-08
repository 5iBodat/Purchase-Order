<script>
	$(function () {
		const table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			ajax: "<?php echo e(route('api.v1.datatables.school-majors.index')); ?>",
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex" },
				{ data: "name", name: "name" },
				{ data: "abbreviation", name: "abbreviation" },
				{ data: "action", name: "action" },
			],
		});

		$("#createModal form").submit(function (e) {
			e.preventDefault();

			const formData = {
				name: $("#createModal form #name").val(),
				abbreviation: $("#createModal form #abbreviation").val(),
			};

			$.ajax({
				url: "<?php echo e(route('api.v1.datatables.school-majors.store')); ?>",
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
						title: "Data jurusan berhasil ditambahkan!",
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

		$("#table").on("click", ".show-modal", function () {
			const id = $(this).data("id");
			let url =
				"<?php echo e(route('api.v1.datatables.school-majors.show', ':paramID')); ?>".replace(
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
					$("#showModal form #name").val(res.data.name);
					$("#showModal form #abbreviation").val(res.data.abbreviation);
				},
				error: (err) => {
					alert("error occured, check console");
					console.log(err);
				},
			});
		});

		$("#table").on("click", ".update-modal", function () {
			const id = $(this).data("id");
			let url =
				"<?php echo e(route('api.v1.datatables.school-majors.show', ':paramID')); ?>".replace(
					":paramID",
					id
				);
			let updateURL =
				"<?php echo e(route('api.v1.datatables.school-majors.update', ':paramID')); ?>".replace(
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
					$("#updateModal form #abbreviation").val(res.data.abbreviation);
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
				abbreviation: $("#updateModal form #abbreviation").val(),
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
						title: "Data kelas berhasil diubah!",
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
						"<?php echo e(route('api.v1.datatables.school-majors.destroy', ':paramID')); ?>".replace(
							":paramID",
							id
						);

					$.ajax({
						url: url,
						method: "DELETE",
						success: (res) => {
							Swal.fire({
								icon: "success",
								title: "Data berhasil dihapus!",
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
<?php /**PATH C:\Users\Unknown\OneDrive\Documents\KERJA\FREELANCE\sph\resources\views/school_majors/script.blade.php ENDPATH**/ ?>