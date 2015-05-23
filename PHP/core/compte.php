<?php
/* «compte.php»
 * page de traitement pour la vue du même nom.
 */
 
include_once('core/model.php');
include_once('core/class.php');
if(isset($_GET['id']) and !empty($_GET['id'])) { //changer les GET par des session, utilisation des get a des fin de teste
	$id = htmlspecialchars($_GET['id']);
	$profil = new Profil($id);	
	if (isset($_GET['c']) and !empty($_GET['c'])) {
		$choix = htmlspecialchars($_GET['c']);
	}
	include_once('vue/compte.php');
} else {
	$errMsg = "Vous devez vous connecter pour acceder a cette pages";
	include_once("vue/erreur.php");
}
?>
