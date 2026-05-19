<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <h1>Dashboard</h1>

    <hr>

    <h3>Selamat Datang, {{ auth()->user()->name }}</h3>

    <p>Email : {{ auth()->user()->email }}</p>

    <p>Role : {{ auth()->user()->role }}</p>
    <!--ini admin-->
    @if(auth()->user()->role == 'admin')

    <h3>Anda login sebagai Admin</h3>

    @endif
    @if(auth()->user()->role == 'admin')

    <hr>

    <h3>Menu Admin</h3>

    <a href="/kandidat">Kelola Kandidat</a>

    @endif
    <!-- sampai sini -->
    <p>
        Status Voting :
        @if(auth()->user()->hak_suara == 1)
            Belum Voting
        @else
            Sudah Voting
        @endif
    </p>
    
    <hr>

    @if(auth()->user()->role == 'user')

    <a href="/voting">Mulai Voting</a>

    <br><br>

    @endif

    <br><br>

    <a href="/hasil">Lihat Hasil Voting</a>

    <br><br>

    <a href="/logout">Logout</a>

</body>
</html>