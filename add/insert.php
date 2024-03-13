<?php
include "../inc/db.php";

$name = $_POST['name'];
$number = $_POST['number'];

$sql = "SELECT COUNT(*) AS count FROM customer WHERE number='$number'";
$stmt = $conn->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result['count'] == 0) {
    $sql = "INSERT INTO customer (name, number, dates) VALUES (:name, :number, :dates)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['name' => $name, 'number' => $number, 'dates' => ""]);

    echo "onay";
} else {
    echo "Kayıt zaten mevcut!";
}

