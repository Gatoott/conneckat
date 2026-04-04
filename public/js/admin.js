const STORAGE_KEY = 'conneckatEskulDataV2';
const FORM_STORAGE_KEY = 'conneckatRegistrationFieldsV2';
const REGISTRATION_KEY = 'conneckatRegistrationsV2';

const BASE_FORM_FIELDS = [
    { id: 'namaLengkap', label: 'Nama Lengkap', type: 'text', placeholder: 'Masukkan nama lengkap', required: true, full: false, locked: true },
    { id: 'kelas', label: 'Kelas', type: 'text', placeholder: 'Contoh: XI PPLG 1', required: true, full: false, locked: true },
    { id: 'kontak', label: 'Nomor WhatsApp', type: 'text', placeholder: 'Nomor yang bisa dihubungi', required: true, full: false, locked: true },
    { id: 'eskulTujuan', label: 'Pilih Eskul', type: 'select', placeholder: '', required: true, full: false, locked: true },
    { id: 'alasan', label: 'Alasan Bergabung', type: 'textarea', placeholder: 'Tuliskan alasan kamu memilih eskul ini', required: true, full: true, locked: true }
];

const DEFAULT_EXTRA_FIELDS = [
    {
        id: 'motivasiLatihan',
        label: 'Kesiapan Mengikuti Latihan',
        type: 'select',
        placeholder: '',
        required: true,
        options: ['Siap hadir rutin', 'Perlu menyesuaikan jadwal', 'Masih mempertimbangkan'],
        full: false
    },
    {
        id: 'pengalamanAwal',
        label: 'Pengalaman atau Kemampuan Awal',
        type: 'textarea',
        placeholder: 'Jelaskan pengalaman, kemampuan, atau hal yang ingin dikembangkan',
        required: false,
        options: [],
        full: true
    }
];

