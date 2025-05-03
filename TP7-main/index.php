<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
  <style>
    /* Style global */
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f7fc;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    /* Conteneur principal */
    .form-container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 80%;
      max-width: 1000px;
      padding: 20px;
      box-sizing: border-box;
    }
    
    /* Section image */
    .form-image-container {
      width: 50%;
      padding-right: 20px;
    }

    .form-image {
      width: 100%;
      border-radius: 10px;
      object-fit: cover;
    }
    
    /* Section formulaire */
    .form-content {
      width: 50%;
      padding-left: 20px;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }
    
    /* Styles des labels */
    label {
      display: block;
      font-weight: bold;
      color: #555;
    }
    
    /* Styles des champs de saisie */
    .input-group {
      margin-bottom: 15px;
    }
    
    .input-group input {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 2px solid #ddd;
      border-radius: 8px;
      background-color: #f9f9f9;
    }
    
    .input-group input:focus {
      border-color: #4CAF50;
      outline: none;
    }
    
    /* Actions du formulaire */
    .form-actions {
      display: flex;
      justify-content: space-between;
    }
    
    .btn-submit, .btn-reset {
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
    }
    
    .btn-submit {
      background-color: #4CAF50;
      color: white;
    }
    
    .btn-submit:hover {
      background-color: #45a049;
    }
    
    .btn-reset {
      background-color: #f44336;
      color: white;
    }
    
    .btn-reset:hover {
      background-color: #e53935;
    }

    /* Responsive design */
    @media (max-width: 768px) {
      .form-container {
        flex-direction: column;
        padding: 10px;
      }

      .form-image-container,
      .form-content {
        width: 100%;
        padding: 0;
      }

      .form-image {
        width: 100%;
      }
    }
  </style>
</head>
<body>

  <div class="form-container">
    <!-- Section image à gauche -->
    <div class="form-image-container">
      <img src="welcome.png" alt="Bienvenue" class="form-image">
    </div>

    <!-- Section formulaire à droite -->
    <div class="form-content">
      <h2>Inscription</h2>
      <form action="affichage.php" method="POST">
        <div class="input-group">
          <label for="nom">Nom :</label>
          <input type="text" id="nom" name="nom" required>
        </div>

        <div class="input-group">
          <label for="prenom">Prénom :</label>
          <input type="text" id="prenom" name="prenom" required>
        </div>

        <div class="input-group">
          <label for="group">Groupe :</label>
          <input type="number" id="group" name="group" required>
        </div>

        <div class="input-group">
          <label for="sujet">Sujet :</label>
          <input type="text" id="sujet" name="sujet" required>
        </div>

        <div class="input-group">
          <label for="date_debut">Date début :</label>
          <input type="date" id="date_debut" name="date_debut" required>
        </div>

        <div class="input-group">
          <label for="date_fin">Date fin :</label>
          <input type="date" id="date_fin" name="date_fin" required>
        </div>

        <div class="input-group">
          <label for="encadrement">Encadrement :</label>
          <input type="text" id="encadrement" name="encadrement" required>
        </div>

        <div class="form-actions">
          <input type="submit" class="btn-submit" value="Envoyer">
          <input type="reset" class="btn-reset" value="Annuler">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
