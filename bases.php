<?php
// rand()
$color = 'rgba(24, 114, 84)';

$c1 = rand(0, 255);
$c2 = rand(0, 255);
$c3 = rand(0, 255);
$tr = rand(5, 10) / 10;
// Faire en sorte que la couleur soit aléatoire au rafraichissement de page.
$color = "rgba($c1, $c2, $c3, $tr)";

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bases PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .bg-primary {
            background-color: <?php echo $color; ?> !important;
        }
    </style>
</head>

<body>


<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="bg-primary p-5 text-center text-white">Bases PHP</h2>
            <?php

            separateur();  // il est possible d'exécuter une fonction avant sa déclaration.


            // Au dessus balise d'ouverture PHP

            // Ceci est un commentaire sur une seule ligne
            # Ceci est un commentaire sur une seule ligne
            /*
                Ceci est un
                commentaire sur
                plusieurs lignes
            */

            /*
            Quelques liens utiles :
            -----------------------
            - Doc officielle php : https://www.php.net/
            - Les bonnes pratiques : https://phptherightway.com/
            - Les conventions : https://www.php-fig.org/psr/

            - Pour la veille : https://www.reddit.com/r/PHP/

            Sommaire :
            ----------
            - 01 - Instruction d'affichage
            - 02 - Variables : déclaration, affectation
            - 03 - Concaténation
            - 04 - Guillemets et apostrophes
            - 05 - Constantes
            - 06 - Conditions et opérateurs de comparaison
            - 07 - Fonctions prédéfinies
            - 08 - Fonctions utilisateur
            - 09 - Boucles
            - 10 - Inclusions
            - 11 - Tableaux de données ARRAY
            */

            echo '<h2 class="bg-primary p-5 text-center text-white">01 - Instruction d\'affichage</h2>';

            // echo est une instruction permettant de générer un affichage.
            // Chaque instruction doit se terminer par un point virgule ;

            echo 'Bonjour ';

            echo 'à tous !<br>';

            print 'print est une autre instruction d\'affichage<br>'; // print comme echo permet de déclencher un affichage. Il n'est pas possible d'utiliser la virgule pour faire la concaténation avec print (possible avec echo)
            // Pour ce cours, nous utiliserons toujours echo

            echo '<h2 class="bg-primary p-5 text-center text-white">02 - Variables : déclaration, affectation</h2>';
            // définition : un espace nommé permettant de conserver une valeur.

            // Une variable se déclare avec le signe $
            // Caractères autorisés : az AZ 09 _ (une variable ne peut pas commencer par un chiffre)
            // PHP est sensible à la casse

            // Déclaration d'une variable nommée "a" et affectation de la valeur numérique 123
            $a = 123;

            // gettype() est une fonction prédéfinie nous renvoyant une chaine de caractères représentant le type de données.

            echo gettype($a); // type : integer
            echo '<br>';

            $a = 'une chaine';

            echo gettype($a); // type : string
            echo '<br>';

            $a = '123';

            echo gettype($a); // type : string
            echo '<br>';

            $a = 1.5;

            echo gettype($a); // type : double (float)
            echo '<br>';

            $a = true; // ou TRUE ou false ou FALSE

            echo gettype($a); // type : boolean (true: valeur 1 | false : valeur 0)
            echo '<br>';

            echo '<h2 class="bg-primary p-5 text-center text-white">03 - Concaténation</h2>';

            // la concaténation consiste à assembler des chaines de caractères les unes avec les autres, que celle ci proviennent de texte brut ou contenues dans une variable ou en resultat d'une fonction.
            // le caractère de concaténation est le point (que l'on traduire par "suivi de")

            $a = 'Bonjour';
            $b = 'à tous';

            // sans concaténation :
            echo $a;
            echo ' ';
            echo $b;
            echo '<br>';

            // Avec la concaténation :
            echo $a . ' ' . $b . '<br>';

            // il est possible de concaténer avec la virgule (ne fonctionne pas avec print). Pour le cours nous utiliserons toujours le point
            echo $a, ' ', $b, '<br>';

            // Concaténation lors de l'affectation
            $prenom = 'Mathieu ';
            $prenom = 'Marie';
            echo $prenom . '<br>'; // affiche Marie

            $prenom2 = 'Mathieu ';
            $prenom2 .= 'Marie'; // équivaut à écrire $prenom2 = $prenom2 . 'Marie';
            echo $prenom . '<br>'; // affiche Mathieu Marie

            echo '<h2 class="bg-primary p-5 text-center text-white">04 - Guillemets et apostrophes</h2>';
            // Avec PHP : une variable sera reconnue et interprétée dans des guillemets, en revanche sera considérée comme du texte brut dans des apostrophes
            $a = 'Bonjour';
            $b = 'à tous';

            echo "$a $b <br>"; // Bonjour à tous
            echo '$a $b <br>'; // $a $b

            echo '<h2 class="bg-primary p-5 text-center text-white">05 - Constantes</h2>';

            // Une constante comme une variable permet de conserver une valeur sauf que comme son l'indique, cette valeur ne pourra pas être modifiée durant l'exécution du code.

            // déclaration et affectation
            define('URL', 'http://localhost/php_enma_8/');

            echo '<a href="' . URL . 'bases.php">Accueil</a><br>';

            // Constantes magiques
            // 2 underscores avant et après
            echo __FILE__ . '<br>'; // le chemin complet jusqu'à ce fichier C:\wamp64\www\php_enma_8\bases.php
            echo __LINE__ . '<br>'; // le numéro de la ligne : 148

            echo __DIR__ . '<br>'; // le chemin jusqu'au dossier parent contenant ce fichier (il n'y a pas le / final)

            echo '<h2 class="my-3 border p-3">Exercice</h2>';
            // créez 3 variables et vous placez une des valeurs suivantes dans chaque variable : lundi, mardi, mercredi
            // Ensuite avec un seul echo affichez le texte suivant en passant par les variables :
            // lundi - mardi - mercredi

            $a1 = 'lundi';
            $a2 = 'mardi';
            $a3 = 'mercredi';
            $t = ' - ';

            echo $a1 . ' - ' . $a2 . ' - ' . $a3 . '<br>';
            echo $a1 . $t . $a2 . $t . $a3 . '<br>';
            echo "$a1 - $a2 - $a3<br>";

            echo '<h2 class="my-3 border p-3">Opérateurs arithmétiques</h2>';
            $x = 10;
            $y = 5;

            // addition :
            echo $x + $y . '<br>'; // affiche 15
            // soustraction :
            echo $x - $y . '<br>'; // affiche 5
            // multiplication :
            echo $x * $y . '<br>'; // affiche 50
            // division :
            echo $x / $y . '<br>'; // affiche 2

            // Puissance :
            echo $x ** $y . '<br>'; // affiche 100000
            // Modulo :
            echo $x % $y . '<br>'; // affiche 0

            // opération lors de l'affectation
            $x += $y; // équivaut à écrire : $x = $x + $y;
            // $x -= $y;
            // $x *= $y;
            // $x /= $y;
            // $x **= $y;
            // $x %= $y;

            echo '<h2 class="bg-primary p-5 text-center text-white">06 - Conditions et opérateurs de comparaison</h2>';

            // isset() et empty()
            // isset() vérifie si une variable fournie en argument existe :
            // variable existe : true
            // sinon :  false
            // empty() vérifie si une variable existe puis si elle est vide ou pas
            // variable existe pas ou existe mais vide : true
            // la variable existe ET contient quelquechose : false

            // isset et empty sont deux outils majeurs de controle, je ne manipule aucune variable provenant d'un utilisateur (formulaire, url, cookie) sans demander au préalable si cette information existe.

            $existe = 'hello'; // variable provenant par exemple d'un formulaire
            if (isset($existe)) {
                echo 'Ok, la variable existe. <br>';
            } else {
                echo 'Nok, la variable n\'existe pas.<br>';
            }

            // $var = 'du texte';
            // Valeurs considérées comme vide : une chaine vide '' "", false, 0, 0.0, -0, '0', "0", un tableau array vide.
            // https://www.php.net/manual/fr/language.types.boolean.php#language.types.boolean.casting
            if (empty($var)) {
                echo 'Nok, la variable  n\'existe pas ou existe mais vide.<br>';
            } else {
                echo 'Ok, la variable existe et contient quelquechose.<br>';
            }

            // if / elseif / else
            // chaque elseif est un cas supplémentaire dans lequel nous pouvons entrer.
            $a = 10;
            $b = 5;
            $c = 2;

            if ($a > $b) {
                echo 'VRAI : la valeur de a est bien supérieure à la valeur de b<br>';
            } else {
                // jamais de parenthèse sur un else (c'est le cas par défaut)
                echo 'FAUX : la valeur de a n\'est pas supérieure à la valeur de b<br>';
            }

            // plusieurs conditions obligatoires : AND => &&
            if ($a > $b && $b > $c) {
                echo 'VRAI : Ok pour les deux conditions<br>';
            } else {
                echo 'FAUX : L\'une ou l\'autre des conditions ou les deux sont fausses<br>';
            }

            // l'une ou l'autre d'un ensemble de condition : OR => ||
            if ($a < $c || $b > $c) {
                echo 'VRAI : Ok pour au moins une des conditions<br>';
            } else {
                echo 'FAUX : Toutes les conditions sont fausses<br>';
            }

            $a = 10;
            $b = 5;
            $c = 2;

            if ($a == 9) {
                echo 'Réponse 1<br>';
            } elseif ($a != 10) {
                echo 'Réponse 2<br>';
            } elseif ($b > $a) {
                echo 'Réponse 3<br>';
            } else {
                echo 'Réponse 4<br>';
            }

            // Comparaison stricte
            $varA = 1; // valeur 1 de type int
            $varB = '1'; // valeur 1 de type string
            $varC = true; // valeur 1 de type boolean

            echo '<hr>';

            // comparaison des valeurs uniquement
            if ($varA == $varB) {
                echo 'Les valeurs sont similaires<br>';
            } else {
                echo 'Les valeurs sont différentes<br>';
            }

            echo '<hr>';

            // Comparaison stricte : on compare les valeurs et les types
            if ($varA === $varB) {
                echo 'Les valeurs et les types sont similairs<br>';
            } else {
                echo 'Les valeurs et/ou les types sont différents<br>';
            }

            /*
            Opérateurs de comparaison :
            ---------------------------
            =   Ceci n'est pas une comparaison, c'est une affectation
            ==  est égal à - comparaison des valeurs
            !=  est différent de - comparaison des valeurs
            === est strictement égal - comparaison des valeurs ET des types
            !== est strictement différent - comparaison des valeurs ET des types
            >   strictement supérieur
            >=  supérieur ou égal
            <   strictement inférieur
            <=  inférieur ou égal
        */

            echo '<hr>';

            // autres possibilités d'écriture :

            // le else n'est pas obligatoire
            if ($varA == $varB) {
                echo 'Les valeurs sont similaires<br>';
            }

            // il est possible de remplacer les accolades {} par : et end...
            if ($varA == $varB) :
                echo 'Les valeurs sont similaires<br>';
            else :
                echo 'Les valeurs sont différentes<br>';
            endif;

            // il est possible de ne pas mettre d'accolades (ou : endif) à la condition qu'il n'y a qu'une seule instruction par cas
            if ($varA == $varB)
                echo 'Les valeurs sont similaires<br>';
            else
                echo 'Les valeurs sont différentes<br>';


            // Ecriture ternaire
            // action (question) ? ... if ... : ... else ...;
            echo ($varA == $varB) ? 'Les valeurs sont similaires<br>' : 'Les valeurs sont différentes<br>';

            echo '<hr>';

            // Condition switch
            $couleur = 'jaune';

            switch ($couleur) {
                case 'bleu':
                    echo 'Vous aimez le bleu<br>';
                    break;
                case 'rouge':
                    echo 'Vous aimez le rouge<br>';
                    break;
                case 'vert':
                    echo 'Vous aimez le vert<br>';
                    break;
                default:
                    echo 'Vous n\'aimez ni le bleu, ni le rouge ni le vert<br>';
                    break; // ce break n'est pas obligatoire
            }

            echo '<hr>';

            // EXERCICE : refaire la même chose avec if
            if ($couleur == 'bleu') {
                echo 'Vous aimez le bleu<br>';
            } elseif ($couleur == 'rouge') {
                echo 'Vous aimez le rouge<br>';
            } elseif ($couleur == 'vert') {
                echo 'Vous aimez le vert<br>';
            } else {
                echo 'Vous n\'aimez ni le bleu, ni le rouge ni le vert<br>';
            }

            echo '<h2 class="bg-primary p-5 text-center text-white">07 - Fonctions prédéfinies</h2>';

            // fonctions prédéfinies : déjà inscrite au langage, le developpeur ne fait que l'exécuter.
            // Quand on utilise une fonction, nous devons connaitre le nombre d'arguments (s'il y en a) et dans quel ordre. Puis également les valeurs de retour (la réponse)

            // Fonction date() pour afficher la date du jour en choisissant le format.
            // les dates sont enregistrées en bdd au format anglais.
            // https://www.php.net/manual/fr/function.date.php
            // https://www.php.net/manual/fr/datetime.format.php - pour voir les formats disponibles

            // Pour choisir son fuseau horaire :
            date_default_timezone_set('Europe/Paris'); // Pour voir les fuseaux disponibles : https://www.php.net/manual/fr/timezones.php

            echo 'Nous sommes le ' . date('d/m/Y H:i:s') . '<br>';

            echo 'Copyright &copy; ' . date('Y') . '<br>';

            // fonctions prédéfinies (string)
            // strlen() | iconv_strlen()
            // strlen() permet de compter la taille d'une chaine (en terme d'octets)
            // iconv_strlen() permet de compter la taille d'une chaine (en nombre de caractère)
            $pseudo = 'admin';

            $taille_pseudo = iconv_strlen($pseudo);

            if ($taille_pseudo < 4 || $taille_pseudo > 14) {
                echo '<div class="alert alert-danger">⚠ Attention, le pseudo doit avoir entre 4 et 14 caractères inclus</div>';
            } else {
                echo '<div class="alert alert-success">Pseudo ok</div>';
            }

            // strpos()
            // permet de chercher une chaine dans une chaine
            $email = 'mail@mail.fr';

            echo 'Position du @ dans la chaine : ' . strpos($email, '@') . '<br>'; // affiche 4, attention, le premier caractère a la position 0

            $email2 = 'bonjour';
            echo 'Position du @ dans la chaine : ' . strpos($email2, '@') . '<br>';
            // ici le @ n'est pas trouvé, rien ne s'affiche pourtant on obtient bien une réponse (false)
            // Pour voir le false, nous pouvons utiliser une instruction d'affichage améliorée : var_dump()
            var_dump(strpos($email2, '@'));

            // substr()
            // pour découper une chaine
            // substr(chaine, position_de_départ) : on récupère tout depuis la position de départ
            // substr(chaine, position_de_depart, nb_de_caractères)
            $texte = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, nesciunt delectus iusto iure cumque ab commodi dolor quam assumenda odit, laudantium perferendis earum beatae. Ratione a illum eius quae veniam!
                Eaque reprehenderit aspernatur deserunt quae soluta facilis, adipisci ea molestiae a ad quam distinctio delectus voluptatum aliquid tempore reiciendis, tempora nemo vitae minus modi nobis accusamus temporibus ducimus similique? Minima.
                Non, iure perferendis dicta qui aperiam quos, eligendi iste provident voluptate pariatur enim vitae distinctio reiciendis est? Error provident beatae quia doloribus, nemo placeat fugiat numquam qui repellendus, possimus quasi?';

            echo substr($texte, 0, 51) . ' <a href="">... lire la suite</a><hr>';

            // rand()
            // permet d'obtenir un entier compris entre deux entiers fournis en argument
            echo rand(1, 6);

            echo '<h2 class="bg-primary p-5 text-center text-white">08 - Fonctions utilisateur</h2>';
            // créée et exécutée par le développeur.

            // fonction toute simple permettant d'afficher 3 balises hr

            // déclaration
            function separateur()
            {
                echo '<hr><hr><hr>';
            }

            // exécution :
            separateur();

            // fonction avec argument :
            // fonction permettant d'afficher du texte pour dire bonjour à un utilisateur
            function bonjour($qui)
            {
                return 'Bonjour ' . $qui . ', bienvenue sur notre site.<br>';
            }

            $login = 'Admin';

            // echo bonjour(); // si la fonction attend un argument, nous sommes obligé de le fournir.
            echo bonjour($login);
            echo bonjour('Mathieu');

            separateur();

            // fonction permetant d'afficher la saison et la température via deux arguments fournis
            function meteo($saison, $temperature)
            {
                $debut = 'Nous sommes en ' . $saison;
                $fin = ' et il fait ' . $temperature . ' degré(s)<hr>';

                return $debut . $fin;
            }

            echo meteo('été', 35);
            echo meteo('hiver', 0);
            echo meteo('printemps', 20);
            echo meteo('automne', 1);

            // Améliorez cette fonction en gérant l'article "en" ou "au" selon la saison et le s à degré (-1 | 0 | 1)
            separateur();

            function meteo2($saison, $temperature)
            {
                $article = 'en';
                $s = 's';

                if ($saison == 'printemps') {
                    $article = 'au';
                }

                if ($temperature > -2 && $temperature < 2) {
                    $s = '';
                }

                return 'Nous sommes ' . $article . ' ' . $saison . ' et il fait ' . $temperature . ' degré' . $s . '<hr>';
            }

            echo meteo2('été', 35);
            echo meteo2('hiver', 0);
            echo meteo2('printemps', 20);
            echo meteo2('automne', 1);

            // fonction avec argument facultatif
            function montant_tva($valeur, $taux = 1.2)
            {
                return 'Le montant de la TVA pour la somme ' . $valeur . ' € est de : ' . ($valeur * $taux) . '<br>';
            }

            echo montant_tva(1000); // avec un seul argument, $taux a la valeur par défaut 1.2
            echo montant_tva(1000, 1.055); // avec deux arguments, le deuxième écrase la valeur par défaut de $taux

            // Evironnement Global | Local
            // l'environnement global représente tout le script
            // l'environnement local est à l'intérieur d'une fonction

            // Une variable locale n'existe que dans la fonction où elle est déclarée
            $animal = 'chat'; //  variable dans l'espace global

            function jardin()
            {
                $animal = 'chien'; // variable dans l'espace local
                return $animal;
            }

            separateur();

            echo $animal . '<br>'; // chat
            echo jardin() . "<br>"; // chien
            echo $animal . '<br>'; // chat

            $pays = 'France';
            function affiche_pays()
            {
                global $pays; // sans le mot clé global, la variable $pays ne serait pas connu
                return 'Pays : ' . $pays . '<br>';
            }

            echo affiche_pays();

            echo '<h2 class="bg-primary p-5 text-center text-white">09 - Boucles</h2>';
            // Pour mettre en place une boucle : nous avons besoin de trois informations
            // une valeur de départ (compteur)
            // une condition d'entrée
            // une incrémentation ou décrémentation sur le compteur.

            // Boucle while() {}
            $i = 0; // valeur de départ
            while ($i < 10) {
                echo $i . ' ';
                $i++;
            }

            separateur();

            // Boucle for() {}
            // for(valeur_depart; condition; incrementation) {}
            for ($i = 0; $i < 10; $i++) {
                echo $i . ' ';
            }

            separateur();

            // EXERCICE :
            // faire une boucle qui affiche de 0 à 99 avec le chiffre 50 de couleur rouge.
            for ($i = 0; $i < 100; $i++) {
                if ($i == 50) {
                    echo '<span class="text-danger">' . $i . '</span> ';
                } else {
                    echo $i . ' ';
                }
            }

            separateur();

            $i = 0;
            while ($i < 100) {
                if ($i == 50) {
                    echo '<span class="btn btn-danger">' . $i . '</span> ';
                } else {
                    echo $i . ' ';
                }
                $i++;
            }

            separateur();

            // EXERCICE :
            // Faire une boucle qui fait 10 tour dans une liste ul li
            echo '<ul class="list-group">';
            for ($i = 0; $i < 10; $i++) {
                echo '<li class="list-group-item">' . $i . '</li>';
            }
            echo '</ul>';


            echo '<h2 class="bg-primary p-5 text-center text-white">10 - Inclusion</h2>';
            // faire un fichier nommé exemple.inc.php contenant du texte et potentiellement du code html et php
            echo '<p>Premier appel avec include :</p>';
            include 'exemple.inc.php';

            echo '<p>Deuxième appel avec include_once :</p>';
            include_once 'exemple.inc.php';

            echo '<p>Premier appel avec require :</p>';
            require 'exemple.inc.php';

            echo '<p>Deuxième appel avec require_once :</p>';
            require_once 'exemple.inc.php';

            // Différence entre include et require :
            // en cas d'erreur (fichier non trouvé) :
            // include provoque un warning et laisse l'exécution du code.
            // require provoque une erreur fatale et bloque l'exécution du code.


            echo '<h2 class="bg-primary p-5 text-center text-white">11 - Tableau de données ARRAY</h2>';

            // outil de base : variable simple (une information typée)
            // outil amélioré : un tableau toujours contenu dans une variable (type array) nous permettant de conserver plusieurs valeurs
            // outil encore amélioré : un objet toujours contenu dans une variable nous permettant de conserver plusieurs informations (propriétés ou attributs de l'objet) mais surtout du fonctionnel (methodes)

            // déclaration d'un tableau avec array()
            // $tab_fruits = ['pommes', 'fraise', 'kiwis', 'poires'];
            $tab_fruits = array('pommes', 'fraise', 'kiwis', 'poires');

            // Un tableau est toujours composé de deux colonnes :
            // une colonne contenant l'indice
            // une colonne contenant la valeur
            // On appelera toujours l'indice afin de récupérer la valeur.

            // echo $tab_fruits . '<br>'; // erreur

            // Pour voir le contenu d'un tableau.
            echo '<pre>'; var_dump($tab_fruits); echo '</pre>';

            echo '<pre>'; print_r($tab_fruits); echo '</pre>';

            /*
            Avec var_dump() :
            -----------------
            C:\wamp64\www\php_enma_8\bases.php:634:
            array (size=4)
            0 => string 'pommes' (length=6)
            1 => string 'fraise' (length=6)
            2 => string 'kiwis' (length=5)
            3 => string 'poires' (length=6)

            Avec print_r :
            --------------
            Array
            (
                [0] => pommes
                [1] => fraise
                [2] => kiwis
                [3] => poires
            )
            */

            // Pour extraire une information du tableau, on pioche avec les []
            echo $tab_fruits[1] . '<br>';

            // il est possible de rajouter des éléments au tableau
            $tab_fruits[] = 'ananas';

            echo '<pre>'; print_r($tab_fruits); echo '</pre>';

            // On peut le forcer nous-même, si l'indice existe, on écrase l'ancienne valeur sinon on crée un nouvel élément
            $tab_fruits[3] = 'pêches';

            // avec la fonction array_push()
            // array_push($tab_fruits, 'orange', 'mandarine', ..., ...);
            array_push($tab_fruits, 'orange', 'mandarine');

            echo '<pre>'; print_r($tab_fruits); echo '</pre>';

            // affichage des informations présentes dans le tableau dans une liste ul li
            $taille_tableau = count($tab_fruits);
            echo '<ul class="list-group">';

            for($i = 0; $i < $taille_tableau; $i++) {
                echo '<li class="list-group-item">' . $tab_fruits[$i] . '</li>';
            }

            echo '</ul>';

            // autre façon de déclarer un tableau :
            $tab_jours[] = 'lundi';
            $tab_jours[] = 'mardi';
            $tab_jours[] = 'mercredi';
            $tab_jours[] = 'jeudi';

            echo '<pre>'; print_r($tab_jours); echo '</pre>';


            // il est possible d'avoir des indices en string
            $tab_user = array('id' => 123, 'pseudo' => 'admin', 'email' => 'admin@mail.fr');
            $tab_user['adresse'] = '1 rue de la fleur';
            $tab_user['cp'] = 75000;
            $tab_user['ville'] = 'Paris';

            echo '<pre>'; print_r($tab_user); echo '</pre>';

            /*
            Array
            (
                [id] => 123
                [pseudo] => admin
                [email] => admin@mail.fr
                [adresse] => 1 rue de la fleur
                [cp] => 75000
                [ville] => Paris
            )
            */

            // boucle foreach pour les tableaux et les objets
            // foreach(array AS valeur) // avec une seule variable après le mot clé AS, cette variable récupère la valeur en cours à chaque tour
            // foreach(array AS indice => valeur) // avec deux variables après le mot clé AS, la première variable récupère l'indice en cours et la deuxième la valeur en cours à chaque tour

            echo '<ul>';
            foreach($tab_user AS $valeur) {
                echo '<li>' . $valeur . '</li>';
            }
            echo '</ul>';

            echo '<ul>';
            foreach($tab_user AS $indice => $valeur) {
                echo '<li>' . ucfirst($indice) . ' : ' . ucfirst($valeur) . '</li>';
            }
            echo '</ul>';

            // ucfrist() : première lettre de la chaine en majuscule.

            $panier = array();
            $panier['id'] = array();
            $panier['titre'] = array();
            $panier['quantite'] = array();
            $panier['prix'] = array();

            $panier['id'][] = 42;
            $panier['titre'][] = 'Pantalon blanc';
            $panier['quantite'][] = 1;
            $panier['prix'][] = 40;

            $panier['id'][] = 15;
            $panier['titre'][] = 'Tshirt rouge';
            $panier['quantite'][] = 1;
            $panier['prix'][] = 12;

            $panier['id'][] = 8;
            $panier['titre'][] = 'Echarpe bleu';
            $panier['quantite'][] = 1;
            $panier['prix'][] = 14;

            echo '<pre>'; print_r($panier); echo '</pre>';

            echo '<table class="table table-bordered">';
            echo '<tr class="bg-dark text-white"><th>N°</th><th>Titre</th><th>Quantité</th><th>Prix unitaire</th></tr>';

            $taille = count($panier['id']);
            for($i = 0; $i < $taille; $i++) {
                echo '<tr>';
                echo '<td>' . $panier['id'][$i] . '</td>';
                echo '<td>' . $panier['titre'][$i] . '</td>';
                echo '<td>' . $panier['quantite'][$i] . '</td>';
                echo '<td>' . $panier['prix'][$i] . '</td>';
                echo '</tr>';
            }

            echo '</table>';

            $tab_utilisateur = array(
                array(
                    'id' => 14,
                    'pseudo' => 'admin',
                    'email' => 'admin@mail.fr',
                    'statut' => 'administrateur'
                ),
                array(
                    'id' => 23,
                    'pseudo' => 'membre',
                    'email' => 'membre@mail.fr',
                    'statut' => 'membre'
                ),
                array(
                    'id' => 57,
                    'pseudo' => 'commercial',
                    'email' => 'commercial@mail.fr',
                    'statut' => 'commercial'
                ),
            );

            echo '<pre>'; print_r($tab_utilisateur); echo '</pre>';

            separateur();

            echo '<table class="table table-bordered">';
            echo '<tr class="bg-danger text-white"><th>Id</th><th>Pseudo</th><th>Email</th><th>Statut</th></tr>';

            foreach($tab_utilisateur AS $sous_tableau) {
                echo '<tr>';
                foreach($sous_tableau AS $valeur) {
                    echo '<td>' . $valeur . '</td>';
                }
                echo '</tr>';
            }

            echo '</table>';
























































            // en dessous balise de fermeture PHP
            ?>



            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>