<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
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
                <h1>Data Admin</h1>
                <p>Daftar admin yang terdaftar</p>
            </div>
            <a href="/admin/tambah" class="btn-tambah">
                <i class="bi bi-plus-lg"></i> Tambah Admin
            </a>
        </div>

        <div class="admin-card">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admin as $a)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="admin-name">
                                <div class="admin-avatar">
                                    {{ strtoupper(substr($a->name, 0, 1)) }}
                                </div>
                                {{ $a->name }}
                            </div>
                        </td>
                        <td>{{ $a->email }}</td>
                        <td>
                            <a href="#" class="btn-hapus"
                                onclick="konfirmasiHapus(event, '/admin/hapus/{{ $a->id }}', '{{ $a->name }}')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="empty-row">Belum ada admin terdaftar</td>
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
                title: 'Hapus Admin?',
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