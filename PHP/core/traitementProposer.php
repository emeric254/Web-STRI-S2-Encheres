<?php 
/* «traitementNouvelleVente.php»
 * page de traitement de l'ajout d'un nouvel objet.
 * 
 * s'occupe de rajouter une annonce dans la base de donnée
 *
 *
 * TODO: 
 * - Voir si il faut tester que la personne est connectée (a rajouter tout en haut de la page)
 * - ///!!\\\ => le inputUnite peut pposer probleme : emeric m'a dit de le mettre mais je le voit pas dans le formulaire
 *
 * - Faire la fonction VerificationInformationAnnonce($titre,$description,$prix,$pas,$dureeJour,$dureeHeure,$dureeMinute);
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
    $description=htmlspecialchars($_POST['inputDescription']);
}else{
    if($erreur){
		$champErreur=", ";
	}
    $erreur=1;
    $champErreur.="Description manquante";
}

if (isser($_POST['inputPrix']) and !empty($_POST['inputPrix'])) {
    $prix=htmlspecialchars($_POST['inputPrix']);
}else{
    if($erreur){
		$champErreur=", ";
	}
    $erreur=1;
    $champErreur.="Veuillez saisir le prix";
}

if (isser($_POST['inputPas']) and !empty($_POST['inputPas'])) {
    $pas=htmlspecialchars($_POST['inputPas']);
}else{
    if($erreur){
		$champErreur=", ";
	}
    $erreur=1;
    $champErreur.="Veuillez indiquer le pas";
}

if (isser($_POST['inputDureeJour']) and !empty($_POST['inputDureeJour'])) {
    $dureeJour=htmlspecialchars($_POST['inputDureeJour']);
}else{
    if($erreur){
		$champErreur=", ";
	}
    $erreur=1;
    $champErreur.="Veuillez saisir nombre de jour";
}

if (isser($_POST['inputDureeHeure']) and !empty($_POST['inputDureeHeure'])) {
    $dureeHeure=htmlspecialchars($_POST['inputDureeHeure']);
}else{
    if($erreur){
		$champErreur=", ";
	}
    $erreur=1;
    $champErreur.="Veuillez saisir le nombre d'heure";
}

if (isser($_POST['inputDureeMinute']) and !empty($_POST['inputDureeMinute'])) {
    $dureeMinute=htmlspecialchars($_POST['inputDureeMinute']);
}else{
    if($erreur){
		$champErreur=", ";
	}
    $erreur=1;
    $champErreur.="Veuillez saisir le nombre de minute";
}

if ($erreur == 1)
{
    $errMsg="Veuillez v&eacute;rifier les erreurs suivante : $champErreur.";
    include_once("vue/erreur.php");
    include_once("vue/inscription.php");
}else{
    /* on teste que toutes les informations sont correctes */
    $verifOk=VerificationInformationAnnonce($titre,$description,$prix,$pas,$dureeJour,$dureeHeure,$dureeMinute);
    if (!$verifOk)
    {
        $errMsg