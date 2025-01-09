// Şifre görünürlüğü kontrolü için mevcut kod
document.querySelector('.password-toggle').addEventListener('click', function() {
    const input = this.previousElementSibling;
    const icon = this.querySelector('i');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});

// Tüm input alanlarını seç
const inputs = document.querySelectorAll('input');

// Her input için focus ve blur olaylarını ekle
inputs.forEach(input => {
    input.addEventListener('focus', function() {
        this.classList.add('input-valid'); // Yeşil çerçeve ekle
    });

    input.addEventListener('blur', function() {
        this.classList.remove('input-valid'); // Yeşil çerçeveyi kaldır
    });
});

// TC Kimlik kontrolü için özel kod
const tcInput = document.getElementById('tcInput');
const tcError = document.getElementById('tcError');

tcInput.addEventListener('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
    
    if (this.value.length < 10) {
        tcError.textContent = 'Lütfen Geçerli T.C. Kimlik No Giriniz.';
        tcError.style.display = 'block';
        this.classList.add('input-error'); // Kırmızı çerçeve ekle
        this.classList.remove('input-valid'); // Yeşil çerçeveyi kaldır
    } else {
        tcError.textContent = '';
        tcError.style.display = 'none';
        this.classList.remove('input-error'); // Kırmızı çerçeveyi kaldır
        this.classList.add('input-valid'); // Yeşil çerçeve ekle
    }
});

tcInput.addEventListener('keypress', function(e) {
    if (!/[0-9]/.test(e.key)) {
        e.preventDefault();
    }
});

// ... existing code ...

// Üye ol butonuna tıklandığında geçiş animasyonu
document.querySelector('.btn-uye').addEventListener('click', function(e) {
    e.preventDefault(); // Varsayılan yönlendirmeyi engelle
    
    document.body.classList.add('fade-out');
    
    setTimeout(() => {
        window.location.href = 'register.php';
    }, 500); // 500ms sonra yönlendirme yap
});

// Geri butonuna tıklandığında geçiş animasyonu
document.querySelector('.back-button').addEventListener('click', function(e) {
    e.preventDefault(); // Varsayılan yönlendirmeyi engelle
    
    document.body.classList.add('fade-out');
    
    setTimeout(() => {
        window.location.href = 'index.php';
    }, 500); // 500ms sonra yönlendirme yap
});

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    const tcInput = document.getElementById('tcInput');
    const tcError = document.getElementById('tcError');
    
    if(tcInput && tcError) {
        // Başlangıçta hata mesajını gizle
        tcError.style.display = 'none';
        
        // Input kontrolü
        tcInput.addEventListener('input', function(e) {
            // Sadece rakamları al ve 11 karakterle sınırla
            this.value = this.value.replace(/\D/g, '').slice(0, 11);
            
            // Hata mesajı kontrolü
            if (this.value.length !== 11) {
                tcError.style.display = 'block';
            } else {
                tcError.style.display = 'none';
            }
        });

        // Tuş basma kontrolü
        tcInput.addEventListener('keypress', function(e) {
            // Eğer 11 hane dolduysa hiçbir tuşa izin verme
            if (this.value.length >= 11) {
                e.preventDefault();
                return false;
            }
            
            // Sadece rakam girişine izin ver
            if (e.key < '0' || e.key > '9') {
                e.preventDefault();
                return false;
            }
        });

        // Kopyala-yapıştır kontrolü
        tcInput.addEventListener('paste', function(e) {
            e.preventDefault();
            let pastedText = (e.clipboardData || window.clipboardData).getData('text');
            pastedText = pastedText.replace(/\D/g, '').slice(0, 11);
            this.value = pastedText;
            
            // Hata mesajı kontrolü
            if (this.value.length !== 11) {
                tcError.style.display = 'block';
            } else {
                tcError.style.display = 'none';
            }
        });
    }
    
    if(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if(data.error) {
                    // Hata bildirimi göster
                    const notification = document.createElement('div');
                    notification.className = 'notification';
                    notification.innerHTML = `
                        <i class="fas fa-exclamation-circle"></i>
                        <span>TC Kimlik No veya Şifre hatalı!</span>
                    `;
                    document.body.appendChild(notification);

                    // 3 saniye sonra bildirimi kaldır
                    setTimeout(() => {
                        notification.remove();
                    }, 3000);
                } else if(data.success) {
                    // Loading overlay'i göster
                    const loadingOverlay = document.createElement('div');
                    loadingOverlay.className = 'loading-overlay';
                    loadingOverlay.innerHTML = `
                        <div class="loading-content">
                            <div class="spinner"></div>
                            <div class="loading-text">Yönlendiriliyor...</div>
                        </div>
                    `;
                    document.body.appendChild(loadingOverlay);

                    // Sayfa geçiş efekti
                    document.body.classList.add('fade-out');
                    
                    setTimeout(() => {
                        window.location.href = 'randevu.php';
                    }, 2000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Bir hata oluştu!');
            });
        });
    }
});