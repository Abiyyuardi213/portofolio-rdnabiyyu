@extends('layouts.app')

@section('title', 'Portfolio Project - Abiyyu Ardilian')

@section('content')
    <!-- Portfolio Section -->
    <section id="portfolio">
        <h2 class="section-title">Portfolio Project</h2>
        <div class="portfolio-grid">
            @forelse($projects as $project)
            <div class="portfolio-card fade-in">
                <div class="portfolio-image">
                    @if($project->image)
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">
                    @endif
                    <div class="portfolio-overlay">
                        @if($project->link)
                        <a href="{{ $project->link }}" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                        @else
                        <i class="fas fa-external-link-alt"></i>
                        @endif
                    </div>
                </div>
                <div class="portfolio-content">
                    <h3>{{ $project->title }}</h3>
                    <p>{{ $project->description }}</p>
                    <div class="portfolio-tags">
                        @php $tags = explode(',', $project->tags); @endphp
                        @foreach($tags as $tag)
                        <span class="tag">{{ trim($tag) }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @empty
            <p>Belum ada proyek portfolio.</p>
            @endforelse
        </div>
    </section>
@endsection
