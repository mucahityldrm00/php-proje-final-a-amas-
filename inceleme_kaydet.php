<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dizi_adi = htmlspecialchars($_POST['dizi_adi']);
    $puan = (int)$_POST['puan'];
    $yorum = htmlspecialchars($_POST['yorum']);
    $tarih = date("d.m.Y H:i");

    // 1. Mevcut yorumlar dosyasını oku, yoksa boş dizi oluştur
    $dosya_adi = 'yorumlar.json';
    if (file_exists($dosya_adi)) {
        $json_veri = file_get_contents($dosya_adi);
        $yorumlar = json_decode($json_veri, true);
    } else {
        $yorumlar = array();
    }

    // 2. Yeni gelen görüşü diziye ekle
    $yeni_görüş = array(
        "dizi" => $dizi_adi,
        "puan" => $puan,
        "yorum" => $yorum,
        "tarih" => $tarih
    );
    $yorumlar[] = $yeni_görüş;

    // 3. Güncel listeyi JSON olarak dosyaya geri yaz
    file_put_contents($dosya_adi, json_encode($yorumlar, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // Ekran Tasarımı
    echo "<body style='background-color: #0f0f11; color: #f5f5f5; font-family: sans-serif; text-align:center; padding-top: 100px;'>";
    echo "<div style='max-width:500px; margin:0 auto; background:#1a1a1f; padding:40px; border-radius:12px; border:1px solid #d4af37;'>";
    echo "<h2 style='color: #d4af37;'>Görüşünüz Başarıyla İletildi!</h2>";
    echo "<p>Değerlendirmeniz yönetim paneline gönderildi.</p><br>";
    
    if ($puan >= 8) {
        echo "<h3 style='color: #4CAF50;'>Senin için bir başyapıt! ★</h3>";
    } elseif ($puan >= 5) {
        echo "<h3 style='color: #FFC107;'>Ortalama bir yapım olarak görmüşsün.</h3>";
    } else {
        echo "<h3 style='color: #F44336;'>Pek beğenmedin sanırım.</h3>";
    }
    
    echo "<br><br><a href='index.php' style='color:#d4af37; text-decoration:none; font-weight:bold;'>← Ana Sayfaya Dön</a>";
    echo "</div></body>";
}
?>