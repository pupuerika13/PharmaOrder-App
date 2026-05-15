@extends('admin.layout')

@section('title', 'Dasbor')
@section('page_title', 'Ringkasan Klinis')
@section('header_actions')
    <button class="btn-primary" onclick="window.location.href='/admin-obat/tambah'">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Obat Baru
    </button>
@endsection

@section('custom_css')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }

    .stat-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .icon-green { background-color: #dcfce7; color: #166534; }
    .icon-pink { background-color: #fce7f3; color: #be185d; }

    .stat-indicator {
        font-size: 0.75rem;
        font-weight: 700;
    }
    
    .indicator-green { color: #166534; }
    .indicator-red { color: #b91c1c; }
    .badge-pink { background-color: #fce7f3; color: #be185d; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.65rem; }

    .stat-title {
        font-size: 0.75rem;
        text-transform: uppercase;
        color: var(--text-muted);
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
    }

    .stat-value {
        font-size: 2.25rem;
        font-weight: 700;
        color: var(--primary);
    }

    /* Bottom Grid */
    .bottom-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1.5rem;
    }

    /* Table Card */
    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .table-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--primary);
    }

    .btn-link {
        color: var(--primary);
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
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
        font-size: 0.85rem;
        font-weight: 600;
    }

    td {
        padding: 1rem 0;
        border-bottom: 1px solid var(--border-color);
        font-size: 0.9rem;
        font-weight: 500;
    }

    /* Right Widgets */
    .system-health {
        background-color: var(--primary);
        color: white;
        border: none;
        margin-bottom: 1.5rem;
    }

    .system-health .table-title {
        color: white;
        margin-bottom: 1.5rem;
    }

    .progress-group {
        margin-bottom: 1.25rem;
    }

    .progress-label {
        display: flex;
        justify-content: space-between;
        font-size: 0.8rem;
        margin-bottom: 0.5rem;
    }

    .progress-bar {
        height: 6px;
        background-color: rgba(255,255,255,0.2);
        border-radius: 999px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background-color: white;
        border-radius: 999px;
    }

    .warning-header {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #b91c1c;
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    .warning-item {
        background-color: #fef2f2;
        padding: 1rem;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.75rem;
    }

    .warning-item:last-child {
        margin-bottom: 0;
    }

    .warning-info h4 {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--text-main);
    }

    .warning-info p {
        font-size: 0.75rem;
        color: var(--text-muted);
    }

    .warning-icon {
        color: #b91c1c;
    }
</style>
@endsection

@section('content')

    <!-- Top Stats -->
    <div class="stats-grid">
        <div class="card stat-card">
            <div class="stat-header">
                <div class="stat-icon icon-green">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="stat-indicator indicator-green">+12.5%</div>
            </div>
            <div class="stat-title">TOTAL PENJUALAN</div>
            @php
                $totalPenjualan = 0;
                foreach($transactions as $t) {
                    if($t['status'] == 'Selesai') $totalPenjualan += $t['total'];
                }
            @endphp
            <div class="stat-value">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</div>
        </div>

        <div class="card stat-card">
            <div class="stat-header">
                <div class="stat-icon icon-green">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
                <div class="stat-indicator indicator-green">&bull; SKU Aktif</div>
            </div>
            <div class="stat-title">TOTAL OBAT</div>
            <div class="stat-value">{{ count(session('medicines', [])) }}</div>
        </div>

        <div class="card stat-card">
            <div class="stat-header">
                <div class="stat-icon icon-pink">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="badge-pink">MENDESAK</div>
            </div>
            <div class="stat-title">MENUNGGU VERIFIKASI</div>
            @php
                $pendingCount = 0;
                foreach($transactions as $t) {
                    if($t['status'] == 'Menunggu Proses') $pendingCount++;
                }
            @endphp
            <div class="stat-value" style="color: #1f2937;">{{ $pendingCount }}</div>
        </div>
    </div>

    <!-- Bottom Grid -->
    <div class="bottom-grid">
        <!-- Table -->
        <div class="card">
            <div class="table-header">
                <h2 class="table-title">Transaksi Terkini</h2>
                <a href="/admin-transaksi" class="btn-link">Lihat Semua</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Klien</th>
                        <th>Obat</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $hasCompleted = false;
                    @endphp
                    @foreach($transactions as $t)
                        @if($t['status'] == 'Selesai')
                            @php $hasCompleted = true; @endphp
                            <tr>
                                <td>{{ $t['id'] }}</td>
                                <td>{{ $t['nama_klien'] }}</td>
                                <td>{{ $t['nama_obat'] }}</td>
                                <td>Rp {{ number_format($t['total'], 0, ',', '.') }}</td>
                                <td><span class="badge" style="background:#dcfce7; color:#166534;">Selesai</span></td>
                            </tr>
                        @endif
                    @endforeach
                    
                    @if(!$hasCompleted)
                        <tr>
                            <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 2rem;">Belum ada transaksi yang selesai.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Right Widgets -->
        <div>
            <div class="card system-health">
                <h2 class="table-title">Kesehatan Sistem</h2>
                
                <div class="progress-group">
                    <div class="progress-label">
                        <span>Kapasitas Gudang</span>
                        <span>82%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 82%;"></div>
                    </div>
                </div>

                <div class="progress-group">
                    <div class="progress-label">
                        <span>Target Harian</span>
                        <span>64%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 64%;"></div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="warning-header">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    Peringatan Stok Rendah
                </div>

                <div class="warning-item">
                    <div class="warning-info">
                        <h4>Atorvastatin</h4>
                        <p>Tersisa 24 unit</p>
                    </div>
                    <div class="warning-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path></svg>
                    </div>
                </div>

                <div class="warning-item">
                    <div class="warning-info">
                        <h4>Metformin 500mg</h4>
                        <p>Tersisa 12 unit</p>
                    </div>
                    <div class="warning-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
