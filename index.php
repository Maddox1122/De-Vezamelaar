<?php
if (isset($_GET['message'])) {
  $message = $_GET['message'];
} else {
  $message = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="./Css/Home.css" />
  <link rel="stylesheet" href="./Css/Nav.css" />
  <link rel="stylesheet" href="./Css/footer.css" />
  <script src="https://kit.fontawesome.com/15e3ed1574.js" crossorigin="anonymous" defer></script>
  <script src="./Js/SlideShow.js" defer></script>
</head>

<body>
  <?php
  if ($message != "") {
    echo "Uw Bestelling is " . $message;
  }
  ?>
  <header>
    <nav>
      <li><a href="#">Home</a></li>
      <li><a href="./Pages/verzmeling.php">Verzameling</a></li>
      <li><a href="./Pages/contact.php">Contact</a></li>
    </nav>
  </header>
  <main>
    <section class="main-section">
      <div class="games-container">
        <div class="slideshow-container">
          <img class="mySlides" src="Media/cod-mw-3.jpg" width="400px" height="500px" />
          <img class="mySlides" src="Media/devil-may-cry.jpg" width="400px" height="500px" />
          <img class="mySlides" src="Media/god of war.webp" width="400px" height="500px" />
          <img class="mySlides" src="Media/diablo.jpg" width="400px" height="500px" />
          <img class="mySlides" src="Media/Lies of p.jpg" width="400px" height="500px" />
          <img class="mySlides" src="Media/resident evil 4.jpg" width="400px" height="500px" />
          <a class="info-link" href="./Pages/verzmeling.php">Bekijk Verzameling -></a>
        </div>
      </div>
      <div class="intro-verhaal">
        <div class="circle"></div>
        <div class="circle-2"></div>
        <h1>Koop hier uw games</h1>
        <p>
          Op deze website vind je unieke stukken uit mijn persoonlijke
          gamecollectie te koop. Blader door mijn verzameling en ontdek
          zeldzame schatten die nu beschikbaar zijn voor jou om te
          bemachtigen. Duik in de wereld van gaminggeschiedenis en voeg een
          stukje ervan toe aan jouw eigen collectie. Welkom in mijn virtuele
          gamecollectiewinkel!
        </p>
      </div>
    </section>
    <section class="about-section">
      <div class="about-text">
        <div class="circle-3"></div>
        <div class="circle-4"></div>
        <h1>Over De Verzamelaars</h1>
        <p>
          Welkom bij de Verzamelaars, dé plek voor unieke verzamelingen en
          collectie-items van games. Wij bieden items uit diverse gamegenres,
          dus er is voor elk wat wils. Neem gerust een kijkje en laat je
          verrassen door ons uitgebreide assortiment. Heb je vragen of
          opmerkingen? Aarzel dan niet om onze contactpagina te bezoeken. Wij
          staan klaar om je te helpen!
        </p>
      </div>
      <div class="about-img">
        <img src="./Media/f84de46a3e32c9bca38ed3f1649b7b61.jpg" alt="" />
      </div>
    </section>
  </main>
  <div class="my-5 footer-container">
    <footer class="text-center text-white">
      <div class="container">
        <section class="mb-5">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <p><a href="">Neem contact op met ons -></a></p>
            </div>
          </div>
        </section>
        <section class="text-center mb-5 socials">
          <a href="#" class="text-white me-4">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="text-white me-4">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="text-white me-4">
            <i class="fab fa-google"></i>
          </a>
          <a href="#" class="text-white me-4">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="text-white me-4">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="#" class="text-white me-4">
            <i class="fab fa-github"></i>
          </a>
        </section>
      </div>
      <div class="text-center p-3">© 2023 Copyright: De Verzamelaars</div>
    </footer>
  </div>
</body>

</html>