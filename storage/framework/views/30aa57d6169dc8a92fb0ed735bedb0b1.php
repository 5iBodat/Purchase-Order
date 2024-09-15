<div class="modal fade text-left" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Membuat SPH - Surat Penawaran Harga
				</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<form class="form form-vertical">
					<div class="form-body">
						<div class="row">

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="sph_type">Pilih Jenis SPH:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="sph_type">
											<div><i class="bi bi-bookmark-fill"></i></div>
										</label>
										<select class="form-select" id="sph_type">
											<option value="">Pilih SPH</option>
											<?php $__currentLoopData = $sphType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sphTypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($sphTypes->value); ?>"><?php echo e($sphTypes->value); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
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
										<input type="text" class="form-control" id="sph_code" maxlength="30" placeholder="Masukkan kode sph..." required/>
										</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="form-group has-icon-left">
								<label for="company_name">Pilih Customer :</label>
								<div class="input-group mb-3">
									<label class="input-group-text" for="company_name">
										<div><i class="bi bi-person-vcard-fill"></i></div>
									</label>
									<select class="form-select" id="company_name">
										<option value="">Pilih Customer</option>
										<?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($customers->nama_pic); ?>" data-telp="<?php echo e($customers->telepon_pic); ?>"  data-pic="<?php echo e($customers->nama_pic); ?> "><?php echo e($customers->customer_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
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
									<input type="text" class="form-control" id="company_pic" />
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
									<input type="text" class="form-control" id="telepon_pic" />
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="product_name">Nama Produk :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="product_name">
											<div><i class="bi bi-person-vcard-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="product_name" />
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
										<label for="harga">a. Harga Per Liter :</label>
										<div class="input-group mb-3">
												<label class="input-group-text" for="harga">
														<div><i class="bi bi-cash-coin"></i></div>
												</label>
												<input type="number" class="form-control" id="harga" name="harga" step="0.01"/>
										</div>
								</div>
						</div>

						<div class="col-lg-4">
								<div class="form-group has-icon-left">
										<label for="ppn">b. Biaya PPN :<span class="text-primary">(11%)</span></label>
										<div class="input-group mb-3">
												<label class="input-group-text" for="ppn">
														<div><i class="bi bi-piggy-bank-fill"></i></div>
												</label>
												<input type="number" class="form-control" id="ppn" name="ppn" step="0.01" style="background-color: #d3d3d3;" readonly>
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
										<input type="number" class="form-control" id="pbbkb" />
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

							<div class="row">
								<div class="col-lg-4">
									<div class="form-group has-icon-left">
										<label for="oatlokasi">Masukan OAT:</label>
										<div class="input-group mb-3">
											<label class="input-group-text" for="oatlokasi">
												<div><i class="bi bi-geo-alt-fill"></i></div>
											</label>
											<input type="text" class="form-control" id="oatlokasi" required/>
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group has-icon-left">
										<label for="hargaoat">Harga OAT Lokasi :</label>
										<div class="input-group mb-3">
											<label class="input-group-text" for="hargaoat">
												<div><i class="bi bi-cash"></i></div>
											</label>
											<input type="number" class="form-control" id="hargaoat" step="0.01" required/>
										</div>
									</div>
								</div>

							</div>
							<input type="hidden" class="form-control" id="lastupdate_by" name="lastupdate_by" value="<?php echo e(auth()->user()->id); ?>"/>

						</div>

						<div class="row">



							</div>
						</div>

						<div class="row">


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
<script>
document.addEventListener('DOMContentLoaded', function() {
	  const hargaInput = document.getElementById('harga');
    const ppnInput = document.getElementById('ppn');
    const pbbkbInput = document.getElementById('pbbkb');
    const totalInput = document.getElementById('total');

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
        harga = isNaN(harga) ? 0 : harga;
        ppn = isNaN(ppn) ? 0 : ppn;
        pbbkb = isNaN(pbbkb) ? 0 : pbbkb;

        const total = harga + ppn + pbbkb;
        totalInput.value = total.toFixed(2);
    }

    hargaInput.addEventListener('input', calculatePPN);
    pbbkbInput.addEventListener('input', function() {
        const harga = parseFloat(hargaInput.value);
        const ppn = parseFloat(ppnInput.value);
        calculateTotal(harga, ppn, parseFloat(pbbkbInput.value));
    });
});
</script>
<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/sph/modal/create.blade.php ENDPATH**/ ?>