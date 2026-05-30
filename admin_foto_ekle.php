<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $dizi_id = (int)$_POST['dizi_id'];
    $detay = htmlspecialchars($_POST['detay']);
    
    // Klasör Kontrolü ve Yaratma
    $hedef_klasor = "resimler/";
    if (!file_exists($hedef_klasor)) {
        mkdir($hedef_klasor, 0777, true);
    }

    // Fotoğrafı Yükleme
    $resim_yolu = "";
    if (isset($_FILES["resim_dosyasi"]) && $_FILES["resim_dosyasi"]["error"] == 0) {
        $dosya_adi = basename($_FILES["resim_dosyasi"]["name"]);
        $yeni_dosya_adi = time() . "_" . $dosya_adi; // İsim çakışmasını önler
        $hedef_yol = $hedef_klasor . $yeni_dosya_adi;

        if (move_uploaded_file($_FILES["resim_dosyasi"]["tmp_name"], $hedef_yol)) {
            $resim_yolu = $hedef_yol;
        }
    }

    // JSON Verisini Oku ve Sadece İlgili Diziyi Güncelle
    $json_veri = file_get_contents('diziler.json');
    $diziler = json_decode($json_veri, true);

    if (isset($diziler[$dizi_id])) {
        $diziler[$dizi_id]["resim"] = $resim_yolu;
        $diziler[$dizi_id]["detay"] = $detay;
    }

    // Dosyaya Geri Yaz
    file_put_contents('diziler.json', json_encode($diziler, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // Tamamlanma Ekranı
    echo "<body style='background-color: #0f0f11; color: white; font-family: sans-serif; text-align:center; padding-top: 100px;'>";
    echo "<div style='max-width:500px; margin:0 auto; background:#1a1a1f; padding:40px; border-radius:12px; border:1px solid #d4af37;'>";
    echo "<h2 style='color:#d4af37;'>İşlem Tamamlandı!</h2>";
    echo "<p style='color:#a0a0a0;'>Dizi fotoğrafla ve bilgilerle birlikte sisteme kusursuz bir şekilde eklendi.</p><br>";
    echo "<a href='diziler.php' style='background-color:#d4af37; color:#000; padding:10px 20px; text-decoration:none; border-radius:6px; font-weight:bold;'>Dizileri Görüntüle</a>";
    echo "</div></body>";
}
?>