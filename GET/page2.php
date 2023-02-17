<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="bg-primary p-5 text-white">Page 2</h1>
            <a href="page1.php">Aller sur la page 1</a>
            <hr>
            <?php
            // il est possible de récupérer des informations depuis une url
            // s'il y a un ? dans l'url, l'adresse de la page se trouve avant. Ensuite on retrouve des informations complémentaires.
            // Syntaxe :
            // http://monsite.fr/page/?indice1=valeur1&indice2=valeur2&indice3=valeur3&...
            // L'url est représentée par un protocole HTTP : get
            // L'outil correspondant PHP : $_GET
            // $_GET est une superglobale
            // Les superglobales sont des tableaux array

            // $_GET existe toujours puisque lié à protocole HTTP en revanche, s'il n'y pas d'informations complémentaires dans l'url, $_GET est vide

            // echo '<pre>'; var_dump($_GET); echo '</pre>';

            // Affichez proprement (avec un echo) l'information récupérée dans l'url

            if(isset($_GET['categorie'])) {
                echo '<p>La catégorie choisie est : <b>' . htmlspecialchars($_GET['categorie'], ENT_QUOTES) . '</b></p>';

                // htmlspecialchars() permet de transformer notamment les < et > en entités html afin de ne pas avoir une injection XSS

            } else {
                echo '<p>Bonjour,<br>Veuillez passer par la page 1 afin de voir les produits que vous souhaitez.</p>';
            }

            ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>