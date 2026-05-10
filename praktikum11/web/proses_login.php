<?php
session_start();
include 'koneksi_db.php'; // koneksi MySQLi OOP

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        header("Location: login.php?message=" . urlencode("Username dan password wajib diisi"));
        exit;
    }

    // Prepared statement
    $stmt = $conn->prepare("
        SELECT id, nama, password 
        FROM pengguna 
        WHERE nama = ? AND password = ?
    ");

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {

        $user = $result->fetch_assoc();

        $_SESSION['id'] = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['login_web'] = true;

        header("Location: index.php");
        exit;

    } else {

        header("Location: login.php?message=" . urlencode("Username atau Password salah!"));
        exit;
    }

    $stmt->close();
} else {
    header("Location: login.php");
    exit;
}
?>
