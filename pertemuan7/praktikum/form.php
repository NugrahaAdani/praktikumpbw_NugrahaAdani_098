<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form php</title>
</head>
<body>
    <form action="proses.php" method = "post">
        <div style="display: flex; gap: 10px; margin-bottom: 10px;">
            <label for="">Nama: </label>
            <input type="text" name="nama">
        </div>
        <divstyle="display: flex; gap: 10px; margin-bottom: 10px;">
            <label for="">Nilai:</label>
            <input type="number" name="nilai">
        </div>
        <button type="submit">submit</button>
    </form>

</body>
</html>