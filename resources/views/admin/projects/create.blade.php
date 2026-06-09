@extends('layouts.admin')

@section('header', 'Add Project')

@section('content')
<div class="section-header">
    <div>
        <h1>Add Project</h1>
        <p>Buat item portfolio baru untuk halaman public site.</p>
    </div>
</div>

<div class="card form-panel">
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Project Title</label>
            <input type="text" name="title" required placeholder="e.g. Employee Management System">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" required placeholder="Short description of the project"></textarea>
        </div>
        <div class="form-grid">
            <div class="form-group">
                <label>Tags</label>
                <input type="text" name="tags" placeholder="e.g. Laravel, MySQL, Vue.js">
            </div>
            <div class="form-group">
                <label>Image Path</label>
                <input type="text" name="image" placeholder="e.g. image/ss1.png">
            </div>
        </div>
        <div class="form-group">
            <label>External Link</label>
            <input type="url" name="link" placeholder="https://example.com">
        </div>

        <div class="button-row">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Save Project</button>
            <a href="{{ route('projects.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
