<!DOCTYPE html>
<html>
<head>
    <title>Kelola Admin</title>
</head>
<body>

    <a href="/dashboard">Kembali</a>

    <h2>Data Admin</h2>

    <a href="/admin/tambah">Tambah Admin</a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>

        @foreach($admin as $a)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $a->name }}</td>
            <td>{{ $a->email }}</td>
            <td>
                <a href="/admin/hapus/{{ $a->id }}">
                    Hapus
                </a>
            </td>
        </tr>
        @endforeach

    </table>

</body>
</html>