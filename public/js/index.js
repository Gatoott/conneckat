function showRegister(){
    const login = document.getElementById('loginForm');
    const register = document.getElementById('registrasiForm');
    const loginSwitch = document.getElementById('loginSwitch');
    const registerSwitch = document.getElementById('registerSwitch');
    if (login && register) {
        login.style.display = 'none';
        register.style.display = 'flex';
    }
    if (loginSwitch && registerSwitch) {
        loginSwitch.classList.remove('active');
        registerSwitch.classList.add('active');
    }
}

function showLogin(){
    const login = document.getElementById('loginForm');
    const register = document.getElementById('registrasiForm');
    const loginSwitch = document.getElementById('loginSwitch');
    const registerSwitch = document.getElementById('registerSwitch');
    if (login && register) {
        register.style.display = 'none';
        login.style.display = 'flex';
    }
    if (loginSwitch && registerSwitch) {
        registerSwitch.classList.remove('active');
        loginSwitch.classList.add('active');
    }
}

function togglePassword(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (!passwordInput || !icon) return;

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('bxs-lock');
        icon.classList.add('bxs-show');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('bxs-show');
        icon.classList.add('bxs-lock');
    }
}

// (function () {
//     const STORAGE_KEY = 'conneckatEskulDataV2';
//     const FORM_STORAGE_KEY = 'conneckatRegistrationFieldsV2';
//     const REGISTRATION_KEY = 'conneckatRegistrationsV2';

//     const BASE_FORM_FIELDS = [
//         { id: 'namaLengkap', label: 'Nama Lengkap', type: 'text', placeholder: 'Masukkan nama lengkap', required: true, full: false },
//         { id: 'kelas', label: 'Kelas', type: 'text', placeholder: 'Contoh: XI PPLG 1', required: true, full: false },
//         { id: 'kontak', label: 'Nomor WhatsApp', type: 'text', placeholder: 'Nomor yang bisa dihubungi', required: true, full: false },
//         { id: 'eskulTujuan', label: 'Pilih Eskul', type: 'select', placeholder: '', required: true, full: false },
//         { id: 'alasan', label: 'Alasan Bergabung', type: 'textarea', placeholder: 'Tuliskan alasan kamu memilih eskul ini', required: true, full: true }
//     ];

//     const DEFAULT_EXTRA_FIELDS = [
//         {
//             id: 'motivasiLatihan',
//             label: 'Kesiapan Mengikuti Latihan',
//             type: 'select',
//             placeholder: '',
//             required: true,
//             options: ['Siap hadir rutin', 'Perlu menyesuaikan jadwal', 'Masih mempertimbangkan'],
//             full: false
//         },
//         {
//             id: 'pengalamanAwal',
//             label: 'Pengalaman atau Kemampuan Awal',
//             type: 'textarea',
//             placeholder: 'Jelaskan pengalaman, kemampuan, atau hal yang ingin dikembangkan',
//             required: false,
//             full: true
//         }
//     ];

//     const DEFAULT_DATA = {
//         1: {
//             nama: 'Paskibra',
//             kategori: 'Disiplin & Kepemimpinan',
//             slogan: 'Tegap, kompak, dan siap membawa nama sekolah.',
//             deskripsi: 'Paskibra membina kedisiplinan, kepemimpinan, tanggung jawab, dan kekompakan melalui latihan baris-berbaris, tata upacara, serta pembinaan karakter yang terstruktur.',
//             pembina: 'Bpk. Aditya Pratama',
//             jadwal: 'Senin & Kamis, 15.30 - 17.00 WIB',
//             tempat: 'Lapangan utama sekolah',
//             kuota: '32 siswa',
//             cover: 'linear-gradient(135deg, #9fe8ff 0%, #1140a7 100%)',
//             foto: ''
//         },
//         2: {
//             nama: 'Pramuka Juantika',
//             kategori: 'Karakter & Kemandirian',
//             slogan: 'Tangguh di alam, siap di kehidupan.',
//             deskripsi: 'Pramuka Juantika menekankan kemandirian, kerja sama, kepedulian, dan keberanian melalui kegiatan lapangan, perkemahan, tali-temali, penjelajahan, dan pengabdian sosial.',
//             pembina: 'Ibu Siti Rukmini',
//             jadwal: 'Jumat, 14.00 - 17.00 WIB',
//             tempat: 'Lapangan belakang & area kegiatan luar ruang',
//             kuota: '40 siswa',
//             cover: 'linear-gradient(135deg, #ffe899 0%, #1c3f9f 100%)',
//             foto: ''
//         },
//         3: {
//             nama: 'PMR',
//             kategori: 'Kesehatan & Sosial',
//             slogan: 'Sigap menolong, peduli pada sesama.',
//             deskripsi: 'PMR menjadi ruang belajar pertolongan pertama, kesehatan remaja, tanggap darurat, dan aksi sosial agar anggota siap membantu di lingkungan sekolah maupun kegiatan luar.',
//             pembina: 'Ibu Santi Wulandari',
//             jadwal: 'Sabtu, 09.00 - 11.30 WIB',
//             tempat: 'Ruang UKS',
//             kuota: '30 siswa',
//             cover: 'linear-gradient(135deg, #ffc3d3 0%, #cb234d 100%)',
//             foto: ''
//         },
//     };

