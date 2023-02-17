<?php

session_start(); // permet de créer une session ou de l'ouvrir si elle existe déjà
echo '<pre>'; print_r($_SESSION); echo '</pre>';