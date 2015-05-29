<?php
/* «gestionVente.php»
 *
 */

include_once('core/class.php');
include_once('core/model.php');

if(isset($_SESSION['id']) and !empty($_SESSION['id']) && $isadmin)
{
    if (isset($_GET['action']) and !empty($_GET['action']))
    {
        $action = htmlspecialchars($_GET['action']);
    }
    else
    {
        include_once("vue/admin/debut-ventes.php");

        $listVentes= ventesRecupTousIdVentes();

        foreach($listVentes as $idVente)
        {
            $vente = new Vente($idVente);
            include('vue/resume-article.php');
            unset($vente);
        }

        include_once('vue/fin-contenu.php');
    }
}
else
{
    ?>
        <script>window.location="/?page=connexion";</script>
    <?php
}
?>
