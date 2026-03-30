<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form php</title>
</head>
<body>
    <form action="proses_diskon.php" method = "post">
        <div style="display: flex; gap: 10px; margin-bottom: 10px;">
            <label for="">NPM: </label>
            <input type="text" name="npm">
        </div>
    <div style="display: flex; gap: 10px; margin-bottom: 10px;">
            <label for="">Nama: </label>
            <input type="text" name="nama">
        </div>
        <div style="display: flex; gap: 10px; margin-bottom: 10px;">
            <label for="">Prodi:</label>
            <input type="text" name="prodi">
        </div>
        <div style="display: flex; gap: 10px; margin-bottom: 10px;">
            <label for="">Semester: </label>
            <input type="number" name="semester">
        </div>
        <div style="display: flex; gap: 10px; margin-bottom: 10px;">
            <label for="">Biaya UKT: </label>
            <input type="number" name="ukt">
        </div>
        <button type="submit">submit</button>
    </form>

</body>
</html>