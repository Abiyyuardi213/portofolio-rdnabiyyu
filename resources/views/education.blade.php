@extends('layouts.app')

@section('title', 'Pendidikan - Abiyyu Ardilian')

@section('content')
    <!-- Education Section -->
    <section id="education">
        <h2 class="section-title">Pendidikan</h2>
        @forelse($educations as $edu)
        <div class="education-item fade-in">
            <h3>{{ $edu->institution }}</h3>
            <div class="meta"><i class="fas fa-graduation-cap"></i> {{ $edu->degree }} | {{ $edu->period }}</div>
            <ul>
                @php $ach = json_decode($edu->achievements); @endphp
                @if(is_array($ach))
                    @foreach($ach as $item)
                    <li><i class="fas fa-star"></i> {{ $item }}</li>
                    @endforeach
                @else
                    <li><i class="fas fa-star"></i> {{ $edu->achievements }}</li>
                @endif
            </ul>
        </div>
        @empty
        <p>Belum ada data pendidikan.</p>
        @endforelse
    </section>
@endsection
