<?php
/* «compte.php»
 * page de traitement pour la vue du même nom.
 */

include_once('core/model.php');
include_once('core/class.php');

if(isset($_SESSION['id']) and !empty($_SESSION['id']))
{
    $id = htmlspecialchars($_SESSION['id']);
    $profil = new Profil($id);

    if (isset($_GET['c']) and !empty($_GET['c']))
    {
        $choix = htmlspecialchars($_GET['c']);
        if($choix==2)
        {
            $ventes = array();
            $listidVente = UtilisateurRecupererVente($id);
            foreach ($listidVente as &$idVente)
            {
                $ventes[] = new Vente($idVente);
            }
        }
        else if($choix==1)
        {
            $achats = array();
            $listidAchats = UtilisateurRecupererEnch($id);
            foreach ($listidAchats as &$idAchats)
            {
                $achats[] = new Vente($idAchats);
            }
        }
    }
    include_once('vue/compte.php');
}
else
{
    $errMsg = "Vous devez vous connecter pour acceder a cette pages";
    include_once("vue/erreur.php");
}
?>
