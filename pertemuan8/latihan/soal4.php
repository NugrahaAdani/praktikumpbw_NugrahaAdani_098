<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input</title>
</head>
<body>
    <form action="?page=soal4" method="post">
    <label>ganjil genap:</label>
    <input type="number" name="nomor">
    <button type="submit">submit</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['nomor'])) {
    $nomor = $_POST['nomor'];

    $hasilnomor = ($nomor % 2 == 0) ? "genap" : "ganjil";

    echo $hasilnomor;
}
?>

