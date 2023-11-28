<?php
require_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Apps Loundry - Transaksi</title>
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
                        <form action="insert.php" method="post">
                           <div class="row mb-3">
                              <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                              <div class="col-sm-10">
                                 <input type="date" class="form-control" name="tgl_transaksi" id="tanggal">
                              </div>
                           </div>

                           <div class="row mb-3">
                              <label for="pelanggan" class="col-sm-2 col-form-label">Pelanggan</label>
                              <div class="col-sm-10">
                                 <select name="pelanggan" id="pelanggan" class="form-select">
                                    <option selected disabled>Pilih Pelanggan</option>
                                    <?php
                                    $pelanggan = $conn->query("SELECT * FROM pelanggan");
                                    foreach ($pelanggan as $plg) :
                                    ?>
                                       <option value="<?= $plg['id_plg'] ?>"><?= $plg['nama_plg'] ?></option>
                                    <?php endforeach ?>
                                 </select>
                              </div>
                           </div>

                           <div class="row mb-3">
                              <label for="paket_loundry" class="col-sm-2 col-form-label">Paket Loundry</label>
                              <div class="col-sm-10">
                                 <select name="paket_loundry" id="paket_loundry" class="form-select">
                                    <option selected disabled>Pilih Paket Loundry</option>
                                    <?php
                                    $paket = $conn->query("SELECT * FROM paket");
                                    foreach ($paket as $pkt) :
                                    ?>
                                       <option value="<?= $pkt['id_paket'] ?>"><?= $pkt['nama_paket'] ?> | <?= $pkt['harga'] ?></option>
                                    <?php endforeach ?>
                                 </select>
                              </div>
                           </div>

                           <div class="row mb-3">
                              <label for="berat" class="col-sm-2 col-form-label">Berat</label>
                              <div class="col-sm-10">
                                 <div class="input-group">
                                    <input type="number" class="form-control" id="berat" name="berat" placeholder="Masukkan berat loundry">
                                    <div class="input-group-text">kg</div>
                                 </div>
                              </div>
                           </div>

                           <div class="row mb-3">
                              <label for="lama_pengerjaan" class="col-sm-2 col-form-label">Lama Pengerjaan</label>
                              <div class="col-sm-10">
                                 <div class="input-group">
                                    <input type="number" class="form-control" id="lama_pengerjaan" name="lama_pengerjaan" placeholder="Masukkan berat loundry">
                                    <div class="input-group-text">hari</div>
                                 </div>
                              </div>
                           </div>

                           <div class="row">
                              <label class="col-sm-2"></label>
                              <div class="col-sm-10">
                                 <button type="submit" name="submit" class=" btn-sm btn btn-primary">Simpan</button>
                              </div>
                           </div>
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