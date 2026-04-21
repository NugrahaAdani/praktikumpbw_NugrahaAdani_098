<?php

$conn = new mysqli('localhost', 'root', '','praktikum_pbw');
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>