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
        .main-content { min-width: 0; min-height: 0; display: flex; flex-direction: column; background: #ffffff; }

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
        .content-area {
            width: 100%;
            flex: 1 0 auto;
            padding: 24px clamp(24px, 3vw, 38px);
        }

        .modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.28);
        }
        .modal-backdrop.active { display: flex; }
        .modal-panel {
            width: min(390px, 100%);
            border: 1px solid var(--mac-border);
            border-radius: 14px;
            background: #ffffff;
            box-shadow: 0 18px 48px rgba(0, 0, 0, 0.18);
            overflow: hidden;
        }
        .modal-titlebar {
            height: 38px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0 14px;
            border-bottom: 1px solid var(--mac-border-soft);
            background: var(--mac-toolbar);
        }
        .modal-body { padding: 20px; }
        .modal-body h3 { font-size: 18px; margin-bottom: 8px; }
        .modal-body p { color: var(--mac-muted); font-size: 13px; line-height: 1.5; }
        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 0 20px 20px;
        }

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
        .form-panel-wide { max-width: none; }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; }
        .form-with-preview { display: grid; grid-template-columns: minmax(0, 1fr) minmax(260px, 0.36fr); gap: 20px; align-items: start; }
        .profile-form-layout { display: grid; grid-template-columns: minmax(0, 1fr) 360px; gap: 22px; align-items: start; }
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

        .text-editor {
            border: 1px solid #c7c7cc;
            border-radius: 10px;
            overflow: hidden;
            background: #ffffff;
        }
        .text-editor-toolbar {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            padding: 8px;
            border-bottom: 1px solid var(--mac-border-soft);
            background: #fbfbfc;
        }
        .editor-btn {
            width: 30px;
            height: 30px;
            border: 1px solid var(--mac-border);
            border-radius: 7px;
            background: #ffffff;
            color: #3a3a3c;
            cursor: pointer;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
        }
        .editor-btn:hover { border-color: var(--mac-blue); color: var(--mac-blue); }
        .text-editor-area {
            min-height: 160px;
            padding: 11px 12px;
            outline: none;
            font-size: 13px;
            line-height: 1.6;
        }
        .text-editor-area:empty::before {
            content: attr(data-placeholder);
            color: #8e8e93;
        }
        .text-editor-area ul,
        .text-editor-area ol {
            padding-left: 1.25rem;
        }

        .crop-panel {
            position: sticky;
            top: 82px;
            padding: 14px;
            border: 1px solid var(--mac-border);
            border-radius: 12px;
            background: #fbfbfc;
        }
        .crop-panel h4 {
            font-size: 13px;
            margin-bottom: 8px;
        }
        .crop-frame {
            width: 100%;
            aspect-ratio: 1;
            border: 1px solid var(--mac-border);
            border-radius: 12px;
            overflow: hidden;
            display: grid;
            place-items: center;
            background: #f2f2f7;
            color: var(--mac-muted);
            font-size: 12px;
            text-align: center;
        }
        .crop-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform-origin: center;
            display: none;
        }
        .crop-frame.has-image span { display: none; }
        .crop-frame.has-image img { display: block; }
        .crop-control {
            margin-top: 12px;
        }
        .crop-control input { padding: 0; }
        .profile-photo-preview {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
            color: var(--mac-muted);
            font-size: 12px;
        }
        .profile-photo-preview img {
            width: 54px;
            height: 54px;
            border-radius: 12px;
            border: 1px solid var(--mac-border);
            object-fit: cover;
        }
        .profile-preview-panel {
            position: sticky;
            top: 82px;
            padding: 14px;
            border: 1px solid var(--mac-border);
            border-radius: 12px;
            background: #fbfbfc;
        }
        .profile-preview-panel h4 {
            font-size: 13px;
            margin-bottom: 8px;
        }
        .profile-preview-frame {
            width: 100%;
            aspect-ratio: 1;
            border: 1px solid var(--mac-border);
            border-radius: 16px;
            overflow: hidden;
            display: grid;
            place-items: center;
            background: #f2f2f7;
            color: var(--mac-muted);
            font-size: 12px;
            text-align: center;
            cursor: grab;
            user-select: none;
            touch-action: none;
        }
        .profile-preview-frame.dragging { cursor: grabbing; }
        .profile-preview-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            transform-origin: center;
            pointer-events: none;
        }
        .profile-preview-frame.has-image span { display: none; }
        .profile-preview-frame.has-image img { display: block; }
        .upload-control {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            min-height: 46px;
            padding: 8px 10px;
            border: 1px solid #c7c7cc;
            border-radius: 10px;
            background: linear-gradient(180deg, #fff, #f7f7f8);
        }
        .upload-control input[type="file"] {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
            pointer-events: none;
        }
        .upload-meta {
            min-width: 0;
            display: flex;
            align-items: center;
            gap: 9px;
            color: var(--mac-muted);
            font-size: 12px;
            overflow: hidden;
        }
        .upload-meta i {
            color: var(--mac-blue);
            font-size: 14px;
        }
        .upload-filename {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .upload-button {
            flex: 0 0 auto;
            min-height: 30px;
            padding: 0 10px;
            border: 1px solid var(--mac-border);
            border-radius: 8px;
            background: #ffffff;
            color: #2c2c2e;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }
        .profile-gallery-preview {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-top: 12px;
        }
        .profile-gallery-preview > img,
        .gallery-crop-thumb img {
            width: 100%;
            aspect-ratio: 1;
            border-radius: 10px;
            border: 1px solid var(--mac-border);
            object-fit: cover;
            background: #f2f2f7;
        }
        .gallery-crop-thumb {
            min-width: 0;
            padding: 6px;
            border: 2px solid transparent;
            border-radius: 14px;
            background: rgba(255,255,255,0.82);
            cursor: pointer;
            text-align: left;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.62);
        }
        .gallery-crop-thumb.active {
            border-color: var(--mac-blue);
            background: rgba(0,122,255,0.08);
        }
        .gallery-crop-thumb span {
            display: block;
            margin-top: 6px;
            color: var(--mac-muted);
            font-size: 12px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .profile-detail-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 260px;
            gap: 18px;
            align-items: start;
        }
        .detail-table {
            border: 1px solid var(--mac-border);
            border-radius: 14px;
            overflow: hidden;
            background: #fff;
        }
        .detail-row {
            display: grid;
            grid-template-columns: 150px minmax(0, 1fr);
            border-bottom: 1px solid var(--mac-border);
        }
        .detail-row:last-child { border-bottom: 0; }
        .detail-row > span {
            padding: 13px 14px;
            background: #f7f7f9;
            color: var(--mac-muted);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
        }
        .detail-row > strong,
        .detail-row > div {
            min-width: 0;
            padding: 13px 14px;
            font-size: 14px;
        }
        .detail-row-block { grid-template-columns: 150px minmax(0, 1fr); }
        .rich-preview {
            color: var(--mac-text);
            line-height: 1.6;
        }
        .rich-preview p { margin-bottom: 0.75rem; }
        .rich-preview p:last-child { margin-bottom: 0; }
        .rich-preview ul,
        .rich-preview ol {
            margin: 0.65rem 0;
            padding-left: 1.2rem;
        }
        .rich-preview a {
            color: var(--mac-blue);
            font-weight: 700;
        }
        .profile-photo-card {
            border: 1px solid var(--mac-border);
            border-radius: 14px;
            background: #f7f7f9;
            overflow: hidden;
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
        .alert-error { background: rgba(255,69,58,0.1); color: #b42318; border-color: rgba(255,69,58,0.26); }
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
        .toast.alert-error i { color: #d70015; }
        .admin-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex: 0 0 auto;
            padding: 11px clamp(24px, 3vw, 38px);
            color: var(--mac-muted);
            border-top: 1px solid var(--mac-border);
            background: #ffffff;
            font-size: 12px;
        }

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
            .form-with-preview { grid-template-columns: 1fr; }
            .profile-form-layout { grid-template-columns: 1fr; }
            .profile-detail-layout { grid-template-columns: 1fr; }
            .crop-panel { position: static; }
            .profile-preview-panel { position: static; }
            .top-bar { align-items: flex-start; }
            .toast { top: 14px; right: 14px; }
        }
    </style>
    @yield('styles')
</head>
<body>
    @include('components.admin.toast')

    <div class="app-shell">
        @include('components.admin.sidebar')

        <main class="main-content">
            @include('components.admin.topbar')

            <div class="content-area">
                @yield('content')
            </div>
            @include('components.admin.footer')
        </main>
    </div>

    @include('components.admin.logout-modal')

    <script>
        const logoutModal = document.getElementById('logoutModal');
        const openLogoutModal = document.getElementById('openLogoutModal');
        const cancelLogout = document.getElementById('cancelLogout');
        const confirmLogout = document.getElementById('confirmLogout');
        const logoutForm = document.getElementById('logoutForm');

        function closeLogoutModal() {
            logoutModal.classList.remove('active');
            logoutModal.setAttribute('aria-hidden', 'true');
        }

        openLogoutModal?.addEventListener('click', () => {
            logoutModal.classList.add('active');
            logoutModal.setAttribute('aria-hidden', 'false');
        });

        cancelLogout?.addEventListener('click', closeLogoutModal);
        confirmLogout?.addEventListener('click', () => logoutForm.submit());
        logoutModal?.addEventListener('click', (event) => {
            if (event.target === logoutModal) closeLogoutModal();
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && logoutModal.classList.contains('active')) {
                closeLogoutModal();
            }
        });

        document.querySelectorAll('[data-text-editor]').forEach((editor) => {
            const area = editor.querySelector('[data-editor-area]');
            const input = editor.querySelector('[data-editor-input]');
            const form = editor.closest('form');

            function syncEditor() {
                input.value = area.innerHTML.trim();
            }

            editor.querySelectorAll('[data-editor-command]').forEach((button) => {
                button.addEventListener('click', () => {
                    area.focus();
                    const command = button.dataset.editorCommand;

                    if (command === 'createLink') {
                        const url = window.prompt('Masukkan URL link');
                        if (url) document.execCommand(command, false, url);
                    } else {
                        document.execCommand(command, false, null);
                    }

                    syncEditor();
                });
            });

            area.addEventListener('input', syncEditor);
            form?.addEventListener('submit', syncEditor);
            syncEditor();
        });

        document.querySelectorAll('[data-profile-photo-input]').forEach((primaryInput) => {
            const form = primaryInput.closest('form');
            const preview = form?.querySelector('[data-profile-photo-preview]');
            const frame = form?.querySelector('[data-profile-preview-frame]');
            const zoom = form?.querySelector('[data-profile-photo-zoom]');
            const primaryHidden = form?.querySelector('[data-cropped-photo]');
            const primaryFilename = form?.querySelector('[data-upload-filename]');
            const galleryInput = form?.querySelector('[data-gallery-photo-input]');
            const gallery = form?.querySelector('[data-gallery-preview]');
            const galleryFilename = form?.querySelector('[data-gallery-filename]');
            const cropState = { x: 0, y: 0, dragging: false, startX: 0, startY: 0, originX: 0, originY: 0 };
            let activeHidden = null;
            let activeThumb = null;

            function updateProfilePreview() {
                if (!preview || !zoom) return;
                preview.style.transform = `translate(${cropState.x}px, ${cropState.y}px) scale(${zoom.value})`;
            }

            function writeActiveCrop() {
                if (!activeHidden || !preview?.complete || !preview.naturalWidth || !zoom || !frame) return;

                const size = 512;
                const canvas = document.createElement('canvas');
                canvas.width = size;
                canvas.height = size;
                const context = canvas.getContext('2d');
                const scale = Math.max(size / preview.naturalWidth, size / preview.naturalHeight) * Number(zoom.value);
                const width = preview.naturalWidth * scale;
                const height = preview.naturalHeight * scale;
                const ratio = size / (frame.clientWidth || 1);

                context.drawImage(preview, (size - width) / 2 + cropState.x * ratio, (size - height) / 2 + cropState.y * ratio, width, height);
                activeHidden.value = canvas.toDataURL('image/png');
            }

            function resetCropState() {
                cropState.x = 0;
                cropState.y = 0;
                cropState.dragging = false;
                if (zoom) zoom.value = 1;
                updateProfilePreview();
            }

            function setActiveImage(source, hidden, thumb = null) {
                if (!preview || !frame) return;

                activeHidden = hidden;
                activeThumb?.classList.remove('active');
                activeThumb = thumb;
                activeThumb?.classList.add('active');
                preview.src = source;
                frame.classList.add('has-image');
                resetCropState();
                preview.onload = () => {
                    updateProfilePreview();
                    writeActiveCrop();
                };
                if (preview.complete) writeActiveCrop();
            }

            function createThumb(source, hidden, label) {
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'gallery-crop-thumb';
                button.title = label;
                const image = document.createElement('img');
                image.src = source;
                image.alt = label;
                const caption = document.createElement('span');
                caption.textContent = label;
                button.append(image, caption);
                button.addEventListener('click', () => setActiveImage(source, hidden, button));
                return button;
            }

            primaryInput.addEventListener('change', () => {
                const file = primaryInput.files?.[0];
                if (!file || !primaryHidden) return;
                if (primaryFilename) primaryFilename.textContent = file.name;

                const reader = new FileReader();
                reader.onload = (event) => {
                    const source = event.target.result;
                    let thumb = form.querySelector('[data-primary-crop-thumb]');
                    if (!thumb && gallery) {
                        thumb = createThumb(source, primaryHidden, file.name);
                        thumb.dataset.primaryCropThumb = 'true';
                        gallery.prepend(thumb);
                    } else if (thumb) {
                        thumb.querySelector('img').src = source;
                    }
                    setActiveImage(source, primaryHidden, thumb);
                };
                reader.readAsDataURL(file);
            });

            galleryInput?.addEventListener('change', () => {
                const files = Array.from(galleryInput.files || []);
                if (galleryFilename) galleryFilename.textContent = files.length ? `${files.length} photos selected` : 'No gallery photos selected';
                if (!gallery || !files.length) return;

                gallery.querySelectorAll('[data-new-gallery-thumb]').forEach((item) => item.remove());
                form.querySelectorAll('input[data-new-gallery-hidden]').forEach((item) => item.remove());

                files.forEach((file) => {
                    const hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.name = 'cropped_photos[]';
                    hidden.dataset.newGalleryHidden = 'true';
                    form.appendChild(hidden);

                    const reader = new FileReader();
                    reader.onload = (event) => {
                        const source = event.target.result;
                        const thumb = createThumb(source, hidden, file.name);
                        thumb.dataset.newGalleryThumb = 'true';
                        gallery.appendChild(thumb);
                        if (!activeHidden) setActiveImage(source, hidden, thumb);
                    };
                    reader.readAsDataURL(file);
                });
            });

            zoom?.addEventListener('input', () => {
                updateProfilePreview();
                writeActiveCrop();
            });

            frame?.addEventListener('pointerdown', (event) => {
                if (!frame.classList.contains('has-image')) return;
                cropState.dragging = true;
                cropState.startX = event.clientX;
                cropState.startY = event.clientY;
                cropState.originX = cropState.x;
                cropState.originY = cropState.y;
                frame.classList.add('dragging');
                frame.setPointerCapture(event.pointerId);
            });

            frame?.addEventListener('pointermove', (event) => {
                if (!cropState.dragging) return;
                cropState.x = cropState.originX + (event.clientX - cropState.startX);
                cropState.y = cropState.originY + (event.clientY - cropState.startY);
                updateProfilePreview();
                writeActiveCrop();
            });

            function stopDrag(event) {
                if (!cropState.dragging) return;
                cropState.dragging = false;
                frame.classList.remove('dragging');
                if (event?.pointerId && frame.hasPointerCapture?.(event.pointerId)) {
                    frame.releasePointerCapture(event.pointerId);
                }
                writeActiveCrop();
            }

            frame?.addEventListener('pointerup', stopDrag);
            frame?.addEventListener('pointercancel', stopDrag);
            frame?.addEventListener('lostpointercapture', stopDrag);
            form?.addEventListener('submit', writeActiveCrop);
        });
    </script>
    @yield('scripts')
</body>
</html>