const DEFAULT_DATA = {
    1: {
        nama: 'Paskibra', kategori: 'Disiplin & Kepemimpinan', slogan: 'Tegap, kompak, dan siap membawa nama sekolah.', deskripsi: 'Paskibra membina kedisiplinan, kepemimpinan, tanggung jawab, dan kekompakan melalui latihan baris-berbaris, tata upacara, serta pembinaan karakter yang terstruktur.', pembina: 'Bpk. Aditya Pratama', jadwal: 'Senin & Kamis, 15.30 - 17.00 WIB', tempat: 'Lapangan utama sekolah', kuota: '32 siswa', cover: 'linear-gradient(135deg, #9fe8ff 0%, #1140a7 100%)', foto: ''
    },
    2: {
        nama: 'Pramuka Juantika', kategori: 'Karakter & Kemandirian', slogan: 'Tangguh di alam, siap di kehidupan.', deskripsi: 'Pramuka Juantika menekankan kemandirian, kerja sama, kepedulian, dan keberanian melalui kegiatan lapangan, perkemahan, tali-temali, penjelajahan, dan pengabdian sosial.', pembina: 'Ibu Siti Rukmini', jadwal: 'Jumat, 14.00 - 17.00 WIB', tempat: 'Lapangan belakang & area kegiatan luar ruang', kuota: '40 siswa', cover: 'linear-gradient(135deg, #ffe899 0%, #1c3f9f 100%)', foto: ''
    },
    3: {
        nama: 'PMR', kategori: 'Kesehatan & Sosial', slogan: 'Sigap menolong, peduli pada sesama.', deskripsi: 'PMR menjadi ruang belajar pertolongan pertama, kesehatan remaja, tanggap darurat, dan aksi sosial agar anggota siap membantu di lingkungan sekolah maupun kegiatan luar.', pembina: 'Ibu Santi Wulandari', jadwal: 'Sabtu, 09.00 - 11.30 WIB', tempat: 'Ruang UKS', kuota: '30 siswa', cover: 'linear-gradient(135deg, #ffc3d3 0%, #cb234d 100%)', foto: ''
    },
    4: {
        nama: 'OSIS', kategori: 'Organisasi', slogan: 'Belajar memimpin, bergerak untuk sekolah.', deskripsi: 'OSIS berfokus pada pengembangan kepemimpinan, pengelolaan program kerja, publikasi kegiatan, dan koordinasi acara sekolah bersama pengurus inti dan bidang-bidang pelaksana.', pembina: 'Bpk. Dedi Firmansyah', jadwal: 'Rabu, 15.30 - 17.30 WIB', tempat: 'Ruang organisasi', kuota: 'Pengurus aktif', cover: 'linear-gradient(135deg, #afffd6 0%, #0d6f5d 100%)', foto: ''
    },
    5: {
        nama: 'MPK', kategori: 'Organisasi', slogan: 'Menjaga arah organisasi dengan suara yang kritis.', deskripsi: 'MPK mengembangkan sikap tanggung jawab, komunikasi formal, dan evaluasi program sekolah melalui peran representasi siswa yang aktif mengawal kegiatan organisasi.', pembina: 'Ibu Rina Marlina', jadwal: 'Kamis, 15.30 - 17.00 WIB', tempat: 'Ruang sidang siswa', kuota: 'Perwakilan kelas', cover: 'linear-gradient(135deg, #cbe2ff 0%, #2349b5 100%)', foto: ''
    },
    6: {
        nama: 'KIR', kategori: 'Akademik', slogan: 'Riset kecil, gagasan besar.', deskripsi: 'KIR mengajak siswa menyusun observasi, eksperimen, karya tulis, dan presentasi ilmiah dengan pembinaan yang fokus pada analisis, data, dan penyusunan argumen.', pembina: 'Ibu Nita Permatasari', jadwal: 'Selasa, 15.30 - 17.00 WIB', tempat: 'Laboratorium komputer', kuota: '25 siswa', cover: 'linear-gradient(135deg, #a9e4ff 0%, #0f3d7d 100%)', foto: ''
    },
    7: {
        nama: 'Basket', kategori: 'Olahraga', slogan: 'Main cepat, solid, dan penuh semangat.', deskripsi: 'Basket melatih teknik dasar, strategi permainan, kebugaran, serta kerja sama tim melalui latihan rutin dan sparing yang terarah.', pembina: 'Bpk. Hendra Kusuma', jadwal: 'Selasa & Jumat, 16.00 - 17.30 WIB', tempat: 'Lapangan basket', kuota: '24 siswa', cover: 'linear-gradient(135deg, #ffd38f 0%, #d26a00 100%)', foto: ''
    },
    8: {
        nama: 'Futsal', kategori: 'Olahraga', slogan: 'Cepat membaca ruang, cepat mengeksekusi peluang.', deskripsi: 'Futsal difokuskan pada teknik dasar, pola permainan, kelincahan, dan kekompakan agar anggota siap mengikuti pertandingan internal maupun luar sekolah.', pembina: 'Bpk. Rahmat Hidayat', jadwal: 'Rabu & Sabtu, 15.45 - 17.30 WIB', tempat: 'Lapangan futsal sekolah', kuota: '28 siswa', cover: 'linear-gradient(135deg, #9fffc9 0%, #0b8f5e 100%)', foto: ''
    },
    9: {
        nama: 'Voli', kategori: 'Olahraga', slogan: 'Servis rapi, komunikasi jalan, tim makin kuat.', deskripsi: 'Ekskul voli melatih passing, servis, smash, komunikasi tim, dan kesiapan pertandingan dengan pembinaan teknik serta fisik secara bertahap.', pembina: 'Ibu Desi Lestari', jadwal: 'Senin & Rabu, 15.30 - 17.00 WIB', tempat: 'Lapangan voli', kuota: '24 siswa', cover: 'linear-gradient(135deg, #d1c1ff 0%, #6747d6 100%)', foto: ''
    },
    10: {
        nama: 'Taekwondo', kategori: 'Olahraga Bela Diri', slogan: 'Disiplin gerak, kuat mental, rapi teknik.', deskripsi: 'Taekwondo membangun disiplin, kepercayaan diri, ketahanan tubuh, serta teknik dasar tendangan dan pola gerakan dengan latihan yang terukur.', pembina: 'Bpk. Aris Nugraha', jadwal: 'Selasa & Kamis, 15.45 - 17.15 WIB', tempat: 'Aula olahraga', kuota: '22 siswa', cover: 'linear-gradient(135deg, #fff2a2 0%, #d97f00 100%)', foto: ''
    },
    11: {
        nama: 'Perisai Diri', kategori: 'Olahraga Bela Diri', slogan: 'Kuat bertahan, tepat bergerak.', deskripsi: 'Perisai Diri menekankan pembinaan teknik bela diri, ketahanan fisik, disiplin, dan etika latihan dalam suasana yang terarah dan aman.', pembina: 'Bpk. Yoga Prabawa', jadwal: 'Jumat, 15.30 - 17.30 WIB', tempat: 'Aula serbaguna', kuota: '24 siswa', cover: 'linear-gradient(135deg, #ffc7da 0%, #9c225e 100%)', foto: ''
    },
    12: {
        nama: 'IPMI (Rohis)', kategori: 'Kerohanian', slogan: 'Belajar, bertumbuh, dan menjaga kebersamaan.', deskripsi: 'IPMI atau Rohis menjadi ruang pembinaan kerohanian, diskusi, kegiatan sosial, dan penguatan karakter religius yang seimbang dengan kehidupan sekolah.', pembina: 'Ibu Nur Aisyah', jadwal: 'Kamis, 15.30 - 17.00 WIB', tempat: 'Mushola sekolah', kuota: '35 siswa', cover: 'linear-gradient(135deg, #d7ffaf 0%, #4b8e1e 100%)', foto: ''
    },
    13: {
        nama: 'Japanese Club', kategori: 'Bahasa & Budaya', slogan: 'Belajar bahasa, budaya, dan ekspresi kreatif.', deskripsi: 'Japanese Club mengajak siswa mempelajari dasar bahasa Jepang, percakapan ringan, budaya populer, presentasi, dan kegiatan tematik secara menyenangkan.', pembina: 'Ibu Putri Ananda', jadwal: 'Senin, 15.30 - 17.00 WIB', tempat: 'Ruang bahasa', kuota: '28 siswa', cover: 'linear-gradient(135deg, #ffd3e6 0%, #ff709e 100%)', foto: ''
    },
    14: {
        nama: 'English Club', kategori: 'Bahasa & Public Speaking', slogan: 'Practice more, speak better.', deskripsi: 'English Club melatih speaking, listening, public speaking, dan vocabulary melalui diskusi, role play, presentasi, serta kegiatan kreatif berbahasa Inggris.', pembina: 'Ibu Wina Kartika', jadwal: 'Rabu, 15.30 - 17.00 WIB', tempat: 'Ruang multimedia', kuota: '30 siswa', cover: 'linear-gradient(135deg, #bce7ff 0%, #2657c7 100%)', foto: ''
    },
    15: {
        nama: 'Liska', kategori: 'Seni', slogan: 'Satu ruang untuk gerak, suara, dan panggung.', deskripsi: 'Liska mewadahi minat seni seperti tari, vokal, penampilan panggung, dan ekspresi kreatif lain dengan latihan yang menyesuaikan agenda sekolah.', pembina: 'Ibu Citra Maharani', jadwal: 'Sabtu, 09.00 - 12.00 WIB', tempat: 'Aula seni', kuota: '35 siswa', cover: 'linear-gradient(135deg, #ffd4aa 0%, #a9396f 100%)', foto: ''
    },
    16: {
        nama: 'Drum Band Darma Prada Parama', kategori: 'Seni Musik', slogan: 'Irama kompak, langkah serempak, penampilan mantap.', deskripsi: 'Drum band melatih ritme, koordinasi barisan, teknik alat musik, serta kesiapan tampil dalam upacara dan event sekolah dengan pembinaan yang disiplin.', pembina: 'Bpk. Fajar Setiawan', jadwal: 'Selasa & Kamis, 15.30 - 17.30 WIB', tempat: 'Lapangan upacara', kuota: '40 siswa', cover: 'linear-gradient(135deg, #ffe7a2 0%, #3556d6 100%)', foto: ''
    },
    17: {
        nama: 'Pakubara', kategori: 'Petualangan & Survival', slogan: 'Berani jelajah, siap belajar dari alam.', deskripsi: 'Pakubara menjadi ruang untuk kegiatan penjelajahan, dasar survival, kepemimpinan lapangan, dan kerja tim melalui aktivitas luar ruang yang terarah.', pembina: 'Bpk. Gilang Maulana', jadwal: 'Sabtu, 07.30 - 11.30 WIB', tempat: 'Area outdoor sekolah & lokasi kegiatan lapangan', kuota: '26 siswa', cover: 'linear-gradient(135deg, #b6ffd3 0%, #0c5a58 100%)', foto: ''
    }
};

