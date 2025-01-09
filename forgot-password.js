document.addEventListener('DOMContentLoaded', function() {
    const tcInput = document.getElementById('tcInput');
    const tcError = document.getElementById('tcError');

    // TC Kimlik alanına maksimum 10 karakter sınırı
    tcInput.setAttribute('maxlength', '10');

    // Sadece rakam girişine izin ver
    tcInput.addEventListener('keypress', function(e) {
        if (!/[0-9]/.test(e.key)) {
            e.preventDefault();
        }
    });

    // Input değeri değiştiğinde kontrol et
    tcInput.addEventListener('input', function() {
        // Rakam dışındaki karakterleri temizle
        this.value = this.value.replace(/[^0-9]/g, '');
        
        // 10 haneli TC kontrolü
        if (this.value.length !== 10) {
            tcError.textContent = 'Lütfen Geçerli T.C. Kimlik No Giriniz.';
            tcError.style.display = 'block';
        } else {
            tcError.textContent = '';
            tcError.style.display = 'none';
        }
    });

    // Form gönderimi
    document.getElementById('forgotForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (tcInput.value.length !== 10) {
            tcError.textContent = 'Lütfen Geçerli T.C. Kimlik No Giriniz.';
            tcError.style.display = 'block';
            return;
        }

        // Şifre sıfırlama işlemleri buraya gelecek
        console.log('Şifre sıfırlama talebi gönderildi');
    });

    // Giriş sayfasına dön linki için animasyon
    document.querySelector('.login-link a').addEventListener('click', function(e) {
        e.preventDefault();
        
        document.body.classList.add('fade-out');
        
        setTimeout(() => {
            window.location.href = 'login.php';
        }, 500);
    });
}); 