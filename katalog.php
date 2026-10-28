<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <p class="section-desc">Eksplorasi dan bandingkan daftar teknologi pendukung rekayasa perangkat lunak.</p>
        </div>
      </div>

      <!-- Filter Toolbar -->
      <section class="filter-toolbar" aria-label="Alat Penyaring Katalog">
        <form action="katalog.php" method="GET" class="filter-form">
          <div class="search-group">
            <span class="search-icon-inside">🔍</span>
            <input type="text" name="q" class="search-input" placeholder="Cari nama tool atau teknologi...">
          </div>
          <div class="filter-group">
            <select name="kategori" class="select-control">
              <option value="">Semua Kategori</option>
              <option value="Code Assistant">Code Assistant</option>
              <option value="Cloud & DevOps">Cloud &amp; DevOps</option>
              <option value="Productivity">Productivity</option>
            </select>
            <select name="lisensi" class="select-control">
              <option value="">Semua Lisensi</option>
              <option value="Free">Free (Gratis)</option>
              <option value="Freemium">Freemium</option>
              <option value="Paid">Paid (Berbayar)</option>
            </select>
            <button type="submit" class="btn btn-primary btn-sm">Terapkan Filter</button>
          </div>
        </form>
      </section>

      <!-- Tools Grid -->
      <div class="tools-grid">
        <article class="tool-card">
          <div class="card-top">
            <span class="tool-badge-category">Code Assistant</span>
            <span class="badge-license badge-paid">Paid</span>
          </div>
          <div class="tool-header-content">
            <div class="tool-avatar">🤖</div>
            <h2 class="tool-title">GitHub Copilot</h2>
          </div>
          <p class="tool-desc">Asisten autocomplete kode berbasis AI langsung di dalam editor.</p>
          <div class="card-footer">
            <div class="tool-price">
              <span class="price-label">Biaya Bulanan</span>
              <span class="price-val">Rp 160.000</span>
            </div>
            <div class="tool-rating">
              <span class="rating-star">★</span>
              <span>4.8</span>
            </div>
          </div>
        </article>

        <article class="tool-card">
          <div class="card-top">
            <span class="tool-badge-category">Code Assistant</span>
            <span class="badge-license badge-freemium">Freemium</span>
          </div>
          <div class="tool-header-content">
            <div class="tool-avatar">🎯</div>
            <h2 class="tool-title">Cursor IDE</h2>
          </div>
          <p class="tool-desc">Code editor modern berbasis VS Code dengan integrasi AI codebase mendalam.</p>
          <div class="card-footer">
            <div class="tool-price">
              <span class="price-label">Biaya Bulanan</span>
              <span class="price-val">Rp 320.000</span>
            </div>
            <div class="tool-rating">
              <span class="rating-star">★</span>
              <span>4.9</span>
            </div>
          </div>
        </article>

        <article class="tool-card">
          <div class="card-top">
            <span class="tool-badge-category">IDE & Editor</span>
            <span class="badge-license badge-free">Free</span>
          </div>
          <div class="tool-header-content">
            <div class="tool-avatar">💻</div>
            <h2 class="tool-title">Visual Studio Code</h2>
          </div>
          <p class="tool-desc">Editor kode sumber bertenaga dengan ekosistem ekstensi yang luas dan fleksibel.</p>
          <div class="card-footer">
            <div class="tool-price">
              <span class="price-label">Biaya Bulanan</span>
              <span class="price-val">Gratis</span>
            </div>
            <div class="tool-rating">
              <span class="rating-star">★</span>
              <span>4.9</span>
            </div>
          </div>
        </article>
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
        <div class="footer-links">
          <h4>Informasi Akademik</h4>
          <ul>
            <li><span>Mata Kuliah: Pemrograman Web</span></li>
            <li><span>Proyek: Ujian Tengah Semester</span></li>
            <li><span>Nilai Target: Level 4 (100)</span></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> DevPulse AI. Dibuat untuk pemenuhan UTS Pemrograman Web.</p>
        <p>Dibangun dengan PHP Native, HTML5 Semantik, &amp; Modern Vanilla CSS.</p>
      </div>
    </div>
  </footer>

</body>
</html>
