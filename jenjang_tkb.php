<?php
require_once 'function.php';
session_start();
if(!$_SESSION['log']){
    header('location: login.php');
}

$role = $_SESSION['role'];


$jenjang = 'TK-B';
$sql = "SELECT kelas.id, kelas.name, jenjang.name as jenjang_name FROM kelas INNER JOIN jenjang ON kelas.jenjang_id = jenjang.id WHERE jenjang.name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $jenjang);
$stmt->execute();
$result = $stmt->get_result();
$dataKelas = [];
while ($row = $result->fetch_assoc()) {
    $dataKelas[] = $row;
}
$stmt->close();

if(empty($dataKelas)){
    $_SESSION['message_error'] = 'Error: Data Kelas Not Found';
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['id_siswa'])) {
    try {
        $nama_siswa = $_POST['nama_siswa'];
        $nis = $_POST['nis'];
        $agama = $_POST['agama'];
        $tempat = $_POST['tempat'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $usia = $_POST['usia'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $asal_sekolah = $_POST['asal_sekolah'];
        $angkatan = $_POST['angkatan'];
        $kelas_id = $_POST['kelas_id'];
        $nama_ayah = $_POST['nama_ayah'];
        $nama_ibu = $_POST['nama_ibu'];
        $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
        $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
        $no_handphone_ayah = $_POST['no_handphone_ayah'];
        $no_handphone_ibu = $_POST['no_handphone_ibu'];
        $anak_ke = $_POST['anak_ke'];
        $jumlah_saudara = $_POST['jumlah_saudara'];
        $alamat = $_POST['alamat'];
        $image = '';
        if (!empty($_FILES['image']['name'])) {
			$image = uploadImage($_FILES['image']);
        }

        global $conn;

        $sql = "SELECT siswa.id_siswa FROM siswa WHERE siswa.nis = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $nik_guru);
		$stmt->execute();

		$result = $stmt->get_result();
		$siswaExsist = $result->fetch_assoc();
		$stmt->close();
		
        if(!empty($siswaExsist['id_siswa'])){
            $_SESSION['message_error'] = 'NIS Sudah Ada';
            header("Location: jenjang_tka.php");
            exit();
        }

        $insertSql = "INSERT INTO siswa (nama_siswa, nis, agama, tempat, tanggal_lahir, umur, jenis_kelamin, asal_sekolah, angkatan, kelas_id, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, no_handphone_ayah, no_handphone_ibu, anak_ke, jumlah_saudara, alamat_lengkap, photo, jenjang) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param(
            "sssssssssssssssssssss",
            $nama_siswa,
            $nis,
            $agama,
            $tempat,
            $tanggal_lahir,
            $usia,
            $jenis_kelamin,
            $asal_sekolah,
            $angkatan,
            $kelas_id,
            $nama_ayah,
            $nama_ibu,
            $pekerjaan_ayah,
            $pekerjaan_ibu,
            $no_handphone_ayah,
            $no_handphone_ibu,
            $anak_ke,
            $jumlah_saudara,
            $alamat,
            $image,
            $jenjang
        );
        $insertStmt->execute();
        $insertStmt->close();

        $_SESSION['message_success'] = 'Data Siswa Berhasil ditambahkan';
        header("Location: jenjang_tkb.php");
        exit();

    } catch (Exception $e) {
        var_dump($e->getMessage());die;
        $_SESSION['message_error'] = 'Error: ' . $e->getMessage();
        header("Location: jenjang_tkb.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['id_siswa']) {
    try {
        $id = $_POST['id_siswa'];
        $nama_siswa = $_POST['nama_siswa'];
        $nis = $_POST['nis'];
        $agama = $_POST['agama'];
        $tempat = $_POST['tempat'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $usia = $_POST['usia'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $asal_sekolah = $_POST['asal_sekolah'];
        $angkatan = $_POST['angkatan'];
        $kelas_id = $_POST['kelas_id'];
        $nama_ayah = $_POST['nama_ayah'];
        $nama_ibu = $_POST['nama_ibu'];
        $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
        $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
        $no_handphone_ayah = $_POST['no_handphone_ayah'];
        $no_handphone_ibu = $_POST['no_handphone_ibu'];
        $anak_ke = $_POST['anak_ke'];
        $jumlah_saudara = $_POST['jumlah_saudara'];
        $alamat = $_POST['alamat'];

        $getOldImageSql = "SELECT photo FROM siswa WHERE id_siswa = ?";
        $getOldImageStmt = $conn->prepare($getOldImageSql);
        $getOldImageStmt->bind_param("i", $id);
        $getOldImageStmt->execute();
        $getOldImageResult = $getOldImageStmt->get_result();
        $oldImageData = $getOldImageResult->fetch_assoc();
        $oldImage = $oldImageData['photo'];
        $getOldImageStmt->close();

        
        if (!empty($_FILES['image']['name'])) {
			$image = uploadImage($_FILES['image']);
        }else{
             $image = $oldImage;
        }

        $updateSql = "UPDATE siswa SET nama_siswa=?, nis=?, agama=?, tempat=?, tanggal_lahir=?, umur=?, jenis_kelamin=?, asal_sekolah=?, angkatan=?, kelas_id=?, nama_ayah=?, nama_ibu=?, pekerjaan_ayah=?, pekerjaan_ibu=?, no_handphone_ayah=?, no_handphone_ibu=?, anak_ke=?, jumlah_saudara=?, alamat_lengkap=?, photo=? WHERE id_siswa=?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param(
            "ssssssssssssssssssssi",
            $nama_siswa,
            $nis,
            $agama,
            $tempat,
            $tanggal_lahir,
            $usia,
            $jenis_kelamin,
            $asal_sekolah,
            $angkatan,
            $kelas_id,
            $nama_ayah,
            $nama_ibu,
            $pekerjaan_ayah,
            $pekerjaan_ibu,
            $no_handphone_ayah,
            $no_handphone_ibu,
            $anak_ke,
            $jumlah_saudara,
            $alamat,
            $image,
            $id
        );
        $updateStmt->execute();
        $updateStmt->close();


        $_SESSION['message_success'] = 'Data Siswa Berhasil diubah';
        header("Location: jenjang_tkb.php");
        exit();

    } catch (Exception $e) {

        $_SESSION['message_error'] = 'Error: ' . $e->getMessage();
        header("Location: jenjang_tkb.php");
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

$sql = "SELECT siswa.id_siswa, siswa.nama_siswa, siswa.nis, siswa.agama, siswa.tempat, siswa.tanggal_lahir, siswa.umur, siswa.jenis_kelamin, siswa.asal_sekolah,
        siswa.angkatan, siswa.kelas_id, siswa.nama_ayah, siswa.nama_ibu, siswa.pekerjaan_ayah, siswa.pekerjaan_ibu, siswa.no_handphone_ayah, siswa.no_handphone_ibu,
        siswa.anak_ke, siswa.jumlah_saudara, siswa.alamat_lengkap, siswa.photo, siswa.jenjang, kelas.name as nama_kelas, jenjang.name as jenjang_name
        FROM siswa
        INNER JOIN kelas ON siswa.kelas_id = kelas.id
        INNER JOIN jenjang ON kelas.jenjang_id = jenjang.id
        WHERE siswa.jenjang = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $jenjang);
$stmt->execute();
$result = $stmt->get_result();
$dataSiswa = [];
while ($row = $result->fetch_assoc()) {
    $dataSiswa[] = $row;
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
        <title>Data Siswa Jenjang TK-B</title>
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
                width: 400px;
                height: 400px;
                border-radius: 20%;
                object-fit: cover;
                border: 5px solid rgb(125, 184, 246); /* Border warna primary Bootstrap */
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

                                <?php } ?>

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
                        IT alazacabta
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Siswa Jenjang TK-B</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="data_guru.php"> Siswa Jenjang TK-B</a></li>
                            <li class="breadcrumb-item active">List Siswa Jenjang TK-B</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <!-- Button to Open the Modal -->
                                        <div class="col-lg-12 d-flex justify-content-between align-items-center">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create">
                                                <i class="fas fa-plus"></i> Tambah Data Siswa Jenjang TK-B
                                                </button>
                                                <a href="<?= 'export_siswa.php?type='.$jenjang.'' ?>" id="exportExcelBtn" class="btn btn-success">
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
                                            <th>NIS</th>
                                            <th>Jenjang</th>
                                            <th>Kelas</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Usia</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($dataSiswa as $key => $data) {
                                        ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $data['nama_siswa']; ?></td>
                                            <td><?= $data['nis']; ?></td>
                                            <td><?= $data['jenjang_name']; ?></td>
                                            <td><?= $data['nama_kelas']; ?></td>
                                            <td><?= $data['tanggal_lahir'] ? date('d-m-Y', strtotime($data['tanggal_lahir'])) : '-'; ?></td>
                                            <td><?= $data['umur']; ?></td>
                                            <td><?= $data['jenis_kelamin']; ?></td>
                                            <td>
                                                <a href="javascript:void(0)" data-url="<?= 'show_siswa.php' ?>" data-id="<?= $data['id_siswa'] ?>" class="edit btn btn-info btn-sm text-light "> <i class="fas fa-edit"></i></a>
                                                 <a href="javascript:void(0)" data-url="<?= 'show_siswa.php' ?>" data-id="<?= $data['id_siswa'] ?>" class="detail btn btn-primary btn-sm"> <i class="fas fa-search"></i></a>
                                                <a href="javascript:void(0)" data-url="<?= 'delete_siswa.php' ?>" data-id="<?= $data['id_siswa'] ?>" class="delete btn btn-danger btn-sm"> <i class="fas fa-times"></i></a>
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
                <?php include 'create_siswa.php' ?>
                <?php include 'edit_siswa.php' ?>
                <?php include 'detail_siswa.php' ?>
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

                $(".tanggal_lahir").on('change', function(e){
                    e.preventDefault();
                    const value = $(this).val();
                    if (value) {
                        const birthDate = new Date(value);
                        const today = new Date();
                        let age = today.getFullYear() - birthDate.getFullYear();
                        const m = today.getMonth() - birthDate.getMonth();
                        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                            age--;
                        }
                        if (age < 0) {
                            age = 0;
                        }
                        $(".usia").val(age);
                    }
                });

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
                            let data = response.data.siswa;
                            let dataKelas = response.data.dataKelas;
                            $('#id_siswa_edit').val(data.id_siswa);
                            $('#nama_siswa_edit').val(data.nama_siswa);
                            $('#nis_edit').val(data.nis);
                            $('#tempat_edit').val(data.tempat);
                            $('#tanggal_lahir_edit').val(data.tanggal_lahir);
                            $('#usia_edit').val(data.umur);
                            $('#agama_edit').val(data.agama);
                            $('#asal_sekolah_edit').val(data.asal_sekolah);
                            $('#angkatan_edit').val(data.angkatan);
                            $('#kelas_edit').val(data.kelas);
                            $('#nama_ayah_edit').val(data.nama_ayah);
                            $('#no_handphone_ayah_edit').val(data.no_handphone_ayah);
                            $('#nama_ibu_edit').val(data.nama_ibu);
                            $('#no_handphone_ibu_edit').val(data.no_handphone_ibu);
                            $('#pekerjaan_ayah_edit').val(data.pekerjaan_ayah);
                            $('#pekerjaan_ibu_edit').val(data.pekerjaan_ibu);
                            $('#anak_ke_edit').val(data.anak_ke);
                            $('#jumlah_saudara_edit').val(data.jumlah_saudara);
                            $('#alamat_edit').val(data.alamat_lengkap);
                            let html_jenis_kelamin = `<option value="Laki-Laki" ${data.jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}>Laki-Laki</option>`;
                                html_jenis_kelamin += `<option value="Perempuan" ${data.jenis_kelamin == 'Perempuan' ? 'selected' : ''}>Perempuan</option>`;

                            let html = `<option value="">Pilih Kelas</option>`;
                            if(dataKelas.length > 0){
                                 dataKelas.forEach(value => {
                                    html += `<option value="${value.id}" ${value.id == data.kelas_id ? 'selected' : ''}>${value.name}</option>`;
                                });
                            }

                            $('#jenis_kelamin_edit').html(html_jenis_kelamin);
                            $('#kelas_id_edit').html(html);
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
                            let data = response.data.siswa;
                            let tanggalLahir = new Date(data.tanggal_lahir);
                            let day = tanggalLahir.getDate();
                            let month = tanggalLahir.getMonth() + 1;
                            let year = tanggalLahir.getFullYear();
                            day = (day < 10) ? '0' + day : day;
                            month = (month < 10) ? '0' + month : month;
                            let formattedTanggal = `${day}/${month}/${year}`;
                            
                            $('#id_siswa_edit').val(data.id_siswa);
                            $('#t-nama').text(data.nama_siswa);
                            $('#t-nama-siswa').text(data.nama_siswa);
                            $('#t-nis').text(data.nis);
                            $('#t-jenis-kelamin').text(data.jenis_kelamin);
                            $('#t-ttl').text(`${data.tempat}, ${formattedTanggal}`);
                            $('#t-usia').text(data.umur);
                            $('#t-agama').text(data.agama);
                            $('#t-asal-sekolah').text(data.asal_sekolah);
                            $('#t-angkatan').text(data.angkatan);
                            $('#t-jenjang').text(data.jenjang_name);
                            $('#t-kelas').text(data.nama_kelas);
                            $('#t-nama-ayah').text(data.nama_ayah);
                            $('#t-handphone-ayah').text(data.no_handphone_ayah);
                            $('#t-pekerjaan-ayah').text(data.pekerjaan_ayah);
                            $('#t-nama-ibu').text(data.nama_ibu);
                            $('#t-handphone-ibu').text(data.no_handphone_ibu);
                            $('#t-pekerjaan-ibu').text(data.pekerjaan_ibu);
                            $('#t-anak-ke').text(data.anak_ke);
                            $('#t-jumlah-saudara').text(data.jumlah_saudara);
                            $('#t-alamat').text(data.alamat_lengkap);
                            $('#photo-profil').attr('src', `${'uploads/'+data.photo}`)
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
            });
            
        </script>
    </body>
</html>
