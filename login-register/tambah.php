<?php
include_once("config.php");

if(isset($_POST["submit"])){
    $judul =htmlspecialchars($_POST["judul"]); //htmlspecialchar digunakan agar data yang ditampilkan ke dalam browser aman
    $gambar = $_FILES["gambar"];
    $isi = htmlspecialchars($_POST["isi"]);
    $kategori = $_POST["kategori"];
    if($gambar['error'] !== UPLOAD_ERR_OK){
      echo("eror upload gambar");
    } else {
        $filename = $gambar['name'];
        $filesize = $gambar['size'];
        $filetype = $gambar['type'];
        $filetemporary = $gambar['tmp_name'];
       $allowedextensions = array("image/jpeg","image/jpg","image/png","image/gif");
       $maxfile = 5*1024*1024;
       if(!in_array($filetype,$allowedextensions)){
        echo("invalid file type");
       } elseif($filesize > $maxfile){
        echo("maxfile is to large");
       } else {
        $unik_filename = uniqid().'_'.$filename;
        $upload_path = "img/";
        $destination = $upload_path.$unik_filename;

        echo($destination); "<br>";

        echo($filetemporary);
        
        
        if(move_uploaded_file($filetemporary,$destination)){
            $queryPost ="INSERT INTO blog (judul,gambar,isi,kategori) VALUES('$judul','$destination','$isi','$kategori')";
            mysqli_query($conection,$queryPost);
                if (mysqli_query($conection, $queryPost)) {
                    echo "<script>
                        alert('berhasil disimpan')
                    </script>";
                    if (mysqli_affected_rows($conection) > 0) {
                        header("Location: index.php");
                    }
                } else {
                    echo "<script>
                        alert('gagal disimpan')
                    </script>";
                }
            }
       }
    }
   
  
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Halaman admin</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" aria-describedby="isi-judul">
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" name="gambar" id="gambar" accept=".png,.jpg,.jpeg,image/png,image/png" required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">isi postingan</label>
                <textarea class="form-control" id="isi" name="isi" rows="3"></textarea>
            </div>
     

            <div class="mb-3">
                <label class="form-label" for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-select" required>
                    <Option value="Coding">Coding</Option>
                    <Option value="Design">Design</Option>
                    <Option value="Personal">Personal</Option>
                </select>

           
            </div>
            <button type="submit" name="submit"  class="btn btn-primary" >Submit</button>
        </form>
    </div>
</body>

</html>