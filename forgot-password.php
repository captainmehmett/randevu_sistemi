<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifremi Unuttum - Randevu Sistemi</title>
    <link rel="stylesheet" href="forgot-password.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="forgot-container">
        <div class="forgot-form">
            <div class="logo-container">
                <img src="images/sb_logo.png" alt="sb_logo">
                <img src="images/randevu_logo.png" alt="Randevu Logo">
            </div>
            
            <form id="forgotForm">
                <div class="form-group">
                    <label>T.C. Kimlik No</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="tcInput" placeholder="T.C. Kimlik Numaranızı Giriniz">
                    </div>
                    <span class="error-message" id="tcError"></span>
                </div>

                <button type="submit" class="btn-reset">
                    <i class="fas fa-key"></i>
                    Şifremi Sıfırla
                </button>

               <!-- Giriş sayfasına dön linki -->
<div class="login-link">
    <a href="login.php">Giriş sayfasına dön</a>
</div>
            </form>
            
            <div class="contact-info">
                Soru ve sorunlarınız için <a href="mailto:hastane@randevu.gov.tr">hastane@randevu.gov.tr</a> adresimizi kullanarak bize ulaşabilirsiniz.
            </div>
        </div>
        <div class="forgot-image"></div>
    </div>

    <script src="forgot-password.js"></script>
</body>
</html> 