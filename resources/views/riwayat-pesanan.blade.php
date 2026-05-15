<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan - PharmaOrder</title>
    <style>
        :root {
            --primary: #1b4332;
            --primary-light: #2d6a4f;
            --bg-color: #fafafa;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border-color: #e5e7eb;
            --card-bg: #ffffff;
            --success: #166534;
            --warning: #854d0e;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Header */
        .header {
            background-color: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 2rem;
        }

        .header-content {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 2rem;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: var(--primary);
            font-size: 1.5rem;
            font-weight: 700;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 500;
            font-size: 0.95rem;
        }

        .nav-link.active {
            color: var(--primary-light);
            font-weight: 600;
        }

        /* Content */
        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .page-subtitle {
            color: var(--text-muted);
            margin-bottom: 2rem;
        }

        .order-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.2s;
        }

        .order-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .order-info {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .order-icon {
            width: 50px;
            height: 50px;
            background-color: #f0fdf4;
            color: var(--primary);
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .order-details h3 {
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .order-details p {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .order-status {
            text-align: right;
        }

        .order-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .badge {
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-pending {
            background-color: #fef9c3;
            color: var(--warning);
        }

        .badge-success {
            background-color: #dcfce7;
            color: var(--success);
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--card-bg);
            border-radius: 12px;
            border: 1px dashed var(--border-color);
        }

        .empty-state h2 {
            color: var(--text-muted);
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="header-content">
            <a href="/dashboard" class="logo">PharmaOrder</a>
            <nav class="nav-links">
                <a href="/dashboard" class="nav-link">Cari Obat</a>
                <a href="/riwayat-pesanan" class="nav-link active">Pesanan Saya</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <h1 class="page-title">Pesanan Saya</h1>
        <p class="page-subtitle">Pantau status pengiriman dan riwayat pembelian obat Anda.</p>

        @if(count($transactions) == 0)
            <div class="empty-state">
                <h2>Belum ada pesanan</h2>
                <p>Anda belum melakukan pemesanan obat apa pun.</p>
                <a href="/dashboard" style="color: var(--primary); font-weight: 600; text-decoration: none; margin-top: 1rem; display: inline-block;">Mulai Belanja &rarr;</a>
            </div>
        @else
            @foreach($transactions as $t)
                <div class="order-card">
                    <div class="order-info">
                        <div class="order-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="24" height="24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                        <div class="order-details">
                            <h3>{{ $t['nama_obat'] }}</h3>
                            <p>ID Transaksi: <strong>{{ $t['id'] }}</strong></p>
                            <p>Waktu: {{ date('d M Y, H:i', strtotime($t['waktu'])) }}</p>
                            <p>Metode: {{ $t['pembayaran'] }}</p>
                        </div>
                    </div>
                    <div class="order-status">
                        <div class="order-price">Rp {{ number_format($t['total'], 0, ',', '.') }}</div>
                        <span class="badge {{ $t['status'] == 'Selesai' ? 'badge-success' : 'badge-pending' }}">
                            {{ $t['status'] }}
                        </span>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</body>
</html>
