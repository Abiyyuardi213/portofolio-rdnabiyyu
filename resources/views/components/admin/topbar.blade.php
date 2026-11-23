<div class="top-bar">
    <h2 style="font-weight: 800; color: var(--ink);">@yield('header', 'Dashboard')</h2>
    <div class="toolbar-search" style="border-radius: 8px; border: 1px solid var(--line);"><i class="fas fa-magnifying-glass"></i> Cari data &amp; modul portofolio...</div>
    <div class="user-info">
        <div class="user-pill" style="background: var(--brand-blue); color: #fff; font-weight: 800;">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</div>
        <span style="font-weight: 700; color: var(--ink);">{{ Auth::user()->name ?? 'Admin' }}</span>
        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
            @csrf
            <button type="button" class="logout-btn" id="openLogoutModal"><i class="fas fa-right-from-bracket"></i> Keluar</button>
        </form>
    </div>
</div>
