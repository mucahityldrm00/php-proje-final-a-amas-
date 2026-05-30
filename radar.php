<?php
// XAMPP'ın tam olarak hangi klasörde çalıştığını buluyoruz
$gercek_klasor = __DIR__;
$dosya_yolu = $gercek_klasor . '/diziler.json';

// 4'lü sağlam liste
$orijinal_veri = '[
    {"ad": "Breaking Bad", "tur": "Suç, Drama", "yil": 2008, "puan": 9.5, "resim": "resimler/bb.jpg", "detay": "Lise kimya...", "yorumlar": []},
    {"ad": "Game of Thrones", "tur": "Fantastik, Drama", "yil": 2011, "puan": 9.2, "resim": "resimler/got.jpg", "detay": "Westeros...", "yorumlar": []},
    {"ad": "Vikings", "tur": "Tarihi, Aksiyon", "yil": 2013, "puan": 8.5, "resim": "resimler/vikings.jpg", "detay": "Ragnar...", "yorumlar": []},
    {"ad": "Prison Break", "tur": "Aksiyon, Gerilim", "yil": 2005, "puan": 8.3, "resim": "resimler/prison.jpg", "detay": "Michael...", "yorumlar": []}
]';

// Dosyayı tam olarak XAMPP'ın baktığı yere zorla yazıyoruz
file_put_contents($dosya_yolu, $orijinal_veri);

echo "<div style='font-family: sans-serif; text-align: center; margin-top: 50px;'>";
echo "<h1>Tarayıcının Baktığı Gerçek Klasör:</h1>";
echo "<h2 style='color: red; background: #eee; padding: 10px; display: inline-block;'>" . $gercek_klasor . "</h2>";
echo "<h3 style='color: green;'>Diziler.json dosyası BAŞARIYLA bu klasörün içine yaratıldı!</h3>";
echo "<br><br>";
echo "<a href='diziler.php' style='padding: 15px 30px; background: #d4af37; color: black; font-size: 20px; text-decoration: none; font-weight: bold; border-radius: 5px;'>Şimdi Diziler Sayfasına Git</a>";
echo "</div>";
?>