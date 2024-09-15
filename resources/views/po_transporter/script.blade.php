<script>
	$(function () {
		const table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('api.v1.datatables.po-transport.index') }}",
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex" },
				{ data: "po_number", name: "po_number"},
				{ data: "po_date", name: "po_date"},
				{ data: "to", name: "to"},
				{ data: "name", name: "name"},
				{ data: "address", name: "address"},
				{ data: "phone_fax", name: "phone_fax"},
				{ data: "comments", name: "comments"},
				{ data: "fob_point", name: "fob_point"},
				{ data: "term", name: "term"},
				{ data: "transport", name: "transport"},
				{ data: "loading_point", name: "loading_point"},
				{ data: "delivered_to", name: "delivered_to"},
				{ data: "quantity", name: "quantity"},
				{ data: "unit_price", name: "unit_price"},
				{ data: "amount", name: "amount"},
				{ data: "portal_money", name: "portal_money"},
				{ data: "sub_total", name: "sub_total"},
				{ data: "total", name: "total"},
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

		function totalData(){
			$.ajax({
				url: "{{ route('api.v1.datatables.po-transport.get-total')}}",
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

		// $("#action")

		// Event listener for opening the upload modal
		$("#table").on("click", ".open-upload-modal", function (e) {
            e.preventDefault();

            const id = $(this).data("id");
						const sphCode = $(this).data("sph-code");

            $("#uploadForm #po_id").val(id);
						$("#uploadForm #sph_code").val(sphCode);
            $("#uploadModal").modal("show");
        });

		$("#table").on("click", ".show-modal", function () {
			const id = $(this).data("id");
			let url =
				"{{ route('api.v1.datatables.po-transport.show', ':paramID') }}".replace(
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
					$("#updateModal form #sph_type").val(res.data.type);
					$("#showModal form #to").val(res.data.to);
					$("#showModal form #po_number").val(res.data.po_number);
					$("#showModal form #po_date").val(res.data.po_date);
					$("#showModal form #name").val(res.data.name);
					$("#showModal form #address").val(res.data.address);
					$("#showModal form #phone_fax").val(res.data.phone_fax);
					$("#showModal form #fob_point").val(res.data.fob_point);
					$("#showModal form #term").val(res.data.term);
					$("#showModal form #transport").val(res.data.transport);
					$("#showModal form #loading_point").val(res.data.loading_point);
					$("#showModal form #shipped_via").val(res.data.shipped_via);
					$("#showModal form #delivered_to").val(res.data.delivered_to);
					$("#showModal form #comments").val(res.data.comments);
					$("#showModal form #quantity").val(res.data.quantity);
					$("#showModal form #unit_price").val(res.data.unit_price);
					$("#showModal form #amount").val(res.data.amount);
					$("#showModal form #portal").val(res.data.portal_money);
					$("#showModal form #sub_total").val(res.data.sub_total);
					$("#showModal form #total").val(res.data.total);
					$("#showModal form #description").val(res.data.description);
					$("#showModal form #notes").val(res.data.notes);
					var statusContainer = $("#status-container");
					statusContainer.empty(); // Clear existing content
					var statusku = res.data.po_status;
					var namaku = res.data.username;

            if (statusku === 1) {
                statusContainer.append('<span class="badge bg-info">Waiting Approval</span>&nbsp;&nbsp;<span class="badge bg-secondary">Update Terakhir oleh : '+ namaku +'</span>');
            } else if (statusku === 2){
                statusContainer.append('<span class="badge bg-danger">Rejected</span>&nbsp;&nbsp;<span class="badge bg-secondary">Update Terakhir oleh : '+ namaku +'</span>');
            }else {
				statusContainer.append('<span class="badge bg-primary">Approve</span>&nbsp;&nbsp;<span class="badge bg-secondary">Update Terakhir oleh : '+ namaku +'</span>');
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
			const action = $(this).attr("title");
			let url =
				"{{ route('api.v1.datatables.po-transport.show', ':paramID') }}".replace(
					":paramID",
					id
				);
				let updateURL =
				"{{ route('api.v1.datatables.po-transport.update', ':paramID') }}".replace(
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
					if (action === "Approve") {
						console.log("masuk sini")
						$("#updateModal form #name").val(res.data.name).attr("readonly", true).attr("style","background-color:#d3d3d3")
						$("#updateModal form #address").val(res.data.address).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #phone_fax").val(res.data.phone_fax).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #fob_point").val(res.data.fob_point).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #term").val(res.data.term).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #transport_update").val(res.data.transport).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #loading_point").val(res.data.loading_point).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #shipped_via").val(res.data.shipped_via).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #delivered_to").val(res.data.delivered_to).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #comments").val(res.data.comments).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #quantity_update").val(res.data.quantity).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #unit_price_update").val(res.data.unit_price).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #amount_update").val(res.data.amount).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #portal_update").val(res.data.portal_money).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #sub_total_update").val(res.data.sub_total).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #total_update").val(res.data.total).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #description").val(res.data.description).attr("readonly", true).attr("style","background-color:#d3d3d3");
						$("#updateModal form #notes").val(res.data.notes)
					}else{
						$("#updateModal form #name").val(res.data.name).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #address").val(res.data.address).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #phone_fax").val(res.data.phone_fax).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #fob_point").val(res.data.fob_point).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #term").val(res.data.term).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #transport_update").val(res.data.transport).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #loading_point").val(res.data.loading_point).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #shipped_via").val(res.data.shipped_via).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #delivered_to").val(res.data.delivered_to).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #comments").val(res.data.comments).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #quantity_update").val(res.data.quantity).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #unit_price_update").val(res.data.unit_price).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #amount_update").val(res.data.amount).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #portal_update").val(res.data.portal_money).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #sub_total_update").val(res.data.sub_total).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #total_update").val(res.data.total).removeAttr("readonly").removeAttr("style");;
						$("#updateModal form #description").val(res.data.description).removeAttr("readonly").removeAttr("style");;
					}

					$("#updateModal form #sph_type").val(res.data.type);
					$("#updateModal form #to").val(res.data.to);
					$("#updateModal form #po_number").val(res.data.po_number);
					$("#updateModal form #po_date").val(res.data.po_date);
					$("#updateModal form #notes").val(res.data.notes);
					$("#updateModal form #lastupdate_by").val(res.data.requested_by);


					if(res.data.po_status == 1) {
					$("#updateModal form #radio-buttons-container").html(`
					<input class="form-check-input" type="radio" name="status" id="status" value="3" required>Rejected
									<input class="form-check-input" type="radio" name="status" id="status" value="2" required>Approved
									`);
					}else if(res.data.po_status == 3) {
						$("#updateModal form #radio-buttons-container").html(`
					<input class="form-check-input" type="radio" name="status" id="status" value="1" checked required>Revisi
									`);
					}

					$("#updateModal form").attr("action", updateURL);

				},
				error: (err) => {
					alert("error occured, check console");
					console.log(err);
				},
			});
		});

		$("#updateModal form").submit(function (e) {
			e.preventDefault()
			var userid = '{{ auth()->user()->id }}';
			// Ambil nilai dari radio button yang terpilih
			const status = document.querySelector('input[name="status"]:checked')?.value;
			const formData ={
				type: $("#updateModal form #sph_type").val(),
				to: $("#updateModal form #to").val(),
				po_number: $("#updateModal form #po_number").val(),
				po_date: $("#updateModal form #po_date").val(),
				name: $("#updateModal form #name").val(),
				address: $("#updateModal form #address").val(),
				phone_fax: $("#updateModal form #phone_fax").val(),
       			fob_point: $("#updateModal form #fob_point").val(),
       			term: $("#updateModal form #term").val(),
				transport: $("#updateModal form #transport_update").val(),
				loading_point: $("#updateModal form #loading_point").val(),
				shipped_via: $("#updateModal form #shipped_via").val(),
				delivered_to: $("#updateModal form #delivered_to").val(),
				comments: $("#updateModal form #comments").val(),
				quantity: $("#updateModal form #quantity_update").val(),
				unit_price: $("#updateModal form #unit_price_update").val(),
				amount: $("#updateModal form #amount_update").val(),
				portal_money: $("#updateModal form #portal_update").val(),
				sub_total: $("#updateModal form #sub_total_update").val(),
				total: $("#updateModal form #total_update").val(),
				description: $("#updateModal form #description").val(),
				notes: $("#updateModal form #notes").val(),
				po_status: status,
				requested_by:  $("#updateModal form #lastupdate_by").val(),
				lastupdate_by:  userid,
			}

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
					totalData();
					$("#updateModal").modal("hide");

					Swal.fire({
						icon: "success",
						title: "Data PO Transport berhasil diubah!",
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
		})

		// Handle form submit for file upload
		$("#uploadForm").submit(function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const url = "{{ route('api.v1.datatables.purchase-order.upload') }}";

            $.ajax({
                url: url,
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: (res) => {
                    table.ajax.reload();
					totalData.ajax.reload();
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


		$("#table").on("click", ".download", function(e) {
			e.preventDefault();
			const id = $(this).data("id");
			const url = "{{ route('api.v1.datatables.po-transport.download')}}";
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


		// Create a new data
		$("#createModal form").submit(function (e) {
			e.preventDefault();

			const formData = {
				type: $("#createModal form #sph_type").val(),
				to: $("#createModal form #to").val(),
				po_number: $("#createModal form #po_number").val(),
				po_date: $("#createModal form #po_date").val(),
				name: $("#createModal form #name").val(),
				address: $("#createModal form #address").val(),
				phone_fax: $("#createModal form #phone_fax").val(),
       			fob_point: $("#createModal form #fob_point").val(),
       			term: $("#createModal form #term").val(),
				transport: $("#createModal form #transport").val(),
				loading_point: $("#createModal form #loading_point").val(),
				shipped_via: $("#createModal form #shipped_via").val(),
				delivered_to: $("#createModal form #delivered_to").val(),
				comments: $("#createModal form #comments").val(),
				quantity: $("#createModal form #quantity").val(),
				unit_price: $("#createModal form #unit_price").val(),
				amount: $("#createModal form #amount").val(),
				portal_money: $("#createModal form #portal").val(),
				sub_total: $("#createModal form #sub_total").val(),
				total: $("#createModal form #total").val(),
				description: $("#createModal form #description").val(),
				notes: $("#createModal form #notes").val(),
				po_status: 1,
				requested_by:  $("#createModal form #lastupdate_by").val(),
				created_by:  $("#createModal form #lastupdate_by").val(),
			};

			$.ajax({
				url: "{{ route('api.v1.datatables.po-transport.store') }}",
				method: "POST",
				header: {
					"Content-Type": "application/json",
				},
				data: formData,
				success: (res) => {
					table.ajax.reload();
					totalData.ajax.reload();
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

		// for craete
		const type = document.getElementById('sph_type');
		type.addEventListener('change', function(e) {
			const id= e.target.selectedOptions[0].getAttribute('data-id');
			$.ajax({
				url: "{{ route('api.v1.supplier-setting',':id') }}".replace(':id', id),
				method: "GET",
				header: {
					"Content-Type": "application/json",
				},
				success: function(response) {
					const select = document.getElementById('to');
					const firstOption = select.querySelector('option'); // Preserve the first option
            select.innerHTML = ''; // Clear existing options
            
            if (firstOption) {
                select.appendChild(firstOption); // Re-add the first option
            }
            // Loop through the response and create new options
            response.map(item => {
                let option = document.createElement('option');
                option.value = item.name;
                option.textContent = item.name;
                option.dataset.code = item.code;
                select.appendChild(option);
            });
				}
			})
		})

		const to = document.getElementById('to');
		to.addEventListener('change', function(e) {
			const code = e.target.selectedOptions[0].getAttribute('data-code');
			const type = document.getElementById('sph_type').value;
			$.ajax({
				url: "{{ route('api.v1.supplier-setting.generate-po-number') }}",
				method: "POST",
				header: {
					"Content-Type": "application/json",
				},
				data: {
					code,
					type
				},
				success: function(response) {
					let po_number = document.getElementById('po_number');
					console.log(po_number);
					po_number.value = response
				}
			})
		})

const createInputs = {
    harga: document.getElementById('unit_price'),
    transport: document.getElementById('transport'),
    quantity: document.getElementById('quantity'),
    amount: document.getElementById('amount'),
    portal: document.getElementById('portal'),
    subTotal: document.getElementById('sub_total'),
    total: document.getElementById('total'),
};

const updateInputs = {
    harga: document.getElementById('unit_price_update'),
    transport: document.getElementById('transport_update'),
    quantity: document.getElementById('quantity_update'),
    amount: document.getElementById('amount_update'),
    portal: document.getElementById('portal_update'),
    subTotal: document.getElementById('sub_total_update'),
    total: document.getElementById('total_update'),
};

// Generalized calculation function
const calculateValues = (harga, quantity, transport) => {
    const totalAmount = quantity * harga;
    const subTotalFinal = totalAmount * transport;

    return {
        totalAmount: totalAmount.toFixed(2),
        subTotalFinal: subTotalFinal.toFixed(2),
    };
};

// Generalized input update function
const updateInputValues = (inputs) => {
    const harga = parseInt(inputs.harga.value) || 0;
    const quantity = parseInt(inputs.quantity.value) || 0;
    const transport = parseInt(inputs.transport.value) || 0;

    const { totalAmount, subTotalFinal } = calculateValues(harga, quantity, transport);

    inputs.amount.value = totalAmount;
    inputs.subTotal.value = subTotalFinal;
};

// Generalized portal calculation
const updateTotal = (inputs) => {
    const portal = parseInt(inputs.portal.value) || 0;
    const subTotal = parseInt(inputs.subTotal.value) || 0;
    const totalfinal = portal + subTotal;

    inputs.total.value = totalfinal.toFixed(2);
};

// Add event listeners to the inputs
const addEventListeners = (inputs) => {
    inputs.harga.addEventListener("input", () => updateInputValues(inputs));
    inputs.transport.addEventListener("input", () => updateInputValues(inputs));
    inputs.quantity.addEventListener("input", () => updateInputValues(inputs));
    inputs.portal.addEventListener("input", () => updateTotal(inputs));
};

// Apply event listeners to both create and update inputs
addEventListeners(createInputs);
addEventListeners(updateInputs);


	});
</script>
