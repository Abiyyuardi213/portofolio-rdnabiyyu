@extends('layouts.app')

@section('title', 'Tentang Saya - ' . ($profile->name ?? 'Abiyyu Ardilian'))

@section('content')
    @php
        $heroPhotos = collect();
        if ($profile?->photo) {
            $heroPhotos->push($profile->photo);
        }

        if ($profile?->photos?->count()) {
            $heroPhotos = $heroPhotos
                ->merge($profile->photos->pluck('path'))
                ->filter()
                ->unique()
                ->values();
        }
    @endphp

    <section class="hero-grid">
        <div class="hero-copy">
            <div class="pill">Hi, {{ $profile->name ?? 'Abiyyu' }} Here 👋</div>
            <h1><span class="muted-word">A</span> {{ $profile->role ?? 'IT Support & Web Developer' }} <span class="muted-word">who creates</span> digital experiences.</h1>
            <div class="hero-bio">{!! $profile->bio ?? 'Nama lengkap saya R. Abiyyu Ardi Lian Permadi. Saya adalah mahasiswa Teknik Informatika dari ITATS yang passionate dalam web development dan IT support.' !!}</div>
            <div class="hero-actions">
                <a href="#contact" class="btn-gradient">Hire Me!</a>
                <a href="{{ url('/portfolio') }}" class="btn-dark">See My Portfolio</a>
            </div>
        </div>
        <div class="hero-visual">
            <div class="pill status-pill hero-status">Available for work</div>
            <div class="pill hero-location"><i class="fas fa-location-dot"></i> {{ $profile->location ?? 'Surabaya' }}</div>
            <div class="floating-note left">
                <strong>{{ $profile->email ?? 'Email tersedia' }}</strong>
                Kontak dan identitas utama diambil dari data admin.
            </div>
            <div class="hero-photo">
                @if($heroPhotos->count())
                    <div class="profile-slideshow" data-profile-slideshow>
                        @foreach($heroPhotos as $index => $photo)
                            <img src="{{ asset($photo) }}" alt="{{ $profile->name ?? 'Profile Photo' }} {{ $index + 1 }}" class="{{ $index === 0 ? 'active' : '' }}">
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="floating-note right">
                <strong>{{ $profile->phone ?? 'Phone' }}</strong>
                {{ $profile->whatsapp ?? 'WhatsApp tersedia' }}
            </div>
        </div>
    </section>

    <div class="metric-strip">
        <div class="metric">
            <strong>90<span>%</span></strong>
            <span>Profile identity</span>
        </div>
        <div class="metric">
            <strong>{{ $profile?->location ? '200' : '00' }}<span>+</span></strong>
            <span>Active location</span>
        </div>
        <div class="metric">
            <strong>{{ now()->year }}</strong>
            <span>Email contact</span>
        </div>
        <div class="metric">
            <strong>{{ $profile?->whatsapp ? '80' : '00' }}<span>+</span></strong>
            <span>WhatsApp channel</span>
        </div>
    </div>

    <section id="about" class="split-section">
        <div class="split-title">
            <div class="pill">About impact</div>
            <h2>About identity and digital work.</h2>
            <p>Setiap informasi pada halaman ini dibaca langsung dari data profile yang diinputkan melalui admin.</p>
        </div>
        <div class="split-content">
            <div class="profile-strip">
                <div class="profile-strip-item">
                    <span class="profile-strip-index">01</span>
                    <span class="profile-strip-icon"><i class="fas fa-phone"></i></span>
                    <span class="profile-strip-label">Phone</span>
                    <span class="profile-strip-value">{{ $profile->phone ?? '+62 811 3017 176' }}</span>
                </div>
                <div class="profile-strip-item">
                    <span class="profile-strip-index">02</span>
                    <span class="profile-strip-icon"><i class="fab fa-whatsapp"></i></span>
                    <span class="profile-strip-label">WhatsApp</span>
                    <span class="profile-strip-value">{{ $profile->whatsapp ?? '0895 3970 43901' }}</span>
                </div>
                <div class="profile-strip-item">
                    <span class="profile-strip-index">03</span>
                    <span class="profile-strip-icon"><i class="fas fa-envelope"></i></span>
                    <span class="profile-strip-label">Email</span>
                    <span class="profile-strip-value">{{ $profile->email ?? 'abiyyuardilian213@gmail.com' }}</span>
                </div>
                <div class="profile-strip-item">
                    <span class="profile-strip-index">04</span>
                    <span class="profile-strip-icon"><i class="fas fa-location-dot"></i></span>
                    <span class="profile-strip-label">Location</span>
                    <span class="profile-strip-value">{{ $profile->location ?? 'Surabaya, Jawa Timur' }}</span>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="page-shell">
        <div class="contact-section">
            <div>
                <div class="pill">Contact</div>
                <h2>Berikan Saran Anda</h2>
                <p>Kami senang mendengar ide, kritik, atau masukan Anda untuk pengembangan lebih baik.</p>
            </div>
            <form action="/kirim-saran" method="POST">
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
                <button type="submit" class="btn-gradient">
                    <i class="fas fa-paper-plane"></i> Kirim Pesan
                </button>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('[data-profile-slideshow]').forEach((slideshow) => {
        const slides = Array.from(slideshow.querySelectorAll('img'));
        if (slides.length <= 1) return;

        let index = 0;
        setInterval(() => {
            slides[index].classList.remove('active');
            index = (index + 1) % slides.length;
            slides[index].classList.add('active');
        }, 3500);
    });
</script>
@endsection
