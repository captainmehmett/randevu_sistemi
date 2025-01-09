// Scroll olduğunda navbar'ın görünümünü değiştir
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Mobil menü toggle
const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');

menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

// Scroll to Top fonksiyonları (mevcut kod)
const scrollTopBtn = document.getElementById('scrollTopBtn');

window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
        scrollTopBtn.classList.add('active');
    } else {
        scrollTopBtn.classList.remove('active');
    }
});

scrollTopBtn.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Sayaç Animasyonu için yeni kod
const stats = document.querySelector('.stats');
let started = false;

const countUp = (element, target) => {
    let count = 0;
    const duration = 2000;
    const step = target / (duration / 16);

    const updateCount = () => {
        count += step;
        if (count < target) {
            element.textContent = Math.floor(count);
            requestAnimationFrame(updateCount);
        } else {
            element.textContent = target;
        }
    };

    updateCount();
};


// Scroll olayını dinle
function checkStats() {
    if (isElementInViewport(stats) && !started) {
        const numbers = stats.querySelectorAll('.stat-item h3');
        numbers.forEach(num => {
            const target = parseInt(num.textContent);
            num.textContent = '0';
            countUp(num, target);
        });
        started = true;
    }
}

// Elementin viewport'ta olup olmadığını kontrol et
function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;
    
    // Elementin en az %30'u viewport'ta görünür olduğunda başlat
    return (
        rect.top <= (windowHeight * 0.7) && // Üst kısım viewport'un %70'inden önce
        rect.bottom >= windowHeight * 0.3    // Alt kısım viewport'un %30'undan sonra
    );
}

function checkStats() {
    if (isElementInViewport(stats) && !started) {
        const numbers = stats.querySelectorAll('.stat-item h3');
        numbers.forEach(num => {
            const target = parseInt(num.textContent);
            num.textContent = '0';
            countUp(num, target);
        });
        started = true;
    }
}

// Scroll event listener
window.addEventListener('scroll', checkStats);

// Sayfa yüklendiğinde de kontrol et
document.addEventListener('DOMContentLoaded', checkStats);

// Mobil cihazlar için touch eventi ekle
window.addEventListener('touchmove', checkStats);

// Pencere boyutu değiştiğinde de kontrol et
window.addEventListener('resize', checkStats);

const loadingOverlay = document.createElement('div');
loadingOverlay.className = 'loading-overlay';
loadingOverlay.innerHTML = `
    <div class="loading-content">
        <div class="spinner"></div>
        <div class="loading-text">Yönlendiriliyor...</div>
    </div>
`;
document.body.appendChild(loadingOverlay);

// Randevu butonuna tıklandığında
document.addEventListener('DOMContentLoaded', () => {
    const randevuBtn = document.querySelector('.randevu-btn');
    if (randevuBtn) {
        randevuBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const targetHref = randevuBtn.getAttribute('href');
            
            // Loading ekranını göster
            loadingOverlay.style.display = 'flex';
            setTimeout(() => {
                loadingOverlay.classList.add('fade-in');
            }, 10);

            // 1.5 saniye sonra yönlendir
            setTimeout(() => {
                loadingOverlay.classList.add('fade-out');
                setTimeout(() => {
                    window.location.href = targetHref;
                }, 300);
            }, 1500);
        });
    }
});