<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Wisata Jati Gede</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<header class="site-header">
  <div class="container header-inner">
    <div class="brand">
      <h1>Wisata Jati Gede</h1>
      <p class="tag">Eksplor Keindahan Alam & Pengalaman Lokal</p>
    </div>

    <nav class="nav">
      <ul id="menu">
        <li><a href="#hero">Beranda</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#paket">Paket Wisata</a></li>
        <li><a href="#galeri">Galeri</a></li>
        
        <li>
          <a href="modifikasi_pesanan.php" class="nav-btn" style="background-color: #f1c40f; color: #333; padding: 5px 15px; border-radius: 15px;">
            Daftar Pesanan
          </a>
        </li>
      </ul>
    </nav>

    <button class="hamburger" onclick="toggleMenu()">☰</button>
  </div>
</header>

<section class="hero" id="hero">
  <div class="slider">
    <div class="slides">

      <div class="slide" style="background-image:url('img/ban1.jpg')">
        <div class="slide-caption">
          <h2>Panorama Waduk Jatigede</h2>
          <p>Nikmati sunrise dan kegiatan perahu.</p>
        </div>
      </div>

      <div class="slide" style="background-image:url('img/ban2.jpg')">
        <div class="slide-caption">
          <h2>Camping Bukit Panenjoan</h2>
          <p>Suasana malam dengan langit penuh bintang.</p>
        </div>
      </div>

      <div class="slide" style="background-image:url('img/ban3.jpg')">
        <div class="slide-caption">
          <h2>Susur Waduk</h2>
          <p>Wisata edukasi & kuliner lokal.</p>
        </div>
      </div>

    </div>

    <button class="prev">‹</button>
    <button class="next">›</button>
    <div class="dots" id="dots"></div>
  </div>
</section>

<section id="about" class="container about">
  <h2>Tentang Wisata Jati Gede</h2>
  <p>
    Wisata Jati Gede merupakan destinasi wisata alam unggulan dengan panorama
    waduk, bukit, dan budaya lokal yang menenangkan. Kami menyediakan paket wisata 
    lengkap mulai dari susur waduk hingga camping ceria bersama keluarga.
  </p>
</section>

<section id="paket" class="container paket">
  <h2>Daftar Paket Wisata</h2>

  <div class="paket-grid">
    
    <article class="paket-card">
      <img src="img/paket1.jpg" alt="Paket Susur Waduk" />
      <div class="paket-body">
        <h3>Paket Susur Waduk</h3>
        <p>Weekend • 4 Jam</p>
        <p>Termasuk sewa perahu dan makan siang khas lokal.</p>
        
        <a href="https://youtu.be/cE67nk6Fwqc?si=0VSwd6wLgOp7nt3P" target="_blank" style="display:block; margin: 10px 0; color: #d32f2f; text-decoration: none; font-weight: bold;">
          ▶ Tonton Video Promosi
        </a>
        
        <p class="harga">Rp 150.000 / pax</p>
        
        <a href="pemesanan.php?paket=Paket Susur Waduk" class="btn">
          Pesan Sekarang
        </a>
      </div>
    </article>

    <article class="paket-card">
      <img src="img/paket2.jpg" alt="Paket Camping" />
      <div class="paket-body">
        <h3>Paket Camping Bukit Panenjoan</h3>
        <p>Harian • 1 Malam</p>
        <p>Termasuk tenda, api unggun, dan sarapan pagi.</p>
        
        <a href="https://youtu.be/rEy7OawJZ4E?si=IIzvhq4A7uWxbFEY target="_blank" style="display:block; margin: 10px 0; color: #d32f2f; text-decoration: none; font-weight: bold;">
          ▶ Tonton Video Promosi
        </a>

        <p class="harga">Rp 250.000 / pax</p>
        
        <a href="pemesanan.php?paket=Paket Camping Bukit Panenjoan" class="btn">
          Pesan Sekarang
        </a>
      </div>
    </article>
    
  </div>
</section>

<section id="galeri" class="container galeri">
  <h2>Galeri</h2>
  <div class="galeri-grid">
    <img src="img/gal1.jpg" alt="Galeri 1">
    <img src="img/gal2.jpg" alt="Galeri 2">
    <img src="img/gal3.jpg" alt="Galeri 3">
    <img src="img/gal4.jpg" alt="Galeri 4">
  </div>
</section>

<footer class="site-footer">
  <p>© 2025 Wisata Jati Gede - Tugas Capstone Project</p>
</footer>

<script>
/* ===== MENU MOBILE ===== */
function toggleMenu(){
  document.getElementById("menu").classList.toggle("open");
}

/* ===== SLIDER ===== */
const slides = document.querySelector(".slides");
const slide = document.querySelectorAll(".slide");
const prev = document.querySelector(".prev");
const next = document.querySelector(".next");
const dotsBox = document.getElementById("dots");

let index = 0;
const total = slide.length;

// Membuat Dots secara otomatis
slide.forEach((_, i) => {
  const d = document.createElement("span");
  d.className = "dot" + (i === 0 ? " active" : "");
  d.onclick = () => moveSlide(i);
  dotsBox.appendChild(d);
});

const dots = document.querySelectorAll(".dot");

function updateSlide(){
  slides.style.transform = `translateX(-${index * 100}%)`;
  dots.forEach(d => d.classList.remove("active"));
  dots[index].classList.add("active");
}

function moveSlide(i){
  index = i;
  updateSlide();
}

next.onclick = () => {
  index = (index + 1) % total;
  updateSlide();
};

prev.onclick = () => {
  index = (index - 1 + total) % total;
  updateSlide();
};

// Auto slide setiap 5 detik
setInterval(() => {
  index = (index + 1) % total;
  updateSlide();
}, 5000);
</script>

</body>
</html>