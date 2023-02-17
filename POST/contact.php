<?php

if(isset($_POST['destinataire']) && isset($_POST['expediteur']) && isset($_POST['sujet']) && isset($_POST['message'])) {
    // mail() : https://www.php.net/manual/fr/function.mail.php

    // Pour aller plus loin sur l'envoie de mail :
    // PHPMailer : https://github.com/PHPMailer/PHPMailer
    // Mailer (symfony) : https://symfony.com/doc/current/mailer.html

    // mail(destinataire, sujet, message, expediteur)
    mail($_POST['destinataire'], $_POST['sujet'], $_POST['message'], 'From: ' . $_POST['expediteur']);
}

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<header class="p-5 bg-primary text-white text-center">
    <h1>Contact</h1>
</header>

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto mt-5">
            <form method="post" class="border p-3">
                <div class="mb-3">
                    <label for="destinataire" class="form-label">Destinataire</label>
                    <input type="text" class="form-control" id="destinataire" name="destinataire">
                </div>
                <div class="mb-3">
                    <label for="expediteur" class="form-label">Expéditeur</label>
                    <input type="text" class="form-control" id="expediteur" name="expediteur">
                </div>
                <div class="mb-3">
                    <label for="sujet" class="form-label">sujet</label>
                    <input type="text" class="form-control" id="sujet" name="sujet">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-outline-primary w-100" id="envoyer" value="Envoyer">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>