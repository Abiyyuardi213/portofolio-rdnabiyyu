<div class="modal-backdrop" id="logoutModal" aria-hidden="true">
    <div class="modal-panel" role="dialog" aria-modal="true" aria-labelledby="logoutModalTitle">
        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
            @csrf
            <div class="modal-body">
                <h3 id="logoutModalTitle">Logout dari admin?</h3>
                <p>Sesi admin akan ditutup dan Anda akan kembali ke halaman login.</p>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn btn-outline" id="cancelLogout">Cancel</button>
                <button type="submit" class="btn btn-danger" id="confirmLogout"><i class="fas fa-right-from-bracket"></i> Logout</button>
            </div>
        </form>
    </div>
</div>
