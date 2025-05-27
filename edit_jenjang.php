<div class="modal fade" id="modal-edit" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Jenjang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="form-create" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id_edit">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" id="name_edit" autocomplete="off" placeholder="Nama Jenjang" required>
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