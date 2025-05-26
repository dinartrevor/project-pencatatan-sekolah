<div class="modal fade" id="modal-edit" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="form-edit" enctype="multipart/form-data">
                <input type="hidden" id="id_siswa_edit" name="id_siswa">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nama_siswa" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa_edit" autocomplete="off" placeholder="Nama Siswa" required>
                        </div>
                        <div class="col-md-4">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" class="form-control" name="nis" id="nis_edit" autocomplete="off" placeholder="NIS Siswa" required>
                        </div>
                        <div class="col-md-4">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin_edit" class="form-control" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="tempat" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat" id="tempat_edit" autocomplete="off" placeholder="Tempat Lahir" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control tanggal_lahir" name="tanggal_lahir" id="tanggal_lahir_edit" autocomplete="off" placeholder="Tanggal Lahir" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="usia" class="form-label">Usia</label>
                            <input type="text" class="form-control usia" name="usia" id="usia_edit" autocomplete="off" placeholder="Usia" readonly>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="agama" class="form-label">Agama</label>
                            <input type="text" class="form-control" name="agama" id="agama_edit" autocomplete="off" placeholder="Agama" required>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                            <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah_edit" autocomplete="off" placeholder="Asal Sekolah">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="angkatan" class="form-label">Angkatan</label>
                            <input type="text" class="form-control" name="angkatan" id="angkatan_edit" autocomplete="off" placeholder="Angkatan">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" name="kelas" id="kelas_edit" autocomplete="off" placeholder="Kelas" required>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="nama_ayah" class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control" name="nama_ayah" id="nama_ayah_edit" autocomplete="off" placeholder="Nama Ayah" required>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="no_handphone_ayah" class="form-label">No Hp Ayah</label>
                            <input type="text" class="form-control" name="no_handphone_ayah" id="no_handphone_ayah_edit" autocomplete="off" placeholder="Nama Hp Ayah" required>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="nama_ibu" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu_edit" autocomplete="off" placeholder="Nama Ibu" required>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="no_handphone_ibu" class="form-label">No Hp Ibu</label>
                            <input type="text" class="form-control" name="no_handphone_ibu" id="no_handphone_ibu_edit" autocomplete="off" placeholder="Nama Hp Ibu" required>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                            <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah_edit" autocomplete="off" placeholder="Pekerjaan Ayah" required>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                            <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu_edit" autocomplete="off" placeholder="Pekerjaan Ibu" required>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="anak_ke" class="form-label">Anak Ke</label>
                            <input type="number" class="form-control" name="anak_ke" id="anak_ke_edit" autocomplete="off" placeholder="Anak Ke" required>
                        </div>
                         <div class="col-md-3 mt-3">
                            <label for="jumlah_saudara" class="form-label">Jumlah Saudara</label>
                            <input type="number" class="form-control" name="jumlah_saudara" id="jumlah_saudara_edit" autocomplete="off" placeholder="Jumlah Saudara" required>
                        </div>
                         <div class="col-md-6 mt-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat_edit" autocomplete="off" placeholder="Alamat" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" name="image" id="image"  accept="image/*">
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