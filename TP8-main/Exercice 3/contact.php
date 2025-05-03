
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Générateur de mot de passe</title>
</head>
<body>
    <h2>Générateur de mot de passe</h2>

    <form method="post" action="generateur.php">
        <label>Longueur du mot de passe :</label>
        <input type="number" name="longueur" min="4" required><br><br>
        <input type="submit" name="generer" value="Générer">
    </form>

    <?php
    function genererMotDePasse($longueur) {
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+<>?';
        $motDePasse = '';
        $longueurTotal = strlen($caracteres);

        for ($i = 0; $i < $longueur; $i++) {
            $indexAleatoire = rand(0, $longueurTotal - 1);
            $motDePasse .= $caracteres[$indexAleatoire];
        }

        return $motDePasse;
    }

    if (isset($_POST['generer'])) {
        $longueur = $_POST['longueur'];
        if ($longueur < 4) {
            echo "<p style='color:red;'>La longueur doit être d'au moins 4 caractères.</p>";
        } else {
            $motDePasse = genererMotDePasse($longueur);
            echo "<h3>Mot de passe généré :</h3>";
            echo "<p style='font-weight:bold;'>$motDePasse</p>";
        }
    }
    ?>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            color: #2c3e50;
        }

        form {
            width: 40%;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        h3 {
            text-align: center;
            font-size: 20px;
            margin-top: 20px;
            color: #2c3e50;
        }

        p {
            text-align: center;
            font-size: 18px;
            color: #333;
        }

        .error {
            color: red;
            font-weight: bold;
            text-align: center;
        }

        .password {
            font-weight: bold;
            font-size: 24px;
            color: #27ae60;
        }
    </style>
</body>
</html>
