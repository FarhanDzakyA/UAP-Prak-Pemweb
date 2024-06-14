<?php
    include "Exe-Files/koneksi.php";
    setlocale(LC_ALL, 'IND');

    $bulan = date('F');

    $query_totalPemasukan = mysqli_query($mysqli, "SELECT SUM(total_harga) as total FROM `pesanan` WHERE MONTHNAME(waktu_pesanan) = '$bulan'");
    $totalPemasukan = mysqli_fetch_assoc($query_totalPemasukan);

    $query_jumlahPesanan = mysqli_query($mysqli, "SELECT COUNT(id_pesanan) as jumlah FROM `pesanan` WHERE MONTHNAME(waktu_pesanan) = '$bulan'");
    $jumlahPesanan = mysqli_fetch_assoc($query_jumlahPesanan);

    $query_jumlahMenu = mysqli_query($mysqli, "SELECT COUNT(id_menu) as jumlah FROM `menu`");
    $jumlahMenu = mysqli_fetch_assoc($query_jumlahMenu);

    function rupiahFormat($number) {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ragam Rasa - Home</title>
    <link rel="icon" href="Assets/img/favicon.ico" sizes="16x16 32x32 48x48 64x64 128x128">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="Assets/css/bootstrap4.min.css" rel="stylesheet">

    <style>
        .bg-custome {
            background-color: #597E52 !important;
        }

        .text-custome {
            color: #597E52 !important
        }

        .btn-custome{
            color:#fff !important;
            background-color: #597E52 !important;
            border-color: #597E52 !important;
        }
        
        .btn-custome:hover{
            color: #fff !important;
            background-color: #2c3e29 !important;
            border-color: #2c3e29 !important;
        }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-custome sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="Assets/img/brand-logo.png" alt="Logo Brand" width="50px">
                </div>
                <div class="sidebar-brand-text mx-2">Ragam Rasa</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fa-solid fa-fw fa-house-chimney"></i>
                    <span>Beranda</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Daftar Menu</div>

            <li class="nav-item">
                <a class="nav-link" href="menu.php">
                    <i class="fa-solid fa-fw fa-bowl-food"></i>
                    <span>Menu</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="kategori.php">
                    <i class="fa-solid fa-fw fa-list"></i>
                    <span>Kategori</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Transaksi</div>

            <li class="nav-item">
                <a class="nav-link" href="pesanan.php">
                    <i class="fa-solid fa-fw fa-receipt"></i>
                    <span>Pesanan</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="reservasi.php">
                    <i class="fa-solid fa-fw fa-book"></i>
                    <span>Reservasi</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </form>

                    <a class="nav-link d-flex align-items-center" href="index.php">
                        <i class="fas fa-fw fa-house-chimney mr-2" style="color: #6e707e"></i>
                        <h1 class="h4 mb-0 text-gray-700 font-weight-bold">Beranda</h1>
                    </a>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="Assets/img/admin-profile.png">
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Container -->
                <div class="container-fluid">
                    <div class="row">
                        <!-- First Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="small font-weight-bold text-primary text-uppercase mb-1">
                                                Total Pemasukan (<?= strftime('%B') ?>)
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= rupiahFormat($totalPemasukan['total']) ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-money-check-dollar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Second Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="small font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Pesanan (<?= strftime('%B') ?>)
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $jumlahPesanan['jumlah'] ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-receipt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Third Card -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="small font-weight-bold text-info text-uppercase mb-1">
                                                Jumlah Menu
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $jumlahMenu['jumlah'] ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-bowl-food fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Information Card -->

                    <!-- Illustrations -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" src="Assets/img/Cooking-bro.svg">
                                    </div>
                                </div>
                                <div class="col-12 col-md-9">
                                    <h3 class="pt-3 text-custome">
                                        Selamat Datang di <b>RagamRasa</b>!
                                    </h3>
                                    <p class="text-justify mb-3">Ragam Rasa adalah platform terintegrasi yang dirancang untuk memberikan 
                                        kemudahan dalam mengelola semua aspek operasional restoran Anda. Dengan fitur-fitur 
                                        canggih seperti manajemen menu yang fleksibel, pengelolaan pesanan yang efisien, dan 
                                        sistem reservasi yang terorganisir, Ragam Rasa membantu Anda mengoptimalkan pengalaman 
                                        pelanggan dan meningkatkan efisiensi operasional.</p>
                                    <div class="d-flex align-items-center">
                                        <a class="btn btn-custome rounded-pill mr-3" href="tambahmenu.php">
                                            <i class="fa-solid fa-plus text-white-100 mr-1"></i>
                                            Menu
                                        </a>

                                        <a class="btn btn-custome rounded-pill mr-3" href="tambahkategori.php">
                                            <i class="fa-solid fa-plus text-white-100 mr-1"></i>
                                            Kategori
                                        </a>

                                        <a class="btn btn-custome rounded-pill mr-3" href="tambahpesanan.php">
                                            <i class="fa-solid fa-plus text-white-100 mr-1"></i>
                                            Pesanan
                                        </a>

                                        <a class="btn btn-custome rounded-pill" href="tambahreservasi.php">
                                            <i class="fa-solid fa-plus text-white-100 mr-1"></i>
                                            Reservasi
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Illustrations -->
                </div>
                <!-- End of Container -->
            </div>

            <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright &copy; Ragam Rasa 2024</span>
                </div>
              </div>
            </footer>
        </div>
    </div>

    <script src="Assets/js/jquery.min.js"></script>
    <script src="Assets/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/js/sb-admin-2.min.js"></script>
</body>
</html>