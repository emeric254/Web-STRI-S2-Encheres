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
 */
 
 include_once('core/model.php');
 if (isset($_get['mail']) and !empty($_get['mail'])) {
	$mail=$_get['mail'];
	$info=Profil_Info_Compte($mail);
	$prenomClient = $info['prenomClient'];
	$nomClient = $info['nomClient'];
	$mail = $info['mail'];
	$numeroTelephone = $info['numeroTelephone'];
	$adresse = $info['adresse'];
 } else {
 //TODO  l'utilisateur recherche n'existe pas
 
 }
 ?>