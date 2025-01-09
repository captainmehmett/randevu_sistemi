document.addEventListener('DOMContentLoaded', function() {
    const departmentSelect = document.getElementById('department');
    const doctorSelect = document.getElementById('doctor');
    const dateInput = document.getElementById('date');
    const timeSelect = document.getElementById('time');

    // Branş seçildiğinde doktorları güncelle
    departmentSelect.addEventListener('change', function() {
        updateDoctors(this.value);
    });

    // Tarih seçildiğinde müsait saatleri güncelle
    dateInput.addEventListener('change', function() {
        updateAvailableTimes(this.value);
    });

    // Form gönderildiğinde
    document.getElementById('appointmentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // Form doğrulama ve gönderme işlemleri
        submitForm();
    });
});

// Doktor listesini güncelle
function updateDoctors(department) {
    // API'den veya veritabanından doktorları çek
    // Örnek doktor listesi
    const doctors = {
        'ic-hastaliklari': ['Dr. Ahmet Yılmaz', 'Dr. Ayşe Demir'],
        'noroloji': ['Dr. Mehmet Kaya', 'Dr. Zeynep Şahin'],
        'ortopedi': ['Dr. Ali Öz', 'Dr. Fatma Yıldız']
    };

    const doctorSelect = document.getElementById('doctor');
    doctorSelect.innerHTML = '<option value="">Doktor Seçiniz</option>';

    if (doctors[department]) {
        doctors[department].forEach(doctor => {
            const option = document.createElement('option');
            option.value = doctor.toLowerCase().replace(' ', '-');
            option.textContent = doctor;
            doctorSelect.appendChild(option);
        });
    }
}

// Müsait saatleri güncelle
function updateAvailableTimes(date) {
    // API'den veya veritabanından müsait saatleri çek
    const timeSelect = document.getElementById('time');
    timeSelect.innerHTML = '<option value="">Randevu Saati Seçiniz</option>';

    // Örnek saat listesi
    const times = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '14:00', '14:30', '15:00', '15:30'];
    
    times.forEach(time => {
        const option = document.createElement('option');
        option.value = time;
        option.textContent = time;
        timeSelect.appendChild(option);
    });
}

// Form gönderme işlemi
function submitForm() {
    // Form verilerini al ve API'ye gönder
    // Başarılı olursa kullanıcıya bilgi ver
    alert('Randevunuz başarıyla oluşturuldu!');
}
// Sayfa yüklendiğinde
document.addEventListener('DOMContentLoaded', function() {
    // Loading ekranını göster ve içeriği gizle
    const loader = document.querySelector('.loader-container');
    const content = document.querySelector('.randevu-content');
    
    // Yapay bir yükleme süresi (2 saniye)
    setTimeout(() => {
        // Loading ekranını kaldır
        loader.style.opacity = '0';
        setTimeout(() => {
            loader.style.display = 'none';
            // İçeriği göster
            content.style.display = 'block';
            setTimeout(() => {
                content.classList.add('visible');
            }, 50);
        }, 500);
    }, 2000);

    // Diğer form işlemleri...
});