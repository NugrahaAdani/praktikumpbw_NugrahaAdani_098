<?php

$conn = new mysqli('localhost', 'root', '', 'praktikum_pbw');

if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}

?>