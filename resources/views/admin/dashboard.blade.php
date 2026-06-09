@extends('layouts.admin')

@section('header', 'Dashboard Overview')

@section('content')
<div class="section-header">
    <div>
        <h1>Welcome back, {{ Auth::user()->name ?? 'Admin' }}</h1>
        <p>Kelola data portfolio dari satu workspace yang ringkas.</p>
    </div>
    <a href="{{ url('/') }}" target="_blank" class="btn btn-outline"><i class="fas fa-arrow-up-right-from-square"></i> Preview Site</a>
</div>

<div class="stats-grid">
    <div class="card stat-card">
        <div class="card-header">
            <p class="stat-label">Experiences</p>
            <i class="fas fa-briefcase stat-icon"></i>
        </div>
        <div class="stat-value">{{ $stats['experiences'] }}</div>
    </div>
    <div class="card stat-card">
        <div class="card-header">
            <p class="stat-label">Projects</p>
            <i class="fas fa-folder-open stat-icon"></i>
        </div>
        <div class="stat-value">{{ $stats['projects'] }}</div>
    </div>
    <div class="card stat-card">
        <div class="card-header">
            <p class="stat-label">Skills</p>
            <i class="fas fa-wand-magic-sparkles stat-icon"></i>
        </div>
        <div class="stat-value">{{ $stats['skills'] }}</div>
    </div>
    <div class="card stat-card">
        <div class="card-header">
            <p class="stat-label">Education</p>
            <i class="fas fa-graduation-cap stat-icon"></i>
        </div>
        <div class="stat-value">{{ $stats['education'] }}</div>
    </div>
</div>

<div class="dashboard-grid">
    <div class="card">
        <div class="card-header">
            <div>
                <h3>Portfolio Activity</h3>
                <p class="card-subtitle">Ringkasan konten aktif di dashboard.</p>
            </div>
            <span class="tag-pill">30 days</span>
        </div>
        <div class="chart-preview">
            <svg viewBox="0 0 760 260" role="img" aria-label="Portfolio activity chart">
                <defs>
                    <linearGradient id="activityFill" x1="0" x2="0" y1="0" y2="1">
                        <stop offset="0%" stop-color="#007aff" stop-opacity="0.22" />
                        <stop offset="100%" stop-color="#007aff" stop-opacity="0" />
                    </linearGradient>
                </defs>
                <g stroke="#e5e5ea" stroke-width="1">
                    <line x1="0" y1="44" x2="760" y2="44" />
                    <line x1="0" y1="92" x2="760" y2="92" />
                    <line x1="0" y1="140" x2="760" y2="140" />
                    <line x1="0" y1="188" x2="760" y2="188" />
                    <line x1="0" y1="236" x2="760" y2="236" />
                </g>
                <path d="M0 220 C50 196 82 204 116 170 S184 112 232 128 S304 194 350 150 S420 62 476 88 S548 212 602 132 S684 84 760 104 L760 260 L0 260 Z" fill="url(#activityFill)" />
                <path d="M0 220 C50 196 82 204 116 170 S184 112 232 128 S304 194 350 150 S420 62 476 88 S548 212 602 132 S684 84 760 104" fill="none" stroke="#007aff" stroke-width="3" stroke-linecap="round" />
                <circle cx="476" cy="88" r="5" fill="#007aff" />
                <line x1="476" y1="24" x2="476" y2="236" stroke="#8e8e93" stroke-dasharray="5 5" />
                <rect x="492" y="56" width="142" height="72" rx="10" fill="#fff" stroke="#d8d8dc" />
                <text x="508" y="82" font-size="12" fill="#6e6e73">Current content</text>
                <text x="508" y="108" font-size="21" font-weight="700" fill="#1d1d1f">{{ array_sum($stats) }} records</text>
            </svg>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div>
                <h3>Quick Actions</h3>
                <p class="card-subtitle">Tambah atau ubah data utama.</p>
            </div>
        </div>
        <div class="quick-actions">
            <a href="{{ route('projects.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Project</a>
            <a href="{{ route('experiences.create') }}" class="btn btn-outline"><i class="fas fa-plus"></i> Add Experience</a>
            <a href="{{ route('skills.create') }}" class="btn btn-outline"><i class="fas fa-plus"></i> Add Skill</a>
            <a href="{{ route('education.create') }}" class="btn btn-outline"><i class="fas fa-plus"></i> Add Education</a>
            <a href="{{ route('profile.index') }}" class="btn btn-outline"><i class="fas fa-pen"></i> Edit Profile</a>
        </div>
    </div>
</div>
@endsection
