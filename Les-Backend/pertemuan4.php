<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //array dasar
    $nummbers = array(2,4,6,1);
    print_r($nummbers);
    echo("<br>");
    foreach($nummbers as $number){
        echo($number."<br>");
    }
    echo(implode(",",$nummbers));
    echo("<br>");
    var_dump($nummbers);
    echo("<br>");
    $sum = array_sum($nummbers);
    echo($sum);
    echo("<br>");
    $average = $sum/count($nummbers);
    echo($average);
    echo("<br>");
    $data = [1,2,3,4,5];
    $reveresed = array_reverse($data);
    echo(implode(",",$reveresed));
       echo("<br>");
    echo(max($data));
    echo("<br>");
    echo(min($data));
    echo("<br>");
    //array asosiatif

    $user = [
        "nama"=> "Mess",
        "email" => "example@gmail.com",
        "kota" => "Bogor"
    ];
    
    foreach($user as $key => $user1){
        echo ucfirst("$key:$user1");
        echo("<br>");
    }
    
       echo("<br>");
    //function
    function sapa($nama = "Guntur"){
        return"halo $nama";
        
    }
    echo(sapa());
    echo("<br>");

    //function build in
    $text = "belajar php di hari Senin";
    echo("jumlah karakter:".strlen($text)."<br>");
    echo("jummlah kata:".str_word_count($text)."<br>")

    ?>
</body>
</html>