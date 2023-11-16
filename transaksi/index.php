<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Apps Loundry - Riwayat Transaksi</title>
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
                  RIWAYAT TRANSAKSI
               </div>
            <?php } ?>
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-body">
                        <table class="table table-striped table-hover">
                           <thead class="table-success">
                              <tr>
                                 <th>No</th>
                                 <th>Tgl. Transaksi</th>
                                 <th>Lama Pengerjaan</th>
                                 <th>Nama Pelanggan</th>
                                 <th>Telepon</th>
                                 <th>Nama Paket</th>
                                 <th>Harga</th>
                                 <th>Berat</th>
                                 <th>Total</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              require_once "../config.php";
                              $no = 1;
                              $query = $conn->query("SELECT * FROM transaksi t INNER JOIN pelanggan p ON p.id_plg = t.pelanggan_id INNER JOIN paket k ON k.id_paket = t.paket_id ORDER BY id_plg DESC");
                              foreach ($query as $data) :
                                 $total = $data['harga'] * $data['berat'];

                              ?>
                                 <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['tgl_transaksi'] ?></td>
                                    <td><?= $data['lama_pengerjaan'] ?> hari</td>
                                    <td><?= $data['nama_plg'] ?></td>
                                    <td><?= $data['telepon'] ?></td>
                                    <td><?= $data['nama_paket'] ?></td>
                                    <td><?= $data['harga'] ?></td>
                                    <td><?= $data['berat'] ?></td>
                                    <td><?= $total ?></td>
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