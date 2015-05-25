<?php
	session_start();
	include("core/model.php");
	
	
	if ( isset($_GET['page']) and !empty($_GET['page']) )
	{
		$page=htmlspecialchars($_GET['page']);
	} else {
		$page="accueil"; //page par default
	}
	
	// vues
	 
	include("vue/entete.php");
	include("core/navbar.php");
	if (isset($_GET['errMsg']) and !empty($_GET['errMsg'])) {
		$errMsg = htmlspecialchars($_GET['errMsg']);
		include("vue/erreur.php"); //page d'erreur'
	}
	if(file_exists("core/$page.php"))
	{
		include_once("core/$page.php");
	} else {
		$errMsg = "page introuvable";	
		include("vue/erreur.php"); //page d'erreur'
	}
	
	include("vue/footer.php");
?>
