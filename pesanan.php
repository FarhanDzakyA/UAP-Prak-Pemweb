<?php
    include "Exe-Files/koneksi.php";
    setlocale(LC_ALL, 'IND');

    $query_table = mysqli_query($mysqli, "SELECT * FROM `pesanan` ORDER BY `id_pesanan` DESC");

    $number = 1;

    function rupiahFormat($number) {
      return 'Rp ' . number_format($number, 0, ',', '.');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ragam Rasa - Pesanan</title>
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

        .page-item.active .page-link {
            color: white !important;
            background-color: #597E52 !important;
        }

        .page-link {
            color: #597E52 !important;
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

            <li class="nav-item active">
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

                    <a class="nav-link d-flex align-items-center" href="pesanan.php">
                        <i class="fas fa-fw fa-receipt mr-2" style="color: #6e707e"></i>
                        <h1 class="h4 mb-0 text-gray-700 font-weight-bold">Pesanan</h1>
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

                <div class="container-fluid">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <div class="d-sm-flex align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-dark">
                          Daftar Pesanan
                        </h5>
                        <a href="tambahpesanan.php" class="d-none d-sm-inline-block btn btn-sm btn-custome rounded-pill shadow-sm">
                          <i class="fa-solid fa-plus fa-sm text-white-100 mr-2"></i>
                          Tambah Pesanan
                        </a>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                          <thead class="thead-light">
                            <tr>
                              <th>No</th>
                              <th>Waktu Pesanan</th>
                              <th>Daftar Pesanan</th>
                              <th>Total Harga</th>
                              <th>Keterangan</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php while($result = mysqli_fetch_assoc($query_table)) { 
                                    $query_temp = mysqli_query($mysqli, "SELECT `nama_menu`
                                    FROM `detail_pesanan`, `menu` 
                                    WHERE `id_pesanan` = '$result[id_pesanan]' AND 
                                    `menu`.`id_menu` = `detail_pesanan`.`id_menu`");
                            ?>

                              <tr>
                                <td><?= $number ?></td>
                                <td><?= strftime('%H:%M %A, %e %B %Y', strtotime($result['waktu_pesanan'])) ?></td>
                                <td>
                                    <?php while($temp = mysqli_fetch_assoc($query_temp)) {
                                        echo $temp['nama_menu'] . "<br>";
                                    } ?>
                                </td>
                                <td><?= rupiahFormat($result['total_harga']) ?></td>
                                <td><?= $result['keterangan'] ?></td>
                                <td>
                                  <a href="editpesanan.php?update=<?= $result['id_pesanan'] ?>" class="btn btn-outline-dark btn-circle btn-sm">
                                    <i class="fa-solid fa-fw fa-pen"></i>
                                  </a>
                                  <span class="mr-2"></span>
                                  <a href="#" class="btn btn-outline-danger btn-circle btn-sm" data-toggle="modal" data-target="#hapusPesanan<?= $result['id_pesanan'] ?>">
                                    <i class="fa-solid fa-fw fa-trash"></i>
                                  </a>
                                </td>
                              </tr>

                              <div class="modal fade" id="hapusPesanan<?= $result['id_pesanan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Hapus Pesanan ?</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                      </button>
                                    </div>
                                    <form action="" method="POST">
                                      <input type="hidden" name="id_pesanan" value="<?= $result['id_pesanan'] ?>">

                                      <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus pesanan pada tanggal <b><?= $result['waktu_pesanan'] ?></b> dengan total harga <b><?= rupiahFormat($result['total_harga']) ?></b> ?
                                      </div>

                                      <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                          Batalkan
                                        </button>
                                        <button type="submit" name="btn-hapus" class="btn btn-danger">
                                          Ya, Hapus Pesanan
                                        </button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            <?php 
                                $number++;
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>
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

<?php
  if(isset($_POST['btn-hapus'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $query_delete = mysqli_query($mysqli, "DELETE FROM `pesanan` WHERE `id_pesanan` = '$id_pesanan'");

    if($query_delete) {
      ?>

      <script>
          Swal.fire({
            title: "Berhasil!",
            text: "Data pesanan berhasil dihapus!",
            icon: "success"
        }).then(function() {
          window.location.href = 'pesanan.php';
        });
      </script>

      <?php
    } else {
      echo "Error: " . mysqli_error($mysqli);
    }
  }
?>