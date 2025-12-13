<?php
include 'koneksi.php';

$paket_dipilih = $_GET['paket'] ?? '';
$id_edit = $_GET['id'] ?? '';

// Default value (kosong)
$nama = '';
$hp = '';
$tanggal = '';
$hari = 1;
$peserta = 1;
$is_penginapan = 0;
$is_transport = 0;
$is_makan = 0;
$harga_total = 0;
$tagihan_total = 0;

// Jika ada ID (Mode Edit), ambil data dari database
if ($id_edit) {
    $query = mysqli_query($conn, "SELECT * FROM pesanan WHERE id = '$id_edit'");
    if ($data = mysqli_fetch_assoc($query)) {
        $nama = $data['nama'];
        $hp = $data['hp'];
        $tanggal = $data['tanggal'];
        $hari = $data['hari'];
        $peserta = $data['peserta'];
        $paket_dipilih = $data['paket'];
        $is_penginapan = $data['penginapan'];
        $is_transport = $data['transportasi'];
        $is_makan = $data['makan'];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pemesanan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container" style="margin-top:40px;">
  <div class="form-wrapper">
    <h2><?= $id_edit ? 'Edit Pesanan' : 'Form Pemesanan Paket Wisata' ?></h2>

    <form action="proses_simpan.php" method="POST" onsubmit="return validasi()">
      <input type="hidden" name="id" value="<?= $id_edit ?>">

      <div class="form-grid">
        <div>
          <label>Nama Pemesan</label>
          <input type="text" name="nama" id="nama" value="<?= $nama ?>">
        </div>

        <div>
          <label>No HP / WhatsApp</label>
          <input type="tel" name="hp" id="hp" value="<?= $hp ?>">
        </div>

        <div>
          <label>Tanggal Pesan</label>
          <input type="date" name="tanggal" id="tanggal" value="<?= $tanggal ?>">
        </div>

        <div>
          <label>Waktu Perjalanan (Hari)</label>
          <input type="number" name="hari" id="hari" min="1" value="<?= $hari ?>">
        </div>

        <div>
          <label>Jumlah Peserta</label>
          <input type="number" name="peserta" id="peserta" min="1" value="<?= $peserta ?>">
        </div>

        <div>
          <label>Paket Wisata</label>
          <input type="text" name="paket" value="<?= $paket_dipilih ?>" readonly>
        </div>

        <div style="grid-column: span 3;">
            <label>Pelayanan Tambahan (Opsional)</label>
            <div style="display: flex; gap: 20px;">
                <label><input type="checkbox" name="lay_penginapan" value="1000000" class="layanan" <?= $is_penginapan ? 'checked' : '' ?>> Penginapan (Rp 1jt)</label>
                <label><input type="checkbox" name="lay_transport" value="1200000" class="layanan" <?= $is_transport ? 'checked' : '' ?>> Transportasi (Rp 1.2jt)</label>
                <label><input type="checkbox" name="lay_makan" value="500000" class="layanan" <?= $is_makan ? 'checked' : '' ?>> Service/Makan (Rp 500rb)</label>
            </div>
        </div>

        <div>
          <label>Harga Paket (Per Orang)</label>
          <input type="text" name="harga_tampil" id="harga_tampil" readonly>
          <input type="hidden" name="harga" id="harga"> </div>

        <div>
          <label>Jumlah Tagihan</label>
          <input type="text" name="total_tampil" id="total_tampil" readonly>
          <input type="hidden" name="total" id="total"> </div>
      </div>

      <div class="form-buttons">
        <button type="submit" class="btn">Simpan / Update</button>
        <button type="button" class="btn ghost" onclick="history.back()">Batal</button>
      </div>
    </form>
  </div>
</div>

<script>
function validasi() {
  let nama = document.getElementById('nama').value;
  let hp = document.getElementById('hp').value;
  let tanggal = document.getElementById('tanggal').value;
  
  if (nama == '' || hp == '' || tanggal == '') {
    alert('Data Nama, HP, dan Tanggal wajib diisi!'); // 
    return false;
  }
  return true;
}

// Logic Hitung Otomatis
document.querySelectorAll('.layanan').forEach(el => {
  el.addEventListener('change', hitung);
});
document.getElementById('hari').addEventListener('input', hitung);
document.getElementById('peserta').addEventListener('input', hitung);

function hitung() {
  let harga = 0;
  
  // Ambil nilai checkbox
  document.querySelectorAll('.layanan:checked').forEach(l => {
    harga += parseInt(l.value);
  });

  let hari = parseInt(document.getElementById('hari').value) || 0;
  let peserta = parseInt(document.getElementById('peserta').value) || 0;
  
  let total = harga * hari * peserta; // 

  // Tampilkan format Rupiah di Textbox
  document.getElementById('harga_tampil').value = "Rp " + harga.toLocaleString('id-ID');
  document.getElementById('total_tampil').value = "Rp " + total.toLocaleString('id-ID');
  
  // Simpan nilai asli (angka) ke hidden input untuk dikirim ke PHP
  document.getElementById('harga').value = harga;
  document.getElementById('total').value = total;
}

// Jalankan hitung saat halaman dimuat (untuk kasus Edit)
window.onload = hitung;
</script>

</body>
</html>