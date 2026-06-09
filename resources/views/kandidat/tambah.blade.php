<!DOCTYPE html>
<html>

<head>
    <title>Tambah Kandidat</title>
</head>

<body>
    <a href="/kandidat">Kembali</a>

    <br><br>
    <h1>Tambah Kandidat</h1>

    <form action="/kandidat/store" method="POST">
        @csrf

        <input type="text" name="nama" placeholder="Nama Kandidat">
        <br><br>


        <label>Upload Foto</label><br>
        <input type="file" name="foto" accept="image/*">
        <br><br>

        <textarea name="visi" placeholder="Visi"></textarea>
        <br><br>

        <textarea name="misi" placeholder="Misi"></textarea>
        <br><br>

        <button type="submit">
            Simpan
        </button>
    </form>

</body>

</html>