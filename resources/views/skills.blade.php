@extends('layouts.app')

@section('title', 'Keterampilan - Abiyyu Ardilian')

@section('content')
<section class="split-section">
    <div class="split-title">
        <div class="pill">Skills</div>
        <h2>Keterampilan</h2>
        <p>Kelompok kemampuan teknis yang saya gunakan untuk membangun, merawat, dan mengembangkan aplikasi.</p>
    </div>
    <div class="split-content">
        <div class="service-list">
            @forelse($skills as $skill)
            <article class="service-row">
                <div class="service-icon"><i class="{{ $skill->icon ?? 'fas fa-code' }}"></i></div>
                <h3>{{ $skill->category }}</h3>
                <div class="skill-pills">
                    @foreach(explode(',', $skill->items) as $item)
                        @if(trim($item) !== '')
                        <span class="skill-pill">{{ trim($item) }}</span>
                        @endif
                    @endforeach
                </div>
            </article>
            @empty
            <p>Belum ada data keterampilan.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
