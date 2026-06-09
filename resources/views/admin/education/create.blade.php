@extends('layouts.admin')

@section('header', 'Add Education')

@section('content')
<div class="section-header">
    <div>
        <h1>Add Education</h1>
        <p>Tambahkan riwayat pendidikan ke portfolio.</p>
    </div>
</div>

<div class="card form-panel">
    <form action="{{ route('education.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label>Institution</label>
                <input type="text" name="institution" required placeholder="e.g. Institut Teknologi Adhi Tama Surabaya">
            </div>
            <div class="form-group">
                <label>Degree</label>
                <input type="text" name="degree" required placeholder="e.g. S1 Teknik Informatika">
            </div>
        </div>
        <div class="form-group">
            <label>Period</label>
            <input type="text" name="period" required placeholder="e.g. 2022 - 2026">
        </div>
        <div class="form-group">
            <label>Achievements</label>
            <textarea name="achievements" rows="5" placeholder="One achievement per line"></textarea>
        </div>

        <div class="button-row">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Save Education</button>
            <a href="{{ route('education.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
