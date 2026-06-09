<!DOCTYPE html>
<html>
<head>
    <title>Tambah Admin</title>
</head>
<body>

    <a href="/admin">Kembali</a>

    <h2>Tambah Admin</h2>

    <form action="/admin/store" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Nama">
        <br><br>

        <input type="email" name="email" placeholder="Email">
        <br><br>

        <input type="password" name="password" placeholder="Password">
        <br><br>

        <button type="submit">
            Simpan
        </button>
    </form>

</body>
</html>