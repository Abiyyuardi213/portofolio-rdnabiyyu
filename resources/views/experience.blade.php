@extends('layouts.app')

@section('title', 'Jejak Pengalaman Profesional - Abiyyu Ardilian')

@section('content')
<div class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Header --}}
        <div class="max-w-3xl mb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold mb-4">
                <i class="fas fa-briefcase text-blue-600"></i> Karir &amp; Kontribusi
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-slate-900 tracking-tight">
                Pengalaman Kerja Profesional
            </h1>
            <p class="mt-4 text-base text-slate-600 leading-relaxed">
                Rekam jejak kontribusi dan tanggung jawab profesional di berbagai sektor industri, mulai dari industri petrokimia, BUMN transportasi publik, institusi pendidikan tinggi, manufaktur, hingga logistik nasional.
            </p>
        </div>

        {{-- Experience List Statis (13 Pengalaman Kerja) --}}
        @php
            $experiences = [
                [
                    'company' => 'PT. TPPI (Trans Pacific Petrochemical Indotama)',
                    'role' => 'Teknisi Utilitas / Operasi Kilang',
                    'work_type' => 'On-Site',
                    'period' => 'Des 2020 - Nov 2021',
                    'logo' => asset('image/tppi.png'),
                    'descriptions' => [
                        'Bertanggung jawab dalam pemantauan, pengoperasian, dan inspeksi rutin unit utilitas kilang petrokimia (water treatment, boiler, air compressor, dan power distribution).',
                        'Mendeteksi dan menganalisis potensi anomali teknis, kebocoran sistem perpipaan, dan ketidaksesuaian parameter operasional untuk mencegah downtime.',
                        'Melaksanakan prosedur keselamatan kerja dengan standar tinggi (K3 / HSE) di area berisiko tinggi industri migas dan petrokimia.',
                        'Menyusun log sheet parameter operasional harian dan berkoordinasi erat dengan tim pemeliharaan (maintenance) serta operator shift.'
                    ]
                ],
                [
                    'company' => 'PT. Kereta Api Indonesia (Persero)',
                    'role' => 'Hubungan Masyarakat / Public Relation',
                    'work_type' => 'On-Site',
                    'period' => 'Des 2021 - Mei 2022',
                    'logo' => asset('image/kai.png'),
                    'descriptions' => [
                        'Mengelola komunikasi publik perusahaan, rilis informasi resmi kepada media, serta memelihara citra positif PT KAI di mata masyarakat dan pengguna jasa.',
                        'Menangani pertanyaan, masukan, dan keluhan pelanggan secara solutif, cepat, dan profesional melalui kanal layanan resmi.',
                        'Mendukung koordinasi kegiatan publikasi acara, press release, dokumentasi media, serta program tanggung jawab sosial perusahaan (CSR).'
                    ]
                ],
                [
                    'company' => 'PT. Kereta Api Indonesia (Persero)',
                    'role' => 'Staff Operasional',
                    'work_type' => 'On-Site',
                    'period' => 'Mei 2022 - April 2024',
                    'logo' => asset('image/kai.png'),
                    'descriptions' => [
                        'Mendukung operasional harian stasiun dan perjalanan kereta api guna menjamin ketepatan waktu, keteraturan alur penumpang, dan keselamatan operasional.',
                        'Mengkoordinasikan alur informasi antar pos operasional, kru kereta api, dan bagian pengatur perjalanan kereta api (PPKA).',
                        'Memantau kepatuhan standar pelayanan minimum (SPM) dan SOP keselamatan di stasiun operasional Daerah Operasi 8 Surabaya.',
                        'Menangani kendala operasional lapangan secara tanggap dan menyusun laporan evaluasi harian perjalanan dinas.'
                    ]
                ],
                [
                    'company' => 'PT. Kereta Api Indonesia (Persero)',
                    'role' => 'Asisten Kepala Daerah Operasi 8 Surabaya',
                    'work_type' => 'On-Site',
                    'period' => 'April 2024 - Jan 2025',
                    'logo' => asset('image/kai.png'),
                    'descriptions' => [
                        'Mendukung Kepala Daerah Operasi 8 dalam koordinasi lintas divisi operasional, teknis, SDM, komersial, dan sarana-prasarana perkeretaapian.',
                        'Menyiapkan bahan telaah strategis, laporan komprehensif berkala, notulensi rapat pimpinan daerah, serta pengawasan tindak lanjut arahan direksi.',
                        'Memfasilitasi koordinasi dengan instansi eksternal (Dinas Perhubungan, Kepolisian, TNI, dan Pemda setempat) terkait pengamanan jalur dan aset Daop 8.',
                        'Mengawal kepatuhan SOP manajerial dan pemenuhan target Key Performance Indicators (KPI) wilayah Daerah Operasi 8 Surabaya.'
                    ]
                ],
                [
                    'company' => 'PT. Kereta Api Indonesia (Persero)',
                    'role' => 'Staff Div. Teknologi Informasi',
                    'work_type' => 'Remote',
                    'period' => 'Jan 2025 - Okt 2025',
                    'logo' => asset('image/kai.png'),
                    'descriptions' => [
                        'Melakukan pemeliharaan, monitoring, dan troubleshooting infrastruktur server, jaringan enterprise, dan sistem aplikasi internal perkeretaapian.',
                        'Mengembangkan dan menyempurnakan modul sistem informasi berbasis web untuk otomatisasi pencatatan log data dan pelaporan operasional.',
                        'Mengelola hak akses, integritas basis data, dan backup data rutin sistem penunjang layanan pelanggan dan operasional stasiun.',
                        'Memberikan dukungan teknis (IT Support Level 2) kepada pengguna sistem di berbagai unit kerja Daop 8.'
                    ]
                ],
                [
                    'company' => 'PT. Kereta Api Indonesia (Persero)',
                    'role' => 'Kepala Div. Teknologi Informasi Daerah Operasi 8',
                    'work_type' => 'Remote',
                    'period' => 'Okt 2025 - Saat ini',
                    'logo' => asset('image/kai.png'),
                    'descriptions' => [
                        'Memimpin strategi, perencanaan arsitektur, dan operasional seluruh infrastruktur TI, jaringan komunikasi data, dan sistem informasi di lingkungan Daop 8 Surabaya.',
                        'Mengawasi implementasi transformasi digital dan modernisasi sistem ticketing, pemantauan aset sarana prasarana, serta helpdesk IT wilayah.',
                        'Menjamin keamanan data siber (cybersecurity), reliabilitas sistem 24/7 tanpa downtime, dan kepatuhan terhadap regulasi tata kelola TI korporat.',
                        'Mengelola anggaran divisi TI, evaluasi vendor perangkat, serta membimbing tim teknis dalam meningkatkan efisiensi operasional.'
                    ]
                ],
                [
                    'company' => 'ITATS (Institut Teknologi Adhi Tama Surabaya)',
                    'role' => 'Staff Wakil Rektor 1 (Bidang Akademik & Kemahasiswaan)',
                    'work_type' => 'On-Site',
                    'period' => 'Agt 2024 - Juli 2026',
                    'logo' => asset('image/itats.png'),
                    'descriptions' => [
                        'Membantu penyusunan, pengelolaan, dan validasi data administrasi akademik, kalender perkuliahan, serta kurikulum seluruh program studi.',
                        'Mengelola integrasi data sistem informasi akademik (SIAKAD) dan pelaporan pangkalan data pendidikan tinggi (PDDikti).',
                        'Mendukung koordinasi kegiatan penjaminan mutu akademik, evaluasi beban kerja dosen, dan program beasiswa kemahasiswaan.',
                        'Memfasilitasi surat-menyurat resmi, surat keputusan rektor, serta koordinasi teknis pelaksanaan wisuda dan yudisium.'
                    ]
                ],
                [
                    'company' => 'ITATS (Institut Teknologi Adhi Tama Surabaya)',
                    'role' => 'Staff Hubungan Masyarakat',
                    'work_type' => 'On-Site',
                    'period' => 'Agt 2026 - Saat ini',
                    'logo' => asset('image/itats.png'),
                    'descriptions' => [
                        'Merancang dan memproduksi konten publikasi digital, promosi penerimaan mahasiswa baru (PMB), dan kegiatan riset serta prestasi kampus.',
                        'Mengelola kanal media sosial resmi, website berita kampus, dan interaksi komunikasi dengan calon mahasiswa serta orang tua.',
                        'Menjalin kemitraan media massa, liputan konferensi pers, serta mendukung penyelenggaraan expo pendidikan dan kunjungan sekolah menengah.'
                    ]
                ],
                [
                    'company' => 'PT. Garuda Lintas Nusa',
                    'role' => 'Fullstack Developer',
                    'work_type' => 'Remote',
                    'period' => 'Mei 2025 - Des 2025',
                    'logo' => asset('image/GLN.png'),
                    'descriptions' => [
                        'Membangun sistem informasi logistik dan tracking kargo berbasis web menggunakan Laravel, MySQL, dan Tailwind CSS.',
                        'Merancang RESTful API yang terintegrasi dengan mobile application kurir serta gateway pembayaran otomatis.',
                        'Mengoptimalkan performa kueri database sehingga pemrosesan laporan manifest kargo ribuan baris berjalan cepat dan efisien.',
                        'Menerapkan sistem autentikasi bertingkat berbasis role-based access control (RBAC).'
                    ]
                ],
                [
                    'company' => 'PT. Garuda Lintas Nusa',
                    'role' => 'Project Manager',
                    'work_type' => 'Remote',
                    'period' => 'Des 2025 - Saat ini',
                    'logo' => asset('image/GLN.png'),
                    'descriptions' => [
                        'Memimpin end-to-end lifecycle proyek digitalisasi rantai pasok dan sistem enterprise resource planning (ERP) logistik.',
                        'Menentukan ruang lingkup proyek (scope), alokasi beban kerja sprint, dan manajemen timeline penyelesaian fitur.',
                        'Menjembatani kebutuhan operasional para stakeholder bisnis dengan tim software engineer, UI/UX designer, dan tim QA.',
                        'Memastikan standar kualitas pengkodean, keamanan sistem, dan ketepatan peluncuran fitur ke lingkungan production.'
                    ]
                ],
                [
                    'company' => 'PT. Cahaya Smelter Indonesia',
                    'role' => 'Fullstack Developer',
                    'work_type' => 'Remote',
                    'period' => 'Feb 2026 - Saat ini',
                    'logo' => asset('image/CSI-removebg-preview.png'),
                    'descriptions' => [
                        'Mengembangkan sistem manajemen inventaris bahan baku mineral, pelacakan proses peleburan smelter, dan monitoring output produksi pabrik.',
                        'Merancang dasbor visual analytics real-time untuk memonitor parameter operasional tungku smelter dan efisiensi konsumsi energi.',
                        'Menghubungkan aplikasi web dengan database relasional MySQL berskala besar dan backup redundancy otomatis.',
                        'Melakukan pemeliharaan rutin dan refactoring kode untuk memastikan sistem beroperasi stabil 24/7.'
                    ]
                ],
                [
                    'company' => 'PT. Surabaya Jersey (SUB Jersey)',
                    'role' => 'Fullstack Developer',
                    'work_type' => 'Remote',
                    'period' => 'Juni 2026 - Saat ini',
                    'logo' => asset('image/sub.jpeg'),
                    'descriptions' => [
                        'Mengembangkan platform e-commerce dan sistem manajemen pesanan kustom (custom order management) apparel olahraga SUB Jersey.',
                        'Membangun fitur tracking pesanan dari tahap desain, cetak sublimasi, penjahitan, hingga pengiriman ekspedisi.',
                        'Mengintegrasikan payment gateway otomatis (Virtual Account, E-Wallet, QRIS) dan modul kalkulasi ongkos kirim real-time.',
                        'Mendesain antarmuka front-end yang modern, responsif, dan mudah digunakan di perangkat mobile.'
                    ]
                ],
                [
                    'company' => 'PT. Samudera Indonesia',
                    'role' => 'Staff Teknologi Informasi',
                    'work_type' => 'Remote',
                    'period' => 'Okt 2026 - Saat ini',
                    'logo' => asset('image/samudera.png'),
                    'descriptions' => [
                        'Mendukung pemeliharaan sistem informasi pelayaran, logistik kontainer, dan manajemen armada kapal secara terintegrasi.',
                        'Melakukan monitoring integritas data kargo antar pelabuhan cabang, troubleshooting API manifest, dan optimasi database.',
                        'Menyiapkan dokumentasi teknis sistem, pedoman operasional pengguna, dan penanganan tiket helpdesk IT kantor cabang.',
                        'Berperan aktif dalam inisiatif penguatan keamanan siber dan standardisasi infrastruktur cloud perusahaan.'
                    ]
                ],
            ];
        @endphp

        <div class="space-y-6">
            @foreach($experiences as $exp)
                <article class="p-8 rounded-2xl border border-slate-200 bg-white hover:border-blue-400 hover:shadow-lg transition-all duration-200">
                    <div class="flex flex-col md:flex-row items-start gap-6">
                        
                        {{-- Logo Box --}}
                        <div class="w-16 h-16 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-center overflow-hidden shrink-0 p-2">
                            <img src="{{ $exp['logo'] }}" alt="{{ $exp['company'] }}" class="w-full h-full object-contain">
                        </div>

                        {{-- Details --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-4 mb-4 border-b border-slate-100">
                                <div>
                                    <h2 class="text-xl font-bold text-slate-900">{{ $exp['role'] }}</h2>
                                    <p class="text-sm font-semibold text-blue-600 mt-0.5">{{ $exp['company'] }}</p>
                                </div>
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $exp['work_type'] === 'On-Site' ? 'bg-amber-50 text-amber-700 border border-amber-200/60' : 'bg-emerald-50 text-emerald-700 border border-emerald-200/60' }}">
                                        {{ $exp['work_type'] }}
                                    </span>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold">
                                        <i class="fas fa-calendar-alt text-xs"></i> {{ $exp['period'] }}
                                    </span>
                                </div>
                            </div>

                            <ul class="space-y-2 text-sm text-slate-600 leading-relaxed">
                                @foreach($exp['descriptions'] as $desc)
                                    <li class="flex items-start gap-2.5">
                                        <i class="fas fa-check text-blue-600 mt-1 shrink-0 text-xs"></i>
                                        <span>{{ $desc }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </article>
            @endforeach
        </div>

    </div>
</div>
@endsection
