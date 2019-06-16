<?php 

require_once 'php_action/db_connect.php';

session_start();

session_unset();
session_destroy();

header('location: login.php');

?>