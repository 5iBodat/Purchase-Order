<td class="text-bold-500">
	<div class="btn-group gap gap-2 mb-3" role="group">
		<button type="button" class="btn btn-primary btn-sm show-modal" data-id="<?php echo e($model->id); ?>" data-bs-toggle="modal"
			data-bs-target="#showModal">
			<i class="bi bi-search"></i>
		</button>
		<?php if( $model->status == 1): ?>
    <button type="button" class="btn btn-success btn-sm update-modal" data-id="<?php echo e($model->id); ?>" data-bs-toggle="modal" data-bs-target="#updateModal">
        <i class="bi bi-pencil-square">Approval</i>
    </button>

<?php endif; ?>
	</div>
</td>
<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/sph/datatables/action.blade.php ENDPATH**/ ?>