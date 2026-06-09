@extends('layouts.admin')

@section('header', 'Edit Education')

@section('content')
@php
    $achievements = old('achievements', $education->achievements);
    $decoded = json_decode($achievements, true);
    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
        $achievements = implode("\n", $decoded);
    }
@endphp

<div class="section-header">
    <div>
        <h1>Edit Education</h1>
        <p>Perbarui riwayat pendidikan di portfolio.</p>
    </div>
</div>

<div class="card form-panel">
    <form action="{{ route('education.update', $education->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid">
            <div class="form-group">
                <label>Institution</label>
                <input type="text" name="institution" value="{{ old('institution', $education->institution) }}" required>
            </div>
            <div class="form-group">
                <label>Degree</label>
                <input type="text" name="degree" value="{{ old('degree', $education->degree) }}" required>
            </div>
        </div>
        <div class="form-group">
            <label>Period</label>
            <input type="text" name="period" value="{{ old('period', $education->period) }}" required>
        </div>
        <div class="form-group">
            <label>Achievements</label>
            <textarea name="achievements" rows="5">{{ $achievements }}</textarea>
        </div>

        <div class="button-row">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Update Education</button>
            <a href="{{ route('education.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
