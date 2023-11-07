<?php
require_once "../config.php";
if (isset($_POST['submit'])) {
   $id_pelanggan = $_POST['id_pelanggan'];
   $kode_pelanggan = $_POST['kode_pelanggan'];
   $nama_pelanggan = $_POST['nama_pelanggan'];
   $jk = $_POST['jk'];
   $alamat = $_POST['alamat'];
   $telepon = $_POST['telepon'];

   $query = $conn->query("UPDATE pelanggan SET kode_plg='$kode_pelanggan', nama_plg='$nama_pelanggan', jk='$jk', alamat='$alamat', telepon='$telepon' WHERE id_plg='$id_pelanggan'");

   if ($query) {
      header('location:index.php?alert=1');
   } else {
      header('location:index.php?alert=0');
   }
} else {
   echo "Silahkan klik edit pada <a href='index.php'>Form Pelanggan</a>";
}
