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
        if(isset($_GET['idSup']) and !empty($_GET['idSup']))
        {
            if($action == "supprimerVente")
            {
                SupprimerAnnonce(htmlspecialchars($_GET['idSup']));
            }
            else
            if($action == "supprimerVente")
            {
                SupprimerAnnonce(htmlspecialchars($_GET['idSup']));
            }
            else
            {
                $errMsg = "Veuillez fournir un id valide";
                include("vue/erreur.php");
            }
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
