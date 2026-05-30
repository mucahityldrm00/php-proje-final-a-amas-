<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dosya_adi = 'diziler.json';
    $diziler = []; // Varsayılan olarak boş liste

    // Dosya varsa ve içi düzgünse oku, yoksa silme!
    if (file_exists($dosya_adi)) {
        $okunan_veri = json_decode(file_get_contents($dosya_adi), true);
        if (is_array($okunan_veri)) {
            $diziler = $okunan_veri; 
        }
    }

    // Yeni diziyi eski listenin sonuna ekle
    $diziler[] = array(
        "ad" => htmlspecialchars(strip_tags($_POST['ad'])),
        "tur" => htmlspecialchars(strip_tags($_POST['tur'])),
        "yil" => (int)$_POST['yil'],
        "puan" => (float)$_POST['puan'],
        "resim" => htmlspecialchars(strip_tags($_POST['resim'])),
        "detay" => htmlspecialchars(strip_tags($_POST['detay'])),
        "yorumlar" => []
    );

    file_put_contents($dosya_adi, json_encode($diziler, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    
    $_SESSION['mesaj'] = "Başarılı: Dizi sisteme eklendi!";
    header("Location: admin.php");
    exit();
}
?>