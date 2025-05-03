<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<?php
$host = 'localhost';
$user = 'root';
$pass = '2001';
$dbname = 'gestion_stock';
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $groupe = $_POST['group'];
    $sujet = $_POST['sujet'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $encadrement = $_POST['encadrement'];
    $sql = "INSERT INTO etudiants (nom, prenom, groupe, sujet, date_debut, date_fin, encadrement)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissss", $nom, $prenom, $groupe, $sujet, $date_debut, $date_fin, $encadrement);

    if ($stmt->execute()) {
        echo "<h3 style='color: green;'> Les informations ont été enregistrées avec succès !</h3>";
    } else {
        echo "<h3 style='color: red;'> Erreur lors de l'enregistrement : " . $stmt->error . "</h3>";
    }
    $stmt->close();
}
$conn->close();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $group = $_POST['group'];
    $sujet = $_POST['sujet'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $encadrement = $_POST['encadrement'];
    
    echo "<h2>Informations soumises :</h2>";
    echo "<p><strong>Nom :</strong> " . $nom . "</p>";
    echo "<p><strong>Prénom :</strong> " . $prenom . "</p>";
    echo "<p><strong>Groupe :</strong> " . $group . "</p>";
    echo "<p><strong>Sujet :</strong> " . $sujet . "</p>";
    echo "<p><strong>Date début :</strong> " . $date_debut . "</p>";
    echo "<p><strong>Date fin :</strong> " . $date_fin . "</p>";
    echo "<p><strong>Encadrement :</strong> " . $encadrement . "</p>";
} else {
    echo "<p>Aucune donnée soumise.</p>";
}
?>
</body>
</html>
