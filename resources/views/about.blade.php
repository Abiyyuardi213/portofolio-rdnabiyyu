@extends('layouts.app')

@section('title', 'Tentang Saya - ' . ($profile->name ?? 'Abiyyu Ardilian'))

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-image">
                <div class="slider-container">
                    <div class="slider-wrapper">
                        <div class="slider-track" id="sliderTrack">
                            <div class="slider-item">
                                <img src="{{ asset('image/profile1.jpg') }}" alt="Profile Picture 1">
                            </div>
                            <div class="slider-item">
                                <img src="{{ asset('image/profile2.jpg') }}" alt="Profile Picture 2">
                            </div>
                            <div class="slider-item">
                                <img src="{{ asset('image/profile3.jpg') }}" alt="Profile Picture 3">
                            </div>
                        </div>
                    </div>
                    <button class="slider-arrow prev" id="prevBtn"><i class="fas fa-chevron-left"></i></button>
                    <button class="slider-arrow next" id="nextBtn"><i class="fas fa-chevron-right"></i></button>
                    <div class="slider-controls" id="sliderControls"></div>
                </div>
            </div>
            <div class="hero-content">
                <h1>{{ $profile->name ?? 'R. Abiyyu Ardi Lian P' }}</h1>
                <p>{{ $profile->role ?? 'IT Support & Web Developer' }}</p>
                <div class="hero-buttons">
                    <a href="{{ url('/portfolio') }}" class="btn btn-primary">
                        <i class="fas fa-briefcase"></i> Lihat Portfolio
                    </a>
                    <a href="#contact" class="btn btn-secondary">Hubungi Saya</a>
                </div>
                <div class="social-icons">
                    @if($profile->github ?? false)
                    <a href="{{ $profile->github }}" class="social-icon" target="_blank" title="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                    @endif
                    @if($profile->linkedin ?? false)
                    <a href="{{ $profile->linkedin }}" class="social-icon" target="_blank" title="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    @endif
                    @if($profile->instagram ?? false)
                    <a href="{{ $profile->instagram }}" class="social-icon" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <h2 class="section-title">Tentang Saya</h2>
        <div class="cards-grid">
            <div class="card fade-in delay-1">
                <h3><i class="fas fa-user me-2"></i>Informasi Pribadi</h3>
                <div class="card-list">
                    <li><i class="fas fa-phone"></i> {{ $profile->phone ?? '+62 811 3017 176' }}</li>
                    <li><i class="fab fa-whatsapp"></i> {{ $profile->whatsapp ?? '0895 3970 43901' }}</li>
                    <li><i class="fas fa-envelope"></i> {{ $profile->email ?? 'abiyyuardilian213@gmail.com' }}</li>
                    <li><i class="fas fa-map-marker-alt"></i> {{ $profile->location ?? 'Surabaya, Jawa Timur' }}</li>
                </div>
            </div>
            <div class="card fade-in delay-2">
                <h3><i class="fas fa-info-circle"></i>Tentang Diri</h3>
                <p>{{ $profile->bio ?? 'Nama lengkap saya R. Abiyyu Ardi Lian Permadi. Saya adalah mahasiswa Teknik Informatika dari ITATS yang passionate dalam web development dan IT support.' }}</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="contact-section">
            <h2><i class="fas fa-lightbulb"></i> Berikan Saran Anda</h2>
            <p>Kami senang mendengar ide, kritik, atau masukan Anda untuk pengembangan lebih baik.</p>
            <form action="/kirim-saran" method="POST" style="margin-top: 2rem; max-width: 600px;">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" placeholder="Contoh: Abiyyu Ardilian" required>
                </div>
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" placeholder="nama@email.com" required>
                </div>
                <div class="form-group">
                    <label for="pesan">Masukan atau Saran</label>
                    <textarea id="pesan" name="pesan" placeholder="Tulis masukan Anda di sini..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> Kirim Pesan
                </button>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    const sliderTrack = document.getElementById('sliderTrack');
    const sliderControls = document.getElementById('sliderControls');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slider-item');
    const totalSlides = slides.length;

    if (totalSlides > 0) {
        // Create slider dots
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('button');
            dot.classList.add('slider-dot');
            if (i === 0) dot.classList.add('active');
            dot.addEventListener('click', () => goToSlide(i));
            sliderControls.appendChild(dot);
        }

        const dots = document.querySelectorAll('.slider-dot');

        function updateSlider() {
            sliderTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlider();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlider();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateSlider();
        }

        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);

        // Auto-slide every 5 seconds
        setInterval(nextSlide, 5000);
    }
</script>
@endsection
