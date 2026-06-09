@extends('layouts.admin')

@section('header', 'Pendidikan')

@section('content')
<div class="section-header">
    <div>
        <h1>Education</h1>
        <p>Kelola institusi, gelar, periode, dan pencapaian.</p>
    </div>
    <a href="{{ route('education.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
</div>

<div class="card">
    <div class="card-header">
        <div>
            <h3>Education Records</h3>
            <p class="card-subtitle">{{ $education->count() }} records</p>
        </div>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Institution</th>
                    <th>Degree</th>
                    <th>Period</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($education as $edu)
                <tr>
                    <td>{{ $edu->institution }}</td>
                    <td>{{ $edu->degree }}</td>
                    <td>{{ $edu->period }}</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('education.edit', $edu->id) }}" class="btn btn-outline btn-icon" title="Edit"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('education.destroy', $edu->id) }}" method="POST" onsubmit="return confirm('Delete this education?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-icon" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="empty-state">No education records yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
