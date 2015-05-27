<?php
/* «encherir.php»
 * page de traitement pour l'ajout d'une enchère.
 *
 */
 
include_once('core/model.php');
include_once('core/bdd.php');
 
// Récupération des variables
$erreur=0;
$champErreur = " ";
if (isset($_POST['prix']) and !empty($_POST['prix'])) {
    $prix=htmlspecialchars($_POST['prix']);
} else {
    $erreur=1;
    $champErreur="Veuillez saisir un prix";
}
 
if (isset($_POST['id']) and !empty($_POST['id']) and $_POST['id'] >= 0)
{
    $idvente=htmlspecialchars($_POST['id']);
} else {
    if($erreur){
        $champErreur.=", ";
    }
    $champErreur.="La vente choisie est incorrecte";
    $erreur=1;
}


if ($erreur==1)
{
    $errMsgg="Veuillez vérifier les erreur suivantes : $champErreur.";
    include_once("vue/erreur.php");
//    include_once("vue/vente.php
}
else
{
    // on récupère les informations de l'annonce
    $annonce = new Vente