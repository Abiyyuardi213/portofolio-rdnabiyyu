<div class="profile-form-layout">
    <div>
        <div class="form-grid">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" value="{{ old('name', $profile->name ?? '') }}" required>
            </div>
            <div class="form-group">
                <label>Role / Tagline</label>
                <input type="text" name="role" value="{{ old('role', $profile->role ?? '') }}" required>
            </div>
        </div>
        <div class="form-group">
            <label>Profile Photo</label>
            <label class="upload-control">
                <span class="upload-meta">
                    <i class="fas fa-image"></i>
                    <span class="upload-filename" data-upload-filename>{{ $profile?->photo ? basename($profile->photo) : 'No file selected' }}</span>
                </span>
                <span class="upload-button"><i class="fas fa-arrow-up-from-bracket"></i> Choose Photo</span>
                <input type="file" name="photo" accept="image/png,image/jpeg,image/webp" data-profile-photo-input>
            </label>
            <input type="hidden" name="cropped_photo" data-cropped-photo>
            @if($profile?->photo)
                <div class="profile-photo-preview">
                    <img src="{{ asset($profile->photo) }}" alt="{{ $profile->name }} photo">
                    <span>{{ $profile->photo }}</span>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Additional Profile Photos</label>
            <label class="upload-control">
                <span class="upload-meta">
                    <i class="fas fa-images"></i>
                    <span class="upload-filename" data-gallery-filename>{{ $profile?->photos?->count() ? $profile->photos->count() . ' photos saved' : 'No gallery photos selected' }}</span>
                </span>
                <span class="upload-button"><i class="fas fa-plus"></i> Choose Photos</span>
                <input type="file" name="photos[]" accept="image/png,image/jpeg,image/webp" multiple data-gallery-photo-input>
            </label>
        </div>
        <div class="form-group">
            <label>Bio</label>
            <div class="text-editor" data-text-editor>
                <div class="text-editor-toolbar" aria-label="Bio editor toolbar">
                    <button type="button" class="editor-btn" data-editor-command="bold" title="Bold"><i class="fas fa-bold"></i></button>
                    <button type="button" class="editor-btn" data-editor-command="italic" title="Italic"><i class="fas fa-italic"></i></button>
                    <button type="button" class="editor-btn" data-editor-command="underline" title="Underline"><i class="fas fa-underline"></i></button>
                    <button type="button" class="editor-btn" data-editor-command="insertUnorderedList" title="Bullet list"><i class="fas fa-list-ul"></i></button>
                    <button type="button" class="editor-btn" data-editor-command="insertOrderedList" title="Numbered list"><i class="fas fa-list-ol"></i></button>
                    <button type="button" class="editor-btn" data-editor-command="createLink" title="Add link"><i class="fas fa-link"></i></button>
                    <button type="button" class="editor-btn" data-editor-command="removeFormat" title="Remove format"><i class="fas fa-eraser"></i></button>
                </div>
                <div class="text-editor-area" contenteditable="true" data-editor-area data-placeholder="Tulis bio profile...">{!! old('bio', $profile->bio ?? '') !!}</div>
                <textarea name="bio" data-editor-input hidden required></textarea>
            </div>
        </div>
        <div class="form-grid">
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $profile->phone ?? '') }}">
            </div>
            <div class="form-group">
                <label>WhatsApp</label>
                <input type="text" name="whatsapp" value="{{ old('whatsapp', $profile->whatsapp ?? '') }}">
            </div>
        </div>
        <div class="form-grid">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" value="{{ old('location', $profile->location ?? '') }}">
            </div>
        </div>
        <div class="form-grid">
            <div class="form-group">
                <label>GitHub Link</label>
                <input type="text" name="github" value="{{ old('github', $profile->github ?? '') }}">
            </div>
            <div class="form-group">
                <label>LinkedIn Link</label>
                <input type="text" name="linkedin" value="{{ old('linkedin', $profile->linkedin ?? '') }}">
            </div>
        </div>
        <div class="form-group">
            <label>Instagram Link</label>
            <input type="text" name="instagram" value="{{ old('instagram', $profile->instagram ?? '') }}">
        </div>
    </div>
    <aside class="profile-preview-panel">
        <h4>Profile Preview</h4>
        <div class="profile-preview-frame {{ $profile?->photo ? 'has-image' : '' }}" data-profile-preview-frame>
            <span>Foto profile akan tampil di sini</span>
            <img src="{{ $profile?->photo ? asset($profile->photo) : '' }}" alt="Profile photo preview" data-profile-photo-preview>
        </div>
        <div class="crop-control">
            <label>Zoom</label>
            <input type="range" min="1" max="2.5" step="0.05" value="1" data-profile-photo-zoom>
        </div>
        <p class="card-subtitle" style="margin-top: 0.65rem;">Pilih gambar di bawah, lalu drag foto di area preview untuk mengatur crop.</p>
        <div class="profile-gallery-preview" data-gallery-preview>
            @foreach(($profile?->photos ?? collect()) as $photo)
                <img src="{{ asset($photo->path) }}" alt="Profile gallery photo">
            @endforeach
        </div>
    </aside>
</div>

<div class="button-row">
    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> {{ $submitLabel }}</button>
    <a href="{{ route('profile.index') }}" class="btn btn-outline">Cancel</a>
</div>
