<div class="modal fade" id="notPaidModal" tabindex="-1">
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="notPaidModalLabel">Belum Membayar Minggu Ini</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<?php $__currentLoopData = $cashTransaction['studentsNotPaidThisWeek']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-6">
						<div class="card border rounded">
							<div class="card-body">
								<h5 class="card-title fw-bold">
									<?php echo e($loop->iteration); ?>. <?php echo e($student->name); ?>

								</h5>
								<p class="card-text text-muted">
									<?php echo e($student->student_identification_number); ?>

								</p>
								<p class="card-text text-muted">
									<span class="badge rounded-pill text-bg-secondary">
										<i class="bi bi-telephone-fill"></i>
										<?php echo e($student->phone_number); ?>

									</span>
								</p>
								<span class="badge rounded-pill text-bg-primary">
									<i class="bi bi-bookmark"></i>
									<?php echo e($student->schoolClass->name); ?>

								</span>
								<span class="badge rounded-pill text-bg-success">
									<i class="bi bi-briefcase"></i>
									<?php echo e($student->schoolMajor->name); ?> (<?php echo e($student->schoolMajor->abbreviation); ?>)
								</span>
								<span class="badge rounded-pill text-bg-<?php echo e($student->gender === 1 ? 'info' : 'warning'); ?>">
									<i class="bi bi-<?php echo e($student->gender === 1 ? 'gender-male' : 'gender-female'); ?>"></i>
								</span>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/cash_transactions/modal/not-paid.blade.php ENDPATH**/ ?>