<?php
include_once('config.php');

if(isset($_POST["login"])){
    $username = htmlspecialchars($_POST["username"]);
    $password = $_POST["password"];

    $query = mysqli_query($conection,"SELECT * FROM users WHERE username = '$username'");

    $user = mysqli_fetch_assoc($query);

    if(mysqli_num_rows($query) == 1){
        if(password_verify($password,$user["password"])){
            echo "<script>
            alert('register berhasil')
            window.location.href = 'index.php';
            </script>";

            exit;
        } else{
            echo "<script>
                        alert('password salah')
                    </script>";
        } 
    } else {
        echo "<script>
                        alert('username tidak ditemukan')
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
       

            <button type="submit" name="login" class="btn btn-primary">login</button>
        </form>
    </div>

</body>

</html>