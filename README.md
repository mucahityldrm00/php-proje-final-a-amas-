Projenin Temeli: Ağır veritabanları (MySQL vb.) yerine hızlı, taşınabilir ve sunucu yormayan JSON altyapısı kullanıldı. Tüm veriler PHP ile dinamik olarak dosyaya yazılıp okunuyor.

Tasarım (Frontend): Modern web trendleri uygulandı. Sabit "buzlu cam" (Glassmorphism) üst menü, dizi kartlarının üzerine gelince sinematik büyüme/parlama (hover) efekti ve yumuşak sayfa geçişleri (Fade-in) eklendi.

Etkileşim: Kullanıcıların dizilere 1-5 arası görsel yıldız vererek kendi isimleriyle inceleme yazabildiği dinamik bir yorum motoru kuruldu.

Arama Sistemi: Türkçe karakterlere (İ, Ş, Ğ vb.) tam uyumlu, anında filtreleme yapan esnek bir arama çubuğu entegre edildi.

Güvenlik ve İstikrar (Hocanın Dikkat Edeceği Kısım): * Dışarıdan zararlı kod (script) girişini engellemek için tüm formlarda XSS Koruması (htmlspecialchars ve strip_tags) var.

Eski kayıtların silinmesini (dosya ezilmesini) önleyen is_array kontrolleri ile arka plan veri kayıt yapısı kurşungeçirmez hale getirildi.
