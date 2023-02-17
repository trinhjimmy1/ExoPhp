<?php
// Ubuntu problème de droit concernant l'upload de fichier je ne pouvais pas upload un fichier car je n'avais pas les droit
// Faire la commande "sudo chown www-data ~/public_html/directory_where_you_want_to_write"
// Lien : https://stackoverflow.com/questions/17776004/fopen-fails-to-create-a-file-on-linux
// les fichiers en upload d'un formulaire se trouvent dans la superglobale $_FILES

$msg = '';

if (!empty($_FILES['image']['name'])) {
    // si un fichier est chargé.

    // On prépare les extensions acceptées
    $tab_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp', 'mp4');

    // on récupère l'extension en découpant la chaine depuis la fin via la fonction strrchr
    // exemple : pour un fichier image.png on récupère .png
    // on utilise substr() pour enlever le point : .png => png
    $extension = substr(strrchr($_FILES['image']['name'], '.'), 1);

    $extension = strtolower($extension);
    // strtolower() pour passer une chaine en minuscule, strtoupper() pour les majuscules

    // echo '<pre>'; print_r($extension); echo '</pre>';

    // on compare l'extension récupérée avec les extensions autorisées : in_array nous renvoie true ou false selon si une valeur fait partie d'un ensemble présentes dans un tableau array
    if (in_array($extension, $tab_extension)) {

        // echo '<pre>'; print_r(getimagesize($_FILES['image']['tmp_name'])); echo '</pre>';

        if (!empty($_FILES['image']['tmp_name'])) {
            // on change le nom de l'image :
            $name = uniqid() . '.' . $extension;
            // on copie l'image depuis son emplacement temporaire vers notre dossier img/
            copy($_FILES['image']['tmp_name'], __DIR__ . '/img/' . $name);
            header('location: index.php');
        } else {
            $msg .= '<div class="alert alert-danger my-3">Une erreur c\'est produite, veuillez charger une image ne dépassant pas 2M</div>';
        }
    } else {
        $msg .= '<div class="alert alert-danger my-3">Formats acceptés : jpg | jpeg | gif | png | webp</div>';
    }
}
    include "inc/header.inc.php";
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';
    // echo '<pre>'; print_r($_SERVER); echo '</pre>';
    // echo __DIR__ . '<br>';
?>
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <form method="post" class="mt-5 border p-3" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-outline-primary w-100" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>

<?php
include "inc/footer.inc.php";
?>

