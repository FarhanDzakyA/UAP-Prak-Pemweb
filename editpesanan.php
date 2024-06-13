<?php
    include "Exe-Files/koneksi.php";

    $query_select = mysqli_query($mysqli, "SELECT * FROM `pesanan` WHERE `id_pesanan` = '$_GET[update]'");
    $query_selectedMenu = mysqli_query($mysqli, "SELECT * FROM `detail_pesanan` WHERE `id_pesanan` = '$_GET[update]'");
    $query_kategori = mysqli_query($mysqli, "SELECT * FROM `kategori`");

    $result = mysqli_fetch_assoc($query_select);

    $selectedMenuID = [];
    while($selectedMenu = mysqli_fetch_assoc($query_selectedMenu)) {
        $selectedMenuID[] = $selectedMenu['id_menu'];
    }

    function rupiahFormat($number) {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }

    date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ragam Rasa - Edit Pesanan</title>
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

        .scrollable {
            max-height: 480px;
            overflow-y: auto;
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

                    <div class="d-flex align-items-center">
                        <a class="nav-link d-flex align-items-center" href="pesanan.php">
                            <i class="fas fa-fw fa-receipt mr-2" style="color: #6e707e"></i>
                            <h1 class="h4 mb-0 text-gray-700 font-weight-bold">Pesanan</h1>
                        </a>

                        <i class="fa-solid fa-fw fa-angle-right"></i>

                        <a class="nav-link d-flex align-items-center" href="editpesanan.php?update=<?= $_GET['update'] ?>">
                            <i class="fas fa-fw fa-pen mr-2" style="color: #6e707e"></i>
                            <h1 class="h4 mb-0 text-gray-700 font-weight-bold">Edit Pesanan</h1>
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
                          Edit Pesanan
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-9 scrollable">
                                    <?php while($kategori = mysqli_fetch_assoc($query_kategori)) : 
                                            $query_menu = mysqli_query($mysqli, "SELECT * FROM `menu` WHERE `id_kategori` = '$kategori[id_kategori]'");
                                    ?>
                                            <h5 class="h6 font-weight-bold"><?= $kategori['nama_kategori'] ?></h5>
                                            <div class="row mb-2">
                                                <?php while($menu = mysqli_fetch_assoc($query_menu)) : ?>
                                                <div class="col-4 mb-2">
                                                    <div class="form-check">
                                                        <?php $checked = in_array($menu['id_menu'], $selectedMenuID) ? 'checked' : ''; ?>
                                                        <input class="form-check-input" type="checkbox" name="menu[]" id="menu<?= $menu['id_menu'] ?>" value="<?= $menu['id_menu'] ?>" data-price="<?= $menu['harga'] ?>" <?= $checked ?> disabled>
                                                        <label class="form-check-label" for="menu<?= $menu['id_menu'] ?>">
                                                            <?= $menu['nama_menu'] ?> (<?= rupiahFormat($menu['harga']) ?>)
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php endwhile; ?>
                                            </div>

                                            <hr>
                                    <?php endwhile; ?>
                                </div>
                                <div class="col-3 border-left border-secondary">
                                    <h1 class="h4 d-flex justify-content-center font-weight-bold text-dark">Pesanan</h1>
                                    
                                    <div class="form-group">
                                        <label for="waktu">Waktu Pesanan</label>
                                        <input type="datetime-local" class="form-control" id="waktu" name="waktu" value="<?= $result['waktu_pesanan'] ?>" readonly>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 140px">
                                        <label for="keterangan">Tipe Pesanan</label>
                                        <select class="form-control" name="keterangan" id="keterangan" required>
                                            <option value="" selected disabled>-- Pilih Tipe --</option>
                                            <option value="Dine In" <?= $result['keterangan'] == 'Dine In' ? 'selected' : '' ?>>Dine In</option>
                                            <option value="Take Away" <?= $result['keterangan'] == 'Take Away' ? 'selected' : '' ?>>Take Away</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="h4 font-weight-bold text-dark" for="totalHarga">Total</label>
                                        <input type="text" class="form-control form-control-lg" id="totalHarga" name="totalHarga" value="<?= rupiahFormat($result['total_harga']) ?>" readonly>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-danger" href="pesanan.php">Batal</a>
                                        <span class="mr-3"></span>
                                        <button class="btn btn-custome" type="submit" name="btn-simpan">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <?php
                            if(isset($_POST['btn-simpan'])) {
                                $waktu = mysqli_real_escape_string($mysqli, $_POST['waktu']);
                                $keterangan = mysqli_real_escape_string($mysqli, $_POST['keterangan']);

                                $totalHarga = mysqli_real_escape_string($mysqli, $_POST['totalHarga']);
                                $totalHarga = str_replace('Rp', '', $totalHarga);
                                $totalHarga = str_replace('.', '', $totalHarga);
                                $totalHarga = (int)$totalHarga;

                                $query_pesanan = mysqli_query($mysqli, "UPDATE `pesanan` SET 
                                `waktu_pesanan`='$waktu',
                                `keterangan`='$keterangan',
                                `total_harga`='$totalHarga' WHERE `id_pesanan`='$_GET[update]'");

                                if($query_pesanan) {
                                    ?>

                                    <script>
                                        Swal.fire({
                                            title: "Berhasil!",
                                            text: "Data pesanan berhasil diubah!",
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

    <script>
        function formatRupiah(value) {
            value = value.toString().replace(/[^\d]/g, '');

            if (value === '' || isNaN(parseInt(value))) {
                value = 0;
            } else {
                value = parseInt(value);
            }

            return 'Rp ' + value.toLocaleString('id-ID');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.form-check-input');
            const totalPriceElement = document.getElementById('totalHarga');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateTotalPrice);
            });

            function updateTotalPrice() {
                let total = 0;
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        total += parseFloat(checkbox.getAttribute('data-price'));
                    }
                });
                totalPriceElement.value = formatRupiah(total);
            }
        });
    </script>
</body>
</html>