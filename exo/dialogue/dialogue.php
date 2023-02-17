<?php
// CODE
$msg = ''; // variable appelée dans l'html afin d'afficher potentiellement des messages utilisateurs
date_default_timezone_set('Europe/Paris');
// Faire un formulaire avec les champs suivant : pseudo (input type text), message (textarea) et un bouton de validation
// method="post"
// lors de la validation du form : le pseudo et le message ne doivent pas être vides
// on enregistre dans un fichier texte le pseudo, le message et la date, heure du message avec un séparateur
// Ensuite affichez la liste des messages dans une structure html (card)
// Les messages doivent être affichés du plus récent vers le plus ancien
// pensez aux injections xss
// amélioration de la mise en forme

if (isset($_POST['pseudo']) && isset($_POST['message'])) {
    $pseudo = trim($_POST['pseudo']);
    $message = trim($_POST['message']);

    $error = false;

    $verif_pseudo = preg_match('/^[a-zA-Z0-9._-]+$/', $pseudo);
    if (!$verif_pseudo) {
        $msg .= '<div class="alert alert-danger mb-3">Attentions<br>Le pseudo est obligatoire, caractères autorisés pour le pseudo : a-z 0-9 ainsi que _ . -.</div>';
        // cas d'erreur
        $error = true;
    }

    if (empty($message)) {
        $msg .= '<div class="alert alert-danger mb-3">Attentions<br>Le message est obligatoire.</div>';
        // cas d'erreur
        $error = true;
    }

    if ($error == false) {

        // on enleve le caractère | puisqu'il nous servira comme séparateur
        $message = str_replace('|', '', $message);

        $message = htmlspecialchars($message, ENT_QUOTES);

        $message = str_replace(PHP_EOL, '<br>', $message);

        $chaine = $pseudo . '|' . $message  . '|' . date('d/m/Y H:i:s');

        $f = fopen('messages.txt', 'a');
        fwrite($f, $chaine . PHP_EOL);
        fclose($f);

        // pour ne pas renvoyer une deuxième fois les mêmes données du form en rechargeant la page : on redirige vers la même page
        header('location: dialogue.php');
    }
}

$liste_messages = [];
if (file_exists('messages.txt')) {
    $recup_messages = file('messages.txt');
    $liste_messages = array_reverse($recup_messages);
    // echo '<pre>'; print_r($liste_messages); echo '</pre>';
}

include '../inc/header.php';
include '../inc/nav.inc.php';
?>

<main class="container">
    <div class="bg-light p-5 rounded">
        <form method="post" class="p-3 border">
            <?php echo $msg; ?>
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5"></textarea>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-dark mb-3">Envoyer <i class="fa-regular fa-message"></i></button>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-sm-12 mt-5">
            <?php foreach ($liste_messages as $ligne) :  $infos = explode('|', $ligne); // print_r($infos);  ?>

                <div class="card mb-3">
                    <div class="card-header">
                        Par : <b><?= $infos[0]; ?></b>, à : <?= $infos[2]; ?>
                    </div>
                    <div class="card-body">
                        <?= $infos[1]; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php
include '../inc/footer.php'
?>

