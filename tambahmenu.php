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
</head>
<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
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
                          <label for="nama_menu">Nama Menu</label>
                          <input type="text" class="form-control" id="nama_menu" name="nama_menu" required>
                        </div>
                        <div class="form-group">
                          <label for="id_kategori">Kategori</label>
                          <select class="form-control" id="id_kategori" name="id_kategori" required>
                            <?php while($result = mysqli_fetch_assoc($query_kategori)) { ?>
                              <option value="<?= $result['id_kategori'] ?>"><?= $result['nama_kategori'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="harga">Harga</label>
                          <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                        <button type="submit" name="btn-tambah" class="btn btn-primary">Tambah Menu</button>
                      </form>
                    </div>

                      <?php
                        if(isset($_POST['btn-tambah'])) {
                            $nama_menu = $_POST['nama_menu'];
                            $id_kategori = $_POST['id_kategori'];
                            $harga = $_POST['harga'];

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
</body>
</html>
