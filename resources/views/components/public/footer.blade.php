<footer class="border-t border-slate-200 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            
            {{-- Kolom 1: Profil Singkat --}}
            <div class="md:col-span-1">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5 mb-4 group">
                    <div class="w-9 h-9 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-base shadow-sm">
                        <i class="fas fa-terminal text-xs"></i>
                    </div>
                    <span class="text-base font-bold text-slate-900 tracking-tight">Abiyyu Dev</span>
                </a>
                <p class="text-sm text-slate-600 leading-relaxed mb-4">
                    Website portofolio profesional R. Abiyyu Ardi Lian Permadi. Berfokus pada Fullstack Web &amp; Mobile Development, Database Administration, Manajemen Proyek, dan Solusi Sistem Informasi Digital.
                </p>
                <div class="flex items-center gap-3">
                    <a href="https://github.com/Abiyyuardi213" target="_blank" class="w-8 h-8 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 flex items-center justify-center text-sm transition-colors" title="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://wa.me/62895397043901" target="_blank" class="w-8 h-8 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-600 flex items-center justify-center text-sm transition-colors" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="mailto:abiyyuardilian213@gmail.com" class="w-8 h-8 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-600 flex items-center justify-center text-sm transition-colors" title="Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
            </div>

            {{-- Kolom 2: Layanan / Kompetensi (Sesuai 6 Keahlian Utama) --}}
            <div>
                <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider mb-4">Keahlian &amp; Solusi</h3>
                <ul class="space-y-2.5 text-sm text-slate-600">
                    <li><a href="{{ url('/#keahlian') }}" class="hover:text-blue-600 transition-colors">Web Application Development</a></li>
                    <li><a href="{{ url('/#keahlian') }}" class="hover:text-blue-600 transition-colors">Mobile Apps (Flutter &amp; React Native)</a></li>
                    <li><a href="{{ url('/#keahlian') }}" class="hover:text-blue-600 transition-colors">Database &amp; Manajemen Data (MySQL/SQL)</a></li>
                    <li><a href="{{ url('/#keahlian') }}" class="hover:text-blue-600 transition-colors">Project Management &amp; IT Leadership</a></li>
                    <li><a href="{{ url('/#keahlian') }}" class="hover:text-blue-600 transition-colors">Komunikasi &amp; Public Relations</a></li>
                    <li><a href="{{ url('/#keahlian') }}" class="hover:text-blue-600 transition-colors">K3 &amp; Prosedur Operasional (HSE)</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Tautan Halaman Portofolio --}}
            <div>
                <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider mb-4">Halaman Portofolio</h3>
                <ul class="space-y-2.5 text-sm text-slate-600">
                    <li><a href="{{ url('/') }}" class="hover:text-blue-600 transition-colors">Beranda</a></li>
                    <li><a href="{{ url('/portfolio') }}" class="hover:text-blue-600 transition-colors">Showcase 9 Proyek Rilis</a></li>
                    <li><a href="{{ url('/experience') }}" class="hover:text-blue-600 transition-colors">13 Pengalaman Kerja</a></li>
                    <li><a href="{{ url('/skills') }}" class="hover:text-blue-600 transition-colors">Tech Stack &amp; Tools</a></li>
                    <li><a href="{{ url('/education') }}" class="hover:text-blue-600 transition-colors">Riwayat Pendidikan &amp; Organisasi</a></li>
                    <li><a href="{{ url('/download-cv') }}" target="_blank" class="hover:text-blue-600 transition-colors">Download Resume ATS</a></li>
                </ul>
            </div>

            {{-- Kolom 4: Informasi Kontak & Ketersediaan --}}
            <div>
                <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider mb-4">Kontak &amp; Ketersediaan</h3>
                <div class="space-y-3 text-sm text-slate-600">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-location-dot text-blue-600 mt-1 text-xs"></i>
                        <span>Surabaya, Jawa Timur (Tersedia Remote)</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="fas fa-envelope text-blue-600 mt-1 text-xs"></i>
                        <span class="break-all">abiyyuardilian213@gmail.com</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="fab fa-whatsapp text-emerald-600 mt-1 text-xs"></i>
                        <span>+62 895 3970 43901</span>
                    </div>
                    <div class="pt-2">
                        <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-900 text-white text-xs font-bold hover:bg-blue-600 transition-colors">
                            Kirim Pesan WhatsApp <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-12 pt-8 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <span>&copy; {{ date('Y') }} R. Abiyyu Ardi Lian Permadi. All rights reserved.</span>
            <span>Dibangun dengan Laravel 11, Tailwind CSS &amp; Plus Jakarta Sans</span>
        </div>
    </div>
</footer>
