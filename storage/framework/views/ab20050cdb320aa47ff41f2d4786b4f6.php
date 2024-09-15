<script>
	$(function () {
		const table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			ajax: "<?php echo e(route('api.v1.datatables.sph.index')); ?>",
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex" },
				{ data: "sph_type", name: "sph_type" },
				{ data: "sph_code", name: "sph_code" },
				/*
                    data: "sph_code",
                    name: "sph_code",
                    render: function(data, type, row) {
                        if (type === 'display') {
													if (row.status !== 4){
														return `<a href="#" class="open-upload-modal" data-id="${row.id}" data-sph-code="${data}">${data}</a>`;
													}
													}
                        return data;
                    }
                },*/
				{ data: "status", name: "status" ,
					render: function(data, type, row) {
                    if (data === 1) {
                        return '<span class="badge bg-info">Submitted</span>';
                    } else if (data === 2) {
                        return '<span class="badge bg-danger">Rejected</span>';
                    } else if (data === 3) {
                        return '<span class="badge bg-success">Approved</span>';
                    } else {
											return '<span class="badge bg-primary">PO Received</span>';
										}
                }
				},
				{ data: "company_name", name: "company_name" },
				{ data: "company_pic", name: "company_pic" },
				{ data: "telepon_pic", name: "telepon_pic" },
				{ data: "product_name", name: "product_name" },
				{ data: "harga", name: "harga",
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
				{ data: "ppn", name: "ppn",
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
				{ data: "pbbkb", name: "pbbkb",
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
				{ data: "total", name: "total",
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
				{ data: "oatlokasi", name: "oatlokasi" },
				{ data: "hargaoat", name: "hargaoat",
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
				{ data: "username", name: "lastupdate_by" },
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

		// Event listener for opening the upload modal
		$("#table").on("click", ".open-upload-modal", function (e) {
            e.preventDefault();

            const id = $(this).data("id");
						const sphCode = $(this).data("sph-code");

            $("#uploadForm #sph_id").val(id);
						$("#uploadForm #sph_code").val(sphCode);
            $("#uploadModal").modal("show");
        });

		// Handle form submit for file upload
		$("#uploadForm").submit(function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const url = "<?php echo e(route('api.v1.datatables.sph.upload')); ?>";

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
                        title: "File berhasil diupload!",
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

		$("#createModal form").submit(function (e) {
			e.preventDefault();

			const formData = {
				sph_type: $("#createModal form #sph_type").val(),
				sph_code: $("#createModal form #sph_code").val(),
				company_name: $("#createModal form #company_name").val(),
				company_pic: $("#createModal form #company_pic").val(),
				telepon_pic: $("#createModal form #telepon_pic").val(),
       	product_name: $("#createModal form #product_name").val(),
        harga: $("#createModal form #harga").val(),
				ppn: $("#createModal form #ppn").val(),
				pbbkb: $("#createModal form #pbbkb").val(),
				total: $("#createModal form #total").val(),
				oatlokasi: $("#createModal form #oatlokasi").val(),
				hargaoat: $("#createModal form #hargaoat").val(),
				status: 1,
				lastupdate_by:  $("#createModal form #lastupdate_by").val(),
			};

			$.ajax({
				url: "<?php echo e(route('api.v1.datatables.sph.store')); ?>",
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
						title: "Data sph berhasil ditambahkan!",
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

		$("#table").on("click", ".show-modal", function () {
			const id = $(this).data("id");
			let url =
				"<?php echo e(route('api.v1.datatables.sph.show', ':paramID')); ?>".replace(
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
					$("#showModal form #sph_type").val(res.data.sph_type);
					$("#showModal form #sph_code").val(res.data.sph_code);
					$("#showModal form #company_name").val(res.data.company_name);
					$("#showModal form #company_pic").val(res.data.company_pic);
					$("#showModal form #telepon_pic").val(res.data.telepon_pic);
					$("#showModal form #product_name").val(res.data.product_name);
					$("#showModal form #harga").val(res.data.harga);
					$("#showModal form #ppn").val(res.data.ppn);
					$("#showModal form #pbbkb").val(res.data.pbbkb);
					$("#showModal form #total").val(res.data.total);
					$("#showModal form #oatlokasi").val(res.data.oatlokasi);
					$("#showModal form #hargaoat").val(res.data.hargaoat);
					$("#showModal form #notes").val(res.data.notes);
					$("#showModal form #lastupdate_by").val(res.data.username);
					//$("#showModal form #status").val(res.data.status);
					var statusContainer = $("#status-container");
					statusContainer.empty(); // Clear existing content
					var statusku = res.data.status;
					var namaku = res.data.username;

            if (statusku === 1) {
                statusContainer.append('<span class="badge bg-info">Submitted</span>&nbsp;&nbsp;<span class="badge bg-secondary">Update Terakhir oleh : '+ namaku +'</span>');
            } else if (statusku === 2){
                statusContainer.append('<span class="badge bg-danger">Rejected</span>&nbsp;&nbsp;<span class="badge bg-secondary">Update Terakhir oleh : '+ namaku +'</span>');
            } else if (statusku === 3){
								statusContainer.append('<span class="badge bg-success">Approved</span>&nbsp;&nbsp;<span class="badge bg-secondary">Update Terakhir oleh : '+ namaku +'</span>');
						}	else {
								statusContainer.append('<span class="badge bg-primary">PO Received</span>&nbsp;&nbsp;<span class="badge bg-secondary">Update Terakhir oleh : '+ namaku +'</span>');
						}

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
				"<?php echo e(route('api.v1.datatables.sph.show', ':paramID')); ?>".replace(
					":paramID",
					id
				);
			let updateURL =
				"<?php echo e(route('api.v1.datatables.sph.update', ':paramID')); ?>".replace(
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
					$("#updateModal form #sph_type").val(res.data.sph_type);
					$("#updateModal form #sph_code").val(res.data.sph_code);
					$("#updateModal form #company_name").val(res.data.company_name);
					$("#updateModal form #company_pic").val(res.data.company_pic);
					$("#updateModal form #telepon_pic").val(res.data.telepon_pic);
					$("#updateModal form #product_name").val(res.data.product_name);
					$("#updateModal form #harga").val(res.data.harga);
					$("#updateModal form #ppn").val(res.data.ppn);
					$("#updateModal form #pbbkb").val(res.data.pbbkb);
					$("#updateModal form #total").val(res.data.total);
					$("#updateModal form #oatlokasi").val(res.data.oatlokasi);
					$("#updateModal form #hargaoat").val(res.data.hargaoat);
					$("#updateModal form #notes").val(res.data.notes);
					$("#updateModal form #lastupdate_by").val(res.data.lastupdate_by);
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

			var userid = '<?php echo e(auth()->user()->id); ?>';
			// Ambil nilai dari radio button yang terpilih
			const status = document.querySelector('input[name="status"]:checked')?.value;

			const formData = {
				sph_type: $("#updateModal form #sph_type").val(),
				sph_code: $("#updateModal form #sph_code").val(),
				company_name: $("#updateModal form #company_name").val(),
				company_pic: $("#updateModal form #company_pic").val(),
				telepon_pic: $("#updateModal form #telepon_pic").val(),
				product_name: $("#updateModal form #product_name").val(),
				harga: $("#updateModal form #harga").val(),
				ppn: $("#updateModal form #ppn").val(),
				pbbkb: $("#updateModal form #pbbkb").val(),
				total: $("#updateModal form #total").val(),
				oatlokasi: $("#updateModal form #oatlokasi").val(),
				hargaoat: $("#updateModal form #hargaoat").val(),
				status: status,
				notes: $("#updateModal form #notes").val(),
				//lastupdate_by: $("#updateModal form #lastupdate_by").val(),
				lastupdate_by: userid,
			};

			const updateURL = $("#updateModal form").attr("action");
			console.log(formData);

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
						title: "Data sph berhasil diubah!",
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
						"<?php echo e(route('api.v1.datatables.supplier.destroy', ':paramID')); ?>".replace(
							":paramID",
							id
						);

					$.ajax({
						url: url,
						method: "DELETE",
						success: (res) => {
							Swal.fire({
								icon: "success",
								title: "Data supplier berhasil dihapus!",
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

<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/sph/script.blade.php ENDPATH**/ ?>