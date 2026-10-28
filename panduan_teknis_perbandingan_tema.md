# Panduan Teknis Pengerjaan UTS & Perbandingan Tema (Tema 3 vs Tema 6)

Dokumen ini adalah panduan pendamping untuk membantu kamu membangun kode proyek agar mendapatkan **Nilai Maksimal (Level 4 = 100)** di seluruh komponen rubrik penilaian UTS Pemrograman Web.

---

## Bagian 1: Perbandingan Tema 3 vs Tema 6 (Bisa Dipilih atau Digabung)

Jika kamu masih menimbang antara **Tema 3 (Tools AI & SaaS)** dan **Tema 6 (Event & Tech Community Hub)**, berikut adalah perbandingannya:

| Aspek Penilaian | Tema 3: Direktori Tools AI & SaaS Developer | Tema 6: Direktori Event & Tech Community Hub |
| :--- | :--- | :--- |
| **Kesan Saat Demo** | Terlihat sangat *tech-savvy* dan relevan dengan keseharian mahasiswa Informatika. | Terlihat seperti sistem informasi kepanitiaan/komunitas kampus yang aplikatif. |
| **Atribut Data Array (`data.php`)** | `id`, `nama_tool`, `kategori`, `lisensi`, `biaya_bulanan`, `rating`, `website_resmi` | `id`, `nama_event`, `topik`, `tanggal`, `lokasi`, `kuota`, `terdaftar`, `harga_tiket` |
| **Logika Percabangan (`match` / `if`)** | Badge warna lisensi (`Free` = Hijau, `Freemium` = Biru, `Paid` = Ungu) + Predikat Rating. | Status kuota (`Penuh` jika `terdaftar >= kuota`, `Hampir Penuh` jika sisa `< 10%`, `Tersedia`). |
| **Logika Ringkasan Hitung** | Total biaya langganan per bulan, rata-rata rating, dan *tool* dengan rating tertinggi. | Total peserta seluruh event, persentase keterisian kuota rata-rata, dan event terdekat. |
| **Pertanyaan Modifikasi Saat Demo** | Mudah! Dosen biasanya meminta: *"Coba tampilkan yang gratis saja"* atau *"Diskon 20% untuk biaya bulanan"*. | Dosen biasanya meminta: *"Coba tambah 10 peserta di event ke-2, apakah statusnya berubah jadi Penuh?"* |

> **Tips Kombinasi:** Kamu bahkan bisa membuat `README.md` di atas langsung dipakai untuk **Tema 3**, dan jika nanti kamu ingin saya buatkan seluruh kode `.php` dan `.css`-nya (`index.php`, `katalog.php`, `data.php`, `functions.php`, `style.css`), kita tinggal eksekusi!

---

## Bagian 2: Rancangan Data Array (`data.php`) — Tema 3 (10 Item)

Syarat wajib UTS adalah **minimal 8 item** dan **minimal 4 atribut per item**. Berikut rancangan **10 item** dengan **6 atribut** agar aman di Level 4:

