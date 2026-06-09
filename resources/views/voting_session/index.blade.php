<!DOCTYPE html>
<html>
<head>
    <title>Sesi Voting</title>
</head>
<body>

    <a href="/dashboard">Kembali</a>

    <h2>Kelola Sesi Voting</h2>

    <form action="/voting-session/store" method="POST">
        @csrf

        <label>Tanggal Mulai</label>
        <br>
        <input type="date" name="tanggal_mulai"
               value="{{ $session->tanggal_mulai ?? '' }}">
        <br><br>

        <label>Tanggal Selesai</label>
        <br>
        <input type="date" name="tanggal_selesai"
               value="{{ $session->tanggal_selesai ?? '' }}">
        <br><br>

        <label>Status</label>
        <br>

        <select name="status">
            <option value="tutup">Tutup</option>
            <option value="buka">Buka</option>
        </select>

        <br><br>

        <button type="submit">
            Simpan
        </button>

    </form>

</body>
</html>