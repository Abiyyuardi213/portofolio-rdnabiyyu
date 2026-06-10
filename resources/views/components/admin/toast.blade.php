@if(session('success'))
    <div class="alert alert-success toast" role="status" aria-live="polite">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@elseif(session('error') || $errors->any())
    <div class="alert alert-error toast" role="alert" aria-live="assertive">
        <i class="fas fa-circle-exclamation"></i>
        {{ session('error') ?? $errors->first() }}
    </div>
@endif