| No | `nama_tool` | `kategori` | `model_lisensi` | `biaya_bulanan` (IDR) | `rating` | `deskripsi_singkat` |
| :-: | :--- | :--- | :--- | :--- | :-: | :--- |
| 1 | **GitHub Copilot** | Code Assistant | Paid | 160000 | 4.8 | Asisten *autocomplete* kode berbasis AI langsung di dalam editor. |
| 2 | **Cursor IDE** | Code Assistant | Freemium | 320000 | 4.9 | Code editor berbasis VS Code dengan integrasi AI *codebase* mendalam. |
| 3 | **Visual Studio Code** | IDE & Editor | Free | 0 | 4.9 | Editor kode sumber ringan namun bertenaga dengan ekosistem ekstensi luas. |
| 4 | **Figma** | UI/UX Design | Freemium | 240000 | 4.8 | Aplikasi desain antarmuka kolaboratif berbasis *browser* secara *real-time*. |
| 5 | **Vercel** | Cloud & DevOps | Freemium | 320000 | 4.7 | Platform *cloud deployment* cepat untuk aplikasi *frontend* dan *serverless*. |
| 6 | **Docker Desktop** | Cloud & DevOps | Free | 0 | 4.8 | Platform kontainerisasi untuk memastikan lingkungan aplikasi selalu konsisten. |
| 7 | **Postman** | API Testing | Freemium | 225000 | 4.6 | Platform kolaborasi untuk membangun, menguji, dan mendokumentasikan REST API. |
| 8 | **Notion AI** | Productivity | Freemium | 160000 | 4.7 | Ruang kerja *all-in-one* untuk catatan kuliah, dokumentasi teknis, dan manajemen tugas. |
| 9 | **n8n Workflow** | Automation | Free | 0 | 4.6 | Alat otomasi alur kerja *open-source* untuk mengintegrasikan berbagai API dan layanan. |
| 10 | **Claude AI Pro** | Code Assistant | Paid | 320000 | 4.9 | Asisten AI dengan kemampuan penalaran logika, *debugging*, dan arsitektur kode. |

---

## Bagian 3: Strategi 5 Commit Git Bertahap (Agar Nilai Git & README = 100)

Sesuai Lembar Perintah UTS halaman 4–5, jangan mengunggah semua kode dalam 1 *commit* sekaligus. Gunakan urutan *commit* berikut:

1. **Commit Tahap 1 (Rancang):**
   ```bash
   git add README.md .gitignore assets/ screenshots/
   git commit -m "chore: inisialisasi struktur repositori, gitignore, dan kerangka awal README"
   ```
2. **Commit Tahap 2 (Kerangka Antarmuka):**
   ```bash
   git add index.php katalog.php style.css
   git commit -m "feat(ui): membuat kerangka HTML5 semantik pada index dan katalog beserta styling CSS"
   ```
3. **Commit Tahap 3A (Data & Fungsi Dasar):**
   ```bash
   git add data.php functions.php
   git commit -m "feat(data): menambahkan array multidimensi 10 tools AI dan fungsi helper bertipe"
   ```
4. **Commit Tahap 3B (Render Dinamis & Ringkasan):**
   ```bash
   git add index.php katalog.php functions.php
   git commit -m "feat(logic): implementasi render foreach, badge lisensi dengan match, dan ringkasan statistik"
   ```
5. **Commit Tahap 4 (Refaktor Clean Code & Finalisasi README):**
   ```bash
   git add .
   git commit -m "refactor: merapikan kode sesuai PSR-12 dan melengkapi dokumentasi screenshot README"
   ```

---

## Bagian 4: Checklist Pemenuhan Syarat Wajib (W)

- [x] **Minimal 2 halaman PHP terhubung:** `index.php` dan `katalog.php`.
- [x] **HTML5 Semantik:** `<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`, serta urutan heading `h1` $\rightarrow$ `h2` $\rightarrow$ `h3`.
- [x] **CSS Eksternal:** `style.css` dengan `* { box-sizing: border-box; }`, *container* terpusat, dan efek `:hover`.
- [x] **Strict Types:** `<?php declare(strict_types=1);` di baris pertama **semua** file `.php`.
- [x] **Array Multidimensi:** 10 item $\times$ 6 atribut di `data.php`.
- [x] **Render `foreach` & Percabangan:** Menampilkan kartu *tools* dengan `foreach` dan warna badge lisensi menggunakan `match`.
- [x] **Fungsi Buatan Sendiri & Bawaan:** Minimal 2 fungsi buatan sendiri bertipe + minimal 3 fungsi array bawaan (`count`, `array_filter`, `array_column`, `array_sum`, `array_unique`).
- [x] **Keamanan Output:** Semua variabel yang dicetak ke HTML dibungkus fungsi `e()` (`htmlspecialchars`).