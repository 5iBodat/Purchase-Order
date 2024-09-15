<div class="modal fade text-left" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Membuat SPH - Surat Penawaran Harga
				</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<form class="form form-vertical">
					<div class="form-body">
						<div class="row">
							<div class="col-lg-3">
								<div class="form-group has-icon-left">
									<label for="sph_type">Pilih Jenis SPH:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="sph_type">
											<div><i class="bi bi-bookmark-fill"></i></div>
										</label>
										<select class="form-select" id="sph_type" style="background-color:#d3d3d3" disabled>
											<option value="">Pilih SPH</option>
											@foreach ($sphType as $sphTypes)
											<option value="{{ $sphTypes->value }}" data-id="{{$sphTypes->id}}">{{ $sphTypes->value }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="col-lg-3">
								<div class="form-group has-icon-left">
									<label for="to">To:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="to">
										<div><i class="bi bi-collection-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="to"style="background-color:#d3d3d3" readonly>							
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group has-icon-left">
									<label for="po_number">Nomor PO:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="po_number">
										<div><i class="bi bi-collection-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="po_number" maxlength="30" placeholder="Masukkan kode sph..." style="background-color:#d3d3d3" readonly/>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group has-icon-left">
									<label for="po_date">Tanggal PO:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="po_date">
										<div><i class="bi bi-calendar-fill"></i></div>
										</label>
										<input type="date" class="form-control" id="po_date" maxlength="30" placeholder="Masukkan kode sph..." style="background-color:#d3d3d3" disabled/>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="name">Name :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="name">
											<div><i class="bi bi-person-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="name" />
									</div>
								</div>
							</div>
	
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="address">Alamat :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="address">
											<div><i class="bi bi-geo-alt-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="address" />
									</div>
								</div>
							</div>
	
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="phone_fax">Nomer Telp :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="phone_fax">
											<div><i class="bi bi-phone-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="phone_fax" />
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="fob_point">FOB :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="fob_point">
											<div><i class="bi bi-truck"></i></div>
										</label>
										<input type="text" class="form-control" id="fob_point" />
									</div>
								</div>
							</div>
	
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="term">Term :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="term">
											<div><i class="bi bi-calendar-fill"></i></div>
										</label>
										<input type="number" class="form-control" id="term" />
									</div>
								</div>
							</div>
	
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="transport_update">Transport :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="transport_update">
											<div><i class="bi bi-cash"></i></div>
										</label>
										<input type="number" class="form-control" id="transport_update" placeholder="Rp. /liter" />
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="loading_point">Loading Point :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="loading_point">
											<div><i class="bi bi-geo-alt-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="loading_point" />
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="shipped_via">Shipped Via :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="shipped_via">
											<div><i class="bi bi-send-check-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="shipped_via" />
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="delivered_to">Delivary To :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="delivered_to">
											<div><i class="bi bi-person-vcard-fill"></i></div>
										</label>
										<input type="text" class="form-control" id="delivered_to" />
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg">
								<div class="form-group has-icon-left">
									<label for="comments">Comments Or Special of Instructions :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="comments">
											<div><i class="bi bi-chat-dots"></i></div>
										</label>
										<textarea class="form-control" id="comments" placeholder="Masukan catatan" rows="3" width='80%' ></textarea>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="quantity_update">Quantity :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="quantity_update">
											<div><i class="bi bi-box-fill"></i></div>
										</label>
										<input type="number" class="form-control" id="quantity_update" />
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="unit_price_update">Harga :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="unit_price_update">
											<div><i class="bi bi-cash"></i></div>
										</label>
										<input type="text" class="form-control" id="unit_price_update"/>
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="amount_update">Amount :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="amount_update">
											<div><i class="bi bi-credit-card"></i></div>
										</label>
										<input type="number" class="form-control" id="amount_update" style="background-color:#d3d3d3" readonly/>
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="portal_update">Uang Portal :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="portal_update">
											<div><i class="bi bi-wallet"></i></div>
										</label>
										<input type="text" class="form-control" id="portal_update" />
									</div>
								</div>
							</div>
							
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="sub_total_update">Sub Total :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="sub_total_update">
											<div><i class="bi bi-calculator"></i></div>
										</label>
										<input type="number" class="form-control" id="sub_total_update"style="background-color:#d3d3d3" readonly />
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="total_update">Total :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="total_update">
											<div><i class="bi bi-calculator"></i></div>
										</label>
										<input type="number" class="form-control" id="total_update" style="background-color:#d3d3d3" readonly/>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="description">Description :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="description">
											<div><i class="bi bi-file-text"></i></div>
										</label>
										<textarea class="form-control" id="description" placeholder="Masukan catatan" rows="3" width='80%' ></textarea>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="notes">Notes :</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="notes">
											<div><i class="bi bi-file-earmark-text"></i></div>
										</label>
										<textarea class="form-control" id="notes" placeholder="Masukan catatan apabila di reject atau di approved" rows="3" width='80%'></textarea>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group has-icon-left">
									<label for="hargaoat">Konfirmasi SPH :</label>
									<div class="input-group mb-3" id="radio-buttons-container">
										
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" class="form-control" id="lastupdate_by" name="lastupdate_by" />

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

