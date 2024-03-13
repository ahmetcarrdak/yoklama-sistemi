<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yoklama";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Veritabanına başarıyla bağlandı!";
} catch (PDOException $e) {
    //echo "Bağlantı hatası: " . $e->getMessage();
}

