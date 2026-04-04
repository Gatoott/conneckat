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
                @if ($role == 'admin')
                    <a class="menu-item" href="#pembina">
                        <i class="fa-solid fa-users-viewfinder"></i>
                        <span>Data Pembina</span>
                    </a>
                @endif
                <a class="menu-item" href="#registrantSection">
                    <i class="fa-solid fa-users-viewfinder"></i>
                    <span>Data Pendaftar</span>
                </a>
                <a class="menu-item" href="/">
                    <i class="fa-solid fa-house"></i>
                    <span>Kembali ke Home</span>
                </a>
            </nav>

            @if ($role == 'admin')
                <button class="menu-item" onclick="openTambahModal()" style="background: transparent">
                    <i class="fa-solid fa-circle-plus"></i>
                    <span>Tambah Eskul</span>
                </button>
            @endif
            
            <div class="sidebar-bottom">
                <button class="logout-btn" onclick="window.location.href='/'">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Tutup Panel</span>
                </button>
            </div>

        </aside>

        <div class="main">
            {{-- <header class="topbar">
                <div>
                    <p class="eyebrow">Panel Pengelolaan</p>
                    <h1 class="topbar-title">Data eskul, form pendaftaran, dan daftar pendaftar</h1>
                </div>
                <div class="topbar-right">
                    <a class="topbar-home" href="/">Lihat Landing Page</a>
                </div>
            </header> --}}

            <main class="content">
                <section class="hero-admin" id="dashboardPreview">
                    <div class="hero-copy">
                        <span class="hero-badge">Admin Workspace</span>
                        <h2>Selamat datang di Dashboard</h2>
                        <p>Panel ini dipakai untuk melihat siapa saja yang sudah mengirim formulir pendaftaran eskul.</p>
                        <div class="hero-points">
                            {{-- <span>Data eskul siap edit</span>
                            <span>Pertanyaan bisa ditambah</span>
                            <span>Data pendaftar siap cek</span> --}}
                        </div>
                    </div>
                    {{-- <div class="hero-mini-card summary-stack" id="summaryCards"></div> --}}
                </section>

                <div class="eskul-grid">

                    @foreach ($eskul as $item)
                        <div class="eskul-card">
                            <div class="card-media">
                                <div class="card-cover-art" style="background-image: url('{{ $item->foto ? asset('uploads/' . $item->foto) : '' }}'); background-size: cover; background-position: center;">
                                    <div class="card-cover-overlay">
                                        <div class="cover-badges">
                                            <span><i class="fa-solid fa-layer-group"></i> {{ $item->kategori }}</span>
                                        </div>
                                        <strong>{{ $item->nama_eskul }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-category">{{ $item->kategori }}</div>
                                <div class="card-eskul-name">{{ $item->nama_eskul }}</div>
                                <div class="card-slogan">“{{ $item->slogan }}”</div>
                                <div class="card-deskripsi">{{ $item->deskripsi }}</div>
                                <div class="meta-row">
                                    <span><i class="fa-regular fa-user"></i> {{ $item->nama_pembina }}</span>
                                    <span><i class="fa-regular fa-clock"></i>{{ $item->jadwal }}</span>
                                    <span><i class="fa-solid fa-location-dot"></i> {{ $item->tempat }}</span>
                                </div>
                                <div class="card-actions">
                                    <button class="btn-yellow" onclick="openEditModal(${item.id})"><i class="fa-solid fa-pen"></i> Edit</button>
                                    <button class="btn-red"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    
                </div>

                <section class="panel-wide" id="pembina">
                    <div class="section-heading-inline wide-stack">
                        <div>
                            <p class="eyebrow">Data Pembina</p>
                            <h3>Daftar Pembina Eskul</h3>
                        </div>
                        <div class="toolbar-actions">
                            {{-- <select id="filterEskul" class="toolbar-select"></select> --}}
                            {{-- <button class="btn-outline" onclick="exportRegistrants()"><i class="fa-solid fa-file-arrow-down"></i> Export CSV</button> --}}
                            <button class="btn-red" onclick="openQuestionModal()"><i class="fa-solid fa-plus"></i> Buat Akun Pembina </button>
                        </div>
                    </div>

                    <div class="registrant-table-shell">
                        <div class="reg-table-outer">
                            <div class="reg-table-wrap">
                                <table class="reg-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Eskul</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pembina as $item)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td>{{ $item->nama_eskul ?? 'Belum dipilih' }}</td>
                                                <td>
                                                    <form action="" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn-red"><i class="fa-solid fa-trash-can"></i></button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @empty
                                            <td colspan="9" style="text-align: center">Belum ada pendaftar</td>
                                        @endforelse
                                        
                                    </tbody>
                                </table>
                            </div>
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
                            {{-- <select id="filterEskul" class="toolbar-select"></select> --}}
                            {{-- <button class="btn-outline" onclick="exportRegistrants()"><i class="fa-solid fa-file-arrow-down"></i> Export CSV</button>
                            <button class="btn-red" onclick="clearAllRegistrants()"><i class="fa-solid fa-trash-can"></i> Hapus Semua</button> --}}
                        </div>
                    </div>

                    <div class="registrant-table-shell">
                        <div class="reg-table-outer">
                            <div class="reg-table-wrap">
                                <table class="reg-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>WhatsApp</th>
                                            <th>Eskul</th>
                                            <th>Waktu Daftar</th>
                                            <th>Alasan</th>
                                            <th>Kesiapan</th>
                                            <th>Pengalaman</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pendaftar as $siswa)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong>{{ $siswa->nama_siswa }}</strong></td>
                                                <td><span class="reg-muted">{{ $siswa->nama_kelas }}</span></td>
                                                <td><span class="reg-muted">{{ $siswa->no_wa }}</span></td>
                                                <td><span class="reg-badge"><i class="fa-solid fa-layer-group"></i>{{ $siswa->nama_eskul }}</span></td>
                                                <td><span class="reg-muted">{{ $siswa->crated_at }}</span></td>
                                                <td><span class="reg-answer">{{ $siswa->alasan }}</span></td>
                                                <td><span class="reg-muted">{{ $siswa->kesiapan }}</span></td>
                                                <td><span class="reg-answer">{{ $siswa->pengalaman }}</span></td>
                                                <td><button class="reg-btn-del"><i class="fa-solid fa-trash"></i> Hapus</button></td>
                                            </tr>

                                        @empty
                                            <td colspan="9" style="text-align: center">Belum ada pendaftar</td>
                                        @endforelse
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

    {{-- TAMBAH ESKUL --}}

    @if(session('berhasil'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast('{{ session('berhasil') }}');
            });
        </script>
    @endif

    @if(session('gagal'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast_error('{{ session('gagal') }}');
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            showToast_error(@json($errors->first()), 'error');
        });
        </script>
    @endif



    <div class="modal-overlay" id="modalTambah" >
        <form class="modal large-modal" action="/eskul" method="POST" enctype="multipart/form-data">
            @csrf
            <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fa-solid fa-xmark"></i></button>
            <h2><i class="fa-solid fa-circle-plus"></i> Tambah eskul baru</h2>
            <div class="form-grid-two">
                <div class="form-group">
                    <label>NAMA ESKUL</label>
                    <input type="text" id="tambahNama" name="nama_eskul" placeholder="Nama eskul baru" value="{{ old('nama_eskul') }}">
                </div>
                <div class="form-group">
                    <label>KATEGORI</label>
                    <input type="text" id="tambahKategori" name="kategori" placeholder="Kategori kegiatan" value="{{ old('kategori') }}"> 
                </div>
            </div>
            <div class="form-group">
                <label>SLOGAN</label>
                <input type="text" id="tambahSlogan" name="slogan" placeholder="Slogan singkat" value="{{ old('slogan') }}">
            </div>
            <div class="form-group">
                <label>DESKRIPSI</label>
                <textarea id="tambahDeskripsi" name="deskripsi" placeholder="Deskripsi kegiatan" value="{{ old('deskripsi') }}"></textarea>
            </div>
            <div class="form-grid-two">
                <div class="form-group">
                    <label>PEMBINA</label>
                    <input type="text" id="tambahPembina" name="nama_pembina" placeholder="Nama pembina" value="{{ old('nama_pembina') }}">
                </div>
                <div class="form-group">
                    <label>JADWAL</label>
                    <input type="text" id="tambahJadwal" name="jadwal" placeholder="Contoh: Jumat, 15.30 - 17.00 WIB" value="{{ old('jadwal') }}">
                </div>
            </div>
            <div class="form-grid-two">
                <div class="form-group">
                    <label>TEMPAT</label>
                    <input type="text" id="tambahTempat" name="tempat" placeholder="Lokasi kegiatan" value="{{ old('tempat') }}">
                </div>
                <div class="form-group">
                    <label>AKUN PEMBINA</label>
                    <select name="id_pemegang">
                        <option selected disabled>--Pilih Akun Pembina--</option>
                        @foreach ($pembina as $item)
                            <option value="{{ $item->id_user }}">{{ $item->username }}</option> 
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label>FOTO COVER</label>
                <div class="upload-zona">
                    <input type="file" accept="image/*" id="tambahFileInput" onchange="previewTambah(event)" name="foto">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <span>Pilih gambar untuk cover eskul</span>
                </div>
                <img id="previewTambahImg" class="preview-img" alt="Preview cover baru">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-outline" onclick="closeModal('modalTambah')">Batal</button>
                <button type="submit" class="btn-yellow"><i class="fa-solid fa-circle-plus"></i> Tambah</button>
            </div>
        </form>
    </div>

    <div class="modal-overlay" id="modalQuestion">
        <form action="/pembina" method="POST" class="modal">
            @csrf
            <button type="button" class="modal-close" onclick="closeModal('modalQuestion')"><i class="fa-solid fa-xmark"></i></button>
            <h2><i class="fa-solid fa-user"></i> Buat akun pembina</h2>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Contoh: Prestasi yang pernah diikuti">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" placeholder="Teks bantuan untuk siswa">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-outline" onclick="closeModal('modalQuestion')">Batal</button>
                <button type="submit" class="btn-yellow"><i class="fa-solid fa-plus"></i> Buat Akun Pembina</button>
            </div>
        </form>
    </div>

    <div class="toast" id="toast">
        <i class="fa-solid fa-circle-check"></i>
        <span id="toastMsg">Tersimpan</span>
    </div>

    <div class="toast error" id="toast_error">
        <i class="fa-solid fa-circle-xmark"></i>
        <span id="toastMsg_error">Error</span>
    </div>

    <script src="js/admin.js"></script>
</body>
</html>
