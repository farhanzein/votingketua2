<!DOCTYPE html>
<html>
<head>
    <title>Data Kandidat</title>
</head>
<body>
    <a href="/dashboard">Kembali ke Dashboard</a>

    <br><br>
    <h1>Data Kandidat</h1>

    <a href="/kandidat/tambah">Tambah Kandidat</a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Visi</th>
            <th>Misi</th>
            <th>Aksi</th>
        </tr>

        @foreach($kandidat as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k->nama }}</td>
            <td>{{ $k->foto }}</td>
            <td>{{ $k->visi }}</td>
            <td>{{ $k->misi }}</td>
            <td>
                <a href="/kandidat/hapus/{{ $k->id }}">
                    Hapus
                </a>
            </td>
        @endforeach