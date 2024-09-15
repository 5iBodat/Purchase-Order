<?php $__env->startSection('title', 'Laporan Transaksi Kas'); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Laporan Transaksi Kas</h3>
				<p class="text-subtitle text-muted">Halaman laporan transaksi kas.</p>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Laporan Transaksi Kas
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
		<?php echo $__env->make('utilities.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="row">
			<div class="col-6 col-lg-6 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
								<div class="stats-icon purple">
									<i class="iconly-boldChart"></i>
								</div>
							</div>
							<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">
									Total Hari Ini
								</h6>
								<h6 class="font-extrabold mb-0"><?php echo e($cashTransactions['cashTransactionTodayCount']); ?></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 col-lg-6 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
								<div class="stats-icon purple">
									<i class="iconly-boldChart"></i>
								</div>
							</div>
							<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">
									Total Minggu Ini
								</h6>
								<h6 class="font-extrabold mb-0"><?php echo e($cashTransactions['cashTransactionCurrentWeekCount']); ?></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 col-lg-6 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
								<div class="stats-icon purple">
									<i class="iconly-boldChart"></i>
								</div>
							</div>
							<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">
									Total Bulan Ini
								</h6>
								<h6 class="font-extrabold mb-0"><?php echo e($cashTransactions['cashTransactionCurrentMonthCount']); ?></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 col-lg-6 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
								<div class="stats-icon purple">
									<i class="iconly-boldChart"></i>
								</div>
							</div>
							<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">
									Total Tahun Ini
								</h6>
								<h6 class="font-extrabold mb-0"><?php echo e($cashTransactions['cashTransactionCurrentYearCount']); ?></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="card text-center">
			<div class="card-header">
				<h4>Filter Data dengan Rentang Tanggal</h4>
			</div>
			<div class="card-body">
				<form action="" method="GET">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group has-icon-left">
								<label for="start_date">Tanggal Mulai:</label>
								<div class="position-relative">
									<input type="date" class="form-control" value="<?php echo e(request('start_date')); ?>" name="start_date"
										id="start_date" placeholder="Masukkan tanggal mulai...">
									<div class="form-control-icon">
										<i class="bi bi-calendar2-fill"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-icon-left">
								<label for="end_date">Tanggal Akhir:</label>
								<div class="position-relative">
									<input type="date" class="form-control" value="<?php echo e(request('end_date')); ?>" name="end_date"
										id="end_date" placeholder="Masukkan tanggal akhir...">
									<div class="form-control-icon">
										<i class="bi bi-calendar2-fill"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary px-5">Filter</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php if(isset($cashTransactions['filteredResult'])): ?>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table w-100 table-hover" id="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Pelajar</th>
								<th>Tanggal Transaksi</th>
								<th>Nominal Pembayaran</th>
								<th>Dicatat Oleh</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $cashTransactions['filteredResult']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cashTransaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($loop->iteration); ?></td>
								<td><?php echo e($cashTransaction->student->name); ?></td>
								<td><?php echo e($cashTransaction->date_paid_formatted); ?></td>
								<td><?php echo e($cashTransaction->amount_formatted); ?></td>
								<td><?php echo e($cashTransaction->createdBy->name); ?></td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right"><b>Total</b></td>
								<td><?php echo e($cashTransactions['sum']); ?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>


<?php if (! $__env->hasRenderedOnce('4208e11a-4307-4641-9fa6-fe9e5f187fb0')): $__env->markAsRenderedOnce('4208e11a-4307-4641-9fa6-fe9e5f187fb0');
$__env->startPush('scripts'); ?>
<script>
	$(function () {
		const table = $('#table').DataTable({});
	});
</script>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Unknown\OneDrive\Documents\KERJA\FREELANCE\sph\resources\views/cash_transactions/reports/index.blade.php ENDPATH**/ ?>