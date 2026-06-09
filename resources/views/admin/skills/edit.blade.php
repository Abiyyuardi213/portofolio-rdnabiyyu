@extends('layouts.admin')

@section('header', 'Edit Skill')

@section('content')
<div class="section-header">
    <div>
        <h1>Edit Skill</h1>
        <p>Perbarui kategori skill dan item teknologi.</p>
    </div>
</div>

<div class="card form-panel">
    <form action="{{ route('skills.update', $skill->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid">
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" value="{{ old('category', $skill->category) }}" required>
            </div>
            <div class="form-group">
                <label>Icon</label>
                <input type="text" name="icon" value="{{ old('icon', $skill->icon) }}">
            </div>
        </div>
        <div class="form-group">
            <label>Items</label>
            <textarea name="items" rows="4" required>{{ old('items', $skill->items) }}</textarea>
        </div>

        <div class="button-row">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Update Skill</button>
            <a href="{{ route('skills.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
