<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PharmaOrder</title>
    <style>
        /* CSS reset and base styles */
        :root {
            --primary: #2d6a4f; /* dark green */
            --primary-hover: #1b4332;
            --bg-color: #f8f9fa;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border-color: #e5e7eb;
            --input-bg: #ffffff;
            --icon-bg: #d8f3dc; /* light green for the shield icon background */
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

        /* Main Container */
        .main-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        /* Card */
        .register-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 420px;
            padding: 2.5rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .register-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(248,249,250,0.5) 100%);
            pointer-events: none;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-container {
            width: 56px;
            height: 56px;
            background-color: var(--icon-bg);
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 1rem auto;
        }

        .logo-icon {
            color: var(--primary);
            width: 28px;
            height: 28px;
        }

        .title {
            color: var(--primary);
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        /* Form */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            color: var(--text-muted);
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 2.75rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
            color: var(--text-main);
            background-color: var(--input-bg);
            transition: all 0.2s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(45, 106, 79, 0.1);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        /* Button */
        .btn-submit {
            width: 100%;
            padding: 0.875rem;
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
            transition: background-color 0.2s ease;
            margin-top: 1.5rem;
            margin-bottom: 2rem;
        }

        .btn-submit:hover {
            background-color: var(--primary-hover);
        }

        .btn-submit svg {
            width: 18px;
            height: 18px;
        }

        /* Divider */
        .divider {
            height: 1px;
            background-color: var(--border-color);
            margin: 1.5rem 0;
            position: relative;
        }

        /* Login Link */
        .login-link, .reset-link {
            text-align: center;
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .login-link a, .reset-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover, .reset-link a:hover {
            text-decoration: underline;
        }

        /* Error State */
        .error-box {
            display: none;
            background-color: #d32f2f;
            color: white;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1.5rem;
            margin-bottom: 2rem;
            align-items: center;
            gap: 1rem;
        }

        .error-box.active {
            display: flex;
        }

        .error-icon {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
        }

        .error-text {
            font-size: 0.875rem;
            font-weight: 500;
            line-height: 1.4;
        }
        
        .error-text strong {
            display: block;
            margin-bottom: 0.25rem;
        }

        .reset-link {
            display: none;
            margin-bottom: 1.5rem;
        }

        .reset-link.active {
            display: block;
        }
        
        .reset-link a {
            color: var(--text-muted);
            cursor: pointer;
        }

        /* Footer */
        .footer {
            border-top: 1px solid var(--border-color);
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.75rem;
            color: var(--text-muted);
            background-color: transparent;
        }

        .footer-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: var(--text-main);
        }

        @media (max-width: 640px) {
            .footer {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>
    <!-- Add Inter font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

    <main class="main-container">
        <div class="register-card">
            <div class="header">
                <div class="logo-container">
                    <!-- Shield icon -->
                    <svg class="logo-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h1 class="title">PharmaOrder</h1>
                <p class="subtitle">Buat akun Anda untuk mulai membeli obat</p>
            </div>

            <form id="registerForm">
                @csrf
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <!-- User icon -->
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <input type="text" id="nameInput" class="form-input" placeholder="Masukkan nama lengkap Anda" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Nomor Telepon</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <!-- Phone icon -->
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <input type="tel" id="phoneInput" class="form-input" placeholder="+62 XXX XXXX XXXX" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Kata Sandi</label>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <!-- Lock icon -->
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input type="password" id="passwordInput" class="form-input" placeholder="Min. 8 karakter" minlength="8" required>
                    </div>
                </div>

                <button type="submit" class="btn-submit" id="btnSubmit">
                    Buat Akun
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>

                <!-- Error Box (Hidden by default) -->
                <div class="error-box" id="errorBox">
                    <svg class="error-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L1 21h22L12 2zm0 3.45l8.4 14.55H3.6L12 5.45zM11 10v5h2v-5h-2zm0 7v2h2v-2h-2z"></path>
                    </svg>
                    <div class="error-text">
                        <strong>Login Gagal NAMA LENGKAP Salah</strong>
                        Isi dengan Full Huruf Jangan Angka
                    </div>
                </div>

                <div class="divider"></div>

                <div class="login-link" id="loginLink">
                    Sudah punya akun? <a href="/login">Masuk di sini</a>
                </div>

                <!-- Reset Link (Hidden by default) -->
                <div class="reset-link" id="resetLink">
                    <a onclick="resetForm()">Buat Akun Kembali</a>
                </div>
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="copyright">
            © 2024 PHARMAORDER SYSTEMS. CLINICAL EXCELLENCE & DIGITAL RELIABILITY.
        </div>
        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Drug Safety</a>
        </div>
    </footer>

    <script>
        const form = document.getElementById('registerForm');
        const nameInput = document.getElementById('nameInput');
        const btnSubmit = document.getElementById('btnSubmit');
        const errorBox = document.getElementById('errorBox');
        const loginLink = document.getElementById('loginLink');
        const resetLink = document.getElementById('resetLink');

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent actual form submission for now

            const nameValue = nameInput.value;
            // Validate: Only letters and spaces allowed
            const isValidName = /^[a-zA-Z\s]+$/.test(nameValue);

            if (!isValidName) {
                // Show Error State
                btnSubmit.style.display = 'none';
                loginLink.style.display = 'none';
                
                errorBox.classList.add('active');
                resetLink.classList.add('active');
            } else {
                // Success: Call real register API
                const payload = {
                    _token: document.querySelector('input[name="_token"]').value,
                    name: nameValue,
                    phone: document.getElementById('phoneInput').value,
                    password: document.getElementById('passwordInput').value
                };

                fetch('/register', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = '/login';
                    } else {
                        alert('Gagal daftar.');
                    }
                });
            }
        });

        function resetForm() {
            // Restore Initial State
            errorBox.classList.remove('active');
            resetLink.classList.remove('active');
            
            btnSubmit.style.display = 'flex';
            loginLink.style.display = 'block';
            
            // Optionally clear the input
            // nameInput.value = '';
            nameInput.focus();
        }
    </script>
</body>
</html>
