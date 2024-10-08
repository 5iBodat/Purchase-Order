<div class="modal fade text-left" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Ubah Data Pelajar
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
									<label for="student_identification_number">NIS/NISN/NIM:</label>
									<div class="position-relative">
										<input type="number" class="form-control" id="student_identification_number"
											placeholder="Masukkan nis/nisn/nim..." />
										<div class="form-control-icon">
											<div class="bi bi-person-bounding-box"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="name">Nama Lengkap:</label>
									<div class="position-relative">
										<input type="text" class="form-control" id="name" placeholder="Masukkan nama lengkap..." />
										<div class="form-control-icon">
											<i class="bi bi-person-fill"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="gender">Jenis Kelamin:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="gender">
											<div><i class="bi bi-gender-male"></i></div>
										</label>
										<select class="form-select" id="gender">
											<option value="">Pilih Jenis Kelamin</option>
											<option value="1">Laki-laki</option>
											<option value="2">Perempuan</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="school_class_id">Kelas:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="school_class_id">
											<div><i class="bi bi-bookmark-fill"></i></div>
										</label>
										<select class="form-select" id="school_class_id">
											<option value="">Pilih Kelas</option>
											<?php $__currentLoopData = $schoolClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schoolClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($schoolClass->id); ?>"><?php echo e($schoolClass->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="school_major_id">Jurusan:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="school_major_id">
											<div><i class="bi bi-briefcase-fill"></i></div>
										</label>
										<select class="form-select" id="school_major_id">
											<option value="">Pilih Jurusan</option>
											<?php $__currentLoopData = $schoolMajors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schoolMajor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($schoolMajor->id); ?>"><?php echo e($schoolMajor->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="email">Alamat Email:</label>
									<div class="position-relative">
										<input type="email" class="form-control" id="email" placeholder="Masukkan alamat email..." />
										<div class="form-control-icon">
											<i class="bi bi-envelope-fill"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="phone_number">Nomor Handphone:</label>
									<div class="position-relative">
										<input type="number" class="form-control" id="phone_number"
											placeholder="Masukkan nomor handphone..." />
										<div class="form-control-icon">
											<i class="bi bi-telephone-fill"></i>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="school_year_start">Tahun Ajaran Awal:</label>
									<div class="input-group">
										<input type="number" class="form-control" id="school_year_start"
											placeholder="Masukkan tahun ajaran awal..." value="2020">
										<span class="input-group-text">-</span>
										<input type="number" class="form-control " id="school_year_end"
											placeholder="Masukkan tahun ajaran akhir..." value="2023">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-success">Ubah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/students/modal/edit.blade.php ENDPATH**/ ?>