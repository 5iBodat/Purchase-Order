<script>
	$(function () {
		const table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('api.v1.datatables.sph.index') }}",
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex" },
				{ data: "sph_type", name: "sph_type" },
				{ data: "sph_code", name: "sph_code" },
				{ data: "status", name: "status" ,
					render: function(data, type, row) {
                    if (data === 1) {
                        return '<span class="badge bg-info">Submitted</span>';
                    } else if (data === 2) {
                        return '<span class="badge bg-danger">Revision</span>';
                    } else {
                        return '<span class="badge bg-success">Approved</span>';
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

		function totalData(){
			$.ajax({
				url: "{{ route('api.v1.datatables.sph.get-total')}}",
				method: 'POST',
				success: function(response) {
					$("#totalData").html(response.data.total);
					$("#submit").html(response.data.submit);
					$("#revisi").html(response.data.revisi);
					$("#approve").html(response.data.approve);
				}
			})
		}

		totalData()
		// Event listener for opening the upload modal
		$("#table").on("click", ".open-upload-modal", function (e) {
            e.preventDefault();

            const id = $(this).data("id");
						const sphCode = $(this).data("sph-code");

            $("#uploadForm #sph_id").val(id);
						$("#uploadForm #sph_code").val(sphCode);
            $("#uploadModal").modal("show");
        });

		//handle download pdf file
		$("#table").on("click", ".download", function(e) {
			e.preventDefault();
			const id = $(this).data("id");
			const url = "{{ route('api.v1.datatables.sph.download')}}";
			$.ajax({
				url:url,
				method: "POST",
				data: {id:id},
				header: {"Content-Type": "application/json"},
				success: function (data) {
					window.location.href = data.download_url;
				}
			})
		})

		// Handle form submit for file upload
		$("#uploadForm").submit(function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const url = "{{ route('api.v1.datatables.sph.upload') }}";

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
				url: "{{ route('api.v1.datatables.sph.store') }}",
				method: "POST",
				header: {
					"Content-Type": "application/json",
				},
				data: formData,
				success: (res) => {
					table.ajax.reload();
					totalData()
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
				"{{ route('api.v1.datatables.sph.show', ':paramID') }}".replace(
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
				"{{ route('api.v1.datatables.sph.show', ':paramID') }}".replace(
					":paramID",
					id
				);
			let updateURL =
				"{{ route('api.v1.datatables.sph.update', ':paramID') }}".replace(
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
					$("#updateModal form #sph_type").val(res.data.sph_type).attr("readonly", true).attr("style","background-color:#d3d3d3")
					$("#updateModal form #sph_code").val(res.data.sph_code).attr("readonly", true).attr("style","background-color:#d3d3d3");
					const selectElement = $("#updateModal form #company_name")
					selectElement.find('option').each(function(){
						if($(this).val() == `${res.data.company_id}`){
							$(this).prop('selected', true);
							selectElement.prop('disabled', true).css("background-color","#d3d3d3")
							return false;
						}
					})
					// $("#updateModal form #company_name").val(res.data.company_name).attr("readonly", true).attr("style","background-color:#d3d3d3");
					$("#updateModal form #company_pic").val(res.data.company_pic).attr("readonly", true).attr("style","background-color:#d3d3d3");
					$("#updateModal form #telepon_pic").val(res.data.telepon_pic).attr("readonly", true).attr("style","background-color:#d3d3d3");
					$("#updateModal form #product_name").val(res.data.product_name).attr("readonly", true).attr("style","background-color:#d3d3d3");
					$("#updateModal form #harga_update").val(res.data.harga).attr("readonly", true).attr("style","background-color:#d3d3d3");
					$("#updateModal form #ppn_update").val(res.data.ppn).attr("readonly", true).attr("style","background-color:#d3d3d3");
					$("#updateModal form #pbbkb_update").val(res.data.pbbkb).attr("readonly", true).attr("style","background-color:#d3d3d3");
					$("#updateModal form #total_update").val(res.data.total).attr("readonly", true).attr("style","background-color:#d3d3d3");
					$("#updateModal form #oatlokasi").val(res.data.oatlokasi).attr("readonly", true).attr("style","background-color:#d3d3d3");
					$("#updateModal form #hargaoat").val(res.data.hargaoat).attr("readonly", true).attr("style","background-color:#d3d3d3");
					$("#updateModal form #notes").val(res.data.notes);
					if(res.data.status == 1) {
					$("#updateModal form #radio-buttons-container").html(`
					<input class="form-check-input" type="radio" name="status" id="status" value="2" required>Rejected
									<input class="form-check-input" type="radio" name="status" id="status" value="3" required>Approved
									`);
					}

					$("#updateModal form #lastupdate_by").val(res.data.lastupdate_by);
					$("#updateModal form").attr("action", updateURL);
				},
				error: (err) => {
					alert("error occured, check console");
					console.log(err);
				},
			});
		});

		$("#table").on("click", ".revisi-modal", function () {
			const id = $(this).data("id");
			let url =
				"{{ route('api.v1.datatables.sph.show', ':paramID') }}".replace(
					":paramID",
					id
				);
			let updateURL =
				"{{ route('api.v1.datatables.sph.update', ':paramID') }}".replace(
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
					$("#updateModal form #product_name").val(res.data.product_name).removeAttr("readonly").removeAttr("style");
					$("#updateModal form #harga_update").val(res.data.harga).removeAttr("readonly").removeAttr("style");
					$("#updateModal form #ppn_update").val(res.data.ppn)
					$("#updateModal form #pbbkb_update").val(res.data.pbbkb).removeAttr("readonly").removeAttr("style");
					$("#updateModal form #total_update").val(res.data.total)
					$("#updateModal form #oatlokasi").val(res.data.oatlokasi).removeAttr("readonly").removeAttr("style");
					$("#updateModal form #hargaoat").val(res.data.hargaoat).removeAttr("readonly").removeAttr("style");
					$("#updateModal form #notes").val(res.data.notes);
					if(res.data.status == 2) {
					$("#updateModal form #radio-buttons-container").html(
						`<input class="form-check-input" type="radio" name="status" id="status" value="1" checked="checked" required> Revisi`
					);
					}
					$("#updateModal form #lastupdate_by").val(res.data.lastupdate_by);
					$("#updateModal form").attr("action", updateURL);
				},
				error: (err) => {
					alert("error occured, check console");
					console.log(err);
				},
			});
		});

		$(document).ready(function() {
    $('#updateModal').on('shown.bs.modal', function (e) {
        // Code to execute when the modal is fully shown
        console.log('Update Modal is fully shown!');
		const ppnInput = document.getElementById('ppn_update');
		const pbbkbInput = document.getElementById('pbbkb_update');
		const totalInput = document.getElementById('total_update');
        // Add your specific JavaScript code here 
        // Example:
        const hargaInput = document.getElementById('harga_update');
            hargaInput.addEventListener('input', calculatePPN);
			function calculatePPN() {
					const harga = parseFloat(hargaInput.value);
					if (!isNaN(harga)) {
						const ppn = harga * 0.11; // Asumsi PPN 11%
						ppnInput.value = ppn.toFixed(2);
						calculateTotal(harga, ppn, parseFloat(pbbkbInput.value));
					} else {
						ppnInput.value = '';
						calculateTotal(harga, 0, parseFloat(pbbkbInput.value));
					}
				}

				function calculateTotal(harga, ppn, pbbkb) {
					console.log(harga)
			harga = isNaN(harga) ? 0 : harga;
			ppn = isNaN(ppn) ? 0 : ppn;
			pbbkb = isNaN(pbbkb) ? 0 : pbbkb;
	
			const total = harga + ppn + pbbkb;
			totalInput.value = total.toFixed(2);
		}
    });


});


		$("#updateModal form").submit(function (e) {
			e.preventDefault();

			var userid = '{{ auth()->user()->id }}';
			// Ambil nilai dari radio button yang terpilih
			const status = document.querySelector('input[name="status"]:checked')?.value;

			const formData = {
				sph_type: $("#updateModal form #sph_type").val(),
				sph_code: $("#updateModal form #sph_code").val(),
				company_name: $("#updateModal form #company_name").val(),
				company_pic: $("#updateModal form #company_pic").val(),
				telepon_pic: $("#updateModal form #telepon_pic").val(),
				product_name: $("#updateModal form #product_name").val(),
				harga: $("#updateModal form #harga_update").val(),
				ppn: $("#updateModal form #ppn_update").val(),
				pbbkb: $("#updateModal form #pbbkb_update").val(),
				total: $("#updateModal form #total_update").val(),
				oatlokasi: $("#updateModal form #oatlokasi").val(),
				hargaoat: $("#updateModal form #hargaoat").val(),
				status: status,
				notes: $("#updateModal form #notes").val(),
				//lastupdate_by: $("#updateModal form #lastupdate_by").val(),
				lastupdate_by: userid,
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
					totalData()
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

