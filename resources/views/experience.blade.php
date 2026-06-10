@extends('layouts.app')

@section('title', 'Pengalaman Kerja - Abiyyu Ardilian')

@section('content')
<div class="page-shell">
    <div class="page-heading">
        <div>
            <div class="page-kicker">Experience</div>
            <h1>Pengalaman Kerja</h1>
        </div>
        <p>Riwayat peran, tanggung jawab, dan kontribusi yang membentuk cara saya membangun produk dan mengelola sistem.</p>
    </div>

    <div class="record-list">
        @forelse($experiences as $exp)
        <article class="record-row">
            <div class="record-icon">
                @if($exp->logo)
                    <img src="{{ asset($exp->logo) }}" alt="{{ $exp->company }} Logo" style="width:100%; height:100%; object-fit:contain; padding:7px;">
                @else
                    {{ substr($exp->company, 0, 1) }}
                @endif
            </div>
            <div>
                <h3>{{ $exp->role }}</h3>
                <p>{{ $exp->company }} · {{ $exp->period }}</p>
            </div>
            @php
                $desc = json_decode($exp->description, true);
                $description = $exp->description;
            @endphp
            @if(is_array($desc))
                <ul class="clean-list">
                    @foreach($desc as $item)
                    <li><i class="fas fa-check"></i> {{ $item }}</li>
                    @endforeach
                </ul>
            @else
                <div class="record-description">
                    @if($description && $description !== strip_tags($description))
                        {!! $description !!}
                    @elseif($description)
                        {!! nl2br(e($description)) !!}
                    @else
                        <p>Deskripsi pengalaman belum tersedia.</p>
                    @endif
                </div>
            @endif
        </article>
        @empty
        <p>Belum ada pengalaman kerja.</p>
        @endforelse
    </div>
</div>
@endsection
