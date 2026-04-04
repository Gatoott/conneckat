<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Conneckat</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="admin-shell">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <img src="poto/logo.png" alt="Logo Conneckat" onerror="this.style.display='none'">
                <div>
                    <span>CONNECKAT</span>
                    <small>Panel Admin Eskul</small>
                </div>
            </div>

            <nav class="sidebar-menu">
                <div class="menu-label">Navigasi</div>
                <a class="menu-item active" href="#dashboardPreview">
                    <i class="fa-solid fa-grid-2"></i>
                    <span>Data Eskul</span>
                </a>
                <a class="menu-item" href="#formBuilderSection">
                    <i class="fa-solid fa-clipboard-question"></i>
                    <span>Form Pendaftaran</span>
                </a>
                <a class="menu-item" href="#registrantSection">
                    <i class="fa-solid fa-users-viewfinder"></i>
                    <span>Data Pendaftar</span>
                </a>
                <a class="menu-item" href="/">
                    <i class="fa-solid fa-house"></i>
                    <span>Kembali ke Home</span>
                </a>
            </nav>

            <div class="sidebar-bottom">
                <button class="logout-btn" onclick="window.location.href='/'">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Tutup Panel</span>
                </button>
            </div>
        </aside>

        <div class="main">
            <header class="topbar">
                <div>
                    <p class="eyebrow">Panel Pengelolaan</p>
                    <h1 class="topbar-title">Data eskul, form pendaftaran, dan daftar pendaftar</h1>
                </div>
                <div class="topbar-right">
                    <a class="topbar-home" href="/">Lihat Landing Page</a>
                </div>
            </header>

            <main class="content">
                <section class="hero-admin" id="dashboardPreview">
                    <div class="hero-copy">
                        <span class="hero-badge">Admin Workspace</span>
                        <h2>Kelola konten Conneckat dalam satu panel</h2>
                        <p>Panel ini dipakai untuk memperbarui data eskul, menyusun pertanyaan form pendaftaran, dan melihat siapa saja yang sudah mengirim formulir.</p>
                        <div class="hero-points">
                            <span>Data eskul siap edit</span>
                            <span>Pertanyaan bisa ditambah</span>
                            <span>Data pendaftar siap cek</span>
                        </div>
                    </div>
                    <div class="hero-mini-card summary-stack" id="summaryCards"></div>
                </section>

                <div class="divider-line"></div>

                <section class="layout-admin">
                    <div class="panel-main">
                        <div class="section-heading-inline">
                            <div>
                                <p class="eyebrow">Daftar Eskul</p>
                                <h3>Kelola profil kegiatan</h3>
                            </div>
                            <button class="btn-yellow" onclick="openTambahModal()">
                                <i class="fa-solid fa-circle-plus"></i>
                                Tambah Eskul
                            </button>
                        </div>

                        <div class="eskul-grid" id="eskulGrid"></div>
                    </div>

                    <aside class="panel-preview" id="previewLive">
                        <div class="preview-head">
                            <p class="eyebrow">Preview</p>
                            <h3>Tampilan detail di landing page</h3>
                        </div>
                        <div class="preview-article" id="previewArticle"></div>
                    </aside>
                </section>

                <section class="panel-wide" id="formBuilderSection">
                    <div class="section-heading-inline">
                        <div>
                            <p class="eyebrow">Form Pendaftaran</p>
                            <h3>Susun pertanyaan tambahan</h3>
                        </div>
                        <button class="btn-yellow" onclick="openQuestionModal()">
                            <i class="fa-solid fa-plus"></i>
                            Tambah Pertanyaan
                        </button>
                    </div>

                    <div class="question-layout">
                        <div class="question-list" id="questionList"></div>
                        <div class="question-note glass-note">
                            <strong>Catatan penggunaan</strong>
                            <p>Field dasar seperti nama, kelas, kontak, eskul tujuan, dan alasan bergabung selalu tampil di form. Admin dapat menambahkan pertanyaan khusus sesuai kebutuhan seleksi.</p>
                            <ul>
                                <li>Gunakan tipe singkat untuk jawaban pendek.</li>
                                <li>Gunakan paragraf untuk motivasi atau pengalaman.</li>
                                <li>Gunakan pilihan jika jawaban ingin dibatasi.</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <section class="panel-wide" id="registrantSection">
                    <div class="section-heading-inline wide-stack">
                        <div>
                            <p class="eyebrow">Data Pendaftar</p>
                            <h3>Daftar siswa yang sudah mengirim formulir</h3>
                        </div>
                        <div class="toolbar-actions">
                            <select id="filterEskul" class="toolbar-select"></select>
                            <button class="btn-outline" onclick="exportRegistrants()"><i class="fa-solid fa-file-arrow-down"></i> Export CSV</button>
                            <button class="btn-red" onclick="clearAllRegistrants()"><i class="fa-solid fa-trash-can"></i> Hapus Semua</button>
                        </div>
                    </div>

                    <div class="registrant-table-shell">
                        <div class="registrant-table" id="registrantTable"></div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <div class="modal-overlay" id="modalEdit">
        <div class="modal large-modal">
            <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fa-solid fa-xmark"></i></button>
            <h2><i class="fa-solid fa-pen"></i> Edit profil eskul</h2>
            <input type="hidden" id="editId">
            <div class="form-grid-two">
                <div class="form-group">
                    <label>NAMA ESKUL</label>
                    <input type="text" id="editNama" placeholder="Nama eskul">
                </div>
                <div class="form-group">
                    <label>KATEGORI</label>
                    <input type="text" id="editKategori" placeholder="Olahraga / Organisasi / Bahasa / Seni">
                </div>
            </div>
            <div class="form-group">
                <label>SLOGAN</label>
                <input type="text" id="editSlogan" placeholder="Slogan singkat">
            </div>
            <div class="form-group">
                <label>DESKRIPSI</label>
                <textarea id="editDeskripsi" placeholder="Deskripsi kegiatan"></textarea>
            </div>
            <div class="form-grid-two">
                <div class="form-group">
                    <label>PEMBINA</label>
                    <input type="text" id="editPembina" placeholder="Nama pembina">
                </div>
                <div class="form-group">
                    <label>JADWAL</label>
                    <input type="text" id="editJadwal" placeholder="Contoh: Selasa, 15.30 - 17.00 WIB">
                </div>
            </div>
            <div class="form-grid-two">
                <div class="form-group">
                    <label>TEMPAT</label>
                    <input type="text" id="editTempat" placeholder="Lokasi kegiatan">
                </div>
                <div class="form-group">
                    <label>KUOTA</label>
                    <input type="text" id="editKuota" placeholder="Contoh: 30 siswa">
                </div>
            </div>
            <div class="form-group">
                <label>WARNA COVER (CSS GRADIENT)</label>
                <input type="text" id="editCover" placeholder="linear-gradient(135deg, #7ee8ff 0%, #1943b5 100%)">
            </div>
            <div class="modal-footer">
                <button class="btn-outline" onclick="closeModal('modalEdit')">Batal</button>
                <button class="btn-yellow" onclick="simpanEdit()"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modalUpload">
        <div class="modal">
            <button class="modal-close" onclick="closeModal('modalUpload')"><i class="fa-solid fa-xmark"></i></button>
            <h2><i class="fa-solid fa-image"></i> Upload cover eskul</h2>
            <input type="hidden" id="uploadId">
            <div class="form-group">
                <label>PILIH FOTO</label>
                <div class="upload-zona">
                    <input type="file" accept="image/*" id="fileInput" onchange="previewFoto(event)">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <span>Klik atau drop gambar di sini</span>
                    <p>Jika tidak upload foto, landing page tetap memakai cover gradient.</p>
                </div>
                <img id="previewImg" class="preview-img" alt="Preview cover">
            </div>
            <div class="modal-footer">
                <button class="btn-outline" onclick="closeModal('modalUpload')">Batal</button>
                <button class="btn-yellow" onclick="simpanFoto()"><i class="fa-solid fa-floppy-disk"></i> Simpan Foto</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modalTambah">
        <div class="modal large-modal">
            <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fa-solid fa-xmark"></i></button>
            <h2><i class="fa-solid fa-circle-plus"></i> Tambah eskul baru</h2>
            <div class="form-grid-two">
                <div class="form-group">
                    <label>NAMA ESKUL</label>
                    <input type="text" id="tambahNama" placeholder="Nama eskul baru">
                </div>
                <div class="form-group">
                    <label>KATEGORI</label>
                    <input type="text" id="tambahKategori" placeholder="Kategori kegiatan">
                </div>
            </div>
            <div class="form-group">
                <label>SLOGAN</label>
                <input type="text" id="tambahSlogan" placeholder="Slogan singkat">
            </div>
            <div class="form-group">
                <label>DESKRIPSI</label>
                <textarea id="tambahDeskripsi" placeholder="Deskripsi kegiatan"></textarea>
            </div>
            <div class="form-grid-two">
                <div class="form-group">
                    <label>PEMBINA</label>
                    <input type="text" id="tambahPembina" placeholder="Nama pembina">
                </div>
                <div class="form-group">
                    <label>JADWAL</label>
                    <input type="text" id="tambahJadwal" placeholder="Contoh: Jumat, 15.30 - 17.00 WIB">
                </div>
            </div>
            <div class="form-grid-two">
                <div class="form-group">
                    <label>TEMPAT</label>
                    <input type="text" id="tambahTempat" placeholder="Lokasi kegiatan">
                </div>
                <div class="form-group">
                    <label>KUOTA</label>
                    <input type="text" id="tambahKuota" placeholder="Contoh: 25 siswa">
                </div>
            </div>
            <div class="form-group">
                <label>WARNA COVER (CSS GRADIENT)</label>
                <input type="text" id="tambahCover" placeholder="linear-gradient(135deg, #9ee6ff 0%, #0d3289 100%)">
            </div>
            <div class="form-group">
                <label>FOTO COVER (OPSIONAL)</label>
                <div class="upload-zona">
                    <input type="file" accept="image/*" id="tambahFileInput" onchange="previewTambah(event)">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <span>Pilih gambar untuk cover eskul</span>
                    <p>Bisa dikosongkan jika ingin memakai cover gradient.</p>
                </div>
                <img id="previewTambahImg" class="preview-img" alt="Preview cover baru">
            </div>
            <div class="modal-footer">
                <button class="btn-outline" onclick="closeModal('modalTambah')">Batal</button>
                <button class="btn-yellow" onclick="tambahEskul()"><i class="fa-solid fa-circle-plus"></i> Tambah</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modalQuestion">
        <div class="modal">
            <button class="modal-close" onclick="closeModal('modalQuestion')"><i class="fa-solid fa-xmark"></i></button>
            <h2><i class="fa-solid fa-clipboard-question"></i> Tambah pertanyaan form</h2>
            <div class="form-group">
                <label>LABEL PERTANYAAN</label>
                <input type="text" id="questionLabel" placeholder="Contoh: Prestasi yang pernah diikuti">
            </div>
            <div class="form-grid-two">
                <div class="form-group">
                    <label>TIPE INPUT</label>
                    <select id="questionType">
                        <option value="text">Jawaban singkat</option>
                        <option value="textarea">Paragraf</option>
                        <option value="select">Pilihan</option>
                    </select>
                </div>
                <div class="form-group checkbox-group">
                    <label class="inline-check"><input type="checkbox" id="questionRequired" checked> Wajib diisi</label>
                </div>
            </div>
            <div class="form-group">
                <label>PLACEHOLDER</label>
                <input type="text" id="questionPlaceholder" placeholder="Teks bantuan untuk siswa">
            </div>
            <div class="form-group">
                <label>OPSIONAL: PILIHAN JAWABAN</label>
                <textarea id="questionOptions" placeholder="Pisahkan pilihan dengan koma. Contoh: Siap, Masih mempertimbangkan, Belum yakin"></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn-outline" onclick="closeModal('modalQuestion')">Batal</button>
                <button class="btn-yellow" onclick="addQuestion()"><i class="fa-solid fa-plus"></i> Simpan Pertanyaan</button>
            </div>
        </div>
    </div>

    <div class="toast" id="toast">
        <i class="fa-solid fa-circle-check"></i>
        <span id="toastMsg">Tersimpan</span>
    </div>

    <script src="js/admin.js"></script>
</body>
</html>
