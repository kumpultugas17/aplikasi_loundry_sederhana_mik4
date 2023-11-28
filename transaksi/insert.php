<?php
require_once('../config.php');
if (isset($_POST['submit'])) {
   $tanggal = $_POST['tanggal'];
   $pelanggan = $_POST['pelanggan'];
   $paket_loundry = $_POST['paket_loundry'];
   $berat = $_POST['berat'];
   $lama_pengerjaan = $_POST['lama_pengerjaan'];

   $query = $conn->query("INSERT INTO transaksi (tgl_transaksi, pelanggan_id, paket_id, berat, lama_pengerjaan) VALUES ('$tanggal','$pelanggan','$paket_loundry','$berat','$lama_pengerjaan')");

   if ($query) {
      echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php'; </script>";
   } else {
      echo "<script>alert('Data gagal ditambahkan'); window.location='index.php'; </script>";
   }
} else {
   echo "Silahkan isi form terlebih dahulu, klik <a href='transkasi.php'>disini.</a>";
}
