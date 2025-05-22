<div class="modal fade" id="modal-edit" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit E-Learning</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="form-create" enctype="multipart/form-data">
                <input type="hidden" name="id_elearning" id="id_elearning_edit">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama_edit" autocomplete="off" placeholder="Nama" required>
                        </div>
                        <div class="col-md-6">
                            <label for="username_elearning" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username_elearning" id="username_elearning_edit" autocomplete="off" placeholder="Username" required>
                        </div>
                       <div class="col-md-6 mt-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control password" name="password_elearning" id="password_edit" autocomplete="off" placeholder="Password" required>
                                <span class="input-group-text show-hide-password" id="basic-addon2"><i class="fas fa-eye-slash"></i></span>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" name="kelas" id="kelas_edit" autocomplete="off" placeholder="Kelas" required>
                        </div>
                        <?php if($type == 'Guru'){ ?>
                            <div class="col-md-12 mt-3">
                                <label for="mapel" class="form-label">Mata Pelajaran</label>
                                <input type="text" class="form-control" name="mapel" id="mapel_edit" autocomplete="off" placeholder="Mata Pelajaran" required>
                            </div>
                        <?php } ?>
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