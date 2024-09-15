<td class="text-bold-500">
	<div class="btn-group gap gap-2 mb-3" role="group">
		<button type="button" class="btn btn-primary btn-sm show-modal" data-id="{{ $model->id }}" data-bs-toggle="modal"
			data-bs-target="#showModal">
			<i class="bi bi-search"></i>
		</button>
		@if ( $model->status == 1)
    <button type="button" class="btn btn-success btn-sm update-modal" data-id="{{ $model->id }}" data-bs-toggle="modal" data-bs-target="#updateModal">
        <i class="bi bi-pencil-square">Approval</i>
    </button>

@endif
	</div>
</td>
