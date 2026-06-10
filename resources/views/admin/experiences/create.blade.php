@extends('layouts.admin')

@section('header', 'Add Experience')

@section('content')
<div class="section-header">
    <div>
        <h1>Add Experience</h1>
        <p>Tambahkan pengalaman kerja ke timeline portfolio.</p>
    </div>
</div>

<div class="card form-panel form-panel-wide">
    <form action="{{ route('experiences.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-with-preview">
            <div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" name="company" required placeholder="e.g. PT. KAI">
                    </div>
                    <div class="form-group">
                        <label>Role / Position</label>
                        <input type="text" name="role" required placeholder="e.g. Web Developer">
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Period</label>
                        <input type="text" name="period" required placeholder="e.g. Jan 2024 - Dec 2024">
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <label class="upload-control">
                            <span class="upload-meta">
                                <i class="fas fa-image"></i>
                                <span class="upload-filename" data-logo-filename>No file selected</span>
                            </span>
                            <span class="upload-button"><i class="fas fa-arrow-up-from-bracket"></i> Choose Logo</span>
                            <input type="file" name="logo" accept="image/png,image/jpeg,image/webp" data-logo-input>
                        </label>
                        <input type="hidden" name="cropped_logo" data-cropped-logo>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <div class="text-editor" data-text-editor>
                        <div class="text-editor-toolbar" aria-label="Experience description toolbar">
                            <button type="button" class="editor-btn" data-editor-command="bold" title="Bold"><i class="fas fa-bold"></i></button>
                            <button type="button" class="editor-btn" data-editor-command="italic" title="Italic"><i class="fas fa-italic"></i></button>
                            <button type="button" class="editor-btn" data-editor-command="underline" title="Underline"><i class="fas fa-underline"></i></button>
                            <button type="button" class="editor-btn" data-editor-command="insertUnorderedList" title="Bullet list"><i class="fas fa-list-ul"></i></button>
                            <button type="button" class="editor-btn" data-editor-command="insertOrderedList" title="Numbered list"><i class="fas fa-list-ol"></i></button>
                            <button type="button" class="editor-btn" data-editor-command="createLink" title="Add link"><i class="fas fa-link"></i></button>
                            <button type="button" class="editor-btn" data-editor-command="removeFormat" title="Remove format"><i class="fas fa-eraser"></i></button>
                        </div>
                        <div class="text-editor-area" contenteditable="true" data-editor-area data-placeholder="Tulis deskripsi pengalaman...">{!! old('description') !!}</div>
                        <textarea name="description" data-editor-input hidden></textarea>
                    </div>
                </div>

                <div class="button-row">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Save Experience</button>
                    <a href="{{ route('experiences.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </div>
            <aside class="crop-panel">
                <h4>Logo Crop</h4>
                <div class="crop-frame" data-crop-frame>
                    <span>Pilih logo untuk preview crop</span>
                    <img src="" alt="Logo preview" data-logo-preview>
                </div>
                <div class="crop-control">
                    <label>Zoom</label>
                    <input type="range" min="1" max="2.5" step="0.05" value="1" data-logo-zoom>
                </div>
            </aside>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    const logoInput = document.querySelector('[data-logo-input]');
    const cropFrame = document.querySelector('[data-crop-frame]');
    const preview = document.querySelector('[data-logo-preview]');
    const zoom = document.querySelector('[data-logo-zoom]');
    const croppedLogo = document.querySelector('[data-cropped-logo]');
    const logoFilename = document.querySelector('[data-logo-filename]');
    const experienceForm = logoInput?.closest('form');

    function updateCropPreview() {
        if (!preview?.src) return;
        preview.style.transform = `scale(${zoom.value})`;
    }

    function writeCroppedLogo() {
        if (!preview?.complete || !preview.naturalWidth) return;

        const size = 512;
        const canvas = document.createElement('canvas');
        canvas.width = size;
        canvas.height = size;
        const context = canvas.getContext('2d');
        const scale = Math.max(size / preview.naturalWidth, size / preview.naturalHeight) * Number(zoom.value);
        const width = preview.naturalWidth * scale;
        const height = preview.naturalHeight * scale;

        context.drawImage(preview, (size - width) / 2, (size - height) / 2, width, height);
        croppedLogo.value = canvas.toDataURL('image/png');
    }

    logoInput?.addEventListener('change', () => {
        const file = logoInput.files?.[0];
        if (!file) return;
        if (logoFilename) logoFilename.textContent = file.name;

        const reader = new FileReader();
        reader.onload = (event) => {
            preview.src = event.target.result;
            zoom.value = 1;
            cropFrame.classList.add('has-image');
            preview.onload = () => {
                updateCropPreview();
                writeCroppedLogo();
            };
        };
        reader.readAsDataURL(file);
    });

    zoom?.addEventListener('input', () => {
        updateCropPreview();
        writeCroppedLogo();
    });

    experienceForm?.addEventListener('submit', writeCroppedLogo);
</script>
@endsection
