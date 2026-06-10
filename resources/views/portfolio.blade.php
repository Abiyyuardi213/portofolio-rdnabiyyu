@extends('layouts.app')

@section('title', 'Portfolio Project - Abiyyu Ardilian')

@section('content')
<div class="page-shell">
    <div class="page-heading">
        <div>
            <div class="page-kicker">Portfolio</div>
            <h1>Project Pilihan</h1>
        </div>
        <p>Kumpulan pekerjaan web dan sistem yang menampilkan proses, teknologi, serta hasil implementasi.</p>
    </div>

    <div class="work-grid">
        @forelse($projects as $project)
        <article class="work-card">
            <div class="work-media">
                @if($project->image)
                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">
                @else
                <div class="work-placeholder"><i class="fas fa-image"></i></div>
                @endif
            </div>
            <div class="work-info">
                <div>
                    <h2>{{ $project->title }}</h2>
                    <p>{{ $project->description }}</p>
                    <div class="portfolio-tags">
                        @php $tags = explode(',', $project->tags ?? ''); @endphp
                        @foreach($tags as $tag)
                            @if(trim($tag) !== '')
                            <span class="tag">{{ trim($tag) }}</span>
                            @endif
                        @endforeach
                    </div>
                </div>
                @if($project->link)
                <a href="{{ $project->link }}" target="_blank" class="work-link" aria-label="Open project">
                    <i class="fas fa-arrow-up-right-from-square"></i>
                </a>
                @endif
            </div>
        </article>
        @empty
        <p>Belum ada proyek portfolio.</p>
        @endforelse
    </div>
</div>
@endsection
