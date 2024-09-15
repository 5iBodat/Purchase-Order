<?php $__env->startSection('title', 'Pembuatan PO /  Purchase Order'); ?>

<?php $__env->startSection('page-heading'); ?>
<style>
	.modal-dialog {
			max-width: 75%; /* 3/4 of the screen width */
	}
</style>
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Pembuatan Purchase Order untuk Transporter</h3>
				<p class="text-subtitle text-muted">Halaman untuk membuat Purchase Order kepada Transporter</p>
				</p>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Transporter
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
	<div class="col-6 col-lg-6 col-md-6">
		<div class="card">
			<div class="card-body px-3 py-4-4">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon">
							<i class="iconly-boldChart"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h6 class="text-muted font-semibold">Total PO Yang dibuat</h6>
						<h6 class="font-extrabold mb-0" id="totalData">
							</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-6 col-lg-6 col-md-6">
		<div class="card">
			<div class="card-body px-3 py-4-4">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon blue">
							<i class="iconly-boldChart"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h6 class="text-muted font-semibold">Total PO Menunggu Approval</h6>
						<h6 class="font-extrabold mb-0" id="submit">
							</h6>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-6 col-lg-6 col-md-6">
		<div class="card">
			<div class="card-body px-3 py-4-4">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon red">
							<i class="iconly-boldActivity"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h6 class="text-muted font-semibold">Total PO - Revisi atau Rejected</h6>
						<h6 class="font-extrabold mb-0" id="revisi">
							</h6>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-6 col-lg-6 col-md-6">
		<div class="card">
			<div class="card-body px-3 py-4-4">
				<div class="row">
					<div class="col-md-4">
						<div class="stats-icon green">
							<i class="iconly-boldActivity"></i>
						</div>
					</div>
					<div class="col-md-8">
						<h6 class="text-muted font-semibold">Total PO yang sudah Di Approved</h6>
						<h6 class="font-extrabold mb-0" id="approve">
							</h6>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="col card">
					<div class="d-flex justify-content-end pb-3">
						<div class="btn-group gap gap-2">

						</div>
					</div>
					<div class="d-flex justify-content-end pb-3">

						<div class="btn-group gap gap-2">
							<button type="button" class="btn btn-primary icon icon-left" data-bs-toggle="modal"
								data-bs-target="#createModal">
								<i class="bi bi-plus-circle"></i> Buat PO Transport
							</button>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table w-100 table-hover" id="table">
							<thead>
								<tr>
									<th>#</th>
									<th>PO No</th>
									<th>PO Date</th>
									<th>To</th>
									<th>Name</th>
									<th>Address</th>
									<th>Phone/Fax</th>
									<th>Special Comments</th>
									<th>FOB</th>
									<th>Term</th>
									<th>Transport</th>
									<th>Loading Point</th>
									<th>Delivered To</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Amount</th>
									<th>Uang Portal</th>
									<th>Sub Total</th>
									<th>Total</th>
									<th>Status</th>
									<th>Tanggal Diupdate</th>
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

<?php echo $__env->make('po_transporter.modal.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('po_transporter.modal.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('po_transporter.modal.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if (! $__env->hasRenderedOnce('fc937661-b981-4003-b798-0e5672d05c37')): $__env->markAsRenderedOnce('fc937661-b981-4003-b798-0e5672d05c37');
$__env->startPush('scripts'); ?>
<?php echo $__env->make('po_transporter.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); endif; ?>


<!-- Modal Upload PO -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
			<div class="modal-content">
					<div class="modal-header">
							<h5 class="modal-title" id="uploadModalLabel">Upload PO untuk :</h5>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<form id="uploadForm" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="form-group">
									<label for="po_no">Nomer PO aaa</label>
									<input type="text" class="form-control" id="po_no" name="po_no" required>
							</div>
									<div class="form-group">
											<label for="file">Choose file * maksimal file 2mb</label>
											<input type="file" class="form-control" id="file" name="file" required>
									</div>
									<input type="hidden" id="po_id" name="po_id">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Unknown\OneDrive\Documents\KERJA\FREELANCE\sph\resources\views/po_transporter/index.blade.php ENDPATH**/ ?>