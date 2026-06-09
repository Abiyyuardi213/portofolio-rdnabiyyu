<!-- Navbar -->
<nav>
    <div class="nav-container">
        <a href="{{ url('/') }}" class="nav-brand">
            <span class="nav-brand-icon">&lt;/&gt;</span>
            <span>Abiyyu Dev</span>
        </a>
        <button class="hamburger" id="hamburgerMenu" aria-label="Toggle menu">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu" id="navMenu">
            <li><a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Tentang</a></li>
            <li><a href="{{ url('/experience') }}" class="nav-link {{ Request::is('experience') ? 'active' : '' }}">Pengalaman</a></li>
            <li><a href="{{ url('/portfolio') }}" class="nav-link {{ Request::is('portfolio') ? 'active' : '' }}">Portfolio</a></li>
            <li><a href="{{ url('/skills') }}" class="nav-link {{ Request::is('skills') ? 'active' : '' }}">Keterampilan</a></li>
            <li><a href="{{ url('/education') }}" class="nav-link {{ Request::is('education') ? 'active' : '' }}">Pendidikan</a></li>
            <button class="theme-toggle" id="themeToggle" aria-label="Toggle dark mode" data-label="Toggle Dark Mode">
                <i class="fas fa-moon"></i>
            </button>
        </ul>
    </div>
</nav>
