<header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/90 backdrop-blur-md transition-all duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">
            
            {{-- Brand Logo --}}
            <a href="{{ url('/') }}" class="inline-flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-lg shadow-md shadow-blue-500/20 group-hover:bg-blue-700 transition-colors">
                    <i class="fas fa-terminal text-sm"></i>
                </div>
                <div class="leading-tight">
                    <span class="block text-base font-bold text-slate-900 tracking-tight">Abiyyu Dev</span>
                    <span class="block text-[11px] font-semibold text-blue-600 tracking-wider uppercase">Fullstack &amp; Project Manager</span>
                </div>
            </a>

            {{-- Hamburger Button Mobile --}}
            <button class="md:hidden p-2.5 rounded-lg text-slate-700 hover:text-slate-900 hover:bg-slate-100 transition-colors" id="hamburgerMenu" aria-label="Toggle menu" onclick="document.getElementById('mobileMenuPanel').classList.toggle('hidden')">
                <i class="fas fa-bars text-xl"></i>
            </button>

            {{-- Desktop Navigation Links --}}
            <nav class="hidden md:flex items-center gap-1">
                @php
                    $navItems = [
                        ['label' => 'Beranda', 'href' => url('/')],
                        ['label' => 'Keahlian', 'href' => url('/#keahlian')],
                        ['label' => 'Keunggulan', 'href' => url('/#kenapa-saya')],
                        ['label' => 'Portfolio', 'href' => url('/portfolio')],
                        ['label' => 'Pengalaman', 'href' => url('/experience')],
                        ['label' => 'Pendidikan', 'href' => url('/education')],
                        ['label' => 'FAQ', 'href' => url('/#faq')],
                    ];
                @endphp

                @foreach ($navItems as $item)
                    <a href="{{ $item['href'] }}"
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-colors duration-200 text-slate-600 hover:text-slate-900 hover:bg-slate-50">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            {{-- CTA Action Button --}}
            <div class="hidden md:flex items-center gap-3">
                <a href="{{ url('/download-cv') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg border border-slate-200 bg-white text-xs font-semibold text-slate-700 hover:bg-slate-50 hover:border-slate-300 transition-all shadow-xs">
                    <i class="fas fa-file-pdf text-rose-500"></i> Download CV
                </a>
                <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition-all shadow-md shadow-blue-600/20">
                    <i class="fab fa-whatsapp text-sm"></i> Hubungi Saya
                </a>
            </div>

        </div>
    </div>

    {{-- Mobile Nav Menu --}}
    <div id="mobileMenuPanel" class="hidden md:hidden border-t border-slate-200 bg-white px-4 py-4 space-y-2">
        @foreach ($navItems as $item)
            <a href="{{ $item['href'] }}"
               class="block px-3.5 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-blue-600">
                {{ $item['label'] }}
            </a>
        @endforeach
        <div class="pt-3 border-t border-slate-100 flex flex-col gap-2">
            <a href="{{ url('/download-cv') }}" target="_blank" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg border border-slate-200 text-xs font-semibold text-slate-700">
                <i class="fas fa-file-pdf text-rose-500"></i> Download CV
            </a>
            <a href="{{ url('/contact') }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-blue-600 text-white text-xs font-bold">
                <i class="fab fa-whatsapp text-sm"></i> Hubungi Saya
            </a>
        </div>
    </div>
</header>
