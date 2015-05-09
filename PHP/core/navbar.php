<?php
/* «core/navbar.php»
 * barre de menu sur toutes les pages du site
 * 
 * vars
 * $connecte  (represente l'etat de connexion de la personne sur le site, connectee ou non)
 * 
 * 
 */
include('core/model.php');
if(isset($_SESSION['id']) and !empty($_SESSION['id']) and isset($_SESSION['user']) and !empty($_SESSION['user']) and isset($_SESSION['pass']) and !empty($_SESSION['pass'])) {
	$id = htmlspecialchars($_SESSION['id']);
	$user = htmlspecialchars($_SESSION['user']);
	$pass = htmlspecialchars($_SESSION['pass']);
	if(NavbarCheckInfo($id,$user,$pass)){
		$connecte = TRUE;
	} else {
		$connecte = FALSE;
		unset($_SESSION['id']);
		unset($_SESSION['user']);
		unset($_SESSION['pass']);
	}
} else if (isset($_COOKIE['id']) and !empty($_COOKIE['id']) and isset($_COOKIE['user']) and !empty($_COOKIE['user']) and isset($_COOKIE['pass']) and !empty($_COOKIE['pass'])) {
	$id = htmlspecialchars($_COOKIE['id']);
	$user = htmlspecialchars($_COOKIE['user']);
	$pass = htmlspecialchars($_COOKIE['pass']);
	if(NavbarCheckInfo($id,$user,$pass)){
		$connecte = TRUE;
		$_SESSION['id'];
		$_SESSION['user'];
		$_SESSION['pass'];
	} else {
		$connecte = FALSE;
		unset($_COOKIE['id']);
		unset($_COOKIE['user']);
		unset($_COOKIE['pass']);
	}
} else {
	$connecte = FALSE;
}

?>
