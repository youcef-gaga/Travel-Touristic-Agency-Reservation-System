<?php include 'connectDB.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Agence de voyage - Détails du voyage</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">
  <!-- Wrapper -->
<div id="wrapper">
    <header id="header">
        <div class="inner">
          <!-- Logo -->
          <a href="index.php" class="logo">
            <img src="images/logo2.0.png" alt="Logo" />
          </a>
         
        </div>
      </header>

 <div id="main">
  <div class="inner">
      <?php
      // Vérifier si l'ID du voyage a été spécifié dans l'URL
      if (isset($_GET['id'])) {
      // Récupération de l'ID du voyage depuis l'URL
      $voyage_id = $_GET['id'];

      // Requête pour récupérer les informations du voyage depuis la base de données
      $sql = "SELECT nom_voyage, date_depart, date_retour, info_voyage, prix, places_max, places_reserve FROM voyage WHERE id = $voyage_id";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Affichage des informations du voyage
        $row = $result->fetch_assoc();
        $places_restantes = $row["places_max"] - $row["places_reserve"];
        ?>
        <h1 style="color: #090D5D;" ><?php echo $row["nom_voyage"]; ?></h1>

        <div class="container-fluid">
          <div class="row">
            

          <div class="col-lg-8 col-md-7">
  <div id="carouselExample" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExample" data-slide-to="1"></li>
      <li data-target="#carouselExample" data-slide-to="2"></li>
      <li data-target="#carouselExample" data-slide-to="3"></li>
      <li data-target="#carouselExample" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="images/restaurant.jpg" alt="Slide 1" />
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/lobby.jpg" alt="Slide 2" />
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/hotelroom.jpg" alt="Slide 3" />
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/beach.jpg" alt="Slide 4" />
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/Pool5.jpg" alt="Slide 5" />
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>




            
            <div class="col-lg-4 col-md-5">
              <h3 style="color: #090D5D;"><br/>Détails du voyage:</h3>

              <p>
                - Date de départ:<span style="color: red;"><?php echo $row["date_depart"]; ?></span> <br />
                - Date de retour:<span style="color: red;"><?php echo $row["date_retour"]; ?></span> <br />
                - Plan Du Vol: <br/><?php echo $row["info_voyage"]; ?><br />
                - Prix: <br/><?php echo $row["prix"]; ?><br />
                - Places restantes:<span style="color: red;"><?php echo $places_restantes; ?></span> <br />
              </p>

              <?php if ($places_restantes > 0) { ?>
                <a href="#footer" class="button primary scrolly">Réserver Maintenant</a>
              <?php } else { ?>
                <p style="color: red;">Désolé, Places réservées complètes.</p>
              <?php } ?>
            </div>
          </div>
        </div>

        <br />
        <br />
        <?php } else { ?>
        <p style="color: red;">Désolé, Aucun voyage disponible.</p>
        <?php }
      } ?>
    </div>
  </div>


   <footer id="footer">
  <div class="inner">
    <?php if ($places_restantes > 0) { ?>
      <section>
        <h2 style="color: #090D5D;">Réserver votre place</h2>
        <form method="post" action="">
          <div class="fields">
            <div class="field half">
              <input type="text" name="nom" id="nom" placeholder="Nom" required />
            </div>
            <div class="field half">
              <input type="text" name="prenom" id="prenom" placeholder="Prénom" required />
            </div>
            <div class="field half">
              <select id="genre" name="genre" required>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="autre">Autre</option>
              </select>
            </div>
            <div class="field half">
              <input type="number" name="age" id="age" placeholder="Âge" required min="0" max="100"/>
            </div>
             <div class="field half">
              <input type="tel" name="telephone" id="telephone" placeholder="Numéro de téléphone" required pattern="[0-9]{10}" title="Veuillez saisir un numero valide" maxlength="10" />
             </div>

            <div class="field half">
              <input type="email" name="email" id="email" placeholder="Email" />
            </div>
            <div class="field half">
              <input type="tel" name="numero_passport" id="numero_passport" placeholder="Numéro de Passport" required pattern="[0-9]{9}" title="Veuillez saisir un numero valide"  maxlength="9"/>
             </div>
            <div class="field half">
              <input type="number" name="autre_membre" id="autre_membre" placeholder="Autres Membres?" required min="0"/>
            </div>
            
            <div class="field half">
              <div class="commentaire"><span style="color: red;">Veuillez mettre 0 si vous avez aucun autre membre</span></div>
            </div>

            <div class="field text-right">
              <label>&nbsp;</label>
              <ul class="actions">
                <li>
                  <input type="submit" value="Réserver" class="primary" />
                </li>
              </ul>
            </div>
          </div>
        </form>

        <?php
        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Récupérer les données du formulaire
          $nom = $_POST["nom"];
          $prenom = $_POST["prenom"];
          $genre = $_POST["genre"];
          $age = $_POST["age"];
          $telephone = $_POST["telephone"];
          $email = $_POST["email"];
          $numero_passport = $_POST["numero_passport"];
          $autre_membre = $_POST["autre_membre"];


        

          // Vérifier si les mêmes informations existent déjà dans la table "personnes"
          $verificationSql = "SELECT id FROM personnes WHERE nom = '$nom' AND prenom = '$prenom' AND genre = '$genre' AND age = $age AND numero_telephone = '$telephone' AND email = '$email' AND id_voyage = $voyage_id AND numero_passport = '$numero_passport'   ";
          $verificationResult = $conn->query($verificationSql);

          if ($verificationResult->num_rows > 0) {
            echo "Vous avez déjà réservé une place avec les mêmes informations.";
          } else  {
          if ($places_restantes >= $autre_membre +1){
            // Insérer les données dans la table "personnes"
            $sql = "INSERT INTO personnes (nom, prenom, genre, age, numero_telephone, numero_passport, email, id_voyage, autre_membre) VALUES ('$nom', '$prenom', '$genre', $age, '$telephone', '$numero_passport', '$email', '$voyage_id', $autre_membre)";

            if ($conn->query($sql) === TRUE) {
              // Mise à jour de la colonne "places_reservé" dans la table "voyage"
              $updateSql = "UPDATE voyage SET places_reserve = places_reserve + 1 + l$autre_membre WHERE id = $voyage_id";
              if ($conn->query($updateSql) === TRUE) {
                 //header("Location: succes.php"); // Redirection vers index.php
                 //exit;
                echo '<script>
                         window.location.href = "succes.php";
                       </script>';
                exit;
              } else {
                echo "Désolé, il n'y a Erreur lors de la mise à jour des places réservées : ";
              }
              
            } else {
              echo "Désolé, il n'y a une Erreur lors de la réservation : " /*. $conn->error*/;
            }
           }
           else {
                echo "Désolé, il n'y a pas suffisamment de places disponibles. ";
              }
              
          }
        }
        ?>
      </section>
    <?php } ?>
    
    
  </div>
    
    <br/>
    <br/>
    
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
  <script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
</body>
</html>
