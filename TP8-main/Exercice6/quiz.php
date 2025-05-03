<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Mathématiques</title>
</head>
<body>
    <div class="container">
        <h2>Quiz de Mathématiques</h2>
        <?php if (empty($resultats)): ?>
            <form method="post" action="">
                <?php foreach ($questions as $question => $data): ?>
                    <div class="question">
                        <strong><?php echo $question; ?></strong>
                        <?php foreach ($data['réponses'] as $rep): ?>
                            <label class="answer-option">
                                <input type="radio" name="<?php echo md5($question); ?>" value="<?php echo $rep; ?>" required>
                                <?php echo $rep; ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
                <button type="submit" name="valider">Valider</button>
            </form>
        <?php else: ?>
            <div class="results">
                <h3>Résultats :</h3>
                <?php foreach ($resultats as $question => $res): ?>
                    <div class="result">
                        <p><strong><?php echo $question; ?></strong></p>
                        <p>Votre réponse : <span><?php echo $res['utilisateur']; ?></span></p>
                        <?php if ($res['juste']): ?>
                            <p class="correct">Bonne réponse !</p>
                        <?php else: ?>
                            <p class="incorrect">Faux. Réponse correcte : <span><?php echo $res['correcte']; ?></span></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                <hr>
                <div class="score">
                    <p>Votre score : <?php echo $score; ?> / <?php echo count($questions); ?></p>
                </div>
                <div class="retry-button">
                    <form method="post" action="">
                        <button type="submit" name="retry" value="1">Réessayer</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <style>
        body {
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .question {
            background-color: #ecf0f1;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .question strong {
            font-size: 18px;
            color: #34495e;
            display: block;
            margin-bottom: 10px;
        }

        .answer-option {
            display: block;
            margin: 10px 0;
            font-size: 16px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color:rgb(53, 12, 150);
            color: #fff;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color:rgb(206, 13, 54);
        }

        .results {
            margin-top: 30px;
            padding: 20px;
            background-color: #ecf0f1;
            border-radius: 8px;
        }

        .result {
            margin-bottom: 15px;
        }

        .result span {
            font-weight: bold;
        }

        .correct {
            color: #2ecc71;
        }

        .incorrect {
            color: #e74c3c;
        }

        .score {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }

        .retry-button {
            text-align: center;
            margin-top: 20px;
        }

        hr {
            margin: 30px 0;
            border: 0;
            border-top: 1px solid #ccc;
        }
    </style>
</body>
</html>
<?php
$questions = [
    "Soit n un entier naturel. L'expression n(n+1) est toujours :" => [
        "réponses" => ["Un nombre pair", "Un nombre impair", "Un nombre premier"],
        "correcte" => "Un nombre pair"
    ],
    "Le carré de 5 est égal à :" => [
        "réponses" => ["10", "25", "15"],
        "correcte" => "25"
    ],
    "La dérivée de x² est :" => [
        "réponses" => ["2x", "x", "x²"],
        "correcte" => "2x"
    ],
    "La somme des angles d’un triangle est égale à :" => [
        "réponses" => ["90°", "180°", "360°"],
        "correcte" => "180°"
    ]
];

$score = 0;
$resultats = [];
if (isset($_POST['valider'])) {
    foreach ($questions as $question => $data) {
        $reponse_utilisateur = $_POST[md5($question)] ?? '';
        $bonne_reponse = $data['correcte'];
        $resultats[$question] = [
            "utilisateur" => $reponse_utilisateur,
            "correcte" => $bonne_reponse,
            "juste" => $reponse_utilisateur === $bonne_reponse
        ];
        if ($reponse_utilisateur === $bonne_reponse) {
            $score++;
        }
    }
}
?>

