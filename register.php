<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tc_no = $_POST['tcno'];
    $first_name = $_POST['name'];
    $last_name = $_POST['surname'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birthdate'];
    
    // TC Kimlik kontrolü
    if (strlen($tc_no) != 11) {
        echo json_encode(['error' => 'Geçerli bir TC Kimlik numarası giriniz.']);
        exit;
    }
    
    // Şifre kontrolü
    if ($_POST['password'] !== $_POST['password-confirm']) {
        echo json_encode(['error' => 'Şifreler eşleşmiyor.']);
        exit;
    }
    
    try {
        // TC Kimlik kontrolü
        $check = $db->prepare("SELECT id FROM users WHERE tc_no = ?");
        $check->execute([$tc_no]);
        if ($check->rowCount() > 0) {
            echo json_encode(['error' => 'Bu TC Kimlik numarası zaten kayıtlı.']);
            exit;
        }
        
        // Yeni kullanıcı kaydı
        $stmt = $db->prepare("INSERT INTO users (tc_no, first_name, last_name, password, gender, birth_date) 
                             VALUES (?, ?, ?, ?, ?, ?)");
        
        $stmt->execute([
            $tc_no,
            $first_name,
            $last_name,
            $password,
            $gender,
            $birth_date
        ]);
        
        echo json_encode(['success' => 'Kayıt başarıyla tamamlandı.']);
        
    } catch(PDOException $e) {
        echo json_encode(['error' => 'Bir hata oluştu: ' . $e->getMessage()]);
    }
    exit;
}


?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Ol - Randevu Sistemi</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="register-container">
        <div class="register-form">
            <div class="logo-container">
                <img src="images/sb_logo.png" alt="sb_logo">
                <img src="images/randevu_logo.png" alt="Randevu Logo">
            </div>
            
            <form id="registerForm" method="POST" action="register.php">                <div class="form-group">
                    <label><span class="required">*</span>T.C. Kimlik No :</label>
                    <input type="text" 
                           id="tcno" 
                           name="tcno" 
                           required 
                           maxlength="11" 
                           minlength="11"
                           placeholder="T.C. Kimlik No"
                           onkeypress="return (event.charCode >= 48 && event.charCode <= 57) && this.value.length < 11">
                </div>
                
                <div class="form-group">
                    <label><span class="required">*</span>Ad :</label>
                    <input type="text" id="name" required placeholder="Ad">
                </div>

                <div class="form-group">
                    <label><span class="required">*</span>Soyad :</label>
                    <input type="text" id="surname" required placeholder="Soyad">
                </div>

                <div class="form-group">
                    <label><span class="required">*</span>Cinsiyet</label>
                    <select id="gender" required>
                        <option value="" disabled selected>Cinsiyet Seçiniz</option>
                        <option value="male">Erkek</option>
                        <option value="female">Kadın</option>
                    </select>
                </div>

                <div class="form-group">
                    <label><span class="required">*</span>Doğum Tarihi :</label>
                    <input type="date" id="birthdate" required placeholder="Doğum Tarihi">
                </div>
                
                <div class="form-group">
                    <label><span class="required">*</span>Parola :</label>
                    <input type="password" id="password" required placeholder="Parola">
                    <span class="password-toggle">
                        <i class="far fa-eye"></i>
                    </span>
                </div>

                <div class="form-group">
                    <label><span class="required">*</span>Parola Tekrar :</label>
                    <input type="password" id="password-confirm" required placeholder="Parola Tekrar">
                    <span class="password-toggle">
                        <i class="far fa-eye"></i>
                    </span>
                </div>
                
                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus"></i>
                    Üye Ol
                </button>

                <div class="login-link">
                    Zaten üye misiniz? <a href="login.php">Giriş yapın</a>
                </div>
            </form>
            
            <div class="contact-info">
                Soru ve sorunlarınız için <a href="mailto:hastane@randevu.gov.tr">hastane@randevu.gov.tr</a> adresimizi kullanarak bize ulaşabilirsiniz.
            </div>
        </div>
        <div class="register-image"></div>
    </div>

    <script src="register.js"></script>
</body>
</html>