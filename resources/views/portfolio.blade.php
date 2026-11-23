@extends('layouts.app')

@section('title', 'Koleksi Portfolio & Proyek - Abiyyu Ardilian')

@section('content')
<div class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Header --}}
        <div class="max-w-3xl mb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold mb-4">
                <i class="fas fa-layer-group text-blue-600"></i> Showcase Portfolio
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-slate-900 tracking-tight">
                Karya &amp; Implementasi Sistem
            </h1>
            <p class="mt-4 text-base text-slate-600 leading-relaxed">
                Kumpulan sistem informasi enterprise, aplikasi web manajemen, portal layanan publik, hingga platform e-commerce yang telah berhasil saya bangun dan implementasikan.
            </p>
        </div>

        {{-- Portfolio Grid Statis (9 Proyek) --}}
        @php
            $portfolioProjects = [
                [
                    'title' => 'Sistem Informasi Manajemen Laboratorium & Praktikum (ITATS)',
                    'category' => 'Academic System',
                    'tags' => ['Laravel', 'MySQL', 'Tailwind CSS', 'Alpine.js'],
                    'image' => asset('image/Proyek/lab-rpl.png'),
                    'link' => 'https://portal.rpl-itats.site/',
                    'description' => 'Platform digital terintegrasi untuk pengelolaan jadwal praktikum mahasiswa, pendaftaran modul, absensi presensi digital, penilaian tugas asisten, hingga inventarisasi perangkat laboratorium komputasi di ITATS.'
                ],
                [
                    'title' => 'Portal HMIF ITATS',
                    'category' => 'Organization Portal',
                    'tags' => ['Laravel', 'MySQL', 'JavaScript', 'Bootstrap'],
                    'image' => asset('image/Proyek/hmif.png'),
                    'link' => 'https://portal.hmif-itats.site/',
                    'description' => 'Website portal resmi Himpunan Mahasiswa Teknik Informatika ITATS untuk publikasi agenda kegiatan, pendaftaran event & seminar nasional, pusat arsip dokumentasi, serta wadah informasi terpusat mahasiswa.'
                ],
                [
                    'title' => 'Hadir KAI (HRIS)',
                    'category' => 'Enterprise HRIS',
                    'tags' => ['Laravel', 'REST API', 'MySQL', 'Tailwind CSS'],
                    'image' => asset('image/Proyek/hadir-kai.png'),
                    'link' => 'https://hadir.keretaapiindonesia.site/',
                    'description' => 'Sistem Human Resource Information System (HRIS) untuk presensi digital pegawai berbasis geolokasi dan shift operasional dinas, pengajuan izin/cuti online, rekapitulasi lembur, dan manajemen data karyawan Daop 8.'
                ],
                [
                    'title' => 'SUB Jersey E-Commerce',
                    'category' => 'E-Commerce Platform',
                    'tags' => ['Fullstack', 'Payment Gateway', 'MySQL', 'Tailwind CSS'],
                    'image' => asset('image/Proyek/subjersey.png'),
                    'link' => 'https://subjersey.com/',
                    'description' => 'Platform e-commerce dan custom order management apparel olahraga SUB Jersey. Dilengkapi kalkulasi ongkos kirim real-time, integrasi payment gateway otomatis (VA, QRIS, E-Wallet), dan tracking progres pesanan.'
                ],
                [
                    'title' => 'SDM PT. Samudera Indonesia',
                    'category' => 'Corporate Management',
                    'tags' => ['Laravel', 'PostgreSQL', 'Tailwind CSS', 'RBAC'],
                    'image' => asset('image/Proyek/sdm-samudera.png'),
                    'link' => 'https://sdm.samuderaidn.site/',
                    'description' => 'Sistem manajemen data sumber daya manusia dan administrasi kepegawaian internal armada pelayaran logistik PT. Samudera Indonesia dengan standar keamanan data terenkripsi dan role-based access control.'
                ],
                [
                    'title' => 'Warehouse PT. Garuda Lintas Nusa',
                    'category' => 'Supply Chain & ERP',
                    'tags' => ['Laravel', 'MySQL', 'REST API', 'Barcode Scanner'],
                    'image' => asset('image/Proyek/warehouse.png'),
                    'link' => 'https://warehouse.garudafiber.site/',
                    'description' => 'Aplikasi web enterprise resource planning (ERP) pergudangan untuk mencatat arus masuk-keluar kargo logistik, pelacakan manifest barang, manajemen stok suku cadang, dan audit inventaris logistik secara real-time.'
                ],
                [
                    'title' => 'Kasir POS PT. Garuda Lintas Nusa',
                    'category' => 'Point of Sales (POS)',
                    'tags' => ['Laravel', 'Vue.js', 'MySQL', 'Thermal Print'],
                    'image' => asset('image/Proyek/kasir-warehouse.png'),
                    'link' => 'https://warehouse.garudafiber.site/kasir/login',
                    'description' => 'Sistem Point of Sales (POS) kasir gudang logistik untuk transaksi layanan pengiriman kilat, pencetakan resi dan struk thermal otomatis, rekapitulasi setoran kas harian, dan pembukuan penjualan kasir.'
                ],
                [
                    'title' => 'Booking Tiket KAI',
                    'category' => 'Ticketing System',
                    'tags' => ['Web Application', 'REST API', 'High Traffic', 'Security'],
                    'image' => asset('image/Proyek/booking-kai.png'),
                    'link' => 'https://booking.kai.id/',
                    'description' => 'Implementasi antarmuka dan sistem reservasi tiket kereta api antarkota terintegrasi dengan ketersediaan kursi real-time, validasi identitas penumpang, dan multi-channel payment terpercaya.'
                ],
                [
                    'title' => 'Landing Page KAI',
                    'category' => 'Public Corporate Site',
                    'tags' => ['Web Portal', 'SEO Friendly', 'Responsive UI', 'Speed Optimization'],
                    'image' => asset('image/Proyek/kai-id.png'),
                    'link' => 'https://www.kai.id/',
                    'description' => 'Website portal resmi PT. Kereta Api Indonesia (Persero) yang menyajikan informasi jadwal kereta, siaran pers perusahaan, rute layanan, informasi tarif, dan layanan pelanggan interaktif.'
                ],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($portfolioProjects as $project)
                <article class="group rounded-2xl border border-slate-200 bg-white overflow-hidden hover:border-blue-400 hover:shadow-lg transition-all duration-200 flex flex-col justify-between">
                    
                    <div>
                        {{-- Preview Gambar Proyek --}}
                        <div class="relative h-52 bg-slate-100 overflow-hidden border-b border-slate-100">
                            <img src="{{ $project['image'] }}" 
                                 alt="{{ $project['title'] }}" 
                                 class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-300">
                            
                            {{-- Category Pill --}}
                            <div class="absolute top-3 left-3">
                                <span class="px-2.5 py-1 rounded-md bg-slate-900/85 backdrop-blur-xs text-white text-[10px] font-bold">
                                    {{ $project['category'] }}
                                </span>
                            </div>
                        </div>

                        {{-- Konten Detail --}}
                        <div class="p-6">
                            {{-- Tech Tags --}}
                            <div class="flex flex-wrap gap-1.5 mb-3">
                                @foreach($project['tags'] as $tag)
                                    <span class="px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 text-[11px] font-semibold">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>

                            <h2 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors leading-snug">
                                {{ $project['title'] }}
                            </h2>

                            <p class="text-xs sm:text-sm text-slate-600 mt-2.5 line-clamp-3 leading-relaxed">
                                {{ $project['description'] }}
                            </p>
                        </div>
                    </div>

                    {{-- Link Aksi --}}
                    <div class="p-6 pt-0 border-t border-slate-50 mt-2 flex items-center justify-between">
                        <a href="{{ $project['link'] }}" target="_blank" class="inline-flex items-center gap-2 text-xs font-bold text-blue-600 hover:text-blue-700">
                            Kunjungi Aplikasi Langsung <i class="fas fa-external-link-alt text-[10px]"></i>
                        </a>
                        <span class="text-xs text-slate-400 font-mono font-bold">#0{{ $loop->iteration }}</span>
                    </div>

                </article>
            @endforeach
        </div>

    </div>
</div>
@endsection
