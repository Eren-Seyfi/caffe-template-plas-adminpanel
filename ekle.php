<?php
// Veritabanı bağlantısını dahil et
include 'connect.php';

// Formdan gelen verileri kontrol et ve al
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $urun_ismi = $_POST['urun_ismi'];
    $urun_aciklama = $_POST['urun_aciklama'];
    $urun_fiyat = $_POST['urun_fiyat'];
    $urun_turu_id = $_POST['urun_turu_id'];

    // Resim dosyasını yükle
    $target_dir = "içecekler/";
    $target_file = $target_dir . basename($_FILES["urun_resmi"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Resmin gerçekten bir resim olup olmadığını kontrol et
    $check = getimagesize($_FILES["urun_resmi"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Dosya bir resim değil.";
        $uploadOk = 0;
    }

    // Dosya zaten mevcut mu kontrol et
    if (file_exists($target_file)) {
        echo "Üzgünüz, dosya zaten mevcut.";
        $uploadOk = 0;
    }

    // Dosya boyutu kontrolü
    if ($_FILES["urun_resmi"]["size"] > 500000) {
        echo "Üzgünüz, dosyanın boyutu çok büyük.";
        $uploadOk = 0;
    }

    // Belirli dosya formatlarına izin ver
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Üzgünüz, sadece JPG, JPEG, PNG & GIF dosyalarına izin veriliyor.";
        $uploadOk = 0;
    }

    // Dosya yükleme hatasız mı kontrol et
    if ($uploadOk == 0) {
        echo "Üzgünüz, dosyanız yüklenemedi.";
    } else {
        if (move_uploaded_file($_FILES["urun_resmi"]["tmp_name"], $target_file)) {
            // Veritabanına ekleme
            $sql = "INSERT INTO `ürün` (urun_ismi, urun_aciklama, urun_fiyat, urun_turu_id, urun_resmi) 
                    VALUES (?, ?, ?, ?, ?)";

            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ssdis", $urun_ismi, $urun_aciklama, $urun_fiyat, $urun_turu_id, $target_file);

                if ($stmt->execute()) {
                    // Başarılı olursa, ürünler sayfasına yönlendir
                    header("Location: /ceren/admin.php");
                    exit();
                } else {
                    echo "Hata: Ürün eklenemedi.";
                }

                $stmt->close();
            }
        } else {
            echo "Üzgünüz, dosyanız yüklenirken bir hata oluştu.";
        }
    }
} else {
    echo "Geçersiz istek.";
}

// Veritabanı bağlantısını kapat
$conn->close();
?>