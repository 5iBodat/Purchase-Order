<td class="text-bold-500">
	<div class="btn-group gap gap-2 mb-3" role="group">
		<button type="button" class="btn btn-primary btn-sm show-modal" data-id="{{ $model->id }}" data-bs-toggle="modal"
			data-bs-target="#showModal">
			<i class="bi bi-search"></i>
		</button>
		@if ( $model->status == 1)
		<span data-bs-toggle="modal" data-bs-target="#updateModal">
			<button type="button" class="btn btn-success btn-sm update-modal" data-id="{{ $model->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve">
				<i class="bi bi-check2-square"></i>
			</button>
		</span>
	@elseif( $model->status == 2)
	<span data-bs-toggle="modal" data-bs-target="#updateModal">
		<button type="button" class="btn btn-success btn-sm revisi-modal" data-id="{{ $model->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Revisi">
			<i class="bi bi-pencil-square"></i>
		</button>
	</span>
	

	@elseif ( $model->status == 3)
	<button type="button" class="btn btn-success btn-sm download" data-id="{{ $model->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Download">
        <i class="bi bi-download"></i>
    </button> 
@endif
	</div>
</td>
