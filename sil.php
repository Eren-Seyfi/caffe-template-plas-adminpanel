<?php
// Veritabanı bağlantısını dahil et
include 'connect.php';

// `id` parametresini al
if (isset($_GET['id'])) {
    $urun_id = $_GET['id'];

    // Veritabanından ürünü silmek için SQL sorgusu
    $sql = "DELETE FROM `ürün` WHERE id = ?";

    // Hazırlanan ifade kullanarak sorguyu çalıştır
    if ($stmt = $conn->prepare($sql)) {
        // `id` parametresini bağla
        $stmt->bind_param("i", $urun_id);

        // Sorguyu çalıştır
        if ($stmt->execute()) {
            // Başarılı olursa, ürünler sayfasına yönlendir
            header("Location: /ceren/admin.php");
            exit();
        } else {
            // Hata mesajı göster
            echo "Hata: Ürün silinemedi.";
        }

        // İfadeyi kapat
        $stmt->close();
    }
} else {
    // `id` parametresi yoksa hata mesajı göster
    echo "Hata: Geçersiz ürün ID.";
}

// Veritabanı bağlantısını kapat
$conn->close();
?>