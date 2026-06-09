@extends('layouts.admin')

@section('header', 'Add Experience')

@section('content')
<div class="section-header">
    <div>
        <h1>Add Experience</h1>
        <p>Tambahkan pengalaman kerja ke timeline portfolio.</p>
    </div>
</div>

<div class="card form-panel">
    <form action="{{ route('experiences.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label>Company Name</label>
                <input type="text" name="company" required placeholder="e.g. PT. KAI">
            </div>
            <div class="form-group">
                <label>Role / Position</label>
                <input type="text" name="role" required placeholder="e.g. Web Developer">
            </div>
        </div>
        <div class="form-grid">
            <div class="form-group">
                <label>Period</label>
                <input type="text" name="period" required placeholder="e.g. Jan 2024 - Dec 2024">
            </div>
            <div class="form-group">
                <label>Logo Path</label>
                <input type="text" name="logo" placeholder="e.g. image/kai.png">
            </div>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="5" placeholder="Develop main website&#10;Manage server"></textarea>
        </div>

        <div class="button-row">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Save Experience</button>
            <a href="{{ route('experiences.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
