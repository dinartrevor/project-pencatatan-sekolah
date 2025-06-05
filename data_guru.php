<?php

require_once 'function.php';
session_start();
if(!$_SESSION['log']){
    header('location: login.php');
}

$role = $_SESSION['role'];
$nameRole= $_SESSION['name'];


$sql = "SELECT * FROM jenjang";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$dataJenjang = [];
while ($row = $result->fetch_assoc()) {
    $dataJenjang[] = $row;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['id_guru'])) {
    try {
        $nama_guru = $_POST['nama_guru'];
        $nik_guru = $_POST['nik_guru'];
        $nomor_handphone = $_POST['nomor_handphone'];
        $mapel = $_POST['mapel'];
        $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
        $jabatan = $_POST['jabatan'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $status = $_POST['status'];
        $tempat = $_POST['tempat'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $agama = $_POST['agama'];
        $kelas_id = $_POST['kelas_id'];
        $tahun_ajaran = $_POST['tahun_ajaran'];
        $image = '';
        if (!empty($_FILES['image']['name'])) {
			$image = uploadImage($_FILES['image']);
        }

        global $conn;

        $sql = "SELECT guru.id_guru FROM guru WHERE guru.nik_guru = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $nik_guru);
		$stmt->execute();

		$result = $stmt->get_result();
		$guruExsist = $result->fetch_assoc();
		$stmt->close();
		
        if(!empty($guruExsist['id_guru'])){
            $_SESSION['message_error'] = 'Nik Sudah Ada';
            header("Location: data_guru.php");
            exit();
        }

        $insertSql = "INSERT INTO guru (nama_guru, nik_guru, nomor_handphone, mapel, pendidikan_terakhir, jabatan, jenis_kelamin, status, tempat, tanggal_lahir, agama, image, kelas_id, tahun_ajaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("ssssssssssssis", $nama_guru, $nik_guru, $nomor_handphone, $mapel, $pendidikan_terakhir, $jabatan, $jenis_kelamin, $status, $tempat, $tanggal_lahir, $agama, $image, $kelas_id, $tahun_ajaran);
        $insertStmt->execute();
        $insertStmt->close();

        $_SESSION['message_success'] = 'Data User Berhasil ditambahkan';
        header("Location: data_guru.php");
        exit();

    } catch (Exception $e) {
        $_SESSION['message_error'] = 'Error: ' . $e->getMessage();
        header("Location: data_guru.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['id_guru']) {
    try {
        $id = $_POST['id_guru'];
        $nama_guru = $_POST['nama_guru'];
        $nik_guru = $_POST['nik_guru'];
        $nomor_handphone = $_POST['nomor_handphone'];
        $mapel = $_POST['mapel'];
        $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
        $jabatan = $_POST['jabatan'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $status = $_POST['status'];
        $tempat = $_POST['tempat'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $agama = $_POST['agama'];
        $kelas_id = $_POST['kelas_id'];
        $tahun_ajaran = $_POST['tahun_ajaran'];

        $getOldImageSql = "SELECT image FROM guru WHERE id_guru = ?";
        $getOldImageStmt = $conn->prepare($getOldImageSql);
        $getOldImageStmt->bind_param("i", $id);
        $getOldImageStmt->execute();
        $getOldImageResult = $getOldImageStmt->get_result();
        $oldImageData = $getOldImageResult->fetch_assoc();
        $oldImage = $oldImageData['image'];
        $getOldImageStmt->close();

        
        if (!empty($_FILES['image']['name'])) {
			$image = uploadImage($_FILES['image']);
        }else{
             $image = $oldImage;
        }


        $updateSql = "UPDATE guru SET nama_guru=?, nik_guru=?, nomor_handphone=?, mapel=?, pendidikan_terakhir=?, jabatan=?, jenis_kelamin=?, status=?, tempat=?, tanggal_lahir=?, agama=?, image=?, kelas_id=?, tahun_ajaran=? WHERE id_guru=?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ssssssssssssisi", $nama_guru, $nik_guru, $nomor_handphone, $mapel, $pendidikan_terakhir, $jabatan, $jenis_kelamin, $status, $tempat, $tanggal_lahir, $agama, $image, $kelas_id, $tahun_ajaran, $id);
        $updateStmt->execute();
        $updateStmt->close();


        $_SESSION['message_success'] = 'Data User Berhasil diubah';
        header("Location: data_guru.php");
        exit();

    } catch (Exception $e) {
        $_SESSION['message_error'] = 'Error: ' . $e->getMessage();
        header("Location: data_guru.php");
        exit();
    }
}

function uploadImage($file)
{
    $target_dir = "uploads/";
	$randomString = str_replace('.', '', uniqid('', true));
	$file_name = $randomString . '_' . uniqid() . '.' . pathinfo($file["name"], PATHINFO_EXTENSION);
    $target_file = $target_dir .  $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($file["tmp_name"]);
	
    if ($check !== false) {
		$uploadOk = 1;
    } else {
		$uploadOk = 0;
    }
    if ($file["size"] > 3500000) {
		$uploadOk = 0;
    }
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        return '';
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $file_name;
        } else {
            return '';
        }
    }
}

$sql = "SELECT * FROM guru";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$dataGuru = [];
while ($row = $result->fetch_assoc()) {
    $dataGuru[] = $row;
}

$stmt->close();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content=" Al-Azhar Cairo Baturaja" />
        <meta name="author" content=" Al-Azhar Cairo Baturaja" />
        <title>Data Guru</title>
        <link rel="shortcut icon" href="assets/img/logoalazca.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <style>
            .biodata-card {
                padding: 20px;
            }
            .profile-img-container {
                text-align: center;
                position: relative;
            }
            .profile-img {
                width: 200px;
                height: 200px;
                border-radius: 50%;
                object-fit: cover;
                border: 5px solid #007bff; /* Border warna primary Bootstrap */
                box-shadow: 0 0 15px rgba(0, 123, 255, 0.3);
            }
            .biodata-info p {
                margin-bottom: 10px;
                font-size: 1.1em;
            }
            .biodata-info strong {
                color: #343a40;
            }
            
            @media (max-width: 767.98px) {
                .profile-img-container {
                    margin-bottom: 30px;
                }
                .biodata-info h4 {
                    text-align: center;
                }
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <div class="d-flex">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logoalazca.png" alt="Gambar" style="width:20%">
                    Al-Azhar Cairo Baturaja
                </a>
                <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm ps-5" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            </div>

            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
               
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="logout.php">
                             <i class="fas fa-sign-out"></i>   Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <!-- sidebar.php -->
                            <div class="nav">
                                <a class="nav-link" href="index.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                <div class="sb-sidenav-menu-heading">Management Account</div>
                                
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMasterData" aria-expanded="false" aria-controls="collapseMasterData">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                        Master Data
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseMasterData" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="data_jenjang.php">Data Jenjang</a>
                                        <a class="nav-link" href="data_kelas.php">Data Kelas</a>
                                    </nav>
                                </div>
                                <!-- Data Guru -->
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseGuru" aria-expanded="false" aria-controls="collapseGuru">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                                    Data Guru
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseGuru" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="data_guru.php">Daftar Guru</a>
                                    </nav>
                                </div>

                                    <!-- Data Siswa -->
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSiswa" aria-expanded="false" aria-controls="collapseSiswa">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                                    Data Siswa
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseSiswa" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="jenjang_tka.php">Jenjang TK-A</a>
                                        <a class="nav-link" href="jenjang_tkb.php">Jenjang TK-B</a>
                                        <a class="nav-link" href="jenjang_sd.php">Jenjang SD</a>
                                        <a class="nav-link" href="jenjang_sd_g2.php">Jenjang SD(Grade 2)</a>
                                        <a class="nav-link" href="jenjang_smp.php">Jenjang SMP</a>
                                    </nav>
                                </div>

                                <?php if($role == 'IT'){ ?> 
                                <!-- Data iPad -->
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseiPad" aria-expanded="false" aria-controls="collapseiPad">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tablet-alt"></i></div>
                                    Data iPad
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseiPad" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="data_ipad_guru.php">Data iPad Guru</a>
                                        <a class="nav-link" href="data_ipad_siswa.php">Data iPad Siswa</a>
                                    </nav>
                                </div>

                                <!-- Data eLearning -->
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseElearning" aria-expanded="false" aria-controls="collapseElearning">
                                    <div class="sb-nav-link-icon"><i class="fas fa-laptop-code"></i></div>
                                    Data E-Learning
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseElearning" aria-labelledby="headingFour" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="data_elearning_guru.php">E-Learning Guru</a>
                                        <a class="nav-link" href="data_elearning_siswa.php">E-Learning Siswa</a>
                                    </nav>
                                </div>
                                 <a class="nav-link" href="data_sapras.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-desktop"></i>
                                    </div>
                                    Data Sarpras IT
                                </a>

                                <?php } ?>

                              
                                
                                <?php if($role == 'IT'){ ?> 
                                <div class="sb-sidenav-menu-heading">Akses Login</div>
                                <a class="nav-link" href="data_login.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                    Data Login
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       <?= $nameRole.' - '.$role ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <input type="hidden" id="kelas_selected">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Guru</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="data_guru.php">Guru</a></li>
                            <li class="breadcrumb-item active">List Guru</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                 <div class="col-lg-12 d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create">
                                           <i class="fas fa-plus"></i> Tambah Data Guru
                                        </button>
                                        <a href="<?= 'export_guru.php' ?>" id="exportExcelBtn" class="btn btn-success">
                                           <i class="fa fa-file-excel"></i> Export to Excel
                                        </a>
                                 </div>
                               
                            </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIK Guru</th>
                                            <th>No.Handphone</th>
                                            <th>Mapel</th>
                                            <th>Pendidikan Terakhir</th>
                                            <th>Jabatan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($dataGuru as $key => $data) {
                                        ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $data['nama_guru']; ?></td>
                                            <td><?= $data['nik_guru']; ?></td>
                                            <td><?= $data['nomor_handphone']; ?></td>
                                            <td><?= $data['mapel']; ?></td>
                                            <td><?= $data['pendidikan_terakhir']; ?></td>
                                            <td><?= $data['jabatan']; ?></td>
                                            <td><?= $data['jenis_kelamin']; ?></td>
                                            <td><?= $data['status']; ?></td>
                                            <td>
                                                <a href="javascript:void(0)" data-url="<?= 'show_guru.php' ?>" data-id="<?= $data['id_guru'] ?>" class="edit btn btn-info btn-sm text-light "> <i class="fas fa-edit"></i></a>
                                                 <a href="javascript:void(0)" data-url="<?= 'show_guru.php' ?>" data-id="<?= $data['id_guru'] ?>" class="detail btn btn-primary btn-sm"> <i class="fas fa-search"></i></a>
                                                <a href="javascript:void(0)" data-url="<?= 'delete_guru.php' ?>" data-id="<?= $data['id_guru'] ?>" class="delete btn btn-danger btn-sm"> <i class="fas fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include 'create_guru.php' ?>
                <?php include 'edit_guru.php' ?>
                <?php include 'detail_guru.php' ?>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Development IT Al-Azhar Cairo Baturaja</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(function () {
                <?php if(!empty($_SESSION['message_error'])): ?>
                toastr.error('<?php echo $_SESSION['message_error']; ?>');
                <?php unset($_SESSION['message_error']); ?>
                <?php endif; ?>
                <?php if(!empty($_SESSION['message_success'])): ?>
                    toastr.success('<?php echo $_SESSION['message_success']; ?>');
                    <?php unset($_SESSION['message_success']); ?>
                <?php endif; ?>

                $('#datatablesSimple tbody').on('click', '.edit', function () {
                    let id = $(this).data('id');
                    let url_hit = $(this).data('url');
                    $.ajax({
                        url: url_hit,
                        type: 'GET',
                        data : {
                            id : id
                        }
                    }).done(function (response) {
                       response = JSON.parse(response);
                       if(response.status){
                            let data = response.data.guru;
                            let jenjang = response.data.jenjang;
                            $('#id_guru_edit').val(data.id_guru);
                            $('#nama_guru_edit').val(data.nama_guru);
                            $('#nik_guru_edit').val(data.nik_guru);
                            $('#nomor_handphone_edit').val(data.nomor_handphone);
                            $('#mapel_edit').val(data.mapel);
                            $('#pendidikan_terakhir_edit').val(data.pendidikan_terakhir);
                            $('#jabatan_edit').val(data.jabatan);
                            $('#tempat_edit').val(data.tempat);
                            $('#tanggal_lahir_edit').val(data.tanggal_lahir);
                            $('#agama_edit').val(data.agama);
                            $('#tahun_ajaran_edit').val(data.tahun_ajaran);
                            let html_jenis_kelamin = `<option value="Laki-Laki" ${data.jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}>Laki-Laki</option>`;
                                html_jenis_kelamin += `<option value="Perempuan" ${data.jenis_kelamin == 'Perempuan' ? 'selected' : ''}>Perempuan</option>`;
                            let html_status = `<option value="Menikah" ${data.status == 'Menikah' ? 'selected' : ''}>Menikah</option>`;
                                html_status += `<option value="Belum Menikah" ${data.status == 'Belum Menikah' ? 'selected' : ''}>Belum Menikah</option>`;

                            let html = `<option value="">Pilih Jenjang</option>`;
                            if(jenjang.length > 0){
                                 jenjang.forEach(value => {
                                    html += `<option value="${value.id}" ${value.id == data.jenjang_id ? 'selected' : ''}>${value.name}</option>`;
                                });
                            }
                            $('#jenis_kelamin_edit').html(html_jenis_kelamin);
                            $('#jenjang_id_edit').html(html);
                            $('#status_edit').html(html_status);
                            $('#kelas_selected').val(data.kelas_id);
                            $(".jenjang_id").trigger("change");
                            $('#modal-edit').modal('show');
                        }
                    })
                    .fail(function () {
                        console.log("error");
                    });
                });
                $('#datatablesSimple tbody').on('click', '.detail', function () {
                    let id = $(this).data('id');
                    let url_hit = $(this).data('url');
                    $.ajax({
                        url: url_hit,
                        type: 'GET',
                        data : {
                            id : id
                        }
                    }).done(function (response) {
                       response = JSON.parse(response);
                       if(response.status){
                            let data = response.data.guru;
                            let tanggalLahir = new Date(data.tanggal_lahir);
                            let day = tanggalLahir.getDate();
                            let month = tanggalLahir.getMonth() + 1;
                            let year = tanggalLahir.getFullYear();
                            day = (day < 10) ? '0' + day : day;
                            month = (month < 10) ? '0' + month : month;
                            let formattedTanggal = `${day}/${month}/${year}`;
                            
                            $('#id_guru_edit').val(data.id_guru);
                            $('#t-nama').text(data.nama_guru);
                            $('#t-nik').text(data.nik_guru);
                            $('#t-nama-guru').text(data.nama_guru);
                            $('#t-ttl').text(`${data.tempat}, ${formattedTanggal}`);
                            $('#t-handphone').text(data.nomor_handphone);
                            $('#t-mapel').text(data.mapel);
                            $('#t-pendidikan').text(data.pendidikan_terakhir);
                            $('#t-jabatan').text(data.jabatan);
                            $('#t-agama').text(data.agama);
                            $('#t-jenjang').text(data.nama_jenjang);
                            $('#t-kelas').text(data.nama_kelas);
                            $('#t-tahun-ajaran').text(data.tahun_ajaran);
                            $('#photo-profil').attr('src', `${'uploads/'+data.image}`)
                            $('#modal-detail').modal('show');
                        }
                    })
                    .fail(function () {
                        console.log("error");
                    });
                });

                $('#datatablesSimple tbody').on('click', '.delete', function () {
                    let id = $(this).data('id');
                    let url = $(this).data('url');
                    Swal.fire({
                        title: "Are you sure delete it?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                    }).then((result) => {
                        if (result.isConfirmed){
                            $.ajax({
                                url: url,
                                type: "POST",
                                data: {
                                    "id": id,

                                },
                                success: function (response) {
                                    response = JSON.parse(response);
                                    if(response.status){
                                        Swal.fire("Done!", "It was succesfully deleted!", "success").then(function(){
                                            location.reload();
                                        });
                                    }else{
                                        Swal.fire("Error deleting!", "Please try again", "error").then(function(){
                                            location.reload();
                                        });
                                    }
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    Swal.fire("Error deleting!", "Please try again", "error").then(function(){
                                        location.reload();
                                    });
                            }
                            });
                        }
                    });
                });

                $(".jenjang_id").on("change", function(e){
                    e.preventDefault();
                    const valueJenjang = $(this).val();
                    $.ajax({
                        url: 'get_kelas.php',
                        type: 'GET',
                        data : {
                            jenjang_id : valueJenjang
                        }
                    }).done(function (response) {
                       response = JSON.parse(response);
                       if(response.status){
                            let data = response.data;
                            let html = `<option value="">Pilih Kelas</option>`;
                            let kelas_id = $("#kelas_selected").val();
                            data.forEach(value => {
                                html += `<option value="${value.id}" ${kelas_id == value.id ? 'selected' : ''}>${value.name}</option>`;
                            });
                            $(".kelas_id").html(html);
                        }
                    })
                    .fail(function () {
                        console.log("error");
                    });
                });
            });
            
        </script>
    </body>
</html>