//     function cloneDefaults() {
//         return JSON.parse(JSON.stringify(DEFAULT_DATA));
//     }

//     function cloneExtraFields() {
//         return JSON.parse(JSON.stringify(DEFAULT_EXTRA_FIELDS));
//     }

//     function loadEskulData() {
//         try {
//             const raw = localStorage.getItem(STORAGE_KEY);
//             return raw ? JSON.parse(raw) : cloneDefaults();
//         } catch (err) {
//             return cloneDefaults();
//         }
//     }

//     function loadCustomFields() {
//         try {
//             const raw = localStorage.getItem(FORM_STORAGE_KEY);
//             return raw ? JSON.parse(raw) : cloneExtraFields();
//         } catch (err) {
//             return cloneExtraFields();
//         }
//     }

//     function loadRegistrations() {
//         try {
//             const raw = localStorage.getItem(REGISTRATION_KEY);
//             return raw ? JSON.parse(raw) : [];
//         } catch (err) {
//             return [];
//         }
//     }

//     function persistRegistrations(list) {
//         localStorage.setItem(REGISTRATION_KEY, JSON.stringify(list));
//     }

//     function escapeHtml(text) {
//         return String(text || '')
//             .replace(/&/g, '&amp;')
//             .replace(/</g, '&lt;')
//             .replace(/>/g, '&gt;')
//             .replace(/"/g, '&quot;')
//             .replace(/'/g, '&#39;');
//     }

//     function makeSlug(text) {
//         return String(text || '')
//             .toLowerCase()
//             .normalize('NFD')
//             .replace(/[\u0300-\u036f]/g, '')
//             .replace(/[^a-z0-9]+/g, '-')
//             .replace(/^-+|-+$/g, '') || 'field';
//     }

//     function formatDateTime(value) {
//         const date = new Date(value);
//         if (Number.isNaN(date.getTime())) return '-';
//         return new Intl.DateTimeFormat('id-ID', {
//             dateStyle: 'medium',
//             timeStyle: 'short'
//         }).format(date);
//     }

//     function getItems(data) {
//         return Object.keys(data)
//             .map(Number)
//             .sort((a, b) => a - b)
//             .map((id) => ({ id, ...data[id] }));
//     }

//     function coverStyle(item) {
//         const baseGradient = item.cover || 'linear-gradient(135deg, #9fe8ff 0%, #1140a7 100%)';
//         if (item.foto) {
//             return `background-image: linear-gradient(180deg, rgba(4,15,48,0.08), rgba(4,15,48,0.42)), url('${item.foto}')`;
//         }
//         return `background-image: ${baseGradient}`;
//     }

//     function shortText(text, len) {
//         const safe = String(text || '');
//         return safe.length > len ? `${safe.slice(0, len).trim()}…` : safe;
//     }

//     const data = loadEskulData();
//     const customFields = loadCustomFields();
//     const items = getItems(data);

