<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Voting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/css/hasil.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar">
        <div class="navbar-brand">
            <div class="nav-logo">
                <div class="nav-logo-red"></div>
                <div class="nav-logo-blue">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                </div>
            </div>
            <span>E-Voting Ketua</span>
        </div>
        <a href="/dashboard" class="btn-back">
            <i class="bi bi-arrow-left"></i> Dashboard
        </a>
    </nav>

    <div class="container">

        <div class="page-header">
            <h1>Hasil Voting</h1>
            <p>Rekapitulasi suara kandidat</p>
        </div>

        @php
            $totalSuara = $kandidat->sum(function ($k) {
                return \App\Models\Suara::where('kandidatid', $k->id)->count();
            });
            $suaraTerbanyak = $kandidat->max(function ($k) {
                return \App\Models\Suara::where('kandidatid', $k->id)->count();
            });
        @endphp

        {{-- Total suara --}}
        <div class="stat-total">
            <i class="bi bi-ballot-fill"></i>
            <div>
                <p>Total Suara Masuk</p>
                <h3>{{ $totalSuara }} Suara</h3>
            </div>
        </div>

        {{-- List hasil --}}
        <div class="hasil-list">
            @foreach($kandidat as $k)
                    @php
                        $jumlahSuara = \App\Models\Suara::where('kandidatid', $k->id)->count();
                        $persen = $totalSuara > 0 ? round(($jumlahSuara / $totalSuara) * 100) : 0;
                        $isWinner = $jumlahSuara == $suaraTerbanyak && $jumlahSuara > 0;
                    @endphp
                    <div class="hasil-card {{ $isWinner ? 'winner' : '' }}">

                        @if($isWinner)
                            <div class="winner-badge">
                                <i class="bi bi-trophy-fill"></i> Unggul
                            </div>
                        @endif

                        <div class="hasil-left">
                            <div class="hasil-foto">
                                @if($k->foto)
                                    <img src="{{ asset('foto_kandidat/' . $k->foto) }}" alt="{{ $k->nama }}">
                                @else
                                    <div class="foto-placeholder">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="hasil-info">
                                <h3>{{ $k->nama }}</h3>
                            </div>
                        </div> {{-- ← hasil-left ditutup di sini --}}

                        <div class="hasil-right"> {{-- ← hasil-right di luar hasil-left --}}
                            <div class="suara-count">
                                <span class="angka">{{ $jumlahSuara }}</span>
                                <span class="label">suara</span>
                            </div>
                            <div class="progress-wrap">
                                <div class="progress-bar">
                                    <div class="progress-fill {{ $isWinner ? 'winner' : '' }}" style="width: {{ $persen }}%">
                                    </div>
                                </div>
                                <span class="persen">{{ $persen }}%</span>
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>