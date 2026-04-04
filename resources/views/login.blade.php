<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Conneckat</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header class="auth-header">
        <div class="navbar">
            <a href="index.html" class="brand-link">
                <img src="poto/logo.png" class="logo" alt="Logo Conneckat">
                <div class="brand-text">
                    <strong>CONNECKAT</strong>
                    <span>Portal Akun SMKN 1 Katapang</span>
                </div>
            </a>

            <nav class="daftar">
                <a href="/" class="home">Home</a>
            </nav>
        </div>
    </header>

    <main class="isi">
        <section class="auth-shell glass-panel">
            <div class="auth-top">
                <span class="mini-badge">Portal Akun</span>
                <h1>Masuk ke Conneckat</h1>
                <p>Gunakan halaman ini untuk login atau registrasi akun. Tampilan dibuat lebih ringkas, simetris, dan siap disambungkan ke sistem backend tanpa elemen yang tidak perlu.</p>
            </div>

            <div class="access-readme">
                <article class="readme-card">
                    <small>Akses Siswa</small>
                    <strong>Dipakai untuk pendaftaran eskul</strong>
                    <p>Login siswa digunakan untuk melihat data akun, mengisi formulir pendaftaran, dan mengikuti alur seleksi kegiatan sesuai kebutuhan sekolah.</p>
                </article>
                <article class="readme-card">
                    <small>Akses Admin</small>
                    <strong>Dipakai untuk kelola data</strong>
                    <p>Login admin digunakan untuk mengelola eskul, menambah pertanyaan formulir, dan memantau data pendaftar setelah sistem backend disambungkan.</p>
                </article>
            </div>

            <div class="form-wrapper" id="formWrapper">
                <div class="form-switcher">
                    <button type="button" class="switch-btn active" id="loginSwitch" onclick="showLogin()">Login</button>
                    <button type="button" class="switch-btn" id="registerSwitch" onclick="showRegister()">Registrasi</button>
                </div>

                <div class="login" id="loginForm">
                    <form action="index.php" method="POST">
                        <h2>Login</h2>
                        <p class="form-subtitle">Pilih tipe akses lalu masuk dengan username dan password yang sesuai.</p>

                        <div class="input-box select-box">
                            <select name="tipe_akses" required>
                                <option value="">Pilih tipe akses</option>
                                <option value="siswa">Siswa</option>
                                <option value="admin">Admin</option>
                            </select>
                            <label>Tipe Akses</label>
                            <i class="bx bxs-id-card"></i>
                        </div>

                        <div class="input-box">
                            <input type="text" name="username" autocomplete="off" minlength="3" pattern=".{1,40}" title="Username maksimal 40 karakter" required>
                            <label>Username</label>
                            <i class="bx bxs-user"></i>
                        </div>

                        <div class="input-box">
                            <input type="password" name="password" id="loginPassword" required>
                            <label>Password</label>
                            <i class="bx bxs-lock" id="loginToggleIcon" onclick="togglePassword('loginPassword', 'loginToggleIcon')"></i>
                        </div>

                        <button type="submit" name="login" class="btn">Login</button>

                        <div class="akun">
                            <p>Belum punya akun siswa?
                                <button type="button" onclick="showRegister()">Buat akun</button>
                            </p>
                        </div>
                    </form>
                </div>

                <div class="registrasi" id="registrasiForm">
                    <form action="index.php" method="POST">
                        <h2>Registrasi</h2>
                        <p class="form-subtitle">Registrasi ini disiapkan untuk akun siswa yang akan dipakai pada proses pendaftaran kegiatan.</p>

                        <div class="input-box">
                            <input type="text" name="username" autocomplete="off" minlength="3" pattern=".{1,40}" title="Username maksimal 40 karakter" required>
                            <label>Username</label>
                            <i class="bx bxs-user"></i>
                        </div>

                        <div class="input-box">
                            <input type="password" name="password" id="registerPassword" required>
                            <label>Password</label>
                            <i class="bx bxs-lock" id="registerToggleIcon" onclick="togglePassword('registerPassword', 'registerToggleIcon')"></i>
                        </div>

                        <div class="input-box">
                            <input type="password" name="confirm_password" id="confirmPassword" required>
                            <label>Konfirmasi Password</label>
                            <i class="bx bxs-lock" id="confirmToggleIcon" onclick="togglePassword('confirmPassword', 'confirmToggleIcon')"></i>
                        </div>

                        <button type="submit" name="registrasi" class="btn">Registrasi</button>

                        <div class="akun">
                            <p>Sudah punya akun?
                                <button type="button" onclick="showLogin()">Kembali ke login</button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="js/index.js"></script>
</body>
</html>
