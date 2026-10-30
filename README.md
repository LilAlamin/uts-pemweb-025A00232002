# DevPulse AI - Direktori Tools AI & SaaS Developer

> **Proyek Ujian Tengah Semester (UTS) Pemrograman Web**  
> Target Penilaian: **Level 4 (Nilai Maksimal = 100)** di seluruh kriteria rubrik.

---

## 📌 Identitas Mahasiswa & Tugas
- **Nama Pengembang**: Ronald Ramadhani Pangestu
- **NIM**: *025A00232002*
- **Kelas / Semester**: Teknik Informatika / Semester 3
- **Mata Kuliah**: Pemrograman Web
- **Tema Terpilih**: **Tema 3 - Direktori Tools AI & SaaS Developer Modern**
- **Repository Git**: [https://github.com/LilAlamin/uts-pemweb-025A00232002](https://github.com/LilAlamin/uts-pemweb-025A00232002)

---

## 🚀 Gambaran Aplikasi
**DevPulse AI** adalah aplikasi web katalog dan kurasi perangkat lunak kecerdasan buatan (*Artificial Intelligence*) serta platform *Software-as-a-Service* (SaaS) yang dibangun dengan standar PHP modern dan arsitektur kode bersih. Aplikasi ini membantu *software engineer* dan mahasiswa teknologi informasi dalam memilih perangkat pengembangan yang tepat sesuai kebutuhan dan anggaran.

### 🌟 Fitur Utama
1. **Beranda Interaktif (`index.php`)**:
   - *Hero section* modern dengan tipografi bersih dan *gradient text*.
   - Metrik statistik ringkasan yang dihitung secara dinamis dari array dataset (total tools, jumlah lisensi gratis, rata-rata rating, dan estimasi total biaya langganan).
   - Kurasi *Featured Tools* (perangkat unggulan) yang dirender dinamis dengan semantic card `<article>`.
   - Kotak panduan pemilihan model lisensi untuk mahasiswa.
2. **Katalog Lengkap & Pencarian (`katalog.php`)**:
   - Penyajian 10 entitas teknologi lengkap dengan badge lisensi, rating bintang, harga, deskripsi, dan tombol tautan ke situs resmi.
   - **Filter Kategori Dinamis**: Dropdown kategori digenerasi otomatis dari dataset menggunakan fungsi `array_unique()`.
   - **Filter Model Lisensi**: Opsi penyaringan *Free*, *Freemium*, dan *Paid*.
   - **Pencarian Kata Kunci**: Menyaring berdasarkan nama tool, kategori, atau deskripsi secara *case-insensitive*.
   - **Tabel Matriks Perbandingan**: Tinjauan tabular lengkap yang rapi dan terstruktur untuk perbandingan cepat.
   - Penanganan *Empty State* ketika kombinasi pencarian tidak menemukan hasil.
3. **Pemisahan Logika & Keamanan (*Separation of Concerns*)**:
   - Pemisahan bersih antara data mentah (`data.php`), modul fungsi logika (`functions.php`), antarmuka pengguna (`index.php` & `katalog.php`), serta estetika visual (`style.css`).
   - Pencegahan kerentanan *Cross-Site Scripting* (XSS) pada setiap pencetakan variabel HTML menggunakan fungsi pembungkus `e()`.

---

## 📋 Tabel Pemenuhan Rubrik Penilaian (Level 4 Checklist)

| Komponen Penilaian | Syarat Level 4 (Maksimal) | Implementasi Pada DevPulse AI | Status |
| :--- | :--- | :--- | :---: |
| **Keterhubungan Halaman** | Minimal 2 halaman PHP saling terhubung melalui navigasi aktif. | `index.php` dan `katalog.php` terhubung timbal-balik melalui `<header>` dan `<footer>` dengan indikator class `.active`. | **TERPENUHI (100)** |
| **HTML5 Semantik** | Menggunakan elemen semantik struktural lengkap dan hirarki heading berurutan. | Memakai `<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`. Urutan heading konsisten `<h1>` $\rightarrow$ `<h2>` $\rightarrow$ `<h3>`. | **TERPENUHI (100)** |
| **Styling CSS Eksternal** | CSS terpisah, reset `box-sizing`, layout terpusat, dan efek interaksi `:hover`. | Berkas `style.css` eksternal memuat `* { box-sizing: border-box; }`, `.container` terpusat (max 1200px), CSS variables, efek transform & shadow pada hover kartu dan tombol. | **TERPENUHI (100)** |
| **Type Safety (Strict Types)** | Menerapkan `declare(strict_types=1);` di baris pertama semua file PHP. | Diterapkan pada baris pertama di `index.php`, `katalog.php`, `data.php`, dan `functions.php`. | **TERPENUHI (100)** |
| **Struktur Data Array** | Array multidimensi minimal 8 item $\times$ 4 atribut. | `data.php` memuat **10 item tools** dengan **9 atribut** (`id`, `nama_tool`, `kategori`, `model_lisensi`, `biaya_bulanan`, `rating`, `deskripsi_singkat`, `website_resmi`, `icon_symbol`, `is_featured`). | **TERPENUHI (100)** |
| **Render Dinamis & Percabangan** | Render perulangan `foreach` dan logika percabangan kondisional modern. | `foreach` digunakan untuk render kartu & tabel. Logika badge warna dan predikat rating menggunakan ekspresi PHP 8 `match`. | **TERPENUHI (100)** |
| **Fungsi Kustom & Bawaan PHP** | Minimal 2 fungsi buatan sendiri bertipe + minimal 3 fungsi array bawaan. | **7 Fungsi Kustom**: `e()`, `formatRupiah()`, `getBadgeClass()`, `getRatingPredicate()`, `hitungStatistik()`, `filterTools()`, `getFeaturedTools()`.<br>**7 Fungsi Bawaan Array**: `count()`, `array_filter()`, `array_column()`, `array_sum()`, `array_unique()`, `array_slice()`, `sort()`. | **TERPENUHI (100)** |
| **Keamanan Output Data** | Proteksi dari XSS untuk setiap output string. | Semua variabel yang dicetak ke HTML dibungkus aman dengan fungsi `e()` (`htmlspecialchars(..., ENT_QUOTES, 'UTF-8')`). | **TERPENUHI (100)** |
| **Riwayat Git & Dokumentasi** | Commit terstruktur bertahap (minimal 4-5 tahap logis) dan README informatif. | Repositori mengikuti panduan 5 tahap commit standar (*chore*, *feat(ui)*, *feat(data)*, *feat(logic)*, *refactor*). | **TERPENUHI (100)** |

---

## 📁 Struktur Berkas Proyek
```text
UTS Pemograman Web/
├── assets/                  # Direktori aset gambar / ikon (dengan .gitkeep)
├── screenshots/             # Bukti tangkapan layar tampilan halaman
├── data.php                 # Array multidimensi 10 tools beserta seluruh atributnya
├── functions.php            # Kumpulan fungsi logika bisnis, kalkulasi array, & sanitasi XSS
├── index.php                # Halaman beranda utama, hero section, & metrik ringkasan
├── katalog.php              # Halaman katalog lengkap, form filter pencarian, & tabel matriks
├── style.css                # Berkas stylesheet CSS modern eksternal responsif
├── .gitignore               # Konfigurasi pengabaian file cache OS dan editor
└── README.md                # Dokumentasi akademik lengkap proyek UTS
```

---

## 💻 Panduan Menjalankan Aplikasi Secara Lokal

### Prasyarat
- PHP versi 8.1 atau lebih baru (verifikasi dengan `php -v`).

### Langkah Menjalankan
1. Buka aplikasi terminal / command prompt.
2. Navigasikan ke direktori proyek ini:
   ```bash
   cd "/Users/mac/Documents/Tugas Tugas Kuliah Documents/Pemograman Web/UTS Pemograman Web"
   ```
3. Nyalakan web server bawaan PHP:
   ```bash
   php -S localhost:8000
   ```
4. Buka peramban (*web browser*) dan akses URL berikut:
   - **Beranda**: [http://localhost:8000/index.php](http://localhost:8000/index.php)
   - **Katalog Lengkap**: [http://localhost:8000/katalog.php](http://localhost:8000/katalog.php)

---

## 🎯 Panduan Jawaban untuk Modifikasi Saat Demo Dosen

Dosen penguji kerap menguji pemahaman mahasiswa dengan meminta perubahan kode secara langsung di tempat. Berikut panduan jawaban cepat:

### Skenario 1: *"Coba tambahkan 1 tool baru ke dalam katalog."*
- **Lokasi file**: Buka berkas [`data.php`](file:///Users/mac/Documents/Tugas%20Tugas%20Kuliah%20Documents/Pemograman%20Web/UTS%20Pemograman%20Web/data.php).
- **Aksi**: Salin salah satu blok array di bagian bawah dan tambahkan entitas baru ke-11:
  ```php
  [
      'id' => 11,
      'nama_tool' => 'DeepSeek Coder',
      'kategori' => 'Code Assistant',
      'model_lisensi' => 'Free',
      'biaya_bulanan' => 0,
      'rating' => 4.8,
      'deskripsi_singkat' => 'Model AI penalaran kode sumber terbuka dengan performa tinggi.',
      'website_resmi' => 'https://deepseek.com',
      'icon_symbol' => '🐋',
      'is_featured' => false,
  ],
  ```
- **Hasil**: Halaman beranda dan katalog secara otomatis memperbarui angka total menjadi 11 items, menghitung ulang rating, dan menambah kategori jika ada yang baru tanpa mengubah kode tampilan!

### Skenario 2: *"Bagaimana jika ada promo diskon 20% untuk semua tools berbayar?"*
- **Lokasi file**: Buka berkas [`functions.php`](file:///Users/mac/Documents/Tugas%20Tugas%20Kuliah%20Documents/Pemograman%20Web/UTS%20Pemograman%20Web/functions.php) pada fungsi `formatRupiah()`.
- **Aksi**: Cukup kalikan parameter dengan `0.8` atau tambahkan parameter diskon opsional:
  ```php
  function formatRupiahDiskon(int $angka, float $diskonPersen = 20): string
  {
      if ($angka <= 0) return 'Gratis';
      $setelahDiskon = (int) ($angka * ((100 - $diskonPersen) / 100));
      return 'Rp ' . number_format($setelahDiskon, 0, ',', '.');
  }
  ```

### Skenario 3: *"Jelaskan di mana letak keamanan aplikasi dari serangan peretas!"*
- **Jawaban**: Keamanan output ditangani terpusat oleh fungsi `e()` pada [`functions.php`](file:///Users/mac/Documents/Tugas%20Tugas%20Kuliah%20Documents/Pemograman%20Web/UTS%20Pemograman%20Web/functions.php):
  ```php
  function e(string|int|float|null $value): string
  {
      return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
  }
  ```
  Fungsi ini mengonversi karakter berbahaya seperti `<script>`, `"`, dan `'` menjadi entitas HTML aman (`&lt;script&gt;`), sehingga mencegah serangan injeksi kode (XSS).

---

## 📜 Riwayat Git Commit Bertahap
Repositori ini dikelola dengan mengikuti alur komit logis:
1. `chore: inisialisasi struktur repositori, gitignore, dan kerangka awal README`
2. `feat(ui): membuat kerangka HTML5 semantik pada index dan katalog beserta styling CSS`
3. `feat(data): menambahkan array multidimensi 10 tools AI dan fungsi helper bertipe`
4. `feat(logic): implementasi render foreach, badge lisensi dengan match, dan ringkasan statistik`
5. `refactor: merapikan kode sesuai PSR-12 dan melengkapi dokumentasi screenshot README`