let eskulData = {};
let extraFields = [];
let registrations = [];
let nextId = 1;
let currentUploadFile = null;
let tambahFile = null;
let currentPreviewId = 1;

function cloneDefaults() {
    return JSON.parse(JSON.stringify(DEFAULT_DATA));
}

function cloneExtraFields() {
    return JSON.parse(JSON.stringify(DEFAULT_EXTRA_FIELDS));
}

function loadData() {
    try {
        const raw = localStorage.getItem(STORAGE_KEY);
        eskulData = raw ? JSON.parse(raw) : cloneDefaults();
    } catch (err) {
        eskulData = cloneDefaults();
    }
    const ids = Object.keys(eskulData).map(Number);
    nextId = ids.length ? Math.max(...ids) + 1 : 1;
}

function loadExtraFields() {
    try {
        const raw = localStorage.getItem(FORM_STORAGE_KEY);
        extraFields = raw ? JSON.parse(raw) : cloneExtraFields();
    } catch (err) {
        extraFields = cloneExtraFields();
    }
}

function loadRegistrations() {
    try {
        const raw = localStorage.getItem(REGISTRATION_KEY);
        registrations = raw ? JSON.parse(raw) : [];
    } catch (err) {
        registrations = [];
    }
}

function persistData() {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(eskulData));
}

