@extends('layouts.admin')

@section('header', 'Profile')

@section('content')
<div class="section-header">
    <div>
        <h1>Profile</h1>
        <p>Lihat identitas utama, bio, dan link sosial portfolio.</p>
    </div>
    @if($profile)
        <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit Profile</a>
    @else
        <a href="{{ route('profile.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Profile</a>
    @endif
</div>

@if($profile)
<div class="card">
    <div class="card-header">
        <div>
            <h3>{{ $profile->name }}</h3>
            <p class="card-subtitle">{{ $profile->role }}</p>
        </div>
    </div>

    <div class="profile-detail-layout">
        <div class="table-wrap">
            <table>
                <tbody>
                    <tr>
                        <th>Bio</th>
                        <td>{!! $profile->bio !!}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $profile->phone ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th>WhatsApp</th>
                        <td>{{ $profile->whatsapp ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $profile->email ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td>{{ $profile->location ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th>GitHub</th>
                        <td>{{ $profile->github ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th>LinkedIn</th>
                        <td>{{ $profile->linkedin ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th>Instagram</th>
                        <td>{{ $profile->instagram ?: '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <aside class="profile-preview-panel">
            <h4>Profile Photo</h4>
            <div class="profile-preview-frame {{ $profile->photo ? 'has-image' : '' }}">
                <span>Belum ada foto profile</span>
                <img src="{{ $profile->photo ? asset($profile->photo) : '' }}" alt="{{ $profile->name }} photo">
            </div>
            @if($profile->photo)
                <p class="card-subtitle" style="margin-top: 0.75rem;">{{ $profile->photo }}</p>
            @endif
            @if($profile->photos->count())
                <h4 style="margin-top: 1rem;">Gallery</h4>
                <div class="profile-gallery-preview">
                    @foreach($profile->photos as $photo)
                        <img src="{{ asset($photo->path) }}" alt="Profile gallery photo">
                    @endforeach
                </div>
            @endif
        </aside>
    </div>
</div>
@else
<div class="card">
    <div class="empty-state">
        <p>Belum ada data profile.</p>
        <div class="button-row" style="justify-content: center;">
            <a href="{{ route('profile.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Profile</a>
        </div>
    </div>
</div>
@endif
@endsection
