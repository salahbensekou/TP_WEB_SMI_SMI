<?php
$nom_fichier = "messages.txt";

if (isset($_POST['envoyer'])) {
    $nom = trim($_POST['nom']);
    $message = trim($_POST['message']);

    if (!empty($nom) && !empty($message)) {
        $date = date("d/m/Y H:i:s");
        $ligne = "$date | $nom : $message" . PHP_EOL;
        file_put_contents($nom_fichier, $ligne, FILE_APPEND);
    }
}

$messages = [];
if (file_exists($nom_fichier)) {
    $messages = file($nom_fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

if (isset($_GET['delete'])) {
    $index_to_delete = $_GET['delete'];
    unset($messages[$index_to_delete]);
    $messages = array_values(array_filter($messages, fn($m) => trim($m) !== ''));
    file_put_contents($nom_fichier, implode(PHP_EOL, $messages));
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Livre d'or</title>
    <script>
        function validateForm() {
            var nom = document.forms["livreForm"]["nom"].value;
            var message = document.forms["livreForm"]["message"].value;
            if (nom.trim() === "" || message.trim() === "") {
                document.getElementById("error-message").innerHTML = "Veuillez remplir tous les champs.";
                return false;
            }
            return true;
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Laissez un message</h2>

    <form name="livreForm" method="post" action="" onsubmit="return validateForm()">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" placeholder="Votre nom">

        <label for="message">Message :</label>
        <textarea name="message" id="message" rows="4" placeholder="Votre message..."></textarea>

        <input type="submit" name="envoyer" value="Envoyer">
    </form>

    <div id="error-message" class="error-message"></div>

    <h3>Messages :</h3>

    <div class="messages">
        <?php
        if (!empty($messages)) {
            foreach ($messages as $index => $msg) {
                if (strpos($msg, " | ") !== false && strpos($msg, " : ") !== false) {
                    list($date, $user_message) = explode(" | ", $msg, 2);
                    list($user, $message) = explode(" : ", $user_message, 2);
                    echo "<div class='message'>
                            <div class='message-content'>
                                <p><strong>$user</strong>: $message</p>
                                <span>Posté le $date</span>
                            </div>
                            <a href='?delete=$index' class='delete-btn'>Supprimer</a>
                          </div>";
                }
            }
        } else {
            echo "<p class='no-message'>Aucun message pour le moment.</p>";
        }
        ?>
    </div>
</div>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f2f5;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 40px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        color:rgb(63, 11, 159);
        margin-bottom: 20px;
    }

    form {
        margin-bottom: 30px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
    }

    input[type="text"], textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 15px;
        background-color: #f9f9f9;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus, textarea:focus {
        border-color:rgb(40, 9, 126);
        outline: none;
    }

    input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color:rgb(65, 10, 142);
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #357ABD;
    }

    .messages {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .message {
        background-color: #fff;
        padding: 18px;
        border-left: 6px solid #4A90E2;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .message-content {
        max-width: 80%;
    }

    .message-content p {
        margin: 0;
        font-size: 16px;
        color: #333;
    }

    .message-content span {
        font-size: 14px;
        color: #888;
        margin-top: 5px;
        display: block;
    }

    .delete-btn {
        background-color: #FF6F61;
        color: white;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .delete-btn:hover {
        background-color: #E54B3A;
    }

    .no-message {
        text-align: center;
        color: #999;
        font-size: 14px;
        margin-top: 20px;
    }

    .error-message {
        color: red;
        text-align: center;
        margin-top: 10px;
        font-size: 14px;
    }
</style>
</body>
</html>
