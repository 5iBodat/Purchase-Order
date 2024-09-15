@extends('layouts.app')

@section('title', 'Penerimaan Purchase Order')

@section('page-heading')
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Penerimaan Purchase Order</h3>
				<p class="text-subtitle text-muted">Halaman untuk update atau mencatat penerima Purchase Order ( PO ) dari customer</p>
				</p>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('dashboard') }}">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Penerimaan PO
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="col card">
					<div class="d-flex justify-content-end pb-3">
						<div class="btn-group gap gap-2">
						</div>
					</div>

					<div class="table-responsive">
						<table class="table w-100 table-hover" id="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Customer</th>
									<th>Nomer SPH</th>
									<th>Nomer PO</th>
									<th>Purchase Order</th>
									<th>Diupdate oleh</th>
									<th>Tanggal Ditambahkan</th>

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
@endsection


@pushOnce('scripts')
@include('purchase_order.script')
@endPushOnce
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
									<label for="po_no">Nomer PO Customer</label>
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
