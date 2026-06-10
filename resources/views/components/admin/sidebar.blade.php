<aside class="sidebar">
    <div class="window-controls" aria-hidden="true">
        <span class="traffic-light red"></span>
        <span class="traffic-light yellow"></span>
        <span class="traffic-light green"></span>
    </div>
    <div class="sidebar-header">
        <div class="app-icon"><i class="fas fa-terminal"></i></div>
        <div>
            <div class="brand-title">Portfolio Admin</div>
            <div class="brand-subtitle">macOS workspace</div>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="sidebar-section">Dashboard</li>
        <li><a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fas fa-chart-line"></i> Overview</a></li>
        <li><a href="{{ route('profile.index') }}" class="sidebar-link {{ Request::routeIs('profile.*') ? 'active' : '' }}"><i class="fas fa-user"></i> Profile</a></li>
        <li class="sidebar-section">Content</li>
        <li><a href="{{ route('experiences.index') }}" class="sidebar-link {{ Request::routeIs('experiences.*') ? 'active' : '' }}"><i class="fas fa-briefcase"></i> Experience</a></li>
        <li><a href="{{ route('projects.index') }}" class="sidebar-link {{ Request::routeIs('projects.*') ? 'active' : '' }}"><i class="fas fa-folder-open"></i> Projects</a></li>
        <li><a href="{{ route('skills.index') }}" class="sidebar-link {{ Request::routeIs('skills.*') ? 'active' : '' }}"><i class="fas fa-wand-magic-sparkles"></i> Skills</a></li>
        <li><a href="{{ route('education.index') }}" class="sidebar-link {{ Request::routeIs('education.*') ? 'active' : '' }}"><i class="fas fa-graduation-cap"></i> Education</a></li>
        <li class="sidebar-section">External</li>
        <li><a href="{{ url('/') }}" target="_blank" class="sidebar-link"><i class="fas fa-globe"></i> View Site</a></li>
    </ul>
</aside>
