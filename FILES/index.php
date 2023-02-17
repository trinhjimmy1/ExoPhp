<?php

// Dans la page index, récupérez les images enregistrées dans le dossier /img/ pour les afficher dans cette page

// R2cupération des images :
$images = glob('img/*.{[jJ][pP][gG],[jJ][pP][eE][gG],[pP][nN][gG],[gG][iI][fF],[wW][eE][bB][pP]}', GLOB_BRACE);

// début des affichages
include 'inc/header.inc.php';
?>
    <div class="row">
        <div class="col-12 mt-5">
            <div class="d-flex galerie justify-content-between">
                <?php $i = 0; ?>
                <?php foreach($images AS $img) :  $i++ ?>

                    <img src="<?= $img; ?>" alt="une image ..." class="img-thumbnail">

                    <?php if($i%3 == 0) echo '</div><div class="d-flex galerie justify-content-between mt-3">'; ?>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php
include 'inc/footer.inc.php';