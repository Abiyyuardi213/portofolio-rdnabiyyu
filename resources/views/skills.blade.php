@extends('layouts.app')

@section('title', 'Keterampilan - Abiyyu Ardilian')

@section('content')
    <!-- Skills Section -->
    <section id="skills">
        <h2 class="section-title">Keterampilan</h2>
        <div class="skills-grid">
            @forelse($skills as $skill)
            <div class="skill-box fade-in">
                <div class="skill-icon"><i class="{{ $skill->icon ?? 'fas fa-code' }}"></i></div>
                <h3>{{ $skill->category }}</h3>
                <p>{{ $skill->items }}</p>
            </div>
            @empty
            <p>Belum ada data keterampilan.</p>
            @endforelse
        </div>
    </section>
@endsection
