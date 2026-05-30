<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$dosya_adi = 'yorumlar.json';
$yorum_kartlari_html = "";

if (file_exists($dosya_adi)) {
    $json_veri = file_get_contents($dosya_adi);
    $yorumlar = json_decode($json_veri, true);
    if (!empty($yorumlar)) {
        $yorumlar = array_reverse($yorumlar);
        foreach ($yorumlar as $görüş) {
            $yorum_kartlari_html .= "<div class='comment-card'>";
            $yorum_kartlari_html .= "<h4>" . htmlspecialchars($görüş['dizi']) . " <span class='comment-rating'>" . htmlspecialchars($görüş['puan']) . "/10</span></h4>";
            $yorum_kartlari_html .= "<p class='comment-text'>\"" . htmlspecialchars($görüş['yorum']) . "\"</p>";
            $yorum_kartlari_html .= "</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yönetici Paneli - E-DİZİ</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* BUZLU CAM EFEKTİ VE SABİT MENÜ */
        header { 
            position: sticky; top: 0; z-index: 1000; 
            background: rgba(26, 26, 31, 0.7); 
            backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
            padding: 20px 50px; display: flex; justify-content: space-between; align-items: center;
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }
        :root { --bg-color: #0f0f11; --card-bg: #1a1a1f; --accent-color: #d4af37; --text-light: #f5f5f5; --text-muted: #a0a0a0; }
        body { font-family: 'Poppins', sans-serif; background-color: var(--bg-color); color: var(--text-light); margin: 0; padding: 0; }
        header { background-color: rgba(26, 26, 31, 0.95); padding: 20px 50px; display: flex; justify-content: space-between; border-bottom: 2px solid var(--accent-color); }
        .logo { font-size: 24px; font-weight: 600; color: var(--accent-color); text-decoration: none; }
        nav a { color: var(--text-light); text-decoration: none; margin-left: 30px; }
        
        .admin-wrapper { display: flex; max-width: 1200px; margin: 50px auto; gap: 40px; padding: 0 20px; }
        .panel-section { flex: 1; background-color: var(--card-bg); padding: 35px; border-radius: 12px; border: 1px solid rgba(212, 175, 55, 0.1); }
        h2 { color: var(--accent-color); border-bottom: 1px solid #333; padding-bottom: 10px; }
        
        input { width: 100%; padding: 12px; background-color: #0f0f11; border: 1px solid #333; color: white; border-radius: 6px; margin-bottom: 15px; }
        button { width: 100%; background-color: var(--accent-color); color: #000; padding: 14px; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; }
        
        .comment-card { background-color: #0f0f11; padding: 20px; border-radius: 8px; border-left: 4px solid var(--accent-color); margin-bottom: 15px; }
        .comment-rating { color: var(--accent-color); }
    </style>
</head>
<body>
    <header>
        <a href="index.php" class="logo">E-DİZİ</a>
        <nav>
            <a href="index.php">Ana Sayfa</a>
            <a href="diziler.php">Diziler</a>
            <a href="admin.php" style="color: var(--accent-color);">Yönetim</a>
        </nav>
    </header>
    <div class="admin-wrapper">
        <div class="panel-section">
            <h2>1. Aşama: Yeni Dizi Ekle</h2>
            <form action="admin_islem.php" method="POST">
                Dizi Adı: <input type="text" name="ad" required>
                Türü: <input type="text" name="tur" required>
                Çıkış Yılı: <input type="number" name="yil" required>
                Puanı: <input type="number" step="0.1" name="puan" required>
                <button type="submit">İleri: Fotoğraf ve Bilgi Ekle →</button>
            </form>
        </div>
        <div class="panel-section">
            <h2>Gelen Görüşler</h2>
            <?php echo $yorum_kartlari_html ? $yorum_kartlari_html : "<p>Henüz görüş yok.</p>"; ?>
        </div>
    </div>
</body>
</html>