<script>
	$(function () {
		const table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('api.v1.datatables.supplier.index') }}",
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex" },
				{ data: "customer_name", name: "customer_name" },
				{ data: "compocode", name: "compocode" },
				{ data: "nomer_pajak", name: "nomer_pajak" },
				{ data: "alamat", name: "alamat" },
				{ data: "nama_pic", name: "nama_pic" },
				{ data: "telepon_pic", name: "telepon_pic" },
				{
                    data: 'email_pic',
                    name: 'email_pic',
                    render: function(data, type, row) {
                        if (type === 'display' || type === 'filter') {
													return '<a href="mailto:' + data + '" target="_blank">' + ' <i class="bi bi-envelope"></i></a>';
                        }
                        return data;
                    }
        },
				{
                    data: 'whatsapp',
                    name: 'whatsapp',
                    render: function(data, type, row) {
                        if (type === 'display' || type === 'filter') {
													if (data){
														return '<a href="https://wa.me/' + data +  '" target="_blank">'  + data + '</a>';
													}else{
														return 'No Whatsapp Available';
													}
                        }
                        return data;
                    }
        },
				{
                    data: 'updated_at',
                    name: 'updated_at',
                    render: function(data, type, row) {
                        if (type === 'display' || type === 'filter') {
                            return moment(data).format('DD,MMMM yyyy HH:mm');
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
				compocode: $("#createModal form #code_supplier").val(),
				customer_name: $("#createModal form #customer_name").val(),
				nomer_pajak: $("#createModal form #nomer_pajak").val(),
				alamat: $("#createModal form #alamat").val(),
				nama_pic: $("#createModal form #nama_pic").val(),
				telepon_pic: $("#createModal form #telepon_pic").val(),
        email_pic: $("#createModal form #email_pic").val(),
        whatsapp: $("#createModal form #whatsapp").val(),
				is_customer: 0,
			};

			$.ajax({
				url: "{{ route('api.v1.datatables.supplier.store') }}",
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
						title: "Data supplier berhasil ditambahkan!",
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
				"{{ route('api.v1.datatables.supplier.show', ':paramID') }}".replace(
					":paramID",
					id
				);
			let updateURL =
				"{{ route('api.v1.datatables.supplier.update', ':paramID') }}".replace(
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
					$("#updateModal form #code_supplier").val(res.data.compocode);
					$("#updateModal form #customer_name").val(res.data.customer_name);
					$("#updateModal form #nomer_pajak").val(res.data.nomer_pajak);
					$("#updateModal form #alamat").val(res.data.alamat);
					$("#updateModal form #nama_pic").val(res.data.nama_pic);
					$("#updateModal form #telepon_pic").val(res.data.telepon_pic);
					$("#updateModal form #email_pic").val(res.data.email_pic);
					$("#updateModal form #whatsapp").val(res.data.whatsapp);
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
				compocode: $("#updateModal form #code_supplier").val(),
				customer_name: $("#updateModal form #customer_name").val(),
				nomer_pajak: $("#updateModal form #nomer_pajak").val(),
				alamat: $("#updateModal form #alamat").val(),
				nama_pic: $("#updateModal form #nama_pic").val(),
				telepon_pic: $("#updateModal form #telepon_pic").val(),
				email_pic: $("#updateModal form #email_pic").val(),
				whatsapp: $("#updateModal form #whatsapp").val(),
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
						title: "Data supplier berhasil diubah!",
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
						"{{ route('api.v1.datatables.supplier.destroy', ':paramID') }}".replace(
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
<script>
	const NPWP = document.getElementById("nomer_pajak")
        NPWP.oninput = (e) => {
            e.target.value = autoFormatNPWP(e.target.value);
        }
        function autoFormatNPWP(NPWPString) {
            try {
                var cleaned = ("" + NPWPString).replace(/\D/g, "");
                var match = cleaned.match(/(\d{0,2})?(\d{0,3})?(\d{0,3})?(\d{0,1})?(\d{0,3})?(\d{0,3})$/);
                return [
                        match[1],
                        match[2] ? ".": "",
                        match[2],
                        match[3] ? ".": "",
                        match[3],
                        match[4] ? ".": "",
                        match[4],
                        match[5] ? "-": "",
                        match[5],
                        match[6] ? ".": "",
                        match[6]].join("")

            } catch(err) {
                return "";
            }
        }
</script>
