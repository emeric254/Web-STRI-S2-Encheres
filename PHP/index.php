<?php
	include("core/model.php");
	
	
	if ( isset($_GET['page']) and !empty($_GET['page']) )
	{
		$page=htmlspecialchars($_GET['page']);
	} else {
		$page="nouveautes"; //page par default
	}
	
	
	
	// vues
	 
	include("vue/entete.php");
	include("vue/navbar.php");
	
	if(file_exists("vue/$page.php"))
	{
		include_once("vue/$page.php");
	} else {
		// $errMsg = "page introuvable";
		include_once("vue/erreur.php"); //page d'erreur'
	}
	
	include("vue/footer.php");
?>
