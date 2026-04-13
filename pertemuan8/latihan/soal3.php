<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input</title>
</head>
<body>
    <form action="?page=soal3" method="post">
    <select name="hewan[]">
        <option value="babi">babi</option>
        <option value="anjing">anjing</option>
        <option value="monyet">monyet</option>
    </select>
    <button type="submit">submit</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['hewan'])) {
    $hewan = $_POST['hewan'];
    
    foreach ($hewan as $h) {
        echo "Hewan dipilih: " . $h . "<br>";
    }
}
?>