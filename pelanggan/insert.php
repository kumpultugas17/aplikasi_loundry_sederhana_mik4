<?php
require_once "../config.php";
if (isset($_POST['submit'])) {
  $kode_pelanggan = $_POST['kode_pelanggan'];
  $nama_pelanggan = $_POST['nama_pelanggan'];
  $jk = $_POST['jk'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];

  $query = $conn->query("INSERT INTO pelanggan (kode_plg, nama_plg, jk, alamat, telepon) VALUES ('$kode_pelanggan', '$nama_pelanggan', '$jk', '$alamat', '$telepon')");

  if ($query) {
    header('location:index.php?alert=1');
  } else {
    header('location:index.php?alert=0');
  }
} else {
  echo "Silahkan isi form terlebih dahulu! <a href='index.php'>Form Pelanggan</a>";
}
