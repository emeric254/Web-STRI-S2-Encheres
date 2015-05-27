<?php
/* «gestionBd.php»
 *
 *
 * vars
 *
 */

include_once('core/model.php');
include_once('core/class.php');

if(isset($_SESSION['id']) and !empty($_SESSION['id']))
{
    if (isset($_GET['action']) and !empty($_GET['action']))
    {
        $action = htmlspecialchars($_GET['action']);

        if(isset($_GET['idAction']) and !empty($_GET['idAction']))
        {
            $idAction = htmlspecialchars($_GET['idAction']);

            if($action == "supprimerVente")
            {
                SupprimerAnnonce($idAction);
                $errMsg = "La vente $idAction a bien été supprimée";
            }
            else
            if($action == "supprimerProfil")
            {
                SuppressionUtilisateur(htmlspecialchars($idAction));
                $errMsg = "Le profil $idAction a bien été supprimé";
            }
            else
            {
                $errMsg = "Veuillez fournir une action valide";
            }
        }
        else
        {
            $errMsg = "Veuillez fournir un id valide";
        }

        include("vue/erreur.php");
    }
    else
    {
        include_once("vue/admin/bdd.php");
    }
}
?>
