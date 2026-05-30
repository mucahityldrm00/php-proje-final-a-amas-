<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hakkımızda - E-DİZİ</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root { --bg-color: #0f0f11; --card-bg: #1a1a1f; --accent-color: #d4af37; --text-light: #f5f5f5; --text-muted: #a0a0a0; }
        body { font-family: 'Poppins', sans-serif; background-color: var(--bg-color); color: var(--text-light); margin: 0; padding: 0; line-height: 1.8; }
        header { background-color: rgba(26, 26, 31, 0.95); padding: 20px 50px; display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid var(--accent-color); }
        .logo { font-size: 24px; font-weight: 600; color: var(--accent-color); text-decoration: none; }
        nav a { color: var(--text-light); text-decoration: none; margin-left: 30px; transition: color 0.3s ease; }
        nav a:hover { color: var(--accent-color); }
        
        .about-container { max-width: 800px; margin: 80px auto; padding: 0 20px; text-align: center; }
        .about-container h2 { font-size: 36px; color: var(--accent-color); margin-bottom: 20px; text-transform: uppercase; letter-spacing: 2px; }
        .about-content { background-color: var(--card-bg); padding: 40px; border-radius: 12px; border: 1px solid rgba(212, 175, 55, 0.1); box-shadow: 0 10px 30px rgba(0,0,0,0.5); text-align: left; }
        .about-content p { color: var(--text-muted); font-size: 16px; margin-bottom: 20px; }
        .about-content strong { color: var(--text-light); }
        
        .tech-stack { margin-top: 30px; padding-top: 20px; border-top: 1px solid #333; display: flex; justify-content: center; gap: 20px; }
        .tech-badge { background-color: rgba(212, 175, 55, 0.1); color: var(--accent-color); padding: 8px 16px; border-radius: 20px; font-size: 14px; font-weight: 600; border: 1px solid rgba(212, 175, 55, 0.3); }
    </style>
</head>
<body>

    <header>
        <a href="index.php" class="logo">E-DİZİ</a>
        <nav>
            <a href="index.php">Ana Sayfa</a>
            <a href="diziler.php">Diziler</a>
            <a href="hakkimizda.php" style="color: var(--accent-color);">Hakkımızda</a>
        </nav>
    </header>

    <div class="about-container">
        <h2>Hikayenin Başladığı Yer</h2>
        
        <div class="about-content">
            <p><strong>E-DİZİ Platformu</strong>, televizyon tarihine damga vurmuş epik savaşlardan, zeka dolu politik entrikalara; yer altı dünyasının karanlık sırlarından, yüksek güvenlikli hapishanelerden kaçış planlarına kadar uzanan geniş bir yelpazedeki başyapıtları bir araya getirmek için kurulmuştur.</p>
            
            <p>Amacımız, izleyicilerin sadece pasif birer tüketici olmaktan çıkıp, izledikleri yapımlar hakkında eleştirilerini sunabildikleri, puanlamalarla kendi "en iyiler" listesini oluşturabildikleri dinamik bir topluluk yaratmaktır.</p>
            
            <p>Bu proje, <strong>İnönü Üniversitesi Web Programlama Dersi Final Projesi</strong> kapsamında geliştirilmiş olup, modern web standartlarına uygun olarak sıfırdan kodlanmıştır. Tasarımda karanlık tema tercih edilerek sinematik bir atmosfer yakalanması hedeflenmiştir.</p>

            <div class="tech-stack">
                <span class="tech-badge">HTML5</span>
                <span class="tech-badge">CSS3</span>
                <span class="tech-badge">PHP 8</span>
                <span class="tech-badge">JSON Veri Yönetimi</span>
            </div>
        </div>
    </div>

</body>
</html>