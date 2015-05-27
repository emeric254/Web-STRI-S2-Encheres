<?php
/* «inscription.php»
 * Page d'inscription
 *
 * TODO:
 * - utile de include_once('core/model.php'); ?
 * - pour intéger le jquery pour vérifier au moment de la saisie si le mail est déjà utilisé
 */

include_once('core/model.php'); /* utile ????*/

if (isset($_SESSION['id']))
{
    $id= isset($_SESSION['id']);
    $util= new Profil ($id);
    $profil = new Profil($id);
    include_once('vue/modification-profil.php');
}
else
{
    //Rediriger vers la racine

}




?>
