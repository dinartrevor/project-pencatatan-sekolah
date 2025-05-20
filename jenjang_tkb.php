<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content=" Al-Azhar Cairo Baturaja" />
        <meta name="author" content=" Al-Azhar Cairo Baturaja" />
        <title>Data Jenjang TK-B</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />

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
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                                <!-- sidebar.php -->
                                    <div class="nav">
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
                                        
                            <div class="sb-sidenav-menu-heading">Laporan</div>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Rekap data siswa
                            </a>
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
                        <h1 class="mt-4">Data Jenjang TK-B</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                
                        <div class="card mb-4">
                            <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Tambah Data
                            </button>
                            </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Asal Sekolah</th>
                                            <th>Angkatan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Asal Sekolah</th>
                                            <th>Angkatan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Abdul Baasith Hussain</td>
                                            <td></td>
                                            <td>Laki-Laki</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Adalia Adiba</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                          
                                        </tr>
                                        <tr>
                                            <td>Arjuna Sakti Herlambang</td>
                                            <td></td>
                                            <td>Laki-Laki</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                          
                                        </tr>
                                        <tr>
                                            <td>Grizelle Fredela S</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Hana Hafidzah Widodari</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Kalila Zahra As'ari</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                        </tr>
                                            <td>M Gavin Zanaka Altezza</td>
                                            <td></td>
                                            <td>Laki-Laki</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                          
                                        </tr>
                                        <tr>
                                            <td>M Hafiz Naufal Pratama</td>
                                            <td></td>
                                            <td>Laki-Laki</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                          
                                        </tr>
                                        <tr>
                                            <td>M Raffasya Aditya Pratama</td>
                                            <td></td>
                                            <td>Laki-Laki</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Raid Ghaisan Farzana Billah</td>
                                            <td></td>
                                            <td>Laki-Laki</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Rumaisya</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                        </tr>
                                        <tr>
                                            <td>Shanum Kannoya Khumaira</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Syalsabila Carissa A</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                          
                                        </tr>
                                        <tr>
                                            <td>Ulya Qalesya Azzahra</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                          
                                        </tr>
                                        <tr>
                                            <td>Zhifa Aprilia Anugrah</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>    
                                        </tr>
                                        <tr>
                                            <td>Ayura Mafaza Putri</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Azka Abqory</td>
                                            <td></td>
                                            <td>Laki-Laki</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                        </tr>
                                        <tr>
                                            <td>Gania Inara Rachmi</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Ghania Arka Pricilla</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                          
                                        </tr>
                                        <tr>
                                            <td>M. Azka Ghazi Aagda</td>
                                            <td></td>
                                            <td>Laki-Laki</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>M. Mahawira Atharrazka</td>
                                            <td></td>
                                            <td>Laki-Laki</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Muhammad Fathian Naushad</td>
                                            <td></td>
                                            <td>Laki-Laki</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                        </tr>
                                        <tr>
                                            <td>Muhammad Rasyid Al Agha</td>
                                            <td></td>
                                            <td>Laki-Laki</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Nasyauqi Ghania Abadi</td>
                                            <td></td>
                                            <td>Laki-Laki</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                          
                                        </tr>
                                        <tr>
                                            <td>Neima Qudsiyah</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                          
                                        </tr>
                                        <tr>
                                            <td>Chayra Azzahra Almahyra</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Kinarian Khaira Karuna</td>
                                            <td></td>
                                            <td>Perempuan</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Muhammad Al Razka Danish</td>
                                            <td></td>
                                            <td>Laki-Laki</td>
                                            <td></td>
                                            <td>2025/2026</td>
                                        </tr>
                                    </tbody>
                                </table>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
