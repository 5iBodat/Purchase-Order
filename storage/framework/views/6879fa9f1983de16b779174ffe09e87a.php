<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('page-heading'); ?>
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Dashboard</h3>
				<p class="text-subtitle text-muted">Dashboard.</p>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="row">
	<div class="col-12 col-lg-9">
		<div class="row">
			<div class="col-6 col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body px-4 py-4-5">
						<div class="row">
							<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
								<div class="stats-icon purple mb-2">
									<i class="iconly-boldProfile"></i>
								</div>
							</div>
							<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">
									Pelajar
								</h6>
								<h6 class="font-extrabold mb-0"><?php echo e($charts['counter']['student']); ?></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body px-4 py-4-5">
						<div class="row">
							<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
								<div class="stats-icon blue mb-2">
									<i class="iconly-boldBookmark"></i>
								</div>
							</div>
							<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">Kelas</h6>
								<h6 class="font-extrabold mb-0"><?php echo e($charts['counter']['schoolClass']); ?></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body px-4 py-4-5">
						<div class="row">
							<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
								<div class="stats-icon green mb-2">
									<i class="iconly-boldBag"></i>
								</div>
							</div>
							<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">Jurusan</h6>
								<h6 class="font-extrabold mb-0"><?php echo e($charts['counter']['schoolMajor']); ?></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body px-4 py-4-5">
						<div class="row">
							<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
								<div class="stats-icon red mb-2">
									<i class="iconly-boldProfile"></i>
								</div>
							</div>
							<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">Administrator</h6>
								<h6 class="font-extrabold mb-0"><?php echo e($charts['counter']['administrator']); ?></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 id="card-chart-cash-transactions-title">Total Transaksi Tahun Ini</h4>
						<div class="mb-3">
							<label for="year" class="form-label">Isi Tahun:</label>
							<input type="number" id="year" placeholder="Masukan tahun.." value="<?php echo e(date('Y')); ?>" class="form-control">
							<div class="form-text">Tekan tombol `Enter` untuk menampilkan grafik berdasarkan tahun yang dipilih.</div>
						</div>
					</div>
					<div class="card-body">
						<div id="chart-cash-transactions-by-year"></div>
					</div>
					<div class="card-body">
						<div id="chart-cash-transactions-amount-by-year"></div>
					</div>
				</div>
			</div>

			<div class="col-12">
				<div class="card">
					<?php if (isset($component)) { $__componentOriginalf2c5e17b54e5d5ca2a3df189b946d754 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2c5e17b54e5d5ca2a3df189b946d754 = $attributes; } ?>
