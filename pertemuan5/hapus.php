<?php
include_once("config.php");

$id = $_GET["id"];

mysqli_query($conection,"DELETE FROM blog WHERE id = $id");

header("Location: index.php");
?>