<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/css/tambah-admin.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar">
        <div class="navbar-brand">
            <div class="nav-logo">
                <div class="nav-logo-red"></div>
                <div class="nav-logo-blue">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                </div>
            </div>
            <span>E-Voting Ketua</span>
        </div>
        <a href="/admin" class="btn-back">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </nav>

    <div class="container">

        <div class="page-header">
            <h1>Tambah Admin</h1>
            <p>Isi data admin dengan lengkap</p>
        </div>

        <div class="form-card">
            <form action="/admin/store" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" name="name" id="name"
                        placeholder="Masukkan nama lengkap"
                        value="{{ old('name') }}"
                        class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                        required>
                    @error('name')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"
                        placeholder="Masukkan email"
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

                <div class="form-actions">
                    <a href="/admin" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check-lg"></i> Simpan Admin
                    </button>
                </div>

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