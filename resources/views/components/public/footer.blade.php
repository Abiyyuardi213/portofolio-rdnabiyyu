<footer class="site-footer">
    <div class="footer-grid">
        <div class="footer-brand">
            <a href="{{ url('/') }}" class="nav-brand">
                <span class="nav-brand-icon"><i class="fas fa-user"></i></span>
                <span>Abiyyu Dev</span>
            </a>
            <p>Portfolio digital yang terhubung langsung dengan data admin.</p>
        </div>
        <div class="footer-links">
            <a href="{{ url('/') }}">About</a>
            <a href="{{ url('/experience') }}">Experience</a>
            <a href="{{ url('/portfolio') }}">Project</a>
            <a href="{{ url('/skills') }}">Skills</a>
            <a href="{{ url('/education') }}">Education</a>
        </div>
        <div class="footer-contact">
            <span>Available for work</span>
            <a href="{{ url('/#contact') }}">Start a conversation</a>
        </div>
    </div>
    <div class="footer-bottom">
        <span>&copy; {{ date('Y') }} Abiyyu Ardilian. All rights reserved.</span>
        <span>Built with Laravel</span>
    </div>
</footer>
