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


// session 
session_start();

// bdd
include('core/bdd.php');


# -------------- Fonction controleur pour vente.php

function Vente_Info_General($id)
{
//	include('core/bdd.php');	// deja include avant
	$req = "SELECT * FROM annonce WHERE idannonce=?";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id));
	while ($donnees_reqExec = $reqExec->fetch())
	{
		$ret['titreVente'] = $donnees_reqExec['nomannonce'];
		$ret['tempsVente'] = $donnees_reqExec['dureeannonce'];
		$ret['prixVente'] = $donnees_reqExec['prixdepartannonce'];
		$ret['photoVente'] = $donnees_reqExec['urlphotoannonce'];
		$ret['descriptionVente'] = $donnees_reqExec['descriptionannonce'];
	}
	return $ret;
}

function Vente_nb_enchere($id)
{
//	include('core/bdd.php');	// deja include avant
	$req = "SELECT * FROM encherir WHERE idannonce =?";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id));
	$i = 0;
	while ($donnees_reqExec = $reqExec->fetch())
	{
		$i = $i +1;
	}
	return $i;
}

# ----------- Fonction pour la navbar

function NavbarCheckInfo($id,$user,$pass)
{
//	include('core/bdd.php');	// deja include avant
	$ret = false;
	$req = "SELECT * FROM utilisateur WHERE idutilisateur='?' AND emailutilisateur='?' AND mdputilisateur='?' ";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id, $user, $pass));
	while ($donnees_reqExec = $reqExec->fetch())
	{
		$ret = true;
	}
	return $ret;
}

# ----------- Fonction pour l'affichage d'un profil utilisateur
/* remi :
 * est-ce correct d'utiliser le while vu qu'on recupere qu'un seul profil ?
 * dans le execute, est-ce qu'il faut mettre array($info) ?
 */
function Profil_Info_Compte($mail) {
	include('core/bdd.php');
	$req = 'SELECT * FROM utilisateur WHERE emailutilisateur=?';
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($mail));
	while ($donnees_reqExec = $reqExec->fetch()){
		$ret['prenomClient'] = $donnees_reqExec['nomutilisateur'];
		$ret['nomClient'] = $donnees_reqExec['prenomutilisateur'];
		$ret['mail'] = $donnees_reqExec['emailutilisateur'];
		$ret['numeroTelephone'] = $donnees_reqExec['telephoneutilisateur'];
		$ret['adresse'] = $donnees_reqExec['adresseutilisateur'];
	}
	
	return $ret;
}
?>
