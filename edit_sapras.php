<div class="modal fade" id="modal-edit" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Sapras</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="form-edit" enctype="multipart/form-data">
                <input type="hidden" name="id" id="idsapras">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang_edit" autocomplete="off" placeholder="Nama" required>
                        </div>
                        <div class="col-md-6">
                            <label for="merek" class="form-label">Merek</label>
                            <input type="text" class="form-control" name="merek" id="merek_edit" autocomplete="off" placeholder="Merek" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="image" class="form-label">Gambar Barang</label>
                            <input type="file" class="form-control" name="image" id="image" autocomplete="off" accept="image/*">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="qty" class="form-label">Jumlah</label>
                            <input type="number" min="1" class="form-control" name="qty" id="qty_edit" autocomplete="off" placeholder="Jumlah" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="role" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan_edit" rows="7" class="form-control" placeholder="Keterangan"></textarea>
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