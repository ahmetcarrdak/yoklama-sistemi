<?php

include "inc/db.php";
session_start();

$sql = "SELECT * FROM haftalar ORDER BY id DESC LIMIT 1";
$stmt = $conn->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$hafta = $row['name'];
$number = $_POST['number'];

if (empty($_SESSION[$number . $hafta])) {

    $_SESSION[$number . $hafta] = true;

    $sql = "SELECT COUNT(*) AS count FROM customer WHERE number='$number'";
    $stmt = $conn->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {

        $sql = "SELECT * FROM customer WHERE number='$number'";
        $stmt = $conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $newData = $hafta;
        $updatedData = $row['dates'] . ", " . $newData;

        // Güncellenmiş veriyi veritabanına ekleyin
        $updateSql = "UPDATE customer SET dates = :veri WHERE number='$number'";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->execute(['veri' => $updatedData]);

        echo "onay";
    } else {
        echo "Kayıt Bulunamadı, lütfen önce kayıt yapınız!";
    }
} else {
    echo "Zaten giriş Yapmışsınız, bir daha giriş yapamazsınız";
}