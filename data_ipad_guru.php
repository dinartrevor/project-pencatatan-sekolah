<?php
require_once 'function.php';
session_start();
if(!$_SESSION['log']){
    header('location: login.php');
}

$role = $_SESSION['role'];
$nameRole= $_SESSION['name'];
$type = 'Guru';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['id_apple'])) {
    try {
        $nama = $_POST['nama'];
        $apple_id = $_POST['apple_id'];
        $password = $_POST['password'];
        $no_handphone = $_POST['no_handphone'];
        $tipe_ipad = $_POST['tipe_ipad'];
        $konektivitas = $_POST['konektivitas'];
        $storage = $_POST['storage'];
        $serial_number = $_POST['serial_number'];
        $kode_restrict = $_POST['kode_restrict'];
        $image = '';
        if (!empty($_FILES['image']['name'])) {
			$image = uploadImage($_FILES['image']);
        }
       
        global $conn;

        $insertSql = "INSERT INTO dataipad (nama, apple_id, password, no_handphone, tipe_ipad, konektivitas, storage, serial_number, kode_restrict, type, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("sssssssssss", $nama, $apple_id, $password, $no_handphone, $tipe_ipad, $konektivitas, $storage, $serial_number, $kode_restrict, $type, $image);
        $insertStmt->execute();
        $insertStmt->close();

        $_SESSION['message_success'] = 'Data Ipad Guru Berhasil ditambahkan';
        header("Location: data_ipad_guru.php");
        exit();

    } catch (Exception $e) {
        $_SESSION['message_error'] = 'Error: ' . $e->getMessage();
        header("Location: data_ipad_guru.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['id_apple']) {
    try {
        $id = $_POST['id_apple'];
        $nama = $_POST['nama'];
        $apple_id = $_POST['apple_id'];
        $password = $_POST['password'];
        $no_handphone = $_POST['no_handphone'];
        $tipe_ipad = $_POST['tipe_ipad'];
        $konektivitas = $_POST['konektivitas'];
        $storage = $_POST['storage'];
        $serial_number = $_POST['serial_number'];
        $kode_restrict = $_POST['kode_restrict'];
        
        $getOldImageSql = "SELECT image FROM dataipad WHERE id_apple = ?";
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


        $updateSql = "UPDATE dataipad SET nama=?, apple_id=?, password=?, no_handphone=?, tipe_ipad=?, konektivitas=?, storage=?, serial_number=?, kode_restrict=?, type=?, image=? WHERE id_apple=?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("sssssssssssi", $nama, $apple_id, $password, $no_handphone, $tipe_ipad, $konektivitas, $storage, $serial_number, $kode_restrict, $type, $image, $id);
        $updateStmt->execute();
        $updateStmt->close();


        $_SESSION['message_success'] = 'Data Ipad Guru Berhasil diupdate';
        header("Location: data_ipad_guru.php");
        exit();

    } catch (Exception $e) {
        $_SESSION['message_error'] = 'Error: ' . $e->getMessage();
        header("Location: data_ipad_guru.php");
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


$sql = "SELECT * FROM dataipad WHERE type = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $type);
$stmt->execute();
$result = $stmt->get_result();
$dataIpadGuru = [];
while ($row = $result->fetch_assoc()) {
    $dataIpadGuru[] = $row;
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
        <title>Data Ipad Guru</title>
        <link rel="shortcut icon" href="assets/img/logoalazca.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <style>
            .show-hide-password {
                cursor: pointer;
            }
            .biodata-card {
                padding: 20px;
            }
            .biodata-info p {
                margin-bottom: 10px;
                font-size: 1.1em;
            }
            .biodata-info strong {
                color: #343a40;
            }
            
            @media (max-width: 767.98px) {
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
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Ipad Guru</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="data_ipad_guru.php">Ipad Guru</a></li>
                            <li class="breadcrumb-item active">List Ipad Guru</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                 <div class="col-lg-12 d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create">
                                           <i class="fas fa-plus"></i> Tambah Data Ipad Guru
                                        </button>
                                        <a href="<?= 'export_ipad.php?type='."Guru".'' ?>" id="exportExcelBtn" class="btn btn-success">
                                           <i class="fa fa-file-excel"></i> Export to Excel
                                        </a>
                                 </div>
                               
                            </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Apple id</th>
                                            <th>Password</th>
                                            <th>No.Handphone</th>
                                            <th>Tipe Ipad</th>
                                            <th>Konektivitas</th>
                                            <th>Storage</th>
                                            <th>Serial Number</th>
                                            <th>Kode Restrict</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($dataIpadGuru as $key => $data) {
                                        ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['apple_id']; ?></td>
                                            <td>
                                                <span>*******</span>
                                                <a href="javascript:void(0)" class="show-password text-muted" title="Lihat Password" data-password="<?= $data['password']; ?>">
                                                    <i class="fas fa-eye-slash"></i>
                                                </a>
                                            </td>
                                            <td><?= $data['no_handphone']; ?></td>
                                            <td><?= $data['tipe_ipad']; ?></td>
                                            <td><?= $data['konektivitas']; ?></td>
                                            <td><?= $data['storage']; ?></td>
                                            <td><?= $data['serial_number']; ?></td>
                                             <td>
                                                <span>*******</span>
                                                <a href="javascript:void(0)" class="show-restrict text-muted" title="Lihat Kode Restrict" data-restrict="<?= $data['kode_restrict']; ?>">
                                                    <i class="fas fa-eye-slash"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" data-url="<?= 'show_ipad_guru.php' ?>" data-id="<?= $data['id_apple'] ?>" class="edit btn btn-info btn-sm text-light "> <i class="fas fa-edit"></i></a>
                                                <a href="javascript:void(0)" data-url="<?= 'show_ipad_guru.php' ?>" data-id="<?= $data['id_apple'] ?>" class="detail btn btn-primary btn-sm"> <i class="fas fa-search"></i></a>
                                                <a href="javascript:void(0)" data-url="<?= 'delete_ipad_guru.php' ?>" data-id="<?= $data['id_apple'] ?>" class="delete btn btn-danger btn-sm"> <i class="fas fa-times"></i></a>
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
                <?php include 'create_ipad.php' ?>
                <?php include 'edit_ipad.php' ?>
                <?php include 'detail_ipad.php' ?>
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

                $('.show-hide-password').on('click', function() {
                    let passwordInput = $('.password');
                    let eyeIcon = $(this).find('i');

                    if (passwordInput.attr('type') === 'password') {
                        passwordInput.attr('type', 'text');
                        eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
                    } else {
                        passwordInput.attr('type', 'password');
                        eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
                    }
                });

                $('#datatablesSimple tbody').on('click', '.show-restrict', function (e) {
                    e.preventDefault();
                    let restrictSpan = $(this).siblings('span');
                    let restrict = $(this).data('restrict');

                    if (restrictSpan.text() === '*******') {
                        restrictSpan.text(restrict);
                        $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                        $(this).attr('title', 'Sembunyikan Kode Restrict');
                    } else {
                        restrictSpan.text('*******');
                        $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                        $(this).attr('title', 'Lihat Kode Restrict');
                    }
                })
                $('#datatablesSimple tbody').on('click', '.show-password', function (e) {
                    e.preventDefault();
                    let passwordSpan = $(this).siblings('span');
                    let password = $(this).data('password');

                    if (passwordSpan.text() === '*******') {
                        passwordSpan.text(password);
                        $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                        $(this).attr('title', 'Sembunyikan Password');
                    } else {
                        passwordSpan.text('*******');
                        $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                        $(this).attr('title', 'Lihat Password');
                    }
                })

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
                            let data = response.data;
                            $('#id_apple_edit').val(data.id_apple);
                            $('#nama_edit').val(data.nama);
                            $('#no_handphone_edit').val(data.no_handphone);
                            $('#apple_id_edit').val(data.apple_id);
                            $('#tipe_ipad_edit').val(data.tipe_ipad);
                            $('#password_edit').val(data.password);
                            $('#serial_number_edit').val(data.serial_number);
                            $('#konektivitas_edit').val(data.konektivitas);
                            $('#storage_edit').val(data.storage);
                            $('#kode_restrict_edit').val(data.kode_restrict);
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
                           let data = response.data;
                            $('#t-nama').text(data.nama);
                            $('#t-apple-id').text(data.apple_id);
                            $('#t-password').text(data.password);
                            $('#t-handphone').text(`${data.no_handphone}`);
                            $('#t-type-ipad').text(data.tipe_ipad);
                            $('#t-konektivitas').text(data.konektivitas);
                            $('#t-storage').text(data.storage);
                            $('#t-serial-number').text(data.serial_number);
                            $('#t-kode-restrict').text(data.kode_restrict);
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
            });
            
        </script>
    </body>
</html>
