@extends('admin.layout')

@section('title', 'Transaksi')
@section('page_title', 'Transaksi Menunggu')

@section('custom_css')
<style>
    /* Transaksi Layout */
    .transaksi-container {
        display: grid;
        grid-template-columns: 1fr 400px;
        gap: 2rem;
        height: calc(100vh - 180px); /* Fill remaining height roughly */
    }

    /* Left List Area */
    .transaction-list-area {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .transaction-card {
        padding: 1.25rem;
        border: 2px solid var(--primary);
        border-radius: 8px;
        background-color: var(--card-bg);
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
    }

    .trans-left {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .trans-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background-color: #f0fdf4;
        color: var(--primary);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .trans-info h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0.25rem;
    }

    .trans-info p {
        font-size: 0.85rem;
        color: var(--text-muted);
    }

    .trans-right {
        text-align: right;
    }

    .trans-price {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.5rem;
    }
    .badge-status.success {
        background-color: #dcfce7;
        color: #166534;
    }

    .badge-status.success .dot {
        background-color: #166534;
    }
    .badge-status {
        background-color: #f3f4f6;
        color: var(--text-main);
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
    }

    .badge-status .dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background-color: var(--primary);
    }

    .inventory-forecast {
        margin-top: auto;
        background-color: #f3f4f6;
        border: 1px solid var(--border-color);
        padding: 1.25rem;
        border-radius: 8px;
    }

    .forecast-header {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.8rem;
        font-weight: 700;
        color: var(--primary);
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .forecast-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .forecast-row span:first-child {
        color: var(--text-muted);
    }

    .forecast-row span:last-child {
        font-weight: 600;
        color: var(--text-main);
    }

    .forecast-bar {
        height: 4px;
        background-color: #d1d5db;
        border-radius: 999px;
        margin-bottom: 1rem;
        position: relative;
    }

    .forecast-fill {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        background-color: var(--primary);
        border-radius: 999px;
        width: 80%;
    }

    .forecast-note {
        font-size: 0.7rem;
        color: var(--text-muted);
        line-height: 1.4;
    }

    /* Right Detail Area */
    .transaction-detail {
        background-color: var(--sidebar-bg);
        border-left: 1px solid var(--border-color);
        padding: 0 2rem;
        display: flex;
        flex-direction: column;
    }

    .detail-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .detail-label {
        font-size: 0.7rem;
        color: var(--text-muted);
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .badge-session {
        background-color: #dcfce7;
        color: #166534;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-size: 0.65rem;
        font-weight: 700;
    }

    .detail-id {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 2rem;
    }

    .table-detail {
        width: 100%;
        margin-bottom: 2rem;
    }

    .table-detail th {
        font-size: 0.7rem;
        color: var(--text-muted);
        border-bottom: 1px solid var(--border-color);
        padding-bottom: 0.5rem;
        text-align: left;
    }

    .table-detail th:last-child {
        text-align: right;
    }

    .table-detail td {
        padding: 1rem 0;
        border-bottom: 1px solid var(--border-color);
    }

    .table-detail td:last-child {
        text-align: right;
        font-weight: 600;
        vertical-align: top;
    }

    .med-name {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.25rem;
    }

    .med-desc {
        font-size: 0.8rem;
        color: var(--text-muted);
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.75rem;
        font-size: 0.85rem;
    }

    .summary-row span:first-child { color: var(--text-muted); }
    .summary-row span:last-child { font-weight: 600; color: var(--text-main); }
    .summary-row.address { margin-bottom: 1.5rem; }
    .summary-row.address span:last-child { text-align: right; font-size: 0.75rem; max-width: 60%; }
    
    .total-section {
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border-color);
        margin-bottom: auto; /* push button to bottom */
    }

    .total-label {
        font-size: 0.75rem;
        color: var(--text-muted);
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .total-value-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .total-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary);
    }

    .btn-process {
        background-color: var(--primary);
        color: white;
        border: none;
        width: 100%;
        padding: 1rem;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        margin-top: 2rem;
        margin-bottom: 0.75rem;
    }
    .btn-process.success {
        background-color: #166534; /* Darker green */
    }

    .btn-note {
        text-align: center;
        font-size: 0.65rem;
        color: var(--text-light);
        text-transform: uppercase;
        line-height: 1.4;
    }
</style>
@endsection

