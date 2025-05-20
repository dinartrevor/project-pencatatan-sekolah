<?php
require 'function.php';
session_start();
if(!$_SESSION['log']){
    header('location: login.php');
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
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    </head>
    <body class="sb-nav-fixed">
         <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">
                <img src="assets/img/logoalazca.png" alt="Gambar" style="width:20%">
                Al-Azhar Cairo Baturaja
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
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
                                
                                <!-- <div class="sb-sidenav-menu-heading">Laporan</div>
                                <a class="nav-link" href="tables.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Rekap data siswa
                                </a> -->
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

        <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Tambah Barang</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body">
            <input type="text" name="nama" placeholder="Nama Siswa" class="form-control">
            <input type="text" name="nomorinduk" placeholder="Nomor Induk" class="form-control">
            <input type="text" name="kelas" placeholder="Kelas" class="form-control">
            <input type="text" name="alamat" placeholder="Alamat Siswa" class="form-control">
            <input type="text" name="jeniskelamin" placeholder="Jenis Kelamin" class="form-control">
            <input type="text" name="angkatan" placeholder="Angkatan" class="form-control">
            <button type="submit" class="btn btn-primary" name="addnewbarang">submit</button>
            </div>
        </form>
        
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        
        </div>
        </div>
    </div>

</html>
