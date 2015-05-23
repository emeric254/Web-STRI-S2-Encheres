 <? SESS
 <?php
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
 * - gérer que la requete d'insertion fonctionne
 */
 
include_once('model.php'); /* utile ????*/
include_once('bdd.php'); /** TODO : modifier chemin */

/* Récupération des différentes variables du formulaire */
if (isset($_POST['inputEmail'])) $mail=$_POST['inputEmail'];
if (isset($_POST['inputPassword'])) $password=sha1($_POST['inputPassword']);
if (isset($_POST['inputNom'])) $nom=$_POST['inputNom'];
if (isset($_POST['inputPrenom'])) $prenom=$_POST['inputPrenom'];
if (isset($_POST['inputPhone'])) $telephone=$_POST['inputPhone'];
if (isset($_POST['inputAdresse'])) $adresse=$_POST['inputAdresse'];
if (isset($_POST['inputVille'])) $ville=$_POST['inputVille'];


/* Affichage des informations récupérées */
echo "<div> <h1> Test donnees recues </h1>mail : $mail<br> password : $password<br> nom : $nom<br>prenom : $prenom";
echo "<br> telephone : $telephone<br>addresse : $adresse <br> ville : $ville<br> </div>";

/* Tester que les 2 ots de passe sont identiques */

/** Mode moche a verif et compléter - manque image, idville et idstatut */
$req="INSERT INTO utilisateur (emailUtilisateur,nomutilisateur,prenomutilisateur,telephoneutilisateur,adresseutilisateur,mdputilisateur,idstatut,urlphotoutilisateur) VALUES ('$mail', '$nom', '$prenom', '$telephone', '$adresse', '$password',1,'./profil/default.png')";

$reqExec = $db->prepare($req);
$reqExec->execute() or die(print "echec execution requete");  /********** Virer ou changer texte du or die */

// on recherche les informations du compte dans la base

	// Vérification des identifiants
	$resultats = $db->prepare('SELECT idutilisateur,emailutilisateur,nomutilisateur,prenomutilisateur,telephoneutilisateur,adresseutilisateur,urlphotoutilisateur,idville, idstatut, mdputilisateur FROM utilisateur WHERE emailutilisateur = :email AND mdputilisateur = :mdp');
	
	$resultats->execute(array(
	'email' => $mail,
	'mdp' => $password));
	
	$donnees = $resultats->fetch();
	
	if (!$donnees)
	{
		echo "Echec ajout"; /**TODO :  A MIEUX DEFINIR */
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
	
	echo "photo file; ".$_FILES['inputPhoto']['name'];
	// traitement de l'image
	if (isset($_FILES['inputPhoto']))
	{
		UploadImage('../profil/',$_FILES['inputPhoto'],2000000,1);
		
	}
	
	}
	
	
	
	
	
	
	
	

?>

