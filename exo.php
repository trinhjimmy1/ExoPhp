<?php
/*
EXERCICES :
01 - Récupérez 5 image sur le web et les renommer de cette manière : image1.jpg | image2.jpg | image3.jpg | image4.jpg | image5.jpg
02 - Affichez une image avec un echo et un img src
03 - Affichez 5 fois la même image toujours avec un echo et un img src (une boucle)
04 - Affichez les 5 différentes images toujours avec un echo et un img src
05 - Pour récupérer automatiquement les images depuis un dossier : glob()
*/

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
<div class="container">
    <div class="row">
        <div>2eme part</div>
        <?php echo"<img src='./assets/img/image1.jpg' alt='pug' >" ?>
        <img src="./assets/img/image5.jpg" alt="pug">

        <div>3eme part</div>
        <?php
        $y = 0;
        while($y < 5) {
            echo"<img src='./assets/img/image1.jpg' alt='pug' >";
            $y++;
        }
        ?>

        <div>4eme part</div>
        <?php
        for($i = 1; $i < 6; $i++) {
            echo"<img src='./assets/img/image$i.jpg' alt='pug' >";
        }
        ?>

        <div>5eme part</div>
        <?php
        $content = glob("assets/img/*.jpg");
        foreach ($content as $i) {
            echo"<img src='./$i' alt='pug' >";
            echo $i . "<br>";
        }
        ?>

    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>