<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "webiot1";

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){

    die("Koneksi Tidak Berhasil". mysqli_connect_error());

}