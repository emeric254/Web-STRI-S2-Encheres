<?php
/* «inscription.php»
 * Page d'inscription
 *
 * TODO:
 * - utile de include_once('core/model.php'); ?
 * - pour intéger le jquery pour vérifier au moment de la saisie si le mail est déjà utilisé
 */

include_once('core/class.php');
include_once('core/model.php');

if (isset($_SESSION['id']))
{
    $id= $_SESSION['id'];
    $profil = new Profil($id);
    include_once('vue/modification-profil.php');
}
else
{
    //Rediriger vers la racine
    ?>
        <script>window.location="/";</script>
    <?php
}




?>
