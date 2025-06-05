<?php
require 'function.php';
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

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content=" Al-Azhar Cairo Baturaja" />
        <meta name="author" content=" Al-Azhar Cairo Baturaja" />
        <title>Dashboard</title>
          <link rel="shortcut icon" href="assets/img/logoalazca.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <style>
            .hidden{
                display: none;
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
                                        <i class="fas fa-boxes-stacked"></i>
                                    </div>
                                    Data Sapras IT
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                             <?php if($role == 'IT'){ ?> 
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Data Siswa</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <!-- Dropdown -->
                                        <div class="dropdown">
                                        <a class="small text-white dropdown-toggle" href="#" role="button" id="dropdownMenuSiswa" data-bs-toggle="dropdown" aria-expanded="false">
                                        View Details
                                        </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuSiswa">
                                                <li><a class="dropdown-item" href="jenjang_tka.php">Jenjang TK A</a></li>
                                                <li><a class="dropdown-item" href="jenjang_tkb.php">Jenjang TK B</a></li>
                                                <li><a class="dropdown-item" href="jenjang_sd.php">Jenjang SD</a></li>
                                                <li><a class="dropdown-item" href="jenjangs_sd_g2.php">Jenjang SD (Grade 2)</a></li>
                                                <li><a class="dropdown-item" href="jenjang_smp.php">Jenjang SMP</a></li>
                                            </ul>
                                        </div>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Data Guru</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="data_guru.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Data iPad</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       <!-- Dropdown -->
                                        <div class="dropdown">
                                        <a class="small text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        View Details
                                        </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="data_ipad_guru.php">Data iPad Guru</a></li>
                                                <li><a class="dropdown-item" href="data_ipad_siswa.php">Data iPad Siswa</a></li>
                                            </ul>
                                        </div>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Data E-learning</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <!-- Dropdown -->
                                        <div class="dropdown">
                                        <a class="small text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        View Details
                                        </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="data_elearning_guru.php">Data E-Learning Guru</a></li>
                                                <li><a class="dropdown-item" href="data_elearning_siswa.php">Data E-Learning Siswa</a></li>
                                            </ul>
                                        </div>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php }elseif($role == 'ADMIN'){ ?>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Data Siswa</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <!-- Dropdown -->
                                        <div class="dropdown">
                                        <a class="small text-white dropdown-toggle" href="#" role="button" id="dropdownMenuSiswa" data-bs-toggle="dropdown" aria-expanded="false">
                                        View Details
                                        </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuSiswa">
                                                <li><a class="dropdown-item" href="jenjang_tka.php">Jenjang TK A</a></li>
                                                <li><a class="dropdown-item" href="jenjang_tkb.php">Jenjang TK B</a></li>
                                                <li><a class="dropdown-item" href="jenjang_sd.php">Jenjang SD</a></li>
                                                <li><a class="dropdown-item" href="jenjangs_sd_g2.php">Jenjang SD (Grade 2)</a></li>
                                                <li><a class="dropdown-item" href="jenjang_smp.php">Jenjang SMP</a></li>
                                            </ul>
                                        </div>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Data Guru</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="data_guru.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="card">
                                 <div class="card mt-4">
                                    <div class="card-header">
                                       <h4 class="card-title">Data Siswa & Guru</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mt-3">
                                            <label for="jenjang_id" class="form-label">Jenjang</label>
                                            <select name="jenjang_id" id="jenjang_id" class="form-control jenjang_id">
                                                <option value="">Pilih Jenjang</option>
                                                <?php foreach ($dataJenjang as $key => $jenjang) { ?>
                                                    <option value="<?= $jenjang['id'] ?>"><?= $jenjang['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label for="kelas_id" class="form-label">Kelas</label>
                                            <select name="kelas_id" id="kelas_id" class="form-control kelas_id">
                                                <option value="">Pilih Kelas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3 hidden" id="teacherWrapper">
                                        <h4 class="card-title hidden" id="titleTeacher">Wali Kelas</h4>
                                        <div class="col-lg-12 mt-2" id="listTeacher">
                                                
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <h4 class="card-title" id="titleTahunAjaran">Tahun Ajaran</h4>
                                            <div id="listTahunAjaran"></div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 hidden" id="studentWrapper">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="card-title">List Siswa</h4>
                                            <div>
                                                <a href="" class="btn btn-outline-success" id="btn-export"><i class="fa fa-file-excel"></i> Export Data</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>NIS</th>
                                                            <th>Asal Sekolah</th>
                                                            <th>Angkatan</th>
                                                            <th>Tanggal Lahir</th>
                                                            <th>Usia</th>
                                                            <th>Jenis Kelamin</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody-siswa"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
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

                $(".kelas_id").on("change", function(e){
                    e.preventDefault();
                    const valueKelas = $(this).val();
                    const jenjang = $(".jenjang_id").val();
                    $.ajax({
                        url: 'get_guru_siswa.php',
                        type: 'GET',
                        data : {
                            kelas_id : valueKelas
                        }
                    }).done(function (response) {
                       response = JSON.parse(response);
                       if(response.status){
                            let guru = response.data.guru;
                            let siswa = response.data.siswa;
                            $("#btn-export").attr('href', `export_guru_siswa.php?jenjang=${jenjang}&kelas=${valueKelas}`)
                            $("#listTeacher").empty();
                            $("#listTahunAjaran").empty();
                            $("#tbody-siswa").empty();
                            if(guru.length == 0 && siswa.length == 0){
                                $("#teacherWrapper").addClass("hidden");
                                $("#studentWrapper").addClass("hidden");
                                toastr.error('Data Siswa & Guru Tidak Ada');
                                return false;
                            }
                          
                            let htmlGuru = "<ol>";
                            let htmlSiswa = "";
                            let tahunAjaran = "";
                            guru.forEach((value, index) => {
                                 htmlGuru += `<li>${value.nama_guru}</li>`;
                                 tahunAjaran = value.tahun_ajaran;
                            });
                            htmlGuru += `</ol>`;

                            siswa.forEach((value, index) => {
                                let tanggalLahir = new Date(value.tanggal_lahir);
                                let day = tanggalLahir.getDate();
                                let month = tanggalLahir.getMonth() + 1;
                                let year = tanggalLahir.getFullYear();
                                day = (day < 10) ? '0' + day : day;
                                month = (month < 10) ? '0' + month : month;
                                let formattedTanggal = `${day}/${month}/${year}`;
                                htmlSiswa += `<tr>`;
                                htmlSiswa += `<td>${index + 1}</td>`;
                                htmlSiswa += `<td>${value.nama_siswa}</td>`;
                                htmlSiswa += `<td>${value.nis}</td>`;
                                htmlSiswa += `<td>${value.asal_sekolah}</td>`;
                                htmlSiswa += `<td>${value.angkatan}</td>`;
                                htmlSiswa += `<td>${formattedTanggal}</td>`;
                                htmlSiswa += `<td>${value.umur}</td>`;
                                htmlSiswa += `<td>${value.jenis_kelamin}</td>`;
                                htmlSiswa += `</tr>`;
                            });

                            $("#listTeacher").html(htmlGuru);
                            $("#tbody-siswa").html(htmlSiswa);
                            $("#listTahunAjaran").html(`<ul><li>${tahunAjaran}</li></ul>`);
                            $("#titleTahunAjaran").removeClass("hidden");
                            $("#titleTeacher").removeClass("hidden");
                            $("#teacherWrapper").removeClass("hidden");
                            $("#studentWrapper").removeClass("hidden");
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
