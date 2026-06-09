<!DOCTYPE html>
<html>
<head>
    <title>Tambah Voter</title>
</head>
<body>

    <a href="/voter">Kembali</a>

    <h2>Tambah Voter</h2>

    <form action="/voter/store" method="POST">
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