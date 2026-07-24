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
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Project Title</label>
            <input type="text" name="title" required placeholder="e.g. Employee Management System">
        </div>
        <div class="form-group">
            <label>Description</label>
            <div class="text-editor" data-text-editor>
                <div class="text-editor-toolbar" aria-label="Project description toolbar">
                    <button type="button" class="editor-btn" data-editor-command="bold" title="Bold"><i class="fas fa-bold"></i></button>
                    <button type="button" class="editor-btn" data-editor-command="italic" title="Italic"><i class="fas fa-italic"></i></button>
                    <button type="button" class="editor-btn" data-editor-command="underline" title="Underline"><i class="fas fa-underline"></i></button>
                    <button type="button" class="editor-btn" data-editor-command="insertUnorderedList" title="Bullet list"><i class="fas fa-list-ul"></i></button>
                    <button type="button" class="editor-btn" data-editor-command="insertOrderedList" title="Numbered list"><i class="fas fa-list-ol"></i></button>
                    <button type="button" class="editor-btn" data-editor-command="createLink" title="Add link"><i class="fas fa-link"></i></button>
                    <button type="button" class="editor-btn" data-editor-command="removeFormat" title="Remove format"><i class="fas fa-eraser"></i></button>
                </div>
                <div class="text-editor-area" contenteditable="true" data-editor-area data-placeholder="Tulis deskripsi project...">{!! old('description') !!}</div>
                <textarea name="description" data-editor-input hidden></textarea>
            </div>
        </div>
        <div class="form-grid">
            <div class="form-group">
                <label>Tags</label>
                <input type="text" name="tags" placeholder="e.g. Laravel, MySQL, Vue.js">
            </div>
            <div class="form-group">
                <label>Project Image</label>
                <input type="file" name="image" accept="image/*">
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
