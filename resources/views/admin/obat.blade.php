@extends('admin.layout')

@section('title', 'Kelola Obat')
@section('page_title', 'Inventaris Obat')
@section('page_subtitle', 'Kelola dan lacak katalog farmasi Anda')

@section('custom_css')
<style>
    .stats-grid-4 {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card-small {
        padding: 1.25rem;
    }

    .stat-header-small {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .stat-title-small {
        font-size: 0.75rem;
        text-transform: uppercase;
        color: var(--text-muted);
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .icon-small {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: var(--text-main);
        background-color: #f3f4f6;
    }

    .icon-small.warning {
        background-color: #fee2e2;
        color: #ef4444;
    }

    .icon-small.alert {
        background-color: #fef9c3;
        color: #d97706;
    }

    .stat-value-small {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .stat-value-small.warning {
        color: #ef4444;
    }

    .stat-value-small.alert {
        color: #b91c1c; /* dark red */
    }

    .stat-desc {
        font-size: 0.75rem;
        color: var(--text-muted);
        line-height: 1.4;
    }

    .stat-desc.warning {
        color: #ef4444;
    }

    /* Table */
    .table-card {
        margin-bottom: 3rem;
    }

    .table-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 1rem;
    }

    .table-toolbar h3 {
        font-size: 1rem;
        font-weight: 600;
    }

    .toolbar-actions {
        display: flex;
        gap: 1rem;
        color: var(--text-muted);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        text-align: left;
        padding: 1rem 0;
        border-bottom: 2px solid var(--border-color);
        color: var(--text-muted);
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    td {
        padding: 1.25rem 0;
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }

    .product-cell {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .product-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background-color: #f3f4f6;
        display: flex;
        justify-content: center;
        align-items: center;
        color: var(--text-muted);
    }

    .product-info h4 {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 0.25rem;
    }

    .product-info p {
        font-size: 0.75rem;
        color: var(--text-muted);
    }

    .category-badge {
        padding: 0.35rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }

    .cat-green { background-color: #dcfce7; color: #166534; }
    .cat-blue { background-color: #dbeafe; color: #1e40af; }
    .cat-yellow { background-color: #fef9c3; color: #854d0e; }

    .price-cell {
        font-weight: 600;
        font-size: 0.95rem;
    }

    .stock-bar-container {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stock-bar {
        width: 60px;
        height: 6px;
        background-color: #e5e7eb;
        border-radius: 999px;
        overflow: hidden;
    }

    .stock-fill {
        height: 100%;
        background-color: var(--primary);
        border-radius: 999px;
    }

    .stock-fill.low {
        background-color: #ef4444;
    }

    .stock-text {
        font-size: 0.8rem;
        font-weight: 500;
        color: var(--text-muted);
    }

    .stock-text.low {
        color: #ef4444;
    }

    .pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1.5rem;
    }

    .page-info {
        font-size: 0.85rem;
        color: var(--text-muted);
    }

    .page-controls {
        display: flex;
        gap: 0.5rem;
    }

    .page-btn {
        padding: 0.5rem 1rem;
        border: 1px solid var(--border-color);
        background-color: white;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 500;
        color: var(--text-main);
        cursor: pointer;
    }

    .page-btn.active {
        background-color: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    /* Maintenance Section */
    .maintenance-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 1.5rem;
    }

    .bottom-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1.5rem;
    }

    .log-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .log-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #dcfce7;
        color: #166534;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-shrink: 0;
    }

    .log-info h4 {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 0.25rem;
    }

    .log-info p {
        font-size: 0.85rem;
        color: var(--text-muted);
        margin-bottom: 0.5rem;
    }

    .log-meta {
        font-size: 0.7rem;
        color: var(--text-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .audit-card {
        background-color: var(--primary);
        color: white;
        border: none;
        position: relative;
        overflow: hidden;
    }

    .audit-card h3 {
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    .audit-card p {
        font-size: 0.85rem;
        opacity: 0.9;
        margin-bottom: 1.5rem;
        line-height: 1.5;
    }

    .btn-audit {
        background-color: white;
        color: var(--primary);
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        cursor: pointer;
    }
</style>
@endsection

@section('content')

    <div class="stats-grid-4">
        <div class="card stat-card-small">
            <div class="stat-header-small">
                <div class="stat-title-small">TOTAL SKU</div>
                <div class="icon-small">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
            </div>
            <div class="stat-value-small">1,248</div>
            <div class="stat-desc">~ +12 baru minggu ini</div>
        </div>

        <div class="card stat-card-small">
            <div class="stat-header-small">
                <div class="stat-title-small">STOK RENDAH</div>
                <div class="icon-small warning">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
            </div>
            <div class="stat-value-small warning">14</div>
            <div class="stat-desc warning">Membutuhkan restok segera</div>
        </div>

        <div class="card stat-card-small">
            <div class="stat-header-small">
                <div class="stat-title-small">KEDALUWARSA/MENDEKATI</div>
                <div class="icon-small alert">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
            </div>
            <div class="stat-value-small alert">8</div>
            <div class="stat-desc">Tindakan diperlukan dalam 30 hari</div>
        </div>

        <div class="card stat-card-small">
            <div class="stat-header-small">
                <div class="stat-title-small">KATEGORI</div>
                <div class="icon-small">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
            </div>
            <div class="stat-value-small" style="color: var(--primary-light);">24</div>
            <div class="stat-desc">Kelas farmasi aktif</div>
        </div>
    </div>

    <div class="card table-card">
        <div class="table-toolbar">
            <h3>Daftar Obat</h3>
            <div class="toolbar-actions">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            </div>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>NAMA OBAT</th>
                    <th>KATEGORI</th>
                    <th>HARGA</th>
                    <th>LEVEL STOK</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medicines as $obat)
                    @php
                        $catLower = strtolower($obat['kategori']);
                        $badgeClass = 'cat-green';
                        if (str_contains($catLower, 'vitamin')) $badgeClass = 'cat-yellow';
                        else if (str_contains($catLower, 'resep') || str_contains($catLower, 'insulin')) $badgeClass = 'cat-blue';
                        
                        $stok = $obat['stok_angka'] ?? 0;
                        $stokFillClass = $stok < 30 ? 'low' : '';
                        $stokWidth = min(100, max(5, ($stok / 200) * 100)); // Just a visual proxy
                    @endphp
                    <tr>
                        <td>
                            <div class="product-cell">
                                <div class="product-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                </div>
                                <div class="product-info">
                                    <h4>{{ $obat['nama'] }}</h4>
                                    <p>SKU: {{ strtoupper(substr($obat['id'], 0, 3)) }}-{{ $stok }}-X</p>
                                </div>
                            </div>
                        </td>
                        <td><span class="category-badge {{ $badgeClass }}">{{ $obat['kategori'] }}</span></td>
                        <td class="price-cell">Rp {{ number_format($obat['harga'], 0, ',', '.') }}</td>
                        <td>
                            <div class="stock-bar-container">
                                <div class="stock-bar"><div class="stock-fill {{ $stokFillClass }}" style="width: {{ $stokWidth }}%;"></div></div>
                                <span class="stock-text {{ $stokFillClass }}">{{ $stok }} Units</span>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            <div class="page-info">Menampilkan 4 dari 1.248 obat</div>
            <div class="page-controls">
                <button class="page-btn">Sebelumnya</button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">Berikutnya</button>
            </div>
        </div>
    </div>

    <h2 class="maintenance-title">Log Pemeliharaan</h2>
    
    <div class="bottom-grid">
        <div class="card">
            <div class="log-item">
                <div class="log-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                </div>
                <div class="log-info">
                    <h4>Stok Baru Ditambahkan</h4>
                    <p>3 Tablet Isi 30 Neo Rheumacyl ditambahkan ke inventaris utama.</p>
                    <div class="log-meta">HARI INI, 10:45 AM &bull; OLEH ADMIN_PUPU</div>
                </div>
            </div>
        </div>

        <div class="card audit-card">
            <h3>Audit Inventaris</h3>
            <p>Audit inventaris menyeluruh Anda berikutnya dijadwalkan pada hari Jumat.</p>
            <button class="btn-audit">ATUR PENGINGAT</button>
        </div>
    </div>

@endsection
