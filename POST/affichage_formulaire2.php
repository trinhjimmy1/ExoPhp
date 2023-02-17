<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<header class="p-5 bg-primary text-white text-center">
    <h1>Formulaire affichage 2</h1>
</header>

<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
                <?php

                echo '<pre>'; print_r($_POST); echo '</pre>';

                if(isset($_POST['pseudo']) && isset($_POST['email'])) {
                    $pseudo = trim($_POST['pseudo']);
                    $email = trim($_POST['email']);

                    // mise en place d'une variable de contrôle afin de savoir plus bas s'il y a eu une ou des erreurs ou pas.
                    $error = false;

                    // le pseudo ne doit pas être vide
                    if(empty($pseudo)) {
                        echo '<div class="alert alert-danger mb-3">Attentions<br>Le pseudo est obligatoire.</div>';
                        // cas d'erreur
                        $error = true;
                    }

                    if( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo '<div class="alert alert-danger mb-3">Attentions<br>format du mail incorrect.</div>';
                        // cas d'erreur
                        $error = true;
                    }

                    // s'il n'y a pas eu d'erreur, nous allons conserver ces informations dans un fichier créé par php sur le serveur.
                    if($error == false) {
                        // fopen() avec le mode "a" permet d'ouvrir un fichier ou de le créer s'il n'existe pas.
                        // on pourra ensuite stocker des informations dans ce fichier
                        // chaque nouvel enregistrement sera à la suite des précédents
                        // https://www.php.net/manual/fr/function.fopen.php
                        $f = fopen('liste.txt', 'a');

                        // fwrite() permet d'écrire dans un fichier
                        // fwrite($f, $pseudo . ' ' . $email . "\n"); // \n obligatoirement entre guillemets "" permet un retour à la ligne dans un fichier.
                        fwrite($f, $pseudo . ' ' . $email . PHP_EOL); // PHP_EOL pour un retour à la ligne dans le fichier.

                        // pour libérer de l'espace sur le serveur, on ferme le fichier
                        fclose($f);
                    }

                } // fin des isset

                // maintenant nous allons récupérer le contenu du fichier afin de l'afficher dans cette page

                // on vérifie si le fichier existe
                if(file_exists('liste.txt')) {
                    // file() récupère le contenu d'un fichier ou d'une url et place chaque ligne dans un tableau array
                    $contenu_fichier = file('liste.txt');

                    echo '<pre>'; print_r($contenu_fichier); echo '</pre>';

                    // affichez proprement dans une liste ul li les informations récupérées :
                    echo '<ul class="list-group">';
                    foreach($contenu_fichier AS $ligne) {

                        echo '<li class="list-group-item">' . $ligne . '</li>';
                    }
                    echo '</ul>';

                    echo '<ul class="list-group mt-5">';
                    foreach($contenu_fichier AS $ligne) {

                        $infos = explode(' ', $ligne);

                        // echo '<pre>'; print_r($infos); echo '</pre>';
                        echo '<li class="list-group-item"><a href="mailto:' . $infos[1] . '">' . $infos[0] . '</a></li>';
                    }
                    echo '</ul>';

                }
                ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>