function persistFields() {
    localStorage.setItem(FORM_STORAGE_KEY, JSON.stringify(extraFields));
}

function persistRegistrations() {
    localStorage.setItem(REGISTRATION_KEY, JSON.stringify(registrations));
}

function escapeHtml(text) {
    return String(text || '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
}

function truncate(text, len = 120) {
    const safe = text || '';
    return safe.length > len ? `${safe.slice(0, len).trim()}…` : safe;
}

function makeSlug(text) {
    return String(text || '')
        .toLowerCase()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '') || 'field';
}

function formatDateTime(value) {
    const date = new Date(value);
    if (Number.isNaN(date.getTime())) return '-';
    return new Intl.DateTimeFormat('id-ID', {
        dateStyle: 'medium',
        timeStyle: 'short'
    }).format(date);
}

function defaultCover(index) {
    const palette = [
        'linear-gradient(135deg, #9fe8ff 0%, #1140a7 100%)',
        'linear-gradient(135deg, #ffe899 0%, #1c3f9f 100%)',
        'linear-gradient(135deg, #ffc3d3 0%, #cb234d 100%)',
        'linear-gradient(135deg, #afffd6 0%, #0d6f5d 100%)',
        'linear-gradient(135deg, #cbe2ff 0%, #2349b5 100%)',
        'linear-gradient(135deg, #ffd3e6 0%, #a9396f 100%)'
    ];
    return palette[index % palette.length];
}

function getItems() {
    return Object.keys(eskulData).map(Number).sort((a, b) => a - b).map((id) => ({ id, ...eskulData[id] }));
}

function coverStyle(item) {
    const baseGradient = item.cover || defaultCover(item.id || 0);
    if (item.foto) {
        return `background-image: linear-gradient(180deg, rgba(4,15,48,0.10), rgba(4,15,48,0.50)), url('${item.foto}')`;
    }
    return `background-image: ${baseGradient}`;
}

function getFieldMap() {
    const allFields = [...BASE_FORM_FIELDS, ...extraFields];
    return allFields.reduce((acc, field) => {
        acc[field.id] = field.label;
        return acc;
    }, {});
}

function renderSummaryCards() {
    const summary = document.getElementById('summaryCards');
    if (!summary) return;
    const items = getItems();
    const latest = registrations[0] ? formatDateTime(registrations[0].submittedAt) : 'Belum ada pendaftaran';
    summary.innerHTML = `
        <div class="summary-card">
            <small>Total Eskul</small>
            <strong>${items.length}</strong>
            <div class="summary-list"><span class="summary-pill">Data kegiatan aktif</span></div>
        </div>
        <div class="summary-card">
            <small>Pertanyaan Form</small>
            <strong>${BASE_FORM_FIELDS.length + extraFields.length}</strong>
            <div class="summary-list"><span class="summary-pill">${extraFields.length} pertanyaan tambahan</span></div>
        </div>
        <div class="summary-card">
            <small>Pendaftar Masuk</small>
            <strong>${registrations.length}</strong>
            <div class="summary-list"><span class="summary-pill">Terakhir: ${escapeHtml(latest)}</span></div>
        </div>
    `;
}

