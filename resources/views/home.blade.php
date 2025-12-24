<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abiyyu Ardilian - Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root {
            --bg-primary: #ffffff;
            --bg-secondary: #f8f9fa;
            --text-primary: #0f1419;
            --text-secondary: #6c757d;
            --border-color: #e0e0e0;
            --accent-color: #0066ff;
            --accent-hover: #0052cc;
            --card-bg: #ffffff;
            --card-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            --card-shadow-hover: 0 8px 24px rgba(0, 0, 0, 0.12);
        }
        html.dark-mode {
            --bg-primary: #0f1419;
            --bg-secondary: #1a1f26;
            --text-primary: #ffffff;
            --text-secondary: #b0b8c1;
            --border-color: #2d333b;
            --accent-color: #58a6ff;
            --accent-hover: #79c0ff;
            --card-bg: #161b22;
            --card-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
            --card-shadow-hover: 0 8px 24px rgba(0, 0, 0, 0.5);
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            transition: background-color 0.3s ease, color 0.3s ease;
            line-height: 1.6;
        }
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: var(--bg-primary);
            border-bottom: 1px solid var(--border-color);
            backdrop-filter: blur(10px);
            z-index: 1000;
            transition: all 0.3s ease;
        }
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-brand {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            text-decoration: none;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .nav-brand-icon {
            font-family: 'Courier New', monospace;
            font-weight: 900;
            font-size: 1.5rem;
            color: var(--accent-color);
        }
        .nav-brand:hover {
            color: var(--accent-color);
        }
        .nav-brand:hover .nav-brand-icon {
            transform: rotate(180deg);
        }
        .hamburger {
            display: none;
            background: none;
            border: none;
            color: var(--text-primary);
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1001;
        }
        .hamburger:hover {
            color: var(--accent-color);
        }
        .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
            list-style: none;
        }
        .nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: var(--accent-color);
        }
        .theme-toggle {
            background: none;
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }
        .theme-toggle:hover {
            background-color: var(--bg-secondary);
            border-color: var(--accent-color);
            color: var(--accent-color);
            transform: rotate(20deg);
        }
        .hero {
            margin-top: 80px;
            padding: 80px 2rem;
            background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-primary) 100%);
            text-align: left;
        }
        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }
        .hero-image {
            order: -1;
        }
        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        .hero-content p {
            font-size: 1.125rem;
            color: var(--text-secondary);
            margin-bottom: 2rem;
        }
        .hero-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .btn {
            padding: 0.75rem 1.75rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-primary {
            background-color: var(--accent-color);
            color: white;
        }
        .btn-primary:hover {
            background-color: var(--accent-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 102, 255, 0.3);
        }
        .btn-secondary {
            background-color: var(--bg-secondary);
            color: var(--text-primary);
            border: 1px solid var(--border-color);
        }
        .btn-secondary:hover {
            border-color: var(--accent-color);
            background-color: var(--bg-primary);
        }
        .social-icons {
            display: flex;
            gap: 1rem;
        }
        .social-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-primary);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.25rem;
        }
        .social-icon:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: white;
            transform: translateY(-4px);
        }
        .hero-image {
            position: relative;
            width: 100%;
            max-width: 400px;
            height: 400px;
            border-radius: 16px;
            overflow: hidden;
        }
        .slider-container {
            position: relative;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--accent-color), #00d4ff);
        }
        .slider-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 16px;
        }
        .slider-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }
        .slider-item {
            min-width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--card-bg);
        }
        .slider-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .slider-controls {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 10;
        }
        .slider-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        .slider-dot.active {
            background-color: white;
            width: 30px;
            border-radius: 5px;
        }
        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 9;
        }
        .slider-arrow:hover {
            background-color: rgba(255, 255, 255, 0.6);
        }
        .slider-arrow.prev {
            left: 15px;
        }
        .slider-arrow.next {
            right: 15px;
        }
        section {
            padding: 80px 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            text-align: left;
            position: relative;
            display: inline-block;
        }
        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background-color: var(--accent-color);
            border-radius: 2px;
            margin-top: 0.5rem;
        }
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        .card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 2rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-shadow-hover);
            border-color: var(--accent-color);
        }
        .card h3 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }
        .card p {
            color: var(--text-secondary);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }
        .card-meta {
            font-size: 0.85rem;
            color: var(--text-secondary);
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        .card-list {
            list-style: none;
            margin-top: 1rem;
        }
        .card-list li {
            padding: 0.5rem 0;
            color: var(--text-secondary);
            font-size: 0.95rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }
        .card-list i {
            color: var(--accent-color);
            margin-top: 0.25rem;
            flex-shrink: 0;
        }
        .company-logo {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
            border-radius: 8px;
            background-color: var(--bg-secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--accent-color);
            font-weight: 700;
            border: 2px solid var(--accent-color);
        }
        .company-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 8px;
        }
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        .skill-box {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
        }
        .skill-box:hover {
            background-color: var(--accent-color);
            color: white;
            border-color: var(--accent-color);
            transform: translateY(-4px);
        }
        .skill-icon {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
            transition: color 0.3s ease;
        }
        .skill-box h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }
        .skill-box p {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }
        .skill-box:hover p {
            color: rgba(255, 255, 255, 0.9);
        }
        .education-item {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            border-left: 4px solid var(--accent-color);
            transition: all 0.3s ease;
        }
        .education-item:hover {
            box-shadow: var(--card-shadow-hover);
        }
        .education-item h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }
        .education-item .meta {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin-bottom: 1rem;
        }
        .education-item ul {
            list-style: none;
            padding-left: 0;
        }
        .education-item li {
            padding: 0.5rem 0;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .education-item i {
            color: var(--accent-color);
            font-size: 0.8rem;
        }
        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .portfolio-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .portfolio-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-shadow-hover);
            border-color: var(--accent-color);
        }

        .portfolio-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, var(--accent-color), #00d4ff);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .portfolio-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .portfolio-card:hover .portfolio-overlay {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .portfolio-overlay i {
            color: white;
            font-size: 2rem;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .portfolio-card:hover .portfolio-overlay i {
            opacity: 1;
        }

        .portfolio-content {
            padding: 1.5rem;
        }

        .portfolio-content h3 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .portfolio-content p {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-bottom: 1rem;
        }

        .portfolio-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .tag {
            display: inline-block;
            background-color: var(--bg-secondary);
            color: var(--accent-color);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Contact Form Section */
        .contact-section {
            background-color: var(--bg-secondary);
            border-radius: 12px;
            padding: 3rem;
            margin-bottom: 3rem;
        }

        .contact-section h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background-color: var(--card-bg);
            color: var(--text-primary);
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        /* Footer */
        footer {
            background-color: var(--bg-secondary);
            border-top: 1px solid var(--border-color);
            padding: 2rem;
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .nav-container {
                padding: 1rem 1.5rem;
                flex-wrap: wrap;
            }

            .nav-menu {
                position: absolute;
                top: 70px;
                left: 0;
                right: 0;
                background-color: var(--bg-primary);
                border-bottom: 1px solid var(--border-color);
                flex-direction: column;
                gap: 0;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
                width: 100%;
                padding: 0;
                align-items: stretch;
                z-index: 999;
            }

            .nav-menu.active {
                max-height: 500px;
                padding: 1rem 0;
            }

            .nav-menu li {
                border-bottom: 1px solid var(--border-color);
            }

            .nav-menu li:last-child {
                border-bottom: none;
            }

            .nav-link {
                display: block;
                padding: 1rem 1.5rem;
                font-size: 1rem;
            }

            .theme-toggle {
                width: 100%;
                border-radius: 0;
                border: none;
                border-top: 1px solid var(--border-color);
                height: auto;
                padding: 1rem 1.5rem;
                justify-content: flex-start;
                gap: 1rem;
            }

            .theme-toggle::before {
                content: attr(data-label);
                font-size: 1rem;
                font-weight: 500;
                color: var(--text-secondary);
            }

            .nav-menu.active .theme-toggle {
                background-color: var(--bg-secondary);
            }

            .hero-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .hero-image {
                order: 0;
                max-width: 100%;
                height: 300px;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .cards-grid {
                grid-template-columns: 1fr;
            }

            .portfolio-grid {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="nav-container">
            <a href="#" class="nav-brand">
                <span class="nav-brand-icon">&lt;/&gt;</span>
                <span>Abiyyu Dev</span>
            </a>
            <button class="hamburger" id="hamburgerMenu" aria-label="Toggle menu">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu" id="navMenu">
                <li><a href="#about" class="nav-link">Tentang</a></li>
                <li><a href="#experience" class="nav-link">Pengalaman</a></li>
                <li><a href="#portfolio" class="nav-link">Portfolio</a></li>
                <li><a href="#skills" class="nav-link">Keterampilan</a></li>
                <li><a href="#education" class="nav-link">Pendidikan</a></li>
                <button class="theme-toggle" id="themeToggle" aria-label="Toggle dark mode" data-label="Toggle Dark Mode">
                    <i class="fas fa-moon"></i>
                </button>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-image">
                <div class="slider-container">
                    <div class="slider-wrapper">
                        <div class="slider-track" id="sliderTrack">
                            <div class="slider-item">
                                <img src="{{ asset('image/profile1.jpg') }}" alt="Profile Picture 1">
                            </div>
                            <div class="slider-item">
                                <img src="{{ asset('image/profile2.jpg') }}" alt="Profile Picture 2">
                            </div>
                            <div class="slider-item">
                                <img src="{{ asset('image/profile3.jpg') }}" alt="Profile Picture 3">
                            </div>
                        </div>
                    </div>
                    <button class="slider-arrow prev" id="prevBtn"><i class="fas fa-chevron-left"></i></button>
                    <button class="slider-arrow next" id="nextBtn"><i class="fas fa-chevron-right"></i></button>
                    <div class="slider-controls" id="sliderControls"></div>
                </div>
            </div>
            <div class="hero-content">
                <h1>R. Abiyyu Ardi Lian P</h1>
                <p>IT Support & Web Developer yang passionate dalam menciptakan solusi digital yang inovatif</p>
                <div class="hero-buttons">
                    <a href="#about" class="btn btn-primary">
                        <i class="fas fa-arrow-right"></i> Tentang Saya
                    </a>
                    <a href="#contact" class="btn btn-secondary">Hubungi Saya</a>
                </div>
                <div class="social-icons">
                    <a href="https://github.com/Abiyyuardi213" class="social-icon" target="_blank" title="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/abiyyu-ardilian-b87b42190/" class="social-icon" target="_blank" title="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://www.instagram.com/rdnabiyyu/" class="social-icon" target="_blank" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <h2 class="section-title">Tentang Saya</h2>
        <div class="cards-grid">
            <div class="card fade-in delay-1">
                <h3><i class="fas fa-user me-2"></i>Informasi Pribadi</h3>
                <div class="card-list">
                    <li><i class="fas fa-phone"></i> +62 811 3017 176</li>
                    <li><i class="fab fa-whatsapp"></i> 0895 3970 43901</li>
                    <li><i class="fas fa-envelope"></i> abiyyuardilian213@gmail.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> Surabaya, Jawa Timur</li>
                </div>
            </div>
            <div class="card fade-in delay-2">
                <h3><i class="fas fa-info-circle"></i>Tentang Diri</h3>
                <p>Nama lengkap saya R. Abiyyu Ardi Lian Permadi. Saya adalah mahasiswa Teknik Informatika dari ITATS yang passionate dalam web development dan IT support.</p>
                <p>Fokus karir saya adalah sebagai Web Developer dengan keahlian di Laravel, Code Igniter, dan PHP Native. Saya juga aktif sebagai Asisten Laboratorium di kampus.</p>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience">
        <h2 class="section-title">Pengalaman Kerja</h2>
        <div class="cards-grid">
            <!-- Added company logo to experience cards -->
            <div class="card fade-in delay-1">
                <div class="company-logo">
                    <img src="{{ asset('image/tppi.png') }}" alt="PT. TPPI Logo">
                </div>
                <h3><i class="fas fa-briefcase"></i> Maintenance Technician</h3>
                <div class="card-meta"><i class="fas fa-building"></i> PT. TPPI | Nov 2019 - Jan 2021</div>
                <ul class="card-list">
                    <li><i class="fas fa-check"></i> Sebagai operator teknisi perpipaan</li>
                    <li><i class="fas fa-check"></i> Teknisi Legal Senior proyek pengeboran minyak</li>
                    <li><i class="fas fa-check"></i> Teknisi perpipaan tingkat 2 Distrik 44 laut jawa</li>
                </ul>
            </div>
            <div class="card fade-in delay-3">
                <div class="company-logo">
                    <img src="{{ asset('image/kai.png') }}" alt="PT. KAI Logo">
                </div>
                <h3><i class="fas fa-briefcase"></i> Public Relation</h3>
                <div class="card-meta"><i class="fas fa-building"></i> PT. KAI | Des 2021 - Sept 2022</div>
                <ul class="card-list">
                    <li><i class="fas fa-check"></i> Pembicara rapat kerja tahunan PT. KAI</li>
                    <li><i class="fas fa-check"></i> Pembicara rapat kerja tahunan BUMN</li>
                    <li><i class="fas fa-check"></i> Pembicara agenda tahunan PT. KAI Daop 8</li>
                </ul>
            </div>
            <div class="card fade-in delay-1">
                <div class="company-logo">
                    <img src="{{ asset('image/kai.png') }}" alt="PT. KAI Logo">
                </div>
                <h3><i class="fas fa-briefcase"></i> Operation Staff</h3>
                <div class="card-meta"><i class="fas fa-building"></i> PT. KAI | Oct 2022 - Jun 2024</div>
                <ul class="card-list">
                    <li><i class="fas fa-check"></i> Penyelia operasi UPT Crew KA Sidotopo</li>
                    <li><i class="fas fa-check"></i> Perancang Grafik Perjalanan KA Gapeka 2023</li>
                </ul>
            </div>
            <div class="card fade-in delay-2">
                <div class="company-logo">
                    <img src="{{ asset('image/kai.png') }}" alt="PT. KAI Logo">
                </div>
                <h3><i class="fas fa-briefcase"></i> Assistant Chief Operating Officer</h3>
                <div class="card-meta"><i class="fas fa-building"></i> PT. KAI | Jun 2024 - Des 2024</div>
                <ul class="card-list">
                    <li><i class="fas fa-check"></i> Asisten Kepala Operasional EVP Daop 8</li>
                    <li><i class="fas fa-check"></i> Perancang Grafik Perjalanan KA Gapeka 2025</li>
                </ul>
            </div>
            <div class="card fade-in delay-3">
                <div class="company-logo">
                    <img src="{{ asset('image/kai.png') }}" alt="PT. KAI Logo">
                </div>
                <h3><i class="fas fa-briefcase"></i> Web Developer & Front Dev</h3>
                <div class="card-meta"><i class="fas fa-building"></i> PT. KAI | Des 2024 - April 2025</div>
                <ul class="card-list">
                    <li><i class="fas fa-check"></i> Develop Sistem Manajemen Pegawai Daop 8</li>
                    <li><i class="fas fa-check"></i> Develop Official Landing Page PT. KAI</li>
                    <li><i class="fas fa-check"></i> Develop Sistem Absensi & Keuangan</li>
                </ul>
            </div>
            <div class="card fade-in delay-3">
                <div class="company-logo">
                    <img src="{{ asset('image/itats.png') }}" alt="PT. KAI Logo">
                </div>
                <h3><i class="fas fa-briefcase"></i> Administration & Web Dev</h3>
                <div class="card-meta"><i class="fas fa-building"></i> ITATS | Sept 2024 - Current</div>
                <ul class="card-list">
                    <li><i class="fas fa-check"></i> Frontliner Administration</li>
                    <li><i class="fas fa-check"></i> Develop Sistem Peminjaman Ruangan</li>
                </ul>
            </div>
            <div class="card fade-in delay-3">
                <div class="company-logo">
                    <img src="{{ asset('image/gfi.png') }}" alt="PT. KAI Logo">
                </div>
                <h3><i class="fas fa-briefcase"></i> Fullstack Programmer (Remote)</h3>
                <div class="card-meta"><i class="fas fa-building"></i> PT. Garuda Fiber | May 2025 - Current</div>
                <ul class="card-list">
                    <li><i class="fas fa-check"></i> Develop Sistem Informasi Manajemen Logistik</li>
                    <li><i class="fas fa-check"></i> Develop Sistem Manajemen Pegawai</li>
                    <li><i class="fas fa-check"></i> Develop Sistem Manajemen Keuangan</li>
                </ul>
            </div>
            <div class="card fade-in delay-3">
                <div class="company-logo">
                    <img src="{{ asset('image/kai.png') }}" alt="PT. KAI Logo">
                </div>
                <h3><i class="fas fa-briefcase"></i> IT Project Manager (Remote)</h3>
                <div class="card-meta"><i class="fas fa-building"></i> PT. KAI | April 2025 - July 2025</div>
                <ul class="card-list">
                    <li><i class="fas fa-check"></i> Lead Team for Develop E-Recruitment KAI</li>
                </ul>
            </div>
            <div class="card fade-in delay-3">
                <div class="company-logo">
                    <img src="{{ asset('image/kai.png') }}" alt="PT. KAI Logo">
                </div>
                <h3><i class="fas fa-briefcase"></i> Head of Planning and Development Division (Remote)</h3>
                <div class="card-meta"><i class="fas fa-building"></i> PT. KAI | July 2025 - Current</div>
                <ul class="card-list">
                    <li><i class="fas fa-check"></i> Lead Team for Rewrite Operational System</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio">
        <h2 class="section-title">Portfolio Project</h2>
        <div class="portfolio-grid">
            <div class="portfolio-card fade-in delay-1">
                <div class="portfolio-image">
                    <img src="{{ asset('image/ss1.png') }}" alt="Project 1 - Employee Management System">
                    <div class="portfolio-overlay">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </div>
                <div class="portfolio-content">
                    <h3>Employee Management System</h3>
                    <p>Sistem manajemen pegawai terintegrasi untuk PT. KAI Daop 8 dengan fitur attendance dan payroll.</p>
                    <div class="portfolio-tags">
                        <span class="tag">Code Igniter 3</span>
                        <span class="tag">MySQL</span>
                        <span class="tag">Bootstrap</span>
                    </div>
                </div>
            </div>
            <div class="portfolio-card fade-in delay-2">
                <div class="portfolio-image">
                    <img src="{{ asset('image/ss2.png') }}" alt="Project 2 - PT. KAI Landing Page">
                    <div class="portfolio-overlay">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </div>
                <div class="portfolio-content">
                    <h3>PT. KAI Official Landing Page</h3>
                    <p>Landing page modern dan responsive untuk meningkatkan brand awareness PT. Kereta Api Indonesia.</p>
                    <div class="portfolio-tags">
                        <span class="tag">Code Igniter 3</span>
                        <span class="tag">MySQL</span>
                        <span class="tag">JavaScript</span>
                        <span class="tag">Bootstrap</span>
                    </div>
                </div>
            </div>
            <div class="portfolio-card fade-in delay-3">
                <div class="portfolio-image">
                    <img src="{{ asset('image/ss3.png') }}" alt="Project 3 - Warehouse and Market System">
                    <div class="portfolio-overlay">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </div>
                <div class="portfolio-content">
                    <h3>Garuda Fiber Marketing System</h3>
                    <p>Sistem terintegrasi untuk marketing dan penjualan produk.</p>
                    <div class="portfolio-tags">
                        <span class="tag">Laravel 12</span>
                        <span class="tag">MySQL</span>
                        <span class="tag">jQuery</span>
                        <span class="tag">Bootstrap</span>
                    </div>
                </div>
            </div>
            <div class="portfolio-card fade-in delay-1">
                <div class="portfolio-image">
                    <img src="{{ asset('image/ss4.png') }}" alt="Project 4 - Warehouse Information System">
                    <div class="portfolio-overlay">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </div>
                <div class="portfolio-content">
                    <h3>Warehouse & Logistics Information System</h3>
                    <p>Sistem untuk manajemen pergudangan dan logistik PT. Garuda Fiber</p>
                    <div class="portfolio-tags">
                        <span class="tag">Laravel 12</span>
                        <span class="tag">MySQL</span>
                        <span class="tag">jQuery</span>
                        <span class="tag">Bootstrap</span>
                    </div>
                </div>
            </div>
            <div class="portfolio-card fade-in delay-2">
                <div class="portfolio-image">
                    <img src="{{ asset('image/ss5.png') }}" alt="Project 5 - HMIF ITATS Landing Page">
                    <div class="portfolio-overlay">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </div>
                <div class="portfolio-content">
                    <h3>Official Landing Page HMIF ITATS</h3>
                    <p>Dashboard profesional untuk marketing dan transparansi Himpunan Teknik Informatika ITATS</p>
                    <div class="portfolio-tags">
                        <span class="tag">React JS</span>
                        <span class="tag">Firebase Database</span>
                        <span class="tag">Shadcn Template</span>
                    </div>
                </div>
            </div>
            <div class="portfolio-card fade-in delay-3">
                <div class="portfolio-image">
                    <img src="{{ asset('image/ss6.png') }}" alt="Project 6 - IT Support Portal">
                    <div class="portfolio-overlay">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </div>
                <div class="portfolio-content">
                    <h3>Informatics Event Official Website</h3>
                    <p>Portal dukungan HMIF ITATS untuk seluruh kegiatan Himpunan dan Program Studi Teknik Informatika ITATS.</p>
                    <div class="portfolio-tags">
                        <span class="tag">Laravel 12</span>
                        <span class="tag">Tailwind</span>
                        <span class="tag">MySQL</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills">
        <h2 class="section-title">Keterampilan</h2>
        <div class="skills-grid">
            <div class="skill-box fade-in delay-1">
                <div class="skill-icon"><i class="fas fa-code"></i></div>
                <h3>Web Development</h3>
                <p>HTML, CSS, JavaScript, Bootstrap</p>
            </div>
            <div class="skill-box fade-in delay-2">
                <div class="skill-icon"><i class="fas fa-cogs"></i></div>
                <h3>Backend Development</h3>
                <p>Laravel, Code Igniter, PHP Native</p>
            </div>
            <div class="skill-box fade-in delay-3">
                <div class="skill-icon"><i class="fas fa-chart-line"></i></div>
                <h3>Management</h3>
                <p>Word, Excel, Power Point, Project Planning</p>
            </div>
        </div>
    </section>

    <!-- Education Section -->
    <section id="education">
        <h2 class="section-title">Pendidikan</h2>
        <div class="education-item fade-in delay-1">
            <h3>SMK Negeri 3 Surabaya</h3>
            <div class="meta"><i class="fas fa-graduation-cap"></i> Teknik Gambar Bangunan | 2015 - 2016</div>
            <ul>
                <li><i class="fas fa-star"></i> NIHIL Prestasi dan Kegiatan</li>
            </ul>
        </div>
        <div class="education-item fade-in delay-1">
            <h3>SMA Terpadu Krida Nusantara Bandung</h3>
            <div class="meta"><i class="fas fa-graduation-cap"></i> MIPA | 2016 - 2019</div>
            <ul>
                <li><i class="fas fa-star"></i> Komandan Resimen Korps KN 2018-2019</li>
                <li><i class="fas fa-star"></i> Paskibra Kota Bandung 2018</li>
                <li><i class="fas fa-star"></i> Juara 1 Cabor Lari Marathon Kota Bandung 2019</li>
            </ul>
        </div>
        <div class="education-item fade-in delay-2">
            <h3>Institut Teknologi Adhi Tama Surabaya</h3>
            <div class="meta"><i class="fas fa-graduation-cap"></i> Teknik Informatika | 2023 - Sekarang</div>
            <ul>
                <li><i class="fas fa-star"></i> Asisten Laboratorium Rekayasa Perangkat Lunak</li>
                <li><i class="fas fa-star"></i> Anggota divisi Kewirausahaan Himpunan Mahasiswa Teknik Informatika</li>
                <li><i class="fas fa-star"></i> Wakil Ketua Himpunan Mahasiswa Teknik Informatika</li>
                <li><i class="fas fa-star"></i> Tata Usaha (CSR) Bidang Akademik WR 1</li>
                <li><i class="fas fa-star"></i> Koordinator Laboratorium Rekayasa Perangkat Lunak</li>
                <li><i class="fas fa-star"></i> Ketua Himpunan Mahasiswa Teknik Informatika</li>
            </ul>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="contact-section">
            <h2><i class="fas fa-lightbulb"></i> Berikan Saran Anda</h2>
            <p>Kami senang mendengar ide, kritik, atau masukan Anda untuk pengembangan lebih baik.</p>
            <form action="/kirim-saran" method="POST" style="margin-top: 2rem; max-width: 600px;">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" placeholder="Contoh: Abiyyu Ardilian" required>
                </div>
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" placeholder="nama@email.com" required>
                </div>
                <div class="form-group">
                    <label for="pesan">Masukan atau Saran</label>
                    <textarea id="pesan" name="pesan" placeholder="Tulis masukan Anda di sini..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> Kirim Pesan
                </button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Abiyyu Ardilian. All rights reserved. | Built with <i class="fas fa-heart" style="color: #ff4757;"></i></p>
    </footer>

    <script>
        const sliderTrack = document.getElementById('sliderTrack');
        const sliderControls = document.getElementById('sliderControls');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slider-item');
        const totalSlides = slides.length;

        // Create slider dots
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('button');
            dot.classList.add('slider-dot');
            if (i === 0) dot.classList.add('active');
            dot.addEventListener('click', () => goToSlide(i));
            sliderControls.appendChild(dot);
        }

        const dots = document.querySelectorAll('.slider-dot');

        function updateSlider() {
            sliderTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlider();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlider();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateSlider();
        }

        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);

        // Auto-slide every 5 seconds
        setInterval(nextSlide, 5000);

        // Dark Mode Toggle
        const themeToggle = document.getElementById('themeToggle');
        const html = document.documentElement;

        const currentTheme = localStorage.getItem('theme') || 'light';
        if (currentTheme === 'dark') {
            html.classList.add('dark-mode');
            themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        }

        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark-mode');
            const theme = html.classList.contains('dark-mode') ? 'dark' : 'light';
            localStorage.setItem('theme', theme);
            themeToggle.innerHTML = theme === 'dark' ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
        });

        // Intersection Observer untuk fade-in animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.card, .skill-box, .education-item, .portfolio-card').forEach(el => {
            observer.observe(el);
        });

        // Smooth scroll untuk nav links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Hamburger Menu Toggle
        const hamburger = document.getElementById('hamburgerMenu');
        const navMenu = document.getElementById('navMenu');

        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            hamburger.innerHTML = navMenu.classList.contains('active')
                ? '<i class="fas fa-times"></i>'
                : '<i class="fas fa-bars"></i>';
        });

        // Close menu when a link is clicked
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                hamburger.innerHTML = '<i class="fas fa-bars"></i>';
            });
        });
    </script>
</body>
</html>
