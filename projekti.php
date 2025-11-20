<?php
$projekti = array_filter(glob('projekti/*'), 'is_dir');
?>
<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Projekti | 3D Design Studio</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    <a href="projekti.php" class="active">Projekti</a>
    <a href="onama.html">O nama</a>
    <a href="usluge.html">Usluge</a>
    <a href="kontakt.html">Kontakt</a>
  </nav>
</header>

<section class="hero1">
  <div class="hero1-overlay">
    <h1>Naši Projekti</h1>
    <p>Inspiracija i realizacija prostora</p>
  </div>
</section>

<section class="projects">
  <div class="project-grid">
    <?php foreach($projekti as $index => $projekt): 
        $folderName = basename($projekt);
        $slike = glob("$projekt/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
        $thumb = $slike[0]; // prva slika kao thumbnail
    ?>
      <div class="project-card">
        <a href="projekt.php?folder=<?= $folderName ?>">
          <img src="<?= $thumb ?>" alt="Projekt <?= $index+1 ?>">
          <h3>Pregledaj galeriju</h3>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</section>

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
          <li><a href="projekti.php">Projekti</a></li>
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
