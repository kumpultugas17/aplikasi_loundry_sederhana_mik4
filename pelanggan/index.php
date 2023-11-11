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
   <nav class="navbar navbar-expand-lg bg-success bg-opacity-75">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">Apps</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="../index.php">Home</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Data Master
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="index.php">Pelanggan</a></li>
                     <li><a class="dropdown-item" href="../paket/index.php">Paket Loundry</a></li>
                  </ul>
               </li>
               <li class="nav-item">
                  <a href="../transaksi/transaksi.php" class="nav-link">Transaksi</a>
               </li>
               <li class="nav-item">
                  <a href="../transaksi/index.php" class="nav-link">Riwayat Transaksi</a>
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
            <?php if (isset($_GET['alert']) && isset($_GET['alert']) == 1) { ?>
               <div class="alert alert-success fw-bold">
                  DATA BERHASIL DIPROSES!
               </div>
            <?php } else { ?>
               <div class="alert alert-success fw-bold">
                  DATA PELANGGAN
               </div>
            <?php } ?>
            <div class="row">
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                        <form action="insert.php" method="post">
                           <div class="mb-2">
                              <label for="kode_pelanggan" class="form-label">Kode Pelanggan</label>
                              <input type="text" name="kode_pelanggan" id="kode_pelanggan" class="form-control" placeholder="Masukka kode pelanggan" required>
                           </div>
                           <div class="mb-2">
                              <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                              <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" placeholder="Masukka nama pelanggan" required>
                           </div>
                           <div class="mb-2">
                              <label for="jk" class="form-label">Jenis Kelamin</label>
                              <select name="jk" class="form-select" id="jk">
                                 <option disabled selected>Pilih Jenis Kelamin</option>
                                 <option value="L">Laki-laki</option>
                                 <option value="P">Perempuan</option>
                              </select>
                           </div>
                           <div class="mb-2">
                              <label for="alamat" class="form-label">Alamat</label>
                              <textarea name="alamat" id="alamat" class="form-control" rows="4" required placeholder="Masukkan alamat lengkap"></textarea>
                           </div>
                           <div class="mb-2">
                              <label for="telepon" class="form-label">Nomot Telepon</label>
                              <input type="number" name="telepon" id="telepon" class="form-control" placeholder="Masukka nomor telepon" required>
                           </div>
                           <button type="submit" class="btn btn-success btn-sm" name="submit">Submit</button>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="card">
                     <div class="card-body">
                        <table class="table table-striped table-hover">
                           <thead class="table-success">
                              <tr>
                                 <th>No</th>
                                 <th>Kode</th>
                                 <th>Nama</th>
                                 <th>JK</th>
                                 <th>Alamat</th>
                                 <th>Telepon</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              require_once "../config.php";
                              $no = 1;
                              $query = $conn->query("SELECT * FROM pelanggan ORDER BY id_plg DESC");
                              foreach ($query as $data) :
                              ?>
                                 <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['kode_plg'] ?></td>
                                    <td><?= $data['nama_plg'] ?></td>
                                    <td><?= $data['jk'] ?></td>
                                    <td><?= $data['alamat'] ?></td>
                                    <td><?= $data['telepon'] ?></td>
                                    <td>
                                       <a href="edit.php?id=<?= $data['id_plg'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                       <a href="delete.php?id=<?= $data['id_plg'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah data akan dihapus?')">Hapus</a>
                                    </td>
                                 </tr>
                              <?php endforeach ?>
                           </tbody>
                        </table>
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