<div class="modal fade" id="addStudentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Masukkan nama lengkap..">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="gender" id="gender">
                                <option selected>Pilih jenis kelamin</option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Masukkan alamat email..">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Nomor Handphone</label>
                                <input type="text" class="form-control" name="phone_number" id="phone_number"
                                    placeholder="Masukkan nomor handphone..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <label for="school_year_start">Tahun Ajaran</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="school_year_start"
                                    placeholder="Masukkan mulai tahun ajaran.." value="{{ date('Y') - 3 }}">
                                <span class="input-group-text">-</span>
                                <input type="text" class="form-control" name="school_year_end"
                                    placeholder="Masukkan akhir tahun ajaran.." value="{{ date('Y') }}">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>