function renderEskulCards() {
    const grid = document.getElementById('eskulGrid');
    if (!grid) return;
    const items = getItems();
    grid.innerHTML = items.map((item) => `
        <div class="eskul-card" data-id="${item.id}">
            <div class="card-media">
                <div class="card-cover-art" style="${coverStyle(item)}">
                    <div class="card-cover-overlay">
                        <div class="cover-badges">
                            <span><i class="fa-solid fa-layer-group"></i> ${escapeHtml(item.kategori || 'Eskul')}</span>
                            <span><i class="fa-solid fa-users"></i> ${escapeHtml(item.kuota || '-')}</span>
                        </div>
                        <strong>${escapeHtml(item.nama)}</strong>
                    </div>
                </div>
                <button class="quick-preview" onclick="setPreview(${item.id})"><i class="fa-solid fa-eye"></i> Preview</button>
            </div>
            <div class="card-body">
                <div class="card-category">${escapeHtml(item.kategori || 'Kegiatan')}</div>
                <div class="card-eskul-name">${escapeHtml(item.nama)}</div>
                <div class="card-slogan">“${escapeHtml(item.slogan || '')}”</div>
                <div class="card-deskripsi">${escapeHtml(truncate(item.deskripsi || ''))}</div>
                <div class="meta-row">
                    <span><i class="fa-regular fa-user"></i> ${escapeHtml(item.pembina || '-')}</span>
                    <span><i class="fa-regular fa-clock"></i> ${escapeHtml(item.jadwal || '-')}</span>
                    <span><i class="fa-solid fa-location-dot"></i> ${escapeHtml(item.tempat || '-')}</span>
                </div>
                <div class="card-actions">
                    <button class="btn-yellow" onclick="openEditModal(${item.id})"><i class="fa-solid fa-pen"></i> Edit</button>
                    <button class="btn-outline" onclick="openUploadModal(${item.id})"><i class="fa-solid fa-image"></i> Cover</button>
                    <button class="btn-red" onclick="hapusEskul(${item.id})"><i class="fa-solid fa-trash"></i></button>
                </div>
            </div>
        </div>
    `).join('') + `
        <div class="add-card" onclick="openTambahModal()">
            <i class="fa-solid fa-circle-plus"></i>
            <span>Tambah eskul baru</span>
            <small>Tambahkan kegiatan beserta jadwal, pembina, dan deskripsinya.</small>
        </div>
    `;
}

function setPreview(id) {
    currentPreviewId = id;
    const item = eskulData[id];
    const article = document.getElementById('previewArticle');
    if (!item || !article) return;
    article.innerHTML = `
        <div class="preview-cover" style="${coverStyle(item)}">
            <div class="preview-cover-overlay">
                <div class="cover-badges">
                    <span><i class="fa-solid fa-layer-group"></i> ${escapeHtml(item.kategori || 'Eskul')}</span>
                    <span><i class="fa-solid fa-users"></i> ${escapeHtml(item.kuota || '-')}</span>
                </div>
                <strong>${escapeHtml(item.nama)}</strong>
            </div>
        </div>
        <div class="preview-body">
            <span class="hero-badge">Preview Landing</span>
            <h4>${escapeHtml(item.nama)}</h4>
            <p class="preview-slogan">“${escapeHtml(item.slogan || '')}”</p>
            <p>${escapeHtml(item.deskripsi || '')}</p>
            <div class="preview-info">
                <span><i class="fa-regular fa-user"></i> ${escapeHtml(item.pembina || '-')}</span>
                <span><i class="fa-regular fa-clock"></i> ${escapeHtml(item.jadwal || '-')}</span>
                <span><i class="fa-solid fa-location-dot"></i> ${escapeHtml(item.tempat || '-')}</span>
                <span><i class="fa-solid fa-users"></i> ${escapeHtml(item.kuota || '-')}</span>
            </div>
        </div>`;
}

