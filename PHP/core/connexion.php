<?php 
//Si utilisateur déja connecté : redirection vers l'acceuil
if (!empty($_SESSION['id'])) 
{
    header("Location: index.php");
}
else
{
    // Si non formulaire de connexion
?>

<?php
/* «connexion.php»
 * Page de connexion
 * 
 * TODO:
 * - utile de include_once('core/model.php'); ?
 * - gérer la connexion, modifier $_SESSION['id']
 * - utile l'insertion de class.php ?
 */
 
include_once('core/model.php'); /* utile ????*/
include_once('core/class.php');
include_once('vue/connexion.php');


}
?>

