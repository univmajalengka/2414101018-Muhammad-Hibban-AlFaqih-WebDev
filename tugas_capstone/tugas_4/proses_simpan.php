<?php
include 'koneksi.php';

// Ambil data dari form
$id       = $_POST['id']; // ID akan ada isinya jika mode EDIT
$nama     = $_POST['nama'];
$hp       = $_POST['hp'];
$tanggal  = $_POST['tanggal'];
$hari     = $_POST['hari'];
$peserta  = $_POST['peserta'];
$paket    = $_POST['paket'];

// Cek Checkbox (Jika dicentang nilainya 1, jika tidak 0)
$penginapan   = isset($_POST['lay_penginapan']) ? 1 : 0;
$transportasi = isset($_POST['lay_transport']) ? 1 : 0;
$makan        = isset($_POST['lay_makan']) ? 1 : 0;

$harga    = $_POST['harga'];
$total    = $_POST['total'];

if (empty($id)) {
    // === LOGIKA INSERT (DATA BARU) ===
    $sql = "INSERT INTO pesanan 
            (nama, hp, tanggal, hari, peserta, paket, penginapan, transportasi, makan, harga_paket, total_tagihan)
            VALUES
            ('$nama','$hp','$tanggal','$hari','$peserta','$paket', '$penginapan', '$transportasi', '$makan', '$harga', '$total')";
} else {
    // === LOGIKA UPDATE (EDIT DATA) ===
    $sql = "UPDATE pesanan SET
            nama = '$nama',
            hp = '$hp',
            tanggal = '$tanggal',
            hari = '$hari',
            peserta = '$peserta',
            penginapan = '$penginapan',
            transportasi = '$transportasi',
            makan = '$makan',
            harga_paket = '$harga',
            total_tagihan = '$total'
            WHERE id = '$id'";
}

if (mysqli_query($conn, $sql)) {
    // Berhasil, kembali ke daftar pesanan
    echo "<script>alert('Data berhasil disimpan!'); window.location='modifikasi_pesanan.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>