<div class="modal fade" id="modal-edit" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Akses Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="form-edit" enctype="multipart/form-data">
                <input type="hidden" name="id" id="iduser">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama_edit" autocomplete="off" placeholder="Nama" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email_edit" autocomplete="off" placeholder="Email" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control password" name="password_login" id="password_edit" autocomplete="off" placeholder="Password" required>
                                <span class="input-group-text show-hide-password" id="basic-addon2"><i class="fas fa-eye-slash"></i></span>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="role" class="form-label">Role</label>
                           <select name="role" id="role_edit" class="form-control">
                                <option value="">Pilih Role</option>
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