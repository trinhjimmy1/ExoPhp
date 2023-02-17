<?php
include 'inc/function.php';
$msg = '';
session_start();
var_dump($_SESSION);
if(user_is_connected()) {
    header('location: profil.php');
}

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion' ) {
    session_destroy();
}

if(isset($_POST['pseudo']) && isset($_POST['password'])) {
    $pseudo = trim($_POST['pseudo']);
    $mdp = trim($_POST['mdp']);

    if(file_exists('message.txt')) {
        $liste = file('message.txt');
        foreach($liste AS $ligne) {
            $tab_ligne = explode('|||', $ligne);
            if($tab_ligne[0] == $pseudo) {
                if(password_verify($mdp, $tab_ligne[1])) {
                    $_SESSION['user']['pseudo'] = $tab_ligne[0];
                    $_SESSION['user']['email'] = $tab_ligne[2];
                    $_SESSION['user']['nom'] = $tab_ligne[3];
                    $_SESSION['user']['prenom'] = $tab_ligne[4];
                    $_SESSION['user']['ville'] = $tab_ligne[5];
                    $_SESSION['user']['cp'] = $tab_ligne[6];
                    $_SESSION['user']['adresse'] = $tab_ligne[7];

                    header('location: profil.php');
                }
            } else {
                $msg .= '<div class="alert alert-danger mb-3">Erreur sur le psueod et/ou le mot de passe.</div>';
                $error = true;
            }
        }
    } else {
        $msg .= '<div class="alert alert-danger mb-3">Veuillez d\'abord vous inscrire afin de pouvoir ensuite vous connecter.</div>';
        $error = true;
    }
}

    include 'inc/header.php';
echo '<pre>'; print_r($_SESSION); echo '</pre>';
?>


    <div class="row">
        <div class="col-4 mx-auto">
            <form method="post" action="" class="border p-3">
                <div class="mb-3">
                    <label for="pseudo" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-outline-primary w-100" id="valider" value="Valider">
                </div>
                <p>
                    <a class="btn btn-primary" href="template.php" >Retour à l'accueil</a>
                </p>
            </form>
        </div>
    </div>

<?php

    include "inc/footer.php";

?>