@extends('layouts.app')

@section('title', ($profile->name ?? 'Abiyyu Ardilian') . ' - Fullstack Developer & Project Manager')

@section('content')

    {{-- 1. HERO SECTION (Split Left Content & Right Profile Photo) --}}
    <section class="relative pt-10 pb-16 md:pt-16 md:pb-24 overflow-hidden bg-white">
        {{-- Subtle background decoration --}}
        <div class="absolute top-1/3 left-1/4 w-[500px] h-[500px] bg-blue-50/70 rounded-full blur-3xl -z-10 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                {{-- Left Column: Teks, Headline, Bio, Dual CTA (Rata Kiri) --}}
                <div class="lg:col-span-7 flex flex-col items-start text-left">
                    
                    {{-- Status Pill Badge --}}
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border border-blue-100 bg-blue-50/80 text-blue-700 text-xs font-semibold mb-6 shadow-xs">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                        <span>Tersedia untuk Pekerjaan Full-time / Kontrak / Remote</span>
                    </div>

                    {{-- Main Headline --}}
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-slate-900 tracking-tight leading-[1.15]">
                        Solusi IT Terpadu, Dukungan Sistem &amp; Web yang Siap Kerja
                    </h1>

                    {{-- Subheadline / Bio --}}
                    <p class="mt-5 text-base sm:text-lg text-slate-600 leading-relaxed max-w-2xl">
                        Halo, saya <span class="text-slate-900 font-semibold">{{ $profile->name ?? 'R. Abiyyu Ardi Lian Permadi' }}</span>. Profesional Informatika dengan fokus pada Fullstack Web &amp; Mobile Development, arsitektur database, serta manajemen proyek teknologi informasi yang terstruktur.
                    </p>

                    {{-- Dual Call to Action Buttons --}}
                    <div class="mt-8 flex flex-wrap items-center gap-3 w-full sm:w-auto">
                        <a href="{{ url('/contact') }}"
                           class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold transition-all shadow-lg shadow-blue-600/20">
                            <i class="fab fa-whatsapp text-base"></i> Hubungi / Diskusi Cepat
                        </a>
                        <a href="#keahlian"
                           class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 text-sm font-semibold transition-all">
                            Jelajahi Bidang Keahlian <i class="fas fa-arrow-down text-xs text-slate-400"></i>
                        </a>
                    </div>

                    {{-- Sector / Focus Strip (5 Sektor) --}}
                    <div class="mt-10 pt-6 border-t border-slate-100 flex flex-wrap items-center gap-2 text-xs font-semibold text-slate-600">
                        <span class="text-slate-400 uppercase tracking-wider text-[11px] mr-1">Fokus:</span>
                        <span class="px-3 py-1.5 rounded-md bg-slate-50 border border-slate-200/60">IT Support &amp; Maintenance</span>
                        <span class="px-3 py-1.5 rounded-md bg-slate-50 border border-slate-200/60">Pengembangan Web (Laravel)</span>
                        <span class="px-3 py-1.5 rounded-md bg-slate-50 border border-slate-200/60">Database &amp; SQL</span>
                        <span class="px-3 py-1.5 rounded-md bg-slate-50 border border-slate-200/60">Jaringan &amp; Hardware</span>
                    </div>

                </div>

                {{-- Right Column: Foto Profil Bersih Tanpa Frame / Layer Belakang --}}
                <div class="lg:col-span-5 flex justify-center lg:justify-end items-center">
                    <img src="{{ asset('image/profil.png') }}" 
                         alt="{{ $profile->name ?? 'R. Abiyyu Ardi Lian Permadi' }}" 
                         class="w-full max-w-[280px] sm:max-w-[320px] md:max-w-[340px] h-auto object-contain select-none pointer-events-none drop-shadow-md">
                </div>

            </div>
        </div>
    </section>

    {{-- 2. TECH STACK MARQUEE ANIMATION (Sama Persis Animasi Berjalan Merbabudev) --}}
    @php
        $techSkills = [
            ['name' => 'C++', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg'],
            ['name' => 'Golang', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original.svg'],
            ['name' => 'RUST', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/rust/rust-original.svg'],
            ['name' => 'Node JS', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg'],
            ['name' => 'JavaScript', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg'],
            ['name' => 'PHP', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg'],
            ['name' => 'Laravel', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg'],
            ['name' => 'HTML5', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg'],
            ['name' => 'Java', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg'],
            ['name' => 'Kotlin', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kotlin/kotlin-original.svg'],
            ['name' => 'Python', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg'],
            ['name' => 'TypeScript', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg'],
            ['name' => 'Alpine JS', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/alpinejs/alpinejs-original.svg'],
            ['name' => 'Bootstrap', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['name' => 'CodeIgniter', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/codeigniter/codeigniter-plain.svg'],
            ['name' => 'Flutter', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg'],
            ['name' => 'React Native', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg'],
            ['name' => 'Vue JS', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg'],
            ['name' => 'Apache', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apache/apache-original.svg'],
            ['name' => 'Nginx', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nginx/nginx-original.svg'],
            ['name' => 'MySQL', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg'],
            ['name' => 'PostgreSQL', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg'],
            ['name' => 'Canva', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/canva/canva-original.svg'],
            ['name' => 'SketchUp', 'logo' => 'https://cdn.simpleicons.org/sketchup/005F9E'],
            ['name' => 'GitLab', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/gitlab/gitlab-original.svg'],
            ['name' => 'GitHub', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg'],
            ['name' => 'Tailwind CSS', 'logo' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-original.svg'],
        ];

        // Membagi 2 baris agar tampil megah seperti di website modern
        $row1 = array_slice($techSkills, 0, 14);
        $row2 = array_slice($techSkills, 14);
    @endphp

    <section class="py-14 bg-slate-50/70 border-y border-slate-200/80 overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 text-center">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">
                Teknologi, Bahasa &amp; Alat yang Dikuasai
            </p>
            <h2 class="text-xl md:text-2xl font-bold text-slate-900 mt-1">Tech Stack &amp; Software Proficiency</h2>
        </div>

        {{-- Gradient Masking Kiri & Kanan (Fade out effect) --}}
        <div class="absolute left-0 top-0 bottom-0 w-20 md:w-36 bg-gradient-to-r from-slate-50 to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-20 md:w-36 bg-gradient-to-l from-slate-50 to-transparent z-10 pointer-events-none"></div>

        <div class="space-y-4">
            {{-- Marquee Baris 1: Geser ke Kiri --}}
            <div class="flex overflow-hidden select-none">
                <div class="animate-marquee flex items-center gap-4">
                    {{-- Loop set 1 --}}
                    @foreach($row1 as $tech)
                        <div class="inline-flex items-center gap-3 px-4 py-2.5 rounded-xl bg-white border border-slate-200/90 shadow-xs hover:border-blue-400 hover:shadow-md transition-all duration-200 shrink-0">
                            <img src="{{ $tech['logo'] }}" alt="{{ $tech['name'] }}" class="w-6 h-6 object-contain" loading="lazy">
                            <span class="text-xs font-bold text-slate-800 whitespace-nowrap">{{ $tech['name'] }}</span>
                        </div>
                    @endforeach
                    {{-- Loop set 2 (duplikat untuk loop mulus) --}}
                    @foreach($row1 as $tech)
                        <div class="inline-flex items-center gap-3 px-4 py-2.5 rounded-xl bg-white border border-slate-200/90 shadow-xs hover:border-blue-400 hover:shadow-md transition-all duration-200 shrink-0">
                            <img src="{{ $tech['logo'] }}" alt="{{ $tech['name'] }}" class="w-6 h-6 object-contain" loading="lazy">
                            <span class="text-xs font-bold text-slate-800 whitespace-nowrap">{{ $tech['name'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Marquee Baris 2: Geser ke Kanan --}}
            <div class="flex overflow-hidden select-none">
                <div class="animate-marquee-reverse flex items-center gap-4">
                    {{-- Loop set 1 --}}
                    @foreach($row2 as $tech)
                        <div class="inline-flex items-center gap-3 px-4 py-2.5 rounded-xl bg-white border border-slate-200/90 shadow-xs hover:border-blue-400 hover:shadow-md transition-all duration-200 shrink-0">
                            <img src="{{ $tech['logo'] }}" alt="{{ $tech['name'] }}" class="w-6 h-6 object-contain" loading="lazy">
                            <span class="text-xs font-bold text-slate-800 whitespace-nowrap">{{ $tech['name'] }}</span>
                        </div>
                    @endforeach
                    {{-- Loop set 2 (duplikat untuk loop mulus) --}}
                    @foreach($row2 as $tech)
                        <div class="inline-flex items-center gap-3 px-4 py-2.5 rounded-xl bg-white border border-slate-200/90 shadow-xs hover:border-blue-400 hover:shadow-md transition-all duration-200 shrink-0">
                            <img src="{{ $tech['logo'] }}" alt="{{ $tech['name'] }}" class="w-6 h-6 object-contain" loading="lazy">
                            <span class="text-xs font-bold text-slate-800 whitespace-nowrap">{{ $tech['name'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Sub-bar Pengalaman Perusahaan & Institusi (Data Statis dengan Logo) --}}
        @php
            $companies = [
                [
                    'name' => 'PT. TPPI',
                    'sub' => 'Trans Pacific Petrochemical Indotama',
                    'logo' => asset('image/tppi.png'),
                ],
                [
                    'name' => 'PT. KAI',
                    'sub' => 'Kereta Api Indonesia',
                    'logo' => asset('image/kai.png'),
                ],
                [
                    'name' => 'ITATS',
                    'sub' => 'Institut Teknologi Adhi Tama Surabaya',
                    'logo' => asset('image/itats.png'),
                ],
                [
                    'name' => 'PT. Garuda Lintas Nusa',
                    'sub' => 'Logistics & Supply Chain',
                    'logo' => asset('image/GLN.png'),
                ],
                [
                    'name' => 'PT. Cahaya Smelter Indonesia',
                    'sub' => 'Smelting & Mineral Processing',
                    'logo' => asset('image/CSI-removebg-preview.png'),
                ],
                [
                    'name' => 'PT. Surabaya Jersey',
                    'sub' => 'SUB Jersey Apparel',
                    'logo' => asset('image/sub.jpeg'),
                ],
                [
                    'name' => 'PT. Samudera Indonesia',
                    'sub' => 'Shipping & Logistics',
                    'logo' => asset('image/samudera.png'),
                ],
            ];
        @endphp

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-8 border-t border-slate-200/60">
            <p class="text-center text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-6">
                Pengalaman di Perusahaan &amp; Institusi
            </p>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-7 gap-4 items-stretch justify-center">
                @foreach($companies as $comp)
                    <div class="p-3.5 rounded-xl bg-white border border-slate-200/80 shadow-2xs hover:border-blue-400 hover:shadow-md transition-all duration-200 flex flex-col items-center justify-center text-center group">
                        <div class="h-10 w-full flex items-center justify-center mb-2 px-1">
                            <img src="{{ $comp['logo'] }}" alt="{{ $comp['name'] }}" class="max-h-9 max-w-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300">
                        </div>
                        <span class="block text-xs font-bold text-slate-800 leading-tight">{{ $comp['name'] }}</span>
                        <span class="text-[10px] text-slate-500 line-clamp-1 mt-0.5 leading-tight" title="{{ $comp['sub'] }}">{{ $comp['sub'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 3. BIDANG KEAHLIAN / SERVICES (Grid Kartu Serupa Merbabudev 6 Layanan) --}}
    <section id="keahlian" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">Keahlian &amp; Layanan Teknis</h2>
                <p class="mt-3 text-base text-slate-600">
                    Kombinasi komprehensif antara pengembangan perangkat lunak, manajemen data, komunikasi publik, keselamatan operasional, dan pengelolaan proyek.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                {{-- 1. Web Application Development --}}
                <div class="p-8 rounded-2xl border border-slate-200 bg-white hover:border-blue-400 hover:shadow-lg transition-all duration-200 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-6">
                            <i class="fas fa-code text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Web Application Development</h3>
                        <p class="text-sm text-slate-600 leading-relaxed mb-6">
                            Pengembangan aplikasi web berbasis framework modern (Laravel, PHP, Vue/Alpine JS) dengan arsitektur terstruktur, cepat, aman, dan mudah diskalakan.
                        </p>
                        <ul class="space-y-2.5 text-xs text-slate-700 font-medium">
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-600"></i> Full-stack Laravel, Blade, &amp; Tailwind CSS
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-600"></i> Integrasi RESTful API &amp; sistem autentikasi
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8 pt-4 border-t border-slate-100">
                        <a href="{{ url('/portfolio') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1.5">
                            Lihat Studi Kasus Project <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                {{-- 2. Mobile Application Development --}}
                <div class="p-8 rounded-2xl border border-slate-200 bg-white hover:border-blue-400 hover:shadow-lg transition-all duration-200 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-6">
                            <i class="fas fa-mobile-screen-button text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Mobile Application Development</h3>
                        <p class="text-sm text-slate-600 leading-relaxed mb-6">
                            Perancangan dan pengembangan aplikasi mobile cross-platform menggunakan Flutter dan React Native dengan antarmuka responsif dan performa tinggi.
                        </p>
                        <ul class="space-y-2.5 text-xs text-slate-700 font-medium">
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-600"></i> Pengembangan aplikasi Flutter &amp; React Native
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-600"></i> Integrasi API backend &amp; offline storage
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8 pt-4 border-t border-slate-100">
                        <a href="{{ url('/portfolio') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1.5">
                            Lihat Portfolio Aplikasi <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                {{-- 3. Database & Manajemen Data --}}
                <div class="p-8 rounded-2xl border border-slate-200 bg-white hover:border-blue-400 hover:shadow-lg transition-all duration-200 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-6">
                            <i class="fas fa-database text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Database &amp; Manajemen Data</h3>
                        <p class="text-sm text-slate-600 leading-relaxed mb-6">
                            Perancangan skema relasional, optimasi query SQL (MySQL, PostgreSQL), serta manajemen backup, restore, dan integritas data secara berkala.
                        </p>
                        <ul class="space-y-2.5 text-xs text-slate-700 font-medium">
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-600"></i> Desain skema relasional &amp; normalisasi data
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-600"></i> Pemeliharaan integritas &amp; keamanan basis data
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8 pt-4 border-t border-slate-100">
                        <a href="{{ url('/skills') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1.5">
                            Lihat Keahlian Database <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                {{-- 4. Komunikasi & Public Relation --}}
                <div class="p-8 rounded-2xl border border-slate-200 bg-white hover:border-blue-400 hover:shadow-lg transition-all duration-200 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center mb-6">
                            <i class="fas fa-comments text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Komunikasi &amp; Public Relation</h3>
                        <p class="text-sm text-slate-600 leading-relaxed mb-6">
                            Penyampaian informasi teknis secara lugas kepada pengguna non-teknis, koordinasi publikasi, dan pengalaman menangani relasi publik di BUMN (PT KAI).
                        </p>
                        <ul class="space-y-2.5 text-xs text-slate-700 font-medium">
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-600"></i> Pelayanan pengguna &amp; penanganan keluhan pelanggan
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-600"></i> Koordinasi tim publikasi &amp; citra positif perusahaan
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8 pt-4 border-t border-slate-100">
                        <a href="{{ url('/experience') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1.5">
                            Pengalaman di PT KAI <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                {{-- 5. K3 & Prosedur Operasional --}}
                <div class="p-8 rounded-2xl border border-slate-200 bg-white hover:border-blue-400 hover:shadow-lg transition-all duration-200 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center mb-6">
                            <i class="fas fa-shield-halved text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">K3 &amp; Prosedur Operasional</h3>
                        <p class="text-sm text-slate-600 leading-relaxed mb-6">
                            Disiplin tinggi terhadap SOP dan standar keselamatan kerja (HSE), terlatih di industri petrokimia (PT TPPI) yang membutuhkan presisi dan kewaspadaan tinggi.
                        </p>
                        <ul class="space-y-2.5 text-xs text-slate-700 font-medium">
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-600"></i> Kepatuhan terhadap regulasi keselamatan kerja (HSE)
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-600"></i> Ketelitian dokumentasi teknis &amp; laporan inspeksi
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8 pt-4 border-t border-slate-100">
                        <a href="{{ url('/experience') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1.5">
                            Pengalaman di PT TPPI <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                {{-- 6. Manajemen Proyek --}}
                <div class="p-8 rounded-2xl border border-slate-200 bg-white hover:border-blue-400 hover:shadow-lg transition-all duration-200 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-6">
                            <i class="fas fa-diagram-project text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Manajemen Proyek</h3>
                        <p class="text-sm text-slate-600 leading-relaxed mb-6">
                            Perencanaan, alokasi sumber daya, monitoring milestone pengembangan sistem, dan koordinasi tim teknis agar rilis proyek tepat waktu dan sesuai spesifikasi.
                        </p>
                        <ul class="space-y-2.5 text-xs text-slate-700 font-medium">
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-600"></i> Manajemen timeline, sprint, &amp; pembagian tugas tim
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-600"></i> Quality control &amp; pemeliharaan standar deliverable
                            </li>
                        </ul>
                    </div>
                    <div class="mt-8 pt-4 border-t border-slate-100">
                        <a href="{{ url('/portfolio') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1.5">
                            Lihat Implementasi Proyek <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- 4. WHY US / KENAPA SAYA? (Split 2 Kolom Persis Merbabudev dengan Terminal Gelap di Kanan) --}}
    <section id="kenapa-saya" class="py-20 bg-slate-50 border-y border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                {{-- Kolom Kiri: 3 Keunggulan Pribadi Bernomor (01, 02, 03) --}}
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight leading-tight">
                        Dedikasi, Keandalan &amp; Etos Kerja Saya
                    </h2>
                    <p class="mt-4 text-base text-slate-600 leading-relaxed">
                        Prinsip kerja profesional yang saya pegang teguh: berfokus pada penyelesaian masalah nyata, kestabilan sistem, ketelitian teknis, serta komunikasi yang transparan.
                    </p>

                    <div class="mt-8 space-y-6">
                        {{-- Poin 01 --}}
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-700 font-bold flex items-center justify-center shrink-0 text-sm">
                                01
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-slate-900">Solutif &amp; Berorientasi Hasil</h3>
                                <p class="text-sm text-slate-600 mt-1">
                                    Saya terbiasa mendiagnosa akar permasalahan secara mandiri dan cepat, memastikan setiap kendala teknis maupun kebutuhan sistem terselesaikan tuntas tanpa menunda operasional.
                                </p>
                            </div>
                        </div>

                        {{-- Poin 02 --}}
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-700 font-bold flex items-center justify-center shrink-0 text-sm">
                                02
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-slate-900">Adaptif &amp; Cepat Menguasai Hal Baru</h3>
                                <p class="text-sm text-slate-600 mt-1">
                                    Memiliki rasa ingin tahu tinggi dan kemauan belajar yang kuat, memungkinkan saya cepat menguasai alur kerja baru, teknologi mutakhir, maupun sistem lama (*legacy*) yang ada.
                                </p>
                            </div>
                        </div>

                        {{-- Poin 03 --}}
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-700 font-bold flex items-center justify-center shrink-0 text-sm">
                                03
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-slate-900">Kedisiplinan &amp; Pengalaman Industri Nyata</h3>
                                <p class="text-sm text-slate-600 mt-1">
                                    Pengalaman bertugas di industri berat dengan standar K3 ketat (PT TPPI) serta BUMN pelayanan publik (PT KAI) membentuk etos kerja disiplin, teliti, dan bertanggung jawab penuh.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Kartu Terminal Gelap (Sama seperti Merbabudev Terminal) --}}
                <div class="rounded-2xl bg-slate-900 p-7 text-white shadow-xl border border-slate-800">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-800 mb-6">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-rose-500"></span>
                            <span class="w-3 h-3 rounded-full bg-amber-500"></span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                        </div>
                        <span class="text-xs font-mono text-slate-400">abiyyu@profile-terminal:~$</span>
                    </div>

                    <div class="space-y-4 font-mono text-xs">
                        <div>
                            <span class="text-emerald-400">$</span> <span class="text-slate-300">abiyyu --status</span>
                            <p class="text-slate-400 mt-1">Ready for full-time &amp; project opportunities.</p>
                        </div>

                        <div>
                            <span class="text-emerald-400">$</span> <span class="text-slate-300">abiyyu --stack</span>
                            <p class="text-blue-400 mt-1">PHP, Laravel, MySQL, Tailwind CSS, JS, Hardware &amp; LAN Support.</p>
                        </div>

                        <div>
                            <span class="text-emerald-400">$</span> <span class="text-slate-300">abiyyu --location</span>
                            <p class="text-slate-400 mt-1">Surabaya, Jawa Timur, Indonesia (Open to Relocation/Remote).</p>
                        </div>
                    </div>

                    {{-- Metric Counters di dalam card --}}
                    <div class="grid grid-cols-2 gap-4 mt-8 pt-6 border-t border-slate-800">
                        <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/50">
                            <div class="text-3xl font-bold text-blue-400">{{ $stats['projects'] ?? 1 }}+</div>
                            <div class="text-xs text-slate-400 mt-1">Sistem &amp; Project Rilis</div>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/50">
                            <div class="text-3xl font-bold text-white">{{ $stats['experiences'] ?? 2 }}</div>
                            <div class="text-xs text-slate-400 mt-1">Pengalaman Industri</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- 5. PORTFOLIO SHOWCASE (Kartu 3 Kolom dengan Screenshot & Badge Kategori Ganda) --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">Koleksi Project &amp; Karya</h2>
                    <p class="mt-3 text-base text-slate-600">
                        Aplikasi dan sistem yang telah dibangun dengan fokus kemudahan pengguna dan keandalan sistem.
                    </p>
                </div>
                <a href="{{ url('/portfolio') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-700">
                    Lihat Semua Project <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if(isset($projects) && $projects->count() > 0)
                    @foreach($projects as $project)
                        <div class="group rounded-2xl border border-slate-200 bg-white overflow-hidden hover:border-slate-300 hover:shadow-lg transition-all duration-200 flex flex-col justify-between">
                            <div>
                                <div class="relative h-48 bg-slate-100 overflow-hidden">
                                    @if($project->image)
                                        <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-400">
                                            <i class="fas fa-laptop-code text-4xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-6">
                                    <div class="flex flex-wrap items-center gap-2 mb-3">
                                        <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold">Web System</span>
                                        <span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold">{{ $project->tags ?: 'Laravel' }}</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                                        {{ $project->title }}
                                    </h3>
                                    <p class="text-sm text-slate-600 mt-2 line-clamp-3 leading-relaxed">
                                        {!! strip_tags($project->description) !!}
                                    </p>
                                </div>
                            </div>
                            <div class="p-6 pt-0">
                                @if($project->link)
                                    <a href="{{ $project->link }}" target="_blank" class="inline-flex items-center gap-2 text-xs font-bold text-blue-600 hover:text-blue-700">
                                        Kunjungi Aplikasi Langsung <i class="fas fa-external-link-alt text-[10px]"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section>

    {{-- 6. PENGALAMAN KERJA HIGHLIGHT (2 Pengalaman dengan Durasi Kerja Terlama) --}}
    @php
        $longestExperiences = [
            [
                'company' => 'PT. Kereta Api Indonesia (Persero)',
                'role' => 'Staff Operasional',
                'work_type' => 'On-Site',
                'period' => 'Mei 2022 - April 2024',
                'duration' => '2 Tahun',
                'logo' => asset('image/kai.png'),
                'descriptions' => [
                    'Mendukung operasional harian stasiun dan perjalanan kereta api guna menjamin ketepatan waktu, keteraturan alur penumpang, dan keselamatan operasional.',
                    'Mengkoordinasikan alur informasi antar pos operasional, kru kereta api, dan bagian pengatur perjalanan kereta api (PPKA).',
                    'Memantau kepatuhan standar pelayanan minimum (SPM) dan SOP keselamatan di stasiun operasional Daerah Operasi 8 Surabaya.',
                    'Menangani kendala operasional lapangan secara tanggap dan menyusun laporan evaluasi harian perjalanan dinas.'
                ]
            ],
            [
                'company' => 'ITATS (Institut Teknologi Adhi Tama Surabaya)',
                'role' => 'Staff Wakil Rektor 1 (Bidang Akademik & Kemahasiswaan)',
                'work_type' => 'On-Site',
                'period' => 'Agt 2024 - Juli 2026',
                'duration' => '2 Tahun',
                'logo' => asset('image/itats.png'),
                'descriptions' => [
                    'Membantu penyusunan, pengelolaan, dan validasi data administrasi akademik, kalender perkuliahan, serta kurikulum seluruh program studi.',
                    'Mengelola integrasi data sistem informasi akademik (SIAKAD) dan pelaporan pangkalan data pendidikan tinggi (PDDikti).',
                    'Mendukung koordinasi kegiatan penjaminan mutu akademik, evaluasi beban kerja dosen, dan program beasiswa kemahasiswaan.',
                    'Memfasilitasi surat-menyurat resmi, surat keputusan rektor, serta koordinasi teknis pelaksanaan wisuda dan yudisium.'
                ]
            ],
        ];
    @endphp

    <section class="py-20 bg-slate-50 border-t border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">Jejak Pengalaman Profesional</h2>
                    <p class="mt-3 text-base text-slate-600">
                        Sorotan pengalaman kerja dengan dedikasi dan rekam jejak pengabdian terlama.
                    </p>
                </div>
                <a href="{{ url('/experience') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-700">
                    Lihat Seluruh 13 Pengalaman Kerja <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($longestExperiences as $exp)
                    <div class="p-8 rounded-2xl border border-slate-200 bg-white hover:border-blue-400 hover:shadow-lg transition-all duration-200 flex flex-col justify-between">
                        <div>
                            <div class="flex items-start justify-between gap-3 mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-center p-2 shrink-0">
                                        <img src="{{ $exp['logo'] }}" alt="{{ $exp['company'] }}" class="w-full h-full object-contain">
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-slate-900 leading-snug">{{ $exp['role'] }}</h3>
                                        <p class="text-xs font-semibold text-blue-600 mt-0.5">{{ $exp['company'] }}</p>
                                    </div>
                                </div>
                                <span class="px-2.5 py-1 rounded-md bg-blue-100/70 text-blue-700 text-xs font-bold shrink-0">
                                    {{ $exp['duration'] }}
                                </span>
                            </div>

                            <div class="flex items-center gap-2 mb-4">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold {{ $exp['work_type'] === 'On-Site' ? 'bg-amber-50 text-amber-700 border border-amber-200/60' : 'bg-emerald-50 text-emerald-700 border border-emerald-200/60' }}">
                                    {{ $exp['work_type'] }}
                                </span>
                                <span class="px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 text-[11px] font-semibold">
                                    <i class="fas fa-calendar-alt text-[10px] mr-1"></i> {{ $exp['period'] }}
                                </span>
                            </div>

                            <ul class="space-y-2.5 text-xs sm:text-sm text-slate-600 leading-relaxed">
                                @foreach($exp['descriptions'] as $desc)
                                    <li class="flex items-start gap-2">
                                        <i class="fas fa-check text-blue-600 mt-1 shrink-0 text-[10px]"></i>
                                        <span>{{ $desc }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 7. FAQ ACCORDION (Sama Persis Struktur Merbabudev) --}}
    <section id="faq" class="py-20 bg-white border-t border-slate-200/80">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">Pertanyaan yang Sering Diajukan (FAQ)</h2>
                <p class="mt-3 text-base text-slate-600">
                    Informasi penting seputar ketersediaan kerja, spesialisasi, dan alur kerja sama.
                </p>
            </div>

            <div class="space-y-4">
                
                {{-- FAQ 1 --}}
                <details class="group p-6 rounded-2xl border border-slate-200 bg-white [&_svg]:open:-rotate-180 transition-all duration-200">
                    <summary class="flex items-center justify-between cursor-pointer list-none">
                        <span class="text-base font-bold text-slate-900">Peran dan posisi apa saja yang terbuka bagi Abiyyu?</span>
                        <svg class="w-5 h-5 text-slate-500 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 text-sm text-slate-600 leading-relaxed">
                        Saya membuka peluang untuk posisi <strong>Backend Developer</strong>, <strong>Frontend Developer</strong>, <strong>Fullstack Developer</strong>, <strong>Mobile Apps Developer</strong>, <strong>Database Administrator</strong>, <strong>Project Manager</strong>, dan <strong>Web Developer</strong>. Skema kerja terbuka untuk <strong>Full-time</strong>, <strong>Kontrak</strong>, maupun <strong>Proyek Lepas (Freelance)</strong>.
                    </p>
                </details>

                {{-- FAQ 2 --}}
                <details class="group p-6 rounded-2xl border border-slate-200 bg-white [&_svg]:open:-rotate-180 transition-all duration-200">
                    <summary class="flex items-center justify-between cursor-pointer list-none">
                        <span class="text-base font-bold text-slate-900">Apakah bersedia bekerja secara remote atau on-site?</span>
                        <svg class="w-5 h-5 text-slate-500 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 text-sm text-slate-600 leading-relaxed">
                        Untuk saat ini, saya memprioritaskan dan membuka kerja sama secara <strong>Remote (Jarak Jauh)</strong> dengan komitmen ketersediaan komunikasi yang responsif, manajemen waktu kerja mandiri, dan pelaporan progres yang transparan.
                    </p>
                </details>

                {{-- FAQ 3 --}}
                <details class="group p-6 rounded-2xl border border-slate-200 bg-white [&_svg]:open:-rotate-180 transition-all duration-200">
                    <summary class="flex items-center justify-between cursor-pointer list-none">
                        <span class="text-base font-bold text-slate-900">Teknologi dan stack utama apa yang dikuasai?</span>
                        <svg class="w-5 h-5 text-slate-500 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 text-sm text-slate-600 leading-relaxed">
                        Tech stack utama yang saya kuasai dan gunakan secara aktif meliputi <strong>PHP</strong>, <strong>Laravel</strong>, <strong>JavaScript</strong>, <strong>Flutter</strong>, dan <strong>MySQL</strong>, didukung dengan pemahaman arsitektur RESTful API, Tailwind CSS, serta manajemen database relasional.
                    </p>
                </details>

                {{-- FAQ 4 --}}
                <details class="group p-6 rounded-2xl border border-slate-200 bg-white [&_svg]:open:-rotate-180 transition-all duration-200">
                    <summary class="flex items-center justify-between cursor-pointer list-none">
                        <span class="text-base font-bold text-slate-900">Bagaimana cara menghubungi atau mengunduh CV lengkap?</span>
                        <svg class="w-5 h-5 text-slate-500 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 text-sm text-slate-600 leading-relaxed">
                        Anda dapat langsung menghubungi melalui WhatsApp ke <a href="https://wa.me/62895397043901" class="text-blue-600 font-semibold underline">0895 3970 43901</a> atau email ke <a href="mailto:abiyyuardilian213@gmail.com" class="text-blue-600 font-semibold underline">abiyyuardilian213@gmail.com</a>. Dokumen CV format standar ATS juga dapat diunduh melalui tombol <em>Download CV</em> di bilah navigasi.
                    </p>
                </details>

            </div>
        </div>
    </section>

    {{-- 8. FINAL CALL TO ACTION BANNER (Kontainer Biru Pekat rounded-3xl Persis Merbabudev) --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl bg-blue-900 px-8 py-14 md:p-16 text-center text-white relative overflow-hidden shadow-2xl">
                {{-- Decorative light blobs --}}
                <div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full bg-blue-600/30 blur-3xl pointer-events-none"></div>
                <div class="absolute -left-20 -top-20 w-80 h-80 rounded-full bg-blue-500/20 blur-3xl pointer-events-none"></div>

                <div class="relative z-10 max-w-2xl mx-auto">
                    <h2 class="text-3xl sm:text-4xl font-bold tracking-tight">
                        Siap Membantu Kebutuhan IT &amp; Digital Anda
                    </h2>
                    <p class="mt-4 text-blue-100 text-base leading-relaxed">
                        Mari berdiskusi tentang bagaimana saya dapat memberikan dampak positif bagi operasional dan pengembangan sistem di perusahaan Anda.
                    </p>

                    <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ url('/contact') }}"
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl bg-white text-blue-900 text-sm font-bold hover:bg-blue-50 transition-all shadow-md">
                            <i class="fab fa-whatsapp text-lg text-emerald-600"></i> Hubungi via WhatsApp
                        </a>
                        <a href="mailto:abiyyuardilian213@gmail.com"
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl border border-blue-400/50 bg-blue-800/40 text-white text-sm font-bold hover:bg-blue-800/80 transition-all">
                            <i class="fas fa-envelope text-sm"></i> Kirim Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
