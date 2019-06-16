<?php

session_start();

require_once 'db_connect.php';

if (empty($_SESSION['id_user'])) {
	echo '<script>alert("Maaf, anda tidak dapat mengakses laman tersebut, mohon untuk login terlebih dahulu");window.location.replace("login.php");</script>';
}

 ?>