//     const previewGrid = document.getElementById('eskulPreviewGrid');
//     const featuredEskul = document.getElementById('featuredEskul');
//     const articleGrid = document.getElementById('eskulArticleGrid');
//     const registrationForm = document.getElementById('registrationForm');
//     const registrationMessage = document.getElementById('registrationMessage');

//     function renderFeatured(item) {
//         if (!featuredEskul) return;
//         featuredEskul.innerHTML = `
//             <div class="featured-cover" style="${coverStyle(item)}">
//                 <span class="cover-chip"><i class="fa-solid fa-layer-group"></i> ${escapeHtml(item.kategori || 'Ekstrakurikuler')}</span>
//             </div>
//             <div class="featured-content">
//                 <span class="section-badge">Highlight Eskul</span>
//                 <h3>${escapeHtml(item.nama)}</h3>
//                 <p class="featured-quote">“${escapeHtml(item.slogan || 'Aktif, terarah, dan konsisten.') }”</p>
//                 <p class="featured-copy">${escapeHtml(item.deskripsi || '')}</p>
//                 <div class="featured-meta">
//                     <span><i class="fa-regular fa-user"></i> ${escapeHtml(item.pembina || '-')}</span>
//                     <span><i class="fa-regular fa-clock"></i> ${escapeHtml(item.jadwal || '-')}</span>
//                     <span><i class="fa-solid fa-location-dot"></i> ${escapeHtml(item.tempat || '-')}</span>
//                     <span><i class="fa-solid fa-users"></i> ${escapeHtml(item.kuota || '-')}</span>
//                 </div>
//                 <div class="featured-tags">
//                     <span><i class="fa-solid fa-circle-check"></i> Siap untuk pendaftaran</span>
//                     <span><i class="fa-solid fa-book-open"></i> Informasi lebih lengkap</span>
//                 </div>
//             </div>`;
//     }

//     function renderEskulCards() {
//         if (!previewGrid) return;
//         previewGrid.innerHTML = items.map((item) => `
//             <article class="eskul-mini-card">
//                 <div class="eskul-mini-cover" style="${coverStyle(item)}">
//                     <span class="cover-chip"><i class="fa-solid fa-star"></i> ${escapeHtml(item.kategori || 'Eskul')}</span>
//                 </div>
//                 <div class="eskul-mini-body">
//                     <h3>${escapeHtml(item.nama)}</h3>
//                     <p>${escapeHtml(item.slogan || '')}</p>
//                     <div class="mini-meta">
//                         <span><i class="fa-regular fa-clock"></i> ${escapeHtml(item.jadwal || '-')}</span>
//                         <span><i class="fa-solid fa-location-dot"></i> ${escapeHtml(item.tempat || '-')}</span>
//                     </div>
//                     <div class="mini-card-actions">
//                         <button type="button" class="mini-cta" data-eskul-id="${item.id}" data-action="detail">Lihat detail</button>
//                         <button type="button" class="mini-cta" data-eskul-id="${item.id}" data-action="register">Daftar sekarang</button>
//                     </div>
//                 </div>
//             </article>
//         `).join('');
//     }

//     function renderSidebarList() {
//         if (!articleGrid) return;
//         articleGrid.innerHTML = items.map((item) => `
//             <button class="article-link-card" type="button" data-eskul-id="${item.id}" data-action="detail">
//                 <span class="article-link-top">
//                     <strong>${escapeHtml(item.nama)}</strong>
//                     <small>${escapeHtml(item.jadwal || '-')}</small>
//                 </span>
//                 <span class="article-link-bottom">${escapeHtml(shortText(item.deskripsi || '', 115))}</span>
//             </button>
//         `).join('');
//     }

//     function buildAllFields() {
//         return [
//             ...BASE_FORM_FIELDS,
//             ...customFields.map((field) => ({
//                 ...field,
//                 full: Boolean(field.full)
//             }))
//         ];
//     }

//     function fieldTemplate(field, eskulOptions) {
//         const requiredAttr = field.required ? 'required' : '';
//         const fullClass = field.full ? 'full' : '';
//         const safeLabel = escapeHtml(field.label);
//         const safePlaceholder = escapeHtml(field.placeholder || '');

