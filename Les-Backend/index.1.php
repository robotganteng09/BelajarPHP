<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //set zona waktu
    date_default_timezone_set('Asia/Jakarta');
    $currentDate = date('Y-m-d');
    $currentTIme = date('H:i:s');

    echo("tanggal saat ini adalah: $currentDate <br>");
    echo("waktu saat ini adalah: $currentTIme <br>");
    
    $timeStamp = time();

    //waktu unix adalah waktu yang digunakan komputer untuk menghitung jumlah detik dari tanggal 1 Januari 1970 pukul 00:00
    echo("waktu saat ini $timeStamp <br>");
    
 
    $timeStampToDateTime = date('Y-m-d H:i:s');
    echo("waktu dari unix adalah $timeStampToDateTime <br>");
    
    //format waktu 12 jam
    $currentTime1 = date('Y-m-d h:i:s A');
    echo("waktu di Jakarta dengan format : $currentTime1 <br>");

    $dateTime = new DateTime();
    echo("waktu sekarang ". $dateTime -> format("Y-m-d") ."<br>");

    $dateTime -> modify('+5 days');
    echo("7 hari dari sekarang" .$dateTime -> format("Y-m-d") . "<br>");

    $dateTime -> modify('-5 days');
    
    echo("7 hari sebelumnya" .$dateTime -> format("Y-m-d")."<br>");

    $start = new DateTime('2025-06-08');
    $end = new DateTime('2025-09-09');
    
    //format selisih waktu dalam hari
    $interval = $start -> diff($end);
    echo("selisih waktu : " . $interval -> days ."hari <br>");

     //format selisih waktu dalam hari
     echo($interval -> format("%m bulan %d hari"). "<br>");
     echo("hari ini :" . date("l") . "<br>");
     echo("bulan ini :" .date("F"))
    ?>
</body>
</html>