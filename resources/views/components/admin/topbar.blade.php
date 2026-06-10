<div class="top-bar">
    <h2>@yield('header', 'Dashboard')</h2>
    <div class="toolbar-search"><i class="fas fa-magnifying-glass"></i> Search content, modules, and records</div>
    <div class="user-info">
        <div class="user-pill">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</div>
        <span>{{ Auth::user()->name ?? 'Admin' }}</span>
        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
            @csrf
            <button type="button" class="logout-btn" id="openLogoutModal"><i class="fas fa-right-from-bracket"></i> Logout</button>
        </form>
    </div>
</div>
