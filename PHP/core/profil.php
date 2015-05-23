<?php
/* «profil.php»
 * page affichant le profil d'un utilisateur
 * 
 * vars
 * $prenomClient
 * $nomClient
 * $mail
 * $numeroTelephone
 * $adresse
 *
 * TODO :
 * Manque peut etre des infos a afficher
 * GESTION ERREUR
 */
 
 include_once('core/model.php');
include_once('core/class.php');
 if (isset($_GET['id']) and !empty($_GET['id'])) {
	$id = htmlspecialchars($_GET['id']);
	$profil = new Profil($id);
	include('vue/profil.php');
 } else {
	$errMsg = "Pas d'utilisateur indiqué'";
	include_once("vue/erreur.php");
 }

 ?>
