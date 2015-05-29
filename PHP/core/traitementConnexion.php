 <?php
/* «traitementConnexion.php»
 * Page de traitement de la connexion
 *
 *
 *
 * TODO:
 * -transformer des parties en fonctions à mettre dans le model
 * -traiter le if (!donnees) - mettre dans une variable le fait que la mdp ou id incorrect et la récupérer dans la page de connexion pour afficher un message indiquant qu'une des deux infos est incorrecte
 * -voir si on met idville et idstatut dans la variable de session
 * -gérer quand email et pwd sont vide
 * -modifier redirection vers l'index une fois la connexion faite
 * -voir si on prend le mdp dans la var session et si c'est correct         $_SESSION['pwd'] = sha1($donnees['mdputilisateur']);

 */

include_once('core/model.php'); /* utile ????*/
include_once('core/bdd.php');
if ((isset($_POST['email'])) && (isset($_POST['pwd'])))
{
    $email=$_POST['email'];
    // Hachage du mot de passe
    $pwd = sha1($_POST['pwd']);

    // Vérification des identifiants
    $resultats = $db->prepare('SELECT idutilisateur,emailutilisateur,nomutilisateur,prenomutilisateur,telephoneutilisateur,adresseutilisateur,urlphotoutilisateur,idville, idstatut, mdputilisateur FROM utilisateur WHERE emailutilisateur = :email AND mdputilisateur = :mdp');

    $resultats->execute(array(
    'email' => $email,
    'mdp' => $pwd));

    $donnees = $resultats->fetch();

    if (!$donnees)
    {
        //echo "Echec connexion - email ou mot de passe incorrect";
        $errMsg = "Echec connexion - email ou mot de passe incorrect ! <a href=''>réessayer</a> ?";
        include("vue/erreur.php");
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
        $_SESSION['idstatut'] = $donnees['idstatut'];
        $_SESSION['pwd'] = $donnees['mdputilisateur'];

        //redirection vers l'index
        header('Location: /');
    }
}
else
    //redirection vers la page de connexion
    /* TODO : A fairee */
?>
