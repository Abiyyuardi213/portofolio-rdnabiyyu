@extends('layouts.admin')

@section('header', 'Work Experiences')

@section('content')
<div class="section-header">
    <div>
        <h1>Experience</h1>
        <p>Kelola riwayat kerja, posisi, dan periode pengalaman.</p>
    </div>
    <a href="{{ route('experiences.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
</div>

<div class="card">
    <div class="card-header">
        <div>
            <h3>Experience Timeline</h3>
            <p class="card-subtitle">{{ $experiences->count() }} records</p>
        </div>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Company</th>
                    <th>Role</th>
                    <th>Period</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($experiences as $exp)
                <tr>
                    <td>{{ $exp->company }}</td>
                    <td>{{ $exp->role }}</td>
                    <td>{{ $exp->period }}</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('experiences.show', $exp->id) }}" class="btn btn-outline btn-icon" title="Detail"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('experiences.edit', $exp->id) }}" class="btn btn-outline btn-icon" title="Edit"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('experiences.destroy', $exp->id) }}" method="POST" onsubmit="return confirm('Delete this experience?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-icon" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="empty-state">No experiences yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
