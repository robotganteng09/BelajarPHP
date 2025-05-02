<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .section {
            background-color: blanchedalmond;
            border: 1px solid rgb(0, 0, 0);
            padding: 20px;
        }
    </style>
</head>

<body>
    <h1>Belajar dasar php</h1>
    <form action="" method="POST">
        <label for="">masukkan nama</label>
        <input type="text" name="nama" id="nama" required placeholder="Steve">
        <input type="submit" value="Tampilkan">
    </form>
    <div class="section">
        <?php

        $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : "alvin";
        echo ($nama)
        ?>
    </div>
    <div class="section">
        <span class="label">debugging dengan vur_dump</span>

        <br>
        <?php

        $nama = $nama;
        echo "<span class ='label'>Halo,selamat datang</span>";

        echo "</br>";

        var_dump($nama);

        ?>
        <br>
        <span>debuggin dengan print_r</span>
        <br>
        <?php

        $nama = $nama;
        echo "<span class ='label'>Halo,selamat datang</sapan>";

        echo "</br>";

        print_r($nama);


        ?>
        
    </div>

   <div class="section">
    <span class="label">check variabel</span>
    <br>
    <?php
    if(isset($nama)){
        echo("variabel tersedia");
    } else{
        echo("variabel tidak ditemukan");
    }
    ?>

    <br>

    <span class="label">
        <?php
        $namaSiswa = $nama;
        $kelas = 12;
        $rata2 = 80;

        $text = "halo saya $namaSiswa saya kelas $kelas saya mendapatkan nilai $rata2";
        echo($text);
        ?>
    </span>

    <span class="label">
     <?php
     for($x = 1; $x<=10; $x++){
        echo "$x <br>";
     }

     $angka = 1;

     while($angka <= 9 ){
        echo "$angka <br>";
        $angka++;
     }
     
     ?>
    </span>

    <span class="label">
    <?php
    $siswa01 = ["Arsya","Bara","Kimi"];

    foreach($siswa01 as $siswaRus){
    
        echo "$siswaRus <br>";
    }    
    ?>
    </span>

    <span class="label">
        <?php
        $day = "monday";

        switch(
            $day
        ){
            case "sunday":
                echo("today is sunday");
                break;

            case "monday":
                echo("today is Monday");
                break;

            case "tuesday":
                echo("today is Tuesday");
                break;

            case "Wednesday":
                echo("today is Wednesday");
                break;

            case "Thursday":
                echo("today Thursday");
                break;

            default:
                echo("Saturday");
            
        }
        ?>

    </span>
   </div>
  
</body>

</html>