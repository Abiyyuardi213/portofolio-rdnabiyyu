<nav>
    <div class="nav-container">
        <a href="{{ url('/') }}" class="nav-brand">
            <span class="nav-brand-icon"><i class="fas fa-user"></i></span>
            <span>Abiyyu Dev</span>
        </a>
        <button class="hamburger" id="hamburgerMenu" aria-label="Toggle menu">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu" id="navMenu">
            <li><a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ url('/experience') }}" class="nav-link {{ Request::is('experience') ? 'active' : '' }}">Experience</a></li>
            <li><a href="{{ url('/portfolio') }}" class="nav-link {{ Request::is('portfolio') ? 'active' : '' }}">Project</a></li>
            <li><a href="{{ url('/skills') }}" class="nav-link {{ Request::is('skills') ? 'active' : '' }}">Skills</a></li>
            <li><a href="{{ url('/education') }}" class="nav-link {{ Request::is('education') ? 'active' : '' }}">Education</a></li>
        </ul>
        <div class="nav-actions">
            <a href="{{ url('/portfolio') }}" class="nav-icon" aria-label="Portfolio"><i class="fas fa-briefcase"></i></a>
            <a href="{{ url('/education') }}" class="nav-link">Pages <i class="fas fa-chevron-down" style="font-size: 10px; margin-left: 5px;"></i></a>
            <a href="{{ url('/#contact') }}" class="nav-cta">Hire Me!</a>
        </div>
    </div>
</nav>
