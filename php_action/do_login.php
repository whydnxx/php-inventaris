<?php

session_start();
require_once 'db_connect.php';

if ($_POST) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cek = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'") OR DIE(mysqli_error($connect));
  if (mysqli_num_rows($cek) > 0) {
    $result = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password = MD5('$password')") OR DIE(mysqli_error($connect));
    if (mysqli_num_rows($result)) {
      $data = mysqli_fetch_array($result);
      $_SESSION['id_user'] = $data[0];
      $_SESSION['nama'] = $data[1];
      $_SESSION['username'] = $data[2];
      $_SESSION['level'] = $data[4];

      $uip = $_SERVER['REMOTE_ADDR'];
      mysqli_query($connect, "INSERT INTO userlog(id_user, userIp) VALUES ('".$_SESSION['id_user']."', '$uip')");

      header('location: dashboard.php');
      }
    else {
      $_SESSION['danger'] = "Maaf username/ password salah, mohon dicek terlebih dahulu";
    }
  }
  else {
      $_SESSION['danger'] = "Maaf username tidak diketahui, mohon dicek terlebih dahulu";
  }
}
 ?>
