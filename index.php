<?php

declare(strict_types=1);

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/functions.php';

// Kalkulasi statistik keseluruhan dari dataset
$stats = hitungStatistik($tools);

// Ambil daftar tool unggulan (featured) untuk ditampilkan di beranda
$featuredTools = getFeaturedTools($tools, 3);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="DevPulse AI - Direktori dan kurasi tools AI serta SaaS modern untuk pengembang perangkat lunak dan mahasiswa IT.">
  <title>DevPulse AI - Direktori Tools AI &amp; SaaS Developer</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- 1. Semantic Header & Navigation -->
  <header class="site-header">
    <div class="container header-inner">
      <a href="index.php" class="site-brand">
        <div class="brand-icon">⚡</div>
        <span>DevPulse<strong>AI</strong></span>
      </a>
      <nav class="site-nav" aria-label="Navigasi Utama">
        <ul>
          <li><a href="index.php" class="nav-link active">Beranda</a></li>
          <li><a href="katalog.php" class="nav-link">Katalog Tools</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- 2. Semantic Main Content -->
  <main class="site-main">

    <!-- Hero Section -->
    <section class="hero-section">
      <div class="container">
        <div class="hero-pill">✨ Kurasi Ekosistem Developer Modern</div>
        <h1 class="hero-title">Akselerasi Produktivitas Koding dengan <span class="gradient-text">Tools AI &amp; SaaS Terbaik</span></h1>
        <p class="hero-subtitle">Direktori komprehensif perangkat lunak kecerdasan buatan dan platform cloud yang dirancang untuk mempercepat alur kerja rekayasa perangkat lunak.</p>
        <div class="hero-actions">
          <a href="katalog.php" class="btn btn-primary">Eksplorasi Katalog Lengkap (<?= e($stats['total']); ?> Tools) →</a>
          <a href="#ringkasan" class="btn btn-secondary">Lihat Ringkasan Statistik</a>
        </div>
      </div>
    </section>

    <!-- Stats Summary Section (Dihitung Dinamis Menggunakan Array Functions) -->
    <section id="ringkasan" class="stats-section">
      <div class="container">
        <div class="section-header">
          <div>
            <h2 class="section-title">Ringkasan Ekosistem</h2>
            <p class="section-desc">Statistik komparasi perangkat lunak AI yang dihitung dinamis dari dataset.</p>
          </div>
        </div>

        <div class="stats-grid">
          <!-- Total Tools (count) -->
          <div class="stat-card">
            <div class="stat-icon primary">🚀</div>
            <div class="stat-content">
              <span class="stat-label">Total Perangkat Lunak</span>
              <span class="stat-value"><?= e($stats['total']); ?> Items</span>
              <span class="stat-subtext">Dari <?= e(count($stats['kategori_list'])); ?> kategori berbeda</span>
            </div>
          </div>

          <!-- Tools Gratis (array_filter + count) -->
          <div class="stat-card">
            <div class="stat-icon success">🎁</div>
            <div class="stat-content">
              <span class="stat-label">Lisensi Free (Gratis)</span>
              <span class="stat-value"><?= e($stats['count_free']); ?> Tools</span>
              <span class="stat-subtext"><?= e($stats['count_freemium']); ?> Freemium &amp; <?= e($stats['count_paid']); ?> Paid</span>
            </div>
          </div>

          <!-- Rata-rata Rating (array_column + array_sum) -->
          <div class="stat-card">
            <div class="stat-icon warning">⭐</div>
            <div class="stat-content">
              <span class="stat-label">Rata-rata Rating</span>
              <span class="stat-value"><?= e($stats['rata_rata_rating']); ?> / 5.0</span>
              <span class="stat-subtext">Ulasan komunitas developer</span>
            </div>
          </div>

          <!-- Estimasi Biaya Langganan (array_sum) -->
          <div class="stat-card">
            <div class="stat-icon purple">💳</div>
            <div class="stat-content">
              <span class="stat-label">Estimasi Langganan</span>
              <span class="stat-value"><?= e(formatRupiah((int) $stats['total_biaya'])); ?></span>
              <span class="stat-subtext">Akumulasi per bulan</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Tools Section (Dirender Dinamis dengan foreach) -->
    <section class="container" style="margin-top: 24px;">
      <div class="section-header">
        <div>
          <h2 class="section-title">Pilihan Unggulan (Featured)</h2>
          <p class="section-desc">Tools AI paling esensial yang sangat direkomendasikan untuk alur kerja koding harian.</p>
        </div>
        <a href="katalog.php" class="btn btn-secondary btn-sm">Buka Seluruh Katalog →</a>
      </div>

      <div class="tools-grid">
        <?php foreach ($featuredTools as $tool): ?>
          <article class="tool-card">
            <div class="card-top">
              <span class="tool-badge-category"><?= e($tool['kategori']); ?></span>
              <span class="badge-license <?= e(getBadgeClass((string) $tool['model_lisensi'])); ?>">
                <?= e($tool['model_lisensi']); ?>
              </span>
            </div>
            <div class="tool-header-content">
              <div class="tool-avatar" aria-hidden="true"><?= e($tool['icon_symbol']); ?></div>
              <h3 class="tool-title"><?= e($tool['nama_tool']); ?></h3>
            </div>
            <p class="tool-desc"><?= e($tool['deskripsi_singkat']); ?></p>
            <div class="card-footer">
              <div class="tool-price">
                <span class="price-label">Biaya Bulanan</span>
                <span class="price-val"><?= e(formatRupiah((int) $tool['biaya_bulanan'])); ?></span>
              </div>
              <div class="tool-rating" title="Predikat: <?= e(getRatingPredicate((float) $tool['rating'])); ?>">
                <span class="rating-star">★</span>
                <span><?= e(number_format((float) $tool['rating'], 1)); ?></span>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <!-- Information Callout Box -->
      <div class="info-box">
        <h3>💡 Panduan Pemilihan Model Lisensi Mahasiswa</h3>
        <p>Gunakan tools berlabel <strong>Free</strong> untuk pembelajaran dasar tanpa biaya, manfaatkan paket <strong>Freemium</strong> dengan kuota gratis untuk tugas kuliah, dan pertimbangkan lisensi <strong>Paid</strong> saat mengerjakan proyek skripsi atau kebutuhan produksi berskala besar.</p>
      </div>
    </section>

  </main>

  <!-- 3. Semantic Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <h3>DevPulse AI</h3>
          <p>Portal direktori dan kurasi teknologi kecerdasan buatan untuk membantu mahasiswa dan software engineer memilih perangkat pengembangan terbaik.</p>
        </div>
        <div class="footer-links">
          <h4>Navigasi Halaman</h4>
          <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="katalog.php">Daftar Lengkap Katalog</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; <?= date('Y'); ?> DevPulse AI. Seluruh hak cipta dilindungi.</p>
      </div>
    </div>
  </footer>

</body>
</html>
