<nav>
    <div class="nav-container">
        <a href="{{ route('admin.dashboard') }}" class="nav-brand">
            <span class="nav-brand-icon"><i class="fas fa-user-gear"></i></span>
            <span>Abiyyu Admin</span>
        </a>
        <button class="hamburger" id="hamburgerMenu" aria-label="Toggle menu">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu" id="navMenu">
            <li><a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">Overview</a></li>
            <li><a href="{{ route('profile.index') }}" class="nav-link {{ Request::routeIs('profile.*') ? 'active' : '' }}">Profile</a></li>
            <li><a href="{{ route('experiences.index') }}" class="nav-link {{ Request::routeIs('experiences.*') ? 'active' : '' }}">Experience</a></li>
            <li><a href="{{ route('projects.index') }}" class="nav-link {{ Request::routeIs('projects.*') ? 'active' : '' }}">Projects</a></li>
            <li><a href="{{ route('skills.index') }}" class="nav-link {{ Request::routeIs('skills.*') ? 'active' : '' }}">Skills</a></li>
            <li><a href="{{ route('education.index') }}" class="nav-link {{ Request::routeIs('education.*') ? 'active' : '' }}">Education</a></li>
        </ul>
        <div class="nav-actions">
            <a href="{{ url('/') }}" target="_blank" class="nav-icon" aria-label="View Site" title="View Public Site"><i class="fas fa-globe"></i></a>
            <span class="nav-link" style="opacity: 1; font-weight: 700; margin-right: 8px;">{{ Auth::user()->name ?? 'Admin' }}</span>
            <form action="{{ route('logout') }}" method="POST" id="logoutForm" style="margin: 0; display: inline-block;">
                @csrf
                <button type="button" class="nav-cta" id="openLogoutModal">Logout</button>
            </form>
        </div>
    </div>
</nav>
