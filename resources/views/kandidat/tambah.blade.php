<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kandidat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/css/kandidat.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar">
        <div class="navbar-brand">
            <div class="nav-logo">
                <div class="nav-logo-red"></div>
                <div class="nav-logo-blue">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                </div>
            </div>
            <span>E-Voting Ketua</span>
        </div>
        <a href="/kandidat" class="btn-back">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </nav>

    <div class="container">

        <div class="page-header">
            <h1>Tambah Kandidat</h1>
            <p>Isi data kandidat dengan lengkap</p>
        </div>

        <div class="form-card">
            <form action="/kandidat/store" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama --}}
                <div class="form-group">
                    <label for="nama">Nama Kandidat</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan nama lengkap kandidat"
                        value="{{ old('nama') }}" class="{{ $errors->has('nama') ? 'is-invalid' : '' }}" required>
                    @error('nama')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Foto --}}
                <div class="form-group">
                    <label>Foto Kandidat</label>
                    <div class="upload-area" id="uploadArea" onclick="document.getElementById('foto').click()" style="position:relative; height:250px; padding:0; overflow:hidden;">
                        <img id="preview" src="" alt=""
                            style="display:none; width:100%; height:100%; border-radius:8px; object-fit:cover; position:absolute; top:0; left:0;">

                        <div id="uploadPlaceholder">
                            <i class="bi bi-cloud-arrow-up"></i>
                            <p>Klik untuk upload foto</p>
                            <span>PNG, JPG maksimal 2MB</span>
                        </div>
                    </div>

                    {{-- Tombol ganti foto, muncul setelah upload --}}
                    <button type="button" id="btnGanti" onclick="document.getElementById('foto').click()"
                        style="display:none; margin-top:0.5rem; background:none; border:1.5px solid #e5e7eb; border-radius:8px; padding:0.35rem 0.875rem; font-size:0.82rem; color:#374151; cursor:pointer;">
                        <i class="bi bi-arrow-repeat"></i> Ganti Foto
                    </button>

                    <input type="file" name="foto" id="foto" accept="image/*" style="display:none"
                        onchange="previewFoto(this)">
                    @error('foto')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Visi --}}
                <div class="form-group">
                    <label for="visi">Visi</label>
                    <textarea name="visi" id="visi" rows="3" placeholder="Tuliskan visi kandidat..."
                        class="{{ $errors->has('visi') ? 'is-invalid' : '' }}" required>{{ old('visi') }}</textarea>
                    @error('visi')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Misi --}}
                <div class="form-group">
                    <label for="misi">Misi</label>
                    <textarea name="misi" id="misi" rows="4" placeholder="Tuliskan misi kandidat..."
                        class="{{ $errors->has('misi') ? 'is-invalid' : '' }}" required>{{ old('misi') }}</textarea>
                    @error('misi')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="/kandidat" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check-lg"></i> Simpan Kandidat
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewFoto(input) {
            const file = input.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = document.getElementById('preview');
                const placeholder = document.getElementById('uploadPlaceholder');
                const btnGanti = document.getElementById('btnGanti');

                preview.src = e.target.result;
                preview.style.display = 'block';
                placeholder.style.display = 'none';
                btnGanti.style.display = 'inline-flex';

                // upload area tidak bisa diklik lagi langsung
                document.getElementById('uploadArea').onclick = null;
            }
            reader.readAsDataURL(file);
        }
    </script>

</body>

</html>