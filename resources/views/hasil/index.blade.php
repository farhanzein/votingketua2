<!DOCTYPE html>
<html>
<head>
    <title>Hasil Voting</title>
</head>
<body>

    <a href="/dashboard">Kembali</a>

    <br><br>

    <h1>Hasil Voting</h1>

    <table border="1" cellpadding="10">

        <tr>
            <th>No</th>
            <th>Nama Kandidat</th>
            <th>Jumlah Suara</th>
        </tr>

        @foreach($kandidat as $k)

        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>{{ $k->nama }}</td>

            <td>
                {{ \App\Models\Suara::where('kandidatid', $k->id)->count() }}
            </td>
        </tr>

        @endforeach

    </table>

</body>
</html>