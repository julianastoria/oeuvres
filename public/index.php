<?php
include_once '../private/app/init.php';

// On inclut l'en-tête HTML du document
include_once VIEWS_DIRECTORY.'header.php';

// On inclut le contenu de façon dynamique
include_once VIEWS_DIRECTORY.$router[$page][0];

// On inclut le pied HTML du document
include_once VIEWS_DIRECTORY.'footer.php';
