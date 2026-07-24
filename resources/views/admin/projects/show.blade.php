@extends('layouts.admin')

@section('header', 'Project Detail')

@section('content')
@php
    $description = $project->description;
@endphp

<div class="section-header">
    <div>
        <h1>Project Detail</h1>
        <p>Lihat informasi lengkap project portfolio yang sudah diinput.</p>
    </div>
    <div class="button-row">
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit Project</a>
        <a href="{{ route('projects.index') }}" class="btn btn-outline">Back</a>
    </div>
</div>

<div class="card form-panel form-panel-wide">
    <div class="profile-detail-layout">
        <div>
            <h2>{{ $project->title }}</h2>
            <p class="card-subtitle" style="margin-top: 8px;">
                @if($project->tags)
                    @foreach(explode(',', $project->tags) as $tag)
                        @if(trim($tag) !== '')
                            <span class="tag-pill">{{ trim($tag) }}</span>
                        @endif
                    @endforeach
                @else
                    -
                @endif
            </p>

            <div class="detail-table" style="margin-top: 18px;">
                <div class="detail-row">
                    <span>Project Title</span>
                    <strong>{{ $project->title }}</strong>
                </div>
                <div class="detail-row">
                    <span>Tags</span>
                    <strong>{{ $project->tags ?: '-' }}</strong>
                </div>
                <div class="detail-row">
                    <span>External Link</span>
                    <strong>
                        @if($project->link)
                            <a href="{{ $project->link }}" target="_blank" style="color: var(--ink); text-decoration: underline; font-weight: 700;">{{ $project->link }} <i class="fas fa-arrow-up-right-from-square" style="font-size: 11px; margin-left: 2px;"></i></a>
                        @else
                            -
                        @endif
                    </strong>
                </div>
                <div class="detail-row detail-row-block">
                    <span>Description</span>
                    <div class="rich-preview">
                        @if($description && $description !== strip_tags($description))
                            {!! $description !!}
                        @elseif($description)
                            {!! nl2br(e($description)) !!}
                        @else
                            <p>-</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <aside class="profile-preview-panel">
            <h4>Project Image</h4>
            <div class="profile-photo-card" style="aspect-ratio: 1.3; display: grid; place-items: center; padding: 12px; background: #fff;">
                @if($project->image)
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }} image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px; border: 1px solid var(--line);">
                @else
                    <span class="empty-state">No image uploaded.</span>
                @endif
            </div>
        </aside>
    </div>
</div>
@endsection
