@extends('layouts.app')

@section('title', 'Keahlian & Stack Teknologi - Abiyyu Ardilian')

@section('content')
<div class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Header --}}
        <div class="max-w-3xl mb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold mb-4">
                <i class="fas fa-layer-group text-blue-600"></i> Tech Stack &amp; Tools
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-slate-900 tracking-tight">
                Keahlian &amp; Penguasaan Teknologi
            </h1>
            <p class="mt-4 text-base text-slate-600 leading-relaxed">
                Rangkuman kompetensi teknis, bahasa pemrograman, framework, basis data, serta perangkat pemeliharaan hardware dan jaringan yang saya kuasai.
            </p>
        </div>

        {{-- Skills Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if(isset($skills) && $skills->count() > 0)
                @foreach($skills as $skill)
                    <article class="p-8 rounded-2xl border border-slate-200 bg-white hover:border-blue-400 hover:shadow-lg transition-all duration-200 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                                    <i class="{{ $skill->icon ?? 'fas fa-code' }}"></i>
                                </div>
                                <h2 class="text-xl font-bold text-slate-900">{{ $skill->category }}</h2>
                            </div>

                            <div class="flex flex-wrap gap-2">
                                @foreach(explode(',', $skill->items) as $item)
                                    @if(trim($item) !== '')
                                        <span class="px-3 py-1.5 rounded-lg bg-slate-50 text-slate-700 border border-slate-200/80 text-xs font-medium hover:bg-blue-50 hover:text-blue-700 hover:border-blue-200 transition-colors">
                                            {{ trim($item) }}
                                        </span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
                {{-- Fallback Default High-Quality Skills jika database belum diisi --}}
                @php
                    $defaultSkills = [
                        [
                            'category' => 'Web Development',
                            'icon' => 'fas fa-code',
                            'color' => 'bg-indigo-50 text-indigo-600',
                            'items' => ['PHP', 'Laravel Framework', 'JavaScript', 'HTML5', 'Tailwind CSS', 'Bootstrap', 'RESTful API']
                        ],
                        [
                            'category' => 'Database & System',
                            'icon' => 'fas fa-database',
                            'color' => 'bg-blue-50 text-blue-600',
                            'items' => ['MySQL', 'phpMyAdmin', 'Database Schema Design', 'SQL Optimization', 'Data Backup & Recovery']
                        ],
                        [
                            'category' => 'IT Support & Hardware',
                            'icon' => 'fas fa-screwdriver-wrench',
                            'color' => 'bg-amber-50 text-amber-600',
                            'items' => ['PC/Laptop Assembly & Troubleshooting', 'Windows OS Deployment', 'Linux Basics', 'Printer & Peripheral Setup', 'Driver Installation']
                        ],
                        [
                            'category' => 'Jaringan & Infrastruktur',
                            'icon' => 'fas fa-network-wired',
                            'color' => 'bg-emerald-50 text-emerald-600',
                            'items' => ['Crimping RJ45 & UTP Cable', 'LAN Configuration', 'Wi-Fi Router Setup', 'TCP/IP & Subnetting', 'Network Diagnostic']
                        ],
                        [
                            'category' => 'Tools & Produktivitas',
                            'icon' => 'fas fa-toolbox',
                            'color' => 'bg-purple-50 text-purple-600',
                            'items' => ['Git & GitHub', 'VS Code', 'Laragon / XAMPP', 'Postman', 'Microsoft Office & Excel', 'Google Workspace']
                        ],
                        [
                            'category' => 'Soft Skills & Operasional',
                            'icon' => 'fas fa-users-gear',
                            'color' => 'bg-rose-50 text-rose-600',
                            'items' => ['Public Relations', 'Customer / User Support', 'Kepatuhan SOP & HSE (K3)', 'Problem Solving', 'Dokumentasi Teknis']
                        ]
                    ];
                @endphp

                @foreach($defaultSkills as $skill)
                    <article class="p-8 rounded-2xl border border-slate-200 bg-white hover:border-blue-400 hover:shadow-lg transition-all duration-200 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 rounded-xl {{ $skill['color'] }} flex items-center justify-center text-xl">
                                    <i class="{{ $skill['icon'] }}"></i>
                                </div>
                                <h2 class="text-xl font-bold text-slate-900">{{ $skill['category'] }}</h2>
                            </div>

                            <div class="flex flex-wrap gap-2">
                                @foreach($skill['items'] as $item)
                                    <span class="px-3 py-1.5 rounded-lg bg-slate-50 text-slate-700 border border-slate-200/80 text-xs font-medium hover:bg-blue-50 hover:text-blue-700 hover:border-blue-200 transition-colors">
                                        {{ $item }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            @endif
        </div>

    </div>
</div>
@endsection
