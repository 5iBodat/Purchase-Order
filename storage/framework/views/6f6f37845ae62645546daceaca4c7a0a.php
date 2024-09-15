<div class="modal fade text-left" id="showModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					View SPH - Surat Penawaran Harga
				</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<form class="form form-vertical">
					<div class="form-body">
						<div class="row">
							<div class="input-group mb-3">
							<div id="status-container">

							</div>
							</div>
						</div>
						<div class="row">

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="sph_type">Jenis SPH:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="sph_type">
											<div><i class="bi bi-bookmark-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="sph_type" maxlength="30" style="background-color: #d3d3d3;" readonly/>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="sph_code">Kode SPH:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="sph_code">
										<div><i class="bi bi-collection-fill"></i></div>
										</label>
										<div class="position-relative">
										<input type="text" class="form-control" id="sph_code" maxlength="30" style="background-color: #d3d3d3;" readonly/>
										</div>
								</div>
							</div>
						  </div>

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="company_name">Customer :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="company_name">
											<div><i class="bi bi-person-vcard-fill"></i></div>
										</label>
									</label>
									<input type="text" class="form-control" id="company_name" maxlength="30" style="background-color: #d3d3d3;" readonly/>
								</div>
									</div>
							</div>


							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="company_pic">Nama PIC :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="company_pic">
											<div><i class="bi bi-person-check-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="company_pic" style="background-color: #d3d3d3;" readonly/>
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="telepon_pic">Nomer Telp PIC :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="telepon_pic">
											<div><i class="bi bi-phone-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="telepon_pic" style="background-color: #d3d3d3;" readonly/>
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="product_name">Produk :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="product_name">
											<div><i class="bi bi-person-vcard-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="product_name" style="background-color: #d3d3d3;" readonly/>
								</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="harga">a.Harga Per Liter :<span class="text-primary">(*auto)</span></label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="harga">
											<div><i class="bi bi-cash-coin"></i></div>
										</label>
										<input type="number" class="form-control" id="harga"  style="background-color: #d3d3d3;" readonly/>
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="ppn">b.Biaya PPN :<span class="text-primary">(*auto)</span></label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="ppn">
											<div><i class="bi bi-piggy-bank-fill"></i></div>
										</label>
										<?php $__currentLoopData = $ppn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ppns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<input type="hidden" class="form-control" id="bppn" data-ppn="<?php echo e($ppns->value); ?>" value="<?php echo e($ppns->value); ?>"/>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<input type="number" class="form-control" id="ppn" style="background-color: #d3d3d3;" readonly/>
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="pbbkb">c.Biaya PBBKB :<span class="text-primary">(*auto)</span></label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="pbbkb">
											<div><i class="bi bi-piggy-bank-fill"></i></div>
										</label>
										<?php $__currentLoopData = $pbbkb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pbbkbs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<input type="hidden" class="form-control" id="bpbbkb" data-ppn="<?php echo e($pbbkbs->value); ?>" value="<?php echo e($pbbkbs->value); ?>"/>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<input type="number" class="form-control" id="pbbkb" style="background-color: #d3d3d3;" readonly/>
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="total">Total (a+b+c) :<span class="text-primary">(*auto)</span></label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="total">
											<div><i class="bi bi-wallet-fill"></i></div>
										</label>
										<input type="number" class="form-control" id="total" style="background-color: #d3d3d3;" readonly/>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="oatlokasi">Pilih OAT Lokasi:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="oatlokasi">
											<div><i class="bi bi-map-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="oatlokasi" style="background-color: #d3d3d3;" required/>

									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="hargaoat">Harga OAT Lokasi :<span class="text-primary">(*auto)</span></label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="hargaoat">
											<div><i class="bi bi-cash"></i></div>
										</label>
										<input type="number" class="form-control" id="hargaoat" style="background-color: #d3d3d3;" required/>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="hargaoat">Note :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="hargaoat">
											<div><i class="bi bi-journal-richtext"></i></div>
										</label>
										<textarea class="form-control" id="notes" style="background-color: #d3d3d3;" rows="3" width='80%' required></textarea>

									</div>
								</div>
							</div>

						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/sph copy/modal/show.blade.php ENDPATH**/ ?>