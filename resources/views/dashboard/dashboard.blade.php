<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — E-Voting Ketua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
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
        <a href="/logout" class="btn-logout">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </nav>

    <div class="container">

        <!-- Welcome Card -->
        <div class="welcome-card">
            <div class="welcome-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <h2>Selamat datang, {{ auth()->user()->name }}!</h2>
                <p>{{ auth()->user()->email }} &nbsp;·&nbsp;
                    <span class="badge-role">{{ auth()->user()->role }}</span>
                </p>
            </div>
            <div class="vote-status">
                @if(auth()->user()->hak_suara == 1)
                    <span class="badge-status belum">
                        <i class="bi bi-circle"></i> Belum voting
                    </span>
                @else
                    <span class="badge-status sudah">
                        <i class="bi bi-check-circle-fill"></i> Sudah voting
                    </span>
                @endif
            </div>
        </div>

        <!-- Menu Cards -->
        <div class="menu-grid">

            @if(auth()->user()->role == 'voter')
            <a href="/voting" class="menu-card">
                <div class="menu-icon blue">
                    <i class="bi bi-hand-index-thumb"></i>
                </div>
                <div>
                    <h3>Mulai Voting</h3>
                    <p>Berikan suara kamu sekarang</p>
                </div>
                <i class="bi bi-chevron-right arrow"></i>
            </a>
            @endif

            <a href="/hasil" class="menu-card">
                <div class="menu-icon green">
                    <i class="bi bi-bar-chart"></i>
                </div>
                <div>
                    <h3>Hasil Voting</h3>
                    <p>Lihat hasil voting sementara</p>
                </div>
                <i class="bi bi-chevron-right arrow"></i>
            </a>

            @if(auth()->user()->role == 'admin')
            <a href="/kandidat" class="menu-card">
                <div class="menu-icon purple">
                    <i class="bi bi-person-badge"></i>
                </div>
                <div>
                    <h3>Kelola Kandidat</h3>
                    <p>Tambah atau hapus kandidat</p>
                </div>
                <i class="bi bi-chevron-right arrow"></i>
            </a>

            <a href="/voter" class="menu-card">
                <div class="menu-icon orange">
                    <i class="bi bi-people"></i>
                </div>
                <div>
                    <h3>Kelola Voter</h3>
                    <p>Manajemen data pemilih</p>
                </div>
                <i class="bi bi-chevron-right arrow"></i>
            </a>
            @endif

            @if(auth()->user()->role == 'super_admin')
            <a href="/admin" class="menu-card">
                <div class="menu-icon red">
                    <i class="bi bi-shield-lock"></i>
                </div>
                <div>
                    <h3>Kelola Admin</h3>
                    <p>Manajemen akun admin</p>
                </div>
                <i class="bi bi-chevron-right arrow"></i>
            </a>

            <a href="/voting-session" class="menu-card">
                <div class="menu-icon blue">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <div>
                    <h3>Sesi Voting</h3>
                    <p>Atur jadwal dan status voting</p>
                </div>
                <i class="bi bi-chevron-right arrow"></i>
            </a>
            @endif

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>