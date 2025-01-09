<?php
session_start();
require_once 'config.php';

// Oturum kontrolü
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Kullanıcı bilgilerini al
$user_id = $_SESSION['user_id'];
$stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Sistemi - Ana Sayfa</title>
    <link rel="stylesheet" href="randevu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="user-name">
                    <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?>
                </div>
            </div>
            <nav>
                <ul>
                    <li class="active">
                        <a href="#"><i class="fas fa-home"></i> Ana Sayfa</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-calendar-plus"></i> Yeni Randevu</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-calendar-check"></i> Randevularım</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-user"></i> Profilim</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" id="logoutBtn">
                            <i class="fas fa-sign-out-alt"></i> Çıkış Yap
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Ana içerik -->
        <div class="main-content">
            <header>
                <h1>Hoş Geldiniz, <?php echo htmlspecialchars($user['first_name']); ?></h1>
                <div class="header-right">
                    <span class="date"><?php echo date('d.m.Y'); ?></span>
                </div>
            </header>

            <div class="dashboard-cards">
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <div class="card-info">
                        <h3>Yeni Randevu Al</h3>
                        <p>Hemen yeni bir randevu oluşturun</p>
                        <a href="#" class="btn-primary">Randevu Al</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="card-info">
                        <h3>Aktif Randevular</h3>
                        <p>Mevcut randevularınızı görüntüleyin</p>
                        <a href="#" class="btn-secondary">Görüntüle</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <div class="card-info">
                        <h3>Randevu Geçmişi</h3>
                        <p>Geçmiş randevularınızı inceleyin</p>
                        <a href="#" class="btn-secondary">Görüntüle</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Diğer script dosyaları -->
    <script>
    document.getElementById('logoutBtn').addEventListener('click', function() {
        // Loading overlay oluştur
        const loadingOverlay = document.createElement('div');
        loadingOverlay.className = 'loading-overlay';
        loadingOverlay.innerHTML = `
            <div class="loading-content">
                <div class="spinner"></div>
                <div class="loading-text">Çıkış yapılıyor...</div>
            </div>
        `;
        document.body.appendChild(loadingOverlay);

        // Sayfa geçiş efekti
        document.body.classList.add('fade-out');
        
        // 2 saniye sonra çıkış yap
        setTimeout(() => {
            window.location.href = 'logout.php';
        }, 2000);
    });
    </script>
</body>
</html>