@extends('layouts.app')

@section('title', 'Latar Belakang Pendidikan - Abiyyu Ardilian')

@section('content')
<div class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Header --}}
        <div class="max-w-3xl mb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold mb-4">
                <i class="fas fa-graduation-cap text-blue-600"></i> Riwayat Akademis &amp; Organisasi
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-slate-900 tracking-tight">
                Pendidikan Formal &amp; Kepemimpinan
            </h1>
            <p class="mt-4 text-base text-slate-600 leading-relaxed">
                Jejak pendidikan formal, bidang spesialisasi keilmuan, kepengurusan organisasi mahasiswa, serta pengalaman manajerial laboratorium komputer.
            </p>
        </div>

        {{-- Education List Statis --}}
        @php
            $educations = [
                [
                    'institution' => 'Institut Teknologi Adhi Tama Surabaya (ITATS)',
                    'degree' => 'S1 - Teknik Informatika (Semester 7)',
                    'specialization' => 'Bidang Keahlian: Kecerdasan Artifisial (Artificial Intelligence)',
                    'period' => '2023 - Saat ini',
                    'status_badge' => 'Sedang Menempuh',
                    'logo' => asset('image/itats.png'),
                    'skills_desc' => 'Mendalami perancangan algoritma machine learning, pemrosesan data cerdas, rekayasa perangkat lunak modern, dan arsitektur sistem berbasis cloud & web.',
                    'roles_header' => 'Pengalaman Organisasi & Kepemimpinan Kampus:',
                    'roles' => [
                        [
                            'title' => 'Ketua Himpunan Mahasiswa Teknik Informatika ITATS',
                            'period' => 'Sept 2025 - Agt 2026',
                            'badge' => 'Leadership',
                            'desc' => 'Memimpin arah strategis organisasi, mengkoordinasikan program kerja seluruh divisi, mewakili jurusan dalam forum internal dan eksternal, serta memajukan iklim akademik dan teknologi mahasiswa Informatika.'
                        ],
                        [
                            'title' => 'Wakil Ketua Himpunan Mahasiswa Teknik Informatika ITATS',
                            'period' => 'Des 2024 - Agt 2025',
                            'badge' => 'Leadership',
                            'desc' => 'Membantu ketua himpunan dalam koordinasi internal, supervisi kinerja departemen, perumusan kebijakan organisasi, dan monitoring eksekusi event akbar jurusan.'
                        ],
                        [
                            'title' => 'Anggota Div. Kewirausahaan Himpunan Mahasiswa Teknik Informatika ITATS',
                            'period' => 'Des 2023 - Des 2024',
                            'badge' => 'Organization',
                            'desc' => 'Menginisiasi program penggalangan dana kreatif, merchandise resmi jurusan, pelatihan kewirausahaan digital mahasiswa, serta pengelolaan kas usaha himpunan.'
                        ],
                        [
                            'title' => 'Koordinator Lab. Rekayasa Perangkat Lunak (Lab RPL ITATS)',
                            'period' => 'Sept 2025 - Sept 2026',
                            'badge' => 'Academic Lab',
                            'desc' => 'Mengkoordinasikan jadwal praktikum mahasiswa, pemeliharaan infrastruktur laboratorium komputer, modul praktikum RPL, serta membina jajaran asisten laboratorium.'
                        ],
                        [
                            'title' => 'Anggota Asisten Laboratorium Rekayasa Perangkat Lunak (Lab RPL ITATS)',
                            'period' => 'Sept 2024 - Sept 2025',
                            'badge' => 'Academic Lab',
                            'desc' => 'Membimbing mahasiswa dalam kegiatan praktikum pemrograman, evaluasi tugas dan responsi proyek akhir praktikum, serta mendukung operasional software lab.'
                        ]
                    ]
                ],
                [
                    'institution' => 'SMK Negeri 3 Surabaya',
                    'degree' => 'Teknik Gambar Bangunan (Desain Pemodelan & Informasi Bangunan)',
                    'specialization' => 'Bidang Keahlian: Perancangan Arsitektur, Gambar Struktur & Pemodelan CAD/BIM',
                    'period' => '2016 - 2019',
                    'status_badge' => 'Lulus',
                    'logo' => null,
                    'skills_desc' => 'Mempelajari dasar ketelitian perancangan gambar teknik 2D dan pemodelan 3D, kalkulasi rencana anggaran biaya (RAB), spesifikasi material, serta pemahaman detail konstruksi bangunan yang melatih ketelitian dan daya analisis spasial.',
                    'roles_header' => 'Kompetensi & Keahlian Utama:',
                    'roles' => [
                        [
                            'title' => 'Pemodelan Arsitektur 2D/3D (AutoCAD & SketchUp)',
                            'period' => '2016 - 2019',
                            'badge' => 'CAD / 3D Design',
                            'desc' => 'Menyusun gambar kerja detail (denah, tampak, potongan) dengan tingkat akurasi tinggi menggunakan perangkat lunak computer-aided design.'
                        ],
                        [
                            'title' => 'Kalkulasi Estimasi Biaya & Manajemen Proyek Fisik',
                            'period' => '2016 - 2019',
                            'badge' => 'Estimation',
                            'desc' => 'Menghitung volume pekerjaan dan estimasi kebutuhan anggaran proyek (RAB) serta pengawasan kesesuaian gambar pelaksanaan dengan standar fisik.'
                        ]
                    ]
                ]
            ];
        @endphp

        <div class="space-y-8">
            @foreach($educations as $edu)
                <article class="p-8 rounded-2xl border border-slate-200 bg-white hover:border-blue-400 hover:shadow-lg transition-all duration-200">
                    <div class="flex flex-col md:flex-row items-start gap-6">
                        
                        {{-- Icon / Logo Box --}}
                        <div class="w-16 h-16 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center overflow-hidden shrink-0 p-2">
                            @if($edu['logo'])
                                <img src="{{ $edu['logo'] }}" alt="{{ $edu['institution'] }}" class="w-full h-full object-contain">
                            @else
                                <i class="fas fa-school text-2xl text-blue-600"></i>
                            @endif
                        </div>

                        {{-- Details --}}
                        <div class="flex-1 min-w-0">
                            {{-- Header Card --}}
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-4 mb-4 border-b border-slate-100">
                                <div>
                                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900">{{ $edu['institution'] }}</h2>
                                    <p class="text-base font-semibold text-blue-600 mt-0.5">{{ $edu['degree'] }}</p>
                                    <p class="text-xs font-semibold text-slate-500 mt-1 flex items-center gap-1.5">
                                        <i class="fas fa-brain text-blue-600"></i> {{ $edu['specialization'] }}
                                    </p>
                                </div>
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $edu['status_badge'] === 'Lulus' ? 'bg-slate-100 text-slate-700' : 'bg-emerald-50 text-emerald-700 border border-emerald-200/60' }}">
                                        {{ $edu['status_badge'] }}
                                    </span>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold">
                                        <i class="fas fa-calendar-alt text-xs"></i> {{ $edu['period'] }}
                                    </span>
                                </div>
                            </div>

                            {{-- Deskripsi Bidang Keahlian --}}
                            <p class="text-sm text-slate-600 leading-relaxed mb-6">
                                {{ $edu['skills_desc'] }}
                            </p>

                            {{-- Riwayat Kepengurusan / Jabatan --}}
                            <div class="mt-4 pt-4 border-t border-slate-100">
                                <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider mb-3">
                                    {{ $edu['roles_header'] }}
                                </h3>

                                <div class="space-y-3">
                                    @foreach($edu['roles'] as $role)
                                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/70 hover:bg-blue-50/40 hover:border-blue-200 transition-colors">
                                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 mb-1.5">
                                                <div class="flex items-center gap-2 flex-wrap">
                                                    <span class="text-sm font-bold text-slate-900">{{ $role['title'] }}</span>
                                                    <span class="px-2 py-0.5 rounded-md bg-blue-100/70 text-blue-700 text-[10px] font-bold">
                                                        {{ $role['badge'] }}
                                                    </span>
                                                </div>
                                                <span class="text-xs font-semibold text-slate-500 shrink-0">
                                                    {{ $role['period'] }}
                                                </span>
                                            </div>
                                            <p class="text-xs text-slate-600 leading-relaxed">
                                                {{ $role['desc'] }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>
                </article>
            @endforeach
        </div>

    </div>
</div>
@endsection
