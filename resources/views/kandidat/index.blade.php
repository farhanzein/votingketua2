<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kandidat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/css/data-kandidat.css" rel="stylesheet">
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
            <div>
                <h1>Data Kandidat</h1>
                <p>Daftar kandidat yang terdaftar</p>
            </div>
            <a href="/kandidat/tambah" class="btn-tambah">
                <i class="bi bi-plus-lg"></i> Tambah Kandidat
            </a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($kandidat->isEmpty())
            <div class="empty-state">
                <i class="bi bi-person-x"></i>
                <p>Belum ada kandidat</p>
                <span>Klik tombol tambah kandidat untuk menambahkan</span>
            </div>
        @else
            <div class="kandidat-grid">
                @foreach($kandidat as $k)
                    <div class="kandidat-card">

                        <div class="kandidat-foto">
                            @if($k->foto)
                                <img src="{{ asset('foto_kandidat/' . $k->foto) }}" alt="{{ $k->nama }}">
                            @else
                                <div class="foto-placeholder">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                            @endif
                            <div class="kandidat-nomor">{{ $loop->iteration }}</div>
                        </div>

                        <div class="kandidat-info">
                            <h3>{{ $k->nama }}</h3>

                            <div class="info-section">
                                <p class="info-label"><i class="bi bi-eye"></i> Visi</p>
                                <p class="info-text">{{ $k->visi }}</p>
                            </div>

                            <div class="info-section">
                                <p class="info-label"><i class="bi bi-list-check"></i> Misi</p>
                                <p class="info-text">{{ $k->misi }}</p>
                            </div>

                            <a href="#" class="btn-hapus"
                                onclick="konfirmasiHapus(event, '/kandidat/hapus/{{ $k->id }}', '{{ $k->nama }}')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/sweetalert/sweetalert2.all.min.js"></script>
    <script>

        @if(session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#2563eb',
                confirmButtonText: 'OK'
            });
        @endif
        function konfirmasiHapus(e, url, nama) {
            e.preventDefault();
            Swal.fire({
                title: 'Hapus Kandidat?',
                text: nama + ' akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
</body>

</html>