<?php $component = App\View\Components\Apexcharts\LineChart::resolve(['chartTitle' => 'Total Transaksi Per Tahun','seriesTitle' => 'Total Transaksi','chartID' => 'chart-cash-transactions-count-per-year','series' => $charts['lineChart']['cashTransactionCountPerYear']['series'],'categories' => $charts['lineChart']['cashTransactionCountPerYear']['categories']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('apexcharts.line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Apexcharts\LineChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf2c5e17b54e5d5ca2a3df189b946d754)): ?>
<?php $attributes = $__attributesOriginalf2c5e17b54e5d5ca2a3df189b946d754; ?>
<?php unset($__attributesOriginalf2c5e17b54e5d5ca2a3df189b946d754); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf2c5e17b54e5d5ca2a3df189b946d754)): ?>
<?php $component = $__componentOriginalf2c5e17b54e5d5ca2a3df189b946d754; ?>
<?php unset($__componentOriginalf2c5e17b54e5d5ca2a3df189b946d754); ?>
<?php endif; ?>
				</div>
			</div>

			<div class="col-12">
				<div class="card">
					<?php if (isset($component)) { $__componentOriginalf2c5e17b54e5d5ca2a3df189b946d754 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2c5e17b54e5d5ca2a3df189b946d754 = $attributes; } ?>
<?php $component = App\View\Components\Apexcharts\LineChart::resolve(['chartTitle' => 'Total Jumlah Pembayaran Transaksi Per Tahun','seriesTitle' => 'Total Pembayaran','chartID' => 'chart-cash-transactions-amount-per-year','series' => $charts['lineChart']['cashTransactionAmountPerYear']['series'],'categories' => $charts['lineChart']['cashTransactionAmountPerYear']['categories']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('apexcharts.line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Apexcharts\LineChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf2c5e17b54e5d5ca2a3df189b946d754)): ?>
<?php $attributes = $__attributesOriginalf2c5e17b54e5d5ca2a3df189b946d754; ?>
<?php unset($__attributesOriginalf2c5e17b54e5d5ca2a3df189b946d754); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf2c5e17b54e5d5ca2a3df189b946d754)): ?>
<?php $component = $__componentOriginalf2c5e17b54e5d5ca2a3df189b946d754; ?>
<?php unset($__componentOriginalf2c5e17b54e5d5ca2a3df189b946d754); ?>
<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row">

		</div>
	</div>
	<div class="col-12 col-lg-3">
		<div class="card">
			<div class="card-body py-4 px-4">
				<div class="d-flex align-items-center">
					<div class="avatar avatar-xl">
						<img src="<?php echo e(asset('compiled/jpg/1.jpg')); ?>" alt=" Face 1" />
					</div>
					<div class="ms-3 name">
						<h5 class="font-bold"><?php echo e(auth()->user()->name); ?></h5>
						<h6 class="text-muted mb-0"><?php echo e(auth()->user()->email); ?></h6>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<?php if (isset($component)) { $__componentOriginal85e14427727f6c696986268d7cd76744 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal85e14427727f6c696986268d7cd76744 = $attributes; } ?>
<?php $component = App\View\Components\Apexcharts\PieChart::resolve(['chartTitle' => 'Pelajar Berdasarkan Jenis Kelamin','chartID' => 'chart-pie-student-gender','series' => $charts['pieChart']['studentGender']['series'],'labels' => $charts['pieChart']['studentGender']['labels'],'colors' => ['#57CAEB', '#FF7976']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('apexcharts.pie-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Apexcharts\PieChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal85e14427727f6c696986268d7cd76744)): ?>
<?php $attributes = $__attributesOriginal85e14427727f6c696986268d7cd76744; ?>
<?php unset($__attributesOriginal85e14427727f6c696986268d7cd76744); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal85e14427727f6c696986268d7cd76744)): ?>
<?php $component = $__componentOriginal85e14427727f6c696986268d7cd76744; ?>
<?php unset($__componentOriginal85e14427727f6c696986268d7cd76744); ?>
<?php endif; ?>
		</div>
		<div class="card">
			<?php if (isset($component)) { $__componentOriginal85e14427727f6c696986268d7cd76744 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal85e14427727f6c696986268d7cd76744 = $attributes; } ?>
<?php $component = App\View\Components\Apexcharts\PieChart::resolve(['chartTitle' => 'Pelajar Berdasarkan Jurusan','chartID' => 'chart-pie-student-school-major','series' => $charts['pieChart']['studentMajor']['series'],'labels' => $charts['pieChart']['studentMajor']['labels']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('apexcharts.pie-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Apexcharts\PieChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal85e14427727f6c696986268d7cd76744)): ?>
<?php $attributes = $__attributesOriginal85e14427727f6c696986268d7cd76744; ?>
<?php unset($__attributesOriginal85e14427727f6c696986268d7cd76744); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal85e14427727f6c696986268d7cd76744)): ?>
<?php $component = $__componentOriginal85e14427727f6c696986268d7cd76744; ?>
<?php unset($__componentOriginal85e14427727f6c696986268d7cd76744); ?>
<?php endif; ?>
		</div>
		<div class="card">
			<?php if (isset($component)) { $__componentOriginal85e14427727f6c696986268d7cd76744 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal85e14427727f6c696986268d7cd76744 = $attributes; } ?>
<?php $component = App\View\Components\Apexcharts\PieChart::resolve(['chartTitle' => 'Total Transaksi Berdasarkan Jenis Kelamin','chartID' => 'chart-pie-cash-transaction-by-gender','series' => $charts['pieChart']['cashTransactionCountByGender']['series'],'labels' => $charts['pieChart']['cashTransactionCountByGender']['labels']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('apexcharts.pie-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Apexcharts\PieChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal85e14427727f6c696986268d7cd76744)): ?>
<?php $attributes = $__attributesOriginal85e14427727f6c696986268d7cd76744; ?>
<?php unset($__attributesOriginal85e14427727f6c696986268d7cd76744); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal85e14427727f6c696986268d7cd76744)): ?>
<?php $component = $__componentOriginal85e14427727f6c696986268d7cd76744; ?>
<?php unset($__componentOriginal85e14427727f6c696986268d7cd76744); ?>
<?php endif; ?>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('fdf217de-83d9-471f-9d6d-9a7c00e1553d')): $__env->markAsRenderedOnce('fdf217de-83d9-471f-9d6d-9a7c00e1553d');
$__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('extensions/apexcharts/apexcharts.min.js')); ?>"></script>
<?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Unknown\OneDrive\Documents\KERJA\FREELANCE\sph\resources\views/dashboard.blade.php ENDPATH**/ ?>