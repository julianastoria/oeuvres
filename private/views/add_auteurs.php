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
    
    $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
    $livres = isset($_POST['livres']) ? $_POST['livres'] : null;
    $photo =  isset($_POST['photo']) ? $_POST['photo'] : null;

    var_dump($_POST);

   

    // Vérification du champ livres
    if (empty($nom)) {
        $save = false;
        echo "Veuillez saisir un nom";
    }

      // Vérification du champ prénom
    if (empty($prenom)) {
        $save = false;
        echo "Veuillez saisir un prenom";
    }

      // Vérification du champ livres
    if (empty($livres)) {
        $save = false;
       echo "Veuillez saisir une oeuvre";
    }

      // Vérification du champ photo
    if (empty($photo)) {
        $save = false;
       echo "Veuillez saisir un lien url";
    }

    // On enregistre l'auteur dans la BDD
    if ($save) {
       if (auteurExists($nom)) {
          $save = false;
          echo "Un auteur est déjà enregistré avec son nom";
       }

       // Enregistre l'auteur
         $auteurUser = addAuteur(array(
            "nom" => $nom,
            "prenom" => $prenom,
            "livres" => $livres,
            "photo" => $photo,
            
            ));  

       // Identification de l'auteur
       $_SESSION['auteurUser'] = [
            "id" => $idUser,
            "nom" => $nom,
            "prenom" => $prenom,
            "livres" => $livres,
            "photo" => $photo,
         ];

         // Flashbag Success
         echo "Auteur ajouté";

     } 

}



?>




	<div class="page_header">
		<h1>Ajout d'un auteur</h1>

		  <? //php getFlashbag(); ?>

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
