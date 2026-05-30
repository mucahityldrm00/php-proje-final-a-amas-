<?php
$dizi = null;
$dizi_id = isset($_GET['id']) ? (int)$_GET['id'] : -1;

if ($dizi_id >= 0 && file_exists('diziler.json')) {
    $diziler = json_decode(file_get_contents('diziler.json'), true);
    if (is_array($diziler) && isset($diziler[$dizi_id])) {
        $dizi = $diziler[$dizi_id];
    }
}
if (!$dizi) { die("Dizi bulunamadı!"); }

$yorumlar_html = "";
if (isset($dizi['yorumlar']) && !empty($dizi['yorumlar'])) {
    foreach ($dizi['yorumlar'] as $yorum) {
        // Eğer eski yorumlarda puan yoksa otomatik 5 yıldız ata, varsa kayıttakini çek
        $kullanici_puani = isset($yorum['puan']) ? (int)$yorum['puan'] : 5;
        $yildizlar = str_repeat("⭐", $kullanici_puani);

        $yorumlar_html .= "<div style='background:rgba(26,26,31,0.8); padding:20px; margin-top:15px; border-radius:8px; border-left:4px solid #d4af37; box-shadow: 0 4px 10px rgba(0,0,0,0.3); text-align:left;'>";
        $yorumlar_html .= "<div style='display:flex; justify-content:space-between; align-items:center;'>";
        $yorumlar_html .= "<strong style='color:#d4af37; font-size:16px;'>" . htmlspecialchars($yorum['isim']) . "</strong>";
        $yorumlar_html .= "<span style='font-size:14px; letter-spacing:2px;'>" . $yildizlar . "</span>";
        $yorumlar_html .= "</div>";
        $yorumlar_html .= "<p style='margin:12px 0 0 0; color:#ddd; font-size:15px; line-height:1.6;'>" . nl2br(htmlspecialchars($yorum['metin'])) . "</p>";
        $yorumlar_html .= "</div>";
    }
} else {
    $yorumlar_html = "<p style='color:#a0a0a0; text-align:left;'>Bu diziye henüz yorum yapılmamış. İlk yorumu sen yap!</p>";
}

include 'dizi_detay.html';
?>