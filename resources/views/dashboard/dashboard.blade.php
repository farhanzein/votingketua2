<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">

            <span class="navbar-brand mb-0 h1">
                E-Voting Ketua
            </span>

            <a href="/logout" class="btn btn-danger">
                Logout
            </a>

        </div>
    </nav>

    <div class="container mt-4">

        <!-- Card Welcome -->
        <div class="card shadow-sm">
            <div class="card-body">

                <h3>
                    Selamat Datang,
                    {{ auth()->user()->name }}
                </h3>

                <p>Email : {{ auth()->user()->email }}</p>

                <p>Role : {{ auth()->user()->role }}</p>

                <p>
                    Status Voting :

                    @if(auth()->user()->hak_suara == 1)

                        <span class="badge bg-success">
                            Belum Voting
                        </span>

                    @else

                        <span class="badge bg-danger">
                            Sudah Voting
                        </span>

                    @endif
                </p>

            </div>
        </div>

        <div class="row mt-4">

            <!-- User -->
            @if(auth()->user()->role == 'voter')

                <div class="col-md-6">

                    <div class="card shadow-sm">
                        <div class="card-body">

                            <h4>Voting</h4>

                            <p>
                                Klik tombol di bawah untuk mulai voting.
                            </p>

                            <a href="/voting" class="btn btn-primary">
                                Mulai Voting
                            </a>

                        </div>
                    </div>

                </div>

            @endif

            <!-- Hasil -->
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h4>Hasil Voting</h4>

                        <p>
                            Lihat hasil voting sementara.
                        </p>

                        <a href="/hasil" class="btn btn-success">
                            Lihat Hasil
                        </a>

                    </div>
                </div>

            </div>

        </div>

        <!-- Admin -->
        @if(auth()->user()->role == 'admin')

            <div class="card mt-4 shadow-sm">
                <div class="card-body">

                    <h4>Menu Admin</h4>

                    <a href="/kandidat" class="btn btn-dark">
                        Kelola Kandidat
                    </a>
                    <a href="/voter" class="btn btn-secondary">
                        Kelola Voter
                    </a>

                </div>
            </div>

        @endif
        <!-- Super Admin -->
        @if(auth()->user()->role == 'super_admin')

            <div class="card mt-4 shadow-sm">
                <div class="card-body">

                    <h4>Menu Super Admin</h4>

                    <a href="/admin" class="btn btn-danger">
                        Kelola Admin
                    </a>

                    <a href="/voting-session" class="btn btn-warning">
                        Kelola Sesi Voting
                    </a>

                </div>
            </div>

        @endif
    </div>

</body>

</html>