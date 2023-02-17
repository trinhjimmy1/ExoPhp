<?php
include "inc/function.php";

$msg = '';
session_start();

if( user_is_connected() ) {
    header('location: profil.php');
}

if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['postale'])) {
    $pseudo = trim($_POST['pseudo']);
    $password = trim($_POST['password']);
    $email = trim(isset($_POST['email']));
    $nom = trim(isset($_POST['nom']));
    $prenom = trim(isset($_POST['prenom']));
    $adresse = trim(isset($_POST['adresse']));
    $ville = trim(isset($_POST['ville']));
    $codePostale = trim(isset($_POST['postale']));

    $error = false;

    // Pseudo
        if(iconv_strlen($pseudo) < 4 || iconv_strlen($pseudo) > 14 ) {
            echo '<div class="alert alert-danger">Attention, <br>le pseudo doit avoir entre 4 et 14 caractères inclus</div>';
        } else {
            echo '<div class="alert alert-success">Pseudo ok !</div>';
        }

    $verif_pseudo = preg_match('/^[a-zA-Z0-9._-]+$/', $pseudo);
    if(!$verif_pseudo) {
        $msg .= '<div class="alert alert-danger mb-3">Attentions<br>Le pseudo est obligatoire, caractères autorisés pour le pseudo : a-z 0-9 ainsi que _ . -.</div>';
        $error = true;
    }


    //password
    if (empty($password)) {
        $msg .= '<div class="alert alert-danger mb-3">Attentions<br>Le mot de passe est obligatoire.</div>';
        $error = true;
    }

    //email
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger mt-3">Attention, <br>format du mail incorrect.</div>';
        $error = true;
    } else {
        echo '<div class="alert alert-success mt-3">Email ok !</div>';
    }

    //nom, prénom, adresse, ville
    if (empty($nom) && empty($prenom) && empty($adresse) && empty($ville)) {
        $msg .= '<div class="alert alert-danger mb-3">Attentions<br>Le champ doit être obligatoire</div>';
        $error = true;
    }

    if (!is_numeric($codePostale) || iconv_strlen($codePostale) < 5) {
        $msg .= '<div class="alert alert-danger mb-3">Attentions<br>Le code postale doit être de champs numéric</div>';
        $error = true;
    }

    if($error == false) {
        $mdp = password_hash($password, PASSWORD_DEFAULT);
        $chaine = $pseudo . '|' . $mdp  . '|' . $email  . '|' . $nom  . '|' . $prenom  . '|' . $adresse  . '|' . $ville  . '|' . $codePostale;
        $f = fopen('/message.txt', 'a');
        fwrite($f, $chaine . PHP_EOL);
        fclose($f);
        header('location: loginPage.php');

    }
}

include "inc/header.php";
?>
<div class="container py-5">
</div>
    <form method="post">
        <?= $msg; ?>
        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom">
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse">
        </div>
        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville">
        </div>
        <div class="mb-3">
            <label for="postale" class="form-label">Code Postale</label>
            <input type="text" class="form-control" id="postale" name="postale">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <p>
            <a class="btn btn-primary" href="template.php" >Retour à l'accueil</a>
        </p>
    </form>

<?php
include "inc/footer.php";
?>