function renderQuestionList() {
    const list = document.getElementById('questionList');
    if (!list) return;
    const fixedHtml = BASE_FORM_FIELDS.map((field) => `
        <div class="question-item">
            <div class="question-badges">
                <span><i class="fa-solid fa-lock"></i> Field dasar</span>
                <span><i class="fa-solid fa-input-text"></i> ${escapeHtml(field.type)}</span>
                <span><i class="fa-solid fa-circle-check"></i> ${field.required ? 'Wajib' : 'Opsional'}</span>
            </div>
            <h4>${escapeHtml(field.label)}</h4>
            <p class="question-helper">${escapeHtml(field.placeholder || 'Field ini selalu ditampilkan pada form pendaftaran.')}</p>
        </div>
    `).join('');

    const customHtml = extraFields.length ? extraFields.map((field, index) => `
        <div class="question-item">
            <div class="question-badges">
                <span><i class="fa-solid fa-pen-ruler"></i> Tambahan</span>
                <span><i class="fa-solid fa-input-text"></i> ${escapeHtml(field.type)}</span>
                <span><i class="fa-solid fa-circle-check"></i> ${field.required ? 'Wajib' : 'Opsional'}</span>
            </div>
            <h4>${escapeHtml(field.label)}</h4>
            <p class="question-helper">${escapeHtml(field.placeholder || 'Pertanyaan tambahan tanpa placeholder.')}</p>
            ${field.options && field.options.length ? `<p class="question-helper">Pilihan: ${escapeHtml(field.options.join(', '))}</p>` : ''}
            <div class="card-actions">
                <button class="btn-red" onclick="removeQuestion(${index})"><i class="fa-solid fa-trash"></i> Hapus</button>
            </div>
        </div>
    `).join('') : '<div class="empty-block">Belum ada pertanyaan tambahan. Tambah pertanyaan dari tombol di atas.</div>';

    list.innerHTML = fixedHtml + customHtml;
}

function renderFilterOptions() {
    const select = document.getElementById('filterEskul');
    if (!select) return;
    const options = getItems().map((item) => `<option value="${escapeHtml(item.nama)}">${escapeHtml(item.nama)}</option>`).join('');
    select.innerHTML = `<option value="">Semua eskul</option>${options}`;
    select.onchange = renderRegistrantTable;
}

function renderRegistrantTable() {
    const holder = document.getElementById('registrantTable');
    const filter = document.getElementById('filterEskul');
    if (!holder) return;
    const fieldMap = getFieldMap();
    const currentFilter = filter ? filter.value : '';
    const filtered = registrations.filter((item) => !currentFilter || item.eskul === currentFilter);

    if (!filtered.length) {
        holder.innerHTML = '<div class="empty-block">Belum ada data pendaftar untuk filter ini.</div>';
        return;
    }

    holder.innerHTML = filtered.map((entry, index) => {
        const answers = Object.entries(entry.answers || {}).map(([key, value]) => `
            <div class="registration-answer-box">
                <small>${escapeHtml(fieldMap[key] || key)}</small>
                <div class="answer-row"><span>${escapeHtml(value || '-')}</span></div>
            </div>
        `).join('');

        return `
            <div class="table-card">
                <div class="table-head">
                    <div>
                        <strong>${escapeHtml(entry.answers?.namaLengkap || 'Pendaftar')}</strong>
                        <div class="table-badges">
                            <span><i class="fa-solid fa-layer-group"></i> ${escapeHtml(entry.eskul || '-')}</span>
                            <span><i class="fa-regular fa-clock"></i> ${escapeHtml(formatDateTime(entry.submittedAt))}</span>
                        </div>
                    </div>
                    <div class="table-actions">
                        <button class="btn-red" onclick="deleteRegistrant('${escapeHtml(entry.id)}')"><i class="fa-solid fa-trash"></i> Hapus</button>
                    </div>
                </div>
                <div class="table-meta">
                    <span><i class="fa-solid fa-user-graduate"></i> ${escapeHtml(entry.answers?.kelas || '-')}</span>
                    <span><i class="fa-brands fa-whatsapp"></i> ${escapeHtml(entry.answers?.kontak || '-')}</span>
                </div>
                <div class="answer-grid">${answers}</div>
            </div>
        `;
    }).join('');
}

function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

function openEditModal(id) {
    const item = eskulData[id];
    if (!item) return;
    document.getElementById('editId').value = id;
    document.getElementById('editNama').value = item.nama || '';
    document.getElementById('editKategori').value = item.kategori || '';
    document.getElementById('editSlogan').value = item.slogan || '';
    document.getElementById('editDeskripsi').value = item.deskripsi || '';
    document.getElementById('editPembina').value = item.pembina || '';
    document.getElementById('editJadwal').value = item.jadwal || '';
    document.getElementById('editTempat').value = item.tempat || '';
    document.getElementById('editKuota').value = item.kuota || '';
    document.getElementById('editCover').value = item.cover || '';
    document.getElementById('modalEdit').classList.add('show');
}

