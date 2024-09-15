<?php $__env->startSection('title', 'Data Configuration OAT Lokasi'); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Konfigurasi Data OAT Lokasi</h3>
				<p class="text-subtitle text-muted">Halaman untuk manajemen data oat lokasi seperti melihat, mengubah dan menghapus.
				</p>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Oat - Lokasi
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
								<i class="bi bi-plus-circle"></i> Tambah Data OAT Lokasi
							</button>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table w-100 table-hover" id="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama OAT Lokasi</th>
									<th>Harga OAT Lokasi</th>
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

<?php if (! $__env->hasRenderedOnce('28b9c4cf-c168-4338-90d6-a70a8f3e4d5a')): $__env->markAsRenderedOnce('28b9c4cf-c168-4338-90d6-a70a8f3e4d5a');
$__env->startPush('modal'); ?>
<?php echo $__env->make('oat_lokasi.modal.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('oat_lokasi.modal.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('f45e2238-8d87-456f-8746-0b13bbc59cea')): $__env->markAsRenderedOnce('f45e2238-8d87-456f-8746-0b13bbc59cea');
$__env->startPush('scripts'); ?>
<?php echo $__env->make('oat_lokasi.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Unknown\OneDrive\Documents\KERJA\FREELANCE\sph\resources\views/oat_lokasi/index.blade.php ENDPATH**/ ?>