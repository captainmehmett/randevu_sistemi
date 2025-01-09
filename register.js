document.addEventListener('DOMContentLoaded', function() {
    // Parola göster/gizle fonksiyonu
    const togglePassword = document.querySelectorAll('.password-toggle');
    
    togglePassword.forEach(toggle => {
        toggle.addEventListener('click', function() {
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
    });

    // Form gönderme işlemi
    const form = document.getElementById('registerForm');
    
    if(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Form verilerini al
            const formData = new FormData();
            formData.append('tcno', document.getElementById('tcno').value);
            formData.append('name', document.getElementById('name').value);
            formData.append('surname', document.getElementById('surname').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('birthdate', document.getElementById('birthdate').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('password-confirm', document.getElementById('password-confirm').value);
            
            // AJAX isteği gönder
            fetch('register.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if(data.error) {
                    alert(data.error);
                } else if(data.success) {
                    // Loading overlay'i göster
                    const loadingOverlay = document.createElement('div');
                    loadingOverlay.className = 'loading-overlay';
                    loadingOverlay.innerHTML = `
                        <div class="loading-content">
                            <div class="spinner"></div>
                            <div class="loading-text">Üyeliğiniz oluşturuluyor...</div>
                        </div>
                    `;
                    document.body.appendChild(loadingOverlay);

                    // Sayfa geçiş efekti
                    document.body.classList.add('fade-out');
                    
                    setTimeout(() => {
                        window.location.href = 'login.php';
                    }, 2000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Bir hata oluştu!');
            });
        });
    }

    // Giriş linkini kontrol et
    const loginLink = document.querySelector('.login-link a');
    if(loginLink) {
        loginLink.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Loading overlay'i göster
            const loadingOverlay = document.createElement('div');
            loadingOverlay.className = 'loading-overlay';
            loadingOverlay.innerHTML = `
                <div class="loading-content">
                    <div class="spinner"></div>
                    <div class="loading-text">Giriş sayfasına yönlendiriliyorsunuz...</div>
                </div>
            `;
            document.body.appendChild(loadingOverlay);

            // Sayfa geçiş efekti
            document.body.classList.add('fade-out');
            
            setTimeout(() => {
                window.location.href = 'login.php';
            }, 2000);
        });
    }
});