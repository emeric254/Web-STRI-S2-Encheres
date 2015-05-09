<?php
/* «vente.php»
 * page de traitement pour la vue du même nom.
 * 
 * vars
 * $titreVente
 * $tempsVente
 * $prixVente
 * $nbEnchereVente
 * $photoVente
 * $descriptionVente
 * 
 * $encherisseursVente (tab des encherisseurs)
 * 
 * 
 * TODO :
 * Gestion du manque d'id
 */
session_start();
include_once('core/bdd.php');

# -------------- Fonction controleur pour vente.php

function Vente_Info_General($id) {
	$req = "SELECT * FROM annonce WHERE idannonce=?";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id));
	while ($donnees_reqExec = $reqExec->fetch()){
		$ret['titreVente'] = $donnees_reqExec['nomannonce'];
		$ret['tempsVente'] = $donnees_reqExec['dureeannonce'];
		$ret['prixVente'] = $donnees_reqExec['prixdepartannonce'];
		$ret['photoVente'] = $donnees_reqExec['urlphotoannonce'];
		$ret['descriptionVente'] = $donnees_reqExec['descriptionannonce'];
	}
	return $ret;
}

function Vente_nb_enchere($id) {
	$req = "SELECT * FROM encherir WHERE idannonce =?";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id));
	$i = 0;
	while ($donnees_reqExec = $reqExec->fetch()){
		$i = $i +1;
	}
	return $i;
}

# ----------- Fonction pour la navbar

function NavbarCheckInfo($id,$user,$pass) {
	$ret = false;
	$req = "SELECT * FROM utilisateur WHERE idutilisateur='?' AND emailutilisateur='?' AND mdputilisateur='?' ";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id, $user, $pass));
	while ($donnees_reqExec = $reqExec->fetch()){
		$ret = true;
	}
	return $ret;
}

?>
