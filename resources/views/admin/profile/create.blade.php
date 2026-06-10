@extends('layouts.admin')

@section('header', 'Add Profile')

@section('content')
<div class="section-header">
    <div>
        <h1>Add Profile</h1>
        <p>Tambahkan identitas utama untuk public portfolio.</p>
    </div>
</div>

<div class="card form-panel form-panel-wide">
    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.profile.partials.form', ['profile' => null, 'submitLabel' => 'Save Profile'])
    </form>
</div>
@endsection
