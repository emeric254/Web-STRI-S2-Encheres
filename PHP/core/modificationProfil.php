<?php
/* «inscription.php»
 * Page d'inscription
 *
 */

include_once('core/class.php');
include_once('core/model.php');

if (isset($_SESSION['id']))
{
    //Admin
    if ($_SESSION['idstatut'] == 1)
    {
        if (!isset($_GET['id']))
        {
            $errMsg="Pas de parametre id";
            include_once("vue/erreur.php");
        }
        else
        {
            $id= $_GET['id'];
            $profil = new Profil($id);
            $codepostal = recupCodePostalIdVille($profil->idVille);
            include_once('vue/modification-profil.php');
        }
    }
    else
    {
        $id=$_SESSION['id'];
        $profil = new Profil($id);
        $codepostal = recupCodePostalIdVille($profil->idVille);
        include_once('vue/modification-profil.php');
    }

}
else
{
    //Rediriger vers la racine
    ?>
        <script>window.location="/";</script>
    <?php
}




?>
