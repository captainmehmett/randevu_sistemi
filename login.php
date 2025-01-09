<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tc_no = $_POST['tcno'];
    $password = $_POST['password'];
    
    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE tc_no = ?");
        $stmt->execute([$tc_no]);
        
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Direkt şifre karşılaştırması (test için)
            if ($password === $user['password']) {
                // Oturum başlat
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['tc_no'] = $user['tc_no'];
                $_SESSION['name'] = $user['first_name'] . ' ' . $user['last_name'];
                
                echo json_encode(['success' => true]);
                exit;
            }
        }
        
        // Eğer buraya kadar geldiyse, giriş başarısız
        echo json_encode(['error' => 'TC Kimlik No veya şifre hatalı.']);
        exit;
        
    } catch(PDOException $e) {
        echo json_encode(['error' => 'Bir hata oluştu: ' . $e->getMessage()]);
        exit;
    }
}

// Normal sayfa yüklemesi için HTML içeriği...
?>



<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap - Randevu Sistemi</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <a href="#" class="back-button">
        <i class="fas fa-arrow-left"></i>
    </a>
    <div class="login-container">
        <div class="login-form">
            <div class="logo-container">
                <img src="images/sb_logo.png" alt="sb_logo">
                <img src="images/randevu_logo.png" alt="Randevu Logo">
            </div>

            <form id="loginForm" method="POST">
                <div class="form-group">
                    <label>T.C. Kimlik No</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" name="tcno" id="tcInput" placeholder="T.C. Kimlik Numaranızı Giriniz">
                    </div>
                    <span class="error-message" id="tcError"></span>
                </div>

                <div class="form-group">
                    <label>Parola</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="password" placeholder="Parolanızı Giriniz">
                        <span class="password-toggle">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn-giris">
                    <i class="fas fa-sign-in-alt"></i>
                    Giriş
                </button>

                <a href="register.php" class="btn-uye">
                    <i class="fas fa-user-plus"></i>
                    Üye Ol
                </a>

                <div class="forgot-password">
                    <a href="forgot-password.php">Parolamı Unuttum</a>
                </div>
            </form>

            <div class="contact-info">
                Soru ve sorunlarınız için <a href="mailto:hastane@randevu.gov.tr">hastane@randevu.gov.tr</a> adresimizi
                kullanarak bize ulaşabilirsiniz.
            </div>
        </div>
        <div class="login-image"></div>
    </div>

    <script src="login.js"></script>

</body>

</html>