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

        <!-- Status Sesi Voting -->
        <div class="session-card {{ $session && $session->status == 'buka' ? 'buka' : 'tutup' }}">
            <div class="session-left">
                <div class="session-icon">
                    <i class="bi bi-calendar-event"></i>
                </div>
                <div>
                    <p class="session-label">Status Sesi Voting</p>
                    @if($session)
                        <h3 class="session-status">
                            {{ $session->status == 'buka' ? 'Sedang Berlangsung' : 'Belum / Sudah Selesai' }}
                        </h3>
                        <p class="session-date">
                            <i class="bi bi-calendar-range"></i>
                            {{ \Carbon\Carbon::parse($session->tanggal_mulai)->format('d M Y') }}
                            &nbsp;—&nbsp;
                            {{ \Carbon\Carbon::parse($session->tanggal_selesai)->format('d M Y') }}
                        </p>
                    @else
                        <h3 class="session-status">Belum ada sesi</h3>
                        <p class="session-date">Sesi voting belum dikonfigurasi</p>
                    @endif
                </div>
            </div>
            <div class="session-badge">
                @if($session && $session->status == 'buka')
                    <span class="pill buka"><i class="bi bi-circle-fill"></i> Dibuka</span>
                @else
                    <span class="pill tutup"><i class="bi bi-circle"></i> Ditutup</span>
                @endif
            </div>
        </div>

        <!-- Statistik (hanya admin & super_admin) -->
        @if(auth()->user()->role != 'voter')
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon blue"><i class="bi bi-people-fill"></i></div>
                <div>
                    <p class="stat-label">Total Voter</p>
                    <h3 class="stat-value">{{ $totalVoter }}</h3>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="bi bi-check-circle-fill"></i></div>
                <div>
                    <p class="stat-label">Sudah Voting</p>
                    <h3 class="stat-value">{{ $sudahVoting }}</h3>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon orange"><i class="bi bi-hourglass-split"></i></div>
                <div>
                    <p class="stat-label">Belum Voting</p>
                    <h3 class="stat-value">{{ $belumVoting }}</h3>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon purple"><i class="bi bi-ballot-fill"></i></div>
                <div>
                    <p class="stat-label">Total Suara</p>
                    <h3 class="stat-value">{{ $totalSuara }}</h3>
                </div>
            </div>
        </div>
        @endif

        <!-- Menu Cards -->
        <div class="menu-grid">

            @if(auth()->user()->role == 'voter')
            <a href="/voting" class="menu-card">
                <div class="menu-icon blue"><i class="bi bi-hand-index-thumb"></i></div>
                <div>
                    <h3>Mulai Voting</h3>
                    <p>Berikan suara kamu sekarang</p>
                </div>
                <i class="bi bi-chevron-right arrow"></i>
            </a>
            @endif

            <a href="/hasil" class="menu-card">
                <div class="menu-icon green"><i class="bi bi-bar-chart"></i></div>
                <div>
                    <h3>Hasil Voting</h3>
                    <p>Lihat hasil voting sementara</p>
                </div>
                <i class="bi bi-chevron-right arrow"></i>
            </a>

            @if(auth()->user()->role == 'admin')
            <a href="/kandidat" class="menu-card">
                <div class="menu-icon purple"><i class="bi bi-person-badge"></i></div>
                <div>
                    <h3>Kelola Kandidat</h3>
                    <p>Tambah atau hapus kandidat</p>
                </div>
                <i class="bi bi-chevron-right arrow"></i>
            </a>
            <a href="/voter" class="menu-card">
                <div class="menu-icon orange"><i class="bi bi-people"></i></div>
                <div>
                    <h3>Kelola Voter</h3>
                    <p>Manajemen data pemilih</p>
                </div>
                <i class="bi bi-chevron-right arrow"></i>
            </a>
            @endif

            @if(auth()->user()->role == 'super_admin')
            <a href="/admin" class="menu-card">
                <div class="menu-icon red"><i class="bi bi-shield-lock"></i></div>
                <div>
                    <h3>Kelola Admin</h3>
                    <p>Manajemen akun admin</p>
                </div>
                <i class="bi bi-chevron-right arrow"></i>
            </a>
            <a href="/voting-session" class="menu-card">
                <div class="menu-icon blue"><i class="bi bi-calendar-check"></i></div>
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