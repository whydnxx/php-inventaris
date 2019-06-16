<?php

$connect = new mysqli("localhost", "root", "", "wahyudin_p3");

if ($connect->connect_error) {
  die("Gagal" . $connect->connect_error);
}

else {
  // echo "Koneksi Berhasil";
}

 ?>
