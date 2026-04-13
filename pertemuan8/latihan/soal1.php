<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input</title>
</head>
<body>
    <form action="?page=soal1" method="post">
    <label>Jumlah roda:</label>
    <input type="text" name="roda">
    <button type="submit">submit</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['roda'])) {
    $roda = $_POST['roda'];

    switch ($roda) {
        case 2:
            echo "kendaraan anda adalah sepeda motor";
            break;
        case 4:
            echo "kendaraan anda adalah mobil";
            break;
        case 6:
            echo "kendaraan anda adalah truck kecil / bus kecil";
            break;
        case 8:
            echo "kendaraan anda adalah truck kecil / trailer";
            break;
        default:
            echo "kendaraan anda kemungkinan custom sendiri atau kencaraan khusus industri";
    }
}
?>