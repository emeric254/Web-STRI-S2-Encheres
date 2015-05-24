<?php 
//Si utilisateur déja connecté : redirection vers l'acceuil
if (!empty($_SESSION['id']) && 0) 
{
	header("Location: /");
}
else
{
    // Sinon on  traite les infos recu
	/* «traitementInscription.php»
	 * Page de traitement de l'inscription
	 * 
	 * s'occupe de rajouter le compte dans la base de donnée
	 *
	 * TODO:
	 * - utile de include_once('core/model.php'); ?
	 * - faire un test que les valeurs envoyées par le formulaire ne sont pas vide ou inexistante
	 * - Voir comment on gère l'image associé au profil utilisateur
	 * - tester mots de passe identique ici ou dans le form ? si ici, manque un id pour le second mdp dans le form
	 * - tester que l'utilisateur n'existe pas déjà en comparant l'email
	 * - dans requete, obn met idStatut à 1 mais gérer avec la bonne valeur => a déterminer dans la table statut
	 * - gérer les valeurs a mettre pour la ville et le statut (les id)
	 * - gérer le if ( !donnees)
	 * - gérer quand la requete d'insertion fonctionne
	 * - quand on se trouver sur la parge d'un objet, rediriger vers cette meme page plutot que vers l'index
	 */
	 
	include_once('core/model.php'); /* utile ????*/
	include_once('core/bdd.php'); /** TODO : modifier chemin */

	/* Récupération des différentes variables du formulaire */
	$erreur=0;
	$champErreur = " ";
	if (isset($_POST['inputEmail']) and !empty($_POST['inputEmail'])){
		$mail=htmlspecialchars($_POST['inputEmail']);
	}else{
		$erreur=1;
		$champErreur="Email manquante";
	}

	if (isset($_POST['inputPassword']) and !empty($_POST['inputPassword'])){
		$password=htmlspecialchars($_POST['inputPassword']);
	}else{
		if($erreur){
			$champErreur.=", ";
		}
		$champErreur.="Mot de passe manquant";
		$erreur=1;
	}

	if (isset($_POST['inputPasswordBis']) and !empty($_POST['inputPasswordBis'])){
		$passwordBis=htmlspecialchars($_POST['inputPasswordBis']);
	}else{
		if($erreur){
			$champErreur.=", ";
		}
		$champErreur.="Confirmation du mot de passe manquante";
		$erreur=1;
	}

	if (isset($_POST['inputNom']) and !empty($_POST['inputNom'])){
		$nom=htmlspecialchars($_POST['inputNom']);
	}else{
		if($erreur){
			$champErreur.=", ";
		}
		$champErreur.="Nom manquant";
		$erreur=1;
	}

	if (isset($_POST['inputPrenom']) and !empty($_POST['inputPrenom'])){
		$prenom=htmlspecialchars($_POST['inputPrenom']);
	}else{
		if($erreur){
			$champErreur.=", ";
		}
		$champErreur.="Prenom manquant";
		$erreur=1;
	}

	if (isset($_POST['inputPhone']) and !empty($_POST['inputPhone'])){
		$telephone=htmlspecialchars($_POST['inputPhone']);
	}else{
		if($erreur){
			$champErreur.=", ";
		}
		$champErreur.="Numero de telephone manquant";
		$erreur=1;
	}

	if (isset($_POST['inputAdresse']) and !empty($_POST['inputAdresse'])){
		$adresse=htmlspecialchars($_POST['inputAdresse']);
	}else{
		if($erreur){
			$champErreur.=", ";
		}
		$champErreur.="Adresse manquante";
		$erreur=1;
	}

	if (isset($_POST['inputVille']) and !empty($_POST['inputVille'])){
		$ville=htmlspecialchars($_POST['inputVille']);
	}else{
		if($erreur){
			$champErreur.=", ";
		}
		$champErreur.="Ville manquante";
		$erreur=1;
	}
	var_dump($erreur);
	var_dump($champErreur);
	if($erreur==1){
		$errMsg="Veuillez vérifier les erreur suivante : $champErreur.";
		include_once("vue/erreur.php");
		include_once("vue/inscription.php");
	}else{
		/* Tester que les 2 ots de passe sont identiques */
		if ($password != $passwordBis) 
		{
			$errMsg="Les mots de passes ne corresponde pas.";
			include_once("vue/erreur.php");
			include_once("vue/inscription.php");
		}else {
			/** Mode moche a verif et compléter - manque image, idville et idstatut */
			//A METTRE DANS LE MODEL
			$req="INSERT INTO utilisateur (emailUtilisateur,nomutilisateur,prenomutilisateur,telephoneutilisateur,adresseutilisateur,mdputilisateur,idstatut,urlphotoutilisateur) VALUES ('$mail', '$nom', '$prenom', '$telephone', '$adresse', '$password',1,'default.png')";

			$reqExec = $db->prepare($req);
			$reqExec->execute() or die(print "echec execution requete");  /********** Virer ou changer texte du or die */

			// on recherche les informations du compte dans la base
			//DANS LE MODEL AUSSI
			// Vérification des identifiants
			$resultats = $db->prepare('SELECT idutilisateur,emailutilisateur,nomutilisateur,prenomutilisateur,telephoneutilisateur,adresseutilisateur,urlphotoutilisateur,idville, idstatut, mdputilisateur FROM utilisateur WHERE emailutilisateur = :email AND mdputilisateur = :mdp');
	
			$resultats->execute(array(
			'email' => $mail,
			'mdp' => $password));
	
			$donnees = $resultats->fetch();
	
			if (!$donnees)
			{
				echo "Echec ajout"; /**TODO :  A MIEUX DEFINIR */
				echo("<script>alert(\"Echec ajout utilisateur\");</script>");
			}
			else
			{
				// on stocke les information du compte dans les variables de session
				$_SESSION['id'] = $donnees['idutilisateur'];
				$_SESSION['email'] = $donnees['emailutilisateur'];
				$_SESSION['nom'] = $donnees['nomutilisateur'];
				$_SESSION['prenom'] = $donnees['prenomutilisateur'];
				$_SESSION['telephone'] = $donnees['telephoneutilisateur'];
				$_SESSION['adresse'] = $donnees['adresseutilisateur'];
				$_SESSION['photo'] = $donnees['urlphotoutilisateur'];
				$_SESSION['idville'] = $donnees['idville'];
				$_SESSION['idstatut'] = $donnees['idville'];
				$_SESSION['pwd'] = $donnees['mdputilisateur'];
	
				// traitement de l'image
				if (isset($_FILES['inputPhoto']))
				{
					UploadImage('profil/',$_FILES['inputPhoto'],2000000,1);
			
				}
		
				//header("Location: /");
			}
		}
	}	
}
	
	
	

?>

