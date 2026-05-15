<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan - {{ $obat['nama'] }} - PharmaOrder</title>
    <style>
        :root {
            --primary: #1b4332;
            --primary-light: #2d6a4f;
            --bg-color: #fafafa;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --text-light: #9ca3af;
            --border-color: #e5e7eb;
            --card-bg: #ffffff;
            --badge-success-bg: #dcfce7;
            --badge-success-text: #166534;
            --badge-warning-bg: #fee2e2;
            --badge-warning-text: #ef4444;
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
        }

        .nav-link.active {
            color: var(--primary-light);
            border-bottom-color: var(--primary-light);
            font-weight: 600;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 2rem 0 4rem;
        }

        .breadcrumb {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
        }

        .breadcrumb a {
            color: var(--text-muted);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .breadcrumb span {
            color: var(--text-main);
            font-weight: 600;
        }

        .grid-layout {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 2rem;
        }

        /* Left Column */
        .card {
            background-color: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .product-image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fcfcfc;
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            height: 250px;
        }

        .product-image-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .badges {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge.bg-green {
            background-color: var(--badge-success-bg);
            color: var(--badge-success-text);
        }

        .badge.bg-gray {
            background-color: #f3f4f6;
            color: var(--text-main);
        }

        .badge.bg-red {
            background-color: var(--badge-warning-bg);
            color: var(--badge-warning-text);
        }

        .product-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .product-subtitle {
            font-size: 1rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            line-height: 1.5;
        }

        .divider {
            height: 1px;
            background-color: var(--border-color);
            margin: 1.5rem 0;
        }

        .specs-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .spec-item .spec-label {
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.25rem;
        }

        .spec-item .spec-value {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .info-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .info-desc {
            font-size: 0.95rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .apoteker-note {
            background-color: #f8fafc;
            border-left: 4px solid var(--primary);
            padding: 1.25rem;
            border-radius: 0 8px 8px 0;
        }

        .apoteker-note h4 {
            font-size: 0.9rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .apoteker-note p {
            font-size: 0.9rem;
            color: var(--text-muted);
            font-style: italic;
        }

        /* Right Column */
        .price-label {
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .price-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 2rem;
        }

        .qty-label {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-main);
            text-transform: uppercase;
            margin-bottom: 0.75rem;
        }

        .qty-controls {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .qty-selector {
            display: flex;
            align-items: center;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
            width: 120px;
        }

        .qty-btn {
            background: none;
            border: none;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.25rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: background-color 0.2s;
        }

        .qty-btn:hover {
            background-color: #f3f4f6;
        }

        .qty-input {
            width: 40px;
            height: 40px;
            border: none;
            border-left: 1px solid var(--border-color);
            border-right: 1px solid var(--border-color);
            text-align: center;
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .qty-max {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .btn-checkout {
            width: 100%;
            padding: 1rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            transition: background-color 0.2s;
        }

        .btn-checkout:hover {
            background-color: var(--primary-light);
        }

        .btn-checkout.error-state {
            background-color: #cb4345;
        }

        .delivery-info {
            text-align: center;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        /* Summary Box */
        .summary-box {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .summary-row.align-top {
            align-items: flex-start;
        }

        .summary-row span:first-child {
            color: var(--text-muted);
        }

        .summary-row span:last-child {
            color: var(--text-main);
            font-weight: 600;
        }

        .payment-options {
            display: flex;
            gap: 0.5rem;
        }

        .pay-btn {
            padding: 0.2rem 0.6rem;
            border-radius: 9999px;
            border: 1px solid transparent;
            background-color: #e5e7eb;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-main);
            cursor: pointer;
            transition: all 0.2s;
        }

        .pay-btn.active {
            background-color: #d1d5db;
        }

        .bank-select {
            padding: 0.25rem;
            border-radius: 4px;
            border: 1px solid var(--border-color);
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-main);
            outline: none;
        }

        .address-input {
            width: 60%;
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 0.8rem;
            font-family: inherit;
            resize: vertical;
            outline: none;
            text-align: right;
        }

        .address-input:focus {
            border-color: var(--primary);
        }

        .summary-divider {
            height: 1px;
            background-color: var(--border-color);
            margin: 1.5rem 0;
        }

        .total-row {
            margin-bottom: 0;
            font-size: 1.25rem;
        }

        .total-row span:first-child {
            color: var(--text-main);
            font-weight: 600;
        }

        .total-row span:last-child {
            color: var(--primary);
            font-size: 1.5rem;
            font-weight: 700;
        }

        .trust-card {
            background-color: #f3f4f6;
            border: 1px solid var(--border-color);
        }

        .trust-item {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .trust-item:last-child {
            margin-bottom: 0;
        }

        .trust-icon {
            color: var(--primary);
            width: 24px;
            height: 24px;
            flex-shrink: 0;
        }

        .trust-text h4 {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--text-main);
        }

        .trust-text p {
            font-size: 0.85rem;
            color: var(--text-muted);
            line-height: 1.4;
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
        }

        @media (max-width: 992px) {
            .grid-layout {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="container header-content">
            <a href="/dashboard" class="logo">PharmaOrder</a>
            <nav class="nav-links">
                <a href="/dashboard" class="nav-link">Telusuri Obat</a>
                <a href="/riwayat-pesanan" class="nav-link">Pesanan Saya</a>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            
            <div class="breadcrumb">
                <a href="/dashboard">Katalog</a> &rsaquo; 
                <a href="/dashboard">{{ $obat['kategori'] }}</a> &rsaquo; 
                <span>{{ $obat['nama'] }}</span>
            </div>

            <div class="grid-layout">
                <!-- Left Column -->
                <div class="left-col">
                    <div class="card">
                        <div class="product-image-container">
                            <img src="{{ $obat['gambar'] }}" alt="{{ $obat['nama'] }}">
                        </div>
                        
                        <div class="badges">
                            @if($obat['wajib_resep'])
                                <span class="badge bg-green">Wajib Resep</span>
                            @endif
                            <span class="badge {{ $obat['stok'] == 'Stok Menipis' ? 'bg-red' : 'bg-gray' }}">
                                &bull; {{ $obat['stok'] }}
                            </span>
                        </div>

                        <h1 class="product-title">{{ $obat['nama'] }}</h1>
                        <p class="product-subtitle">{{ $obat['deskripsi'] }} Produsen: {{ $obat['pabrikan'] }}.</p>

                        <div class="detail-id" id="receiptTransId">Sedang diproses...</div>

                        <div class="divider"></div>

                        <div class="specs-grid">
                            <div class="spec-item">
                                <div class="spec-label">BENTUK SEDIAAN</div>
                                <div class="spec-value">{{ $obat['bentuk'] }}</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">UKURAN KEMASAN</div>
                                <div class="spec-value">{{ $obat['kemasan'] }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <h2 class="info-title">Informasi Obat</h2>
                        <p class="info-desc">
                            {{ $obat['deskripsi'] }} Obat ini merupakan bagian dari kategori {{ strtolower($obat['kategori']) }}. 
                            Pastikan Anda membaca aturan pakai dengan saksama dan mengikuti petunjuk yang dianjurkan oleh tenaga medis.
                        </p>

                        <div class="apoteker-note">
                            <h4>Catatan Apoteker:</h4>
                            <p>{{ $obat['catatan'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="right-col">
                    <div class="card">
                        <div class="price-label">HARGA SATUAN</div>
                        <div class="price-value">Rp {{ number_format($obat['harga'], 0, ',', '.') }}</div>

                        <div class="qty-label">PILIH JUMLAH</div>
                        <div class="qty-controls">
                            <div class="qty-selector">
                                <button class="qty-btn" onclick="updateQty(-1)">&minus;</button>
                                <input type="text" id="qtyInput" class="qty-input" value="1" readonly>
                                <button class="qty-btn" onclick="updateQty(1)">&plus;</button>
                            </div>
                            <div class="qty-max">Maks: 3 pak</div>
                        </div>

                        <div id="checkoutPhase1">
                            <button class="btn-checkout" id="btnCheckout" onclick="prosesPesanan()">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                Proses Pemesanan
                            </button>
                            <div class="delivery-info" id="deliveryInfo">Pengiriman Hari Ini, 4 Mei</div>
                        </div>

                        <div id="checkoutPhase2" style="display: none; margin-top: 1.5rem;">
                            <div class="summary-box">
                                <div class="summary-row">
                                    <span>Subtotal</span>
                                    <span id="summarySubtotal">Rp 0</span>
                                </div>
                                <div class="summary-row">
                                    <span>Pembayaran</span>
                                    <div class="payment-options" id="paymentOptions">
                                        <button class="pay-btn active" id="btnCOD" onclick="selectPayment('COD')">COD</button>
                                        <button class="pay-btn" id="btnTF" onclick="selectPayment('TF')">TF</button>
                                    </div>
                                    <span id="paymentSelectedDisplay" style="display: none; font-weight: 600;">COD</span>
                                </div>
                                <div id="bankSelectContainer" style="display: none; margin-bottom: 1rem; text-align: right;">
                                    <select class="bank-select" id="bankSelect" onchange="updateAccountNumber()">
                                        <option value="mandiri">Mandiri</option>
                                        <option value="bca">BCA</option>
                                        <option value="bri">BRI</option>
                                        <option value="bni">BNI</option>
                                    </select>
                                    <div style="margin-top: 0.5rem; display: flex; flex-direction: column; align-items: flex-end; gap: 0.5rem;">
                                        <div style="font-size: 0.85rem; font-weight: 700; color: var(--primary);" id="accountNumberDisplay">123-00-1234567-8</div>
                                        <button class="pay-btn" id="btnCopyRek" style="background-color: var(--primary); color: white; border: none; font-size: 0.7rem; padding: 0.3rem 0.8rem;" onclick="copyToClipboard()">Salin No. Rekening</button>
                                    </div>
                                </div>
                                <div class="summary-row">
                                    <span>Pengiriman</span>
                                    <span>Grab</span>
                                </div>
                                <div class="summary-row align-top">
                                    <span>Alamat</span>
                                    <textarea class="address-input" id="alamatInput" placeholder="Contoh: Jl. Kenanga..." rows="2"></textarea>
                                    <span id="alamatDisplay" style="display: none; font-weight: 600; text-align: right; width: 60%; font-size: 0.85rem;"></span>
                                </div>
                                <div class="summary-row">
                                    <span>Biaya Proses</span>
                                    <span>GRATIS</span>
                                </div>
                                <div class="summary-row">
                                    <span>Pajak (0%)</span>
                                    <span>Rp 0</span>
                                </div>
                                
                                <div class="summary-divider"></div>
                                
                                <div class="summary-row total-row">
                                    <span>Total</span>
                                    <span id="summaryTotal">Rp 0</span>
                                </div>
                            </div>

                            <button class="btn-checkout" id="btnPesanSekarang" onclick="submitFinalOrder()">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                Pesan Sekarang
                            </button>
                            <button class="btn-checkout" id="btnPesananBerhasil" onclick="finishOrder()" style="display: none;">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Pesanan Berhasil
                            </button>
                            <div class="delivery-info">Pengiriman Hari Ini, 4 Mei</div>
                        </div>
                    </div>

                    <div class="card trust-card">
                        <div class="trust-item">
                            <svg class="trust-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            <div class="trust-text">
                                <h4>Kualitas Klinis Terjamin</h4>
                                <p>Semua obat diverifikasi oleh apoteker berlisensi kami untuk keaslian dan tanggal kedaluwarsa.</p>
                            </div>
                        </div>
                        <div class="trust-item">
                            <svg class="trust-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            <div class="trust-text">
                                <h4>Keamanan Data Kesehatan</h4>
                                <p>Riwayat resep dan pesanan Anda dienkripsi dengan standar industri terkemuka.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="footer">
        <div class="container footer-content">
            <div class="copyright">
                © 2024 PHARMAORDER SYSTEMS. KEUNGGULAN KLINIS & KEANDALAN DIGITAL.
            </div>
            <div class="footer-links">
                <a href="#">Kebijakan Privasi</a>
                <a href="#">Syarat & Ketentuan</a>
                <a href="#">Keamanan Obat</a>
                <a href="#">Hubungi Dukungan</a>
            </div>
        </div>
    </footer>

    <script>
        let currentQty = 1;
        const maxQty = 3;
        const qtyInput = document.getElementById('qtyInput');
        
        // Simulasi stok tersedia berdasarkan status badge
        const availableStock = {{ $obat['stok'] == 'Stok Menipis' ? 1 : 5 }};
        
        const btnCheckout = document.getElementById('btnCheckout');
        const deliveryInfo = document.getElementById('deliveryInfo');
        
        const originalBtnText = '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg> Proses Pemesanan';
        const originalDeliveryInfo = 'Pengiriman Hari Ini, 4 Mei';

        function updateQty(change) {
            let newQty = currentQty + change;
            if (newQty >= 1 && newQty <= maxQty) {
                currentQty = newQty;
                qtyInput.value = currentQty;
                
                // Remove error state automatically if they lower the quantity back to safe levels
                if (btnCheckout.classList.contains('error-state') && currentQty <= availableStock) {
                    resetErrorState();
                }
            }
        }

        function formatRupiah(number) {
            return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        const hargaSatuan = {{ $obat['harga'] }};
        const checkoutPhase1 = document.getElementById('checkoutPhase1');
        const checkoutPhase2 = document.getElementById('checkoutPhase2');
        const summarySubtotal = document.getElementById('summarySubtotal');
        const summaryTotal = document.getElementById('summaryTotal');
        const paymentOptions = document.getElementById('paymentOptions');
        const paymentSelectedDisplay = document.getElementById('paymentSelectedDisplay');
        const btnCOD = document.getElementById('btnCOD');
        const btnTF = document.getElementById('btnTF');
        const bankSelectContainer = document.getElementById('bankSelectContainer');
        const bankSelect = document.getElementById('bankSelect');
        const alamatInput = document.getElementById('alamatInput');
        const alamatDisplay = document.getElementById('alamatDisplay');
        const btnPesanSekarang = document.getElementById('btnPesanSekarang');
        const btnPesananBerhasil = document.getElementById('btnPesananBerhasil');
        
        let selectedPaymentMethod = 'COD';

        const accountNumbers = {
            'mandiri': '123-00-1234567-8',
            'bca': '8690123456',
            'bri': '0012-01-000123-50-4',
            'bni': '0123456789'
        };

        function updateAccountNumber() {
            const selectedBank = bankSelect.value;
            const accNumDisplay = document.getElementById('accountNumberDisplay');
            accNumDisplay.innerText = accountNumbers[selectedBank];
            
            // Reset copy button text
            const btnCopy = document.getElementById('btnCopyRek');
            btnCopy.innerText = 'Salin No. Rekening';
            btnCopy.style.backgroundColor = 'var(--primary)';
        }

        function copyToClipboard() {
            const accNum = document.getElementById('accountNumberDisplay').innerText;
            navigator.clipboard.writeText(accNum).then(() => {
                const btnCopy = document.getElementById('btnCopyRek');
                btnCopy.innerText = 'Berhasil Disalin!';
                btnCopy.style.backgroundColor = '#166534';
                
                setTimeout(() => {
                    btnCopy.innerText = 'Salin No. Rekening';
                    btnCopy.style.backgroundColor = 'var(--primary)';
                }, 2000);
            });
        }

        function selectPayment(method) {
            selectedPaymentMethod = method;
            if (method === 'COD') {
                btnCOD.classList.add('active');
                btnTF.classList.remove('active');
                bankSelectContainer.style.display = 'none';
            } else {
                btnTF.classList.add('active');
                btnCOD.classList.remove('active');
                bankSelectContainer.style.display = 'block';
                updateAccountNumber(); // Initialize display
            }
        }

        function prosesPesanan() {
            if (currentQty > availableStock) {
                // Show Error State
                btnCheckout.classList.add('error-state');
                btnCheckout.innerHTML = '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg> Proses Gagal Stok Tidak Cukup';
                
                deliveryInfo.innerHTML = '<a href="#" onclick="pesanUlang(event)" style="color:var(--text-muted);text-decoration:none;">Pesan Ulang</a>';
            } else {
                // Transition to summary state
                checkoutPhase1.style.display = 'none';
                
                // Disable qty controls
                document.querySelectorAll('.qty-btn').forEach(btn => btn.disabled = true);
                
                // Calculate Totals
                const total = currentQty * hargaSatuan;
                const formatted = formatRupiah(total);
                summarySubtotal.innerText = formatted;
                summaryTotal.innerText = formatted;
                
                checkoutPhase2.style.display = 'block';
            }
        }
        
        function submitFinalOrder() {
            if (alamatInput.value.trim() === '') {
                alert('Tolong isi alamat pengiriman Anda.');
                alamatInput.focus();
                return;
            }
            
            btnPesanSekarang.disabled = true;
            btnPesanSekarang.innerHTML = 'Memproses...';

            const payload = {
                _token: '{{ csrf_token() }}',
                obat_id: '{{ $obat['id'] }}',
                qty: currentQty,
                alamat: alamatInput.value,
                pembayaran: selectedPaymentMethod === 'TF' ? 'TF - ' + bankSelect.options[bankSelect.selectedIndex].text : 'COD'
            };

            fetch('/checkout', {
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
                    // Update trans ID
                    const receiptIdEl = document.getElementById('receiptTransId');
                    if(receiptIdEl) receiptIdEl.innerText = data.transaction_id;

                    // Transition to Phase 3 (Receipt)
                    // 1. Hide interactive elements
                    paymentOptions.style.display = 'none';
                    bankSelectContainer.style.display = 'none';
                    alamatInput.style.display = 'none';
                    btnPesanSekarang.style.display = 'none';
                    
                    // 2. Show static values
                    paymentSelectedDisplay.innerText = payload.pembayaran;
                    paymentSelectedDisplay.style.display = 'inline';
                    
                    alamatDisplay.innerText = payload.alamat;
                    alamatDisplay.style.display = 'inline-block';
                    
                    btnPesananBerhasil.style.display = 'flex';
                } else {
                    alert('Terjadi kesalahan saat memproses pesanan.');
                    btnPesanSekarang.disabled = false;
                    btnPesanSekarang.innerHTML = 'Pesan Sekarang';
                }
            })
            .catch(error => {
                console.error(error);
                alert('Terjadi kesalahan koneksi.');
                btnPesanSekarang.disabled = false;
                btnPesanSekarang.innerHTML = 'Pesan Sekarang';
            });
        }
        
        function finishOrder() {
            window.location.href = '/dashboard';
        }
        
        function pesanUlang(e) {
            e.preventDefault();
            resetErrorState();
            currentQty = 1;
            qtyInput.value = currentQty;
        }
        
        function resetErrorState() {
            btnCheckout.classList.remove('error-state');
            btnCheckout.innerHTML = originalBtnText;
            deliveryInfo.innerHTML = originalDeliveryInfo;
        }
    </script>
</body>
</html>
