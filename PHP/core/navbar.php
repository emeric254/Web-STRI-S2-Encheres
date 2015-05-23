
<?php
/* «core/navbar.php»
 * barre de menu sur toutes les pages du site
 * 
 * vars
 * $connecte  (represente l'etat de connexion de la personne sur le site, connectee ou non)
 * 
 * rémi : j'ai modifier dans $cookies et $session user en email et pass en mdp (pour que ça corresponde avec la page de connexion, voir ce qu'on met conne nom de colonne
 */

include_once('core/model.php');
if(isset($_SESSION['id']) and !empty($_SESSION['id']) 
	and isset($_SESSION['email']) and !empty($_SESSION['email']) 
	and isset($_SESSION['pwd']) and !empty($_SESSION['pwd']))
{
	$id = htmlspecialchars($_SESSION['id']);
	$user = htmlspecialchars($_SESSION['email']);
	$pass = htmlspecialchars($_SESSION['pwd']);
	$test = NavbarCheckInfo($id,$user,$pass);
	if($test)
	{
		$connecte = TRUE;
	}
	else
	{
		$connecte = FALSE;
		unset($_SESSION['id']);
		unset($_SESSION['email']);
		unset($_SESSION['pwd']);
		/** mettre toutes les var */
	}
}
else if (isset($_COOKIE['id']) and !empty($_COOKIE['id']) 
			and isset($_COOKIE['email']) and !empty($_COOKIE['email']) 
			and isset($_COOKIE['pwd']) and !empty($_COOKIE['pwd']))
{
	$id = htmlspecialchars($_COOKIE['id']);
	$user = htmlspecialchars($_COOKIE['email']);
	$pass = htmlspecialchars($_COOKIE['pwd']);
	if(NavbarCheckInfo($id,$user,$pass))
	{
		$connecte = TRUE;
		$_SESSION['id'];
		$_SESSION['email'];
		$_SESSION['pwd'];
	}
	else
	{
		$connecte = FALSE;
		unset($_COOKIE['id']);
		unset($_COOKIE['email']);
		unset($_COOKIE['pwd']);
	}
}
else
{
	$connecte = FALSE;
}
include('vue/navbar.php');	// deja include avant

?>
