<?php
/* «gestionUser.php»
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
        $profils= utilisateursRecupTousIdUtilisateurs();

        include_once("vue/admin/debut-profils.php");

        foreach($profils as $idProfil)
        {
            $profil = new Profil($idProfil);
            include('vue/resume-article.php');
            unset($profil);
        }

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
