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
 * $encherisseursVente (tab des enchérisseurs)
 *
 */

include_once('core/model.php');
include_once('core/class.php');

$encherissable=0;
$appartenue=0;

if( isset($_GET['id']) and !empty($_GET['id']))
{
    $id = htmlspecialchars($_GET['id']);
    $vente = new Vente($id);

    if(isset($_SESSION['id']) and !empty($_SESSION['id']))
    {
        $iduser = htmlspecialchars($_SESSION['id']);
        if($vente->Vendeur->id==$iduser)
        {
            $appartenue=1;
        }
        else
        {
            if($vente->tempsRestant > 0)
                $encherissable=1;
        }
    }
    //~ EVOLVE verif existence vente
    include_once('vue/vente.php');
}
else
{
    $errMsg = "<p>Pas d'enchère indiquée</p><a href=\"/\">Retour à l'accueil</a>";
    include_once("vue/erreur.php");
}
?>