//         if (field.type === 'textarea') {
//             return `
//                 <div class="form-group ${fullClass}">
//                     <label for="${escapeHtml(field.id)}">${safeLabel}</label>
//                     <textarea id="${escapeHtml(field.id)}" name="${escapeHtml(field.id)}" placeholder="${safePlaceholder}" ${requiredAttr}></textarea>
//                 </div>
//             `;
//         }

//         if (field.type === 'select') {
//             const options = field.id === 'eskulTujuan'
//                 ? eskulOptions.map((name) => `<option value="${escapeHtml(name)}">${escapeHtml(name)}</option>`).join('')
//                 : (field.options || []).map((option) => `<option value="${escapeHtml(option)}">${escapeHtml(option)}</option>`).join('');
//             return `
//                 <div class="form-group ${fullClass}">
//                     <label for="${escapeHtml(field.id)}">${safeLabel}</label>
//                     <select id="${escapeHtml(field.id)}" name="${escapeHtml(field.id)}" ${requiredAttr}>
//                         <option value="">Pilih jawaban</option>
//                         ${options}
//                     </select>
//                 </div>
//             `;
//         }

//         return `
//             <div class="form-group ${fullClass}">
//                 <label for="${escapeHtml(field.id)}">${safeLabel}</label>
//                 <input id="${escapeHtml(field.id)}" name="${escapeHtml(field.id)}" type="text" placeholder="${safePlaceholder}" ${requiredAttr}>
//             </div>
//         `;
//     }

//     function renderRegistrationForm() {
//         if (!registrationForm) return;
//         const fields = buildAllFields();
//         const eskulOptions = items.map((item) => item.nama);
//         registrationForm.innerHTML = fields.map((field) => fieldTemplate(field, eskulOptions)).join('') + `
//             <div class="submit-row">
//                 <button class="submit-btn" type="submit">Kirim Pendaftaran</button>
//                 <span>Setelah formulir dikirim, data akan masuk ke dashboard pengelola.</span>
//             </div>
//         `;

//         registrationForm.addEventListener('submit', function (event) {
//             event.preventDefault();
//             const formData = new FormData(registrationForm);
//             const fieldsSnapshot = buildAllFields();
//             const answers = {};

//             fieldsSnapshot.forEach((field) => {
//                 answers[field.id] = String(formData.get(field.id) || '').trim();
//             });

//             const registrations = loadRegistrations();
//             registrations.unshift({
//                 id: `REG-${Date.now()}`,
//                 submittedAt: new Date().toISOString(),
//                 eskul: answers.eskulTujuan || '',
//                 answers
//             });
//             persistRegistrations(registrations);
//             registrationForm.reset();

//             if (registrationMessage) {
//                 registrationMessage.classList.add('show');
//                 registrationMessage.textContent = `Pendaftaran untuk ${answers.eskulTujuan || 'eskul pilihan'} berhasil dikirim pada ${formatDateTime(new Date().toISOString())}. Silakan tunggu informasi lanjutan dari pengelola kegiatan.`;
//             }
//         });
//     }

//     function prefillEskul(name) {
//         const select = document.getElementById('eskulTujuan');
//         if (select) {
//             select.value = name;
//         }
//         const target = document.getElementById('pendaftaran');
//         if (target) {
//             target.scrollIntoView({ behavior: 'smooth', block: 'start' });
//         }
//     }

//     function attachEskulActions() {
//         document.querySelectorAll('[data-eskul-id]').forEach((button) => {
//             button.addEventListener('click', function () {
//                 const id = Number(this.getAttribute('data-eskul-id'));
//                 const action = this.getAttribute('data-action');
//                 const selected = items.find((item) => item.id === id);
//                 if (!selected) return;

//                 if (action === 'detail') {
//                     renderFeatured(selected);
//                     const target = document.getElementById('tentang-detail');
//                     if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
//                     return;
//                 }

//                 if (action === 'register') {
//                     prefillEskul(selected.nama);
//                 }
//             });
//         });
//     }

//     if (previewGrid && featuredEskul && articleGrid) {
//         renderEskulCards();
//         renderSidebarList();
//         if (items.length) renderFeatured(items[0]);
//         attachEskulActions();
//     }

//     if (registrationForm) {
//         renderRegistrationForm();
//     }
// })();
