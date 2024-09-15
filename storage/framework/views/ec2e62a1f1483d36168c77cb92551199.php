<div class="modal fade text-left" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Ubah Data Supplier
				</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<form class="form form-vertical">
					<div class="form-body">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="customer_name">Nama Supplier:</label>
									<div class="position-relative">
										<input type="text" class="form-control" id="customer_name"/>
										<div class="form-control-icon">
											<div class="bi bi-person-badge-fill"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="nomer_pajak">Nomer Wajib Pajak (NPWP):</label>
									<div class="position-relative">
										<input type="text" class="form-control" id="nomer_pajak" maxlength="20"/>
										<div class="form-control-icon">
											<i class="bi bi-credit-card-2-front-fill"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group has-icon-left">
									<label for="alamat">Alamat Supplier:</label>
									<div class="position-relative">
										<input type="text" class="form-control" id="alamat"/>
										<div class="form-control-icon">
											<i class="bi bi-geo-alt-fill"></i>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="nama_pic">Nama Penanggung Jawab:</label>
									<div class="position-relative">
										<input type="text" class="form-control" id="nama_pic" />
										<div class="form-control-icon">
											<i class="bi bi-person-check-fill"></i>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="telepon_pic">Nomer Telp Penanggung Jawab:</label>
									<div class="position-relative">
										<input type="number" class="form-control" maxlength = "14" id="telepon_pic"/>
										<div class="form-control-icon">
											<i class="bi bi-telephone-inbound-fill"></i>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="email_pic">Alamat Email:</label>
									<div class="position-relative">
										<input type="email" class="form-control" id="email_pic"/>
										<div class="form-control-icon">
											<i class="bi bi-envelope-fill"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="whatsapp">Nomor Whatsapp:</label>
									<div class="position-relative">
										<input type="number" class="form-control" maxlength = "14" id="whatsapp"/>
										<div class="form-control-icon">
											<i class="bi bi-whatsapp"></i>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-success">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php /**PATH C:\Users\Unknown\OneDrive\Documents\KERJA\FREELANCE\sph\resources\views/supplier/modal/edit.blade.php ENDPATH**/ ?>