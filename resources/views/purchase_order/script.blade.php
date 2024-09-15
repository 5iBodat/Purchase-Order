<script>
	$(function () {
		const table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('api.v1.datatables.purchase-order.index') }}",
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex" },
				{ data: "company_name", name: "company_name"},
				{ data: "sph_code", name: "sph_code" },

				{
                    data: "po_no",
                    name: "po_no",
                    render: function(data, type, row) {
                        if (type === 'display') {
													if (row.po_status === 1){
														return `<span class="badge bg-info">Belum ada PO</span>`;
													}
													}
                        return data;
                    }
                },

				{
                    data: "po_file",
                    name: "po_file",
                    render: function(data, type, row) {
                        if (type === 'display') {

													const customerPo = `${row.po_file}`; // Replace this with your actual file path
            							const baseUrl = '/storage'; // Replace this with your storage base URL
													let fullFilePath = `${baseUrl}/${customerPo}`;

    											// Remove /public from the URL if it exists
    									   fullFilePath = fullFilePath.replace("/public", "");

													if (row.po_status == 1){

														return `<a href="#" class="open-upload-modal" data-id="${row.id}" data-sph-code="${row.sph_code}"><span class="badge bg-primary"><i class="bi bi-cloud-arrow-up-fill"></i>&nbsp;&nbsp;Upload PO Here</span></a>`;
													}else {
														return `<button class="badge bg-success download_po" data-id="${row.id}" data-sph-code="${row.sph_code}"><i class="bi bi-cloud-arrow-down-fill"></i>&nbsp;Download PO</button>
														</span>
														</a>`;

													}
													}
                        return data;
                    }
                },
				{ data: "username", name: "username" },
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
            const url = "{{ route('api.v1.datatables.purchase-order.upload') }}";

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

        //handle download pdf file
		$("#table").on("click", ".download_po", function(e) {
			e.preventDefault();
			const id = $(this).data("id");
			const url = "{{ route('api.v1.datatables.purchase-order.download')}}";
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

	});
</script>
