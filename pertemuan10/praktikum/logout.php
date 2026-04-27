<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
header("Location: login.php?message=" .
urlencode("Mengakses fitur harus login dulu bro."));
exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <form method="post" action="proses_logout.php">
        <button type="submit">Logout</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>