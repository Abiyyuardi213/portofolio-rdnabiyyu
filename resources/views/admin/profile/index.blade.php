@extends('layouts.admin')

@section('header', 'Edit Profile')

@section('content')
<div class="section-header">
    <div>
        <h1>Profile</h1>
        <p>Perbarui identitas utama, bio, dan link sosial portfolio.</p>
    </div>
</div>

<div class="card form-panel">
    @if($profile)
    <form action="{{ route('profile.update', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" value="{{ old('name', $profile->name) }}" required>
            </div>
            <div class="form-group">
                <label>Role / Tagline</label>
                <input type="text" name="role" value="{{ old('role', $profile->role) }}" required>
            </div>
        </div>
        <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" rows="5" required>{{ old('bio', $profile->bio) }}</textarea>
        </div>
        <div class="form-grid">
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}">
            </div>
            <div class="form-group">
                <label>WhatsApp</label>
                <input type="text" name="whatsapp" value="{{ old('whatsapp', $profile->whatsapp) }}">
            </div>
        </div>
        <div class="form-grid">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $profile->email) }}">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" value="{{ old('location', $profile->location) }}">
            </div>
        </div>
        <div class="form-grid">
            <div class="form-group">
                <label>GitHub Link</label>
                <input type="text" name="github" value="{{ old('github', $profile->github) }}">
            </div>
            <div class="form-group">
                <label>LinkedIn Link</label>
                <input type="text" name="linkedin" value="{{ old('linkedin', $profile->linkedin) }}">
            </div>
        </div>
        <div class="form-group">
            <label>Instagram Link</label>
            <input type="text" name="instagram" value="{{ old('instagram', $profile->instagram) }}">
        </div>

        <div class="button-row">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Update Profile</button>
        </div>
    </form>
    @else
    <div class="empty-state">Profile not found. Please run seeder.</div>
    @endif
</div>
@endsection
