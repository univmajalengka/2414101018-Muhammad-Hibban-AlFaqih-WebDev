<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pesanan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="data-container">
  <h2>Daftar Pesanan Wisata</h2>
  <a href="index.php" class="btn-back" style="margin-bottom: 20px; display:inline-block;">+ Tambah Pesanan Baru</a>

  <table class="tabel-pesanan">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Phone</th>
        <th>Jml Peserta</th>
        <th>Jml Hari</th>
        <th>Layanan (A/T/M)</th> <th>Harga Paket</th>
        <th>Total Tagihan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    if (mysqli_num_rows($data) > 0) {
      while ($d = mysqli_fetch_array($data)) {
        // Logika checklist layanan untuk tampilan tabel (Y/N)
        $layanan = "";
        $layanan .= ($d['penginapan'] == 1) ? "Y / " : "N / ";
        $layanan .= ($d['transportasi'] == 1) ? "Y / " : "N / ";
        $layanan .= ($d['makan'] == 1) ? "Y" : "N";
    ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $d['nama'] ?></td>
        <td><?= $d['hp'] ?></td>
        <td><?= $d['peserta'] ?></td>
        <td><?= $d['hari'] ?></td>
        <td><?= $layanan ?></td>
        <td>Rp <?= number_format($d['harga_paket']) ?></td>
        <td>Rp <?= number_format($d['total_tagihan']) ?></td>
        <td>
          <a href="pemesanan.php?id=<?= $d['id'] ?>" class="btn-edit">Edit</a>
          <a href="hapus.php?id=<?= $d['id'] ?>" 
             class="btn-hapus"
             onclick="return confirm('Anda yakin akan menghapus data milik <?= $d['nama'] ?>?');">
             Delete
          </a>
        </td>
      </tr>
    <?php
      }
    } else {
      echo "<tr><td colspan='9' class='kosong'>Belum ada data pesanan.</td></tr>";
    }
    ?>
    </tbody>
  </table>
  
  <br>
  <small>* Keterangan Layanan: A (Akomodasi/Penginapan), T (Transportasi), M (Makan)</small>
</div>

</body>
</html>