@extends('layouts.admin')

@section('header', 'Edit Project')

@section('content')
<div class="section-header">
    <div>
        <h1>Edit Project</h1>
        <p>Perbarui detail portfolio project.</p>
    </div>
</div>

<div class="card form-panel">
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Project Title</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" required>{{ old('description', $project->description) }}</textarea>
        </div>
        <div class="form-grid">
            <div class="form-group">
                <label>Tags</label>
                <input type="text" name="tags" value="{{ old('tags', $project->tags) }}">
            </div>
            <div class="form-group">
                <label>Image Path</label>
                <input type="text" name="image" value="{{ old('image', $project->image) }}">
            </div>
        </div>
        <div class="form-group">
            <label>External Link</label>
            <input type="url" name="link" value="{{ old('link', $project->link) }}">
        </div>

        <div class="button-row">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Update Project</button>
            <a href="{{ route('projects.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
