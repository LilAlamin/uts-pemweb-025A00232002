# DevPulse AI - Direktori Tools AI & SaaS Developer

> Proyek Penilaian Ujian Tengah Semester (UTS) Mata Kuliah Pemrograman Web

---

## 📌 Identitas Pengembang
- **Nama Mahasiswa**: Ronald Ramadhani (LilAlamin)
- **NIM / ID**: *(Disesuaikan)*
- **Kelas / Angkatan**: Teknik Informatika
- **Mata Kuliah**: Pemrograman Web
- **Tema Proyek**: Tema 3 - Direktori Tools AI & SaaS Developer Modern

---

## 🚀 Gambaran Proyek
**DevPulse AI** adalah aplikasi web katalog dan kurasi perangkat lunak (tools) kecerdasan buatan (AI) serta Software-as-a-Service (SaaS) yang didesain khusus untuk kebutuhan produktivitas developer, desainer, dan mahasiswa teknologi informasi.

### Fitur Utama:
1. **Halaman Beranda (`index.php`)**: Hero section modern, metrik ringkasan ekosistem AI, serta kurasi tools unggulan (*featured tools*).
2. **Halaman Katalog Lengkap (`katalog.php`)**: Penyajian 10 tools dengan filter kategori dinamis, filter model lisensi (*Free, Freemium, Paid*), pencarian nama tool, serta kalkulasi ringkasan interaktif.
3. **Arsitektur Kode Bersih (`functions.php` & `data.php`)**: Pemisahan data dan logika bisnis (*separation of concerns*), strict types, sanitasi keamanan XSS, dan ekspresi PHP modern.

---

## 🛠️ Persyaratan Lingkungan
- **PHP**: Versi 8.1 ke atas (Mendukung `declare(strict_types=1);` dan sintaks `match`)
- **Web Server**: Built-in PHP Server atau Apache/Nginx (XAMPP / Laravel Herd)
- **Browser Modern**: Google Chrome, Mozilla Firefox, atau Safari

---

## 📂 Rencana Struktur Berkas
```text
UTS Pemograman Web/
├── assets/                  # Aset gambar, ikon, atau media pendukung
├── screenshots/             # Bukti tangkapan layar antarmuka & responsif
├── data.php                 # Array multidimensi berisi 10 entitas tools & atribut
├── functions.php            # Kumpulan fungsi logika, filter, hitung, dan sanitasi XSS
├── index.php                # Halaman beranda utama & highlight
├── katalog.php              # Halaman katalog lengkap dengan filter & tabel/kartu
├── style.css                # Desain visual modern, responsive layout, dan komponen UI
├── .gitignore               # Konfigurasi pengabaian file sampah/lokal
└── README.md                # Dokumentasi lengkap proyek & rubrik penilaian
```

---

## 🏁 Panduan Singkat Menjalankan Aplikasi
Jalankan server bawaan PHP dari direktori utama proyek:
```bash
php -S localhost:8000
```
Buka browser pada tautan: `http://localhost:8000`
