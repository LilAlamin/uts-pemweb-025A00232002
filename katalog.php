<?php

declare(strict_types=1);

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/functions.php';

// Ambil parameter filter & pencarian dari query string
$kategori = isset($_GET['kategori']) ? trim((string) $_GET['kategori']) : '';
$lisensi = isset($_GET['lisensi']) ? trim((string) $_GET['lisensi']) : '';
$keyword = isset($_GET['q']) ? trim((string) $_GET['q']) : '';

// Saring data berdasarkan filter pengguna
$filteredTools = filterTools($tools, $kategori, $lisensi, $keyword);

// Hitung statistik untuk dropdown dan ringkasan
$stats = hitungStatistik($tools);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Katalog Direktori Perangkat Lunak AI &amp; SaaS untuk Software Developer.">
  <title>Katalog Lengkap - DevPulse AI</title>
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
          <li><a href="index.php" class="nav-link">Beranda</a></li>
          <li><a href="katalog.php" class="nav-link active">Katalog Tools</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- 2. Semantic Main Content -->
  <main class="site-main">
    <section class="container" style="padding-top: 40px;">
      
      <!-- Page Header -->
      <div class="section-header">
        <div>
          <h1 class="section-title">Direktori Lengkap Tools AI &amp; SaaS</h1>
          <p class="section-desc">Menampilkan <?= e(count($filteredTools)); ?> dari total <?= e($stats['total']); ?> teknologi yang dikurasi.</p>
        </div>
        <?php if (!empty($kategori) || !empty($lisensi) || !empty($keyword)): ?>
          <a href="katalog.php" class="btn btn-secondary btn-sm">↺ Reset Filter</a>
        <?php endif; ?>
      </div>

      <!-- Filter Toolbar -->
      <section class="filter-toolbar" aria-label="Alat Penyaring Katalog">
        <form action="katalog.php" method="GET" class="filter-form">
          <!-- Input Pencarian -->
          <div class="search-group">
            <span class="search-icon-inside">🔍</span>
            <input 
              type="text" 
              name="q" 
              class="search-input" 
              placeholder="Cari nama tool, kategori, atau deskripsi..." 
              value="<?= e($keyword); ?>"
            >
          </div>

          <div class="filter-group">
            <!-- Filter Kategori Dinamis dari array_unique -->
            <select name="kategori" class="select-control" aria-label="Pilih Kategori">
              <option value="">Semua Kategori (<?= e(count($stats['kategori_list'])); ?>)</option>
              <?php foreach ($stats['kategori_list'] as $kat): ?>
                <option value="<?= e($kat); ?>" <?= $kategori === $kat ? 'selected' : ''; ?>>
                  <?= e($kat); ?>
                </option>
              <?php endforeach; ?>
            </select>

            <!-- Filter Model Lisensi -->
            <select name="lisensi" class="select-control" aria-label="Pilih Lisensi">
              <option value="">Semua Lisensi</option>
              <option value="Free" <?= strtolower($lisensi) === 'free' ? 'selected' : ''; ?>>
                Free (<?= e($stats['count_free']); ?>)
              </option>
              <option value="Freemium" <?= strtolower($lisensi) === 'freemium' ? 'selected' : ''; ?>>
                Freemium (<?= e($stats['count_freemium']); ?>)
              </option>
              <option value="Paid" <?= strtolower($lisensi) === 'paid' ? 'selected' : ''; ?>>
                Paid (<?= e($stats['count_paid']); ?>)
              </option>
            </select>

            <button type="submit" class="btn btn-primary btn-sm">Terapkan Filter</button>
          </div>
        </form>
      </section>

      <!-- Tools Grid (Render Dinamis dengan foreach) -->
      <?php if (!empty($filteredTools)): ?>
        <div class="tools-grid">
          <?php foreach ($filteredTools as $tool): ?>
            <article class="tool-card">
              <div class="card-top">
                <span class="tool-badge-category"><?= e($tool['kategori']); ?></span>
                <span class="badge-license <?= e(getBadgeClass((string) $tool['model_lisensi'])); ?>">
                  <?= e($tool['model_lisensi']); ?>
                </span>
              </div>
              <div class="tool-header-content">
                <div class="tool-avatar" aria-hidden="true"><?= e($tool['icon_symbol']); ?></div>
                <h2 class="tool-title"><?= e($tool['nama_tool']); ?></h2>
              </div>
              <p class="tool-desc"><?= e($tool['deskripsi_singkat']); ?></p>
              
              <div style="margin-bottom: 16px;">
                <a 
                  href="<?= e($tool['website_resmi']); ?>" 
                  target="_blank" 
                  rel="noopener noreferrer" 
                  class="btn btn-secondary btn-sm"
                  style="width: 100%; text-align: center;"
                >
                  Kunjungi Website Resmi ↗
                </a>
              </div>

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
      <?php else: ?>
        <!-- State Ketika Data Tidak Ditemukan -->
        <div class="info-box" style="text-align: center; padding: 48px 24px; background-color: var(--white); border: 1px dashed var(--slate-300);">
          <div style="font-size: 2.5rem; margin-bottom: 12px;">🔍</div>
          <h2 style="font-size: 1.3rem; margin-bottom: 8px; color: var(--slate-800);">Tidak Ada Data yang Cocok</h2>
          <p style="color: var(--slate-500); margin-bottom: 20px;">
            Pencarian kata kunci atau kombinasi filter Anda tidak menemukan hasil yang sesuai.
          </p>
          <a href="katalog.php" class="btn btn-primary btn-sm">Reset Seluruh Filter</a>
        </div>
      <?php endif; ?>

      <!-- Comparison / Summary Table View (Tabel Perbandingan Semantik) -->
      <section style="margin-top: 56px;">
        <div class="section-header">
          <div>
            <h2 class="section-title">Tabel Matriks Perbandingan</h2>
            <p class="section-desc">Tinjauan tabular lengkap seluruh atribut data perangkat lunak.</p>
          </div>
        </div>

        <div class="table-container">
          <table class="custom-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Tools</th>
                <th>Kategori</th>
                <th>Model Lisensi</th>
                <th>Biaya / Bulan</th>
                <th>Rating</th>
                <th>Predikat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($filteredTools as $index => $tool): ?>
                <tr>
                  <td><?= e($tool['id']); ?></td>
                  <td>
                    <strong><?= e($tool['nama_tool']); ?></strong>
                  </td>
                  <td>
                    <span class="tool-badge-category"><?= e($tool['kategori']); ?></span>
                  </td>
                  <td>
                    <span class="badge-license <?= e(getBadgeClass((string) $tool['model_lisensi'])); ?>">
                      <?= e($tool['model_lisensi']); ?>
                    </span>
                  </td>
                  <td>
                    <strong><?= e(formatRupiah((int) $tool['biaya_bulanan'])); ?></strong>
                  </td>
                  <td>
                    <span style="color: var(--rating-gold);">★</span> <?= e(number_format((float) $tool['rating'], 1)); ?>
                  </td>
                  <td>
                    <small style="color: var(--slate-600);"><?= e(getRatingPredicate((float) $tool['rating'])); ?></small>
                  </td>
                  <td>
                    <a href="<?= e($tool['website_resmi']); ?>" target="_blank" rel="noopener noreferrer" style="color: var(--primary); font-weight: 600;">
                      Situs ↗
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>

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