@section('content')

    @php
        $pendingTransactions = [];
        foreach($transactions as $t) {
            if($t['status'] == 'Menunggu Proses') $pendingTransactions[] = $t;
        }
    @endphp

    <div class="transaksi-container">
        <!-- Left List Area -->
        <div class="transaction-list-area">
            
            @if(count($pendingTransactions) == 0)
                <div class="transaction-card" style="justify-content: center; color: var(--text-muted); border-color: #e5e7eb;">
                    Tidak ada transaksi baru yang menunggu diproses.
                </div>
            @else
                @foreach($pendingTransactions as $index => $t)
                    <div class="transaction-card" style="{{ $index == 0 ? 'border-color: var(--primary);' : 'border-color: #e5e7eb; opacity: 0.8;' }}">
                        <div class="trans-left">
                            <div class="trans-icon" style="{{ $index == 0 ? '' : 'background-color: #f3f4f6; color: var(--text-muted);' }}">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            </div>
                            <div class="trans-info">
                                <h4 style="{{ $index == 0 ? '' : 'color: var(--text-main);' }}">{{ $t['id'] }}</h4>
                                <p>Pelanggan: {{ $t['nama_klien'] }}</p>
                            </div>
                        </div>
                        <div class="trans-right">
                            <div class="trans-price">Rp {{ number_format($t['total'], 0, ',', '.') }}</div>
                            <div class="badge-status" id="statusBadge_{{ $t['id'] }}">
                                <div class="dot"></div> Menunggu Proses
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- Spacer -->
            <div style="flex:1;"></div>

            <!-- Inventory Forecast -->
            @if(count($pendingTransactions) > 0)
                @php 
                    $first = $pendingTransactions[0];
                    $medicines = session('medicines', []);
                    $stokAwal = isset($medicines[$first['obat_id']]) ? $medicines[$first['obat_id']]['stok_angka'] : 0;
                    $stokAkhir = $stokAwal - $first['qty'];
                @endphp
                <div class="inventory-forecast">
                    <div class="forecast-header">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        PERKIRAAN INVENTARIS
                    </div>
                    <div class="forecast-row">
                        <span>Stok {{ $first['nama_obat'] }}</span>
                        <span>{{ number_format($stokAwal, 0, ',', '.') }} &rarr; <span style="color:var(--primary);">{{ number_format($stokAkhir, 0, ',', '.') }}</span></span>
                    </div>
                    <div class="forecast-bar">
                        <div class="forecast-fill"></div>
                    </div>
                    <div class="forecast-note">Stok akan diperbarui secara otomatis setelah tanda tangan pemrosesan.</div>
                </div>
            @endif

        </div>

        <!-- Right Detail Area -->
        @if(count($pendingTransactions) > 0)
            @php $first = $pendingTransactions[0]; @endphp
            <div class="transaction-detail">
                
                <div class="detail-header">
                    <span class="detail-label">DETAIL TRANSAKSI</span>
                    <span class="badge-session">SESI AKTIF</span>
                </div>
                <div class="detail-id">{{ $first['id'] }}</div>

                <table class="table-detail">
                    <thead>
                        <tr>
                            <th>OBAT</th>
                            <th>JML / HARGA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="med-name">{{ $first['nama_obat'] }}</div>
                                <div class="med-desc">Jumlah: {{ $first['qty'] }} pak</div>
                            </td>
                            <td>{{ number_format($first['harga_satuan'], 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>Rp {{ number_format($first['total'], 0, ',', '.') }}</span>
                </div>
                <div class="summary-row">
                    <span>Pembayaran</span>
                    <span>{{ $first['pembayaran'] }}</span>
                </div>
                <div class="summary-row">
                    <span>Pengiriman</span>
                    <span>Grab</span>
                </div>
                <div class="summary-row address">
                    <span>Alamat</span>
                    <span>{{ $first['alamat'] }}</span>
                </div>
                <div class="summary-row">
                    <span>Biaya Proses</span>
                    <span style="color: var(--primary);">GRATIS</span>
                </div>
                <div class="summary-row">
                    <span>Pajak (0%)</span>
                    <span>Rp 0</span>
                </div>

                <div class="total-section">
                    <div class="total-label">TOTAL PEMBAYARAN</div>
                    <div class="total-value-row">
                        <div class="total-value">Rp {{ number_format($first['total'], 0, ',', '.') }}</div>
                        <svg fill="none" stroke="#d1d5db" viewBox="0 0 24 24" width="32" height="32"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    </div>
                </div>

                <button class="btn-process" id="btnProses" onclick="prosesTransaksi('{{ $first['id'] }}')">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    Proses Transaksi
                </button>
                <div class="btn-note">KONFIRMASI AKAN MENGHASILKAN STRUK DIGITAL DAN MEMICU PENGURANGAN STOK</div>

            </div>
        @else
            <!-- Placeholder if no transaction -->
            <div class="transaction-detail" style="justify-content: center; align-items: center;">
                <div style="color: var(--text-muted); text-align: center;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="48" height="48" style="margin-bottom: 1rem; opacity: 0.5;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <p>Pilih transaksi untuk melihat detail</p>
                </div>
            </div>
        @endif
    </div>

@endsection

@section('custom_js')
<script>
    function prosesTransaksi(transactionId) {
        const btn = document.getElementById('btnProses');
        const badge = document.getElementById('statusBadge_' + transactionId);
        
        btn.innerHTML = 'Memproses...';
        btn.disabled = true;

        fetch('/admin/proses/' + transactionId, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                _token: '{{ csrf_token() }}'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Change button state
                btn.classList.add('success');
                btn.innerHTML = `<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Transaksi Berhasil`;
                
                // Change list badge state
                if(badge) {
                    badge.classList.add('success');
                    badge.innerHTML = `<div class="dot" style="background-color: #166534;"></div> Proses Selesai`;
                }

                // Optional: redirect to dashboard after 1.5 seconds
                setTimeout(() => {
                    window.location.href = '/admin-dashboard';
                }, 1500);

            } else {
                alert('Gagal memproses transaksi.');
                btn.innerHTML = 'Proses Transaksi';
                btn.disabled = false;
            }
        })
        .catch(error => {
            console.error(error);
            alert('Terjadi kesalahan koneksi.');
            btn.innerHTML = 'Proses Transaksi';
            btn.disabled = false;
        });
    }
</script>
@endsection
