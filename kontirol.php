<?php
include "./connect.php";

// Kullanıcı adını ve şifreyi POST request'inden al
$username = $_POST['username'];
$password = $_POST['password'];

// SQL injection'ı önlemek için prepared statements kullanın
$sql = "SELECT `id`, `kullanici_adi`, `kullanici_soyadi`, `kullanici_şifre` FROM kullanici WHERE kullanici_adi = ? AND kullanici_şifre = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    session_start();

    $row = $result->fetch_assoc();
    $_SESSION['kullanici_id'] = $row['id'];
    $_SESSION['kullanici_adi'] = $row['kullanici_adi'];
    $_SESSION['kullanici_soyadi'] = $row['kullanici_soyadi'];


    header("Location: ./admin.php");
    exit();
} else {
    echo "Geçersiz kullanıcı adı veya şifre.";
}

$stmt->close();
$conn->close();
?>