<?php
// Definition des variables par défaut
$nom     = null;
$prenom    = null;
$livres   = null;
$photo    = null;

// Cas où l'utilisateur envoie le formulaire (méthode POST)
// Contrôle du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $save = true;

    // Recupérer les données de $_POST
    $token = isset($_POST['token']) ? $_POST['token'] : null;
    $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
    $livres = isset($_POST['livres']) ? $_POST['livres'] : null;
    $photo =  isset($_POST['photo']) ? $_POST['photo'] : null;

    var_dump($_POST);

    // Controler l'intégrité du token
    if ($_SESSION['token'] !== $token) {
       $save = false;
       setFlashbag("danger", "Le token est invalide."); 
    }

    // Vérification du champ nom
    if (empty($nom)) {
        $save = false;
        setFlashbag("danger", "Veuillez saisir un nom");
    }

    // Definition du token
    $_SESSION['token'] = getToken();
}

?>



<!DOCTYPE html>
<html>
	<head>
		<title>Ajout d'un auteur</title>
	</head>
	<body>
	<div class="page_header">
		<h1>Ajout d'un auteur</h1>
		<form method="POST">
			<label>Nom :</label>
			<input type="text" name="nom">
			<br><br>
			
			<label>Prénom :</label>
			<input type="text" name="prenom">
			<br><br>
			
			<label>Liste des oeuvres :</label>
			<textarea rows="15" cols="25" name="livres"></textarea>
			<br><br>
			
			<label>Photo :</label>
			<input type="text" name="photo">
			<br><br>

			<button>Envoyer</button>
		</form>
	</div>
	</body>
</html>