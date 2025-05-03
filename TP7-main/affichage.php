<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bienvenue avec Acteurs</title>
  <link href="welcome.png" rel="stylesheet">
  <style>
    /* Style global */
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    /* Conteneur principal */
    .main-container {
      display: flex;
      justify-content: flex-start;
      align-items: flex-start;
      gap: 30px;
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 40px;
      width: 80%;
      max-width: 1200px;
      flex-wrap: wrap;
    }

    /* Section image */
    .image-section {
      width: 50%; /* Ajuster la largeur de l'image */
      text-align: center;
    }

    img {
      width: 100%;
      border-radius: 10px;
      object-fit: cover;
    }

    /* Section formulaire */
    .form-section {
      width: 45%; /* Ajuster la largeur du formulaire */
      max-width: 600px;
    }

    h2 {
      text-align: center;
      font-size: 24px;
      color: #333;
      margin-bottom: 20px;
    }

    form p {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-size: 16px;
      font-weight: 500;
      color: #555;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"] {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      border: 2px solid #ddd;
      border-radius: 8px;
      background-color: #f9f9f9;
      transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="date"]:focus {
      border-color: #007bff;
      outline: none;
    }

    .btn-retour {
      display: inline-block;
      padding: 12px 30px;
      background-color: #28a745;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
      transition: background-color 0.3s ease;
      margin-top: 20px;
    }

    .btn-retour:hover {
      background-color: #218838;
    }

    @media (max-width: 768px) {
      .main-container {
        flex-direction: column;
        gap: 20px;
      }

      .image-section,
      .form-section {
        width: 80%;
      }

      img {
        width: 100%; /* Ajuster la largeur de l'image */
      }
    }
  </style>
</head>
<body>
  <div class="main-container">
    <!-- Section image à gauche -->
    <div class="image-section">
      <img src="welcome.png" alt="Acteurs de bienvenue" />
    </div>

    <!-- Section formulaire à droite -->
    <div class="form-section">
      <h2>Informations soumises :</h2>
      <form action="" method="POST">
        <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $nom = htmlspecialchars($_POST['nom']);
              $prenom = htmlspecialchars($_POST['prenom']);
              $group = htmlspecialchars($_POST['group']);
              $sujet = htmlspecialchars($_POST['sujet']);
              $date_debut = htmlspecialchars($_POST['date_debut']);
              $date_fin = htmlspecialchars($_POST['date_fin']);
              $encadrement = htmlspecialchars($_POST['encadrement']);

              echo "<p><label>Nom :</label><input type='text' value='$nom' readonly></p>";
              echo "<p><label>Prénom :</label><input type='text' value='$prenom' readonly></p>";
              echo "<p><label>Groupe :</label><input type='text' value='$group' readonly></p>";
              echo "<p><label>Sujet :</label><input type='text' value='$sujet' readonly></p>";
              echo "<p><label>Date début :</label><input type='date' value='$date_debut' readonly></p>";
              echo "<p><label>Date fin :</label><input type='date' value='$date_fin' readonly></p>";
              echo "<p><label>Encadrement :</label><input type='text' value='$encadrement' readonly></p>";
          } else {
              echo "<p>Aucune donnée soumise.</p>";
          }
        ?>
        <a href="index.php" class="btn-retour">Retour</a>
      </form>
    </div>
  </div>
</body>
</html>
