<?php
//require_once('rb.php');
$dsn = 'mysql:host=localhost;dbname=testbd';
$login = 'root';
$pass = null;

/*
try {
  R::setup($dsn, $login, $pass);
}
catch (Exception $ex) {
  echo 'Не связанный '.$ex->getMessage();
} */

try {
    $conn = new PDO($dsn, $login, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $ex) {
    echo 'Не связанный '.$ex->getMessage();
}

session_start();
?>
