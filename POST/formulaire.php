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
    <h1>Formulaire</h1>
</header>

<div class="container">
    <div class="row">
        <div class="col-4 mx-auto">
            <!--
                Attributs du formulaire :
                -------------------------
                method="" : la methode utilisée pour récupérer les données (par defaut : GET)
                action="" : la page cible lors de la validation du form et aussi là où seront envoyées les données du form
                enctype="multipart/form-data" : obligatoire s'il y a des pièces jointes dans le form (input type="file"), les pièces seront disponibles dans la superglobale $_FILES

                Champs :
                --------
                name="" : le nom du champ correspondant à l'indice que l'on retrouvera dans $_GET ou $_POST

            -->
            <p class="mt-5">
                <?php
                // affichez proprement les informations provenants du formulaire
                // La superglobale : $_POST
                // $_POST existe toujours mais par défaut est vide. Si le form est validé on retrouve les informations dans notre superglobale.
                // Mettre en place un controle sur le pseudo : le pseudo doit avoir entre 5 et 20 caractères : affichez un message d'erreur ou de validation
                echo '<pre>'; print_r($_POST); echo '</pre>';

                if( isset($_POST['pseudo']) && isset($_POST['email'])) {
                    echo 'Pseudo : ' . $_POST['pseudo'] . '<br>';
                    echo 'Email : ' . $_POST['email'] . '<hr>';

                    // on place les informations dans des variables plus simple en écriture et on applique un trim() afin d'enlever les espaces et début et en fin de chaine.
                    $pseudo = trim($_POST['pseudo']);
                    $email = trim($_POST['email']);

                    if(iconv_strlen($pseudo) < 5 || iconv_strlen($pseudo) > 20) {
                        echo '<div class="alert alert-danger">Attention, <br>le pseudo doit avoir entre 5 et 20 caractères inclus</div>';
                    } else {
                        echo '<div class="alert alert-success">Pseudo ok !</div>';
                    }

                    // controle du format mail
                    if( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo '<div class="alert alert-danger mt-3">Attention, <br>format du mail incorrect.</div>';
                    }  else {
                        echo '<div class="alert alert-success mt-3">Email ok !</div>';
                    }



                }

                ?>
            </p>
            <form method="post" action="" enctype="multipart/form-data" class="border p-3">
                <div class="mb-3">
                    <label for="pseudo" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-outline-primary w-100" id="valider" value="Valider">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>