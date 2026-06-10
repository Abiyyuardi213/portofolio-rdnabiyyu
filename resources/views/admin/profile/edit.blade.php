@extends('layouts.admin')

@section('header', 'Edit Profile')

@section('content')
<div class="section-header">
    <div>
        <h1>Edit Profile</h1>
        <p>Perbarui identitas utama, bio, dan link sosial portfolio.</p>
    </div>
</div>

<div class="card form-panel form-panel-wide">
    <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.profile.partials.form', ['profile' => $profile, 'submitLabel' => 'Update Profile'])
    </form>
</div>
@endsection
