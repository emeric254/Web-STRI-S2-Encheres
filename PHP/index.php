<?php
	include("core/model.php");
	include("vue/entete.php");
	
	include("vue/navbar.php");
	if ( isset($_GET['page']) and !empty($_GET['page']) ) {
		$page=htmlspecialchars($_GET['page']);
	} else {
		$page="nouveautes"; //page par default
	}
	if(file_exists("vue/$page.php")){
		include_once("vue/$page.php");
	} else {
		include_once("vue/nouveautes.php"); //page d'erreur'
	}
	include("vue/footer.php");
?>
