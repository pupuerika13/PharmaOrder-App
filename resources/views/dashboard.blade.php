<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Obat - PharmaOrder</title>
    <style>
        /* CSS reset and base styles */
        :root {
            --primary: #1b4332; /* dark green */
            --primary-light: #2d6a4f;
            --bg-color: #fafafa; 
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --text-light: #9ca3af;
            --border-color: #e5e7eb;
            --card-bg: #ffffff;
            
            /* Badges */
            --badge-warning-bg: #fee2e2;
            --badge-warning-text: #ef4444;
            --badge-danger-bg: #701a2e; /* maroon */
            --badge-danger-text: #ffffff;
            --badge-success-bg: #dcfce7;
            --badge-success-text: #166534;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Container */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Header */
        .header {
            background-color: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
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
            height: 100%;
        }

        .nav-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 500;
            font-size: 0.95rem;
            border-bottom: 3px solid transparent;
            transition: all 0.2s;
            cursor: pointer;
        }

        .nav-link.active {
            color: var(--primary-light);
            border-bottom-color: var(--primary-light);
            font-weight: 600;
        }

        .nav-link.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 3rem 0;
        }

        /* Hero & Filters */
        .page-header {
            margin-bottom: 2.5rem;
        }

        .page-title {
            color: var(--primary);
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: var(--text-muted);
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .filters {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.6rem 1.25rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: 1px solid var(--border-color);
            background-color: var(--card-bg);
            color: var(--text-main);
        }

        .filter-btn.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .filter-btn:hover:not(.active) {
            background-color: #f3f4f6;
        }

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        /* Product Card */
        .product-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        .card-image-wrapper {
            position: relative;
            padding: 3rem 1.5rem 1.5rem 1.5rem;
            background-color: #fcfcfc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 210px;
            border-bottom: 1px solid var(--border-color);
        }

        .card-image-wrapper img {
            max-width: 90%;
            max-height: 130px;
            object-fit: contain;
        }

        .badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            z-index: 10;
        }

        .badge-warning { background-color: var(--badge-warning-bg); color: var(--badge-warning-text); }
        .badge-danger { background-color: var(--badge-danger-bg); color: var(--badge-danger-text); }
        .badge-success { background-color: var(--badge-success-bg); color: var(--badge-success-text); }

        .card-content {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .category-label {
            display: flex;
            align-items: center;
            gap: 0.35rem;
            color: var(--primary-light);
            font-size: 0.7rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }

        .product-desc {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 1.5rem;
            line-height: 1.4;
            flex: 1;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 1.25rem;
        }

        .price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-main);
        }

        .unit {
            font-size: 0.75rem;
            color: var(--text-light);
        }

        .btn-order {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            transition: background-color 0.2s;
        }

        .btn-order:hover {
            background-color: var(--primary-light);
        }

        .btn-order svg {
            width: 16px;
            height: 16px;
        }

        /* Pagination & Actions */
        .bottom-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
        }

        .btn-logout {
            position: absolute;
            left: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-main);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .btn-logout:hover {
            color: var(--primary);
        }

        .btn-logout svg {
            width: 20px;
            height: 20px;
        }

        .pagination {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .page-btn {
            width: 36px;
            height: 36px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background-color: var(--card-bg);
            color: var(--text-muted);
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }

        .page-btn:hover:not(.active):not(.dots) {
            background-color: #f3f4f6;
        }

        .page-btn.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .page-btn.dots {
            border: none;
            background: none;
            cursor: default;
        }

        /* Footer */
        .footer {
            background-color: #f3f4f6;
            padding: 2rem 0;
            margin-top: auto;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.75rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .footer-links {
            display: flex;
            gap: 2rem;
        }

        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: var(--text-main);
        }

        @media (max-width: 768px) {
            .bottom-actions {
                flex-direction: column;
                gap: 2rem;
            }
            .btn-logout {
                position: relative;
            }
            .footer-content {
                flex-direction: column;
                gap: 1.5rem;
                text-align: center;
            }
            .footer-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="container header-content">
            <a href="/dashboard" class="logo">PharmaOrder</a>
            <nav class="nav-links">
                <a href="/dashboard" class="nav-link active">Cari Obat</a>
                <a href="/riwayat-pesanan" class="nav-link" id="pesananSayaLink">Pesanan Saya</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Page Header & Filters -->
            <div class="page-header">
                <h1 class="page-title">Cari Obat</h1>
                <p class="page-subtitle">Temukan obat resep dan kebutuhan kesehatan Anda.</p>
                
                <div class="filters">
                    <button class="filter-btn active" onclick="filterCategory('semua', this)">Semua Obat</button>
                    <button class="filter-btn" onclick="filterCategory('nyeri', this)">Pereda Nyeri</button>
                    <button class="filter-btn" onclick="filterCategory('vitamin', this)">Vitamin</button>
                    <button class="filter-btn" onclick="filterCategory('pencernaan', this)">Pencernaan</button>
                </div>
            </div>

            <div class="product-grid" id="productGrid">
                @foreach($medicines as $obat)
                    @php
                        // Category mapping for data-category and color
                        $catLower = strtolower($obat['kategori']);
                        $catClass = 'lainnya';
                        if (str_contains($catLower, 'vitamin')) $catClass = 'vitamin';
                        else if (str_contains($catLower, 'pencernaan')) $catClass = 'pencernaan';
                        else if (str_contains($catLower, 'nyeri') || str_contains($catLower, 'analgesik')) $catClass = 'nyeri';
                        else if (str_contains($catLower, 'resep') || str_contains($catLower, 'insulin')) $catClass = 'insulin';
                        else if (str_contains($catLower, 'antibiotik')) $catClass = 'antibiotik';
                        
                        // Badge logic
                        $badgeClass = '';
                        $badgeText = '';
                        if ($obat['stok'] == 'Stok Menipis') {
                            $badgeClass = 'badge-warning';
                            $badgeText = 'STOK MENIPIS';
                        } else if ($obat['stok'] == 'Butuh Resep' || $obat['wajib_resep']) {
                            $badgeClass = 'badge-danger';
                            $badgeText = 'BUTUH RESEP';
                        }
                    @endphp
                    <div class="product-card" data-category="{{ $catClass }}">
                        <div class="card-image-wrapper">
                            @if($badgeText)
                                <span class="badge {{ $badgeClass }}">{{ $badgeText }}</span>
                            @endif
                            <img src="{{ $obat['gambar'] ?? '/images/placeholder.png' }}" alt="{{ $obat['nama'] }}" onerror="this.src='/images/amoxicillin.png'">
                        </div>
                        <div class="card-content">
                            <div class="category-label" style="text-transform: uppercase;">
                                <svg fill="currentColor" viewBox="0 0 20 20" style="width:12px;height:12px;"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9 7a1 1 0 112 0v4a1 1 0 11-2 0V7zm1 7a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                                {{ $obat['kategori'] }}
                            </div>
                            <h3 class="product-title">{{ $obat['nama'] }}</h3>
                            <p class="product-desc">{{ $obat['deskripsi'] }}</p>
                            <div class="price-row">
                                <span class="price">Rp {{ number_format($obat['harga'], 0, ',', '.') }}</span>
                                <span class="unit">{{ $obat['kemasan'] ?? 'Pak' }}</span>
                            </div>
                            <button class="btn-order" onclick="window.location.href='/pesanan/{{ $obat['id'] }}'">
                                Pesan Sekarang
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination & Actions -->
            <div class="bottom-actions">
                <a href="/login" class="btn-logout">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Keluar
                </a>
                
                <div class="pagination">
                    <a href="#" class="page-btn" onclick="changePage(1)">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </a>
                    <a href="#" class="page-btn active" id="page1" onclick="changePage(1)">1</a>
                    <a href="#" class="page-btn" id="page2" onclick="changePage(2)">2</a>
                    <a href="#" class="page-btn" id="page3" onclick="changePage(3)">3</a>
                    <span class="page-btn dots">...</span>
                    <a href="#" class="page-btn" id="page12" onclick="changePage(12)">12</a>
                    <a href="#" class="page-btn" onclick="changePage(2)">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-content">
            <div class="copyright">
                © 2024 PHARMAORDER SYSTEMS. KEUNGGULAN KLINIS & KEANDALAN DIGITAL.
            </div>
            <div class="footer-links">
                <a href="#">Kebijakan Privasi</a>
                <a href="#">Ketentuan Layanan</a>
                <a href="#">Keamanan Obat</a>
                <a href="#">Hubungi Dukungan</a>
            </div>
        </div>
    </footer>

    <script>
        // Simulate no orders state
        let hasOrders = false;

        function handlePesananSaya() {
            if (!hasOrders) {
                alert("Anda belum memiliki pesanan. Silakan pilih obat dan pesan terlebih dahulu.");
            } else {
                // In a real app, this would navigate to the orders page
                alert("Mengarahkan ke halaman Pesanan Saya...");
            }
        }

        function pesanObat(namaObat) {
            alert(`Anda telah memilih obat: ${namaObat}. (Halaman Checkout belum diimplementasi)`);
            // Simulate that an order has been created
            hasOrders = true;
            
            // Enable the 'Pesanan Saya' link
            const pesananLink = document.getElementById('pesananSayaLink');
            pesananLink.classList.remove('disabled');
            pesananLink.style.cursor = 'pointer';
            
            // Note: In real logic, clicking "Pesan" would direct to checkout page
        }

        // Pagination Simulation
        let originalGridHtml = '';
        window.addEventListener('DOMContentLoaded', () => {
            originalGridHtml = document.getElementById('productGrid').innerHTML;
        });

        function changePage(page) {
            const productGrid = document.getElementById('productGrid');
            const paginationButtons = document.querySelectorAll('.page-btn');
            
            paginationButtons.forEach(btn => btn.classList.remove('active'));
            
            if (page === 1) {
                productGrid.innerHTML = originalGridHtml;
                document.getElementById('page1').classList.add('active');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                productGrid.innerHTML = `
                    <div style="grid-column: 1 / -1; padding: 10rem 0; text-align: center; color: var(--text-muted); background: #f9fafb; border-radius: 12px; border: 2px dashed var(--border-color); margin: 2rem 0;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:64px;height:64px;margin-bottom:1.5rem;opacity:0.2;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--primary); margin-bottom: 0.5rem;">Halaman Masih Kosong</h2>
                        <p style="font-size: 1rem; color: var(--text-muted);">Belum ada obat yang ditambahkan di halaman ${page}.</p>
                    </div>
                `;
                const btn = document.getElementById('page' + page);
                if (btn) btn.classList.add('active');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        // Filter Category Logic
        function filterCategory(category, element) {
            // Jika sedang di halaman selain 1, kembalikan ke halaman 1 dulu agar obat terlihat
            const page1Btn = document.getElementById('page1');
            if (!page1Btn.classList.contains('active')) {
                changePage(1);
            }

            // Update active state on buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            element.classList.add('active');

            // Filter the cards
            const cards = document.querySelectorAll('.product-card');
            
            cards.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                
                if (category === 'semua') {
                    card.style.display = 'flex';
                } else {
                    if (cardCat === category) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                }
            });
        }
    </script>
</body>
</html>
