<?php
if(!isset($_GET['folder'])){
    header('Location: projekti.php');
    exit();
}

$folder = basename($_GET['folder']); // sigurnost
$path = "projekti/$folder";

if(!is_dir($path)){
    die("Projekt ne postoji");
}

$slike = glob("$path/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
?>
<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $folder ?> | 3D Design Studio</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
.gallery {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 15px;
  padding: 20px;
}
.gallery img {
  width: 100%;
  border-radius: 8px;
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.gallery img:hover {
  transform: scale(1.05);
  box-shadow: 0 10px 20px rgba(0,0,0,0.3);
}
.lightbox {
  position: fixed;
  top:0; left:0;
  width:100%; height:100%;
  background: rgba(0,0,0,0.8);
  display:flex;
  justify-content:center;
  align-items:center;
  visibility:hidden;
  opacity:0;
  transition: opacity 0.3s ease;
  z-index:1000;
}
.lightbox img {
  max-width:90%;
  max-height:90%;
  border-radius: 8px;
}
.lightbox.visible {
  visibility: visible;
  opacity:1;
}
</style>
</head>
<body>
<header>
  <div class="logo-container">
    <a href="index.html" class="logo-link">
      <img src="img/3dstudiotransparent-bijela.png" alt="3D Studio Logo" class="logo">
      <span class="logo-text">Studio</span>
      <span class="logo-highlight">3D</span>
    </a>
  </div>
  <nav class="navbar">
    <a href="index.html">Početna</a>
    <a href="projekti.php">Projekti</a>
    <a href="onama.html">O nama</a>
    <a href="usluge.html">Usluge</a>
    <a href="kontakt.html">Kontakt</a>
  </nav>
</header>

<section class="hero1">
  <div class="hero1-overlay">
    <h1><?= $folder ?></h1>
    <p>Galerija projekta</p>
  </div>
</section>

<section class="gallery">
  <?php foreach($slike as $slika): ?>
    <img src="<?= $slika ?>" alt="">
  <?php endforeach; ?>
</section>

<div class="lightbox" id="lightbox">
  <img src="" alt="Uvećana slika">
</div>

<script>
const lightbox = document.getElementById('lightbox');
const lightboxImg = lightbox.querySelector('img');
const galleryImgs = document.querySelectorAll('.gallery img');

galleryImgs.forEach(img => {
  img.addEventListener('click', () => {
    lightbox.classList.add('visible');
    lightboxImg.src = img.src;
  });
});

lightbox.addEventListener('click', () => {
  lightbox.classList.remove('visible');
});
</script>

  <footer>
    <div class="footer-container">
      <div class="footer-section">
        <h3>Kontakt</h3>
        <p>Tel: 0911231234</p>
        <p>Email: lana@gmail.com</p>
      </div>

      <div class="footer-section">
        <h3>Brzi linkovi</h3>
        <ul>
          <li><a href="index.html" class="active">Početna</a></li>
          <li><a href="projekti.html">Projekti</a></li>
          <li><a href="onama.html">O nama</a></li>
          <li><a href="kontakt.html">Kontakt</a></li>
        </ul>
      </div>

      <div class="footer-section">
        <h3>Posjetite nas!</h3>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; 2025 3D Design Studio | Dizajn nije samo ono što vidite, već ono što osjećate u prostoru.</p>
    </div>
  </footer>
</body>
</html>
