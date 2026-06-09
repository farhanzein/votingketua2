<!DOCTYPE html>
<html>

<head>
    <title>Voting</title>
</head>

<body>

    <a href="/dashboard">Kembali</a>

    <br><br>

    <h1>Halaman Voting</h1>

    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif
    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @foreach($kandidat as $k)

        <hr>

        <h3>{{ $k->nama }}</h3>

        <p>Visi : {{ $k->visi }}</p>

        <p>Misi : {{ $k->misi }}</p>

        <form action="/vote/{{ $k->id }}" method="POST">
            @csrf

            <button type="submit">
                Vote
            </button>
        </form>

    @endforeach

</body>

</html>