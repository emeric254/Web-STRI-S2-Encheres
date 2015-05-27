<?php
/* «encherir.php»
 * page de traitement pour l'ajout d'une enchère.
 *
 */

include_once('core/model.php');
include_once('core/bdd.php');

// Récupération des variables
$erreur=0;
if (isset($_SESSION['id']) and !empty($_SESSION['id']))
{
    $idacheteur=$_SESSION['id'];

    if (isset($_POST['id']) and !empty($_POST['id']) and $_POST['id'] >= 0)
    {
        $idvente=htmlspecialchars($_POST['id']);

        if (isset($_POST['prix']) and !empty($_POST['prix']))
        {
            $prix=htmlspecialchars($_POST['prix']);
            //~ test prix valable
            //~
        }
        else
        {
            $erreur=1;
            $errMsgg="veuillez saisir un prix";
        }

    }
    else
    {
        $erreur=1;
        $errMsgg.="la vente choisie est incorrecte";
    }
}
else
{
    $erreur=1;
    $errMsgg="il faut etre connecté pour enchérir";
}



if($erreur==1)
{
    $errMsgg="Veuillez vérifier les erreur suivantes : $champErreur.";
    include_once("vue/erreur.php");
}
else
{
    // on récupère les informations de l'annonce
   // $annonce = new Vente($idvente);

    // TODO : faire des test sur le droit d'enchérir !!
    if (DeposerEnchere($idvente, $idacheteur, $prix))
    {
