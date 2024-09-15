@extends('layouts.app')

@section('title', 'Data Supplier')

@section('page-heading')
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Master Data Supplier</h3>
				<p class="text-subtitle text-muted">Halaman untuk manajemen data supplier seperti melihat, mengubah dan menghapus.
				</p>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('dashboard') }}">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Master Data Supplier
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
							<button type="button" class="btn btn-primary icon icon-left" data-bs-toggle="modal"
								data-bs-target="#createModal">
								<i class="bi bi-plus-circle"></i> Tambah Data Supplier
							</button>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table w-100 table-hover" id="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Supplier</th>
									<th>Kode Supplier</th>
									<th>Nomer Pajak</th>
									<th>Alamat</th>
									<th>Nama Penanggung Jawab</th>
									<th>Nomer Telepon</th>
									<th>Email</th>
									<th>No Whatsapp <br>(Klik untuk Whatsapp )</th>
									<th>Last Update</th>
									<th>Aksi</th>
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

@pushOnce('modal')
@include('supplier.modal.create')
@include('supplier.modal.show')
@include('supplier.modal.edit')
@endPushOnce

@pushOnce('scripts')
@include('supplier.script')
@endPushOnce
