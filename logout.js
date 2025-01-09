document.addEventListener('DOMContentLoaded', function() {
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
});