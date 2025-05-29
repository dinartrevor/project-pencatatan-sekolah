<div class="modal fade" id="modal-create" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="form-create" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nama_guru" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control" name="nama_guru" id="nama_guru" autocomplete="off" placeholder="Nama Guru" required>
                        </div>
                        <div class="col-md-4">
                            <label for="nik_guru" class="form-label">NIK Guru</label>
                            <input type="text" class="form-control" name="nik_guru" id="nik_guru" autocomplete="off" placeholder="NIK Guru" required>
                        </div>
                        <div class="col-md-4">
                            <label for="nomor_handphone" class="form-label">No Handphone</label>
                            <input type="text" class="form-control" name="nomor_handphone" id="nomor_handphone" autocomplete="off" placeholder="No Handphone" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="tempat" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat" id="tempat" autocomplete="off" placeholder="Tempat Lahir" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" autocomplete="off" placeholder="Tanggal Lahir" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="mapel" class="form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control" name="mapel" id="mapel" autocomplete="off" placeholder="Mata Pelajaran" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" autocomplete="off" placeholder="Pendidikan Terakhir" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" id="jabatan" autocomplete="off" placeholder="Jabatan" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="jenjang_id" class="form-label">Jenjang</label>
                            <select name="jenjang_id" id="jenjang_id" class="form-control jenjang_id">
                                <option value="">Pilih Jenjang</option>
                                <?php foreach ($dataJenjang as $key => $jenjang) { ?>
                                    <option value="<?= $jenjang['id'] ?>"><?= $jenjang['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="kelas_id" class="form-label">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control kelas_id">
                             
                            </select>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="agama" class="form-label">Agama</label>
                            <input type="text" class="form-control" name="agama" id="agama" autocomplete="off" placeholder="Agama" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" name="image" id="image"  accept="image/*">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="status" class="form-label">Status </label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">Pilih Status</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>