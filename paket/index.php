<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Apps Loundry - Paket</title>
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
                     <li><a class="dropdown-item" href="../pelanggan/index.php">Pelanggan</a></li>
                     <li><a class="dropdown-item" href="index.php">Paket Loundry</a></li>
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
            <div class="alert alert-success fw-bold">
               DATA PAKET
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-body">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-success float-end mb-3" data-bs-toggle="modal" data-bs-target="#tambah">
                           Tambah
                        </button>

                        <table class="table table-striped table-hover">
                           <thead class="table-success">
                              <tr>
                                 <th>No</th>
                                 <th>Nama Paket</th>
                                 <th>Harga/kg</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              require_once "../config.php";
                              $no = 1;
                              $query = $conn->query("SELECT * FROM paket ORDER BY id_paket DESC");
                              foreach ($query as $data) :
                              ?>
                                 <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama_paket'] ?></td>
                                    <td>Rp. <?= number_format($data['harga'], 0, ',', '.') ?></td>
                                    <td>
                                       <button data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_paket'] ?>" class="btn btn-sm btn-warning">Edit</button>
                                       <a href="delete.php?id=<?= $data['id_paket'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah data akan dihapus?')">Hapus</a>
                                    </td>
                                 </tr>

                                 <!-- Modal -->
                                 <div class="modal fade" id="edit<?= $data['id_paket'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Paket</h1>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <form action="update.php" method="post">
                                             <input type="hidden" name="id" value="<?= $data['id_paket'] ?>">
                                             <div class="modal-body">
                                                <div class="mb-2">
                                                   <label for="nama_paket" class="form-label">Nama Paket</label>
                                                   <input type="text" id="nama_paket" name="nama_paket" class="form-control" value="<?= $data['nama_paket'] ?>">
                                                </div>
                                                <div class="mb-2">
                                                   <label for="harga" class="form-label">Harga</label>
                                                   <input type="number" id="harga" name="harga" class="form-control" value="<?= $data['harga'] ?>">
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="submit" class="btn btn-sm btn-primary">Simpan</button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
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

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Paket</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="insert.php" method="post">
            <div class="modal-body">
               <div class="mb-2">
                  <label for="nama_paket" class="form-label">Nama Paket</label>
                  <input type="text" id="nama_paket" name="nama_paket" class="form-control" placeholder="Masukkan Nama Paket">
               </div>
               <div class="mb-2">
                  <label for="harga" class="form-label">Harga</label>
                  <input type="number" id="harga" name="harga" class="form-control" placeholder="Masukkan Harga Paket">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" name="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>