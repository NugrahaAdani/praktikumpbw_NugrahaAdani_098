<?php
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $ukt = $_POST['ukt'];
    $diskon = ""; 
    $hargaDiskon = "";
    $potonganHarga = "";
    $hargAkhir = "";

    if($ukt >= 5000000 && $semester > 8){
        $diskon = 0.15;
        $potonganHarga = $ukt * $diskon;
        $hargaDiskon = "15% dari $ukt = $potonganHarga";
        $hargAkhir = $ukt - ($ukt * $diskon);
    }
    elseif($ukt >= 5000000 && $semester <= 8){
        $diskon = 0.1;
        $potonganHarga = $ukt * $diskon;
        $hargaDiskon = "10% dari " . number_format($ukt, 0, ',', '.') . " = " . number_format($potonganHarga, 0, ',', '.');
        $hargAkhir = $ukt - ($ukt * $diskon);
    }
    else{
        $hargaDiskon = "Tidak diskon";
        $hargAkhir = $ukt;
    }
?>

<h2>OUTPUT</h2><hr>
    <p>NPM: <?php echo $npm; ?> </p>
    <p>Nama: <?php echo $nama; ?> </p>
    <p>Prodi: <?php echo $prodi; ?> </p>
    <p>Semester: <?php echo $semester; ?> </p>
    <p>Biaya UKT: Rp. <?php echo number_format($ukt, 0, ',', '.'); ?>,- </p>
    <p>Diskon: <?php echo $hargaDiskon; ?> </p>
    <p>Total yang harus dibayar: Rp. <?php echo number_format($hargAkhir, 0, ',', '.'); ?>,- </p>