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
            }
            else
            //~ if($action == "supprimerVente")
            //~ {
                //~ SupprimerAnnonce(htmlspecialchars($_GET['idAction']));
            //~ }
            //~ else
            {
                $errMsg = "Veuillez fournir une action valide";
                include("vue/erreur.php");
            }
        }
        else
        {
            $errMsg = "Veuillez fournir un id valide";
            include("vue/erreur.php");
        }

        ?>
            <script>window.location="/?page=admin";</script>
        <?php
    }
    else
    {
        include_once("vue/admin/bdd.php");
    }
}
?>
