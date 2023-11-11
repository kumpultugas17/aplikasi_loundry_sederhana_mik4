<?php
require_once "../config.php";
if (isset($_GET['id'])) {
   $id = $_GET['id'];

   $query = $conn->query("DELETE FROM pelanggan WHERE id_plg = '$id'");

   if ($query) {
      header('location:index.php?alert=1');
   } else {
      header('location:index.php?alert=0');
   }
} else {
   echo "Silahkan pilih data terlebih dahulu! <a href='index.php'>Data Pelanggan</a>";
}
