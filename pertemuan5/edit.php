<?php
include_once("config.php");
$id = $_GET['id'];

$post = mysqli_query($conection, "SELECT * FROM blog WHERE id = $id");

$postingan = mysqli_fetch_assoc($post);
if (isset($_POST["submit"])) {
    $judul = htmlspecialchars($_POST["judul"]); //htmlspecialchar digunakan agar data yang ditampilkan ke dalam browser aman
    $gambar = $_FILES["gambar"]["name"];
    $isi = htmlspecialchars($_POST["isi"]);
    $kategori = $_POST["kategori"];

    $queryEdit = "UPDATE blog SET judul ='$judul',gambar='$gambar',isi='$isi',kategori='$kategori'WHERE id = $id";
    mysqli_query($conection, $queryEdit);
    if (mysqli_query($conection, $queryEdit)) {
        echo "<script>
                alert('berhasil di edit')
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
                <input type="text" class="form-control" name="judul" id="judul" aria-describedby="isi-judul" value=<?= $postingan["judul"]; ?>>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" name="gambar" id="gambar" accept=".png,.jpg,.jpeg,image/png,image/png">
                <p><?= $postingan["gambar"]; ?></p>

            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">isi postingan</label>
                <textarea class="form-control" id="isi" name="isi" rows="3"><?=$postingan["isi"]; ?></textarea>
            </div>


            <div class="mb-3">
                <label class="form-label" for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-select" required>
                    <option value="<?= $postingan["kategori"]?>"hidden><?$postingan["kategori"]?></option>
                    <Option value="Coding">Coding</Option>
                    <Option value="Design">Design</Option>
                    <Option value="Personal">Personal</Option>
                </select>


            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>