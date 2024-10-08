<?php $__env->startSection('title', 'Data Supplier'); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Surat Penawaran Harga</h3>
				<p class="text-subtitle text-muted">Halaman untuk manajemen surat penawaran harga seperti membuat ,
					melihat , mengubah dan menghapus surat penawaran harga.
				</p>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Surat Penawaran harga
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="col card">
					<div class="d-flex justify-content-end pb-3">
						<div class="btn-group gap gap-2">
							<button type="button" class="btn btn-primary icon icon-left" data-bs-toggle="modal"
								data-bs-target="#createModal">
								<i class="bi bi-plus-circle"></i> Buat Data SPH
							</button>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table w-100 table-hover" id="table">
							<thead>
								<tr>
									<th>#</th>
									<th>SPH Type</th>
									<th>SPH Code</th>
									<th>Status</th>
									<th>Nama Perusahaan</th>
									<th>Penanggung Jawab</th>
									<th>Nomer Telephone</th>
									<th>Nama produk</th>
									<th>Harga per Liter </th>
									<th>PPN </th>
									<th>PBBKB </th>
									<th>Total Harga</th>
									<th>Lokasi </th>
									<th>Harga OAT </th>
									<th>Last Update oleh</th>
									<th>Last Update</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('a45fce01-2b5f-43f2-955f-25ce64d4b0a5')): $__env->markAsRenderedOnce('a45fce01-2b5f-43f2-955f-25ce64d4b0a5');
$__env->startPush('modal'); ?>
<?php echo $__env->make('sph.modal.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('sph.modal.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('sph.modal.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('67dc2f05-21fb-4e95-8537-ac263cfa72d5')): $__env->markAsRenderedOnce('67dc2f05-21fb-4e95-8537-ac263cfa72d5');
$__env->startPush('scripts'); ?>
<?php echo $__env->make('sph.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); endif; ?>
<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
							<h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<form id="uploadForm" enctype="multipart/form-data">
							<div class="modal-body">
									<div class="form-group">
											<label for="file">Choose file</label>
											<input type="file" class="form-control" id="file" name="file" required>
									</div>
									<input type="hidden" id="sph_id" name="sph_id">
									<input type="hidden" id="sph_code" name="sph_code">
							</div>
							<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

									<button type="submit" class="btn btn-primary">Upload</button>
							</div>
					</form>
			</div>
	</div>
</div>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/sph copy 2/index.blade.php ENDPATH**/ ?>