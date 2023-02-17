<?php

// $_SESSION est une superglobale mais n'existe pas par défaut.

session_start(); // permet de créer une session ou de l'ouvrir si elle existe déjà
// Pour fonctionner correctement, cette fonction doit obligatoire être exécutée avant le moindre affichage dans la page. (même un espace blanc pourrait poser souci.)

// cette fonction va créer un fichier de session visible dans le dossier /tmp/ racine serveur ainsi qu'un cookie dont la valeur correspond au nom de la session. Cela permet au serveur de reconnaitre l'utilisateur

// sess_tj71mkvr9kqhpp4m2o82007tuf // nom du fichier de session
//      tj71mkvr9kqhpp4m2o82007tuf // valeur du cookie correspondant

// sess_9d7f6f84qo1uf0jpmrd5897ptd
//      9d7f6f84qo1uf0jpmrd5897ptd

// on place les informations utilisateur dans la session (pour représenter une connexion)
$_SESSION['user'] = array();
$_SESSION['user']['id'] = 41;
$_SESSION['user']['pseudo'] = 'admin';
$_SESSION['user']['mdp'] = password_hash('Hello', PASSWORD_DEFAULT);
$_SESSION['user']['adresse'] = '1 rue de l\'arbre';
$_SESSION['user']['cp'] = 75000;
$_SESSION['user']['ville'] = 'Paris';

echo '<hr><b>Premier affichage : </b><hr>';
echo '<pre>'; print_r($_SESSION); echo '</pre>';

// pour supprimer un élément d'un tableau array ou pour supprimer une variable
unset($_SESSION['user']['mdp']);

echo '<hr><b>Deuxième affichage : </b><hr>';
echo '<pre>'; print_r($_SESSION); echo '</pre>';

// Pour détruite la session :
session_destroy();

echo '<hr><b>Troisième affichage : </b><hr>';
echo '<pre>'; print_r($_SESSION); echo '</pre>'; // la session est encore visible même après un session_destroy(), effectivement, la session sera détruite après la dernière ligne de code de ce fichier.