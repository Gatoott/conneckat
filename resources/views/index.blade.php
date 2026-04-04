<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conneckat - Informasi Ekstrakurikuler SMKN 1 Katapang</title>
    <link rel="stylesheet" href="css/index.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="navbar-shell">
            <div class="navbar">
                <a class="brand" href="#home" aria-label="Conneckat">
                    <img src="poto/logo.png" class="logo" alt="Logo Conneckat">
                    <div class="brand-copy">
                        <strong>CONNECKAT</strong>
                        <span>SMKN 1 Katapang</span>
                    </div>
                </a>

                <button class="hamburger" id="hamburger" onclick="toggleMenu()">
                    <i class="fa-solid fa-bars" id="hamburgerIcon"></i>
                </button>

                <div class="nav-wrap" id="navWrap">
                    <nav class="pindah" aria-label="Navigasi utama">
                        <a href="#home">Home</a>
                        <a href="#eskul">Eskul</a>
                        <a href="#pendaftaran">Pendaftaran</a>
                        <a href="#about-project">About Us</a>
                    </nav>
    
                    <div class="daftar">
                        <a href="/login" class="login">login</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section id="home" class="home">
            <div class="hero-grid">
                <div class="isi">
                    <span class="hero-kicker">Sistem informasi ekstrakurikuler</span>
                    <div class="judul">
                        <b>
                            <p>TANGGUH DI ORGANISASI,</p>
                            <p>AKTIF DI PRESTASI</p>
                        </b>
                    </div>

                    <p class="hero-desc">Conneckat adalah portal informasi ekstrakurikuler SMKN 1 Katapang yang membantu siswa melihat profil eskul, jadwal latihan, pembina, dan alur pendaftaran dengan lebih rapi dan terarah.</p>
                    <p class="hero-sub">Satu halaman untuk organisasi, seni, olahraga, bahasa, rohis, sampai klub pengembangan diri.</p>

                    <div class="hero-badges">
                        <span><i class="fa-solid fa-school"></i> SMKN 1 Katapang</span>
                        <span><i class="fa-solid fa-layer-group"></i> 17 eskul aktif</span>
                        <span><i class="fa-solid fa-file-signature"></i> Form pendaftaran siap pakai</span>
                    </div>

                    <div class="hero-actions">
                        <a href="#eskul" class="hero-btn primary">Lihat Eskul</a>
                        <a href="#pendaftaran" class="hero-btn secondary">Isi Pendaftaran</a>
                    </div>
                </div>

                <div class="hero-visual">
                    <article class="hero-card-main">
                        <div class="hero-card-media">
                            <div class="hero-card-glow"></div>
                            <img src="poto/background_sklh.jpg" alt="Kegiatan siswa dan lingkungan sekolah" onerror="this.style.display='none'">
                            <div class="hero-card-overlay">
                                <span class="overlay-pill">Portal Eskul</span>
                                <strong>Informasi kegiatan, pendaftaran, dan profil eskul disusun dalam satu halaman yang lebih rapi.</strong>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <div class="quick-panel">
                <a href="#tentang-detail" class="quick-link glass-link">
                    <i class="fa-regular fa-id-badge"></i>
                    <span>profil eskul</span>
                </a>
                <a href="#pendaftaran" class="quick-link glass-link">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>pendaftaran</span>
                </a>
                <a href="#about-project" class="quick-link glass-link">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <span>about us</span>
                </a>
            </div>
        </section>

        <section id="eskul" class="eskul-section">
            <div class="section-heading center">
                <span class="section-badge">Daftar Ekstrakurikuler</span>
                <h2>Pilih kegiatan yang sesuai dengan minat, karakter, dan target kamu</h2>
                <p>Setiap eskul sudah dilengkapi deskripsi, pembina, tempat, jadwal latihan, serta kategori agar siswa bisa mempertimbangkan pilihan dengan lebih jelas.</p>
            </div>

            <div class="eskul-grid" id="eskulPreviewGrid">

                @foreach ($eskul_list as $eskul)

                    <article class="eskul-mini-card">
                        <div class="eskul-mini-cover" style="background-image: url('{{ $eskul->foto ? asset('uploads/' . $eskul->foto) : '' }}'); background-size: cover; background-position: center;">
                            <span class="cover-chip"><i class="fa-solid fa-star"></i>{{ $eskul->kategori }}</span>
                        </div>
                        <div class="eskul-mini-body">
                            <h3>{{ $eskul->nama_eskul }}</h3>
                            <p class="quote">“{{ $eskul->slogan }}”</p>
                            <p lass="featured-copy">{{ $eskul->deskripsi }}</p>
                            <div class="mini-meta">
                                <span><i class="fa-regular fa-user"></i>{{ $eskul->nama_pembina }}</span>
                                <span><i class="fa-regular fa-clock"></i>{{ $eskul->jadwal }}</span>
                                <span><i class="fa-solid fa-location-dot"></i>{{ $eskul->tempat }}</span>
                            </div>
                            <div class="mini-card-actions">
                                <a href="#pendaftaran" class="mini-cta" data-action="register">Daftar sekarang</a>
                            </div>
                        </div>
                    </article>

                @endforeach
            </div>

            <div class="cta-split">
                <div class="cta-card daftar-eskul">
                    <i class="fa-solid fa-file-circle-plus"></i>
                    <h3>Form pendaftaran langsung</h3>
                    <p>Pilih eskul, isi data diri, tulis alasan bergabung, lalu kirim. Data masuk ke dashboard pengelola dan siap direkap untuk proses tindak lanjut.</p>
                    <a href="#pendaftaran">Buka form pendaftaran</a>
                </div>

                <div class="cta-card tentang-eskul">
                    <i class="fa-solid fa-book-open-reader"></i>
                    <h3>Detail eskul lebih lengkap</h3>
                    <p>Bagian detail menampilkan pembina, tempat latihan, kuota, dan gambaran kegiatan setiap eskul dengan layout yang lebih rapi.</p>
                    <a href="#tentang-detail">Lihat detail eskul</a>
                </div>
            </div>
        </section>

        {{-- <section id="tentang-detail" class="detail-section">
            <div class="section-heading">
                <span class="section-badge">Profil Eskul</span>
                <h2>Detail kegiatan dibuat lebih jelas dan enak dibaca</h2>
                <p>Bagian ini menampilkan rangkuman profil eskul, pembina, jadwal, tempat, dan kuota dengan format yang lebih mudah dibaca oleh siswa.</p>
            </div>

            <div class="detail-layout">
                <article class="featured-article" id="featuredEskul"></article>
                <aside class="article-sidebar" id="eskulArticleGrid"></aside>
            </div>
        </section> --}}

        <section id="pendaftaran" class="registration-section">
            <div class="section-heading center">
                <span class="section-badge">Pendaftaran Eskul</span>
                <h2>Isi formulir dengan data yang dibutuhkan pembina dan pengurus</h2>
                <p>Form di bawah disusun agar siswa dapat mengisi data pendaftaran secara lebih lengkap dan terstruktur sesuai kebutuhan pengelola kegiatan.</p>
            </div>

            <div class="registration-layout">
                <aside class="registration-info glass-panel">
                    <div class="info-stack">
                        <span class="mini-tag">Panduan</span>
                        <h3>Alur pendaftaran</h3>
                        <ol>
                            <li>Pilih eskul yang ingin diikuti.</li>
                            <li>Lengkapi identitas dan alasan bergabung.</li>
                            <li>Jawab pertanyaan tambahan jika memang dibutuhkan oleh pengelola kegiatan.</li>
                            <li>Kirim formulir dan tunggu proses pengecekan dari pengelola kegiatan.</li>
                        </ol>
                    </div>
                    <div class="info-card-list">
                        <article>
                            <strong>Data tersimpan</strong>
                            <p>Nama pendaftar, kelas, kontak, eskul tujuan, alasan, waktu kirim, dan jawaban tambahan tersusun dalam format yang mudah direkap.</p>
                        </article>
                        <article>
                            <strong>Bisa disesuaikan</strong>
                            <p>Pertanyaan tambahan seperti motivasi, pengalaman, izin orang tua, atau kesiapan latihan dapat disesuaikan mengikuti kebutuhan seleksi tiap kegiatan.</p>
                        </article>
                    </div>
                </aside>

                <div class="registration-form-shell glass-panel">
                    <form id="registrationForm" class="registration-form">
                        @csrf

                        <div class="form-group">
                            <label for="namaLengkap">Nama Lengkap</label>
                            <input id="namaLengkap" name="namaLengkap" type="text" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input id="kelas" name="kelas" type="text" placeholder="Contoh: XI PPLG 1" required>
                        </div>

                        <div class="form-group">
                            <label for="kontak">Nomor WhatsApp</label>
                            <input id="kontak" name="kontak" type="number" placeholder="Nomor yang bisa dihubungi" required>
                        </div>

                        <div class="form-group">
                            <label for="eskulTujuan">Pilih Eskul</label>
                            <select id="eskulTujuan" name="eskulTujuan" required>
                                <option value="">Pilih jawaban</option>
                                @foreach($eskul_list as $eskul)
                                    <option value="{{ $eskul->id_eskul }}">{{ $eskul->nama_eskul }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group full">
                            <label for="alasan">Alasan Bergabung</label>
                            <textarea id="alasan" name="alasan" placeholder="Tuliskan alasan kamu memilih eskul ini" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="motivasiLatihan">Kesiapan Mengikuti Latihan</label>
                            <select id="motivasiLatihan" name="motivasiLatihan" required>
                                <option value="">Pilih jawaban</option>
                                <option value="Siap hadir rutin">Siap hadir rutin</option>
                                <option value="Perlu menyesuaikan jadwal">Perlu menyesuaikan jadwal</option>
                                <option value="Masih mempertimbangkan">Masih mempertimbangkan</option>
                            </select>
                        </div>

                        <div class="form-group full">
                            <label for="pengalamanAwal">Pengalaman atau Kemampuan Awal</label>
                            <textarea id="pengalamanAwal" name="pengalamanAwal" placeholder="Jelaskan pengalaman, kemampuan, atau hal yang ingin dikembangkan"></textarea>
                        </div>

                        <div class="submit-row">
                            <button class="submit-btn" type="submit">Kirim Pendaftaran</button>
                            <span>Setelah formulir dikirim, data akan masuk ke dashboard pengelola.</span>
                        </div>
                    </form>
                    <div id="registrationMessage" class="registration-message" aria-live="polite"></div>
                </div>
            </div>
        </section>

        <section id="highlight" class="highlight-section">
            <div class="section-heading center">
                <span class="section-badge">Keunggulan Tampilan</span>
                <h2>Desain dibuat rapi, ringan, dan siap disambungkan ke backend</h2>
            </div>

            <div class="highlight-grid">
                <div class="highlight-card">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    <h3>Visual glassy Frutiger Aero</h3>
                    <p>Nuansa biru, kaca transparan, dan aksen kuning dipakai konsisten dari hero sampai footer supaya identitas halaman terasa utuh.</p>
                </div>
                <div class="highlight-card">
                    <i class="fa-solid fa-list-check"></i>
                    <h3>Data siap dipakai</h3>
                    <p>Isi default sudah diganti ke nama eskul, jadwal, pembina, serta deskripsi yang lebih siap presentasi dan tidak lagi berisi teks dummy.</p>
                </div>
                <div class="highlight-card">
                    <i class="fa-solid fa-laptop-code"></i>
                    <h3>Mudah diintegrasikan</h3>
                    <p>Struktur file tetap sederhana dengan HTML, CSS, dan JavaScript terpisah, sehingga lebih gampang disatukan dengan backend saat hosting.</p>
                </div>
            </div>
        </section>

        <section id="about-project" class="about-section">
            <div class="section-heading center">
                <span class="section-badge">About Us</span>
                <h2>Tentang Conneckat</h2>
                <p>Website ini disusun sebagai media informasi ekstrakurikuler siswa SMKN 1 Katapang dengan fokus pada tampilan yang rapi, navigasi yang mudah dipahami, dan alur pendaftaran yang lebih tertata.</p>
            </div>

            <div class="about-grid">
                <article class="about-main glass-panel">
                    <span class="mini-tag">Profil website</span>
                    <h3>Conneckat</h3>
                    <p>Conneckat dirancang untuk membantu siswa mengenal kegiatan sekolah secara lebih cepat, sekaligus memudahkan pengelola memperbarui informasi eskul dan data pendaftar dalam satu alur kerja yang konsisten.</p>
                    <div class="project-meta">
                        <span><i class="fa-solid fa-location-dot"></i> SMKN 1 Katapang</span>
                        <span><i class="fa-solid fa-diagram-project"></i> Informasi ekstrakurikuler</span>
                        <span><i class="fa-solid fa-cloud-arrow-up"></i> Siap dikembangkan ke hosting</span>
                    </div>
                </article>

                <div class="team-grid">
                    <article class="team-card glass-panel">
                        <small>Project Manager</small>
                        <strong></strong>
                        <p>Mengatur arah pengerjaan, alur tugas, dan sinkronisasi tim.</p>
                    </article>
                    <article class="team-card glass-panel">
                        <small>Front End</small>
                        <strong>Ezar</strong>
                        <p>Mengerjakan tampilan antarmuka, landing page, form, dan panel pengguna.</p>
                    </article>
                    <article class="team-card glass-panel">
                        <small>Back End</small>
                        <strong>Arfa</strong>
                        <p>Menyiapkan logika server, pengolahan data, dan kebutuhan integrasi saat hosting.</p>
                    </article>
                    <article class="team-card glass-panel">
                        <small>Analisis</small>
                        <strong>Iki & Fauzan</strong>
                        <p>Menyusun kebutuhan sistem, alur data, dan gambaran penggunaan aplikasi.</p>
                    </article>
                    <article class="team-card glass-panel wide">
                        <small>Design</small>
                        <strong>Oxa, Ezar, Arfa, Nindri, Rahma</strong>
                        <p>Menyiapkan konsep visual, pemilihan warna, penataan elemen, dan arah estetika project.</p>
                    </article>
                </div>
            </div>
        </section>

        <footer>
            <div class="footer-shell glass-panel">
                <div>
                    <h3>CONNECKAT</h3>
                    <p>Media informasi ekstrakurikuler dan pendaftaran siswa untuk SMKN 1 Katapang.</p>
                </div>
                <div class="footer-mini-links">
                    <a href="#home">Home</a>
                    <a href="#eskul">Eskul</a>
                    <a href="#pendaftaran">Pendaftaran</a>
                    <a href="#about-project">About Us</a>
                </div>
            </div>
        </footer>
    </main>

    <script src="js/index.js"></script>
</body>
</html>
