<?php
include_once('config.php');

if (isset($_POST["register"])) {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST["password"];
    $nohp = htmlspecialchars($_POST['nohp']);

    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users(username,password,nohp) VALUES('$username','$hash_password','$nohp')";

    if (mysqli_query($conection, $query)) {
        echo "<script>
            alert('register berhasil')
            window.location.href = 'login.php';
            </script>";

        exit;
    } else {
        echo "<script>
                        alert('registrasi gagal')
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
    <div class="container m-5">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">username</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="username" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">password</label>
                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="password" name="password">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">nohp</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="nohp" name="nohp">
            </div>

            <button type="submit" name="register" class="btn btn-primary">Regis</button>
        </form>
    </div>

</body>

</html>