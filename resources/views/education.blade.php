@extends('layouts.app')

@section('title', 'Pendidikan - Abiyyu Ardilian')

@section('content')
<div class="page-shell">
    <div class="page-heading">
        <div>
            <div class="page-kicker">Education</div>
            <h1>Pendidikan</h1>
        </div>
        <p>Riwayat pendidikan, fokus pembelajaran, dan pencapaian yang mendukung perjalanan profesional saya.</p>
    </div>

    <div class="record-list">
        @forelse($educations as $edu)
        <article class="record-row">
            <div class="record-icon"><i class="fas fa-graduation-cap"></i></div>
            <div>
                <h3>{{ $edu->institution }}</h3>
                <p>{{ $edu->degree }} · {{ $edu->period }}</p>
            </div>
            <ul class="clean-list">
                @php $ach = json_decode($edu->achievements); @endphp
                @if(is_array($ach))
                    @foreach($ach as $item)
                    <li><i class="fas fa-star"></i> {{ $item }}</li>
                    @endforeach
                @elseif($edu->achievements)
                    <li><i class="fas fa-star"></i> {{ $edu->achievements }}</li>
                @else
                    <li><i class="fas fa-star"></i> Data pencapaian belum ditambahkan.</li>
                @endif
            </ul>
        </article>
        @empty
        <p>Belum ada data pendidikan.</p>
        @endforelse
    </div>
</div>
@endsection
