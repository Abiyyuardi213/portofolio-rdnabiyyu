<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;750&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --mac-bg: #f5f5f7;
            --mac-window: #ffffff;
            --mac-border: #dedee3;
            --mac-text: #1d1d1f;
            --mac-muted: #6e6e73;
            --mac-blue: #007aff;
            --mac-red: #ff453a;
        }

        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 20px;
            color: var(--mac-text);
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: var(--mac-bg);
            -webkit-font-smoothing: antialiased;
        }

        .login-window {
            width: min(420px, 100%);
            overflow: hidden;
            border: 1px solid var(--mac-border);
            border-radius: 12px;
            background: var(--mac-window);
            box-shadow: 0 8px 26px rgba(0,0,0,0.08);
        }

        .titlebar {
            height: 42px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0 16px;
            border-bottom: 1px solid var(--mac-border);
            background: rgba(250,250,251,0.88);
        }

        .traffic-light { width: 12px; height: 12px; border-radius: 50%; box-shadow: inset 0 0 0 1px rgba(0,0,0,0.08); }
        .red { background: #ff5f57; }
        .yellow { background: #febc2e; }
        .green { background: #28c840; }

        .login-content { padding: 30px; }
        .login-header { text-align: center; margin-bottom: 28px; }
        .login-logo {
            width: 58px;
            height: 58px;
            margin: 0 auto 16px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 22px;
            background: var(--mac-blue);
        }
        h1 { font-size: 22px; font-weight: 750; margin-bottom: 6px; }
        p { color: var(--mac-muted); font-size: 13px; }
        .form-group { margin-bottom: 14px; }
        label { display: block; margin-bottom: 6px; color: #3a3a3c; font-size: 12px; font-weight: 700; }
        input {
            width: 100%;
            padding: 9px 10px;
            border: 1px solid #c7c7cc;
            border-radius: 7px;
            background: #ffffff;
            color: var(--mac-text);
            font-family: inherit;
            font-size: 13px;
            transition: border-color 0.16s, box-shadow 0.16s, background 0.16s;
        }
        input:focus {
            outline: none;
            border-color: var(--mac-blue);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(0,122,255,0.18);
        }
        .btn {
            width: 100%;
            min-height: 34px;
            margin-top: 8px;
            border: 1px solid #006ee6;
            border-radius: 7px;
            background: var(--mac-blue);
            color: #fff;
            cursor: pointer;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            box-shadow: none;
        }
        .btn:hover { background: #0066d6; }
        .error-message { color: var(--mac-red); font-size: 12px; margin: 8px 0 0; }
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            justify-content: center;
            width: 100%;
            margin-top: 18px;
            color: var(--mac-muted);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }
        .back-link:hover { color: var(--mac-text); }
    </style>
</head>
<body>
    <div class="login-window">
        <div class="titlebar" aria-hidden="true">
            <span class="traffic-light red"></span>
            <span class="traffic-light yellow"></span>
            <span class="traffic-light green"></span>
        </div>
        <div class="login-content">
            <div class="login-header">
                <div class="login-logo"><i class="fas fa-terminal"></i></div>
                <h1>Portfolio Admin</h1>
                <p>Login to manage your portfolio workspace</p>
            </div>

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="you@example.com" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                @if($errors->has('email'))
                    <p class="error-message">{{ $errors->first('email') }}</p>
                @endif

                <button type="submit" class="btn"><i class="fas fa-lock-open"></i> Sign In</button>
            </form>
            <a href="{{ url('/') }}" class="back-link"><i class="fas fa-arrow-left"></i> Back to public site</a>
        </div>
    </div>
</body>
</html>
