@extends('admin.layout')

@section('title', 'Tambah Obat')
@section('page_title')
    <div style="display: flex; align-items: center; gap: 0.5rem;">
        <a href="/admin-obat" style="color: var(--text-main); text-decoration: none;">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="24" height="24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        Tambah Obat Baru
    </div>
@endsection

@section('custom_css')
<style>
    .split-layout {
        display: grid;
        grid-template-columns: 350px 1fr;
        gap: 2rem;
        align-items: start;
    }

    /* Left Side */
    .upload-card {
        background-color: #f9fafb;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .upload-title {
        font-size: 0.9rem;
        color: var(--text-muted);
        margin-bottom: 1.5rem;
    }

    .upload-preview {
        background-color: var(--primary);
        border-radius: 12px;
        padding: 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 250px;
    }
    .upload-preview img {
        max-width: 100%;
        max-height: 250px;
        object-fit: contain;
    }

    .guide-card {
        background-color: white;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1.5rem;
    }

    .guide-title {
        font-size: 0.9rem;
        color: var(--text-muted);
        margin-bottom: 1rem;
    }

    .guide-list {
        list-style: none;
    }

    .guide-list li {
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
        font-size: 0.85rem;
        color: var(--text-main);
        margin-bottom: 0.75rem;
    }
    
    .guide-list li svg {
        color: #166534;
        flex-shrink: 0;
        margin-top: 0.1rem;
    }

    /* Right Side Form */
    .form-card {
        background-color: white;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-label {
        display: block;
        font-size: 0.85rem;
        color: var(--text-muted);
        margin-bottom: 0.5rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 0.95rem;
        color: var(--text-main);
        transition: border-color 0.2s;
        font-family: inherit;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .status-bar {
        background-color: #f9fafb;
        border-radius: 8px;
        padding: 1rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .status-indicator {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        font-weight: 600;
        color: #166534;
    }
    
    .status-indicator .dot {
        width: 10px;
        height: 10px;
        background-color: #166534;
        border-radius: 50%;
    }

    .status-text {
        font-size: 0.85rem;
        color: var(--text-muted);
        border-left: 1px solid var(--border-color);
        padding-left: 1rem;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    .btn-secondary {
        padding: 0.75rem 1.5rem;
        background-color: white;
        border: 1px solid var(--border-color);
        color: var(--text-main);
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-primary {
        padding: 0.75rem 1.5rem;
        background-color: var(--primary);
        border: 1px solid var(--primary);
        color: white;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
</style>
@endsection

@section('content')

    <div class="split-layout">
        <!-- Left Side -->
        <div>
            <div class="upload-card">
                <div class="upload-title">Unggah Foto Obat</div>
                <div class="upload-preview">
                    <!-- Placeholder using an existing image or a CSS mockup of Neo Rheumacyl -->
                    <img src="/images/placeholder.png" onerror="this.src='/images/amoxicillin.png'" alt="Obat Preview" id="previewImage" style="background: white; padding: 1rem; border-radius: 8px;">
                </div>
            </div>

            <div class="guide-card">
                <div class="guide-title">Panduan Pengisian</div>
                <ul class="guide-list">
                    <li>
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Gunakan nama generik lengkap.
                    </li>
                    <li>
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Pastikan stok awal sesuai fisik.
                    </li>
                    <li>
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Gunakan foto resolusi tinggi.
                    </li>
                </ul>
            </div>
        </div>

        <!-- Right Side -->
        <div class="form-card">
            <form id="formTambahObat" onsubmit="event.preventDefault(); simpanData();">
                <div class="form-group">
                    <label class="form-label">Nama Obat</label>
                    <input type="text" class="form-control" id="inputNama" value="Neo Rheumacyl" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Kategori Obat</label>
                        <input type="text" class="form-control" id="inputKategori" value="ANALGESIK" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Satuan</label>
                        <input type="text" class="form-control" id="inputSatuan" value="Tablet" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" id="inputHarga" value="10000" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Stok Awal</label>
                        <input type="number" class="form-control" id="inputStok" value="30" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Deskripsi Obat</label>
                    <textarea class="form-control" id="inputDeskripsi" required>Meredakan nyeri otot, nyeri sendi, pegal linu, hingga sakit kepala dan sakit gigi.</textarea>
                </div>

                <div class="status-bar">
                    <div class="status-indicator">
                        <div class="dot"></div>
                        In Stock
                    </div>
                    <div class="status-text">Status akan otomatis aktif setelah penyimpanan.</div>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn-secondary" onclick="window.history.back()">Batal</button>
                    <button type="submit" class="btn-primary" id="btnSimpan">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('custom_js')
<script>
    function simpanData() {
        const btn = document.getElementById('btnSimpan');
        btn.innerHTML = 'Menyimpan...';
        btn.disabled = true;

        const payload = {
            _token: '{{ csrf_token() }}',
            nama: document.getElementById('inputNama').value,
            kategori: document.getElementById('inputKategori').value,
            satuan: document.getElementById('inputSatuan').value,
            harga: document.getElementById('inputHarga').value,
            stok_awal: document.getElementById('inputStok').value,
            deskripsi: document.getElementById('inputDeskripsi').value
        };

        fetch('/admin-obat/tambah', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(payload)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect back to Kelola Obat
                window.location.href = '/admin-obat';
            } else {
                alert('Gagal menyimpan data.');
                btn.innerHTML = 'Simpan Data';
                btn.disabled = false;
            }
        })
        .catch(error => {
            console.error(error);
            alert('Terjadi kesalahan koneksi.');
            btn.innerHTML = 'Simpan Data';
            btn.disabled = false;
        });
    }
</script>
@endsection
