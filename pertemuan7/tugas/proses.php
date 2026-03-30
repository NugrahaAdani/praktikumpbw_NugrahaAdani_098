<?php
    $name = $_POST['nama'];
    $nilai = $_POST['nilai'];
    $predikat = ""; 
    $status = "";

    if ($nilai >= 85 && $nilai <= 100){
        $predikat = "A";
        $status = "Lulus";
    }
    elseif ($nilai >= 75 && $nilai <= 84){
        $predikat = "B";
        $status = "Lulus";
    }
    elseif ($nilai >= 65 && $nilai <= 74){
        $predikat = "C";
        $status = "Lulus";
    }
    elseif ($nilai >= 50 && $nilai <= 64){
        $predikat = "D";
        $status = "Lulus";
    }
    elseif ($nilai >= 0 && $nilai <= 49){
        $predikat = "E";
        $status = "Tidak Lulus";
    }
    else{
        $predikat = "Tidak Valid";
        $status = "Tidak Valid";
    }
?>

    <h2>OUTPUT</h2><hr>
    <p>Nama : <?php echo $name; ?> <p>
    <p>Nilai : <?php echo $nilai; ?> <p>
    <p>Predikat: <?php echo $predikat; ?> <p>
    <p>Status : <?php echo $status; ?> <p>