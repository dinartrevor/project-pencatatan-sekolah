<div class="modal fade" id="modal-edit" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="form-create" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id_kelas_edit">
                <div class="modal-body">
                    <div class="row">
                         <div class="col-md-6">
                            <label for="jenjang_id" class="form-label">Jenjang</label>
                            <select name="jenjang_id" id="jenjang_id_edit" class="form-control">
                               
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" name="name" id="name_edit" autocomplete="off" placeholder="Nama Kelas" required>
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