<?php

// 1. Fungsi untuk menghitung diskon
function hitungDiskon($totalBelanja) {
    if ($totalBelanja >= 100000) {
        $diskon = 0.10 * $totalBelanja; // 10%
    } elseif ($totalBelanja >= 50000) {
        $diskon = 0.05 * $totalBelanja; // 5%
    } else {
        $diskon = 0; // tidak ada diskon
    }

    return $diskon; // mengembalikan nominal diskon
}

// 2. Eksekusi program utama
$totalBelanja = 120000;           // contoh nilai
$diskon = hitungDiskon($totalBelanja);
$totalBayar = $totalBelanja - $diskon;

// 3. Output hasil
echo "=== Program Hitung Diskon ===<br>";
echo "Total Belanja : Rp " . number_format($totalBelanja, 0, ',', '.') . "<br>";
echo "Diskon        : Rp " . number_format($diskon, 0, ',', '.') . "<br>";
echo "Total Bayar   : Rp " . number_format($totalBayar, 0, ',', '.') . "<br>";

?>
