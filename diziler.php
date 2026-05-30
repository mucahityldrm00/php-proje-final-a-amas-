<?php
$dizi_kartlari_html = "";
$arama_terimi = isset($_GET['ara']) ? mb_strtolower(trim($_GET['ara']), 'UTF-8') : "";

if (file_exists('diziler.json')) {
    $okunan_veri = file_get_contents('diziler.json');
    $diziler = json_decode($okunan_veri, true);
    $bulundu = false;

    if (is_array($diziler) && !empty($diziler)) {
        foreach ($diziler as $id => $dizi) {
            $dizi_adi = mb_strtolower($dizi['ad'], 'UTF-8');
            $dizi_turu = mb_strtolower($dizi['tur'], 'UTF-8');

            if ($arama_terimi === "" || strpos($dizi_adi, $arama_terimi) !== false || strpos($dizi_turu, $arama_terimi) !== false) {
                $bulundu = true;
                
                $dizi_kartlari_html .= "<article class='card'>";
                if (!empty($dizi['resim'])) {
                    $dizi_kartlari_html .= "<img src='" . htmlspecialchars($dizi['resim']) . "' alt='Afiş' onerror=\"this.src='https://via.placeholder.com/280x380?text=Afiş+Yok'\">";
                }
                $dizi_kartlari_html .= "<div>";
                $dizi_kartlari_html .= "<h3 style='color:#d4af37; margin:0 0 10px 0;'>" . htmlspecialchars($dizi['ad']) . "</h3>";
                $dizi_kartlari_html .= "<p style='color:#a0a0a0; margin:0; font-size:14px;'>" . htmlspecialchars($dizi['yil']) . " | " . htmlspecialchars($dizi['tur']) . "</p>";
                $dizi_kartlari_html .= "<p style='margin:10px 0 0 0; font-size:14px; color:#d4af37; font-weight:bold;'>Puan: " . htmlspecialchars($dizi['puan']) . "</p>";
                $dizi_kartlari_html .= "</div>";
                $dizi_kartlari_html .= "<a href='dizi_detay.php?id=" . $id . "' class='btn-detail'>Hakkında / İncele</a>";
                $dizi_kartlari_html .= "</article>";
            }
        }
    } 
    
    if (!$bulundu) {
        $dizi_kartlari_html = "<p style='color:#a0a0a0;'>Kayıtlı dizi bulunamadı.</p>";
    }
} else {
    $dizi_kartlari_html = "<p style='color:red;'>HATA: diziler.json dosyası bulunamadı! Lütfen yönetim panelinden bir dizi ekleyin.</p>";
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Diziler - E-DİZİ</title>
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
        body { font-family: sans-serif; background-color: #0f0f11; color: white; margin: 0; }
        header { background: #1a1a1f; padding: 20px 50px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #d4af37; }
        .logo { font-size: 24px; font-weight: bold; color: #d4af37; text-decoration: none; }
        nav a { color: white; text-decoration: none; margin-left: 20px; font-weight: bold; }
        .search-bar { max-width: 600px; margin: 40px auto 10px; display: flex; gap: 10px; padding: 0 20px; }
        .search-bar input { flex: 1; padding: 12px; border-radius: 5px; border: 1px solid #d4af37; background: #1a1a1f; color: white; outline:none;}
        .search-bar button { padding: 12px 25px; background: #d4af37; font-weight: bold; border: none; border-radius: 5px; cursor: pointer; }
        .container { max-width: 1200px; margin: 30px auto 50px; display: flex; flex-wrap: wrap; gap: 30px; justify-content: center; }
        .card { background: #1a1a1f; padding: 20px; border-radius: 12px; width: 280px; text-align: center; border: 1px solid #333; display: flex; flex-direction: column; justify-content: space-between; }
        .card img { width: 100%; height: 380px; object-fit: cover; border-radius: 8px; margin-bottom: 15px; }
        .btn-detail { display: block; padding: 10px; border: 1px solid #d4af37; color: #d4af37; text-decoration: none; border-radius: 5px; margin-top: 15px; font-weight: bold; transition:0.3s;}
        .btn-detail:hover { background: #d4af37; color: black; }
    </style>
</head>
<body>
    <header>
        <a href="index.html" class="logo">E-DİZİ</a>
        <nav>
            <a href="index.html">Ana Sayfa</a>
            <a href="diziler.php" style="color: #d4af37;">Diziler</a>
            <a href="admin.php">Yönetim</a>
        </nav>
    </header>

    <main>
        <section class="search-bar">
            <form action="diziler.php" method="GET" style="display:flex; width:100%; gap:10px;">
                <input type="text" name="ara" placeholder="Dizi adı veya türü ara...">
                <button type="submit">Filtrele</button>
            </form>
        </section>

        <section class="container">
            <?php echo $dizi_kartlari_html; ?>
        </section>
    </main>
</body>
</html>