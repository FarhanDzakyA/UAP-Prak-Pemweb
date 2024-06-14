<?php
include "Exe-Files/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ragam Rasa - Tambah Reservasi</title>
    <link rel="icon" href="Assets/img/favicon.ico" sizes="16x16 32x32 48x48 64x64 128x128">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="Assets/css/bootstrap4.min.css" rel="stylesheet">
    <link href="Assets/css/custome.css" rel="stylesheet">
    <link href="Assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .bg-custome {
            background-color: #597E52 !important;
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

            <li class="nav-item">
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
            
            <li class="nav-item active">
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

                    <div class="d-flex align-items-center">
                        <a class="nav-link d-flex align-items-center" href="reservasi.php">
                            <i class="fas fa-fw fa-book mr-2" style="color: #6e707e"></i>
                            <h1 class="h4 mb-0 text-gray-700 font-weight-bold">Reservasi</h1>
                        </a>

                        <i class="fa-solid fa-fw fa-angle-right"></i>

                        <a class="nav-link d-flex align-items-center" href="tambahreservasi.php">
                            <i class="fas fa-fw fa-plus mr-2" style="color: #6e707e"></i>
                            <h1 class="h4 mb-0 text-gray-700 font-weight-bold">Tambah Reservasi</h1>
                        </a>
                    </div>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="Assets/img/admin-profile.png">
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-dark">
                          Menambah Reservasi
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="waktu_reservasi">Waktu Reservasi <i class="fas fa-star-of-life" style="font-size: 7px; vertical-align: top; color: #ED2939"></i></label>
                                        <input type="datetime-local" class="form-control" id="waktu_reservasi" name="waktu_reservasi" required>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="nomor_meja">Nomor Meja <i class="fas fa-star-of-life" style="font-size: 7px; vertical-align: top; color: #ED2939"></i></label>
                                        <input type="number" class="form-control" id="nomor_meja" name="nomor_meja" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_pelanggan">Nama Pelanggan <i class="fas fa-star-of-life" style="font-size: 7px; vertical-align: top; color: #ED2939"></i></label>
                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="jumlah_orang">Jumlah Orang <i class="fas fa-star-of-life" style="font-size: 7px; vertical-align: top; color: #ED2939"></i></label>
                                <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status <i class="fas fa-star-of-life" style="font-size: 7px; vertical-align: top; color: #ED2939"></i></label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="" selected disabled>-- Pilih Status --</option>
                                    <option value="On Progress">On Progress</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>

                            <div class="d-sm-flex align-items-center justify-content-start">
                                <a href="reservasi.php" class="btn btn-danger">Batal</a>
                                <span class="mr-2"></span>
                                <button type="submit" name="btn-simpan" class="btn btn-custome">Simpan</button>
                            </div>
                        </form>

                        <?php 
                            if(isset($_POST['btn-simpan'])) {
                                $nama_pelanggan = mysqli_real_escape_string($mysqli, $_POST['nama_pelanggan']);
                                $nomor_meja = mysqli_real_escape_string($mysqli, $_POST['nomor_meja']);
                                $waktu_reservasi = mysqli_real_escape_string($mysqli, $_POST['waktu_reservasi']);
                                $jumlah_orang = mysqli_real_escape_string($mysqli, $_POST['jumlah_orang']);
                                $status = mysqli_real_escape_string($mysqli, $_POST['status']);

                                $query_insert = mysqli_query($mysqli, "INSERT INTO `reservasi`(`nama_pelanggan`, `nomor_meja`, `waktu_reservasi`, `jumlah_orang`, `status`) VALUES ('$nama_pelanggan', '$nomor_meja', '$waktu_reservasi', '$jumlah_orang', '$status')");

                                if($query_insert) {
                                    ?>

                                    <script>
                                        Swal.fire({
                                            title: "Berhasil!",
                                            text: "Data reservasi berhasil ditambahkan!",
                                            icon: "success"
                                        }).then(function() {
                                            window.location.href = 'reservasi.php';
                                        });
                                    </script>

                                    <?php
                                } else {
                                    echo "Error: " . mysqli_error($mysqli);
                                }
                            }
                        ?>
                    </div>
                  </div>
                </div>
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

    <script src="Assets/js/jquery.easing.min.js"></script>

    <script src="Assets/js/sb-admin-2.min.js"></script>

    <script src="Assets/js/jquery.dataTables.min.js"></script>
    <script src="Assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="Assets/js/datatables-demo.js"></script>
</body>
</html>
