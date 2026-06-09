@extends('layouts.app')

@section('title', 'Pengalaman Kerja - Abiyyu Ardilian')

@section('content')
    <!-- Experience Section -->
    <section id="experience">
        <h2 class="section-title">Pengalaman Kerja</h2>
        <div class="cards-grid">
            @forelse($experiences as $exp)
            <div class="card fade-in">
                <div class="company-logo">
                    @if($exp->logo)
                    <img src="{{ asset($exp->logo) }}" alt="{{ $exp->company }} Logo">
                    @else
                    {{ substr($exp->company, 0, 1) }}
                    @endif
                </div>
                <h3><i class="fas fa-briefcase"></i> {{ $exp->role }}</h3>
                <div class="card-meta"><i class="fas fa-building"></i> {{ $exp->company }} | {{ $exp->period }}</div>
                <ul class="card-list">
                    @php $desc = json_decode($exp->description); @endphp
                    @if(is_array($desc))
                        @foreach($desc as $item)
                        <li><i class="fas fa-check"></i> {{ $item }}</li>
                        @endforeach
                    @else
                        <li><i class="fas fa-check"></i> {{ $exp->description }}</li>
                    @endif
                </ul>
            </div>
            @empty
            <p>Belum ada pengalaman kerja.</p>
            @endforelse
        </div>
    </section>
@endsection
