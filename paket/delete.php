<?php
require_once "../config.php";
if (isset($_GET['id'])) {
   $id = $_GET['id'];

   $query = $conn->query("DELETE FROM paket WHERE id_paket = '$id'");

   if ($query) {
      echo "<script>alert('Data berhasil dihapus!'); window.location='index.php'; </script>";
   } else {
      echo "<script>alert('Data gagal dihapus!'); window.location='index.php'; </script>";
   }
} else {
   echo "Silahkan pilih data terlebih dahulu! <a href='index.php'>Data Pelanggan</a>";
}
