<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Abiyyu Dev</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --brand-blue: #2563eb;
            --brand-blue-hover: #1d4ed8;
            --brand-dark: #0f172a;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            color: var(--text-main);
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            -webkit-font-smoothing: antialiased;
        }

        .login-window {
            width: min(440px, 100%);
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            box-shadow: 0 20px 25px -5px rgba(15, 23, 42, 0.05), 0 8px 10px -6px rgba(15, 23, 42, 0.05);
            overflow: hidden;
        }

        .login-header {
            text-align: center;
            padding: 36px 32px 20px;
        }

        .login-logo {
            width: 56px;
            height: 56px;
            margin: 0 auto 16px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 20px;
            background: var(--brand-blue);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
        }

        h1 {
            font-size: 22px;
            font-weight: 800;
            color: var(--brand-dark);
            letter-spacing: -0.02em;
        }

        p {
            color: var(--text-muted);
            font-size: 13px;
            margin-top: 6px;
            line-height: 1.5;
        }

        .login-content {
            padding: 0 32px 36px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: var(--brand-dark);
            font-size: 13px;
            font-weight: 700;
        }

        input {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            background: #ffffff;
            color: var(--text-main);
            font-family: inherit;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--brand-blue);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
        }

        .btn {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: 0;
            border-radius: 10px;
            background: var(--brand-blue);
            color: #fff;
            cursor: pointer;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.25);
            transition: background 0.2s ease;
        }

        .btn:hover {
            background: var(--brand-blue-hover);
        }

        .error-box {
            padding: 12px 14px;
            margin-bottom: 18px;
            border-radius: 10px;
            background: #fef2f2;
            border: 1px solid #fee2e2;
            color: #b91c1c;
            font-size: 13px;
            font-weight: 600;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            font-weight: 700;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: var(--brand-blue);
        }
    </style>
</head>
<body>

<div class="login-window">
    <div class="login-header">
        <div class="login-logo">
            <i class="fas fa-terminal"></i>
        </div>
        <h1>Portal Masuk Admin</h1>
        <p>Autentikasi aman untuk mengelola data portofolio</p>
    </div>

    <div class="login-content">
        @if ($errors->any())
            <div class="error-box">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@example.com">
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit" class="btn">
                <i class="fas fa-right-to-bracket" style="margin-right: 6px;"></i> Masuk ke Dashboard
            </button>
        </form>

        <a href="{{ url('/') }}" class="back-link">
            <i class="fas fa-arrow-left" style="margin-right: 4px;"></i> Kembali ke Beranda
        </a>
    </div>
</div>

</body>
</html>
