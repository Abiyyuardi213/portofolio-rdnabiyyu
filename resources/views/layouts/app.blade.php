<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Abiyyu Ardilian - Portfolio')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --page: #f0f0ef;
            --paper: #ffffff;
            --ink: #111111;
            --muted: #6f6f6f;
            --line: #e7e7e4;
            --line-strong: #d9d9d4;
            --yellow: #f4ff00;
            --black: #111111;
            --gradient: linear-gradient(90deg, #df21d9 0%, #ff405f 48%, #ffbd13 100%);
            --shadow: 0 24px 60px rgba(17, 17, 17, 0.12);
        }
        html { scroll-behavior: smooth; }
        body {
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            color: var(--ink);
            background: var(--page);
            line-height: 1.5;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
        }
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            pointer-events: none;
            background-image: radial-gradient(rgba(17,17,17,0.08) 0.8px, transparent 0.8px);
            background-size: 14px 14px;
            opacity: 0.5;
        }
        a { color: inherit; }
        main {
            width: min(1380px, 100%);
            margin: 0 auto;
            background: rgba(255,255,255,0.96);
            border-left: 1px solid var(--line);
            border-right: 1px solid var(--line);
            position: relative;
            z-index: 1;
        }

        nav {
            position: sticky;
            top: 0;
            width: min(1380px, 100%);
            margin: 0 auto;
            z-index: 20;
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(18px);
            border: 1px solid var(--line);
            border-bottom: 0;
        }
        .nav-container {
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
        }
        .nav-brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 800;
        }
        .nav-brand-icon {
            width: 30px;
            height: 30px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--yellow);
            color: var(--ink);
            transform: rotate(-8deg);
            font-size: 13px;
        }
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 26px;
            list-style: none;
        }
        .nav-link {
            color: var(--ink);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            opacity: 0.76;
        }
        .nav-link:hover,
        .nav-link.active { opacity: 1; }
        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .nav-icon {
            width: 34px;
            height: 34px;
            border: 1px solid var(--line);
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            color: var(--ink);
            text-decoration: none;
        }
        .nav-cta,
        .btn-dark {
            min-height: 38px;
            padding: 0 20px;
            border-radius: 7px;
            border: 0;
            background: var(--black);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }
        .hamburger {
            display: none;
            width: 38px;
            height: 38px;
            border: 0;
            background: transparent;
            color: var(--ink);
            font-size: 18px;
            cursor: pointer;
        }

        .grid-section {
            border-top: 1px solid var(--line);
            background:
                linear-gradient(var(--line) 1px, transparent 1px),
                linear-gradient(90deg, var(--line) 1px, transparent 1px),
                #fff;
            background-size: 25% 100%, 100% 25%, auto;
        }
        .hero-grid {
            min-height: 560px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
        }
        .hero-copy,
        .hero-visual {
            padding: clamp(38px, 6vw, 66px);
            min-width: 0;
        }
        .hero-copy {
            border-right: 1px solid var(--line);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: clamp(48px, 8vw, 84px);
            background: #fff;
        }
        .hero-visual {
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            overflow: hidden;
            background:
                radial-gradient(circle, rgba(17,17,17,0.09) 1px, transparent 1.2px),
                #fff;
            background-size: 12px 12px, auto;
        }
        .hero-visual::before,
        .hero-visual::after {
            content: '';
            position: absolute;
            z-index: 0;
            pointer-events: none;
        }
        .hero-visual::before {
            inset: 0;
            border-left: 1px solid var(--line);
            border-right: 1px solid var(--line);
        }
        .hero-visual::after {
            left: 0;
            right: 0;
            bottom: 0;
            height: 86px;
            background: linear-gradient(to bottom, transparent, #fff 82%);
        }
        .pill {
            width: fit-content;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-height: 28px;
            padding: 0 14px;
            border-radius: 999px;
            background: var(--yellow);
            color: var(--ink);
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 22px;
        }
        .status-pill {
            background: #fff;
            border: 1px solid var(--line);
        }
        .status-pill::before {
            content: '';
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #16c34a;
        }
        .hero-copy h1 {
            max-width: 520px;
            font-size: clamp(2rem, 3.55vw, 3.35rem);
            line-height: 1.07;
            letter-spacing: 0;
            font-weight: 800;
            margin-bottom: 20px;
        }
        .muted-word { color: #b8b8b3; }
        .hero-copy p,
        .hero-bio,
        .section-lead {
            color: var(--muted);
            font-size: 15px;
            max-width: 500px;
        }
        .hero-bio p { margin-bottom: 1rem; }
        .hero-bio p:last-child { margin-bottom: 0; }
        .hero-bio ul,
        .hero-bio ol { padding-left: 1.2rem; margin: 1rem 0; }
        .hero-actions {
            display: flex;
            gap: 14px;
            margin-top: 32px;
            flex-wrap: wrap;
        }
        .btn-gradient {
            min-height: 44px;
            padding: 0 28px;
            border-radius: 8px;
            border: 0;
            background: var(--gradient);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
        }
        .hero-photo {
            width: min(430px, 72%);
            aspect-ratio: 0.92;
            border-radius: 32px 32px 18px 18px;
            overflow: hidden;
            position: relative;
            z-index: 1;
            background: #f6f6f3;
            box-shadow: none;
            margin-top: 72px;
            margin-bottom: 48px;
        }
        .hero-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .profile-slideshow {
            position: relative;
            width: 100%;
            height: 100%;
        }
        .profile-slideshow img {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 0.7s ease;
        }
        .profile-slideshow img.active {
            opacity: 1;
        }
        .floating-note {
            position: absolute;
            width: max-content;
            min-width: 138px;
            max-width: min(230px, 30vw);
            padding: 12px 14px;
            border-radius: 16px;
            background: rgba(255,255,255,0.88);
            border: 1px solid rgba(17,17,17,0.08);
            box-shadow: 0 18px 38px rgba(17,17,17,0.12);
            backdrop-filter: blur(18px);
            font-size: 12px;
            color: var(--muted);
            z-index: 3;
        }
        .floating-note strong {
            display: block;
            max-width: 100%;
            color: var(--ink);
            margin-bottom: 4px;
            font-size: 12px;
            line-height: 1.2;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .floating-note.left {
            left: clamp(22px, 5vw, 62px);
            top: 42%;
            transform: translateY(-50%);
            line-height: 1.45;
        }
        .floating-note.right {
            right: clamp(24px, 5.4vw, 70px);
            bottom: 18%;
            min-width: 132px;
            background: rgba(229, 255, 0, 0.94);
            color: var(--ink);
            text-align: center;
            box-shadow: 0 16px 34px rgba(17,17,17,0.11);
        }
        .floating-note.right strong {
            margin-bottom: 6px;
            font-size: 13px;
        }
        .hero-status,
        .hero-location {
            position: absolute;
            top: 42px;
            z-index: 3;
            margin: 0;
        }
        .hero-status { left: clamp(28px, 5vw, 60px); }
        .hero-location { right: clamp(28px, 5vw, 60px); }

        .metric-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            border-bottom: 1px solid var(--line);
        }
        .metric {
            min-height: 108px;
            padding: 26px clamp(26px, 5vw, 54px);
            border-right: 1px solid var(--line);
            background: #fff;
        }
        .metric:last-child { border-right: 0; }
        .metric strong {
            display: block;
            font-size: clamp(2.05rem, 3.6vw, 3.15rem);
            letter-spacing: 0;
            line-height: 1;
            margin-bottom: 8px;
        }
        .metric strong span {
            color: #b8b8b3;
            font-size: 0.66em;
        }
        .metric span { color: var(--muted); font-size: 13px; }

        .split-section {
            display: grid;
            grid-template-columns: 0.92fr 1.08fr;
            border-top: 1px solid var(--line);
            background:
                radial-gradient(circle, rgba(17,17,17,0.075) 1px, transparent 1.2px),
                #fff;
            background-size: 12px 12px, auto;
        }
        .split-title,
        .split-content {
            padding: clamp(42px, 7vw, 82px);
        }
        .split-title {
            border-right: 1px solid var(--line);
            background: rgba(255,255,255,0.74);
        }
        .split-content {
            display: flex;
            align-items: center;
            background: rgba(255,255,255,0.38);
        }
        .split-title h2,
        .page-heading h1 {
            font-size: clamp(2.2rem, 4.4vw, 4.15rem);
            line-height: 1.04;
            letter-spacing: 0;
            font-weight: 800;
        }
        .split-title p,
        .page-heading p { color: var(--muted); margin-top: 18px; max-width: 520px; }

        .service-list,
        .record-list { border-top: 1px solid var(--line); }
        .service-row,
        .record-row {
            display: grid;
            grid-template-columns: 64px minmax(170px, 0.45fr) minmax(0, 1fr);
            gap: 20px;
            align-items: start;
            padding: 28px 0;
            border-bottom: 1px solid var(--line);
        }
        .service-icon,
        .record-icon {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border: 1px solid var(--line);
            color: var(--ink);
        }
        .service-row h3,
        .record-row h3 {
            font-size: 19px;
            letter-spacing: -0.025em;
        }
        .service-row p,
        .record-row p,
        .clean-list { color: var(--muted); font-size: 14px; }
        .clean-list {
            list-style: none;
            display: grid;
            gap: 8px;
        }
        .clean-list li { display: flex; gap: 8px; align-items: flex-start; }
        .clean-list i { color: var(--ink); margin-top: 4px; font-size: 11px; }
        .record-description {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.65;
        }
        .record-description p { margin-bottom: 0.75rem; }
        .record-description p:last-child { margin-bottom: 0; }
        .record-description ul,
        .record-description ol {
            margin: 0.75rem 0;
            padding-left: 1.15rem;
        }
        .record-description li { margin-bottom: 0.35rem; }
        .record-description strong,
        .record-description b { color: var(--ink); }
        .record-description a {
            color: var(--ink);
            font-weight: 800;
            text-decoration-thickness: 1px;
        }

        .page-shell {
            padding: clamp(46px, 7vw, 88px);
            border-top: 1px solid var(--line);
            background:
                radial-gradient(circle, rgba(17,17,17,0.055) 1px, transparent 1.2px),
                linear-gradient(rgba(231,231,228,0.72) 1px, transparent 1px),
                linear-gradient(90deg, rgba(231,231,228,0.72) 1px, transparent 1px),
                #fff;
            background-size: 16px 16px, 25% 180px, 25% 180px, auto;
        }
        .page-heading {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(240px, 0.36fr);
            gap: 32px;
            align-items: start;
            margin-bottom: 54px;
        }
        .page-kicker {
            color: var(--ink);
            background: var(--yellow);
            border-radius: 999px;
            display: inline-flex;
            width: fit-content;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .work-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 28px;
        }
        .work-card {
            border-top: 1px solid var(--line);
            padding-top: 18px;
        }
        .work-media {
            aspect-ratio: 1.3;
            border-radius: 0;
            overflow: hidden;
            background: #f6f6f3;
            border: 1px solid var(--line);
            position: relative;
        }
        .work-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .work-placeholder {
            width: 100%;
            height: 100%;
            display: grid;
            place-items: center;
            color: var(--muted);
            font-size: 34px;
        }
        .work-info {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 16px;
            padding-top: 14px;
            align-items: start;
        }
        .work-info h2 {
            font-size: 18px;
            letter-spacing: -0.025em;
            margin-bottom: 6px;
        }
        .work-info p { color: var(--muted); font-size: 13px; }
        .work-link {
            width: 42px;
            height: 34px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--black);
            color: #fff;
            text-decoration: none;
        }
        .portfolio-tags,
        .skill-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 12px;
        }
        .tag,
        .skill-pill {
            display: inline-flex;
            align-items: center;
            min-height: 26px;
            padding: 0 10px;
            border-radius: 999px;
            background: #f5f5f1;
            color: var(--ink);
            border: 1px solid var(--line);
            font-size: 12px;
            font-weight: 700;
        }

        .profile-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            width: 100%;
            gap: 0;
            border: 1px solid var(--line);
            border-radius: 18px;
            overflow: hidden;
            background: rgba(255,255,255,0.82);
            backdrop-filter: blur(14px);
            box-shadow: 0 20px 44px rgba(17,17,17,0.06);
        }
        .profile-strip-item {
            position: relative;
            min-width: 0;
            min-height: 150px;
            padding: 48px clamp(18px, 2.3vw, 28px) 24px;
            border-right: 1px solid var(--line);
            background:
                linear-gradient(180deg, rgba(255,255,255,0.96), rgba(255,255,255,0.72));
            transition: background 0.2s ease, transform 0.2s ease;
        }
        .profile-strip-item:hover {
            background: #fff;
            transform: translateY(-2px);
        }
        .profile-strip-item:last-child { border-right: 0; }
        .profile-strip-index {
            position: absolute;
            top: 18px;
            right: 20px;
            color: #c7c7c2;
            font-size: 12px;
            font-weight: 800;
        }
        .profile-strip-icon {
            position: absolute;
            top: 16px;
            left: 20px;
            width: 24px;
            height: 24px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--yellow);
            color: var(--ink);
            font-size: 11px;
        }
        .profile-strip-label {
            display: block;
            color: var(--muted);
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 10px;
        }
        .profile-strip-value {
            display: block;
            font-size: clamp(14px, 1.1vw, 17px);
            line-height: 1.4;
            font-weight: 800;
            overflow-wrap: break-word;
            word-break: normal;
            hyphens: none;
        }

        .contact-section {
            display: grid;
            grid-template-columns: 0.75fr 1.25fr;
            gap: 48px;
            align-items: start;
            border: 1px solid var(--line);
            border-radius: 24px;
            padding: clamp(28px, 5vw, 52px);
            background: rgba(255,255,255,0.94);
            box-shadow: 0 14px 34px rgba(17,17,17,0.055);
        }
        .contact-section h2 {
            font-size: clamp(2rem, 3.8vw, 3.75rem);
            line-height: 1.04;
            letter-spacing: 0;
        }
        .contact-section p { color: var(--muted); margin-top: 18px; }
        .contact-section form {
            padding: clamp(18px, 3vw, 28px);
            border: 1px solid var(--line);
            border-radius: 18px;
            background: #fff;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.9);
        }
        .form-group { margin-bottom: 14px; }
        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 7px;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            border: 1px solid var(--line-strong);
            background: rgba(255,255,255,0.92);
            border-radius: 12px;
            padding: 14px 15px;
            font-family: inherit;
            font-size: 14px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }
        .form-group textarea { min-height: 150px; resize: vertical; }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: 0;
            border-color: var(--black);
            box-shadow: 0 0 0 4px rgba(244,255,0,0.36);
        }

        .hero-summary p { margin-bottom: 1rem; }
        .hero-summary p:last-child { margin-bottom: 0; }
        .hero-summary ul,
        .hero-summary ol { padding-left: 1.2rem; margin: 1rem 0; }
        .hero-summary a { color: var(--ink); font-weight: 800; }

        .site-footer {
            width: min(1380px, 100%);
            margin: 0 auto;
            border: 1px solid var(--line);
            border-top: 0;
            background:
                radial-gradient(circle, rgba(17,17,17,0.075) 1px, transparent 1.2px),
                rgba(255,255,255,0.96);
            background-size: 12px 12px, auto;
            color: var(--muted);
            position: relative;
            z-index: 1;
            font-size: 13px;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.05fr 1.4fr 0.9fr;
            gap: 28px;
            padding: 34px clamp(24px, 6vw, 72px);
            border-bottom: 1px solid var(--line);
            background: rgba(255,255,255,0.76);
        }
        .footer-brand p {
            max-width: 260px;
            margin-top: 12px;
        }
        .footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-content: start;
        }
        .footer-links a,
        .footer-contact a {
            min-height: 34px;
            padding: 0 13px;
            border: 1px solid var(--line);
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            background: rgba(255,255,255,0.86);
            color: var(--ink);
            font-weight: 700;
        }
        .footer-contact {
            display: grid;
            justify-items: start;
            align-content: start;
            gap: 10px;
        }
        .footer-contact span {
            color: var(--ink);
            font-weight: 800;
        }
        .footer-contact span::before {
            content: '';
            width: 7px;
            height: 7px;
            display: inline-block;
            margin-right: 8px;
            border-radius: 50%;
            background: #16c34a;
        }
        .footer-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 18px clamp(24px, 6vw, 72px);
            background: rgba(255,255,255,0.88);
        }

        .fade-in { animation: fadeInUp 0.6s ease-out both; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 900px) {
            main,
            nav,
            .site-footer {
                width: 100%;
            }
            main { margin-top: 0; }
            .nav-container { height: 64px; padding: 0 18px; }
            .hamburger { display: inline-flex; align-items: center; justify-content: center; }
            .nav-actions { display: none; }
            .nav-menu {
                position: absolute;
                left: 0;
                right: 0;
                top: 64px;
                display: grid;
                gap: 0;
                background: #fff;
                border-top: 1px solid var(--line);
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.25s ease;
            }
            .nav-menu.active { max-height: 360px; }
            .nav-menu li { border-bottom: 1px solid var(--line); }
            .nav-link { display: block; padding: 14px 18px; }
            .hero-grid,
            .split-section,
            .page-heading,
            .contact-section,
            .footer-grid,
            .service-row,
            .record-row {
                grid-template-columns: 1fr;
            }
            .hero-copy,
            .split-title { border-right: 0; border-bottom: 1px solid var(--line); }
            .hero-copy,
            .hero-visual,
            .split-title,
            .split-content,
            .page-shell { padding: 34px 24px; }
            .hero-grid { min-height: 0; }
            .hero-photo { width: min(340px, 86%); }
            .floating-note { display: none; }
            .metric-strip,
            .profile-strip,
            .work-grid {
                grid-template-columns: 1fr;
            }
            .metric,
            .profile-strip-item {
                border-right: 0;
                border-bottom: 1px solid var(--line);
            }
            .hero-actions .btn-gradient,
            .hero-actions .btn-dark,
            .contact-section .btn-gradient {
                width: 100%;
            }
            .footer-bottom {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    @include('components.public.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.public.footer')

    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('fade-in');
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        document.querySelectorAll('.service-row, .record-row, .work-card, .profile-strip-item, .metric').forEach(el => {
            observer.observe(el);
        });

        const hamburger = document.getElementById('hamburgerMenu');
        const navMenu = document.getElementById('navMenu');

        hamburger?.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            hamburger.innerHTML = navMenu.classList.contains('active')
                ? '<i class="fas fa-times"></i>'
                : '<i class="fas fa-bars"></i>';
        });

        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                navMenu?.classList.remove('active');
                if (hamburger) hamburger.innerHTML = '<i class="fas fa-bars"></i>';
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
