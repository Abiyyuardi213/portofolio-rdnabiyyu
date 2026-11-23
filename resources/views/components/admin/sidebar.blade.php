<aside class="sidebar">
    <div class="sidebar-header" style="padding: 24px 20px; border-bottom: 1px solid var(--line); display: flex; align-items: center; gap: 12px;">
        <div class="app-icon" style="width: 38px; height: 38px; border-radius: 10px; background: var(--brand-blue); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 15px; box-shadow: 0 4px 10px rgba(37,99,235,0.25);">
            <i class="fas fa-terminal"></i>
        </div>
        <div>
            <div class="brand-title" style="font-weight: 800; font-size: 14px; color: var(--ink); tracking-tight;">Abiyyu Dev</div>
            <div class="brand-subtitle" style="font-size: 11px; color: var(--muted); font-weight: 600;">Control Center</div>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="sidebar-section" style="padding: 12px 16px 6px; font-size: 11px; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 0.05em;">Dashboard</li>
        <li><a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fas fa-chart-line"></i> Overview</a></li>
        <li><a href="{{ route('profile.index') }}" class="sidebar-link {{ Request::routeIs('profile.*') ? 'active' : '' }}"><i class="fas fa-user"></i> Profile</a></li>
        <li class="sidebar-section" style="padding: 12px 16px 6px; font-size: 11px; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 0.05em;">Content</li>
        <li><a href="{{ route('experiences.index') }}" class="sidebar-link {{ Request::routeIs('experiences.*') ? 'active' : '' }}"><i class="fas fa-briefcase"></i> Experience</a></li>
        <li><a href="{{ route('projects.index') }}" class="sidebar-link {{ Request::routeIs('projects.*') ? 'active' : '' }}"><i class="fas fa-folder-open"></i> Projects</a></li>
        <li><a href="{{ route('skills.index') }}" class="sidebar-link {{ Request::routeIs('skills.*') ? 'active' : '' }}"><i class="fas fa-wand-magic-sparkles"></i> Skills</a></li>
        <li><a href="{{ route('education.index') }}" class="sidebar-link {{ Request::routeIs('education.*') ? 'active' : '' }}"><i class="fas fa-graduation-cap"></i> Education</a></li>
        <li class="sidebar-section" style="padding: 12px 16px 6px; font-size: 11px; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: 0.05em;">Tampilan Publik</li>
        <li><a href="{{ url('/') }}" target="_blank" class="sidebar-link"><i class="fas fa-globe"></i> View Website</a></li>
    </ul>
</aside>
