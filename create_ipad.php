<div class="modal fade" id="modal-create" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Ipad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="form-create" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" placeholder="Nama" required>
                        </div>
                        <div class="col-md-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control password" name="password" id="password" autocomplete="off" placeholder="Password" required>
                                <span class="input-group-text show-hide-password" id="basic-addon2"><i class="fas fa-eye-slash"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="no_handphone" class="form-label">No. Handphone</label>
                            <input type="text" class="form-control" name="no_handphone" id="no_handphone" autocomplete="off" placeholder="No. Handphone" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="apple_id" class="form-label">Apple ID</label>
                            <input type="text" class="form-control" name="apple_id" id="apple_id" autocomplete="off" placeholder="Apple ID" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="tipe_ipad" class="form-label">Tipe Ipad</label>
                            <input type="text" class="form-control" name="tipe_ipad" id="tipe_ipad" autocomplete="off" placeholder="Tipe Ipad" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="serial_number" class="form-label">Serial Number</label>
                            <input type="text" class="form-control" name="serial_number" id="serial_number" autocomplete="off" placeholder="Serial Number" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="konektivitas" class="form-label">Konektivitas</label>
                            <input type="text" class="form-control" name="konektivitas" id="konektivitas" autocomplete="off" placeholder="Konektivitas" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="storage" class="form-label">Storage</label>
                            <input type="text" class="form-control" name="storage" id="storage" autocomplete="off" placeholder="Storage" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="kode_restrict" class="form-label">Kode Restrict</label>
                            <input type="text" class="form-control" name="kode_restrict" id="kode_restrict" autocomplete="off" placeholder="Kode Restrict" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="image" id="image" accept="image/*">
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