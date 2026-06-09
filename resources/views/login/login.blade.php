<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — E-Voting Ketua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
        }

        .login-wrap {
            width: 100%;
            max-width: 380px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem;
        }

        .logo-icon {
            position: relative;
            width: 72px;
            height: 72px;
            margin-bottom: 0.75rem;
        }

        .logo-box-red {
            position: absolute;
            bottom: 0; left: 0;
            width: 52px; height: 52px;
            background: #dc2626;
            border-radius: 12px;
        }

        .logo-box-blue {
            position: absolute;
            top: 0; right: 0;
            width: 48px; height: 48px;
            background: #2563eb;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 0.2rem;
        }

        .login-subtitle {
            font-size: 0.85rem;
            color: #6b7280;
            margin-bottom: 1.5rem;
        }

        .login-card {
            width: 100%;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 1.75rem;
        }

        .alert-error {
            background: #fef2f2;
            color: #b91c1c;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .form-group { margin-bottom: 1rem; }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.375rem;
        }

        .form-group input {
            width: 100%;
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            padding: 0.6rem 0.875rem;
            font-size: 0.9rem;
            outline: none;
        }

        .form-group input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.15);
        }

        .form-group input.is-invalid { border-color: #dc3545; }

        .error-msg {
            font-size: 0.8rem;
            color: #dc3545;
            margin-top: 0.25rem;
            display: block;
        }

        .input-pw {
            display: flex;
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
        }

        .input-pw:focus-within {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.15);
        }

        .input-pw input {
            flex: 1;
            border: none;
            box-shadow: none !important;
        }

        .input-pw input:focus { border: none; box-shadow: none; }

        .input-pw button {
            background: none;
            border: none;
            padding: 0 0.75rem;
            color: #9ca3af;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .input-pw button:hover { color: #2563eb; }

        .btn-login {
            width: 100%;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.65rem;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 0.25rem;
        }

        .btn-login:hover { background: #1d4ed8; }

        .footer-text {
            text-align: center;
            font-size: 0.8rem;
            color: #9ca3af;
            margin-top: 1rem;
        }

        .footer-text a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="login-wrap">

        <div class="logo-icon">
            <div class="logo-box-red"></div>
            <div class="logo-box-blue">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
            </div>
        </div>

        <h1 class="login-title">E-Voting Ketua</h1>
        <p class="login-subtitle">Masuk untuk mulai memberikan suara</p>

        <div class="login-card">

            @if(session('error'))
                <div class="alert-error">{{ session('error') }}</div>
            @endif

            <form method="POST" action="/login">
                @csrf

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" name="email" id="email"
                        placeholder="contoh@email.com"
                        value="{{ old('email') }}"
                        class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                        required>
                    @error('email')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-pw">
                        <input type="password" name="password" id="password"
                            placeholder="Masukkan password"
                            class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                            required>
                        <button type="button" onclick="togglePassword()">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-login">Masuk</button>

            </form>

        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>

</body>
</html>