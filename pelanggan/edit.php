<?php
require_once "../config.php";
if (isset($_GET['id'])) {
  $id_pelanggan = $_GET['id'];

  $query = $conn->query("SELECT * FROM pelanggan WHERE id_plg = '$id_pelanggan'");
  $result = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apps Loundry - Pelanggan</title>
  <!-- Import CSS Bootstrap -->
  <link rel="stylesheet" href="../assets_bootstrap/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-success navbar-dark bg-opacity-75">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Apps</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Data Master
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Pelanggan</a></li>
              <li><a class="dropdown-item" href="#">Paket Loundry</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link">Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Riwayat Transaksi</a>
          </li>
        </ul>
        <div class="d-flex">
          <a href="" class="btn btn-sm btn-outline-light">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row mt-4">
      <div class="col-12">
        <div class="alert alert-success fw-bold">
          EDIT PELANGGAN
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <form action="update.php" method="post">
                  <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan; ?>">
                  <div class="mb-2">
                    <label for="kode_pelanggan" class="form-label">Kode Pelanggan</label>
                    <input type="text" name="kode_pelanggan" id="kode_pelanggan" class="form-control" value="<?= $result['kode_plg'] ?>" required>
                  </div>
                  <div class="mb-2">
                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" value="<?= $result['nama_plg'] ?>" required>
                  </div>
                  <div class="mb-2">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-select" id="jk">
                      <option disabled selected>Pilih Jenis Kelamin</option>
                      <option value="L" <?= $result['jk'] == "L" ? 'selected' : '' ?>>Laki-laki</option>
                      <option value="P" <?= $result['jk'] == "P" ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="mb-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="4">
                      <?= $result['alamat']; ?>
                    </textarea>
                  </div>
                  <div class="mb-2">
                    <label for="telepon" class="form-label">Nomot Telepon</label>
                    <input type="number" name="telepon" id="telepon" class="form-control" value="<?= $result['telepon'] ?>" required>
                  </div>
                  <button type="submit" class="btn btn-success btn-sm" name="submit">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Import JS Bootstrap -->
  <script src="../assets_bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>