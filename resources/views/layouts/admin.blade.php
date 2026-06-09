<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('header', 'Admin') - Abiyyu Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;750&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --mac-bg: #f5f5f7;
            --mac-window: #ffffff;
            --mac-sidebar: #f7f7f8;
            --mac-toolbar: #fbfbfc;
            --mac-border: #dedee3;
            --mac-border-soft: #eeeeef;
            --mac-text: #1d1d1f;
            --mac-muted: #6e6e73;
            --mac-blue: #007aff;
            --mac-blue-dark: #0066d6;
            --mac-red: #ff453a;
            --mac-green: #32d74b;
            --mac-yellow: #ffd60a;
            --mac-shadow: 0 8px 26px rgba(0, 0, 0, 0.08);
            --mac-radius: 10px;
        }

        body {
            min-height: 100vh;
            color: var(--mac-text);
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: var(--mac-bg);
            display: flex;
            align-items: stretch;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            letter-spacing: 0;
        }

        .app-shell {
            width: min(1440px, calc(100vw - 16px));
            min-height: calc(100vh - 16px);
            margin: 8px auto;
            display: grid;
            grid-template-columns: 236px minmax(0, 1fr);
            overflow: hidden;
            border: 1px solid var(--mac-border);
            border-radius: 12px;
            background: var(--mac-window);
            box-shadow: var(--mac-shadow);
        }

        .sidebar {
            min-height: 100%;
            background: var(--mac-sidebar);
            border-right: 1px solid var(--mac-border);
            display: flex;
            flex-direction: column;
        }

        .window-controls {
            height: 42px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0 16px;
            border-bottom: 1px solid var(--mac-border-soft);
        }

        .traffic-light {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.08);
        }

        .traffic-light.red { background: #ff5f57; }
        .traffic-light.yellow { background: #febc2e; }
        .traffic-light.green { background: #28c840; }

        .sidebar-header {
            padding: 14px 16px 18px;
            display: flex;
            align-items: center;
            gap: 11px;
            border-bottom: 1px solid var(--mac-border-soft);
        }

        .app-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            color: #fff;
            background: var(--mac-blue);
        }

        .brand-title { font-weight: 700; font-size: 14px; }
        .brand-subtitle { color: var(--mac-muted); font-size: 12px; margin-top: 2px; }
        .sidebar-menu { list-style: none; padding: 12px 10px 18px; flex: 1; }
        .sidebar-section { padding: 14px 10px 6px; color: #86868b; font-size: 11px; font-weight: 700; text-transform: uppercase; }

        .sidebar-link {
            min-height: 32px;
            padding: 7px 10px;
            display: flex;
            align-items: center;
            gap: 9px;
            color: #3a3a3c;
            text-decoration: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            transition: background 0.16s, color 0.16s, box-shadow 0.16s;
        }

        .sidebar-link:hover { background: rgba(0, 0, 0, 0.05); color: var(--mac-text); }
        .sidebar-link.active {
            color: #fff;
            background: var(--mac-blue);
            box-shadow: none;
        }

        .sidebar-link i { width: 18px; text-align: center; font-size: 13px; }
        .main-content { min-width: 0; display: flex; flex-direction: column; background: #ffffff; }

        .top-bar {
            min-height: 58px;
            padding: 10px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            border-bottom: 1px solid var(--mac-border);
            background: var(--mac-toolbar);
        }

        .top-bar h2 { font-size: 15px; font-weight: 700; }
        .toolbar-search {
            width: min(420px, 38vw);
            height: 32px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0 11px;
            border: 1px solid var(--mac-border);
            border-radius: 8px;
            background: #ffffff;
            color: var(--mac-muted);
            font-size: 12px;
        }

        .user-info { display: flex; align-items: center; gap: 10px; color: var(--mac-muted); font-size: 13px; }
        .user-pill {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #fff;
            background: #6e6e73;
            font-size: 12px;
            font-weight: 700;
        }

        .logout-btn {
            height: 30px;
            padding: 0 10px;
            border: 1px solid var(--mac-border);
            border-radius: 7px;
            background: #ffffff;
            color: #3a3a3c;
            cursor: pointer;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
        }

        .logout-btn:hover { background: #fff; color: var(--mac-text); }
        .content-area { width: 100%; max-width: 1180px; margin: 0 auto; padding: 24px; }

        .section-header, .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }

        .section-header h1 { font-size: 24px; font-weight: 700; }
        .section-header p, .card-subtitle { color: var(--mac-muted); font-size: 13px; margin-top: 4px; }

        .card {
            background: #ffffff;
            border: 1px solid var(--mac-border);
            border-radius: var(--mac-radius);
            padding: 16px;
            margin-bottom: 16px;
            box-shadow: none;
        }

        .stats-grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 12px; }
        .stat-card { min-height: 112px; display: flex; flex-direction: column; justify-content: space-between; }
        .stat-label { color: var(--mac-muted); font-size: 12px; font-weight: 700; text-transform: uppercase; }
        .stat-value { font-size: 34px; font-weight: 750; letter-spacing: 0; }
        .stat-icon { color: var(--mac-blue); font-size: 16px; }

        .dashboard-grid { display: grid; grid-template-columns: minmax(0, 1.35fr) minmax(280px, 0.65fr); gap: 12px; }
        .chart-preview { height: 260px; position: relative; overflow: hidden; }
        .chart-preview svg { width: 100%; height: 100%; display: block; }
        .quick-actions { display: flex; flex-wrap: wrap; gap: 10px; }

        .btn {
            min-height: 32px;
            padding: 7px 12px;
            border-radius: 7px;
            border: 1px solid var(--mac-border);
            cursor: pointer;
            text-decoration: none;
            font-family: inherit;
            font-weight: 700;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            transition: transform 0.16s, box-shadow 0.16s, background 0.16s;
        }

        .btn:hover { transform: translateY(-1px); }
        .btn-primary {
            color: #fff;
            border-color: #006ee6;
            background: var(--mac-blue);
            box-shadow: none;
        }
        .btn-primary:hover { background: var(--mac-blue-dark); }
        .btn-outline { color: #2c2c2e; background: #ffffff; }
        .btn-danger { color: #fff; border-color: #d70015; background: var(--mac-red); }
        .btn-icon { width: 32px; height: 32px; padding: 0; }
        .button-row { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 20px; }

        .table-wrap { overflow-x: auto; border: 1px solid var(--mac-border); border-radius: 10px; }
        table { width: 100%; border-collapse: collapse; min-width: 620px; }
        th {
            text-align: left;
            padding: 10px 12px;
            color: var(--mac-muted);
            font-weight: 700;
            font-size: 11px;
            text-transform: uppercase;
            background: #f7f7f8;
            border-bottom: 1px solid var(--mac-border);
        }
        td { padding: 12px; border-bottom: 1px solid var(--mac-border-soft); font-size: 13px; vertical-align: middle; }
        tbody tr:last-child td { border-bottom: 0; }
        tr:hover td { background: #f7faff; }
        .table-actions { display: flex; gap: 8px; align-items: center; }
        .tag-pill {
            display: inline-flex;
            align-items: center;
            padding: 4px 8px;
            border-radius: 999px;
            background: #f2f2f7;
            color: #3a3a3c;
            font-size: 12px;
            font-weight: 600;
        }

        .form-panel { max-width: 820px; }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; }
        .form-group { margin-bottom: 14px; }
        label { display: block; margin-bottom: 6px; color: #3a3a3c; font-size: 12px; font-weight: 700; }
        input, textarea, select {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #c7c7cc;
            border-radius: 7px;
            background: #ffffff;
            font-family: inherit;
            font-size: 13px;
            color: var(--mac-text);
            transition: border-color 0.16s, box-shadow 0.16s, background 0.16s;
        }
        textarea { min-height: 96px; resize: vertical; line-height: 1.5; }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--mac-blue);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(0,122,255,0.18);
        }

        .alert {
            padding: 12px 14px;
            border-radius: 10px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 9px;
            border: 1px solid rgba(52,199,89,0.28);
        }
        .alert-success { background: rgba(52,199,89,0.1); color: #1c7c35; }
        .toast {
            position: fixed;
            top: 24px;
            right: 24px;
            z-index: 999;
            min-width: min(340px, calc(100vw - 48px));
            max-width: 420px;
            background: #ffffff;
            border-color: #cdebd5;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
            animation: toast-in 0.22s ease-out, toast-out 0.24s ease-in 4.2s forwards;
        }
        .toast i { color: #248a3d; }

        @keyframes toast-in {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes toast-out {
            to { opacity: 0; transform: translateY(-8px); pointer-events: none; }
        }
        .empty-state { padding: 28px; text-align: center; color: var(--mac-muted); }

        @media (max-width: 920px) {
            body { display: block; }
            .app-shell { width: 100%; min-height: 100vh; margin: 0; border-radius: 0; grid-template-columns: 1fr; }
            .sidebar { min-height: auto; border-right: 0; border-bottom: 1px solid var(--mac-border); }
            .sidebar-menu { display: flex; overflow-x: auto; padding: 10px; gap: 6px; }
            .sidebar-section, .brand-subtitle, .toolbar-search { display: none; }
            .sidebar-link { white-space: nowrap; }
            .content-area { padding: 18px; }
            .stats-grid, .dashboard-grid, .form-grid { grid-template-columns: 1fr; }
            .top-bar { align-items: flex-start; }
            .toast { top: 14px; right: 14px; }
        }
    </style>
    @yield('styles')
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success toast" role="status" aria-live="polite">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="app-shell">
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

        <main class="main-content">
            <div class="top-bar">
                <h2>@yield('header', 'Dashboard')</h2>
                <div class="toolbar-search"><i class="fas fa-magnifying-glass"></i> Search content, modules, and records</div>
                <div class="user-info">
                    <div class="user-pill">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</div>
                    <span>{{ Auth::user()->name ?? 'Admin' }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn"><i class="fas fa-right-from-bracket"></i> Logout</button>
                    </form>
                </div>
            </div>

            <div class="content-area">
                @yield('content')
            </div>
        </main>
    </div>
    @yield('scripts')
</body>
</html>
