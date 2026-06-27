<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Voter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/css/voter.css" rel="stylesheet">
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
        <a href="/dashboard" class="btn-back">
            <i class="bi bi-arrow-left"></i> Dashboard
        </a>
    </nav>

    <div class="container">

        <div class="page-header">
            <div>
                <h1>Data Voter</h1>
                <p>Daftar pemilih yang terdaftar</p>
            </div>
            <a href="/voter/tambah" class="btn-tambah">
                <i class="bi bi-plus-lg"></i> Tambah Voter
            </a>
        </div>

        <div class="voter-card">
            <table class="voter-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($voter as $v)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="voter-name">
                                <div class="voter-avatar">
                                    {{ strtoupper(substr($v->name, 0, 1)) }}
                                </div>
                                {{ $v->name }}
                            </div>
                        </td>
                        <td>{{ $v->email }}</td>
                        <td>
                            @if($v->hak_suara == 1)
                                <span class="badge-status belum">
                                    <i class="bi bi-circle"></i> Belum Voting
                                </span>
                            @else
                                <span class="badge-status sudah">
                                    <i class="bi bi-check-circle-fill"></i> Sudah Voting
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn-hapus"
                                onclick="konfirmasiHapus(event, '/voter/hapus/{{ $v->id }}', '{{ $v->name }}')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="empty-row">Belum ada voter terdaftar</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

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
                title: 'Hapus Voter?',
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