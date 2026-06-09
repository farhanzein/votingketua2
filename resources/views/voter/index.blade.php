<!DOCTYPE html>
<html>
<head>
    <title>Data Voter</title>
</head>
<body>

    <a href="/dashboard">Kembali</a>

    <h2>Data Voter</h2>

    <a href="/voter/tambah">Tambah Voter</a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Status Voting</th>
            <th>Aksi</th>
        </tr>

        @foreach($voter as $v)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->email }}</td>

            <td>
                @if($v->hak_suara == 1)
                    Belum Voting
                @else
                    Sudah Voting
                @endif
            </td>

            <td>
                <a href="/voter/hapus/{{ $v->id }}">
                    Hapus
                </a>
            </td>
        </tr>
        @endforeach

    </table>

</body>
</html>