<?php 
/* «traitementNouvelleVente.php»
 * page de traitement de l'ajout d'un nouvel objet.
 * 
 * s'occupe de rajouter une annonce dans la base de donnée
 *
 *
 * TODO: 
 * - Voir si il faut tester que la personne est connectée (a rajouter tout en haut de la page)
 *
 *
 *
 */
 
include_once('core/model.php'); /* utile ????*/
include_once('core/bdd.php');

// Récupération des différentes variables du formulaire
$erreur=0;
$champErreur = " ";
if (isser($_POST['inputTitre']) and !empty($_POST['inputTitre'])) {
    $titre=htmlspecialchars($_POST['inputTitre']);
}else{
    $erreur=1;
    $champErreur="Titre d'annonce manquant";
}

if (isser($_POST['inputDescription']) and !empty($_POST['inputDescription'])) {
    $titre=htmlspecialchars($_POST['inputDescription']);
}else{
    if($erreur){
		$champErreur=", ";
	}
    $erreur=1;
    $champErreur.="Description manquante";
}

if (isser($_POST['inputDescription']) and !empty($_POST['inputDescription'])) {
    $titre=htmlspecialchars($_POST['inputDescription']);
}else{
    if($erreur){
		$champErreur=", ";
	}
    $erreur=1;
    $champErreur.="Description manquante";
}


inputTitre ok
inputDescription
inputPrix
inputPas
inputUnite
inputDureeJour
inputDureeHeure
inputDureeMinute