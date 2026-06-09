<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Abiyyu Ardilian - Portfolio')</title>
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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
        .nav-link:hover, .nav-link.active {
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
        
        main {
            flex: 1;
            margin-top: 70px;
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

        /* Added Hero Styles for reuse or specific pages */
        .hero {
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

        footer {
            background-color: var(--bg-secondary);
            border-top: 1px solid var(--border-color);
            padding: 2rem;
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.95rem;
            margin-top: auto;
        }

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

        html {
            scroll-behavior: smooth;
        }

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
        
        /* Hero Image Slider Styles (Global) */
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
    </style>
    @yield('styles')
</head>
<body>
    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    <script>
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
    @yield('scripts')
</body>
</html>
