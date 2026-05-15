<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PharmaOrder</title>
    <style>
        /* CSS reset and base styles */
        :root {
            --primary: #2d6a4f; /* dark green */
            --primary-hover: #1b4332;
            --bg-color: #f4fcf6; /* light greenish background */
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border-color: #e5e7eb;
            --input-bg: #ffffff;
            --icon-bg: #d8f3dc; 
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
            position: relative;
        }

        /* Add a subtle gradient background similar to the image */
        body::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(216,243,220,0.8) 0%, rgba(244,252,246,0) 70%);
            z-index: -1;
            pointer-events: none;
        }

        /* Main Container */
        .main-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            flex-direction: column;
        }

        /* Card */
        .login-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 420px;
            padding: 2.5rem 2rem;
            position: relative;
            z-index: 1;
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

        /* Role Toggle */
        .role-toggle {
            display: flex;
            background-color: #f3f4f6;
            border-radius: 8px;
            padding: 4px;
            margin-bottom: 2rem;
        }

        .role-btn {
            flex: 1;
            text-align: center;
            padding: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-muted);
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .role-btn.active {
            background-color: #ffffff;
            color: var(--primary);
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        /* Form */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .form-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .forgot-link {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--primary);
            text-decoration: none;
        }

        .forgot-link:hover {
            text-decoration: underline;
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

        .input-icon-right {
            position: absolute;
            right: 1rem;
            color: var(--text-muted);
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
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

        .form-input.has-right-icon {
            padding-right: 2.75rem;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(45, 106, 79, 0.1);
        }

        /* Checkbox */
        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .checkbox-wrapper input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--primary);
            border-radius: 4px;
        }

        .checkbox-wrapper label {
            font-size: 0.875rem;
            color: var(--text-muted);
            cursor: pointer;
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
            transition: background-color 0.2s ease;
            margin-bottom: 2rem;
        }

        .btn-submit:hover {
            background-color: var(--primary-hover);
        }

        /* Divider */
        .divider {
            height: 1px;
            background-color: var(--border-color);
            margin: 1.5rem 0;
        }

        /* Register Link */
        .register-link {
            text-align: center;
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .register-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Trust Badges */
        .trust-badges {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 2rem;
            color: var(--text-muted);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .badge svg {
            width: 16px;
            height: 16px;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

    <main class="main-container">
        <div class="login-card">
            <div class="header">
                <div class="logo-container">
                    <svg class="logo-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h1 class="title">PharmaOrder</h1>
                <p class="subtitle">Keunggulan Klinis & Keandalan Digital</p>
            </div>

            <!-- Role Toggle -->
            <div class="role-toggle">
                <div class="role-btn active" id="btnCustomer" onclick="selectRole('customer')">Customer</div>
                <div class="role-btn" id="btnAdmin" onclick="selectRole('admin')">Admin</div>
            </div>

            <form id="loginForm">
                @csrf
                <input type="hidden" id="roleInput" name="role" value="customer">

                <div class="form-group">
                    <div class="form-label-wrapper">
                        <label class="form-label">NOMOR TELEPON / NAMA PENGGUNA</label>
                    </div>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <!-- User icon -->
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <input type="text" id="identityInput" class="form-input" placeholder="Masukkan identitas Anda" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-wrapper">
                        <label class="form-label">KATA SANDI</label>
                        <a href="#" class="forgot-link">Lupa?</a>
                    </div>
                    <div class="input-wrapper">
                        <div class="input-icon">
                            <!-- Lock icon -->
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input type="password" id="passwordInput" class="form-input has-right-icon" placeholder="Min. 8 Karakter" required>
                        <div class="input-icon-right" onclick="togglePassword()">
                            <!-- Eye icon -->
                            <svg id="eyeIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="checkbox-wrapper">
                    <input type="checkbox" id="rememberMe">
                    <label for="rememberMe">Tetap masuk</label>
                </div>

                <button type="submit" class="btn-submit">Masuk</button>

                <div class="divider"></div>

                <div class="register-link">
                    Baru di PharmaOrder? <a href="/register">Buat akun</a>
                </div>
            </form>
        </div>

        <div class="trust-badges">
            <div class="badge">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                PORTAL AMAN
            </div>
            <div class="badge">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                AES 256-BIT
            </div>
        </div>
    </main>

    <script>
        // Role Selection
        function selectRole(role) {
            document.getElementById('roleInput').value = role;
            
            if (role === 'customer') {
                document.getElementById('btnCustomer').classList.add('active');
                document.getElementById('btnAdmin').classList.remove('active');
            } else {
                document.getElementById('btnAdmin').classList.add('active');
                document.getElementById('btnCustomer').classList.remove('active');
            }
        }

        // Toggle Password Visibility
        function togglePassword() {
            const pwdInput = document.getElementById('passwordInput');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (pwdInput.type === 'password') {
                pwdInput.type = 'text';
                // Change eye icon to eye-slash
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>';
            } else {
                pwdInput.type = 'password';
                // Change back to normal eye
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            }
        }

        // Form Submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const role = document.getElementById('roleInput').value;
            const identity = document.getElementById('identityInput').value;
            const password = document.getElementById('passwordInput').value;
            
            const payload = {
                _token: document.querySelector('input[name="_token"]').value,
                identity: identity,
                password: password,
                role: role
            };

            fetch('/login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    alert(data.message);
                }
            });
        });
    </script>
</body>
</html>
