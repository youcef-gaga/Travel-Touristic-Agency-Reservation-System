<?php include 'connectDB.php'; ?>
<!DOCTYPE html>
<html>
  <head>

    <title>Agence de voyage</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no"
    />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript
      ><link rel="stylesheet" href="assets/css/noscript.css"
    /></noscript>

  </head>

  <body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
      <!-- Header -->
      <header id="header">
        <div class="inner">
          <!-- Logo -->
          <a href="index.php" class="logo">
            <img src="images/logo2.0.png" alt="Logo" />
          </a>
         
        </div>
      </header>

      <!-- Main -->
      <div id="main">
        <div
          id="carouselExampleIndicators"
          class="carousel slide"
          data-ride="carousel"
           >
          <ol class="carousel-indicators">
            <li
              data-target="#carouselExampleIndicators"
              data-slide-to="0"
              class="active"
            ></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                class="d-block w-100"
                src="images/egypte4.jpg"
                alt="First slide"
              />
            </div>
            <div class="carousel-item">
              <img
                class="d-block w-100"
                src="images/egypte2.jpg"
                alt="Second slide"
              />
            </div>
            <div class="carousel-item">
              <img
                class="d-block w-100"
                src="images/egypte3.jpg"
                alt="Third slide"
              />
            </div>
            <div class="carousel-item">
              <img
                class="d-block w-100"
                src="images/egypte.jpg"
                alt="fourth slide"
              />
            </div>
            
          </div>
          <a
            class="carousel-control-prev"
            href="#carouselExampleIndicators"
            role="button"
            data-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a
            class="carousel-control-next"
            href="#carouselExampleIndicators"
            role="button"
            data-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <br />
        <br />

        <div class="inner">
          <!-- About Us -->
          <header id="inner">
            <p style="font-size: 170%;">
              Meilleur programme de la saison estivale  <span style="color: red;">12</span> jours <span style="color: red;">13</span>  jours et <span style="color: red;">11</span> jours sharm el sheikh Cairo 🤩🤩 
              Lechoixduroi vous offre Voyage organisé  combine LE CAIRE- SHARM EL SHEIKH 💼 excellent programme de <span style="color: red;">12</span> jours !! ❤️❤️
            </p>
          </header>

          <br />

          <h2 class="h2" style="color: #090D5D;">Voyage Disponible</h2>

          <!-- Packages -->
          <section class="tiles">
						
					<?php
// Récupération des voyages depuis la base de données
$sql = "SELECT id, nom_voyage, date_depart, date_retour, places_max, places_reserve FROM voyage";
$result = $conn->query($sql);
if ($result === false) {
    echo "Database Error: " . $conn->error;
    exit;
}
if ($result->num_rows > 0) {
    // Affichage des voyages
    while ($row = $result->fetch_assoc()) {
        $places_restantes = $row["places_max"] - $row["places_reserve"];
        echo '<article class="style1">';
        echo '<span class="image">';
        echo '<img src="images/Pool5.jpg" alt="" />';
        echo '</span>';
        echo '<a href="voyage.php?id=' . $row["id"] . '">';
        echo '<h2>' . $row["nom_voyage"] . '</h2>';
        //echo '<p><strong>prix</strong></p>';
        echo '<p>';
        echo '<i class="fa fa-plane"></i> ' . $row["date_depart"] . ' &nbsp;';
        echo '<i class="fa fa-calendar"></i>  ' . $row["date_retour"] . '&nbsp;';
        echo '</p>';
        echo '</a>';
        echo '</article>';
    }
} else {
    echo "Aucun voyage programmé.";
}


$conn->close();
?>

						
          </section>

          <br />

          <br />
        </div>
      </div>

      <!-- Footer -->
      <footer id="footer">
        <div class="inner">
          <section>
            <h2 style="color: #090D5D;">Contact Info</h2>

            <ul class="alt">
              <li>
                <span class="fa fa-envelope-o"></span>
                <a href="#">Booking@lechoixduroib2c.com</a>
              </li>
              <li>
                <span class="fa fa-envelope-o"></span>
                <a href="">lechoixduroibooking@gmail.com
                </a>
              </li>
              <li>
                <span class="fa fa-envelope-o"></span>
                <a href="">Resa@lechoixduroibooking.com</a>
              </li>
              <li><span class="fa fa-phone"></span>0562 00 30 20</li>
              <li><span class="fa fa-phone"></span>0561 00 09 10</li>
              <li><span class="fa fa-phone"></span>0555 90 68 01</li>
              <li><span class="fa fa-phone"></span>0553 85 59 42</li>

              <li>
                <span class="fa fa-map-pin"></span> LECHOIXDUROI, Rue Sbaa Abderrahmane, Bachdjerah 16000, Kouba, Algeria
              </li>
            </ul>

            <h2 style="color: #090D5D;">Nous suivre</h2>

            <ul class="icons">
              
              <li>
                <a href="https://www.facebook.com/profile.php?id=100079189623298" class="icon style2 fa-facebook"
                  ><span class="label">Facebook</span></a
                >
              </li>
              <li>
                <a href="https://www.instagram.com/lechoixduroi_marketplace/" class="icon style2 fa-instagram"
                  ><span class="label">Instagram</span></a
                >
              </li>
              <li>
                <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fmaps.app.goo.gl%2FLLLBxDwZSuu4rGpT6%3Ffbclid%3DIwAR1Pk-0mOh0_Y1nk6IFIf3b4koCFV2Lpg4A6aBhcz3xT32K0r3LLdO6YPmQ&h=AT0f_cew3O3YmhhrRcA-H15vtYg14itmGN1fdIV7kbytT8u6UV6Tam8VTcPnqGX9PC1aA7E8W6BBlC37n-FmWxxBhTCnxM7XF1qKjxMN34e65zdTHpPDaXlpTLU1l6MfX61Z&__tn__=-UK-R&c[0]=AT03VEp9sb0K5Gj6mszUpFM6GDE6oIT2YtQXfg1ccsfr01ejdg8Q927tHnJgdlX8tosZbpuXfLwpZltLNM6BqombL8w6yvzB1BC23BPaayue3qd7Duv78sVmdpAb2PxHl7PDBgwoUQsMmVmHWYOmcsgYsBuYhA" class="icon style2 fa-map"
                  ><span class="label">Instagram</span></a
                >
              </li>
             
            </ul>
          </section>
        </div>
      </footer>
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
