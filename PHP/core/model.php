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
 * $encherisseursVente (tab des encherisseurs) tu est là ?
 * 
 * 
 * TODO :
 * Gestion du manque d'id
 */


// session 
//session_start();

// bdd
//include('core/bdd.php'); Besoin de l'inclure dans chaque fonction sinon ça marche pas


# -------------- Fonction controleur pour vente.php
function Profil_Info_General($id)
{
	include('core/bdd.php');
	$req = "SELECT * FROM utilisateur WHERE idutilisateur=?";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id));
	while ($donnees_reqExec = $reqExec->fetch())
	{
		$ret['emailutilisateur'] = $donnees_reqExec['emailutilisateur'];
		$ret['nomutilisateur'] = $donnees_reqExec['nomutilisateur'];
		$ret['prenomutilisateur'] = $donnees_reqExec['prenomutilisateur'];
		$ret['telephoneutilisateur'] = $donnees_reqExec['telephoneutilisateur'];
		$ret['adresseutilisateur'] = $donnees_reqExec['adresseutilisateur'];
		$ret['urlphotoutilisateur'] = $donnees_reqExec['urlphotoutilisateur'];
		$ret['idville'] = $donnees_reqExec['idville'];
		$ret['idstatut'] = $donnees_reqExec['idstatut'];
	}
	return $ret;
}

function Vente_Info_General($id)
{
	include('core/bdd.php');
	$req = "SELECT * FROM annonce WHERE idannonce=?";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id));
	while ($donnees_reqExec = $reqExec->fetch())
	{
		$ret['titreVente'] = $donnees_reqExec['nomannonce'];
		$ret['tempsVente'] = $donnees_reqExec['dureeannonce'];
		$ret['idVendeur'] = $donnees_reqExec['idutilisateur'];
		$ret['débutVente'] = $donnees_reqExec['dateannonce'];
		$ret['prixVente'] = $donnees_reqExec['prixdepartannonce'];
		$ret['photoVente'] = $donnees_reqExec['urlphotoannonce'];
		$ret['descriptionVente'] = $donnees_reqExec['descriptionannonce'];
		$ret['pasannonce'] = $donnees_reqExec['pasannonce'];
	}
	return $ret;
	
}

function Vente_info_MaxId($id)
{
	include('core/bdd.php');
	$req = "SELECT * FROM encherir WHERE idannonce =? ORDER BY prixenchere DESC LIMIT 1";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id));
	$id = 0;
	while ($donnees_reqExec = $reqExec->fetch())
	{
			$id=$donnees_reqExec['idutilisateur'];
	}
	return $id;
}

function Vente_info_enchereSecond($id)
{
	include('core/bdd.php');
	$req = "SELECT * FROM encherir WHERE idannonce =? ORDER BY prixenchere DESC LIMIT 1 OFFSET 1";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id));
	$max = 0;
	while ($donnees_reqExec = $reqExec->fetch())
	{
			$max=$donnees_reqExec['prixenchere'];
	}
	return $max;
}

function Vente_nb_enchere($id)
{
	include('core/bdd.php');
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

function Ville_Recup_Nom($id)
{
	include('core/bdd.php');
	$req = "SELECT * FROM ville WHERE idville =?";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id));
	$nom = "";
	while ($donnees_reqExec = $reqExec->fetch())
	{
			$nom=$donnees_reqExec['nomville'];
	}
	return $nom;
}

# ----------- Fonction pour la navbar

function NavbarCheckInfo($id,$user,$pass)
{
	include('core/bdd.php');
	$ret = 0;
	$req = "SELECT * FROM utilisateur WHERE idutilisateur='$id' AND emailutilisateur='$user' AND mdputilisateur='$pass' ";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array());
	while ($donnees_reqExec = $reqExec->fetch())
	{
		$ret = 1;
	}
	return $ret;
}

function UtilisateurRecupererVente($id){
	include('core/bdd.php');
	$ret = array();
	$req = "SELECT idannonce FROM annonce WHERE idutilisateur=?";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id));
	while ($donnees_reqExec = $reqExec->fetch())
	{
		$ret[]=$donnees_reqExec['idannonce'];
	}
	return $ret;
}

function UtilisateurRecupererEnch($id){
	include('core/bdd.php');
	$ret = array();
	$req = "SELECT idannonce FROM encherir WHERE idutilisateur=? GROUP BY idannonce";
	$reqExec = $db->prepare($req);
	$reqExec->execute(array($id));
	while ($donnees_reqExec = $reqExec->fetch())
	{
		$ret[]=$donnees_reqExec['idannonce'];
	}
	return $ret;
}
?>