function openUploadModal(id) {
    document.getElementById('uploadId').value = id;
    document.getElementById('fileInput').value = '';
    document.getElementById('previewImg').style.display = 'none';
    currentUploadFile = null;
    document.getElementById('modalUpload').classList.add('show');
}

function openTambahModal() {
    document.getElementById('tambahNama').value = '';
    document.getElementById('tambahKategori').value = '';
    document.getElementById('tambahSlogan').value = '';
    document.getElementById('tambahDeskripsi').value = '';
    document.getElementById('tambahPembina').value = '';
    document.getElementById('tambahJadwal').value = '';
    document.getElementById('tambahTempat').value = '';
    document.getElementById('tambahFileInput').value = '';
    document.getElementById('previewTambahImg').style.display = 'none';
    tambahFile = null;
    document.getElementById('modalTambah').classList.add('show');
}

function openQuestionModal() {
    document.getElementById('modalQuestion').classList.add('show');
}

function closeModal(id) {
    document.getElementById(id).classList.remove('show');
}

document.querySelectorAll('.modal-overlay').forEach((el) => {
    el.addEventListener('click', function (e) {
        if (e.target === this) this.classList.remove('show');
    });
});

function simpanEdit() {
    const id = document.getElementById('editId').value;
    const nama = document.getElementById('editNama').value.trim();
    if (!nama) { showToast('Nama eskul tidak boleh kosong.'); return; }

    Object.assign(eskulData[id], {
        nama,
        kategori: document.getElementById('editKategori').value.trim(),
        slogan: document.getElementById('editSlogan').value.trim(),
        deskripsi: document.getElementById('editDeskripsi').value.trim(),
        pembina: document.getElementById('editPembina').value.trim(),
        jadwal: document.getElementById('editJadwal').value.trim(),
        tempat: document.getElementById('editTempat').value.trim(),
        kuota: document.getElementById('editKuota').value.trim(),
        cover: document.getElementById('editCover').value.trim() || defaultCover(Number(id))
    });

    persistData();
    rerenderAll();
    setPreview(Number(id));
    closeModal('modalEdit');
    showToast('Profil eskul berhasil diperbarui.');
}

function previewFoto(e) {
    const file = e.target.files[0];
    if (!file) return;
    currentUploadFile = file;
    const reader = new FileReader();
    reader.onload = (ev) => {
        const img = document.getElementById('previewImg');
        img.src = ev.target.result;
        img.style.display = 'block';
    };
    reader.readAsDataURL(file);
}

function previewTambah(e) {
    const file = e.target.files[0];
    if (!file) return;
    tambahFile = file;
    const reader = new FileReader();
    reader.onload = (ev) => {
        const img = document.getElementById('previewTambahImg');
        img.src = ev.target.result;
        img.style.display = 'block';
    };
    reader.readAsDataURL(file);
}

function simpanFoto() {
    const id = document.getElementById('uploadId').value;
    if (!currentUploadFile) { showToast('Pilih gambar terlebih dahulu.'); return; }
    const reader = new FileReader();
    reader.onload = (ev) => {
        eskulData[id].foto = ev.target.result;
        persistData();
        rerenderAll();
        setPreview(Number(id));
        closeModal('modalUpload');
        showToast('Cover eskul berhasil diperbarui.');
    };
    reader.readAsDataURL(currentUploadFile);
}

function tambahEskul() {
    const nama = document.getElementById('tambahNama').value.trim();
    if (!nama) { showToast('Nama eskul tidak boleh kosong.'); return; }

    const id = nextId++;
    eskulData[id] = {
        nama,
        kategori: document.getElementById('tambahKategori').value.trim(),
        slogan: document.getElementById('tambahSlogan').value.trim(),
        deskripsi: document.getElementById('tambahDeskripsi').value.trim(),
        pembina: document.getElementById('tambahPembina').value.trim(),
        jadwal: document.getElementById('tambahJadwal').value.trim(),
        tempat: document.getElementById('tambahTempat').value.trim(),
        kuota: document.getElementById('tambahKuota').value.trim(),
        cover: document.getElementById('tambahCover').value.trim() || defaultCover(id),
        foto: ''
    };

    const finish = () => {
        persistData();
        rerenderAll();
        setPreview(id);
        closeModal('modalTambah');
        showToast('Eskul baru berhasil ditambahkan.');
    };

    if (tambahFile) {
        const reader = new FileReader();
        reader.onload = (ev) => {
            eskulData[id].foto = ev.target.result;
            finish();
        };
        reader.readAsDataURL(tambahFile);
        return;
    }

    finish();
}

