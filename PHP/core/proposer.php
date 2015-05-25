<?php //Si utilisateur n'est pas connecté : redirection vers lla page de connexion
if (empty($_SESSION['id'])) 
{
    header("Location: /?page=connexion");
}
else
{
?>

<?php
 /* «nouvelleVente.php»
  * page de traitement pour la vue du même nom.
  *
  *
  * vars :
  *
  *
  *
  * TODO :
  * - Quand redirection vers la page de connexion, après appuie sur "connexion" rediriger automatiquement vers la page de mise en vente 
  *
  */
  
include_once('core/model.php');
include_once('core/class.php');

include_once("vue/proposer.php");

}
?>