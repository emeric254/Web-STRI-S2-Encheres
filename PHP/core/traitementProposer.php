<?php
/* «traitementNouvelleVente.php»
 * page de traitement de l'ajout d'un nouvel objet.
 *
 * s'occupe de rajouter une annonce dans la base de donnée
 *
 *
 * TODO:
 * - tester que la personne est connectée
 * - Faire la fonction VerificationInformationAnnonce($titre,$description,$prix,$pas,$dureeJour,$dureeHeure,$dureeMinute);
 *
 *
 * 98 : traiter la valeur retournée
 *
 *
 * AjoutNouvelleAnnonce($titre,$description,$prix,$pas,$dureeJour,$dureeHeure,$dureeMinute);
 *  Permet d'ajouter l'objet dans la base, ne retourne aucune valeur
 *
 *
 * VerificationAjoutNouvelleAnnonce($titre)
 *  Permet de vérifier que l'objer est ajouté dans la base, on utilise en plus du titre, l'id du venteur (contenu dan $_SESSION) et d'autres infos a déterminer, retourne 0 en cas d'erreur et autre chose pour un succes
 *
 *- Que faire une fois l'annonce ajoutée ? redirection vers la page d'accueil ? vers les infos de l'annonce ? pour le moment page de l'annonce
 *
 */

include_once('core/model.php');
include_once('core/bdd.php');
include_once('core/upload.php');
include_once('core/class.php');

// Récupération des différentes variables du formulaire
$erreur=0;
$champErreur = " ";

if (isset($_POST['inputTitre']) and !empty($_POST['inputTitre'])) {
    $titre=htmlspecialchars($_POST['inputTitre']);
    if( strlen($titre) < 1)
    {
        $erreur=1;
        $champErreur="Titre d'annonce invalide";
    }
}else{
    $erreur=1;
    $champErreur="Titre d'annonce manquant";
}

//Champ facultatif
if (isset($_POST['inputCategorie']) and !empty($_POST['inputCategorie'])) {
    $idcategorie=htmlspecialchars($_POST['inputCategorie']);
}

if (isset($_POST['inputDescription']) and !empty($_POST['inputDescription'])) {
    $description=htmlspecialchars($_POST['inputDescription']);
    if(strlen($description) < 1)
    {
        if($erreur)
        {
            $champErreur.=", ";
        }
        $erreur=1;
        $champErreur.="Description invalide";
    }
}else{
    if($erreur)
    {
        $champErreur.=", ";
    }
    $erreur=1;
    $champErreur.="Description manquante";
}

if (isset($_POST['inputPrix']) and !empty($_POST['inputPrix'])) {
    $prix=htmlspecialchars($_POST['inputPrix']);
    if($prix < 1)
    {
        if($erreur){
            $champErreur.=", ";
        }
        $erreur=1;
        $champErreur.="Veuillez saisir un prix valide";
    }
}else{
    if($erreur){
        $champErreur.=", ";
    }
    $erreur=1;
    $champErreur.="Veuillez saisir le prix";
}

if (isset($_POST['inputPas']) and !empty($_POST['inputPas'])) {
    $pas=htmlspecialchars($_POST['inputPas']);
    if($pas < 1)
    {
        if($erreur){
            $champErreur.=", ";
        }
        $erreur=1;
        $champErreur.="Veuillez indiquer un pas valide";
    }
}else{
    if($erreur){
        $champErreur.=", ";
    }
    $erreur=1;
    $champErreur.="Veuillez indiquer le pas";
}

if ((isset($_POST['inputDureeJour']) and !empty($_POST['inputDureeJour']))
    || (isset($_POST['inputDureeHeure']) and !empty($_POST['inputDureeHeure']))
    || (isset($_POST['inputDureeMinute']) and !empty($_POST['inputDureeMinute'])))
{
    if(isset($_POST['inputDureeMinute']))
        $dureeJour=htmlspecialchars($_POST['inputDureeJour']);
    else
        $dureeJour=0;

    if(isset($_POST['inputDureeHeure']))
        $dureeHeure=htmlspecialchars($_POST['inputDureeHeure']);
    else
        $dureeHeure=0;

    if(isset($_POST['inputDureeMinute']))
        $dureeMinute=htmlspecialchars($_POST['inputDureeMinute']);
    else
        $dureeMinute=0;
}else{
    if($erreur){
        $champErreur.=", ";
    }
    $erreur=1;
    $champErreur.="Veuillez saisir une durée valide";
}


if (isset($_POST['categorieAnnonce']) and !empty($_POST['categorieAnnonce'])) {
    $categorieAnnonce=htmlspecialchars($_POST['categorieAnnonce']);
}else{
    if($erreur){
        $champErreur.=", ";
    }
    $erreur=1;
    $champErreur.="Veuillez saisir la cat&eacute;gorie";
}

// Récupération de l'identifiant de l'utilisateur connecté
if (isset($_SESSION['id']) and !empty($_SESSION['id']))
{
    $idutilisateur=htmlspecialchars($_SESSION['id']);
    // TODO : voir si il faut faire un autre test mais si connecté, la ville est connu
    $user = new Profil($idutilisateur);
    $idville=$user->idVille;
}
else
{
    if($erreur){
        $champErreur.=", ";
    }
    $erreur=1;
    $errMsg.="Il vous faut etre connect&eacute;.";
}

if ($erreur == 1)
{
    $errMsg="Veuillez v&eacute;rifier les erreurs suivante : $champErreur.";
    include_once("vue/erreur.php");
    include_once("vue/proposer.php");
}else
{
    // a regarder jai mis les verif avant donc de tt manieres ce test passe dans tous les cas 
    if ( VerificationInformationAnnonce($titre,$description,$prix,$pas,$dureeJour,$dureeHeure,$dureeMinute) != 0 )
    {
        // Ajout de l'objet dans la base de données
        $idAnnonce = AjoutNouvelleAnnonce($titre,$description,$prix,$pas,$dureeJour,$dureeHeure,$dureeMinute,$categorieAnnonce,$idutilisateur,$idville);
        // on recherche les informations de l'annonce dans la base
        if (! empty($idAnnonce) && $idAnnonce != -1 && VerificationAjoutNouvelleAnnonce($idAnnonce) == $idAnnonce)
        {
            if (isset($_FILES['inputPhoto']) and !empty($_FILES['inputPhoto']))
            {
                // on upload l'image
                $photo=$_FILES['inputPhoto'];
                UploadImage('vente/',$photo,2000000,$idAnnonce);
                //mise a jour dans la base du nom de l'image
                $extension = strrchr($photo['name'],'.');
                $newfichier = '/vente/'.$idAnnonce.$extension;
                MajUrlImageAnnonce($newfichier,$idAnnonce);
            }

            ?>
                <script>window.location="/?page=vente&id=<?= $idAnnonce ?>";</script>
            <?php
        }
        else
        {
            $errMsg="Erreur pendant l'enregistrement de l'annonce";
            include_once("vue/erreur.php");
            include_once("vue/proposer.php");
        }

    }
    else
    {
        $errMsg="Erreur lors de la vérification de l'annonce.";
        include_once("vue/erreur.php");
        include_once("vue/proposer.php");
    }
}

?>
