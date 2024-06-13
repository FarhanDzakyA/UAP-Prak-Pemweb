<?php
  include "Exe-Files/koneksi.php";

  $query_kategori = mysqli_query($mysqli, "SELECT * FROM `kategori`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ragam Rasa - Tambah Menu</title>
    <link rel="icon" href="Assets/img/favicon.ico" sizes="16x16 32x32 48x48 64x64 128x128">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="Assets/css/bootstrap4.min.css" rel="stylesheet">
    <link href="Assets/css/custome.css" rel="stylesheet">

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

            <li class="nav-item active">
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

                    <div class="d-flex align-items-center">
                        <a class="nav-link d-flex align-items-center" href="menu.php">
                            <i class="fas fa-fw fa-bowl-food mr-2" style="color: #6e707e"></i>
                            <h1 class="h4 mb-0 text-gray-700 font-weight-bold">Menu</h1>
                        </a>

                        <i class="fa-solid fa-fw fa-angle-right"></i>

                        <a class="nav-link d-flex align-items-center" href="tambahmenu.php">
                            <i class="fas fa-fw fa-plus mr-2" style="color: #6e707e"></i>
                            <h1 class="h4 mb-0 text-gray-700 font-weight-bold">Tambah Menu</h1>
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
                      <div class="d-sm-flex align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-dark">
                          Tambah Menu
                        </h5>
                      </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="nama_menu">Nama Menu <i class="fas fa-star-of-life" style="font-size: 7px; vertical-align: top; color: #ED2939"></i></label>
                                <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="Masukkan nama menu ..." required>
                            </div>

                            <div class="form-group">
                                <label for="id_kategori">Kategori <i class="fas fa-star-of-life" style="font-size: 7px; vertical-align: top; color: #ED2939"></i></label>
                                <select class="form-control" id="id_kategori" name="id_kategori" required>
                                  <option value="" selected disabled>-- Pilih Kategori --</option>
                                  <?php while($result = mysqli_fetch_assoc($query_kategori)) { ?>
                                    <option value="<?= $result['id_kategori'] ?>"><?= $result['nama_kategori'] ?></option>
                                  <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga <i class="fas fa-star-of-life" style="font-size: 7px; vertical-align: top; color: #ED2939"></i></label>
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan harga menu ..." onkeyup="formatRupiah(this)" required>
                            </div>

                            <div class="d-sm-flex align-items-center justify-content-start">
                                <a href="menu.php" class="btn btn-danger">Batal</a>
                                <span class="mr-2"></span>
                                <button type="submit" name="btn-tambah" class="btn btn-custome">Simpan</button>
                            </div>
                        </form>
                    </div>

                      <?php
                        if(isset($_POST['btn-tambah'])) {
                            $nama_menu = mysqli_real_escape_string($mysqli, $_POST['nama_menu']);
                            $id_kategori = mysqli_real_escape_string($mysqli, $_POST['id_kategori']);

                            $harga = mysqli_real_escape_string($mysqli, $_POST['harga']);
                            $harga = str_replace('Rp', '', $harga);
                            $harga = str_replace('.', '', $harga);
                            $harga = (int)$harga;

                            $query_insert = mysqli_query($mysqli, "INSERT INTO `menu` (`nama_menu`, `id_kategori`, `harga`) VALUES ('$nama_menu', '$id_kategori', '$harga')");

                            if($query_insert) {
                                ?>

                                <script>
                                    Swal.fire({
                                      title: "Berhasil!",
                                      text: "Data menu berhasil ditambahkan!",
                                      icon: "success"
                                  }).then(function() {
                                    window.location.href = 'menu.php';
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

            <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright &copy; Ragam Rasa 2024</span>
                </div>
              </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa-solid fa-angle-up"></i>
    </a>

    <script src="Assets/js/jquery.min.js"></script>
    <script src="Assets/js/bootstrap.bundle.min.js"></script>

    <script src="Assets/js/jquery.easing.min.js"></script>

    <script src="Assets/js/sb-admin-2.min.js"></script>

    <script>
        function formatRupiah(input) {
            let value = input.value.replace(/[^\d]/g, '');

            if (value === '' || isNaN(parseInt(value))) {
                value = 0;
            } else {
                value = parseInt(value);
            }

            value = 'Rp ' + formatNumber(parseInt(value));
            input.value = value;
        }

        function formatNumber(number) {
            return number.toLocaleString('id-ID');
        }
    </script>
</body>
</html>
