<?php
include_once("config.php");

$id = $_GET["id"];

$query = mysqli_query($conection,"SELECT gambar FROM blog WHERE id = $id");

$data = mysqli_fetch_assoc($query);

if($data){
    $gambar = $data['gambar'];
    $delete = mysqli_query($conection, "DELETE FROM blog WHERE id = $id");

    if($delete){
        if(file_exists($gambar)){
            unlink($gambar);
        } else{
            echo("gagal hapus gambar");
        }
    }
}


header("Location: index.php");
?>