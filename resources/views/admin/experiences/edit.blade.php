@extends('layouts.admin')

@section('header', 'Edit Experience')

@section('content')
@php
    $description = old('description', $experience->description);
    $decoded = json_decode($description, true);
    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
        $description = implode("\n", $decoded);
    }
@endphp

<div class="section-header">
    <div>
        <h1>Edit Experience</h1>
        <p>Perbarui riwayat kerja di timeline portfolio.</p>
    </div>
</div>

<div class="card form-panel">
    <form action="{{ route('experiences.update', $experience->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid">
            <div class="form-group">
                <label>Company Name</label>
                <input type="text" name="company" value="{{ old('company', $experience->company) }}" required>
            </div>
            <div class="form-group">
                <label>Role / Position</label>
                <input type="text" name="role" value="{{ old('role', $experience->role) }}" required>
            </div>
        </div>
        <div class="form-grid">
            <div class="form-group">
                <label>Period</label>
                <input type="text" name="period" value="{{ old('period', $experience->period) }}" required>
            </div>
            <div class="form-group">
                <label>Logo Path</label>
                <input type="text" name="logo" value="{{ old('logo', $experience->logo) }}">
            </div>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="5">{{ $description }}</textarea>
        </div>

        <div class="button-row">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Update Experience</button>
            <a href="{{ route('experiences.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
