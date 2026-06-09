@extends('layouts.admin')

@section('header', 'Portfolio Projects')

@section('content')
<div class="section-header">
    <div>
        <h1>Projects</h1>
        <p>Kelola showcase portfolio dan tautan project.</p>
    </div>
    <a href="{{ route('projects.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
</div>

<div class="card">
    <div class="card-header">
        <div>
            <h3>Project Library</h3>
            <p class="card-subtitle">{{ $projects->count() }} records</p>
        </div>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Tags</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->tags ?: '-' }}</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline btn-icon" title="Edit"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Delete this project?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-icon" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="empty-state">No projects yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
