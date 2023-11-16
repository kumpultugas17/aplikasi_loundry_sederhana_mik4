<?php
require_once "../config.php";
if (isset($_POST['submit'])) {
   $id = $_POST['id'];
   $nama_paket = $_POST['nama_paket'];
   $harga = $_POST['harga'];

   $query = $conn->query("UPDATE paket SET nama_paket = '$nama_paket', harga = '$harga' WHERE id_paket = '$id'");

   if ($query) {
      echo "<script>alert('Data berhasil diupdate!'); window.location='index.php'; </script>";
   } else {
      echo "<script>alert('Data gagal diupdate!'); window.location='index.php'; </script>";
   }
} else {
   echo "Silahkan klik form tambah, untuk menambahkan data! <a href='index.php'>Kembali</a>";
}
