<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "blog";

$conection = mysqli_connect($server,$username,$password,$db);

if(!$conection){
    echo("koneksi gagal");
}
?>