function hapusEskul(id) {
    const item = eskulData[id];
    if (!item) return;
    if (!confirm(`Hapus eskul ${item.nama}?`)) return;
    delete eskulData[id];
    persistData();
    rerenderAll();
    const firstId = Object.keys(eskulData).map(Number).sort((a, b) => a - b)[0];
    if (firstId) setPreview(firstId);
    else document.getElementById('previewArticle').innerHTML = '<div class="empty-block">Belum ada data eskul.</div>';
    showToast('Eskul berhasil dihapus.');
}

function addQuestion() {
    const label = document.getElementById('questionLabel').value.trim();
    const type = document.getElementById('questionType').value;
    const placeholder = document.getElementById('questionPlaceholder').value.trim();
    const required = document.getElementById('questionRequired').checked;
    const optionsRaw = document.getElementById('questionOptions').value.trim();

    if (!label) { showToast('Label pertanyaan tidak boleh kosong.'); return; }

    const field = {
        id: `${makeSlug(label)}-${Date.now()}`,
        label,
        type,
        placeholder,
        required,
        full: type === 'textarea',
        options: type === 'select' ? optionsRaw.split(',').map((item) => item.trim()).filter(Boolean) : []
    };

    if (type === 'select' && !field.options.length) {
        showToast('Tipe pilihan memerlukan daftar opsi.');
        return;
    }

    extraFields.push(field);
    persistFields();
    renderSummaryCards();
    renderQuestionList();
    closeModal('modalQuestion');
    showToast('Pertanyaan baru berhasil ditambahkan.');
}

function removeQuestion(index) {
    if (!confirm('Hapus pertanyaan ini dari form pendaftaran?')) return;
    extraFields.splice(index, 1);
    persistFields();
    renderSummaryCards();
    renderQuestionList();
    showToast('Pertanyaan berhasil dihapus.');
}

function deleteRegistrant(id) {
    if (!confirm('Hapus data pendaftar ini?')) return;
    registrations = registrations.filter((item) => item.id !== id);
    persistRegistrations();
    renderSummaryCards();
    renderRegistrantTable();
    showToast('Data pendaftar berhasil dihapus.');
}

function clearAllRegistrants() {
    if (!registrations.length) {
        showToast('Belum ada data pendaftar untuk dihapus.');
        return;
    }
    if (!confirm('Hapus seluruh data pendaftar?')) return;
    registrations = [];
    persistRegistrations();
    renderSummaryCards();
    renderRegistrantTable();
    showToast('Semua data pendaftar telah dihapus.');
}

function csvEscape(value) {
    const safe = String(value ?? '');
    return `"${safe.replace(/"/g, '""')}"`;
}

function exportRegistrants() {
    if (!registrations.length) {
        showToast('Belum ada data pendaftar untuk diexport.');
        return;
    }
    const fieldMap = getFieldMap();
    const answerKeys = Array.from(new Set(registrations.flatMap((item) => Object.keys(item.answers || {}))));
    const header = ['id', 'submittedAt', 'eskul', ...answerKeys.map((key) => fieldMap[key] || key)];
    const rows = registrations.map((entry) => {
        const answerCols = answerKeys.map((key) => csvEscape(entry.answers?.[key] || ''));
        return [csvEscape(entry.id), csvEscape(entry.submittedAt), csvEscape(entry.eskul || ''), ...answerCols].join(',');
    });
    const csv = [header.map(csvEscape).join(','), ...rows].join('\n');
    const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = 'conneckat_pendaftar.csv';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    URL.revokeObjectURL(url);
    showToast('Data pendaftar berhasil diexport ke CSV.');
}

function showToast(msg) {
    const toast = document.getElementById('toast');
    document.getElementById('toastMsg').textContent = msg;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 2800);
}

function rerenderAll() {
    loadData();
    loadExtraFields();
    loadRegistrations();
    renderSummaryCards();
    renderEskulCards();
    renderQuestionList();
    renderFilterOptions();
    renderRegistrantTable();
}

loadData();
loadExtraFields();
loadRegistrations();
renderSummaryCards();
renderEskulCards();
renderQuestionList();
renderFilterOptions();
renderRegistrantTable();

const firstId = Object.keys(eskulData).map(Number).sort((a, b) => a - b)[0];
if (firstId) setPreview(firstId);
