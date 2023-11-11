<?php
require_once "../config.php";
if (isset($_POST['submit'])) {
   $nama_paket = $_POST['nama_paket'];
   $harga = $_POST['harga'];

   $query = $conn->query("INSERT INTO paket (nama_paket, harga) VALUES ('$nama_paket', '$harga')");

   if ($query) {
      echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php'; </script>";
   } else {
      echo "<script>alert('Data gagal ditambahkan'); window.location='index.php'; </script>";
   }
} else {
   echo "Silahkan klik form tambah, untuk menambahkan data! <a href='index.php'>Kembali</a>";
}
