<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Sistemi</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome eklentisi -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="loading-overlay">
        <div class="loading-content">
            <div class="spinner"></div>
            <div class="loading-text">Yönlendiriliyor...</div>
        </div>
    </div>
    <nav class="navbar">
        <div class="logo">
            <i class="fas fa-calendar-check"></i>
            <span>Randevu Sistemi</span>
        </div>
        <div class="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
        <ul class="nav-links">
            <li><a href="#anasayfa">Ana Sayfa</a></li>
            <li><a href="#hizmetler">Hizmetler</a></li>
            <li><a href="#hakkimizda">Hakkımızda</a></li>
            <li><a href="#iletisim">İletişim</a></li>
            <li><!-- Randevu butonları için -->
            <a href="login.php" class="randevu-btn" onclick="localStorage.setItem('loading', 'true')">Randevu Al</a>
            </ul>
    </nav>

    <div class="hero">
    <div class="hero-content">
    <h1>Online Randevu Sistemi</h1>
    <p>Hızlı ve kolay randevu alma deneyimi için hemen başlayın</p>
    <a href="login.php" class="cta-button">Randevu Al</a>
</div>
    </div>

    <div class="features">
        <div class="feature-card">
            <div class="feature-icon">
                <img src="images/timer.png" alt="Hızlı Randevu">
            </div>
            <h3>Hızlı Randevu</h3>
            <p>Mobil uygulama, Web ve Alo182 Randevu hattından istediğiniz hekime anında randevu alabilirsiniz.</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">
                <img src="images/hospital.jpg" alt="En Yakın Hastane">
            </div>
            <h3>En Yakın Hastane</h3>
            <p>Mobil Uygulama ve Web üzerinden konum bilgilerinizi paylaşarak size en yakın hastaneyi bulabilirsiniz.</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">
                <img src="images/stethoscope.png" alt="İstediğiniz Doktor">
            </div>
            <h3>İstediğiniz Doktor</h3>
            <p>MHRS üzerinde istediğiniz doktora randevu almak sizin elinizde.</p>
        </div>
    </div>

    <!-- İstatistikler Bölümü -->
    <section class="stats">
        <div class="stats-container">
            <div class="stat-item">
                <i class="fas fa-user-md"></i>
                <h3>1500</h3>
                <p>Uzman Doktor</p>
            </div>
            
            <div class="stat-item">
                <i class="fas fa-hospital"></i>
                <h3>250</h3>
                <p>Hastane</p>
            </div>
            
            <div class="stat-item">
                <i class="fas fa-users"></i>
                <h3>50000</h3>
                <p>Mutlu Hasta</p>
            </div>
            
            <div class="stat-item">
                <i class="fas fa-calendar-check"></i>
                <h3>100000</h3>
                <p>Başarılı Randevu</p>
            </div>
        </div>
    </section>

<!-- Branşlar Bölümü -->
<section class="departments">
    <div class="section-title">
        <h2>Branşlarımız</h2>
        <p>Alanında uzman doktorlarımızla hizmetinizdeyiz</p>
    </div>
    
    <div class="departments-grid">
        <div class="department-card">
            <img src="images/ic_hastaliklari.png" alt="İç Hastalıkları">
            <div class="department-info">
                <h3>İç Hastalıkları</h3>
                <p>Vücut Sistemi Genel Hastalıkları</p>
                <a href="#randevu" class="dept-btn">Randevu Al</a>
            </div>
        </div>
        
        <div class="department-card">
            <img src="images/noroloji.png" alt="Nöroloji">
            <div class="department-info">
                <h3>Nöroloji</h3>
                <p>Sinir Sistemi Hastalıkları</p>
                <a href="#randevu" class="dept-btn">Randevu Al</a>
            </div>
        </div>
        
        <div class="department-card">
            <img src="images/ortopedi.png" alt="Ortopedi">
            <div class="department-info">
                <h3>Ortopedi</h3>
                <p>Kas ve İskelet Sistemi</p>
                <a href="#randevu" class="dept-btn">Randevu Al</a>
            </div>
        </div>
    </div>
</section>
<!-- İletişim Formu Bölümü -->
<section class="contact" id="iletisim">
    <div class="section-title">
        <h2>Bize Ulaşın</h2>
        <p>Sorularınız için bizimle iletişime geçebilirsiniz</p>
    </div>

    <div class="contact-container">
        <div class="contact-info">
            <div class="info-item">
                <i class="fas fa-phone"></i>
                <div>
                    <h3>Telefon</h3>
                    <p>+90 (312) 123 45 67</p>
                    <p>+90 (312) 123 45 68</p>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-envelope"></i>
                <div>
                    <h3>E-posta</h3>
                    <p>info@hastane.com</p>
                    <p>randevu@hastane.com</p>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <h3>Adres</h3>
                    <p>Atatürk Bulvarı No:123</p>
                    <p>Çankaya/Ankara</p>
                </div>
            </div>

            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3060.0097302213007!2d32.85833!3d39.92080!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMznCsDU1JzE0LjkiTiAzMsKwNTEnMzAuMCJF!5e0!3m2!1str!2str!4v1234567890!5m2!1str!2str" 
                    width="100%" 
                    height="200" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <div class="contact-form">
            <div class="contact-form">
                <form id="contactForm">
                    <div class="form-group">
                        <input type="text" id="name" required>
                        <label for="name">Adınız Soyadınız</label>
                    </div>
    
                    <div class="form-group">
                        <input type="email" id="email" required>
                        <label for="email">E-posta Adresiniz</label>
                    </div>
    
                    <div class="form-group">
                        <input type="tel" id="phone" required>
                        <label for="phone">Telefon Numaranız</label>
                    </div>
    
                    <div class="form-group">
                        <textarea id="message" required></textarea>
                        <label for="message">Mesajınız</label>
                    </div>
    
                    <button type="submit" class="submit-btn">Gönder</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</section>

<!-- Footer Bölümü -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <div class="footer-logo">
                <i class="fas fa-hospital"></i>
                <h3>Hastane Adı</h3>
            </div>
            <p>Sağlığınız için 7/24 hizmetinizdeyiz. Modern tıp teknolojileri ve uzman kadromuzla yanınızdayız.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>

        <div class="footer-section">
            <h3>Hızlı Erişim</h3>
            <ul>
                <li><a href="#anasayfa">Ana Sayfa</a></li>
                <li><a href="#hizmetler">Hizmetler</a></li>
                <li><a href="#doktorlar">Doktorlarımız</a></li>
                <li><a href="#iletisim">İletişim</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Çalışma Saatleri</h3>
            <ul class="working-hours">
                <li>
                    <span>Pazartesi - Cuma:</span>
                    <span>08:00 - 20:00</span>
                </li>
                <li>
                    <span>Cumartesi:</span>
                    <span>09:00 - 18:00</span>
                </li>
                <li>
                    <span>Pazar:</span>
                    <span>09:00 - 16:00</span>
                </li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>İletişim</h3>
            <ul class="contact-info">
                <li>
                    <i class="fas fa-phone"></i>
                    <span>+90 (312) 123 45 67</span>
                </li>
                <li>
                    <i class="fas fa-envelope"></i>
                    <span>info@hastane.com</span>
                </li>
                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Atatürk Bulvarı No:123 Çankaya/Ankara</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2024 Hastane Adı. Tüm hakları saklıdır.</p>
    </div>
</footer>
       
</section>
<!-- Body tag'inin kapanışından önce ekleyin -->
<button id="scrollTopBtn" class="scroll-top">
    <i class="fas fa-arrow-up"></i>
</button>
<script src="script.js"></script>

</body>
</html>