<?php $__env->startSection('content'); ?>
<div class="row h-100">
	<div class="col-lg-5 col-12">
		<div id="auth-left">
			<h1 class="auth-title">Log in.</h1>
			<p class="auth-subtitle mb-5">
				Log in untuk melanjutkan ke dalam dashboard.
			</p>

			<?php if(session('error')): ?>
			<div class="alert alert-danger alert-dismissible show fade">
				<?php echo e(session('error')); ?>

				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php endif; ?>

			<?php if(session('success')): ?>
			<div class="alert alert-success alert-dismissible show fade">
				<?php echo e(session('success')); ?>

				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php endif; ?>

			<form action="<?php echo e(route('login')); ?>" method="POST">
				<?php echo csrf_field(); ?>
				<div class="form-group position-relative has-icon-left mb-4">
					<input type="text" class="form-control form-control-xl" name="email" placeholder="Email" autofocus />
					<div class="form-control-icon">
						<i class="bi bi-person"></i>
					</div>
				</div>
				<div class="form-group position-relative has-icon-left mb-4">
					<input type="password" class="form-control form-control-xl" name="password" placeholder="Password" />
					<div class="form-control-icon">
						<i class="bi bi-shield-lock"></i>
					</div>
				</div>
				<div class="form-check form-check-lg d-flex align-items-end">
					<input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" />
					<label class="form-check-label text-gray-600" for="flexCheckDefault">
						Keep me logged in
					</label>
				</div>
				<button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
					Log in
				</button>
			</form>
		</div>
	</div>
	<div class="col-lg-7 d-none d-lg-block">
		<div id="auth-right"></div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('authentication.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/authentication/login.blade.php ENDPATH**/ ?>