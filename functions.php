<?php

declare(strict_types=1);

/**
 * DevPulse AI - Modul Logika & Fungsi Helper
 * Memenuhi kriteria Level 4 UTS:
 * 1. declare(strict_types=1) pada baris pertama.
 * 2. Fungsi buatan sendiri dengan parameter bertipe & return type jelas.
 * 3. Menggunakan fungsi bawaan array PHP (count, array_filter, array_column, array_sum, array_unique).
 * 4. Menggunakan struktur kendali modern PHP 8 (match expression).
 * 5. Keamanan output dengan sanitasi htmlspecialchars.
 */

/**
 * Mengamankan output teks terhadap serangan Cross-Site Scripting (XSS).
 */
function e(string|int|float|null $value): string
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}

/**
 * Memformat nominal angka ke format mata uang Rupiah Indonesia.
 */
function formatRupiah(int $angka): string
{
    if ($angka <= 0) {
        return 'Gratis';
    }
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

/**
 * Menentukan class CSS badge lisensi menggunakan PHP 8 match expression.
 */
function getBadgeClass(string $lisensi): string
{
    return match (strtolower(trim($lisensi))) {
        'free' => 'badge-free',
        'freemium' => 'badge-freemium',
        'paid' => 'badge-paid',
        default => 'badge-default',
    };
}

/**
 * Memberikan predikat kualitatif berdasarkan nilai rating menggunakan match expression.
 */
function getRatingPredicate(float $rating): string
{
    return match (true) {
        $rating >= 4.8 => 'Sangat Direkomendasikan',
        $rating >= 4.6 => 'Unggul & Populer',
        $rating >= 4.0 => 'Standar Industri',
        default => 'Cukup Baik',
    };
}

/**
 * Menghitung ringkasan statistik komprehensif dari array data tools.
 * Menggunakan fungsi bawaan PHP: count, array_filter, array_column, array_sum, array_unique.
 *
 * @param array<int, array<string, mixed>> $tools
 * @return array<string, mixed>
 */
function hitungStatistik(array $tools): array
{
    $total = count($tools);

    // Filter lisensi dengan array_filter
    $freeTools = array_filter($tools, fn(array $item): bool => strtolower($item['model_lisensi']) === 'free');
    $freemiumTools = array_filter($tools, fn(array $item): bool => strtolower($item['model_lisensi']) === 'freemium');
    $paidTools = array_filter($tools, fn(array $item): bool => strtolower($item['model_lisensi']) === 'paid');

    // Total biaya bulanan dengan array_column dan array_sum
    $biayaArray = array_column($tools, 'biaya_bulanan');
    $totalBiaya = array_sum($biayaArray);

    // Rata-rata rating
    $ratingArray = array_column($tools, 'rating');
    $rataRataRating = $total > 0 ? round(array_sum($ratingArray) / $total, 2) : 0.0;

    // Kategori unik menggunakan array_unique dan array_column
    $kategoriList = array_values(array_unique(array_column($tools, 'kategori')));
    sort($kategoriList);

    return [
        'total' => $total,
        'count_free' => count($freeTools),
        'count_freemium' => count($freemiumTools),
        'count_paid' => count($paidTools),
        'total_biaya' => $totalBiaya,
        'rata_rata_rating' => $rataRataRating,
        'kategori_list' => $kategoriList,
    ];
}

/**
 * Menyaring data tools berdasarkan kategori, lisensi, atau kata kunci pencarian.
 *
 * @param array<int, array<string, mixed>> $tools
 * @return array<int, array<string, mixed>>
 */
function filterTools(array $tools, ?string $kategori = null, ?string $lisensi = null, ?string $keyword = null): array
{
    return array_filter($tools, function (array $item) use ($kategori, $lisensi, $keyword): bool {
        // Filter kategori
        if (!empty($kategori) && strtolower($item['kategori']) !== strtolower($kategori)) {
            return false;
        }

        // Filter lisensi
        if (!empty($lisensi) && strtolower($item['model_lisensi']) !== strtolower($lisensi)) {
            return false;
        }

        // Filter kata kunci pencarian (nama, deskripsi, atau kategori)
        if (!empty($keyword)) {
            $kw = strtolower(trim($keyword));
            $nama = strtolower((string) $item['nama_tool']);
            $desc = strtolower((string) $item['deskripsi_singkat']);
            $kat = strtolower((string) $item['kategori']);

            if (!str_contains($nama, $kw) && !str_contains($desc, $kw) && !str_contains($kat, $kw)) {
                return false;
            }
        }

        return true;
    });
}

/**
 * Mengambil daftar tool unggulan (featured) untuk ditampilkan di beranda.
 *
 * @param array<int, array<string, mixed>> $tools
 * @return array<int, array<string, mixed>>
 */
function getFeaturedTools(array $tools, int $limit = 3): array
{
    $featured = array_filter($tools, fn(array $item): bool => !empty($item['is_featured']));
    return array_slice(array_values($featured), 0, $limit);
}
