<!DOCTYPE html>
<html>
  <head>
    <title>Réservation effectuée</title>
    <style>
      body {
        background-color: white;
      }
      .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }

      .success-emoji {
        font-size: 100px;
      }

      .message {
        color:rgb(128, 128, 128);
        font-size: 30px;
        font-weight: 600;
        font-style: oblique;
        text-align: center;
        margin-top: 20px;
      }

      .button {
        display: inline-block;
        background-color: white;
        color: rgb(128, 128, 128);
        padding: 10px 20px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 20px;
        font-weight: 600;
        margin-top: 20px;
        border: 2px solid rgb(128, 128, 128);
        transition: background-color 0.3s, color 0.3s;
      }

      .button:hover {
        background-color: rgb(88, 84, 84);
        color: white;
      }
      @media (max-width: 480px) {
        .message {
          font-size: 18px;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="success-emoji">✔️</div>
      <div class="message">Merci, Réservation effectuée avec succès.</div>
      <a href="index.php" class="button">🏠 Go Home</a>
    </div>
  </body>
</html>
