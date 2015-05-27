<?php
/* «gestionVente.php»
 *
 *
 * vars
 *
 */

include_once('core/model.php');
include_once('core/class.php');

if(isset($_SESSION['id']) and !empty($_SESSION['id']) && $isadmin)
{
    if (isset($_GET['action']) and !empty($_GET['action']))
    {
        $action = htmlspecialchars($_GET['action']);
    }
    else
    {
        //~ faire une liste ventes $ventes

        include_once("vue/admin/debut-ventes.php");
        include_once("vue/fin-contenu.php");
    }
}
else
{
    ?>
        <script>window.location="/?page=connexion";</script>
    <?php
}
?>
