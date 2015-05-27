<?php
/* «vente.php»
 * page de traitement pour la vue du même nom.
 *
 * vars
 * $titreVente
 * $tempsVente
 * $prixVente
 * $nbEnchereVente
 * $photoVente
 * $descriptionVente
 *
 * $encherisseursVente (tab des encherisseurs)
 *
 *
 * TODO :
 * Gestion du manque d'id
 */

include_once('core/model.php');
include_once('core/class.php');
$encherissable=0;
$appartenue=0;
if( isset($_GET['id']) and !empty($_GET['id']))
{
    $id = htmlspecialchars($_GET['id']);
    $vente = new Vente($id);
    if(isset($_SESSION['id']) and !empty($_SESSION['id'])){
        $iduser=htmlspecialchars($_SESSION['id']);
        if($vente->Vendeur==$iduser){
            $appartenue=1;
        }else{
            $encherissable=1;
        }
    }
    // test si valide
    //if(venteexiste) {
        include_once('vue/vente.php');
    //}
    //else
    //{
    //  messageErreur="vente introuvable ou non valide..."
    //  include_once('vue/erreur.php');
    //}
}
else
{
    $errMsg = "Pas d'enchére indiquée";
    include_once("vue/erreur.php");
}
?>
