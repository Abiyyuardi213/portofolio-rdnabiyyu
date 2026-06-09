@extends('layouts.admin')

@section('header', 'Add Skill')

@section('content')
<div class="section-header">
    <div>
        <h1>Add Skill</h1>
        <p>Tambahkan kategori skill dan item teknologi.</p>
    </div>
</div>

<div class="card form-panel">
    <form action="{{ route('skills.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" required placeholder="e.g. Backend">
            </div>
            <div class="form-group">
                <label>Icon</label>
                <input type="text" name="icon" placeholder="e.g. fas fa-code">
            </div>
        </div>
        <div class="form-group">
            <label>Items</label>
            <textarea name="items" rows="4" required placeholder="Laravel, MySQL, REST API"></textarea>
        </div>

        <div class="button-row">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Save Skill</button>
            <a href="{{ route('skills.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
