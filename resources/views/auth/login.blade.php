<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Kos</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
            margin: 0;
        }
        .auth-card {
            background: #ffffff;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <h2 style="margin-top: 0; margin-bottom: 6px; text-align: center;">🏠 Manajemen Kos</h2>
        <p style="color: #6b7280; font-size: 0.9rem; text-align: center; margin-bottom: 24px;">Silakan login untuk masuk ke sistem</p>

        @if ($errors->any())
            <div style="padding: 10px 14px; background: #fee2e2; color: #991b1b; border-radius: 6px; margin-bottom: 16px; font-size: 0.875rem;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div style="margin-bottom: 16px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 0.9rem;">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 0.9rem;">Password</label>
                <input type="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box;">
            </div>

            <button type="submit" style="width: 100%; padding: 11px; background: #2563eb; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">
                Login
            </button>
        </form>

        <p style="text-align: center; margin-top: 20px; font-size: 0.875rem; color: #6b7280;">
            Belum punya akun? <a href="{{ route('register') }}" style="color: #2563eb; text-decoration: none; font-weight: 600;">Daftar di sini</a>
        </p>
    </div>
</body>
</html>