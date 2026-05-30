<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dizi_id = isset($_POST['id']) ? (int)$_POST['id'] : -1;
    
    $isim = htmlspecialchars(strip_tags($_POST['isim']));
    $metin = htmlspecialchars(strip_tags($_POST['metin']));
    
    // Formdan seçilen yıldız puanını alıyoruz (varsayılan 5)
    $puan = isset($_POST['puan']) ? (int)$_POST['puan'] : 5; 
    if ($puan < 1) $puan = 1;
    if ($puan > 5) $puan = 5;
    
    if ($dizi_id >= 0 && !empty($isim) && !empty($metin)) {
        $dosya_adi = 'diziler.json';
        if (file_exists($dosya_adi)) {
            $okunan_veri = json_decode(file_get_contents($dosya_adi), true);
            
            if (is_array($okunan_veri) && isset($okunan_veri[$dizi_id])) {
                $diziler = $okunan_veri;
                
                if (!isset($diziler[$dizi_id]['yorumlar'])) {
                    $diziler[$dizi_id]['yorumlar'] = [];
                }
                
                // İsim, metin ve yıldız puanını dizi içine ekle
                $diziler[$dizi_id]['yorumlar'][] = array(
                    "isim" => $isim,
                    "metin" => $metin,
                    "puan" => $puan
                );
                
                file_put_contents($dosya_adi, json_encode($diziler, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        }
    }
    
    header("Location: dizi_detay.php?id=" . $dizi_id);
    exit();
}
?>