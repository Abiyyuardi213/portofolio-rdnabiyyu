@extends('layouts.admin')

@section('header', 'Keterampilan')

@section('content')
<div class="section-header">
    <div>
        <h1>Skills</h1>
        <p>Kelola kategori skill dan daftar teknologi.</p>
    </div>
    <a href="{{ route('skills.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
</div>

<div class="card">
    <div class="card-header">
        <div>
            <h3>Skill Groups</h3>
            <p class="card-subtitle">{{ $skills->count() }} records</p>
        </div>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Items</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skills as $skill)
                <tr>
                    <td>{{ $skill->category }}</td>
                    <td>{{ $skill->items }}</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-outline btn-icon" title="Edit"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Delete this skill?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-icon" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="empty-state">No skills yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
