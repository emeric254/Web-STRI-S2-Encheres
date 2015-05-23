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
 *
 *
 * UploadImage :
 * - voir quels types d'images sont acceptées (j'ai mis un truc de base mais possibilité d'en retirer ou rajouter 
 * - quand appel de la fonction, gérer l'affichage des scripts
 * - modifier l'emplacement de sauvegarde de l'image
 * - gérer le cas if (!empty($donnees['photo'])) 
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

# ----------- Fonction pour l'upload d'image

/*  Fonction d'upload d'une photo 
 *
 * $dossier : emplacement où l'image est stockee sur le serveur
 * $photo : valeur récupéré par $_FILES['photo']
 * $taille_maxi : taille maximale de l'image
 * $typePhoto : vaut 1 pour photo utilisateur et 2 pour photo objet
 */
function UploadImage($dossier,$photo,$taille_maxi,$typePhoto)
{
	include('bdd.php');
	$id = $_SESSION['id'];
	$fichier = basename($photo['name']);
	$taille = filesize($photo['tmp_name']);
	$extensionsAccepte = array('.png', '.gif', '.jpg', '.jpeg', '.JPG', '.PNG');
	$extension = strrchr($photo['name'],'.');
	// Vérification de la validité de l'image
	// on regarde si l'extension est dans le tableau
	if (!in_array($extension,$extensionsAccepte))
	{
		$erreur = "<script>alert(\"Vous devez uploader un fichier de type png, gif, jpg, jpeg.\");</script>";
	}
	// on regarde si la taille est correcte
	if ($taille>$taille_maxi)
	{
		$erreur = "<script>alert(\"La taille du fichier trop importante (max $taille_maxi).\");</script>";
	}
	if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
	{
		// formatage du nom du fichier (on retire les accents)
		$fichier = strtr($fichier,
			          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
			          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
	var_dump($photo);
	echo "=> $fichier - juste avant le if, ".$photo['tmp_name'];
		if(move_uploaded_file($photo['tmp_name'], $dossier/*.$fichier*/)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné
		{
echo "azezrtyuiopo";
	var_dump($photo);
			if ($typePhoto == 1) // ajout photo de profil
			{
				unlink($dossier.$_SESSION['photo']);
				rename($dossier.$fichier, $dossier.$_SESSION['id'].$fichier);
				$newfichier = $_SESSION['id'].$fichier;
				$resultats = $connexion->prepare('UPDATE utilisateur SET urlphotoutilisateur = :photo WHERE idutilisateur= :id');
				$resultats->execute(array(
									'photo' => $newfichier,
									'id' => $id));
				$donnees = $resultats->fetch();

				$resultats = $connexion->prepare('SELECT urlphotoutilisateur FROM utilisateur WHERE idutilisateur= :id');
				$resultats->execute(array( 
									'id' => $id));
				$donnees = $resultats->fetch();

				// Enregistrement des variables de session
				$_SESSION['photo'] = $donnees['photo'];

				if (!empty($donnees['photo'])) 
				{
					/* A faire */
				}
			}
			else if ($typePhoto == 2) // ajout photo annonce 
			{
					/* A faire */
				echo("<script>alert(\"A faire - model.php\");</script>");
			}
		}
		else //Sinon (la fonction renvoie FALSE).
		{
		  echo("<script>alert(\"l'upload a échoué.\");</script>");
		}
	}
}


?>
