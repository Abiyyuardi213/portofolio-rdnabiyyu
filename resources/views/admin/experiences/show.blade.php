@extends('layouts.admin')

@section('header', 'Experience Detail')

@section('content')
@php
    $description = $experience->description;
    $decoded = json_decode($description, true);
@endphp

<div class="section-header">
    <div>
        <h1>Experience Detail</h1>
        <p>Lihat informasi lengkap pengalaman kerja yang sudah diinput.</p>
    </div>
    <div class="button-row">
        <a href="{{ route('experiences.edit', $experience->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit Experience</a>
        <a href="{{ route('experiences.index') }}" class="btn btn-outline">Back</a>
    </div>
</div>

<div class="card form-panel form-panel-wide">
    <div class="profile-detail-layout">
        <div>
            <h2>{{ $experience->role }}</h2>
            <p class="card-subtitle">{{ $experience->company }} · {{ $experience->period }}</p>

            <div class="detail-table" style="margin-top: 18px;">
                <div class="detail-row">
                    <span>Company</span>
                    <strong>{{ $experience->company }}</strong>
                </div>
                <div class="detail-row">
                    <span>Role</span>
                    <strong>{{ $experience->role }}</strong>
                </div>
                <div class="detail-row">
                    <span>Period</span>
                    <strong>{{ $experience->period }}</strong>
                </div>
                <div class="detail-row detail-row-block">
                    <span>Description</span>
                    <div class="rich-preview">
                        @if(is_array($decoded))
                            <ul>
                                @foreach($decoded as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        @elseif($description && $description !== strip_tags($description))
                            {!! $description !!}
                        @elseif($description)
                            {!! nl2br(e($description)) !!}
                        @else
                            <p>-</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <aside class="profile-preview-panel">
            <h4>Company Logo</h4>
            <div class="profile-photo-card" style="aspect-ratio: 1; display: grid; place-items: center; padding: 20px;">
                @if($experience->logo)
                    <img src="{{ asset($experience->logo) }}" alt="{{ $experience->company }} logo" style="width: 100%; height: 100%; object-fit: contain;">
                @else
                    <span class="empty-state">No logo uploaded.</span>
                @endif
            </div>
        </aside>
    </div>
</div>
@endsection
