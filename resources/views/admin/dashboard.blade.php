@extends('layouts.admin')

@section('header', 'Dashboard Overview')

@section('content')
<div class="section-header" style="margin-bottom: 32px;">
    <div>
        <h1 style="font-weight: 800; color: var(--ink); tracking-tight;">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}</h1>
        <p style="color: var(--muted); font-size: 14px; margin-top: 4px;">Kelola dan perbarui seluruh konten portofolio digital Anda dari panel kontrol terpadu.</p>
    </div>
    <a href="{{ url('/') }}" target="_blank" class="btn btn-outline" style="border-radius: 8px; font-weight: 700;">
        <i class="fas fa-arrow-up-right-from-square text-xs text-blue-600"></i> Lihat Website
    </a>
</div>

{{-- Metric Counters (Gaya Kartu Merbabudev) --}}
<div class="stats-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 32px;">
    
    <div class="card stat-card" style="border-radius: 16px; border: 1px solid var(--line); padding: 24px; background: #fff; box-shadow: var(--shadow);">
        <div class="card-header" style="border-bottom: 0; padding-bottom: 0; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center;">
            <p class="stat-label" style="font-size: 11px; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 0.05em;">Pengalaman Kerja</p>
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 13px;">
                <i class="fas fa-briefcase"></i>
            </div>
        </div>
        <div class="stat-value" style="font-size: 2.25rem; font-weight: 800; color: var(--ink);">{{ $stats['experiences'] }}</div>
    </div>

    <div class="card stat-card" style="border-radius: 16px; border: 1px solid var(--line); padding: 24px; background: #fff; box-shadow: var(--shadow);">
        <div class="card-header" style="border-bottom: 0; padding-bottom: 0; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center;">
            <p class="stat-label" style="font-size: 11px; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 0.05em;">Project Showcase</p>
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 13px;">
                <i class="fas fa-folder-open"></i>
            </div>
        </div>
        <div class="stat-value" style="font-size: 2.25rem; font-weight: 800; color: var(--ink);">{{ $stats['projects'] }}</div>
    </div>

    <div class="card stat-card" style="border-radius: 16px; border: 1px solid var(--line); padding: 24px; background: #fff; box-shadow: var(--shadow);">
        <div class="card-header" style="border-bottom: 0; padding-bottom: 0; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center;">
            <p class="stat-label" style="font-size: 11px; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 0.05em;">Keahlian Teknis</p>
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 13px;">
                <i class="fas fa-wand-magic-sparkles"></i>
            </div>
        </div>
        <div class="stat-value" style="font-size: 2.25rem; font-weight: 800; color: var(--ink);">{{ $stats['skills'] }}</div>
    </div>

    <div class="card stat-card" style="border-radius: 16px; border: 1px solid var(--line); padding: 24px; background: #fff; box-shadow: var(--shadow);">
        <div class="card-header" style="border-bottom: 0; padding-bottom: 0; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center;">
            <p class="stat-label" style="font-size: 11px; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 0.05em;">Riwayat Studi</p>
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 13px;">
                <i class="fas fa-graduation-cap"></i>
            </div>
        </div>
        <div class="stat-value" style="font-size: 2.25rem; font-weight: 800; color: var(--ink);">{{ $stats['education'] }}</div>
    </div>

</div>

<div class="dashboard-grid" style="display: grid; grid-template-columns: 1.35fr 0.65fr; gap: 20px;">
    
    {{-- Terminal Status Box (Sama seperti Merbabudev Terminal) --}}
    <div class="card" style="background: #0f172a; border-radius: 16px; border: 1px solid #1e293b; padding: 28px; color: #fff;">
        <div class="card-header" style="border-bottom: 1px solid #1e293b; padding-bottom: 14px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; items-center; gap: 8px;">
                <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background: #ef4444;"></span>
                <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background: #f59e0b;"></span>
                <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background: #10b981;"></span>
                <span style="margin-left: 8px; font-family: monospace; font-size: 12px; color: #94a3b8;">admin@merbabudev-engine:~$</span>
            </div>
            <span class="tag-pill" style="background: rgba(37,99,235,0.2); border: 1px solid rgba(37,99,235,0.4); color: #60a5fa; font-size: 11px;">System Active</span>
        </div>

        <div style="font-family: monospace; font-size: 13px; line-height: 1.8; color: #cbd5e1;">
            <p><span style="color: #34d399;">➜</span> <span style="color: #60a5fa;">portfolio:status</span> --all</p>
            <p style="color: #94a3b8; margin-top: 4px;">• Framework: Laravel 11.x &amp; Tailwind CSS v4</p>
            <p style="color: #94a3b8;">• Database: MySQL Active Connection</p>
            <p style="color: #94a3b8;">• Total Master Records: <span style="color: #38bdf8; font-weight: bold;">{{ array_sum($stats) }} items</span></p>
            <p style="color: #94a3b8;">• Public Status: <span style="color: #34d399;">200 OK — Ready for Production</span></p>
        </div>

        <div style="margin-top: 24px; padding-top: 18px; border-top: 1px solid #1e293b; display: flex; justify-content: space-between; align-items: center; font-size: 12px; color: #64748b;">
            <span>Environment: Production Mode</span>
            <span style="color: #94a3b8;">Surabaya, Indonesia</span>
        </div>
    </div>

    {{-- Quick Action Links --}}
    <div class="card" style="border-radius: 16px; border: 1px solid var(--line); padding: 28px; background: #fff; box-shadow: var(--shadow);">
        <div class="card-header" style="border-bottom: 1px solid var(--line); padding-bottom: 14px; margin-bottom: 20px;">
            <h3 style="font-size: 16px; font-weight: 800; color: var(--ink);">Aksi Cepat</h3>
            <p class="card-subtitle" style="font-size: 12px; color: var(--muted); margin-top: 2px;">Tambah atau kelola entri konten secara langsung.</p>
        </div>
        <div class="quick-actions" style="display: flex; flex-direction: column; gap: 10px;">
            <a href="{{ route('projects.create') }}" class="btn btn-primary" style="justify-content: flex-start; padding: 12px 16px; border-radius: 8px;">
                <i class="fas fa-plus"></i> Tambah Project Baru
            </a>
            <a href="{{ route('experiences.create') }}" class="btn btn-outline" style="justify-content: flex-start; padding: 12px 16px; border-radius: 8px;">
                <i class="fas fa-plus text-blue-600"></i> Tambah Pengalaman Kerja
            </a>
            <a href="{{ route('skills.create') }}" class="btn btn-outline" style="justify-content: flex-start; padding: 12px 16px; border-radius: 8px;">
                <i class="fas fa-plus text-blue-600"></i> Tambah Skill Teknis
            </a>
            <a href="{{ route('education.create') }}" class="btn btn-outline" style="justify-content: flex-start; padding: 12px 16px; border-radius: 8px;">
                <i class="fas fa-plus text-blue-600"></i> Tambah Data Pendidikan
            </a>
            <a href="{{ route('profile.index') }}" class="btn btn-outline" style="justify-content: flex-start; padding: 12px 16px; border-radius: 8px;">
                <i class="fas fa-user-pen text-blue-600"></i> Edit Profil &amp; Kontak
            </a>
        </div>
    </div>

</div>
@endsection
