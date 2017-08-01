<?php 

$router = [

// Page d'accueil
"pageAccueil" => ["pageAccueil.php", false],

// Oeuvres 
"oeuvre" => ["oeuvre.php", false],
"oeuvreinfo" => ["oeuvreinfo.php", false],
"add_oeuvres" => ["add_oeuvres.php", true],
"edit_oeuvres" => ["edit_oeuvres.php", true],
"delete_oeuvres" => ["delete_oeuvres.php", true],

// auteurs
"auteurs"     => ["auteurs.php", false],
"auteursinfo" => ["auteursinfo.php", false],
"add_auteurs" => ["add_auteurs.php", true],
"edit_auteurs" => ["edit_auteurs.php", true],
"delete_auteurs" => ["delete_auteurs.php", true],

//Users
"profile"         => ["profile.php",            true],
  "settings"        => ["settings.php",           true],
  "register"        => ["register.php",           false],
  "login"           => ["login.php",              false],
  "lostpwd"         => ["lostpwd.php",            false],
  "renewpwd"        => ["renewpwd.php",           false],
  "logout"          => [null,                     true],

  // Page d'Erreur
  "404"             => ["404.php",                false]


];