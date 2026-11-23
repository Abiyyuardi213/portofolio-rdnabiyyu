<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('header', 'Admin') - Abiyyu Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --page: #ffffff;
            --container-padding: 40px;
            --paper: #ffffff;
            --ink: #0f172a;
            --muted: #64748b;
            --line: #e2e8f0;
            --line-strong: #cbd5e1;
            --brand-blue: #2563eb;
            --brand-blue-hover: #1d4ed8;
            --brand-dark: #1e3a8a;
            --brand-light: #eff6ff;
            --black: #0f172a;
            --shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.05), 0 8px 10px -6px rgba(15, 23, 42, 0.05);
        }
        html { scroll-behavior: smooth; }
        body {
            min-height: 100vh;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--ink);
            background: #f8fafc;
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
            background-image: radial-gradient(rgba(17,17,17,0.05) 0.8px, transparent 0.8px);
            background-size: 20px 20px;
            opacity: 0.5;
        }
        a { color: inherit; }

        .admin-shell {
            display: flex;
            min-height: 100vh;
            width: 100%;
            position: relative;
        }
        .admin-sidebar {
            width: 260px;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(18px);
            border-right: 1px solid var(--line);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 10;
        }
        .sidebar-brand {
            height: 72px;
            padding: 0 24px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid var(--line);
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
        .sidebar-menu {
            list-style: none;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
            overflow-y: auto;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            border-radius: 8px;
            color: var(--ink);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            opacity: 0.8;
            transition: all 0.2s ease;
        }
        .sidebar-link:hover {
            opacity: 1;
            background: rgba(0, 0, 0, 0.04);
        }
        .sidebar-link.active {
            opacity: 1;
            background: var(--brand-blue);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }
        .sidebar-link i {
            width: 16px;
            text-align: center;
            font-size: 14px;
        }
        .sidebar-footer {
            padding: 20px 16px;
            border-top: 1px solid var(--line);
            display: flex;
            flex-direction: column;
            gap: 12px;
            background: rgba(255,255,255,0.5);
        }
        .user-info-pill {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 4px 6px;
        }
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--yellow);
            color: var(--ink);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 13px;
            border: 1px solid var(--line-strong);
        }
        .user-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--ink);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .btn-logout {
            width: 100%;
            justify-content: center;
        }

        .admin-main {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            min-width: 0;
        }
        .admin-topbar {
            height: 72px;
            padding: 0 var(--container-padding);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--line);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(18px);
            position: sticky;
            top: 0;
            z-index: 9;
        }
        .admin-topbar h2 {
            font-size: 16px;
            font-weight: 800;
            color: var(--ink);
        }
        .admin-content-wrap {
            flex: 1;
            background: rgba(255,255,255,0.96);
        }
        .content-area {
            padding: 40px var(--container-padding);
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

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 32px;
        }
        .section-header h1 {
            font-size: clamp(2rem, 3.55vw, 3.35rem);
            line-height: 1.07;
            font-weight: 800;
            color: var(--ink);
        }
        .section-header p {
            color: var(--muted);
            font-size: 15px;
            margin-top: 8px;
        }

        .card {
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 32px;
            margin-bottom: 24px;
            box-shadow: none;
        }
        .card-header {
            margin-bottom: 24px;
            border-bottom: 1px solid var(--line);
            padding-bottom: 16px;
        }
        .card-header h3 {
            font-size: 20px;
            font-weight: 800;
        }
        .card-subtitle {
            color: var(--muted);
            font-size: 13px;
            margin-top: 4px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }
        .stat-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 24px;
            min-height: 120px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s ease, background 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            border-color: var(--line-strong);
        }
        .stat-label {
            color: var(--muted);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .stat-value {
            font-size: clamp(2rem, 3vw, 2.75rem);
            font-weight: 800;
            line-height: 1.1;
            color: var(--ink);
            margin-top: 8px;
        }
        .stat-icon {
            align-self: flex-end;
            color: var(--ink);
            font-size: 16px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1.35fr 0.65fr;
            gap: 20px;
        }
        .chart-preview {
            height: 280px;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 16px;
            background: #fafafa;
        }
        .chart-preview svg {
            width: 100%;
            height: 100%;
            display: block;
        }
        .quick-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            min-height: 38px;
            padding: 0 20px;
            border-radius: 8px;
            border: 1px solid var(--line);
            cursor: pointer;
            text-decoration: none;
            font-family: inherit;
            font-weight: 700;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: transform 0.16s, box-shadow 0.16s, background 0.16s, border-color 0.16s;
        }
        .btn:hover {
            transform: translateY(-1px);
        }
        .btn-primary {
            color: #fff;
            border: 0;
            background: var(--brand-blue);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }
        .btn-primary:hover {
            background: var(--brand-blue-hover);
        }
        .btn-outline {
            color: var(--ink);
            background: #ffffff;
            border: 1px solid var(--line-strong);
        }
        .btn-outline:hover {
            background: #f5f5f1;
        }
        .btn-danger {
            color: #fff;
            border: 0;
            background: #ff3b30;
        }
        .btn-danger:hover {
            background: #e02d22;
        }
        .btn-icon {
            width: 38px;
            height: 38px;
            padding: 0;
        }
        .button-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 24px;
        }

        .table-wrap {
            overflow-x: auto;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #ffffff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 620px;
        }
        th {
            text-align: left;
            padding: 14px 16px;
            color: var(--muted);
            font-weight: 800;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            background: #fcfcfc;
            border-bottom: 1px solid var(--line);
        }
        td {
            padding: 16px;
            border-bottom: 1px solid var(--line);
            font-size: 14px;
            color: var(--ink);
            vertical-align: middle;
        }
        tbody tr:last-child td {
            border-bottom: 0;
        }
        tr:hover td {
            background: #fbfbf9;
        }
        .table-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .tag-pill {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            border-radius: 999px;
            background: #f5f5f1;
            color: var(--ink);
            border: 1px solid var(--line);
            font-size: 12px;
            font-weight: 700;
        }

        .form-panel {
            max-width: 820px;
        }
        .form-panel-wide {
            max-width: none;
        }
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }
        .form-with-preview {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 280px;
            gap: 28px;
            align-items: start;
        }
        .profile-form-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 360px;
            gap: 28px;
            align-items: start;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: var(--ink);
            font-size: 13px;
            font-weight: 800;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid var(--line-strong);
            border-radius: 8px;
            background: rgba(255,255,255,0.92);
            font-family: inherit;
            font-size: 14px;
            color: var(--ink);
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }
        textarea {
            min-height: 120px;
            resize: vertical;
            line-height: 1.5;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--brand-blue);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
        }

        .text-editor {
            border: 1px solid var(--line-strong);
            border-radius: 10px;
            overflow: hidden;
            background: #ffffff;
        }
        .text-editor-toolbar {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            padding: 8px;
            border-bottom: 1px solid var(--line);
            background: #fbfbf9;
        }
        .editor-btn {
            width: 30px;
            height: 30px;
            border: 1px solid var(--line);
            border-radius: 6px;
            background: #ffffff;
            color: var(--ink);
            cursor: pointer;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }
        .editor-btn:hover {
            border-color: var(--ink);
            background: #f5f5f1;
        }
        .text-editor-area {
            min-height: 160px;
            padding: 14px;
            outline: none;
            font-size: 14px;
            line-height: 1.6;
        }
        .text-editor-area:empty::before {
            content: attr(data-placeholder);
            color: var(--muted);
        }
        .text-editor-area ul,
        .text-editor-area ol {
            padding-left: 1.25rem;
        }

        .crop-panel {
            position: sticky;
            top: 100px;
            padding: 20px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: #fbfbf9;
        }
        .crop-panel h4 {
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 12px;
        }
        .crop-frame {
            width: 100%;
            aspect-ratio: 1;
            border: 1px solid var(--line);
            border-radius: 12px;
            overflow: hidden;
            display: grid;
            place-items: center;
            background: #f5f5f1;
            color: var(--muted);
            font-size: 13px;
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
            margin-top: 16px;
        }
        .crop-control input { padding: 0; }
        .profile-photo-preview {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 12px;
            color: var(--muted);
            font-size: 13px;
        }
        .profile-photo-preview img {
            width: 54px;
            height: 54px;
            border-radius: 12px;
            border: 1px solid var(--line);
            object-fit: cover;
        }
        .profile-preview-panel {
            position: sticky;
            top: 100px;
            padding: 20px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: #fbfbf9;
        }
        .profile-preview-panel h4 {
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 12px;
        }
        .profile-preview-frame {
            width: 100%;
            aspect-ratio: 1;
            border: 1px solid var(--line);
            border-radius: 16px;
            overflow: hidden;
            display: grid;
            place-items: center;
            background: #f5f5f1;
            color: var(--muted);
            font-size: 13px;
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
            min-height: 48px;
            padding: 8px 12px;
            border: 1px solid var(--line-strong);
            border-radius: 8px;
            background: linear-gradient(180deg, #fff, #fbfbf9);
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
            color: var(--muted);
            font-size: 13px;
            overflow: hidden;
        }
        .upload-meta i {
            color: var(--ink);
            font-size: 14px;
        }
        .upload-filename {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .upload-button {
            flex: 0 0 auto;
            min-height: 32px;
            padding: 0 12px;
            border: 1px solid var(--line);
            border-radius: 6px;
            background: #ffffff;
            color: var(--ink);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }
        .profile-gallery-preview {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-top: 14px;
        }
        .profile-gallery-preview > img,
        .gallery-crop-thumb img {
            width: 100%;
            aspect-ratio: 1;
            border-radius: 10px;
            border: 1px solid var(--line);
            object-fit: cover;
            background: #f5f5f1;
        }
        .gallery-crop-thumb {
            min-width: 0;
            padding: 8px;
            border: 2px solid transparent;
            border-radius: 14px;
            background: rgba(255,255,255,0.82);
            cursor: pointer;
            text-align: left;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.62);
        }
        .gallery-crop-thumb.active {
            border-color: var(--ink);
            background: rgba(0,0,0,0.04);
        }
        .gallery-crop-thumb span {
            display: block;
            margin-top: 6px;
            color: var(--muted);
            font-size: 12px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .profile-detail-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 280px;
            gap: 24px;
            align-items: start;
        }
        .detail-table {
            border: 1px solid var(--line);
            border-radius: 18px;
            overflow: hidden;
            background: #fff;
        }
        .detail-row {
            display: grid;
            grid-template-columns: 180px minmax(0, 1fr);
            border-bottom: 1px solid var(--line);
        }
        .detail-row:last-child { border-bottom: 0; }
        .detail-row > span {
            padding: 16px 20px;
            background: #fcfcfc;
            color: var(--muted);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-right: 1px solid var(--line);
        }
        .detail-row > strong,
        .detail-row > div {
            min-width: 0;
            padding: 16px 20px;
            font-size: 14px;
            color: var(--ink);
        }
        .rich-preview {
            color: var(--ink);
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
            color: var(--ink);
            font-weight: 800;
        }
        .profile-photo-card {
            border: 1px solid var(--line);
            border-radius: 18px;
            background: #ffffff;
            overflow: hidden;
            padding: 16px;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 10px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid rgba(22, 195, 74, 0.28);
        }
        .alert-success { background: rgba(22, 195, 74, 0.1); color: #16c34a; }
        .alert-error { background: rgba(255,59,48,0.1); color: #ff3b30; border-color: rgba(255,59,48,0.26); }
        
        .modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(8px);
        }
        .modal-backdrop.active { display: flex; }
        .modal-panel {
            width: min(440px, 100%);
            border: 1px solid var(--line);
            border-radius: 18px;
            background: #ffffff;
            box-shadow: var(--shadow);
            overflow: hidden;
            padding: 24px;
        }
        .modal-body h3 { font-size: 20px; font-weight: 800; margin-bottom: 12px; }
        .modal-body p { color: var(--muted); font-size: 14px; line-height: 1.5; margin-bottom: 24px; }
        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .toast {
            position: fixed;
            top: 24px;
            right: 24px;
            z-index: 999;
            min-width: min(340px, calc(100vw - 48px));
            max-width: 420px;
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 12px;
            box-shadow: var(--shadow);
            animation: toast-in 0.22s ease-out, toast-out 0.24s ease-in 4.2s forwards;
        }
        .toast.alert-success { background: #ffffff; border-color: rgba(22, 195, 74, 0.28); color: var(--ink); }
        .toast.alert-error { background: #ffffff; border-color: rgba(255,59,48,0.26); color: var(--ink); }
        .toast i { margin-right: 8px; }
        .toast.alert-success i { color: #16c34a; }
        .toast.alert-error i { color: #ff3b30; }

        .admin-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex: 0 0 auto;
            padding: 18px var(--container-padding);
            color: var(--muted);
            border-top: 1px solid var(--line);
            background: rgba(255,255,255,0.88);
            font-size: 13px;
        }

        @keyframes toast-in {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes toast-out {
            to { opacity: 0; transform: translateY(-8px); pointer-events: none; }
        }
        .empty-state { padding: 28px; text-align: center; color: var(--muted); }

        @media (min-width: 1640px) {
            :root {
                --container-padding: calc((100vw - 260px - 1380px) / 2 + 48px);
            }
        }

        @media (max-width: 900px) {
            .admin-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: var(--shadow);
            }
            .admin-sidebar.active {
                transform: translateX(0);
            }
            .admin-main {
                margin-left: 0;
            }
            .admin-topbar {
                padding: 0 16px;
                gap: 12px;
            }
            .hamburger {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                order: -1;
                margin-right: 8px;
            }
            .sidebar-overlay {
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.3);
                z-index: 8;
                opacity: 0;
                pointer-events: none;
                transition: opacity 0.3s ease;
            }
            .sidebar-overlay.active {
                opacity: 1;
                pointer-events: auto;
            }
            .content-area {
                padding: 24px 16px;
            }
            .stats-grid, .dashboard-grid, .form-grid, .profile-form-layout, .profile-detail-layout, .form-with-preview {
                grid-template-columns: 1fr;
            }
            .crop-panel, .profile-preview-panel { position: static; }
            .detail-row { grid-template-columns: 1fr; }
            .detail-row > span { border-right: 0; border-bottom: 1px solid var(--line); }
        }
    </style>
    @yield('styles')
</head>
<body>
    @include('components.admin.toast')

    <div class="admin-shell">
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <aside class="admin-sidebar" id="adminSidebar">
            <div class="sidebar-brand">
                <a href="{{ url('/') }}" class="nav-brand" style="color: var(--ink);">
                    <span class="nav-brand-icon">A</span>
                    <span>Portofolio</span>
                </a>
            </div>
            <ul class="sidebar-menu">
                <li><a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"><i class="fas fa-chart-pie"></i> Overview</a></li>
                <li><a href="{{ route('profile.index') }}" class="sidebar-link {{ Request::is('admin/profile*') ? 'active' : '' }}"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="{{ route('experiences.index') }}" class="sidebar-link {{ Request::is('admin/experiences*') ? 'active' : '' }}"><i class="fas fa-briefcase"></i> Experience</a></li>
                <li><a href="{{ route('projects.index') }}" class="sidebar-link {{ Request::is('admin/projects*') ? 'active' : '' }}"><i class="fas fa-folder-open"></i> Projects</a></li>
                <li><a href="{{ route('skills.index') }}" class="sidebar-link {{ Request::is('admin/skills*') ? 'active' : '' }}"><i class="fas fa-wand-magic-sparkles"></i> Skills</a></li>
                <li><a href="{{ route('education.index') }}" class="sidebar-link {{ Request::is('admin/education*') ? 'active' : '' }}"><i class="fas fa-graduation-cap"></i> Education</a></li>
            </ul>
            <div class="sidebar-footer">
                <div class="user-info-pill">
                    <span class="user-avatar">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</span>
                    <span class="user-name">{{ Auth::user()->name ?? 'Admin' }}</span>
                </div>
                <button type="button" class="btn btn-outline btn-logout" id="openLogoutModal"><i class="fas fa-right-from-bracket"></i> Logout</button>
            </div>
        </aside>

        <div class="admin-main">
            <header class="admin-topbar">
                <button type="button" class="hamburger" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                <h2>@yield('header', 'Admin Panel')</h2>
                <div class="topbar-actions">
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-outline"><i class="fas fa-arrow-up-right-from-square"></i> Preview Site</a>
                </div>
            </header>
            <main class="admin-content-wrap">
                <div class="content-area">
                    @yield('content')
                </div>
            </main>
            <footer class="admin-footer">
                <span>Portfolio Admin</span>
                <span>&copy; {{ date('Y') }} Abiyyu Ardilian</span>
            </footer>
        </div>
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

        const sidebarToggle = document.getElementById('sidebarToggle');
        const adminSidebar = document.getElementById('adminSidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            adminSidebar?.classList.toggle('active');
            sidebarOverlay?.classList.toggle('active');
            sidebarToggle.innerHTML = adminSidebar?.classList.contains('active')
                ? '<i class="fas fa-times"></i>'
                : '<i class="fas fa-bars"></i>';
        }

        sidebarToggle?.addEventListener('click', toggleSidebar);
        sidebarOverlay?.addEventListener('click', toggleSidebar);
    </script>
    @yield('scripts')
</body>
</html>
