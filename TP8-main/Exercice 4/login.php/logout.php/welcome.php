<?php
session_start();

if (!isset($_SESSION['utilisateur'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue</title>
    <style>
        body {
            background-color: #f7fafc;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: 100px auto;
            text-align: center;
            border: 2px solid #e2e8f0;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            color: #4a5568;
            margin-bottom: 1.5rem;
        }

        p {
            font-size: 16px;
            color: #4a5568;
        }

        a {
            display: inline-block;
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 1rem;
            text-align: center;
        }

        a:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bienvenue, <?php echo $_SESSION['utilisateur']; ?> !</h2>
        <p>Vous êtes maintenant connecté.</p>
        <p><a href="logout.php?logout=true">Déconnexion</a></p>
    </div>
</body>
</html>
