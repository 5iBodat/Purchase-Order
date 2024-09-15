<div class="modal fade text-left" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Tambah Data Supplier
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
									<label for="customer_name">Nama Supplier:<span class="text-danger">(*required)</span></label>
									<div class="position-relative">
										<input type="text" class="form-control" id="customer_name"
											placeholder="Masukkan nama supplier..."/>
										<div class="form-control-icon">
											<div class="bi bi-person-badge-fill"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="nomer_pajak">Nomer Wajib Pajak (NPWP):<span class="text-danger">(*required)</span></label>
									<div class="position-relative">
										<input type="text" class="form-control" id="nomer_pajak" maxlength="20" placeholder="Masukkan nomer wajib pajak..." required/>
										<div class="form-control-icon">
											<i class="bi bi-credit-card-2-front-fill"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group has-icon-left">
									<label for="alamat">Alamat Supplier:<span class="text-danger">(*required)</span></label>
									<div class="position-relative">
										<input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat supplier..." required/>
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
									<label for="nama_pic">Nama Penanggung Jawab:<span class="text-danger">(*required)</span></label>
									<div class="position-relative">
										<input type="text" class="form-control" id="nama_pic" placeholder="Masukkan nama penanggung jawab..." required/>
										<div class="form-control-icon">
											<i class="bi bi-person-check-fill"></i>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="telepon_pic">Nomer Telp Penanggung Jawab:<span class="text-danger">(*required)</span></label>
									<div class="position-relative">
										<input type="number" class="form-control" maxlength = "14" id="telepon_pic" placeholder="Masukkan nomer telp..." required/>
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
									<label for="email_pic">Alamat Email:<span class="text-danger">(*required)</span></label>
									<div class="position-relative">
										<input type="email" class="form-control" id="email_pic" placeholder="Masukkan alamat email..." required/>
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
										<input type="number" class="form-control" maxlength = "14" class="form-control" id="whatsapp"
											placeholder="Gunakan format 62xxx untuk nomer whatsapp..." />
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
						<button type="submit" class="btn btn-success">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/supplier/modal/create.blade.php ENDPATH**/ ?>