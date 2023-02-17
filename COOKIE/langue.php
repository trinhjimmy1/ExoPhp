<?php

if( isset($_GET['langue']) ) {
    $choix = $_GET['langue'];
} else {
    $choix = 'fr';
}

switch($choix) {
    case 'en' :
        $content = '<h4>Hello,<br>welcome to our site, you are visiting the site in English</h4>';
        break;
    case 'it' :
        $content = '<h4>Ciao,<br>benvenuto nel nostro sito, stai visitando il sito in lingua italiana</h4>';
        break;
    case 'es' :
        $content = '<h4>Hola, <br>bienvenido a nuestro sitio, estas visitando el sitio en idioma español</h4>';
        break;
    default :
        $content = '<h4>Bonjour,<br>bienvenue sur notre site, vous visitez le site en langue française</h4>';
        break;
}


// calcul d'une année en seconde :
$un_an = 365 * 24 * 3600;

// https://www.php.net/manual/fr/function.setcookie
// setcookie(SON_NOM, sa_valeur, duree_de_vie);
setcookie('LANG', $choix, time() + $un_an);

// pour supprimer un cookie :
// setcookie('LANG', $choix, time() - 1);

// Pour créer un cookie qui sera naturellement supprimé lors de la fermeture du navigateur
// setcookie('LANG', $choix);


?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Langue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-3">
            <ul class="list-group">
                <li class="list-group-item"><a href="?langue=fr">Français</a></li>
                <li class="list-group-item"><a href="?langue=it">Italien</a></li>
                <li class="list-group-item"><a href="?langue=es">Espagnol</a></li>
                <li class="list-group-item"><a href="?langue=en">Anglais</a></li>
            </ul>
        </div>
        <div class="col-sm-9">
            <?= $content ?>
            <?= time(); // nous renvoie le timestamp (nombre de seconde écoulées depuis le 01/01/1970) ?>

        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>