<div class="modal fade text-left" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Ubah Data Item / Product
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
									<label for="name">Nama Lokasi:<span class="text-danger">(*required)</span></label>
									<div class="position-relative">
										<input type="text" class="form-control" id="name"
											/>
										<div class="form-control-icon">
											<div class="bi bi-geo"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="price">Harga OAT Lokasi:<span class="text-danger">(*required)</span></label>
									<div class="position-relative">
										<input type="number" class="form-control" id="price" />
										<div class="form-control-icon">
											<i class="bi bi-cash-coin"></i>
										</div>
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
<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/oat_lokasi/modal/edit.blade.php ENDPATH**/ ?>