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
                //~ @ TODO test si vente existe

                SupprimerAnnonce($idAction);
                $errMsg = "La vente $idAction a été supprimée";
            }
            else
            if($action == "supprimerProfil")
            {
                //~ @ TODO test si profil existe

                if($idAction == 1)
                {
                    $errMsg = "Impossible de supprimer le «super» admin";
                }
                else
                {
                    SuppressionUtilisateur(htmlspecialchars($idAction));
                    $errMsg = "Le profil $idAction a été supprimé";
                }
            }
            else
            {
                $errMsg = "Veuillez fournir une action valide";
            }
        }
        else
        {
            //~ if($action == "import")
            //~ {
                //~ @ TODO import all base a faire
                //~ $errMsg = "Import";
            //~ }
            //~ else
            if($action == "export")
            {
                //~ @ TODO export all base a faire
                $errMsg = "Export";
            }
            else
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
