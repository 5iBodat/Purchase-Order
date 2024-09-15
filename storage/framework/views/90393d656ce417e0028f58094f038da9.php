<td class="text-bold-500">
	<div class="btn-group gap gap-2 mb-3" role="group">
		<button type="button" class="btn btn-primary btn-sm show-modal" data-id="<?php echo e($model->id); ?>" data-bs-toggle="modal"
			data-bs-target="#showModal">
			<i class="bi bi-search"></i>
		</button>
		<?php if($model->status != 3 && $model->status != 4): ?>
    <button type="button" class="btn btn-success btn-sm update-modal" data-id="<?php echo e($model->id); ?>" data-bs-toggle="modal" data-bs-target="#updateModal">
        <i class="bi bi-pencil-square"></i>
    </button>
		<?php elseif($model->status == 4): ?>
		<a href="<?php echo e(asset('storage/app/' . $model->customer_po)); ?>" class="btn btn-info btn-sm">
			<i class="bi bi-file-arrow-down"></i> Download
	</a>
<?php endif; ?>
	</div>
</td>
<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/sph copy 2/datatables/action.blade.php ENDPATH**/ ?>