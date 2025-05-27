<div class="modal fade" id="modal-create" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="form-create" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                         <div class="col-md-6">
                            <label for="jenjang_id" class="form-label">Jenjang</label>
                            <select name="jenjang_id" id="jenjang_id" class="form-control">
                                <option value="">Pilih Jenjang</option>
                                <?php foreach ($dataJenjang as $key => $jenjang) { ?>
                                    <option value="<?= $jenjang['id'] ?>"><?= $jenjang['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" name="name" id="name" autocomplete="off" placeholder="Nama Kelas" required>
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